<?php
date_default_timezone_set('America/Sao_Paulo');

class Traffic{
    private $db;
    private $ip;
    private $data;
    private $uri;
    
    public function __construct(){
        $this->db = new PDO("mysql:host=localhost;dbname=bd_grafico;charset=utf8", "root", "");
        
        $this->uri = filter_input(INPUT_SERVER, 'REQUEST_URI', FILTER_DEFAULT);
        $this->ip = '177.137.32.58';//filter_input(INPUT_SERVER, 'REMOTE_ADDR', FILTER_VALIDATE_IP);
        $cookie = filter_input(INPUT_COOKIE, md5($this->uri), FILTER_DEFAULT);
        
//        if(!$cookie){
//            $this->_set_cookie();   
//        }
        
        $this->_rec_data();
        
        
    }
    
    private function _set_cookie(){
        setcookie(md5($this->uri, TRUE, strtotime(date('Y-m-d 23:59:59'))));
    }
    
    private function _rec_data(){
        
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
        $this->data['cidade'] = (isset($geo->city)) ? $geo->city : 'Desconhecida';
        $this->data['regiao'] = (isset($geo->regionName)) ? $geo->regionName : 'Desconhecida';
        $this->data['pais'] = (isset($geo->country)) ? $geo->country : 'Desconhecida';
        
        var_dump($this->data);
        die;
        
    }
    
    
    
    
    
    
    
    
    
    
    
}