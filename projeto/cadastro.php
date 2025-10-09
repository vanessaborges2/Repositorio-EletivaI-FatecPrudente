<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Cadastro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
  <div class="container mt-5">
    <h2 class="mb-4">Cadastro de Usuário</h2>
    <form action="cadastro.php" method="POST">
      <div class="mb-3">
        <label for="nomeCadastro" class="form-label">Nome</label>
        <input type="text" class="form-control" id="nomeCadastro" name="nome" placeholder="Digite seu nome completo" required />
      </div>
      <div class="mb-3">
        <label for="emailCadastro" class="form-label">Email</label>
        <input type="email" class="form-control" id="emailCadastro" name="email" placeholder="Digite seu email" required />
      </div>
      <div class="mb-3">
        <label for="senhaCadastro" class="form-label">Senha</label>
        <input type="password" class="form-control" id="senhaCadastro" name="senha" placeholder="Digite uma senha" required />
      </div>
      <button type="submit" class="btn btn-success">Cadastrar</button>
    </form>
    <p class="mt-3">
      Já tem uma conta? 
      <a href="login.php">Faça login aqui</a>
    </p>
  </div>
  <?php
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        require("conexao.php");
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
        try{
            $stmt = $pdo->prepare("INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)");
            if($stmt->execute([$nome, $email, $senha])){
                header("location: index.php?cadastro=true");
            } else{
                header("location: index.php?cadastro=false");
            }
        } catch(Exception $e){
            echo "Erro ao executar o comando SQL: ".$e->getMessage();
        }

    }

    ?>
</body>
</html>
