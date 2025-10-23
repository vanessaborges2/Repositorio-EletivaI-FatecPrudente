<?php
    require("cabecalho.php");
    require("conexao.php");
    if($_SERVER['REQUEST_METHOD'] == "GET"){
        try{
            $stmt = $pdo->prepare("SELECT * from categoria WHERE id = ?");
            $stmt->execute([$_GET['id']]);
            $categoria = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e){
            echo "Erro ao consultar categoria: ".$e->getMessage();
        }
    }
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $nome = $_POST['nome'];
        $id = $_POST['id'];
        try{
            $stmt = 
                $pdo->prepare("UPDATE categoria set nome = ? WHERE id = ?");
            if($stmt->execute([$nome, $id])){
                header('location: categorias.php?editar=true');
            } else {
                header('location: categorias.php?editar=false');
            }
        }catch(\Exception $e){
            echo "Erro: ".$e->getMessage();
        }
    }
?>

    <h1>Editar Categoria</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?= $categoria['id'] ?>">
        <div class="mb-3">
            <label for="nome" class="form-label">Informe o nome da categoria:</label>
            <input value="<?= $categoria['nome']?>" type="text" id="nome" name="nome" class="form-control" required="">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

<?php
    require("rodape.php");
?>