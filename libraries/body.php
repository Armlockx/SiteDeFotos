<!-- basta mudar um arquivo que todas as páginas serão alteradas -->

<!-- Menu -->
<div class="indtop"> </div>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="../views/sobrenos.php">Sobre nós</a></li>
            <li><a href="#anunc">Anúncios</a></li>
            <li><a href="contatos">Contato</a></li>
            <li><a href="../pages/login.php">Cadastre-se</a></li>
        </ul>
    </nav>

<!-- div que contém img do botão caso a tela fique para smartphone-->
<div class="indbotao">
    <img  src="../images/botao.png" alt="Botão mobile" title="Botão mobile">
</div>

<!-- tag "picture" serve para criação de imagens responsivas -->
<div class="indlogo">
    <picture>
        <source media="(max-width: 480px)" srcset="../images/indlogo.png">
        <source media="(min-width: 481px) and (max-width 768px)" srcset="../images/indlogo.png">
        <source media="(min-width: 769px)" srcset="../images/logo6.png">
        <img src="../images/logo6.png" alt="logomarca joseph" title="logomarca joseph">
    </picture>
</div>