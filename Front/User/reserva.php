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
        <a class="title" href="index.php?action=userhomepage"><h1>Hotel Spa Le Calendal</h1></a>
        <section>
            <nav>
            <ul class="tab-container">
                    <li><a href="index.php?action=userhotelview">O Hotel</a></li>
                    <li class="tab-selected"><a href="index.php?action=usercreatereserva">☕ Reserva</a></li>
                    <li><a href="index.php?action=useracomoda">Acomodações</a></li>
                </ul>
            </nav>
        </section>
    </header>
    <main>
        <aside>
            <img class="prop-img" src="../Imagens/propag27.jpg" alt="Propaganda">
        </aside>
        <div>
            <h2>Reserva Online</h2>

        <br>

       
        <label for="">Responsavel <fieldset>
            <form action="Responsavel">
                <label for="Nome">Nome <input type="text" placeholder="Nome"></label> 
                <label for="E-mail">E-mail <input type="email" placeholder="contato@email.com"></label>
                <label for="Tel">Telefone <input type="tel" placeholder="99 99999-9999"></label>
            </form>
        </fieldset>
        </label>

        <br>

        <label for="">Dados da Reserva<fieldset  class="forms">
            <form action="Responsavel">
                <label for="DE">Data de Entrada: <input type="date"></label> <br>
                <label for="DS">Data de Saida: <input type="date"></label> <br>
                <label for="Tel">Adultos: <input type="number" value="1"></label><br>
                <label for="Tel">Crianças: <input type="number" value="0"></label><br>
                <label for="Tel">Acomodações:<select id="quartos" name="quartos"><br>
                     <?php foreach ($acomodacoes as $index => $acomodacao) : ?>
                    <option value="<?= $acomodacao -> id ?>">
                    <?= $acomodacao -> id ?></option>
                    <?php endforeach; ?>
                  </select>
                </label><br><br>
                <input class="button-sub" type="submit" value="Enviar">
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