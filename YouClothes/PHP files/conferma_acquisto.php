<html>
    
    <?php
        session_start();
        $id_annuncio = $_GET["annuncio"];
        $bool=0;
        $dbconn = pg_connect("host=localhost port=5432 dbname=YouClothes user=postgres password=edoardo97")
        or die('Could not connect:' .pg_last_error());
        if(isset($_SESSION["email"])){
            $email=$_SESSION["email"];
            //in questa query controlli l'id dell'annuncio che stai comprando e l'email dell'utente attualmente loggato. Se a tale utente corrisponde tale id vuol dire che l'annuncio è suo 
            $query="select id from annuncio where utente_email='$email' and id=$id_annuncio";   //controllo che non si sta comprando un annuncio che tu stesso hai pubblicato
            
            $result = pg_query($query) or die('Query failed '.pg_last_error());
            $line=pg_fetch_array($result,null,PGSQL_ASSOC); //true se la query ha dato risultati, false altrimenti. nel caso true allora vuol dire che c'è stata una corrispondenza tra id e annuncio quindi era sua, altrimenti non era suo
        }
        if(isset($_SESSION["nickname"])){
            if(!$line){ //appunto se non è un annuncio tuo, allora prosegui
                $vettore=['CATEGORIA','DESCRIZIONE','PREZZO'];  //vettore puramente utlizzato per stampare a livello visuale
                $j=0;
                $i=0;
                $dbconn = pg_connect("host=localhost port=5432 dbname=YouClothes user=postgres password=edoardo97")
                or die('Could not connect:' .pg_last_error());
                $query = "SELECT * FROM annuncio where id='$id_annuncio'"; //query per ottenere la categoria prodotti scelta
                $result = pg_query($query) or die('Query failed '.pg_last_error());
                //Iniziamo a printare i dati prelevati dal DB
                echo "<table align='center' bgcolor='white'>\n";   //creo tabella che al suo interno conterrà tutti gli annunci richiesti
                $indice = 0; //mi serve per sapere a che linea sono nello scorrimento degli annunci nel while
                //mostro l'annuncio che stai per comprare
                while ($line = pg_fetch_array($result,null,PGSQL_ASSOC)) {  //dentro a questo while creo righe della tabella in base a quanti annunci della categoria richiesta sono presenti
                    $annuncio = $line["id"];
                    foreach ($line as $colvalue){
                        if($i!=0){
                            echo "<tr>";
                            if($i==1){
                                echo '<td width=250 rowspan=5> <img src="'.$colvalue.'" style=width=300px height=300px;></td></tr>';
                                $i=$i+1;
                            }
                            else{
                                echo "<td>$vettore[$j]:$colvalue</td></tr>";
                                $i=$i+1;
                                $j=$j+1;
                                if($j==3){
                                    $j=0;
                                    $i=0;
                                    break;
                                }
                            }
                        }
                        else{
                            $i=$i+1;
                        }
                    }
                    echo "<tr><td><span style=color:lime;>DISPONIBILE</span></td></tr>"; //da cambiare ovvero vedere se veramente è disponibile o no 
                    
                    
                    //nell echo sopra, nel linkare il bottone alla pagine acquista, fornisco con una url get l'id dell'annuncio che è stato cliccato
                    echo "<br>";
                    $indice = $indice + 1;
                }
                echo "</table>\n";
                pg_free_result($result);
                pg_close($dbconn);
                echo "<html>
    
                        <head>
                            <link rel='stylesheet' href='../stile.css' type=text/css>
                            <title>Saldo caricato</title>
                            <meta charset=utf-8>
                            <meta name=viewport content=width=device-width, initial-scale=1>
                        </head>
                    
                    
                        <body class='sfondo bordo'>
                        <br><br><br><br>
                            <table align='center' bgcolor='white'>
                                <td>
                                    <p align=center> 
                                        <titolo>Sei sicuro di voler procedere all'acquisto di questo annuncio?</titolo> <br><br>
                                        <sottotitolo>
                                            <div align=center>
                                                <form method='POST' action='acquisto.php'>
                                                    <input type=hidden name='annuncio' value='$id_annuncio'>
                                                    <input type='submit' name='confirmButton' value='Acquista'> 
                                                </form>
                                                <form action='../Home/homepage.php'>
                                                    <input type='submit' name='Annulla' value='Annulla'>
                                                </form>
                                            </div>
                                        </sottotitolo>
                                    </p>
                                </td>
                            </table>
                        </body>
                    
                    </html>";
            }
            else{   //altrimenti non puoi comprare un annuncio che tu stesso hai pubblicato
                echo "<html>
    
                        <head>
                            <link rel='stylesheet' href='../stile.css' type=text/css>
                            <title>Saldo caricato</title>
                            <meta charset=utf-8>
                            <meta name=viewport content=width=device-width, initial-scale=1>
                        </head>
                    
                    
                        <body class='bordo sfondo'>
                            <br><br><br><br>
                            <table bgcolor='white' align='center'>
                            <td>
                                <p align='center'> 
                                    <titolo>Non puoi acquistare un annuncio che tu stesso hai creato oppure che hai appena comprato!</titolo> <br><br><br><br>
                                    <sottotitolo>
                                    <p align='center'>
                                        <a href='../Home/homepage.php'><button> Torna Home</button> </a> &nbsp;&nbsp;&nbsp;
                                    </p>
                                    </sottotitolo>
                                </p>
                            </td>
                            </table>
                        </body>
                    
                    </html>";
            }
        }
        else {

            echo "<html>
            <head>
                <link rel='stylesheet' href='../stile.css' type=text/css>
                <title>ERRORE</title>
                <meta charset=utf-8>
                <meta name=viewport content=width=device-width, initial-scale=1>
            </head>
        
        
            <body class='sfondo bordo'>
            <br><br><br>
                <table bgcolor='white' align='center'>
                    <td>
                        <p align=center>
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
                        </p>
                    </td>
                </table
            </body>
            </html>"; 

        }
    ?>
    

    

    


</body>
</html>