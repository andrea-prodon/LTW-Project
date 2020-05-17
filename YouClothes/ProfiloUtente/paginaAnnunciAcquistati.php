<html>
    <head>
        <link rel="stylesheet" href="../stile.cc">
    </head>
    <body>
        <?php
            session_start();
            $email=$_SESSION["email"];   //ottengo il parametro categoria dalla pagina che richiama questa pagina e servirà per le query per chiedere se l'utente ha premuto per sapere delle magliette,pantaloni ecc
            $vettore=['CATEGORIA','DESCRIZIONE','PREZZO'];  //vettore puramente utlizzato per stampare a livello visuale
            $j=0;
            $i=0;
            $dbconn = pg_connect("host=localhost port=5433 dbname=YouClothes user=postgres password=edoardo97")
            or die('Could not connect:' .pg_last_error());
            $query = "SELECT * FROM annuncio where utente_email='$email' and disponibile=false"; //query per ottenere gli annunci acquistati dall'utente attuale
            $result = pg_query($query) or die('Query failed '.pg_last_error());
            //Iniziamo a printare i dati prelevati dal DB
            echo "<table align='center'>\n";   //creo tabella che al suo interno conterrà tutti gli annunci richiesti
            $indice = 0; //mi serve per sapere a che linea sono nello scorrimento degli annunci nel while
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
                                break;  //per far smettere la visulalizzazione delle altre colonne che non servono
                            }
                        }
                    }
                    else{
                        $i=$i+1;
                    }
                }
                
                echo "<tr><td><span style=color:lime;>ACQUISTATO</span></td></tr>"; //anche qui da rendere o no disponibile all'acquisto
                
                
                //nell echo sopra, nel linkare il bottone alla pagine acquista, fornisco con una url get l'id dell'annuncio che è stato cliccato
                echo "<br>";
                $indice = $indice + 1;
            }
            echo "</table>\n";
            pg_free_result($result);
            pg_close($dbconn);
        ?>
    </body>
</html>