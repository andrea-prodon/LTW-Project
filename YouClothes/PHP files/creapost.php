<html>
    <body>
        <?php

        // pagina per inserire i dettagli di un annuncio creato nel database
        
            $dbconn = pg_connect("host=localhost port=5433 dbname=YouClothes user=postgres password=edoardo97")
            or die('Could not connect: '.pg_last_error());

            $foto=$_POST['foto'];
            $categoria=$_POST['categoria'];
            $descrizione=$_POST['descrizione'];
            $prezzo=$_POST['prezzo'];
            $q2="insert into annuncio values (DEFAULT,$1,$2,$3,$4)";  
            $data=pg_query_params($dbconn,$q2,array($foto,$categoria,$descrizione,$prezzo));  
            if($data){
                header('location: ../Home/homepage.php');
            }
        ?>
    </body>
</html>