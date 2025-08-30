<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="entrar">
        <p>Bem-vindo</p>
        <form action="/public/index.php" method="post">
            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="senha">Senha</label>
            <input type="password" id="senha" name="senha" required>
            <br>
            <button type="submit">Entrar</button>
        </form>
    </div>

</body>
</html>