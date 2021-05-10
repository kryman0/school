<?php
$tableName = $_GET["tabell"] ?? false;
?>
<h1>Radera Artikel/Objekt</h1>

<div class="admin-skapa-container">
    <p>
        <a href="?sida=radera&tabell=artikel">Radera Artikel</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="?sida=radera&tabell=objekt">Radera Objekt</a>
    </p>

    <?php if ($tableName == "artikel") : ?>
        <?php
        $db = connectToDb($dsnNVM2);
        $sql = "select id, title, author from article order by id asc;";
        $stmt = $db->prepare($sql);
        $data = tryStmt($stmt);
        ?>

        <div class="admin-skapa-box">
            <h2>Radera Artikel</h2>
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
            <h2>Radera Objekt</h2>
            <?= printTableFromDb($_GET["tabell"], $data); ?>
        </div>

    <?php endif; ?>
</div>
