<?php
    session_start();
    
    session_unset();
    session_destroy();
    header("Location: " . $HTML_PATH . "/index.php?page=home");
    exit;
?>