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
            session_set_cookie_params(0);   //così quando chiudo la pagina la sessione si chiude
            session_start();
        ?>

        <title>YouClothes</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>


    <body>
        <br>
        <!--titolo del sito-->
        <div style="margin-bottom: 0px" align="center">
            <titolo>YouClothes</titolo><br>
            <sottotitolo>Compra e vendi i tuoi vestiti usati!
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
                <span class="navbar-text">YouClothes</span>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <ul class="navbar-nav">

                    <!--
                        questo è un elemento dropdown ovvero un pulsante che quando premuto mostra un menu a tendina
                        anche in questo caso il data-target indica i dati a cui fare riferimento quando premuto, ovvero
                        in questo caso impostato sui link contenuti dal div successivo
                        mentre data-toggle indica il tipo di tasto
                    -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" data-target="#dropdown_target" href="#">
                            Menù
                            <span class="caret"></span>
                        </a>
                        
                        <div class="dropdown-menu"  aria-labelledby="dropdown_target" id="dropdown_target">
                            <a class="dropdown-item" href="../ProfiloUtente/mioprofilo.php">Il mio profilo</a>
                            <a class="dropdown-item">Preferiti</a>
                            <a class="dropdown-item">I miei annunci</a>
                            <a class="dropdown-item" href="../PHP files/logout.php">Logout</a>
                        </div>
                    </li>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

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
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <li class="nav-item">
                        <a class="nav-link" href="../CreaPost/creapost.html">Crea annuncio</a>
                    </li>

                    <!--
                        serie di spazi inserita soltanto per far apparire il login e sign up nella parte destra
                        c'è sicuramente un altro modo piu corretto questa è soltanto una soluzione temporanea dato che
                        al momento non sapevo come fare
                    -->
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    
                    

                    <?php
                        //questa parte serve per far apparire o login/signup in caso non è stato effettuato l'accesso oppure il nickname di colui che ha effettuato l'accesso
                        if(isset($_SESSION["nickname"])){
                            echo "
                            <div class=nav-item align=right>
                            <a class=nav-link href=../ProfiloUtente/mioprofilo.php>$_SESSION[nickname]</a>
                            </div>
                            ";
                        }
                        else{
                            echo "
                            <div class=nav-item align=right>
                                <a class=nav-link href=../Registrazione/login.html>Login</a>
                            </div>
                            <span class=navbar-text>/</span>

                            <div class=nav-item align=right>
                                <a class=nav-link href=../Registrazione/signup.html>Sign up</a>
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
        

        <!-- Forse da cambiare per renderla dinamica o direttamente eliminare questa parte tanto abbiamo fatto le categorie dinamiche-->
        <div id="container" style=background-color:white;>
            <div id="parteDinamica"> <!-- inizio parte dinamica -->
                <ul id="griglia">
                    
                    <li><img src="../foto vestiti/felpa.jpg" width="250" height="250"><p>Felpa</p></li>
                    <li><img src="../foto vestiti/magliasw.jpg"width="250" height="250"><p>T-shirt star wars</p></li>
                    <li><img src="../foto vestiti/tshirt.jpg"width="250" height="250"><p>Polo</p></li>
                    <li><img src="../foto vestiti/giacchetto pelle.jpg"width="250" height="250"><p>Giacchetto di pelle</p></li>
                    <li><img src="../foto vestiti/jeans.jpg"width="250" height="250"><p>Jeans</p></li>
                    <li><img src="../foto vestiti/giaccone.jpg"width="250" height="250"><p>Giaccone</p></li>
                    <li><img src="../foto vestiti/maglietta gialla e nera.jpg"width="250" height="250"><p>T-shirt gialla e nera</p></li>
                    <li><img src="../foto vestiti/magliasw.jpg"width="250" height="250"><p>t-shirt</p></li>
                    <li><img src="../foto vestiti/tshirt.jpg"width="250" height="250"><p>t-shirt</p></li>
                    <li><img src="../foto vestiti/magliasw.jpg"width="250" height="250"><p>t-shirt</p></li>
                    <li><img src="../foto vestiti/tshirt.jpg"width="250" height="250"><p>t-shirt</p></li>
                    <li><img src="../foto vestiti/giaccone.jpg"width="250" height="250"><p>t-shirt</p></li>
                    <li><img src="../foto vestiti/tshirt.jpg"width="250" height="250"><p>t-shirt</p></li>
                    <li><img src="../foto vestiti/magliasw.jpg"width="250" height="250"><p>t-shirt</p></li>
                    <li><img src="../foto vestiti/tshirt.jpg"width="250" height="250"><p>t-shirt</p></li>
                </ul>

            </div>  <!-- fine parte dinamica -->
        </div>
     
        
        <!-- script JQuery -->
        <script>
            $(document).ready(function(){
                $("#1,#2,#3,#4,#5,#6").click(function(){
                    var categoria = $(this).attr("name");
                    var url = "paginaAnnunci.php?nome=";
                    categoria = String(categoria);
                    url = url.concat(categoria);
                    $("#parteDinamica").load(''+url);
                });
            });
        </script>
        <!-- fine script JQuery -->


    </body>

</html>