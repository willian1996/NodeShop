<?php
require_once 'classes/traffic.php';
new Traffic();
require_once 'includes/header.php';
?>
    <main class="principal">
        <article class="sobre">
            <h2>Sobre nós</h2>
            <img src="assets/img/loja.jpg" alt="NodeShop"/>
            <p>O que é Lorem Ipsum?
            Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica, permanecendo essencialmente inalterado. Se popularizou na década de 60, quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, e mais recentemente quando passou a ser integrado a softwares de editoração eletrônica como Aldus PageMaker.<br><br>
            Lorem Ipsum é simplesmente uma simulação de texto da indústria tipográfica e de impressos, e vem sendo utilizado desde o século XVI, quando um impressor desconhecido pegou uma bandeja de tipos e os embaralhou para fazer um livro de modelos de tipos. Lorem Ipsum sobreviveu não só a cinco séculos, como também ao salto para a editoração eletrônica, permanecendo essencialmente inalterado. Se popularizou na década de 60, quando a Letraset lançou decalques contendo passagens de Lorem Ipsum, e mais recentemente quando passou a ser integrado a softwares de editoração eletrônica como Aldus PageMaker.
            </p>
        </article>
        <aside class="onde-estamos">
            <h2>Onde estamos</h2>
            <p>R. Padre Anchieta, 767 - Centro, Caraguatatuba - SP</p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1109.4739378717882!2d-45.409834025921526!3d-23.622252231744962!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cd639eed7a86b3%3A0x1d64a45376897be0!2sR.+Padre+Anchieta%2C+767-763+-+Centro%2C+Caraguatatuba+-+SP!5e1!3m2!1spt-PT!2sbr!4v1552511114060"></iframe>
            <h2>Contatos</h2>
            <ul>
                <li><i class="fa fa-phone fa-lg">(12)99787-3350</i></li>
                <li><i class="fab fa-whatsapp fa-lg"></i>(12)91917-0000</li>
                <li><i class="fa fa-envelope fa-lg"></i>emailteste@hotmail.com</li>


            </ul>
        </aside>
    </main>
    <section class="newsletter">
        <h3>Newsletter</h3>
        <p>Receba nossas promoções por e-mail</p>
        <form method="post">
            <input type="text" placeholder="Seu nome">
            <input type="email" placeholder="Seu email">
            <button>Cadastrar</button>
        </form>
    </section>

<?php
require_once 'includes/footer.php';
?>
