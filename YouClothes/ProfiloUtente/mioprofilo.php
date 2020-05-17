<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script>
    var bool=0; //serve per controllare se vuoi visualizzare o nascondere gli annunci
    var bool2=0;
    $(document).ready(function(){
        $("#1").on({ //event handler concatenati
            click:function(){
                if(bool==0){    //al primo click carica gli annunci acquistati e fa visualizzare appunto gli annunci acquistati
                    $("#parteDinamica").load('paginaAnnunciAcquistati.php');
                    $("#1").text("Nascondi annunci acquistati");    //dopo averlo premuto appunto diventa "Nascondi annunci"
                    bool=1;
                }
                else{
                    $("#parteDinamica").html("");   //se ripremo dato che bool=1 allora voglio "nascondere" gli annunci quindi nell'inner html ricarico una pagina vuota
                    $("#1").text("Visualizza annunci acquistati");  //il bottone diventa Visualizza
                    bool=0;
                }
            }
        });
        

        $("#3").on({ //event handler concatenati
            click:function(){
                if(bool2==0){    //al primo click carica gli annunci tuoi  e fa visualizzare appunto gli annunci tuoi 
                    $("#parteDinamica2").load('paginaTuoiAnnunci.php');
                    $("#3").text("Nascondi tuoi annunci");    //dopo averlo premuto appunto diventa "Nascondi annunci"
                    bool2=1;
                }
                else{
                    $("#parteDinamica2").html("");   //se ripremo dato che bool=1 allora voglio "nascondere" gli annunci quindi nell'inner html ricarico una pagina vuota
                    $("#3").text("Visualizza i tuoi annunci");  //il bottone diventa Visualizza
                    bool2=0;
                }
            }
        });


    });
</script>
<?php
    session_set_cookie_params(0);   //così quando chiudo la pagina la sessione si chiude
    session_start();    //serve sempre quando vuoi ricavare qualcosa dalla sessione (quindi lo devi inserire in tutte quelle pagine in cui vuoi accedere alla sessione)
    if (isset($_SESSION["nickname"])) {
        $nickname=$_SESSION["nickname"];
        $dbconn = pg_connect("host=localhost port=5432 dbname=YouClothes user=postgres password=edoardo97")
        or die('Could not connect: '.pg_last_error());
        $q1 = "select * from utente where nickname=$1";
        $result = pg_query_params($dbconn,$q1,array($nickname));
        if($line=pg_fetch_array($result,null,PGSQL_ASSOC)){
            $q1 = "select * from utente where nickname=$1";
            $result = pg_query_params($dbconn,$q1,array($nickname));
            $line=pg_fetch_array($result,null,PGSQL_ASSOC);
            $nome=$line["nome"];
            $cognome=$line["cognome"];
            $email=$line["email"];
            $citta=$line["citta"];
            $datanascita=$line["dataNascita"];
        }
        echo "
    <html>

        <head>
            <link rel=stylesheet href=../stile.css type=text/css>
            <script src=https://code.jquery.com/jquery-2.1.3.min.js></script>
            <title>Profilo personale</title>
            <meta charset=utf-8>
            <meta name=viewport content=width=device-width, initial-scale=1>
        </head>
    
    
        <body class=bordo>
            <br><br>
            <p align=center><br><br><br>
                <titolo>
                    Il tuo profilo:
                </titolo><br><br><br><br>
                <sottotitolo>
                    Nome: $nome<br><br>
                    Cognome: $cognome<br><br>
                    Saldo attuale: $_SESSION[saldo] euro<br><br>
                    Email: $email<br><br>
                    Data di nascita: $datanascita<br><br>
                    Città: $citta<br><br>
                    <button id=1>Visualizza annunci acquistati</button><br><br>
                    <button id=3>Visualizza i tuoi annunci</button><br><br>
                </sottotitolo><br>
                <div id=parteDinamica> <!-- parte dinamica per la visualizzazione degli annunci acquistati -->
                </div>
                <div id=parteDinamica2> <!-- parte dinamica per la visualizzazione degli annunci tuoi -->
                </div>
                <p align=center>
                <a href='../PHP files/logout.php'><button>Logout</button></a>&nbsp;&nbsp;
                <a href=../Home/homepage.php><button>Indietro</button></a>&nbsp;&nbsp;
                </p>
        </body>
    </html>"; 

    }
    else {
        echo "<html>
        <head>
            <link rel=stylesheet href=../stile.css type=text/css>
            <title>ERRORE</title>
            <meta charset=utf-8>
            <meta name=viewport content=width=device-width, initial-scale=1>
        </head>
    
    
        <body class=bordo>

            <p align=center><br><br><br>
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

        </body>
        </html>"; 

    }

?>
