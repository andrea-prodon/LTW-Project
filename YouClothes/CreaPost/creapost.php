<?php
    session_start();    //serve sempre quando vuoi ricavare qualcosa dalla sessione (quindi lo devi inserire in tutte quelle pagine in cui vuoi accedere alla sessione)
    if(!isset($_SESSION["nickname"])){
        header('location: ../Home/homepage.php');
    }
?>
<html>

    <head>
        <link rel="stylesheet" href="../stile.css" type="text/css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link href="../css/bootstrap-responsive.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>

        <title>Crea annuncio</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script>
            function valida(){
                var categoria = document.getElementById("categoria");
                if(categoria.value=="nessuna"){
                    alert("Inserisci una categoria!");
                    return false;
                }
                return true;
            }
        </script>
    </head>


    <body class="bordo sfondo">

        <br><br><br><br>
        <table bgcolor="white" align="center">
            <td>
        
                <div class="titolo">
                    <p align="center"> 
                        <titolo>Crea un nuovo annuncio</titolo><br><br>
                    </p>
                </div>

                <form method="POST" action="../PHP files/creapost.php" id="creazionepost" name="creazionepost" enctype="multipart/form-data"  onSubmit="return valida()">
                    <p align="center">
                        <sottotitolo> 
                            Si inseriscano per favore informazioni relative alla taglia e alla <br>
                            marca del prodotto all'interno della descrizione <br>
                            Grazie mille <br><br><br>

                            <label for="foto" class="labels" >Foto:</label>
                            <input type="text" maxlength="100" required name="foto" id="foto"><br><br>     
                            
                            <!--
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="file" name="foto" id="foto"><br><br>
                            -->
                        
                            <label for="categoria" class="labels" style="text-align: left;">Categoria:</label>
                            <select name="categoria" id="categoria">
                                <option value="nessuna" selected>VUOTO</option>
                                <option value="sciarpa">sciarpa</option>
                                <option value="maglietta">maglietta</option>
                                <option value="pantalone">pantalone</option>
                                <option value="cappello">cappello</option>
                                <option value="felpa">felpa</option>
                                <option value="giacchetto">giacchetto</option>
                            </select>  <br><br>

                            <label for="descrizione" class="labels">Descrizione: </label>
                            <textarea cols=20 rows="2" wrap="phisical" name="descrizione" id="descrizione"></textarea> <br><br>

                            <label for="prezzo" class="labels">Prezzo: </label>
                            <input type="number" name="prezzo" id="prezzo" required> <br><br>

                        </sottotitolo>

                        <input type="reset" value="Reset"> &nbsp;&nbsp; 
                        <input type="submit" name="confirmButton" value="Conferma"> 
                    </p>

                </form>
                <p align="center">
                    <a href="../Home/homepage.php"><button>Torna Home</button></a> 
                </p>
            </td>
        </table>
    </body>

</html>