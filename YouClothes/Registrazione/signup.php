<?php
    session_start();
    //controllo se è già stata fatta la registrazione, in questo modo non posso accedere a questa pagina se ho già effettuato la registrazione
    if(isset($_SESSION["nickname"])){
        header('location: ../Home/homepage.php');
    }
?>
<html>

    <head>
        <link rel="stylesheet" href="../stile.css" type="text/css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">

        <title>Sign up</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- validazione del form che controlla che nome e cognome non siano numeri e che le due password corrispondano-->
        <script type="text/javascript">
            function validaForm() {
                var nameValue=parseInt(document.registrazione.nome.value);
                if (!isNaN(nameValue)) {
                    alert("il nome non può essere un numero!");
                    return false;
                }
                var lastnameValue=parseInt(document.registrazione.cognome.value);
                if (!isNaN(lastnameValue)) {
                    alert("il cognome non può essere un numero!");
                    return false;
                }
                var pass1=document.registrazione.password.value;
                var pass2=document.registrazione.conferma_password.value;
                if(pass1 != pass2) {
                    alert("le password inserite non corrispondono");
                    return false;
                }
                var citta = document.getElementById("citta");
                if(citta.value=="nessuna"){
                    alert("Inserisci una città!");
                    return false;
                }
                return true;
            }
        </script>
    </head>


    <body class="bordo sfondo">
    <br><br>
    <table align="center" bgcolor="white">
        <td>
        
        <form method="POST" action="../PHP files/registrazione.php" id="registrazione" name="registrazione" onSubmit="return validaForm()" enctype="multipart/form-data">
            <div class="titolo">
                <p align="center"> 
                    <titolo>Sign up</titolo><br><br>
                    <sottotitolo>
                        <label for="nome" class="labels">Nome: </label>
                        <input type="text" maxlength="20" required name="nome" id="nome"><br><br>
                        
                        <label for="cognome" class="labels">Cognome: </label> 
                        <input type="text" maxlength="20" required name="cognome" id="cognome"><br><br>
                        
                        <label for="dataNascita" class="labels">Data di nascita: </label> 
                        <input type="date" required name="dataNascita" id="dataNascita"><br><br>

                        <label for="citta" class="labels" >Città:</label>
                        <select name="citta" id="citta">
                            <option value="nessuna" selected>Vuoto</option>
                            <option>Agrigento</option>
                            <option">Alessandria</option>
                            <option>Ancona</option>
                            <option>Aosta</option>
                            <option>Arezzo</option>
                            <option>Ascoli Piceno</option>
                            <option>Asti</option>
                            <option>Avellino</option>
                            <option>Bari</option>
                            <option>Barletta-Andria-Trani</option>
                            <option>Belluno</option>
                            <option>Benevento</option>
                            <option>Bergamo</option>
                            <option>Biella</option>
                            <option>Bologna</option>
                            <option>Bolzano</option>
                            <option>Brescia</option>
                            <option>Brindisi</option>
                            <option>Cagliari</option>
                            <option>Caltanissetta</option>
                            <option>Campobasso</option>
                            <option>Carbonia-iglesias</option>
                            <option>Caserta</option>
                            <option>Catania</option>
                            <option>Catanzaro</option>
                            <option>Chieti</option>
                            <option>Como</option>
                            <option>Cosenza</option>
                            <option>Cremona</option>
                            <option>Crotone</option>
                            <option>Cuneo</option>
                            <option>Enna</option>
                            <option>Fermo</option>
                            <option>Ferrara</option>
                            <option>Firenze</option>
                            <option>Foggia</option>
                            <option>Forl&igrave;-Cesena</option>
                            <option>Frosinone</option>
                            <option>Genova</option>
                            <option>Gorizia</option>
                            <option>Grosseto</option>
                            <option>Imperia</option>
                            <option>Isernia</option>
                            <option>La spezia</option>
                            <option>L'aquila</option>
                            <option>Latina</option>
                            <option>Lecce</option>
                            <option>Lecco</option>
                            <option>Livorno</option>
                            <option>Lodi</option>
                            <option>Lucca</option>
                            <option>Macerata</option>
                            <option>Mantova</option>
                            <option>Massa-Carrara</option>
                            <option>Matera</option>
                            <option>Medio Campidano</option>
                            <option>Messina</option>
                            <option>Milano</option>
                            <option>Modena</option>
                            <option>Monza e della Brianza</option>
                            <option>Napoli</option>
                            <option>Novara</option>
                            <option>Nuoro</option>
                            <option>Ogliastra</option>
                            <option>Olbia-Tempio</option>
                            <option>Oristano</option>
                            <option>Padova</option>
                            <option>Palermo</option>
                            <option>Parma</option>
                            <option>Pavia</option>
                            <option>Perugia</option>
                            <option>Pesaro e Urbino</option>
                            <option>Pescara</option>
                            <option>Piacenza</option>
                            <option>Pisa</option>
                            <option>Pistoia</option>
                            <option>Pordenone</option>
                            <option>Potenza</option>
                            <option>Prato</option>
                            <option>Ragusa</option>
                            <option>Ravenna</option>
                            <option>Reggio di Calabria</option>
                            <option>Reggio nell'Emilia</option>
                            <option>Rieti</option>
                            <option>Rimini</option>
                            <option>Roma</option>
                            <option>Rovigo</option>
                            <option>Salerno</option>
                            <option>Sassari</option>
                            <option>Savona</option>
                            <option>Siena</option>
                            <option>Siracusa</option>
                            <option>Sondrio</option>
                            <option>Taranto</option>
                            <option>Teramo</option>
                            <option>Terni</option>
                            <option>Torino</option>
                            <option>Trapani</option>
                            <option>Trento</option>
                            <option>Treviso</option>
                            <option>Trieste</option>
                            <option>Udine</option>
                            <option>Varese</option>
                            <option>Venezia</option>
                            <option>Verbano-Cusio-Ossola</option>
                            <option>Vercelli</option>
                            <option>Verona</option>
                            <option>Vibo valentia</option>
                            <option>Vicenza</option>
                            <option>Viterbo</option>
                        </select>  <br><br>

                        <label for="nickname" class="labels">NickName: </label>
                        <input type="text" maxlength="20" required name="nickname" id="nickname"><br><br>
                        
                        <label for="email" class="labels">E-mail: </label>
                        <input type="email" maxlength="30" name="email" id="email" required><br><br>
                        
                        <label for="password" class="labels">Password :</label>
                        <input type="Password" maxlength="20" name="password" id="password" required><br><br>
                        
                        <label for="conferma_password" class="labels">Conferma Password: </label>
                        <input type="Password" maxlength="20" name="conferma_password" id="conferma_password" required><br><br><br>
                    </sottotitolo>
                        
                    <input type="reset" value="Reset"> &nbsp;&nbsp; 
                    <input type="submit" name="registerButton" value="Conferma"> 
                </p>
            </div>
        </form>
        <p align="center">
            <a href="../Home/homepage.php"><button>Torna Home</button></a> 
        </p>
        </td>
        </table>

    </body>

</html>