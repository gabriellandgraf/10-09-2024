<?php
session_start();

include 'db_connect.php';

// Verificar se o usuário já está logado
if (isset($_SESSION['usuario_id'])) {
    header('Location: index.php'); // Redirecionar para a página inicial se já estiver logado
    exit();
}

// Processar o login se o formulário for enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Consultar o banco de dados para verificar as credenciais do usuário
    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $usuario = $result->fetch_assoc();

        // Verificar se a senha está correta
        if (password_verify($senha, $usuario['senha'])) {
            // Definir o ID do usuário na sessão para marcá-lo como logado
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['user_name'] = $usuario['nome'];

            // Redirecionar para a página original se o parâmetro 'redirect' estiver presente
            if (isset($_GET['redirect'])) {
                header('Location: ' . $_GET['redirect']);
            } else {
                header('Location: index.php'); // Redirecionar para a página inicial se não houver redirecionamento específico
            }
            exit();
        } else {
            $erro = "Senha incorreta. Tente novamente.";
        }
    } else {
        $erro = "Usuário não encontrado. Verifique o email e tente novamente.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
</head>
<body>
<?php include 'header.php'; ?>

<div class="container mt-4">
    <h2>Login</h2>
    <?php if (isset($erro)): ?>
        <div class="alert alert-danger"><?php echo $erro; ?></div>
    <?php endif; ?>
    <form action="login.php<?php echo isset($_GET['redirect']) ? '?redirect=' . urlencode($_GET['redirect']) : ''; ?>" method="post">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" required>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


<!--
    1) Qual é a verificação inicial feita no arquivo login.php ao ser acessado e como o sistema lida com um usuário já logado?
    2) Como o sistema processa o login quando o formulário é enviado e como ele lida com credenciais incorretas?
    3) Como o sistema lida com o redirecionamento após um login bem-sucedido?
    4)  Como são exibidas as mensagens de erro na página de login e qual é a condição para que essas mensagens apareçam?

    respostas: 

    1) No arquivo login.php, a verificação inicial geralmente checa se o usuário já está logado usando funções como is_user_logged_in(). Se o usuário estiver logado, o sistema redireciona-o para uma página apropriada, como a página inicial ou o painel do usuário, evitando a exibição da tela de login novamente.
    
    2) Quando o formulário de login é enviado, o sistema processa o login verificando as credenciais fornecidas (usuário e senha) com os dados armazenados no banco de dados. Se as credenciais estiverem corretas, o usuário é autenticado e redirecionado para uma página apropriada. Caso as credenciais estejam incorretas, o sistema exibe uma mensagem de erro, solicitando que o usuário tente novamente.

    3) Após um login bem-sucedido, o sistema geralmente redireciona o usuário para uma página específica, como a página inicial ou o painel do usuário, usando funções como wp_redirect() no WordPress ou header('Location: ...') em PHP. O redirecionamento é feito para garantir que o usuário seja levado à área apropriada após a autenticação.

    4) Após um login bem-sucedido, o sistema redireciona o usuário para uma página específica, como a página inicial ou o painel, usando funções como wp_redirect() no WordPress ou header('Location: ...') em PHP.
 -->