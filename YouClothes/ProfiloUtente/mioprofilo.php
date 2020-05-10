<?php
    session_set_cookie_params(0);   //così quando chiudo la pagina la sessione si chiude
    session_start();
    if (isset($_SESSION["nickname"])) {
        $nickname=$_SESSION["nickname"];
        $dbconn = pg_connect("host=localhost port=5432 dbname=YouClothes user=postgres password=edoardo97")
        or die('Could not connect: '.pg_last_error());
        $q1 = "select * from utente where nickname=$1";
        $result = pg_query_params($dbconn,$q1,array($nickname));
        if($line=pg_fetch_array($result,null,PGSQL_ASSOC)){
            $q1 = "select * from utente where nickname=$1";
            $result = pg_query_params($dbconn,$q1,array($nickname));
            $line=pg_fetch_array($result,null,PGSQL_ASSOC);
            $nome=$line["nome"];
            $cognome=$line["cognome"];
            $email=$line["email"];
            $citta=$line["citta"];
            $datanascita=$line["dataNascita"];
        }
        echo "<html>

        <head>
            <link rel=stylesheet href=../stile.css type=text/css>
            <title>Profilo personale</title>
            <meta charset=utf-8>
            <meta name=viewport content=width=device-width, initial-scale=1>
        </head>
    
    
        <body class=bordo>
            <br><br>
            <p align=center><br><br><br>
                <titolo>
                    Il tuo profilo:
                </titolo><br><br><br><br>
                <sottotitolo>
                    Nome: $nome<br><br>
                    Cognome: $cognome<br><br>
                    Email: $email<br><br>
                    Data di nascita: $datanascita<br><br>
                    Città: $citta<br><br>
                </sottotitolo><br>
                <a href=../Home/homepage.php>Indietro</a>&nbsp;&nbsp;

        </body>
        </html>"; 

    }
    else {
        echo "<html>
        <head>
            <link rel=stylesheet href=../stile.css type=text/css>
            <title>ERRORE</title>
            <meta charset=utf-8>
            <meta name=viewport content=width=device-width, initial-scale=1>
        </head>
    
    
        <body class=bordo>

            <p align=center><br><br><br>
                <titolo>
                    Sembra che tu non abbia effettuato l'accesso!
                </titolo><br><br>
                <sottotitolo>
                    Scegli una delle opzioni sottostanti: 
                </sottotitolo><br><br>
                <sottotitolo>
                    <a href=../Home/homepage.php>RITORNA AL SITO</a>&nbsp;&nbsp;
                    <a href=../Registrazione/login.html>EFFETTUA L'ACCESSO</a>&nbsp;&nbsp; 
                    <a href=../Registrazione/signup.html>REGISTRATI</a>&nbsp;&nbsp; 
                <sottotitolo>

        </body>
        </html>"; 

    }

?>
