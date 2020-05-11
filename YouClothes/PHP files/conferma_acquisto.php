<html>
<body class=bordo>
    
    <?php
        session_start();
        $id_annuncio = $_GET[annuncio];
        

        echo "<html>

                <head>
                    <link rel=stylesheet href=../stile.css type=text/css>
                    <title>Saldo caricato</title>
                    <meta charset=utf-8>
                    <meta name=viewport content=width=device-width, initial-scale=1>
                </head>
            
            
                <body class=bordo>
            
                    <p align=center> <br><br><br><br>
                        <titolo>Sei sicuro di voler procedere all'acquisto?</titolo> <br><br><br><br>
                        <sottotitolo>
                        <p align=center>
                            <a href='../Home/homepage.php'><button> Annulla </button> </a> &nbsp;&nbsp;&nbsp;
                            <a href='acquisto.php?annuncio=$id_annuncio'><button>Conferma</button> </a>
                        </p>
                        </sottotitolo>
                    </p>
                </body>
            
            </html>";
    ?>
    

    

    


</body>
</html>