<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>☕Criar Acomodação</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <link rel="stylesheet" href="Front/styles/main.css">
</head>
<body>
    <header>
        <a class="title" href=""><h1>Hotel Spa Le Calendal</h1></a>
        <section>
            <nav>
              <ul class="tab-container">
                <li><a href="list-reservas.php">Reservas</a></li>
                <li><a class="tab-selected" href="list-acomodacoes.php">☕ Acomodações</a></li>
               </ul>
            </nav>
          </section>
       
    </header>
    <main>
        <aside>
            <img class="prop-img" src="../Imagens/propag27.jpg" alt="Propaganda">
        </aside>
        <div>
            <div class="header-body">
                <h2>Lista de Acomodações</h2>
                <a class="button-sub" style="margin-left: 16px;" href="create-acomodacoes.php">Criar Acomodação</a>
            </div>
            
            <div>
                <?php
                    foreach( $acomodacoes as $index => $acomodacao) : ?>
                    <div>
                        <h3><?= $acomodacao -> id ?></h3>
                    </div>
                <?php endforeach; ?>
            </div>

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