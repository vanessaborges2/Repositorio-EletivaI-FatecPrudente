<?php
    require("cabecalho.php");
    require("conexao.php");
    try{
        $stmt = $pdo->query("SELECT * FROM categoria");
        $dados = $stmt->fetchAll();
    } catch(\Exception $e){
        echo "Erro: ".$e->getMessage();
    }
    if (isset($_GET['cadastro']) && $_GET['cadastro']){
        echo "<p class='text-success'>Cadastro realizado!</p>";
    } else if (isset($_GET['cadastro']) && !$_GET['cadastro']){
        echo "<p class='text-danger'>Erro ao cadastrar!</p>";
    }
?>

<h2>Categorias</h2>
<a href="nova_categoria.php" class="btn btn-success mb-3">Novo Registro</a>
<table class="table table-hover table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($dados as $d):
        ?>
        <tr>
            <td><?= $d['id'] ?></td>
            <td><?= $d['nome'] ?></td>
            <td class="d-flex gap-2">
                <a href="#" class="btn btn-sm btn-warning">Editar</a>
                <a href="#" class="btn btn-sm btn-info">Consultar</a>
            </td>
        </tr>
        <?php
            endforeach;
        ?>
    </tbody>
</table>


<?php
require("rodape.php");
?>