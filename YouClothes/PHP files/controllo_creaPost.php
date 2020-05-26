<?php
//per distruggere la sessione e quindi fare il logout
    session_start();
    if(isset($_SESSION['nickname'])){
        header('location: ../CreaPost/creapost.php');
    }
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
?>