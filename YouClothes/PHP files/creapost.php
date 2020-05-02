<html>
    <body>
        <?php

        // pagina per inserire i dettagli di un annuncio creato nel database
        //************************************************************** */
        //ANCORA INCOMPLETA, CI CONTINUERÒ A LAVORARE NEI PROSSIMI GIORNI
        //*************************************************************** */
            $dbconn = pg_connect("host=localhost port=5433 dbname=YouClothes user=postgres password=edoardo97")
            or die('Could not connect: '.pg_last_error());
            $email = $_POST['email'];   
            $q1 = "select * from utente where email=$1"; 
            $result = pg_query_params($dbconn,$q1,array($email));  
            $line=pg_fetch_array($result,null,PGSQL_ASSOC);

            $nickname=$_POST['nickname'];
            $q2="select * from utente where nickname=$1";
            $result2=pg_query_params($dbconn,$q2,array($nickname));
            $line2=pg_fetch_array($result2,null,PGSQL_ASSOC);

            $nomepost=$_POST['nomepost'];
            $foto=$_POST['foto'];
            $categoria=$_POST['categoria'];
            $descrizione=$_POST['descrizione'];
            $prezzo=$_POST['prezzo'];
            $q2="insert into annuncio values ($1,$2,$3,$4)";  
            $data=pg_query_params($dbconn,$q2,array($foto,$categoria,$descrizione,$prezzo));  
            if($data){
                $email = $_POST['email'];
                $q1 = "select * from utente where email=$1";
                $result = pg_query_params($dbconn,$q1,array($email));
                $line=pg_fetch_array($result,null,PGSQL_ASSOC);
                header('location: ../Home/homepage.php?nickname='.$line["nickname"].'');
                
            }
        ?>
    </body>
</html>