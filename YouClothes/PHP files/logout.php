<?php
//per distruggere la sessione e quindi fare il logou
    session_start();
    session_destroy();
    header('location: ../Home/homepage.php');
?>