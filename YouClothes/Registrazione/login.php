<?php
    session_start();
    //controlla se è già stato fatto il login e nel caso non posso più accedere a questa pagina ancora
    if(isset($_SESSION["nickname"])){
        header('location: ../Home/homepage.php');
    }
?>
<html>

    <head>
        <link rel="stylesheet" href="../stile.css" type="text/css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

        <title>Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script>
            function salvataggioInformazioni(){
                if(document.getElementById("ricordami").checked){
                    var email = document.getElementById("email").value;
                    var pass = document.getElementById("password").value;
                    localStorage.email = email;
                    localStorage.pass = pass;
                }
                else{
                    localStorage.removeItem("email");
                    localStorage.removeItem("pass");
                }
            }
            $(document).ready(function(){
                if(localStorage.email!=null){
                    $("#email").val(localStorage.email+'');
                    $("#password").val(localStorage.pass+'');
                    $("#email").css({"background-color": "yellow"});
                    $("#password").css({"background-color": "yellow"});
                }
            });
        </script>
    </head>


    <body class="bordo sfondo">

    <br><br><br><br><br><br>
        <table align="center" bgcolor="white">
            <td>
                <form method="POST" name="login" action="../PHP files/login.php" onsubmit="salvataggioInformazioni();">
                    <div class="titolo">

                            <p align="center"> 
                                <titolo>Login</titolo><br><br>
                                <sottotitolo>
                                    
                                    <label for="email" class="labels">E-mail</label>
                                    <input type="email" maxlength="30" name="email" id="email" required><br><br>
                                    
                                    <label for="password" class="labels">Password</label>
                                    <input type="Password" maxlength="20" name="password" id="password" required><br><br>

                                    Ricordami &nbsp;&nbsp;<input title="La prossima volta verranno salvate le informazioni d'accesso" type="checkbox" id="ricordami" checked name="ricordami"><br><br>
                                    
                                </sottotitolo> 
                                <input type="reset" value="Reset"> &nbsp;&nbsp; 
                                <input type="submit" name="loginButton" value="Conferma"> 
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
