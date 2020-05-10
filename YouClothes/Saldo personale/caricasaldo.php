<html>
    <body>
        <?php
            session_start();    
            $dbconn = pg_connect("host=localhost port=5432 dbname=YouClothes user=postgres password=edoardo97")
            or die('Could not connect: '.pg_last_error());
            $importo = $_POST['importo'];   //prendo il parametro 'importo' della form inviata
            $utente = $_SESSION["nickname"];    

            $q2="update utente set saldo = $1 WHERE nickname = '$utente'";  
            $data=pg_query_params($dbconn,$q2,array($importo));   //operazione per effettuare la query e inserire i dati all'interno di 'array'
            if($data){
                echo "<html>

                <head>
                    <link rel=stylesheet href=../stile.css type=text/css>
                    <title>Saldo caricato</title>
                    <meta charset=utf-8>
                    <meta name=viewport content=width=device-width, initial-scale=1>
                </head>
            
            
                <body class=bordo>
            
                    <p align=center> <br><br><br><br>
                        <titolo>Operazione completata con successo!</titolo> <br><br><br><br>
                        <sottotitolo>
                            <a href='../Home/homepage.php'>Torna alla home </a>
                        </sottotitolo>
                    </p>
                </body>
            
            </html>";
            }
            
        ?>
    </body>
</html>