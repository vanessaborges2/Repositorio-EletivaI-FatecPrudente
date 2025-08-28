<?php

    include("cabecalho.php");

    $i = 1;

    do {
        echo "<p>Número $i</p>";
        $i++;
    } while($i <= 5);

    include("rodape.php");