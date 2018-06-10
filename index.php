<!--Para redirecionar a visualização do site para a views/index.php conforme o padrão de layout MVC
arquivo .htacess que será responsável pelas URL AMIGÁVEIS, importante para motores de busca-->
<?php
header ("HTTP/1.1 301 Moved Permanently");
header ("location: views/");