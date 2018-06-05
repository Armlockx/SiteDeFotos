<!DOCTYPE html>
<!-- Estrutura Site  -->
<html>
<head>
    <?php require_once("../libraries/head.php"); ?>
    <meta charset="UTF-8">
    <title>Joseph Fotografias</title>
    <meta name="author" content="Joseph">
    <link rel="shortcut icon" href="Images/Favicon.ico" type="image/x-icon">
    <meta name="description" content="Empresa de fotos">
    <meta name="keywords" content="fotos, empresa, joseph, RS">
    <script src="../libraries/jquery.cycle.all.js" type="text/javascript"></script>
</head>

<body>
<!--nossa classe ind-slide vai chamar a função cycle-->
<script type="text/javascript">
    $(document).ready(function () {

        $('.ind-slide').cycle({
            fx: 'fade'
        })

    });
</script>

<header>
    <?php require_once("../libraries/body.php"); ?>

    <!-- Imagens do Slide -->
    <div class="ind-slide">
            <img src="../images/slide.jpg" alt="WF - Slide 1" title=" WF - Slide 1">
            <img src="../images/slide2.jpg" alt="WF - Slide 2" title="WF - Slide 2">
    </div>

</header>

<!-- Anúncio das fotos -->
<main>
    <div class="ind-anuncio" id="anunc">
        <div class="ind-anuncio-title">Foto 1</div>
        <div class="ind-anuncio-image"><img src="../Images/man_bench.jpg" alt="foto 1"></div>
        <div class="ind-anuncio-texto">Deserto<br>Esperando pelo ônibus no deserto</div>
    </div>

    <div class="ind-anuncio">
        <div class="ind-anuncio-title">Foto 2</div>
        <div class="ind-anuncio-image"><img src="../Images/man_bench.jpg" alt="foto 2"></div>
        <div class="ind-anuncio-texto">Deserto<br>Esperando pelo ônibus no deserto</div>
    </div>

    <div class="ind-anuncio">
        <div class="ind-anuncio-title">Foto 3</div>
        <div class="ind-anuncio-image"><img src="../Images/man_bench.jpg" alt="foto 3"></div>
        <div class="ind-anuncio-texto">Deserto<br>Esperando pelo ônibus no deserto</div>
    </div>

    <div class="ind-anuncio">
        <div class="ind-anuncio-title">Foto 4</div>
        <div class="ind-anuncio-image"><img src="../Images/man_bench.jpg" alt="foto 3"></div>
        <div class="ind-anuncio-texto">Deserto<br>Esperando pelo ônibus no deserto</div>
    </div>

</main>

<!--Rodapé-->
<footer>
    <?php require_once("../libraries/footer.php"); ?>
</footer>

</body>
</html>
