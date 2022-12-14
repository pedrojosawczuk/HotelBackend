<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>☕ Login</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <link rel="stylesheet" href="Front/styles/main.css">
</head>
<body>
    <header>
        <a class="title" href=""><h1>Hotel Spa Le Calendal</h1></a>
    </header>
    <main>
        <aside>
            <img class="prop-img" src="Front/Imagens/propag27.jpg" alt="Propaganda">
        </aside>
        <div>
            <h2>Login</h2>
            <?= @$message ?>
        <br>

        <br>

    <fieldset  class="forms">
            <form action="index.php?action=userlogin" method="POST">
                <label for="DE">Usuario: <input type="text" name="email"></label> <br>
                <label for="DS">Senha: <input type="text" name="senha"></label> <br>
                <input class="button-sub" type="submit" value="Enviar">
                <a class="button-cad" href="index.php?action=usercadastro">Primeiro acesso</a>
            </form>
        </fieldset>
        </label>

        </div>

        <aside>
            <img class="prop-img" src="Front/Imagens/propag27.jpg" alt="Propaganda">
        </aside>
    </main>
    <footer>
        <p>
            Hotel Spa Le Calendal - 2022 <br>
            5 Rue Prte de Laure, 13200 Arles, França <br>
            Tel: +33 4 90 96 11 89
            Email: contato@email.com.br
        </p>
    </footer>
    
    
</body>
</html>