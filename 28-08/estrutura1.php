<?php

    include("cabecalho.php");

    $valor = 10;
    //   >    <    >=     <=   !=    ==    ===
    //       &&-e       ||-ou      !-não
    if(($valor > 20) && ($valor < 30)){
        echo "Valor maior que 20 e menor que 30!";
    } else {
        echo "Valor menor ou igual a 20!";
    }

    include("rodape.php");
?>
