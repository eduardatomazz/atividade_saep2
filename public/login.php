<?php

$mysqli = new mysqli("localhost", "root", "", "login_db");
if ($mysqli->connect_errno) {
    die("Erro de conexão: " . $mysqli->connect_error);
}

session_start();

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}

$msg = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST["nome"] ?? "";
    $senha = $_POST["senha"] ?? "";

    $stmt = $mysqli->prepare("SELECT id_professor, nome_professor, senha_professor FROM professor WHERE nome=? AND senha=?");
    $stmt->bind_param("ss", $nome, $senha);
    $stmt->execute();
    $result = $stmt->get_result();
    $dados = $result->fetch_assoc();
    $stmt->close();

    if ($dados) {
        $_SESSION["user_id"] = $dados["id"];
        $_SESSION["nome"] = $dados["nome"];
        header("Location: login.php");
        exit;
    } else {
        $msg = "Usuário ou senha incorretos!";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/public/style.css">
</head>
<body>

<?php if (!empty($_SESSION["user_id"])): ?>   
    <div class="entrar">
        <p>Bem-vindo</p>
        <p>Sessão ativa.</p>
    <p><a href="?logout=1">Sair</a></p>
    </div>

<?php else: ?>
    <div class="entrar">
        <h3>Login</h3>
        <?php if ($msg): ?><p class="msg"><?= $msg ?></p><?php endif; ?>
        <form method="post">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" required>
            <br>
            <button type="submit">Entrar</button>
        </form>
    </div>
<?php endif; ?>

</body>
</html>