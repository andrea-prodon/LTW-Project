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
        <link href="../css/bootstrap-responsive.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>

        <title>Sign up</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!--piccola validazione del form che controlla che nome e cognome non siano numeri e che le due password corrispondano-->
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


    <body class="bordo">

        
        <form method="POST" action="../PHP files/registrazione.php" id="registrazione" name="registrazione" onSubmit="return validaForm()" enctype="multipart/form-data">
            <div class="titolo">
                <p align="center"> <br><br>
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
                            <option value="nessuna" selected>VUOTO</option>
                            <option>ROMA</option>
                            <option>MILANO</option>
                            <option>BOLOGNA</option>
                            <option>NAPOLI</option>
                            <option>TORINO</option>
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
    </body>

</html>