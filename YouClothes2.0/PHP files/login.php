<?php
     $dbconn = pg_connect("host=localhost port=5432 dbname=YouClothes user=postgres password=edoardo97")
     or die('Could not connect: '.pg_last_error());
     $email = $_POST['email'];   //prendo il parametro 'email' della form inviata
     $q1 = "select from utente where email=$1";  //il risultato della query viene inserito dentro $1
     $result = pg_query_params($dbconn,$q1,array($email));   //funzione per far effettuare le query e inserire i risultati dentro array (in questo caso solo 1: email)
     //controllo se utente con 'email' esiste
     if(!($line=pg_fetch_array($result,null,PGSQL_ASSOC))){ //ovvero controllo che l'oggetto non esiste (not pg_fet...)
        //questa parte sottostante sarà da cambiare. Per adesso ci limitiamo a questo
        //perchè in teoria deve riportarti alla pagina iniziale solo che al posto di 'Sign in/Register' ci deve essere il tuo nickname
        echo "<h1>Sembra che il tuo account non esista! 
        Creane uno 
        <a href=../Registrazione/signup.html>CLICCANDO QUI </a>";
    }
    //se esiste utente con 'email', allora controllo se la password è corretta
    else{
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $q1 = "select from utente where email=$1 and password=$2";
        $result = pg_query_params($dbconn,$q1,array($email,$password));
        if($line=pg_fetch_array($result,null,PGSQL_ASSOC)){
            echo "<h1>
            Bene! Hai appena effettuato il Login! 
            Premi 
            <a href=../Home/homepage.html>QUI </a>
            per iniziare a usare il sito YouClothes!
            </h1>";
        }
        else{
            echo "<h1>
            L'Email o la Password non sono corretti! 
            <br><br>
            Scegliere una delle opzioni sottostanti: <br>
            <a href=..>RIPROVA LOGIN </a>&nbsp;&nbsp; 
            <a href=../Home/homepage.html>RITORNA AL SITO </a>&nbsp;&nbsp; 
            <a href=../signup.html>REGISTRATI</a>";
        }
    }
?>
