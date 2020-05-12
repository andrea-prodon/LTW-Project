<html>
<body>
    
    <?php
        session_start();
        if(isset($_SESSION["nickname"])){

            $id_annuncio = $_GET[annuncio]; //ottengo l'id dell'annuncio che è stato cliccato dalla get dell'url
            $dbconn = pg_connect("host=localhost port=5433 dbname=YouClothes user=postgres password=edoardo97")
            or die('Could not connect: '.pg_last_error());

            $query = "select prezzo from annuncio where id=$id_annuncio";
            $res = pg_query($dbconn, $query) or die('Query failed '.pg_last_error());
            $row = pg_fetch_row($res);
            $prezzo=$row[0];

            $utente = $_SESSION["nickname"];
            $q1="select saldo from utente where nickname ='$utente'";

            $res2=pg_query($dbconn,$q1) or die('Query failed '.pg_last_error());
            $row2 = pg_fetch_row($res2);
            $saldoutente=$row2[0];

            $q2="update utente set saldo = $1 WHERE nickname = '$utente'";

            if ($saldoutente >= $prezzo)  {             // se si hanno soldi a sufficienza
                $nuovosaldo = $saldoutente - $prezzo;
                $data=pg_query_params($dbconn,$q2,array($nuovosaldo)); 

                if($data){
                    $_SESSION["saldo"]=$nuovosaldo;
                    echo "<html>

                    <head>
                        <link rel=stylesheet href=../stile.css type=text/css>
                        <title>Acquisto effettuato</title>
                        <meta charset=utf-8>
                        <meta name=viewport content=width=device-width, initial-scale=1>
                    </head>
                
                
                    <body class=bordo>
                
                        <p align=center> <br><br><br><br>
                            <titolo>Acquisto effettuato con successo!</titolo> <br><br><br><br>
                            <sottotitolo>
                                Saldo precedente: $saldoutente <br>
                                Costo articolo: $prezzo <br>
                                Nuovo Saldo: $nuovosaldo <br><br>
                                <a href='../Home/homepage.php'><button>Torna alla home</button> </a>
                            </sottotitolo>
                        </p>
                    </body>
                
                </html>";
                }
            }
            else {       // se non si hanno soldi a sufficienza
                
                echo "<html>

                    <head>
                        <link rel=stylesheet href=../stile.css type=text/css>
                        <title>Saldo insufficiente</title>
                        <meta charset=utf-8>
                        <meta name=viewport content=width=device-width, initial-scale=1>
                    </head>
                
                
                    <body class=bordo>
                
                        <p align=center> <br><br><br><br>
                            <titolo>Purtroppo il tuo saldo risulta insufficiente</titolo> <br><br><br><br>
                            <sottotitolo>
                                Carica il tuo saldo premendo
                                <a href='../Saldo personale/caricasaldo.html'>QUI </a>
                            </sottotitolo> <br><br>
                            <sottotitolo> 
                                Oppure torna alla
                                <a href='../Home/homepage.php'>HOME </a>
                            </sottotitolo> <br><br>

                                
                        </p>
                    </body>
                
                </html>";

            }
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
                                <a href=../Registrazione/login.php>EFFETTUA L'ACCESSO</a>&nbsp;&nbsp; 
                                <a href=../Registrazione/signup.php>REGISTRATI</a>&nbsp;&nbsp; 
                            <sottotitolo>

                    </body>
                    </html>"; 
        }
    
        pg_close();    
    
    ?>


</body>
</html>