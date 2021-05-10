<?php
include(dirname(__DIR__, 1) . "/src/config.php");
include(dirname(__DIR__, 1) . "/src/functions.php");
?>

<!doctype html>
<html lang="sv">
<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>
    <link rel="stylesheet" type="text/css" href="css/default.css" />
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png" />
</head>

<body>
    <header class="view-header">
        <div class="view-header-logo">
            <img src="img/150x150/tva-valvig-stenbro-over-nattrabyan.jpg" alt="Logo: Blekingekustvägens tvåvalviga stenbro" />
        </div>

        <div class="view-header-title">
            Nättraby Vägmuseum - där vägarna möts
        </div>
        <nav class="view-header-nav">
            <ul>
                <?php
                $url = basename($_SERVER["REQUEST_URI"]);
                ?>
                <li>
                    <a href="index.php" class="<?= $url == "kmom10" || $url == "index.php" ? "selected" : null ?>">Hem</a>
                </li>
                <li>
                    <a href="objekt.php" class="<?= $url == "objekt.php" ? "selected" : null ?>">Objekt</a>
                </li>
                <li>
                    <a href="galleri.php" class="<?= $url == "galleri.php" ? "selected" : null ?>">Galleri</a>
                </li>
                <!-- <li>
                    <a href="artiklar.php" class="<//?= $url == "artiklar.php" ? "selected" : null ?>">Artiklar</a>
                </li> -->
                <!-- <li>
                    <a href="om.php" class="<//?= $url == "om.php" ? "selected" : null ?>">Om</a>
                </li> -->
                <li>
                    <a href="sok.php" class="<?= $url == "sok.php" ? "selected" : null ?>">Sök</a>
                </li>
            </ul>
        </nav>
    </header>
