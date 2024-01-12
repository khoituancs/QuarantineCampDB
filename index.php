<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Quarantine Camp</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <body>
        <?php
            include_once("config.php");
            include_once($PHP_PATH . "/components/navbar.php");
        ?>
        <?php
            if (!empty($_GET['page'])) {
                $page = $_GET['page'];
            } else {
                header("Location: " . $HTML_PATH . "/index.php?page=home");
            }
            if (file_exists($PHP_PATH . "/pages/$page.php")) {
                include_once( $PHP_PATH . "/pages/$page.php");
            } else {
                include_once( $PHP_PATH . "/pages/404.php");
            }
        ?>
    </body>
</html>