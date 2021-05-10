<?php
include(__DIR__ . "/src/config.php");
include(__DIR__ . "/src/functions.php");
$file = __DIR__ . "/db/nvm2_backup.sqlite";
$dsn = "sqlite:$file";

if (isset($_POST["text"]) ?? false) {
    $getData = $_POST["text"];
    $id = $_POST["id"];
    $db = connectToDb($dsn);
    $sql = <<<EOD
    update object set data = ? where id = ?;
EOD;
    $stmt = $db->prepare($sql);
    $params = [ $getData, $id ];
    $result = tryStmt($stmt, null, $params);
    foreach ($result as $value) {
        echo $value["id"];
        echo $value["data"];
    }
}

$db = connectToDb($dsn);
$sql = "select id, data from object where id = 3;";
$stmt = $db->prepare($sql);
$data = tryStmt($stmt, null, null);
foreach ($data as $value) {
    echo $value["data"];
}
?>

<form method="post">
    <textarea cols="60" rows="20" name="text"><?= $data[0]["data"] ?></textarea>
    <input type="number" name="id" value="<?= $data[0]["id"] ?>" />
    <input type="submit" value="Skicka" />
</form>
