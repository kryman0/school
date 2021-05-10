<?php
$title = "Galleri av bilder till objekten | Nättraby Vägmuseum";
include(__DIR__ . "/views/header.php");

$db = connectToDb($dsnNVM2);
$sql = "select image1, image1Alt, image2, image2Alt from object limit 3;";
$stmt = $db->prepare($sql);
$data = tryStmt($stmt);
?>

<main>
    <article>
        <header>
            <h1>Galleri som visar bilderna som är kopplade till objekten</h1>
        </header>

        <div class="galleri">
            <?php foreach ($data as $value) : ?>
                <?php
                $img1 = <<<EOD
                <div class="galleri-box">
                <img src="img/250/{$value["image1"]}" alt="{$value["image1Alt"]}" />
                </div>
EOD;
                $img2 = <<<EOD
                <div class="galleri-box">
                <img src="img/250/{$value["image2"]}" alt="{$value["image2Alt"]}" />
                </div>
EOD;
                if (strlen($value["image1Alt"]) > 0) {
                    echo $img1;
                }
                if (strlen($value["image2Alt"]) > 0) {
                    echo $img2;
                }
                ?>
            <?php endforeach; ?>
        </div>

        <footer>
        </footer>
    </article>
</main>

<?php include(__DIR__ . "/views/footer.php") ?>
