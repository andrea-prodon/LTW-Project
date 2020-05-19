<html>
    <body>
        <?php

        // pagina per inserire i dettagli di un annuncio creato nel database
            session_start();
            $utente_email=$_SESSION["email"];
            $dbconn = pg_connect("host=localhost port=5432 dbname=YouClothes user=postgres password=edoardo97")
            or die('Could not connect: '.pg_last_error());
            $foto=$_POST['foto'];
            $categoria=$_POST['categoria'];
            $descrizione=$_POST['descrizione'];
            $prezzo=$_POST['prezzo'];
            $disponibile=true;
            $q2="insert into annuncio values (DEFAULT,$1,$2,$3,$4,$5,DEFAULT,$6)";  
            $data=pg_query_params($dbconn,$q2,array($foto,$categoria,$descrizione,$prezzo,$utente_email,$utente_email));  
            if($data){
                header('location: ../Home/homepage.php');
            }
        ?>
    </body>
</html>