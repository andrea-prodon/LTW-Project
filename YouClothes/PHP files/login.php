<?php
    session_start();    //serve sempre quando vuoi ricavare qualcosa dalla sessione (quindi lo devi inserire in tutte quelle pagine in cui vuoi accedere alla sessione)
     $dbconn = pg_connect("host=localhost port=5433 dbname=YouClothes user=postgres password=edoardo97")
     or die('Could not connect: '.pg_last_error());
     if(!(isset($_POST['loginButton']))){   //questa pagina può essere acceduta solo se si preme il tasto 'Login' e non da URL
         header('location: ../Home/homepage.php');
     }
     $email = $_POST['email'];   //prendo il parametro 'email' della form inviata
     $q1 = "select * from utente where email=$1";  //il risultato della query viene inserito dentro $1
     $result = pg_query_params($dbconn,$q1,array($email));   //funzione per far effettuare le query e inserire i risultati dentro array (in questo caso solo 1: email)
     //controllo se utente con 'email'  non esiste
     if(!($line=pg_fetch_array($result,null,PGSQL_ASSOC))){ //ovvero controllo che l'oggetto non esiste (not pg_fetch...)
        echo "<html>

                <head>
                    <link rel='stylesheet' href='../stile.css' type=text/css>
                    <title>ERRORE</title>
                    <meta charset=utf-8>
                    <meta name=viewport content=width='device-width, initial-scale=1'>
                </head>
            
            
                <body class='bordo sfondo'>
                <br><br><br><br>
                    <table bgcolor='white' align='center'>
                        <td>
                            <p align=center> 
                                <titolo>Sembra che il tuo account non esista oppure l'email immessa è errata!</titolo> <br><br>
                                <sottotitolo>
                                    Crea un account premendo
                                    <a href=../Registrazione/signup.php>QUI </a>
                                </sottotitolo> <br><br>
                                <sottotitolo> 
                                    Oppure ritenta il
                                    <a href=../Registrazione/login.php>LOGIN </a>
                                </sottotitolo> <br><br>
                            </p>
                        </td>
                    </table>
            
                </body>
            
            </html>";
    }
    //se esiste utente con 'email', allora controllo se la password è corretta
    else{
        $email = $_POST['email'];
        $pass = md5($_POST['password']);
        $q1 = "select * from utente where email=$1 and password=$2";
        $result = pg_query_params($dbconn,$q1,array($email,$pass));

        if($line=pg_fetch_array($result,null,PGSQL_ASSOC)){
            $q1 = "select * from utente where email=$1";
            $result = pg_query_params($dbconn,$q1,array($email));
            $line=pg_fetch_array($result,null,PGSQL_ASSOC);
            $_SESSION["nickname"]=''.$line["nickname"].'';
            $_SESSION["email"]=''.$line["email"].'';

            $q1="select saldo from utente where nickname ='$_SESSION[nickname]'";

            $res=pg_query($dbconn,$q1);
            $row = pg_fetch_row($res);
            $saldoattuale=$row[0];
            $_SESSION["saldo"]=''+$saldoattuale;

            header('location: ../Home/homepage.php');
        }
        //se la password non è corretta
        else{
            echo "<html>

            <head>
                <link rel='stylesheet' href='../stile.css' type=text/css>
                <title>ERRORE</title>
                <meta charset=utf-8>
                <meta name=viewport content=width=device-width, initial-scale=1>
            </head>
        
        
            <body class='bordo sfondo'>
            <br><br><br>
                <table bgcolor='white' align='center'>
                    <td>
                        <p align='center'>
                            <titolo>
                                La Password non è corretta!
                            </titolo><br><br>
                            <sottotitolo>
                                Scegli una delle opzioni sottostanti: 
                            </sottotitolo><br><br>
                            <sottotitolo>
                                <a href=../Registrazione/login.php>RIPROVA LOGIN </a>&nbsp;&nbsp; 
                                <a href=../Home/homepage.php>RITORNA AL SITO </a>&nbsp;&nbsp;
                            <sottotitolo>
                        </p>
                    </td>
                </table>                        

            </body>
            </html>";
        }
    }
?>
