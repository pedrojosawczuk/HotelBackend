<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>☕ Reserva</title>
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
            <h2>Fazer cadastro</h2>
            <?= @$message ?>
        <br>

       
        <form action="index.php?action=userinsert" method="POST">
        <label for="">Dados Pessoais <fieldset>
                <label for="Nome">Nome <input type="text" placeholder="Nome" name="nome"></label>
        </fieldset>
        </label>

        <br>

        <label for="">Dados de Login<fieldset  class="forms">
                 
                <label for="E-mail">E-mail <input type="email" placeholder="contato@email.com" name="email"></label><br>
                <label for="DS">Senha: <input type="text" name="senha"></label> <br>
                <input class="button-sub" type="submit" value="Enviar">
                <a class="button-cad" href="index.php">Já possuo um login</a>
        </fieldset>
        </label>

    </form>
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