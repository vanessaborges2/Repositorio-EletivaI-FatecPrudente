<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 2 - Lista 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container py-3">
        <h1>Exercício 2 - Lista 2</h1>
        <form method="post">
            <div class="mb-3">
                <label for="numero" class="form-label">Informe um número:</label>
                <input type="number" id="numero" name="numero" class="form-control" required="">
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>

        <?php
            if($_SERVER['REQUEST_METHOD'] == "POST"){
                $numero = $_POST['numero'];
                switch($numero){
                    case 1:
                        echo "<p>Janeiro</p>";
                        break;
                    case 2:
                        echo "<p>Fevereiro</p>";
                        break;
                    case 3:
                        echo "<p>Março</p>";
                        break;
                    case 4:
                        echo "<p>Abril</p>";
                        break;
                    //Adicionar outros meses
                    default:
                        echo "<p>Número não possui mês correspondente!</p>";
                }
            }
        ?>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </div>
</body>

</html>