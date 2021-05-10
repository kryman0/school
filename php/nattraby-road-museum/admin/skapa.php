<?php
$tableName = $_GET["tabell"] ?? false;
?>
<h1>Skapa Artikel/Objekt</h1>

<div class="admin-skapa-container">
    <p>
        <a href="?sida=skapa&tabell=artikel">Skapa Artikel</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="?sida=skapa&tabell=objekt">Skapa Objekt</a>
    </p>

    <?php
    if ($tableName == "artikel") {
        $db = connectToDb($dsnNVM2);
        $sql = "select id from article order by id desc;";
        $stmt = $db->prepare($sql);
        $artObjId = tryStmt($stmt, "column");
    } elseif ($tableName == "objekt") {
        $db = connectToDb($dsnNVM2);
        $sql = "select id from object order by id desc;";
        $stmt = $db->prepare($sql);
        $artObjId = tryStmt($stmt, "column");
    }
    ?>

    <?php if ($artObjId ?? false) : ?>
        <div class="admin-skapa-box">
            <?php if ($tableName == "artikel") : ?>
                <h2>Ny Artikel</h2>
            <?php elseif ($tableName == "objekt") : ?>
                <h2>Nytt Objekt</h2>
            <?php endif; ?>

            <form method="post" action="?sida=post-bearbetning">
                <p>
                    Id
                    <br />
                    <input type="number" name="id" value="<?= $artObjId + 1 ?>" readonly required />
                </p>

                <p>
                    Namn
                    <br />
                    <input type="text" name="name" required />
                </p>

                <p>
                    Titel
                    <br />
                    <input type="text" name="title" required />
                </p>

                <p>
                    Data
                    <br />
                    <textarea name="data" required></textarea>
                </p>

                <p>
                    Författare
                    <br />
                    <input type="text" name="author" required />
                </p>

                <p>
                    GPS
                    <br />
                    <input type="text" name="gps" />
                </p>

                <p>
                    Bildkarta
                    <br />
                    <input type="text" name="mapImage" />
                </p>

                <p>
                    Bild 1
                    <br />
                    <input type="text" name="image1" />
                </p>

                <p>
                    Bild 1 alt
                    <br />
                    <input type="text" name="image1Alt" />
                </p>

                <p>
                    Bild 1 text
                    <br />
                    <input type="text" name="image1Text" />
                </p>

                <p>
                    Bild 2
                    <br />
                    <input type="text" name="image2" />
                </p>

                <p>
                    Bild 2 alt
                    <br />
                    <input type="text" name="image2Alt" />
                </p>

                <p>
                    Bild 2 text
                    <br />
                    <input type="text" name="image2Text" />
                </p>

                <p>
                    <?php if ($tableName == "artikel") : ?>
                        <input type="submit" name="skapa-artikel" value="Skapa Artikel" />
                    <?php elseif ($tableName == "objekt") : ?>
                        <input type="submit" name="skapa-objekt" value="Skapa Objekt" />
                    <?php endif; ?>
                </p>
            </form>
        </div>
    <?php endif;?>
</div>
