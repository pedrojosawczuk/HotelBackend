<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>☕Criar Tarifa</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <link rel="stylesheet" href="../styles/main.css">
</head>
<body>
    <header>
        <a class="title" href=""><h1>Hotel Spa Le Calendal</h1></a>
        <section>
            <nav>
            <ul class="tab-container">
                <li><a href="index.php?action=listacomoda">Reservas</a></li>
                <li><a class="tab-selected" href="index.php?action=listacomoda">Acomodações</a></li>
                <li><a class="tab-selected" href="index.php?action=listtarifa">☕ Tarifa</a></li>
                <li><a class="tab-selected" href="index.php?action=listuser">Usuarios</a></li>
                <li><a href="index.php?action=logOut">Sair</a></li>
               </ul>
            </nav>
          </section>
       
    </header>
    <main>
        <aside>
            <img class="prop-img" src="Front/Imagens/propag27.jpg" alt="Propaganda">
        </aside>
        <div>
            <h2>Criar Tarifa</h2>

        <br>

        <label for="">Dados do Tarifa<fieldset  class="forms">
            <form action="?action=createtarefa">
                <label for="DS">Preço: <input type="number" name="preco"></label> <br>
                <label for="DS">Tipo de quarto: <input type="number" name="tipo_acomodacoes"></label> <br>
                <input class="button-sub" type="submit" value="Criar">
                <a class="button-cad" href="list-tarifas.php">Cancelar</a>
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