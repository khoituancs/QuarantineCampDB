<?php if (!isset($_SESSION["authenticated"])){
    include_once($PHP_PATH . "/content/welcome.html");
} else{
    header("Location: " . $HTML_PATH . "/index.php?page=dashboard");
}
?>

