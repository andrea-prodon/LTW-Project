<?php
//per distruggere la sessione e quindi fare il logout
    session_start();
    if(isset($_SESSION['nickname'])){
        session_destroy();
        header('location: ../Home/homepage.php');
    }
?>