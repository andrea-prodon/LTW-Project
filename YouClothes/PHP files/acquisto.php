<html>
<body>
    
    <?php
        session_start();
        if(isset($_SESSION["nickname"])){
            $email=$_SESSION["email"];
            $id_annuncio = $_GET["annuncio"]; //ottengo l'id dell'annuncio che è stato cliccato dalla get dell'url
            $dbconn = pg_connect("host=localhost port=5433 dbname=YouClothes user=postgres password=edoardo97")
            or die('Could not connect: '.pg_last_error());

            
            $query_vend = "select utente_email from annuncio where id=$id_annuncio";
            $res_vend= pg_query($dbconn, $query_vend) or die('Query failed '.pg_last_error());
            $row_vend =pg_fetch_row($res_vend);
            $email_venditore = $row_vend[0];     //email del venditore dell annuncio
            
            
            $query = "select prezzo from annuncio where id=$id_annuncio";
            $res = pg_query($dbconn, $query) or die('Query failed '.pg_last_error());
            $row = pg_fetch_row($res);
            $prezzo=$row[0];        //prezzo dell'articolo
            
            
            $utente = $_SESSION["nickname"];    //nickname dell'utente
            
            $q1="select saldo from utente where nickname ='$utente'";
            $res2=pg_query($dbconn,$q1) or die('Query failed '.pg_last_error());
            $row2 = pg_fetch_row($res2);
            $saldoutente=$row2[0];      //saldo del compratore
            
            $aggiorna_saldo_compratore="update utente set saldo = $1 WHERE nickname = '$utente'";
            $prendi_saldo_venditore="select saldo from utente where email = '$email_venditore'";
            $aggiorna_saldo_venditore="update utente set saldo = $1 where email = '$email_venditore'";
            
            $res_saldo_vend = pg_query($dbconn, $prendi_saldo_venditore);
            $row_saldo_vend = pg_fetch_row($res_saldo_vend);
            $saldo_venditore = $row_saldo_vend[0];      //saldo del venditore dell annuncio
            
            if ($saldoutente >= $prezzo)  {             // se si hanno soldi a sufficienza
                $nuovosaldo_compratore = $saldoutente - $prezzo;
                $nuovosaldo_venditore = $saldo_venditore + $prezzo;
                
                $query = "update annuncio set utente_email='$email' where id=$id_annuncio";     //il proprietario diventa l'utente attuale
                $res = pg_query($dbconn, $query) or die('Query failed '.pg_last_error()); 

                $query = "update annuncio set disponibile=false where id=$id_annuncio";         //l'annuncio diventa non piu disponibile
                $res = pg_query($dbconn, $query) or die('Query failed '.pg_last_error()); 

                $data=pg_query_params($dbconn,$aggiorna_saldo_compratore,array($nuovosaldo_compratore)); 
                $data2 = pg_query_params($dbconn, $aggiorna_saldo_venditore, array($nuovosaldo_venditore));
                
                if($data && $data2){
                    $_SESSION["saldo"]=$nuovosaldo_compratore;
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
                                Nuovo Saldo: $nuovosaldo_compratore <br><br>
                                
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