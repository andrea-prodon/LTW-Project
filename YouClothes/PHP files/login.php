<?php
     $dbconn = pg_connect("host=localhost port=5432 dbname=YouClothes user=postgres password=edoardo97")
     or die('Could not connect: '.pg_last_error());
     $email = $_POST['email'];   //prendo il parametro 'email' della form inviata
     $q1 = "select * from utente where email=$1";  //il risultato della query viene inserito dentro $1
     $result = pg_query_params($dbconn,$q1,array($email));   //funzione per far effettuare le query e inserire i risultati dentro array (in questo caso solo 1: email)
     //controllo se utente con 'email'  non esiste
     if(!($line=pg_fetch_array($result,null,PGSQL_ASSOC))){ //ovvero controllo che l'oggetto non esiste (not pg_fet...)
        echo "<html>

                <head>
                    <link rel=stylesheet href=../stile.css type=text/css>
                    <title>ERRORE</title>
                    <meta charset=utf-8>
                    <meta name=viewport content=width=device-width, initial-scale=1>
                </head>
            
            
                <body class=bordo>
            
                    <p align=center> <br><br><br><br>
                        <titolo>Sembra che il tuo account non esista oppure l'email immessa è errata!</titolo> <br><br>
                        <sottotitolo>
                            Crea un account premendo
                            <a href=../Registrazione/signup.html>QUI </a>
                        </sottotitolo> <br><br>
                        <sottotitolo> 
                            Oppure ritenta il
                            <a href=../Registrazione/login.html>LOGIN </a>
                        </sottotitolo> <br><br>
                    </p>
            
                </body>
            
            </html>";
    }
    //se esiste utente con 'email', allora controllo se la password è corretta
    else{
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $q1 = "select * from utente where email=$1 and password=$2";
        $result = pg_query_params($dbconn,$q1,array($email,$pass));
        if($line=pg_fetch_array($result,null,PGSQL_ASSOC)){
            /*echo "<h1>
            Bene! Hai appena effettuato il Login! <br><br>
            Premi 
            <a href=../Home/homepage.html>QUI </a>
            per iniziare a usare il sito YouClothes!
            </h1>";*/

            //

            echo "<html>

            <head>
                <link rel=stylesheet href=../stile.css type=text/css>
                <title>LOGIN EFFETTUATO</title>
                <meta charset=utf-8>
                <meta name=viewport content=width=device-width, initial-scale=1>
            </head>
        
        
            <body class=bordo>
        
                <p align=center> <br><br><br><br>
                    <titolo>Hai appena effettuato il LOGIN!</titolo> <br><br>
                    <sottotitolo>
                        Premi
                        <a href=../Home/homepage.html>QUI </a>
                        per iniziare ad usare il sito YouClothes!
                    </sottotitolo> <br><br>
                </p>
        
            </body>
        
        </html>";
        //
        }
        //se la password non è corretta
        else{
            /*echo "<h1>
            La Password non è corretta! 
            <br><br>
            Scegliere una delle opzioni sottostanti: <br>
            <a href=../Registrazione/login.html>RIPROVA LOGIN </a>&nbsp;&nbsp; 
            <a href=../Home/homepage.html>RITORNA AL SITO </a>&nbsp;&nbsp;";
            */
            //
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
                        La Password non è corretta!
                    </titolo><br><br>
                    <sottotitolo>
                        Scegli una delle opzioni sottostanti: 
                    </sottotitolo><br><br>
                    <sottotitolo>
                        <a href=../Registrazione/login.html>RIPROVA LOGIN </a>&nbsp;&nbsp; 
                        <a href=../Home/homepage.html>RITORNA AL SITO </a>&nbsp;&nbsp;
                    <sottotitolo>

            </body>
            </html>";
            //
        }
    }
?>
