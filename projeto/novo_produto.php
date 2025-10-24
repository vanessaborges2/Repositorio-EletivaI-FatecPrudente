<?php
    require("cabecalho.php");
    require("conexao.php");
    try{
        $stmt = $pdo->query("SELECT * FROM categoria");
        $categorias = $stmt->fetchAll();
    }catch(Exception $e){
        echo "Erro ao consultar categorias: ".$e->getMessage();
    }
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $descricao = $_POST['descricao'];
        $valor = $_POST['valor'];
        $categoria = $_POST['categoria'];
        try{
            $stmt = $pdo->prepare("
                INSERT INTO produto (descricao, valor, categoria_id) VALUES
                (?, ?, ?)
            ");
            if($stmt->execute([$descricao, $valor, $categoria])){
                header("location: produtos.php?cadastro=true");
            }else{
                header("location: produtos.php?cadastro=false");
            }
        } catch(Exception $e){
            echo "Erro ao inserir: ".$e->getMessage();
        }
    }

?>

<h1>Novo Produto</h1>
<form method="post">
    <div class="mb-3">
        <label for="descricao" class="form-label">Informe a descrição</label>
        <textarea id="descricao" name="descricao" class="form-control" rows="4" required=""></textarea>
    </div>
    <div class="mb-3">
        <label for="valor" class="form-label">Informe o valor</label>
        <input type="number" id="valor" name="valor" class="form-control" required="">
    </div>
    <div class="mb-3">
        <label for="categoria" class="form-label">Selecione a categoria</label>
        <select id="categoria" name="categoria" class="form-select" required="">
            <?php foreach ($categorias as $a): ?>
                <option value="<?= $a['id'] ?>">  <?= $a['nome'] ?>  </option>
            <?php endforeach; ?>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>

<?php
    require("rodape.php");
?>