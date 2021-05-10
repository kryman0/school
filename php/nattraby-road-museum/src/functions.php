<?php
function connectToDb($dsn)
{
    try {
        $db = new PDO($dsn);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $db;
    } catch (PDOException $e) {
        echo "<p>Something went wrong.</p>";
        echo "<pre>" . print_r($db->errorInfo()) . "</pre>";
        throw $e;
    }
}

function tryStmt($stmt, $fetch = null, $params = null)
{
    try {
        if ($params) {
            $stmt->execute($params);
        } else {
            $stmt->execute();
        }

        if ($fetch == "column") {
            $result = $stmt->fetchColumn();
        } else {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        return $result;
    } catch (PDOException $e) {
        echo "<p>Error: couldn't execute the query. Printing out errors:</p>";
        echo "<pre>" . print_r($stmt->errorInfo()) . "</pre>";
        throw $e;
    }

    return;
}

function resultFromDb($articleArray, $objectArray)
{
    if (count($articleArray) < 1 && count($objectArray) < 1) {
        return;
    }

    $trTh = "<tr>";
    $trTh .= "<th>Artikel</th>";
    $trTh .= "<th>Objekt</th>";
    $trTh .= "</tr>";

    $dataArray = $articleArray + $objectArray;
    $rows = null;
    foreach ($dataArray as $key => $value) {
        if (key($dataArray[$key]) == "articleTitle") {
            $artTitle = str_replace(" ", "", $value["articleTitle"]);
            $rows .= <<<EOD
                <tr>
                    <td><a href="artiklar.php#{$artTitle}">{$value["articleTitle"]}</a></td>
                    <td></td>
                </tr>
EOD;
        }
        if (key($dataArray[$key]) == "objectTitle") {
            $objTitle = str_replace(" ", "", $value["objectTitle"]);
            $rows .= <<<EOD
                <tr>
                    <td></td>
                    <td><a href="objekt.php#{$objTitle}">{$value["objectTitle"]}</a></td>
                </tr>
EOD;
        }
    }

    $table = <<<EOD
    <table>
        $trTh
        $rows
    </table>
EOD;

    return $table;
}

function getObject($title, $dsn)
{
    $db = connectToDb($dsn);
    $params = [ $title ];
    $sql = "select id, title, data from object where title = ?;";
    $stmt = $db->prepare($sql);
    $data = tryStmt($stmt, null, $params);

    return $data;
}

function printTableFromDb($table, $data)
{
    $trTh = "<tr>";
    $trTh .= "<th>Id</th>";
    $trTh .= "<th>Författare</th>";
    $trTh .= "<th>Titel</th>";
    $trTh .= "</tr>";
    $rows = null;
    foreach ($data as $value) {
        $rows .= "<tr>";
        if ($_GET["sida"] == "redigera") {
            if ($table == "artikel") {
                $rows .= "<td><a href=\"?sida=redigera&tabell=artikel&id={$value["id"]}\">{$value["id"]}</a></td>";
            } elseif ($table == "objekt") {
                $rows .= "<td><a href=\"?sida=redigera&tabell=objekt&id={$value["id"]}\">{$value["id"]}</a></td>";
            }
        } elseif ($table == "artikel") {
            $rows .= "<td><a href=\"?sida=post-bearbetning&radera=article&id={$value["id"]}\">{$value["id"]}</a></td>";
        } elseif ($table == "objekt") {
            $rows .= "<td><a href=\"?sida=post-bearbetning&radera=object&id={$value["id"]}\">{$value["id"]}</a></td>";
        }
        $rows .= "<td>{$value["author"]}</td>";
        $rows .= "<td>{$value["title"]}</td>";
        $rows .= "</tr>";
    }

    $htmlTable = <<<EOD
    <table>
        $trTh
        $rows
    </table>
EOD;

    return $htmlTable;
}
