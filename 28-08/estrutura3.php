<?php

    include("cabecalho.php");

    //1-Domingo    2-Segunda....
    $diaSemana = 3;

    switch($diaSemana){
        case 1:
            echo "Hoje é domingo!";
            break;
        case 2:
            echo "Hoje é segunda!";
            break;
        case 3:
            echo "Hoje é terça!";
            break;
        default:
            echo "Hoje pode ser quarta, quinta, sexta ou sábado!";
    }

    include("rodape.php");