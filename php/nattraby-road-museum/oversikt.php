<?php
$title = "Översikt över alla objekt | Nättraby Vägmuseum";
include(__DIR__ . "/views/header.php");
?>

<main>
    <article>
        <header>
            <h1>Översikt över alla objekt</h1>
        </header>

        <?php
        $db = connectToDb($dsnNVM2);
        $sql = "select id, data, title, image1, image1Alt, image1Text from object;";
        $stmt = $db->prepare($sql);
        $data = tryStmt($stmt);
        ?>

        <div class="overview-object">
            <?php if (isset($_GET["object"]) ?? false) : ?>
                <?php $object = getObject($_GET["object"], $dsnNVM2); ?>
                <?php include(__DIR__ . "/views/object.php"); ?>
            <?php endif; ?>
        </div>

        <p>
            Klicka på valfritt objekt.
        </p>

        <div class="overview clearfix">
            <?php foreach ($data as $value) : ?>
                <div onclick="clickDiv('<?php echo $value["title"] ?>')" class="overview-box">
                    <div class="overview-title">
                        <?php $objectTitle = substr_replace($value["title"], "", 0, 3); ?>
                        <h2><?= $objectTitle ?></h2>
                    </div>
                    <div class="overview-image">
                        <img src="img/250/<?= $value["image1"] ?>" alt="<?= $value["image1Alt"] ?>" />
                    </div>
                    <div class="overview-text">
                        <?= $value["image1Text"] ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </article>
</main>

<script>
    function clickDiv(objTitle) {
        location.href="?object=" + objTitle;
    }
</script>

<?php include(__DIR__ . "/views/footer.php"); ?>
