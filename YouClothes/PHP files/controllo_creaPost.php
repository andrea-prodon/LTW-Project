<?php
//per distruggere la sessione e quindi fare il logout
    session_start();
    if(isset($_SESSION['nickname'])){
        header('location: ../CreaPost/creapost.html');
    }
    echo "<html>

    <head>
        <link rel=stylesheet href=../stile.css type=text/css>
        <title>ERRORE</title>
        <meta charset=utf-8>
        <meta name=viewport content=width=device-width, initial-scale=1>
    </head>


    <body class=bordo>

        <p align=center> <br><br><br><br>
            <titolo>Non puoi pubblicare un annuncio se ancora non hai fatto il login!</titolo> <br><br>
            <sottotitolo>
                Crea un account premendo
                <a href=../Registrazione/signup.php>QUI </a>
            </sottotitolo> <br><br>
            <sottotitolo> 
                Oppure effettua il 
                <a href=../Registrazione/login.php>LOGIN </a>
            </sottotitolo> <br><br>
            <sottotitolo> 
                Oppure
                <a href=../Home/homepage.php>Torna Home </a>
            </sottotitolo> <br><br>
        </p>

    </body>

    </html>";
?>