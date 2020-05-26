<html>
    <body>
        <?php
            session_start();    //serve sempre quando vuoi ricavare qualcosa dalla sessione (quindi lo devi inserire in tutte quelle pagine in cui vuoi accedere alla sessione)
            $dbconn = pg_connect("host=localhost port=5433 dbname=YouClothes user=postgres password=edoardo97")
            or die('Could not connect: '.pg_last_error());
            if(!(isset($_POST['registerButton']))){   //questa pagina può essere acceduta solo se prima si era sulla pagina di invio form
                header('location: ../Home/homepage.php');
            }
            $email = $_POST['email'];   //prendo il parametro 'email' della form inviata
            $q1 = "select * from utente where email=$1";  //il risultato della query viene inserito dentro $1
            $result = pg_query_params($dbconn,$q1,array($email));   //funzione per far effettuare le query e inserire i risultati dentro array (in questo caso solo 1: email)
            $line=pg_fetch_array($result,null,PGSQL_ASSOC);

            $nickname=$_POST['nickname'];
            $q2="select * from utente where nickname=$1";
            $result2=pg_query_params($dbconn,$q2,array($nickname));
            $line2=pg_fetch_array($result2,null,PGSQL_ASSOC);

            if($line){ //controlla se l'utente con valore '$email' è già presente nel database 
                echo "<html>

                    <head>
                        <link rel='stylesheet' href='../stile.css' type=text/css>
                        <title>ERRORE</title>
                        <meta charset=utf-8>
                        <meta name=viewport content=width=device-width, initial-scale=1>
                    </head>
                
                
                    <body class='bordo sfondo'>
                    <br><br><br><br>
                    <table align='center' bgcolor='white'>
                    <td>
                
                        <p align=center> 
                            <titolo>Operazione Annullata! Questo Utente esiste già!</titolo> <br><br>
                            <sottotitolo>Clicca 
                            <a href=../Registrazione/login.php>QUI</a> 
                            per effettuare il login </sottotitolo> <br>
                            <sottotitolo>Clicca 
                            <a href=../Registrazione/signup.php>QUI</a> 
                            per ri-effettuare la registrazione </sottotitolo> <br>
                        </p>
                    </td>
                    </table>
                    </body>
                
                </html>";
            }
            //controllo che l'utente non abbia messo un nickname già esistente
            else if($line2){
                echo "<html>

                    <head>
                        <link rel='stylesheet' href='../stile.css' type=text/css>
                        <title>ERRORE</title>
                        <meta charset=utf-8>
                        <meta name=viewport content=width=device-width, initial-scale=1>
                    </head>
                
                
                    <body class='bordo sfondo'>
                    <br><br><br><br>
                    <table align='center' bgcolor='white'>
                    <td>
                        <p align=center> 
                            <titolo>Operazione Annullata! Questo nickname esiste già!</titolo> <br><br>
                            <sottotitolo>Clicca 
                            <a href=../Registrazione/login.php>QUI</a> 
                            per effettuare il login </sottotitolo> <br>
                            <sottotitolo>Clicca 
                            <a href=../Registrazione/signup.php>QUI</a> 
                            per ri-effettuare la registrazione con un NICKNAME diverso </sottotitolo> <br><br>
                            <sottotitolo>
                                <a href=../Home/homepage.php>TORNA IN HOME</a>
                            </sottotitolo>
                        </p>
                    </td>
                    </table>
                    </body>
                
                </html>";
            }
            else{
                //Operazioni per inserire i nuovi valori nel DB, tabella Utente -> registrazione nuovo Utente
                $email=$_POST['email'];
                $nome=$_POST['nome'];
                $cognome=$_POST['cognome'];
                $nickname=$_POST['nickname'];
                $datanascita=$_POST['dataNascita'];
                $citta=$_POST['citta'];
                $password=md5($_POST['password']);  //md5 per 'ashare' le password in modo tale da non poterle vedere nel database
                $q2="insert into utente values ($1,$2,$3,$4,$5,$6,$7)";   //query per inserire valori all'interno della tabella Utente
                $data=pg_query_params($dbconn,$q2,array($email,$nome,$cognome,$nickname,$password, $datanascita, $citta));   //operazione per effettuare la query e inserire i dati all'interno di 'array'
                if($data){
                    $email = $_POST['email'];
                    $q1 = "select * from utente where email=$1";
                    $result = pg_query_params($dbconn,$q1,array($email));
                    $line=pg_fetch_array($result,null,PGSQL_ASSOC);
                    $_SESSION["nickname"]=''.$nickname.'';
                    $_SESSION["saldo"]=''+0;
                    $_SESSION["email"]=''.$email.'';
                    header('location: ../Home/homepage.php');
                }
            }
        ?>
    </body>
</html>