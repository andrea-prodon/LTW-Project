<html>
    <body>
        <?php
            $dbconn = pg_connect("host=localhost port=5432 dbname=YouClothes user=postgres password=edoardo97")
            or die('Could not connect: '.pg_last_error());
            //controllo se utente esiste già
            $email = $_POST['email'];   //prendo il parametro 'email' della form inviata
            $q1 = "select * from utente where email=$1";  //il risultato della query viene inserito dentro $1
            $result = pg_query_params($dbconn,$q1,array($email));   //funzione per far effettuare le query e inserire i risultati dentro array (in questo caso solo 1: email)
            $line=pg_fetch_array($result,null,PGSQL_ASSOC);
            if($line){ //controlla se l'utente con valore '$email' è già presente nel database 
                echo "<html>

                    <head>
                        <link rel=stylesheet href=../stile.css type=text/css>
                        <title>ERRORE</title>
                        <meta charset=utf-8>
                        <meta name=viewport content=width=device-width, initial-scale=1>
                    </head>
                
                
                    <body class=bordo>
                
                        <p align=center> <br><br><br><br>
                            <titolo>Operazione Annullata! Questo Utente esiste già!</titolo> <br><br>
                            <sottotitolo>Clicca 
                            <a href=../Registrazione/login.html>QUI</a> 
                            per effettuare il login </sottotitolo> <br>
                            <sottotitolo>Clicca 
                            <a href=../Registrazione/signup.html>QUI</a> 
                            per ri-effettuare la registrazione </sottotitolo> <br>
                        </p>
                
                    </body>
                
                </html>";
            }
            else{
                //Operazioni per inserire i nuovi valori nel DB, tabella Utente -> registrazione nuovo Utente
                $email=$_POST['email'];
                $nome=$_POST['nome'];
                $cognome=$_POST['cognome'];
                $nickname=$_POST['nickname'];
                $password=$_POST['password'];  //md5 per 'ashare' le password in modo tale da non poterle vedere nel database
                $q2="insert into utente values ($1,$2,$3,$4,$5)";   //query per inserire valori all'interno della tabella Utente
                $data=pg_query_params($dbconn,$q2,array($email,$nome,$cognome,$nickname,$password));   //operazione per effettuare la query e inserire i dati all'interno di 'array'
                if($data){
                    echo "<html>

                    <head>
                        <link rel=stylesheet href=../stile.css type=text/css>
                        <title>REGISTRAZIONE</title>
                        <meta charset=utf-8>
                        <meta name=viewport content=width=device-width, initial-scale=1>
                    </head>
                
                
                    <body class=bordo>
                
                        <p align=center> <br><br><br><br>
                            <titolo>Registrazione completata!</titolo> <br><br>
                            <sottotitolo>Complimenti, registrazione effettuata con successo! </sottotitolo> <br>
                            <sottotitolo> Clicca qui sotto per tornare al menu principale: </sottotitolo> <br><br>
                            <a href=../Home/homepage.html>Home</a>
                        </p>
                
                    </body>
                
                </html>";
                }
            }
        ?>
    </body>
</html>