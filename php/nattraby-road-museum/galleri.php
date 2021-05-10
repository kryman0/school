<?php
$title = "Galleri av bilder till objekten | Nättraby Vägmuseum";
include(__DIR__ . "/views/header.php");

session_start();
$offset = $_SESSION["offset"] ?? 0;
$_SESSION["offset"] = $offset;
if (isset($_GET["thumbnails"])) {
    if ($_GET["thumbnails"] == "prev") {
        if ($_SESSION["offset"] <= 0) {
            $_SESSION["offset"] = 0;
            $sql = "select image1, image1Alt from object union select image2, image2Alt from object limit 5 offset ?;";
        } else {
            $_SESSION["offset"] -= 4;
            if ($_SESSION["offset"] == 0) {
                $sql = "select image1, image1Alt from object union select image2, image2Alt from object limit 5 offset ?;";
            } else {
                $sql = "select image1, image1Alt from object union select image2, image2Alt from object limit 4 offset ?;";
            }
        }
    } elseif ($_GET["thumbnails"] == "next") {
        if ($_SESSION["offset"] >= 20) {
            $_SESSION["offset"] = 0;
            $sql = "select image1, image1Alt from object union select image2, image2Alt from object limit 5 offset ?;";
        } else {
            $_SESSION["offset"] += 4;
            $sql = "select image1, image1Alt from object union select image2, image2Alt from object limit 4 offset ?;";
        }
    }
} elseif (!isset($_GET["thumbnails"]) && !isset($_GET["image"]) && $offset > 0) {
    $sql = "select image1, image1Alt from object union select image2, image2Alt from object limit 4 offset ?;";
} elseif (!isset($_GET["thumbnails"]) && !isset($_GET["image"]) && $offset <= 0) {
    $sql = "select image1, image1Alt from object union select image2, image2Alt from object limit 5 offset ?;";
}
$offset = $_SESSION["offset"];
$params = [ $offset ];
$db = connectToDb($dsnNVM2);
if (isset($_GET["image"])) {
    $stmt = $db->prepare($_SESSION["sql"]);
    $data = tryStmt($stmt, null, $params);
} else {
    $_SESSION["sql"] = $sql;
    $stmt = $db->prepare($sql);
    $data = tryStmt($stmt, null, $params);
}
?>

<main>
    <article>
        <header>
            <h1>Galleri som visar bilderna som är kopplade till objekten</h1>
        </header>

        <div class="galleri">
            <?php foreach ($data as $value) : ?>
                <?php
                if (isset($value["image1Alt"]) ?? false) {
                    if (strlen($value["image1Alt"]) > 0) {
                        $img1 = <<<EOD
                        <div class="galleri-box">
                            <a href="?image={$value["image1"]}"><img src="img/150x150/{$value["image1"]}" alt="{$value["image1Alt"]}" /></a>
                        </div>
EOD;
                        echo $img1;
                    }
                }
                if (isset($value["image2Alt"]) ?? false) {
                    if (strlen($value["image2Alt"]) > 0) {
                        $img2 = <<<EOD
                        <div class="galleri-box">
                            <img src="img/150x150/{$value["image2"]}" alt="{$value["image2Alt"]}" />
                        </div>
EOD;
                        echo $img2;
                    }
                }
                ?>
            <?php endforeach; ?>
        </div>

        <footer>
            <div class="galleri-object-arrows">
                <?php
                echo <<<EOD
                    <div class="galleri-object-arrow-prev-box"><a href="?thumbnails=prev">&xlarr;&nbsp; Föregående</a></div>
EOD;
                echo <<<EOD
                    <div class="galleri-object-arrow-next-box"><a href="?thumbnails=next">Nästa &nbsp;&xrarr;</a></div>
EOD;
                ?>
            </div>

            <?php if (isset($_GET["image"]) ?? false) : ?>
                <div class="galleri-chosen-image-box">
                    <?php
                    $getImage = $_GET["image"];
                    $db = connectToDb($dsnNVM2);
                    $sql = "select image1Alt from object where image1 = \"$getImage\";";
                    $stmt = $db->prepare($sql);
                    $imgAlt = tryStmt($stmt, "column");
                    if (!$imgAlt) {
                        $sql = "select image2Alt from object where image2 = \"$getImage\";";
                        $stmt = $db->prepare($sql);
                        $imgAlt = tryStmt($stmt, "column");
                    }
                    ?>
                    <img src="img/500/<?= $getImage ?>" alt="<?= $imgAlt ?>" />
                </div>
            <?php endif; ?>
        </footer>
    </article>
</main>

<?php include(__DIR__ . "/views/footer.php") ?>
