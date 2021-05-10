<?php
$pageReference = $_GET["sida"] ?? "index";

$baseUrl = basename(__FILE__, ".php");

$pages = [
    "index" => [
        "title" => "Översiktssida för Admin",
        "file" => __DIR__ . "/$baseUrl/index.php",
    ],
    "skapa" => [
        "title" => "Skapa ny artikel/objekt",
        "file" => __DIR__ . "/$baseUrl/skapa.php",
    ],
    "radera" => [
        "title" => "Ta bort artikel/objekt",
        "file" => __DIR__ . "/$baseUrl/radera.php",
    ],
    "redigera" => [
        "title" => "Redigera artikel/objekt",
        "file" => __DIR__ . "/$baseUrl/redigera.php",
    ],
    "post-bearbetning" => [
        "title" => "Bearbetar processen för post",
        "file" => __DIR__ . "/$baseUrl/post-bearbetning.php",
    ],
];

$page = $pages[$pageReference] ?? "index";

$title = $page["title"] ?? "Kunde ej hitta titeln";
$title .= " | Nättraby Vägmuseum";

include(__DIR__ . "/views/header.php");
include(__DIR__ . "/views/admin.php");
include(__DIR__ . "/views/footer.php");
