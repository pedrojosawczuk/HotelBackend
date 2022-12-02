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
              <li><a href="list-reservas.php">Reservas</a></li>
                <li><a class="tab-selected" href="list-acomodacoes.php">Acomodações</a></li>
                <li><a class="tab-selected" href="list-acomodacoes.php">☕ Tarifa</a></li>
                <li><a class="tab-selected" href="list-acomodacoes.php">Usuarios</a></li>
               </ul>
            </nav>
          </section>
       
    </header>
    <main>
        <aside>
            <img class="prop-img" src="../Imagens/propag27.jpg" alt="Propaganda">
        </aside>
        <div>
            <h2>Criar Tarifa</h2>

        <br>

        <label for="">Dados do Tarifa<fieldset  class="forms">
            <form action="Responsavel">
                <label for="DE">Id: <input type="number"></label> <br>
                <label for="DS">Preço: <input type="number"></label> <br>
                <label for="DS">Tipo de quarto: <select name="Tipo" id="type">
                    <option value="stand">Standard</option>
                    <option value="lux">Luxo</option>

                </select></label> <br>
                <input class="button-sub" type="submit" value="Criar">
                <a class="button-cad" href="list-tarifas.php">Cancelar</a>
            </form>
        </fieldset>
        </label>

        </div>

        <aside>
            <img class="prop-img" src="../Imagens/propag27.jpg" alt="Propaganda">
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