<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estacionamento</title>

    <style><?php include 'css/style.css'; ?></style>
    <link rel="shortcut icon" href="/images/alienmonster-svgrepo-com.svg" type="image/x-icon">
</head>
<body>
<header>
    <h1 class="title"><a href="/">Estacionamento</a></h1>
    <nav>
        <ul>
            <?php if($_SESSION['logado']): ?>
            <li><a href="/login">Bem vindo!</a></li>
            <li><a href="#">Tecnologia</a></li>
        <?php else: ?>
            <li><a href="/login">Logue ou cadastre-se aqui!</a></li>
            <li><a href="#">Tecnologia</a></li>
            <?php endif ?>
        </ul>
    </nav>
    </header>
