<?php include __DIR__ . '/../header.php' ?>
<div class="login-container">
    <img src="https://images.unsplash.com/photo-1644467703333-a382f7bbc4b9?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2071&q=80"
         alt="imagem">
    <div class="form-login">
        <div>
            <a href="/login">Login</a>
            <a href="/cadastrar">Cadastre-se</a>
        </div>
        <form action="/register" method="POST">
            <h1><?=$titulo?></h1>
            <fieldset class="campo-user">
                <label for="email">
                    <span>Email</span>
                    <input type="text" name="email">
                </label>
                <label for="senha">
                    <span>Senha</span>
                    <input type="password" name="senha">
                </label>
                <button class="login-btn">Login</button>
                <a href="">Esqueceu a senha?</a>
            </fieldset>
        </form>
    </div>
</div>
<?php include __DIR__ . '/../footer.php' ?>
