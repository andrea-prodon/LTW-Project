<html>
    <body>
        <?php
            $dbconn = pg_connect("host=localhost port=5432 dbname=YouClothes user=postgres password=edoardo97")
            or die('Could not connect: '.pg_last_error());
            //controllo se stai già provando a registrarti da altre pagine
            //serve per controllare che la form 'registrazione' è stata chiamata solo durante la pagina di registrazione
            /*if(!(isset($_POST['registrazione']))){
                //header('Location: ../Home/homepage.html');
                echo "<h1>DIOCANE</h1>";
            }
            else{*/
                //controllo se utente esiste già
                $email = $_POST['email'];   //prendo il parametro 'email' della form inviata
                $q1 = "select from utente where email=$1";  //il risultato della query viene inserito dentro $1
                $result = pg_query_params($dbconn,$q1,array($email));   //funzione per far effettuare le query e inserire i risultati dentro array (in questo caso solo 1: email)
                if($line=pg_fetch_array($result,null,PGSQL_ASSOC)){ //controlla se l'utente con valore '$email' è già presente nel database 
                    //header("Location: URL da fare in futuro per reindirizzare in una pagina più consona");
                    //per adesso usiamo ciò che sta qui sotto
                    echo "<h1>
                    Operazione Annullata! Questo Utente esiste già!
                    Clicca 
                    <a href=../Registrazione/login.html>QUI </a>
                    per effettuare il loging </h1>";
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
                        //header("Location: URL da fare in futuro per reindirizzare in una pagina più consona");
                        //per adesso usiamo ciò che sta qui sotto
                        echo "<html>

                        <head>
                            <link rel=stylesheet href=../stile.css type=text/css>
                            <link rel=stylesheet href=../css/bootstrap.min.css>
                            <link href=../css/bootstrap-responsive.css rel=stylesheet>
                            <script src=https://code.jquery.com/jquery-2.1.3.min.js></script>
                            <script src=../js/bootstrap.min.js></script>
                    
                            <title>Sign up completed</title>
                            <meta charset=utf-8>
                            <meta name=viewport content=width=device-width, initial-scale=1>
                        </head>
                    
                    
                        <body class=bordo>
                    
                            <p align=center> <br><br><br><br>
                                <titolo>Registrazione completata!</titolo> <br><br>
                                <sottotitolo>Complimenti, registrazione effettuata con successo! </sottotitolo> <br>
                                <sottotitolo> Clicca qui per tornare al menu principale: </sottotitolo> <br><br>
                                <a href=../Home/homepage.html>Home</a>
                            </p>
                    
                        </body>
                    
                    </html>";
                    }
                }
            //}
        ?>
    </body>
</html>