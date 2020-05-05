<html>
    <head>
        <style>
            table {
                border-collapse:collapse;
            }
            td, th {
                border:1px solid black;
                padding:20px;
            }
        </style>
        
    </head>
    <body>
        <?php
            $categoria=$_GET['nome'];   //ottengo il parametro categoria dalla pagina che richiama questa pagina e servirà per le query per chiedere se l'utente ha premuto per sapere delle magliette,pantaloni ecc
            $vettore=['CATEGORIA','DESCRIZIONE','PREZZO'];  //vettore puramente utlizzato per stampare a livello visuale
            $j=0;
            $i=0;
            $dbconn = pg_connect("host=localhost port=5433 dbname=YouClothes user=postgres password=edoardo97")
            or die('Could not connect:' .pg_last_error());
            $query = "SELECT * FROM annuncio where categoria='$categoria'"; //query per ottenere la categoria prodotti scelta
            $result = pg_query($query) or die('Query failed '.pg_last_error());
            //Iniziamo a printare i dati prelevati dal DB
            echo "<table>\n";   //creo tabella che al suo interno conterrà tutti gli annunci richiesti
            while ($line = pg_fetch_array($result,null,PGSQL_ASSOC)) {  //dentro a questo while creo righe della tabella in base a quanti annunci della categoria richiesta sono presenti
                foreach ($line as $colvalue){
                    if($i!=0){
                        echo "<tr>";
                        if($i==1){
                            echo '<td width=250 rowspan=6> <img src="'.$colvalue.'" style=width:100%;></td></tr>';
                            $i=$i+1;
                        }
                        else{
                            echo "<td>$vettore[$j]:$colvalue</td></tr>";
                            $i=$i+1;
                            $j=$j+1;
                            if($j==3){
                                $j=0;
                                $i=0;
                            }
                        }
                    }
                    else{
                        $i=$i+1;
                    }
                }
                echo "<tr><td><span style=color:lime;>DISPONIBILE</span></td></tr>"; //da cambiare ovvero vedere se veramente è disponibile o no 
                echo "<tr><td><button>ACQUISTA</button></td></tr>"; //anche qui da rendere o no disponibile all'acquisto
                echo "<br>";
            }
            echo "</table>\n";
            pg_free_result($result);
            pg_close($dbconn);
        ?>
    </body>
</html>