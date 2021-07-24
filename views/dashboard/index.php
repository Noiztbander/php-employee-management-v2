<?php
if (!isset($_SESSION["loggedUsername"])) {
    header("Location:../index.php?accessDenied=true");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Assets -->
    <link rel="stylesheet" href="<?php echo CSS; ?>/main.css">
    <script src="<?php echo JS; ?>/timeout.js"></script>
    <!-- Dependencies -->
    <script src="<?php echo JQUERY; ?>/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo NODE_MODULES; ?>/jsgrid/dist/jsgrid.min.js"></script>
    <link rel="stylesheet" href="<?php echo NODE_MODULES; ?>/jsgrid/css/jsgrid.css" />
    <link rel="stylesheet" href="<?php echo NODE_MODULES; ?>/jsgrid/css/theme.css" />
    <link rel="stylesheet" href="<?php echo CSS; ?>/login.css">
    <link rel="stylesheet" href="<?php echo CSS_BOOTSTRAP; ?>/bootstrap.min.css">
    <title>Dashboard</title>
</head>

<body>
    <?php require_once("./assets/html/header.php"); ?>
    <main class="container-fluid">
        <div id="jsGrid"></div>
    </main>
    <?php require_once("./assets/html/footer.html"); ?>
    <script src="<?php echo JS; ?>/dashboard.js"></script>
</body>

</html>