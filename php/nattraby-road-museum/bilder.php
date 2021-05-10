<?php
$title = "Objekt ifrån Nättraby Vägmuseum | Nättraby Vägmuseum";

include(__DIR__ . "/views/header.php");

$db = connectToDb($dsnNVM2);
$sql = "select * from object;";
$stmt = $db->prepare($sql);
$data = tryStmt($stmt);
?>
<main>
    <article>
        <?php foreach ($data as $column) : ?>
        <div class="objects-article-header">
            <?php
            $headTitle = substr_replace($column["title"], "", 0, 3);
            ?>
            <h1><?= $headTitle ?></h1>
            <hr />
        </div>

        <div class="objects-article-body">
            <?php
            $img2 = <<<EOD
            <div class="objects-img-box">
                <img src="img/orig/{$column["image2"]}" alt="{$column["image2Alt"]}" />
                <span class="objects-img-box-text"><em>{$column["image2Text"]}</em></span>
            </div>
EOD;
            $img1 = <<<EOD
            <div class="objects-img-box">
                <img src="img/orig/{$column["image1"]}" alt="{$column["image1Alt"]}" />
                <span class="objects-img-box-text"><em>{$column["image1Text"]}</em></span>
            </div>
EOD;
            if (str_word_count($img2) > 18) {
                echo $img2;
            }

            if (str_word_count($img1) > 18) {
                echo $img1;
            }

            echo $column["data"];
            ?>
        </div>

        <div class="objects-article-footer">
            <?php
            echo "<p>Författare: {$column["author"]}</p>";
            echo "<p>{$column["gps"]}</p>";
            ?>
        </div>
        <?php endforeach; ?>
    </article>
</main>

<?php include(__DIR__ . "/views/footer.php"); ?>
