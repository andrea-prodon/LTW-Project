<html>
    <head>
        <title>CONNESSIONE COL DB</title>
        <style>
        /*Per fare i bordi come un'unica linea*/
        table, td, th {
        border: 1px solid black;
        }

        /*per non separare i bordi tra loro*/
        #table2 {
        border-collapse: collapse;
        }
</style>
    </head>
    <body>
        <?php
            $categoria=$_GET['nome'];
            $vettore=['CATEGORIA','DESCRIZIONE','PREZZO'];
            $j=0;
            $i=0;
            $dbconn = pg_connect("host=localhost port=5432 dbname=YouClothes user=postgres password=edoardo97")
            or die('Could not connect:' .pg_last_error());
            $query = "SELECT * FROM annuncio where categoria='$categoria'";
            $result = pg_query($query) or die('Query failed '.pg_last_error());
            //Iniziamo a printare i dati prelevati dal DB
            echo "<table id=table2 style=border:1px solid black;margin-left:auto;margin-right:auto; >\n";
            while ($line = pg_fetch_array($result,null,PGSQL_ASSOC)) {
                foreach ($line as $colvalue){
                    if($i!=0){
                        echo "<tr>";
                        if($i==1){
                            echo '<td width=250 rowspan=6>
                            <img src="'.$colvalue.'" style=width:100%;></td></tr>';
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
                echo "<td><span style=color:lime;>DISPONIBILE</span></td></tr>";
                echo "<td><button>ACQUISTA</button></td></tr>";
            }
            echo "</table>\n";
            pg_free_result($result);
            pg_close($dbconn);
        ?>
    </body>
</html>