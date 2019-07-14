<?php
date_default_timezone_set('America/Sao_Paulo');

class Traffic{
    private $db;
    private $ip;
    private $data;
    private $uri;
    private $user_agent;
    
    public function __construct(){
        $this->db = new PDO("mysql:host=localhost;dbname=bd_grafico;charset=utf8", "root", "");
        
        $this->uri = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_DEFAULT);
        $this->ip = '177.137.32.58';//filter_input(INPUT_SERVER, 'REMOTE_ADDR', FILTER_VALIDATE_IP);
        $cookie = filter_input(INPUT_COOKIE, md5($this->uri), FILTER_DEFAULT);
        $this->user_agent = filter_input(INPUT_SERVER, 'HTTP_USER_AGENT');
        
        if(!$cookie){
            $this->_set_cookie();   
            $this->_set_data();
        }

    }
    
    private function _set_cookie(){
        md5(setcookie($this->uri, TRUE, strtotime(date('Y-m-d 23:59:59'))));
    }
    
    private function _set_data(){
        
        //requisição json de geolocalização
        $url = "http://ip-api.com/json/{$this->ip}";
        $timeout = 3;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
        $rq = curl_exec($ch);
        curl_close($ch);
        $geo = array();
        if ($rq !== false) {
            $geo = json_decode($rq);
        }
       
        
        $this->data['data'] = date('Y-m-d H:i:s');
        $this->data['pagina'] = $this->uri;
        $this->data['ip'] = $this->ip;
        $this->data['cidade'] = (isset($geo->city)) ? $geo->city : 'Desconhecida';
        $this->data['regiao'] = (isset($geo->regionName)) ? $geo->regionName : 'Desconhecida';
        $this->data['pais'] = (isset($geo->country)) ? $geo->country : 'Desconhecida';
        $this->data['navegador'] = $this->_get_browser();
        $this->data['plataforma'] = $this->_get_platform();
        $this->data['referencia'] = $this->_get_referer();
        
        $this->_rec_data();
    }
    
    private function _get_browser(){
        require_once 'config/browsers.php';
        foreach($browsers as $key => $value){
            if(preg_match('|' . $key . '.*?([0-9\.]+)|i', $this->user_agent)){
                return $value;
            } 
        }
    }
    
    private function _get_platform(){
        require_once 'config/platforms.php';
        foreach($platforms as $key => $value){
            if(preg_match('|' . preg_quote($key). '|i', $this->user_agent)){
                return $value;
            } 
        }
    }
    
    private function _get_referer(){
        $referer = filter_input(INPUT_SERVER, 'HTTP_REFERER', FILTER_VALIDATE_URL);
        $referer_host = parse_url($referer, PHP_URL_HOST);
        $host = filter_input(INPUT_SERVER, 'SERVER_NAME');
        
        
        if(!$referer){
            $retorno = 'Acesso direto';
        }elseif($referer_host == $host){
            $retorno = 'Navegação Interna';
        }else{
            $retorno = $referer;
        }
        
        return $retorno;
    }
    
    private function _rec_data(){
        $sql = "INSERT INTO trafego (data, pagina, ip, cidade, regiao, pais, navegador, referencia, plataforma)"
              ."VALUES (:data, :pagina, :ip, :cidade, :regiao, :pais, :navegador, :referencia, :plataforma)";
        $query = $this->db->prepare($sql);
        $query->execute($this->data);
        
        
    }
    
    
    
    
    
    
    
    
    
    
    
}