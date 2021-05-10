<?php
if (isset($_POST["login"])) {
    session_start();
    $user = $_POST["user"];
    $pass = $_POST["password"];
    if (($user == "admin" && $pass == "admin") || ($user == "doe" && $pass == "doe")) {
        $_SESSION["user"] = $user;
        $_SESSION["pass"] = $pass;
        header("Location: ?sida=index");
    } else {
        $_SESSION["access"] = "denied";
        header("Location: inloggning.php");
    }
}

if (isset($_POST["skapa-artikel"]) || isset($_POST["skapa-objekt"]) || isset($_POST["redigera-artikel"]) || isset($_POST["redigera-objekt"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];
    $title = $_POST["title"];
    $data = $_POST["data"];
    $author = $_POST["author"];
    $gps = $_POST["gps"];
    $mapImage = $_POST["mapImage"];
    $image1 = $_POST["image1"];
    $image1Alt = $_POST["image1Alt"];
    $image1Text = $_POST["image1Text"];
    $image2 = $_POST["image2"];
    $image2Alt = $_POST["image2Alt"];
    $image2Text = $_POST["image2Text"];

    $params = [
        $id,
        $name,
        $title,
        $data,
        $author,
        $gps,
        $mapImage,
        $image1,
        $image1Alt,
        $image1Text,
        $image2,
        $image2Alt,
        $image2Text
    ];

    if (isset($_POST["redigera-artikel"]) || isset($_POST["redigera-objekt"])) {
        $params = [
            $name,
            $title,
            $data,
            $author,
            $gps,
            $mapImage,
            $image1,
            $image1Alt,
            $image1Text,
            $image2,
            $image2Alt,
            $image2Text,
            $id
        ];
    }

    $db = connectToDb($dsnNVM2);

    if (isset($_POST["skapa-artikel"])) {
        $sql = <<<EOD
            insert into article (
                id,
                name,
                title,
                data,
                author,
                gps,
                mapImage,
                image1,
                image1Alt,
                image1Text,
                image2,
                image2Alt,
                image2Text
                )
                values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);
EOD;
    } elseif (isset($_POST["skapa-objekt"])) {
        $sql = <<<EOD
            insert into object (
                id,
                name,
                title,
                data,
                author,
                gps,
                mapImage,
                image1,
                image1Alt,
                image1Text,
                image2,
                image2Alt,
                image2Text
                )
                values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);
EOD;
    } elseif (isset($_POST["redigera-artikel"])) {
        $sql = <<<EOD
            update article
                set name = ?,
                title = ?,
                data = ?,
                author = ?,
                gps = ?,
                mapImage = ?,
                image1 = ?,
                image1Alt = ?,
                image1Text = ?,
                image2 = ?,
                image2Alt = ?,
                image2Text = ?
                where id = ?;
EOD;
    } elseif (isset($_POST["redigera-objekt"])) {
        $sql = <<<EOD
            update object
                set name = ?,
                title = ?,
                data = ?,
                author = ?,
                gps = ?,
                mapImage = ?,
                image1 = ?,
                image1Alt = ?,
                image1Text = ?,
                image2 = ?,
                image2Alt = ?,
                image2Text = ?
                where id = ?;
EOD;
    }
    $stmt = $db->prepare($sql);
    tryStmt($stmt, null, $params);

    if (isset($_POST["skapa-artikel"]) || isset($_POST["skapa-objekt"])) {
        header("Location: ?sida=skapa");
    } else {
        header("Location: ?sida=redigera");
    }
}

if (isset($_GET["radera"]) ?? false) {
    $id = $_GET["id"];
    $params = [ $id ];
    $db = connectToDb($dsnNVM2);
    if ($_GET["radera"] == "article") {
        $sql = "delete from article where id = ?;";
    } elseif ($_GET["radera"] == "object") {
        $sql = "delete from object where id = ?;";
    }
    $stmt = $db->prepare($sql);
    tryStmt($stmt, null, $params);

    header("Location: ?sida=radera");
}
