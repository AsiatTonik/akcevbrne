<html>
    <head>
        <?= $this->include("layout/head");?>
        <?= $this->include("layout/styling");?>
    </head>
    <body>
        <?= $this->include("layout/header");?>
        <div class="container">
        <?= $this->renderSection("content");?>
        <?= $this->include("layout/footer");?>
    </body>
</html>