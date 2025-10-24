<?php
    require("cabecalho.php");
    require("conexao.php");
    try{
        $stmt = $pdo->query("SELECT * FROM categoria");
        $categorias = $stmt->fetchAll();
        $stmt = $pdo->prepare("SELECT * FROM produto WHERE id = ?");
        $stmt->execute([$_GET['id']]);
        $produto = $stmt->fetch(PDO::FETCH_ASSOC);
    }catch(Exception $e){
        echo "Erro ao consultar categorias: ".$e->getMessage();
    }
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $descricao = $_POST['descricao'];
        $valor = $_POST['valor'];
        $categoria = $_POST['categoria'];
        $id = $_POST['id'];
        try{
            $stmt = $pdo->prepare("
                UPDATE produto SET descricao = ?, valor = ?, categoria_id = ?
                WHERE id = ?
            ");
            if($stmt->execute([$descricao, $valor, $categoria, $id])){
                header("location: produtos.php?editar=true");
            }else{
                header("location: produtos.php?editar=false");
            }
        } catch(Exception $e){
            echo "Erro ao editar: ".$e->getMessage();
        }
    }

?>

<h1>Editar Produto</h1>
<form method="post">
    <input type="hidden" name="id" value="<?= $produto['id'] ?>">
    <div class="mb-3">
        <label for="descricao" class="form-label">Informe a descrição</label>
        <textarea id="descricao" name="descricao" class="form-control" rows="4" required=""><?= $produto['descricao'] ?></textarea>
    </div>
    <div class="mb-3">
        <label for="valor" class="form-label">Informe o valor</label>
        <input value="<?= $produto['valor'] ?>" type="number" id="valor" name="valor" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="categoria" class="form-label">Selecione a categoria</label>
        <select id="categoria" name="categoria" class="form-select" required="">
            <?php foreach ($categorias as $a): ?>
                <option value="<?= $a['id'] ?>"  
                        <?= $a['id'] == $produto['categoria_id'] ? "selected" : "" ?> >  
                    <?= $a['nome'] ?>  
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php
    require("rodape.php");
?>