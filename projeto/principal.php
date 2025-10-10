<?php
    require("cabecalho.php");
?>
    <h1>Seja bem vinda(o) <?= $_SESSION['nome'] ?></h1>
    <h6><a href="logout.php">Sair</a></h6>
<?php
  require("rodape.php");
?>