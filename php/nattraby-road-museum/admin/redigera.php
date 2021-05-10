<?php
$tableName = $_GET["tabell"] ?? false;
$id = $_GET["id"] ?? false;
?>
<h1>Redigera Artikel/Objekt</h1>

<div class="admin-skapa-container">
    <p>
        <a href="?sida=redigera&tabell=artikel">Redigera Artikel</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="?sida=redigera&tabell=objekt">Redigera Objekt</a>
    </p>

    <?php if ($tableName == "artikel") : ?>
        <?php
        $db = connectToDb($dsnNVM2);
        $sql = "select id, title, author from article order by id asc;";
        $stmt = $db->prepare($sql);
        $data = tryStmt($stmt);
        ?>

        <div class="admin-skapa-box">
            <h2>Välj Artikel</h2>
            <?= printTableFromDb($_GET["tabell"], $data); ?>
        </div>

    <?php elseif ($tableName == "objekt") : ?>
        <?php
        $db = connectToDb($dsnNVM2);
        $sql = "select id, title, author from object order by id asc;";
        $stmt = $db->prepare($sql);
        $data = tryStmt($stmt);
        ?>

        <div class="admin-skapa-box">
            <h2>Välj Objekt</h2>
            <?= printTableFromDb($_GET["tabell"], $data); ?>
        </div>
    <?php endif; ?>

    <?php if ($id) : ?>
        <?php
        $db = connectToDb($dsnNVM2);
        if ($tableName == "artikel") {
            $sql = "select * from article where id = {$id};";
        } else if ($tableName == "objekt") {
            $sql = "select * from object where id = {$id};";
        }
        $stmt = $db->prepare($sql);
        $artObj = tryStmt($stmt);
        ?>

        <div class="admin-skapa-box">
            <?php if ($tableName == "artikel") : ?>
                <h2>Redigera Artikel</h2>
            <?php elseif ($tableName == "objekt") : ?>
                <h2>Redigera Objekt</h2>
            <?php endif; ?>
            <form method="post" action="?sida=post-bearbetning">
                <p>
                    Id
                    <br />
                    <input type="number" name="id" value="<?= $artObj[0]["id"] ?>" readonly required />
                </p>

                <p>
                    Namn
                    <br />
                    <input type="text" name="name" value="<?= $artObj[0]["name"] ?>" required />
                </p>

                <p>
                    Titel
                    <br />
                    <input type="text" name="title" value="<?= $artObj[0]["title"] ?>" required />
                </p>

                <p>
                    Data
                    <br />
                    <textarea name="data" required><?= $artObj[0]["data"] ?></textarea>
                </p>

                <p>
                    Författare
                    <br />
                    <input type="text" name="author" value="<?= $artObj[0]["author"] ?>" required />
                </p>

                <p>
                    GPS
                    <br />
                    <input type="text" name="gps" value="<?= $artObj[0]["gps"] ?>" />
                </p>

                <p>
                    Bildkarta
                    <br />
                    <input type="text" name="mapImage" value="<?= $artObj[0]["mapImage"] ?>" />
                </p>

                <p>
                    Bild 1
                    <br />
                    <input type="text" name="image1" value="<?= $artObj[0]["image1"] ?>" />
                </p>

                <p>
                    Bild 1 alt
                    <br />
                    <input type="text" name="image1Alt" value="<?= $artObj[0]["image1Alt"] ?>" />
                </p>

                <p>
                    Bild 1 text
                    <br />
                    <input type="text" name="image1Text" value="<?= $artObj[0]["image1Text"] ?>" />
                </p>

                <p>
                    Bild 2
                    <br />
                    <input type="text" name="image2" value="<?= $artObj[0]["image2"] ?>" />
                </p>

                <p>
                    Bild 2 alt
                    <br />
                    <input type="text" name="image2Alt" value="<?= $artObj[0]["image2Alt"] ?>" />
                </p>

                <p>
                    Bild 2 text
                    <br />
                    <input type="text" name="image2Text" value="<?= $artObj[0]["image2Text"] ?>" />
                </p>

                <p>
                    <?php if ($tableName == "artikel") : ?>
                        <input type="submit" name="redigera-artikel" value="Redigera Artikel" />
                    <?php elseif ($tableName == "objekt") : ?>
                        <input type="submit" name="redigera-objekt" value="Redigera Objekt" />
                    <?php endif; ?>
                </p>
            </form>
        </div>
    <?php endif; ?>
</div>
