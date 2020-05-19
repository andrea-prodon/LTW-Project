<html>

    <head>
        <link rel="stylesheet" href="../stile.css" type="text/css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link href="../css/bootstrap-responsive.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <!--<script src="../js/script_1.js"></script>-->

        <!-- link agli script jquery (online) -->
        <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>

        <?php
            //inizio sessione
            session_start();    //serve sempre quando vuoi ricavare qualcosa dalla sessione (quindi lo devi inserire in tutte quelle pagine in cui vuoi accedere alla sessione)
        ?>

        <title>YouClothes</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>

    <!-- style="background-image: url(bla.jpg)" -->     
    <body>
        <br>
        <!--titolo del sito-->
        <div style="margin-bottom: 0px" align="center">
            <a href = "homepage.php">
                <titolo>YouClothes</titolo><br>
            </a>
            <sottotitolo>
                Compra e vendi i tuoi vestiti usati!
            </sottotitolo>
        </div>
        <br>

        <!--
            il tag nav di html rappresenta una sezione contenente link di navigazione
            ho dunque creato una sezione nav aggiungengo dei parametri per fissarla in alto
            e darle il colore scuro
        -->
        <nav class="navbar navbar-expand-md navbar-dark bg-dark navbar-fixed-top sticky-top">

            <!--
                ho aggiunto questo bottone in modo tale che, quando la pagina viene stretta molto (come ad esempio nel caso
                fossimo da mobile) viene creato un menu a bottone che quando premuto fa apparire uno scroll menu con gli 
                stessi link presenti nella navigation bar
                in questo caso data-toggle=collapse indica che deve apparire quando la pagina si stringe
                e il data target è a quali dati deve fare riferimento quando viene premuto
                infatti collapse_target indica il div successivo contenente tutti i link
            -->
            <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!--questo div è il principale contenuto della navigation bar, contiene i vari link presenti sulla nav-->
            <div class="collapse navbar-collapse" id="collapse_target">

                <!--semplice testo-->
                <a href = "homepage.php"> <span class="navbar-text">YouClothes</span></a>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <ul class="navbar-nav">

                    <!--
                        questo è un elemento dropdown ovvero un pulsante che quando premuto mostra un menu a tendina
                        anche in questo caso il data-target indica i dati a cui fare riferimento quando premuto, ovvero
                        in questo caso impostato sui link contenuti dal div successivo
                        mentre data-toggle indica il tipo di tasto
                    -->
                    <?php
                        if(isset($_SESSION["nickname"])){
                            echo "
                            <li class='nav-item dropdown'>
                                <a class='nav-link dropdown-toggle' data-toggle='dropdown' data-target='#dropdown_target' href=#>
                                    Menù
                                    <span class='caret'></span>
                                </a>
                                
                                <div class='dropdown-menu'  aria-labelledby='dropdown_target' id='dropdown_target'>
                                    <a class='dropdown-item' href='../ProfiloUtente/mioprofilo.php'>Il mio profilo</a>
                                    <a class='dropdown-item' href='../Saldo personale/caricasaldo.html'>Ricarica saldo utente</a>
                                    <a class='dropdown-item'>Preferiti</a>
                                    <a class='dropdown-item' id='MieiAnnunci'>I miei annunci</a>
                                    <a class='dropdown-item' href='../PHP files/logout.php'>Logout</a>
                                </div>
                            </li>
                            ";
                        }
                    ?>
                    <?php
                        if(!isset($_SESSION["nickname"])){
                            echo "
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                        }
                    ?>

                    <!--altri link contenuti nella nav dopo il tasto dropdown-->
                    <!--Ho commentato perchè con Ajax bastano i bottoni, nel caso sentiamoci
                    <li class="nav-item">
                        <a class="nav-link" href="#">Magliette</a>
                    </li>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pantaloni</a>
                    </li>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cappelli</a>
                    </li>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <li class="nav-item">
                        <a class="nav-link" href="#">Felpe</a>
                    </li>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sciarpe</a>
                    </li>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <li class="nav-item">
                        <a class="nav-link" href="#">Giacchetti</a>
                    </li>
                    onclick="return caricaDocumentoMaglietta();"
                    -->
                    <li class="nav-item">
                        <button id="1" class="bottone" name="maglietta">Magliette</bottone> <!-- al click della categoria chiama la funzione all'interno della cartella /js/script_1.js -->
                    </li>
                    <li class="nav-item">
                        <button id="6" class="bottone" name="pantalone">Pantaloni</bottone>
                    </li>
                    <li class="nav-item">
                        <button id="2" class="bottone" name="cappello">Cappelli</bottone>
                    </li>
                    <li class="nav-item">
                        <button id="3" class="bottone" name="felpa">Felpe</bottone>
                    </li>
                    <li class="nav-item">
                        <button id="4" class="bottone" name="sciarpa">Sciarpe</bottone>
                    </li>
                    <li class="nav-item">
                        <button id="5" class="bottone" name="giacchetto">Giacchetti</bottone>
                    </li>
                    <!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->
                    

                    <li class="nav-item">
                        <a class="nav-link" href="../PHP files/controllo_creaPost.php">Crea annuncio</a>
                    </li>
                    <?php
                        if(!isset($_SESSION["nickname"])){
                            echo "
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                        }
                        else{
                            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                        }
                    ?>

                    <!-- tasto cerca -->
                    <span><input type="text" maxlength="30" placeholder="Cerca.." name="cerca" style="width: 100px;"></span>

                    <!--
                        serie di spazi inserita soltanto per far apparire il login e sign up nella parte destra
                        c'è sicuramente un altro modo piu corretto questa è soltanto una soluzione temporanea dato che
                        al momento non sapevo come fare
                    
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    -->
                    <?php
                        if(!isset($_SESSION["nickname"])){
                            echo "
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                        }
                        else{
                            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                        }
                    ?>
                    

                    <?php
                        //questa parte serve per far apparire o login/signup in caso non è stato effettuato l'accesso oppure il nickname di colui che ha effettuato l'accesso
                        if(isset($_SESSION["nickname"])){
                            echo "
                            <div class=nav-item align=right>
                            <a class=nav-link href=../ProfiloUtente/mioprofilo.php>Profilo: $_SESSION[nickname]</a>
                            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <div class=nav-item align=right style=color:white>Saldo: $_SESSION[saldo] euro</div>";
                        }
                        else{
                            echo "

                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                            <div class=nav-item align=right>
                                <a class=nav-link href=../Registrazione/login.php>Login</a>
                            </div>
                            <span class=navbar-text>/</span>

                            <div class=nav-item align=right>
                                <a class=nav-link href=../Registrazione/signup.php>Sign up</a>
                            </div>
                            ";    
                        }
                    
                    ?>

                    <!-- questa parte è stata sostuita da quella sopra-->
                    <!--e qui i link di login e sign up
                    <div class="nav-item" align="right">
                        <a class="nav-link" href="../Registrazione/login.html">Login</a>
                    </div>
                    <span class="navbar-text">/</span>

                    <div class="nav-item" align="right">
                        <a class="nav-link" href="../Registrazione/signup.html">Sign up</a>
                    </div>-->

                </ul>
            </div>
        </nav>       
        

        <!-- Da riempire un po per rendere piu bella esteticamente (in futuro)-->
        <div id="container" style=background-color:white;>
            <div id="parteDinamica"> <!-- inizio parte dinamica -->
            <br><br><br>
                <sottotitolo>Clicca sulle categorie per cominciare a navigare nel sito!</sottotitolo>
            </div>  <!-- fine parte dinamica -->
        </div>
     
        
        <!-- script JQuery -->
        <script>
            $(document).ready(function(){
                $("#1,#2,#3,#4,#5,#6").on({ //event handler concatenati
                    click:function(){
                        var categoria = $(this).attr("name");
                        var url = "paginaAnnunci.php?nome=";
                        categoria = String(categoria);
                        url = url.concat(categoria);
                        $("#parteDinamica").hide().load(''+url).fadeIn(650);    //effetto grafico
                    },
                    mouseenter: function(){	//quando il mouse punta su questi elemento
                        $(this).css("background-color", "lightblue");
                    },
                    mouseleave: function(){ //quando il mouse non punta più su questi elemento
                        $(this).css("background-color","#4CAF50");
                    }
                });
                $("#MieiAnnunci").on({ //event handler concatenati
                    click:function(){
                        $("#parteDinamica").load('../ProfiloUtente/paginaTuoiAnnunci.php');
                    }
                });
                $("input").keyup(function (){
                    var parola = $(this).val();
                    var url = "ricercaAnnunci.php?cerca=";
                    parola = String(parola);
                    url = url.concat(parola);
                    if(parola!=''){
                        $("#parteDinamica").load(''+url);
                    }
                    else{
                        $("#parteDinamica").html("<br><br><br><sottotitolo>Clicca sulle categorie per cominciare a navigare nel sito!</sottotitolo>");
                    }
                });
            });
        </script>
        <!-- fine script JQuery -->


    </body>

</html>