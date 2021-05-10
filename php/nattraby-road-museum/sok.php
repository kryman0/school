<?php
$title = "Sök bland artiklar och objekt | Nättraby Vägmuseum";
include(__DIR__ . "/views/header.php");

if ($_GET["search"] ?? false) {
    $searchQuery = $_GET["search"];
    $search = implode(substr_replace(
        [$searchQuery[0], $searchQuery[strlen($searchQuery) - 1]],
        ["%", "$searchQuery%"],
        [0, 0, -1, 0]
    ));
    $params = [ $search ];
    $db = connectToDb($dsnNVM2);
    $sql = "select title as articleTitle from article where title like ?;";
    $stmt = $db->prepare($sql);
    $articleData = tryStmt($stmt, null, $params);

    $sql = "select title as objectTitle from object where title like ?;";
    $stmt = $db->prepare($sql);
    $objectData = tryStmt($stmt, null, $params);
}
?>

<main>
    <article>
        <header>
            <h1>Sök bland artiklar och objekt</h1>
        </header>
        <div class="search-form">
            <p>
                Efter lyckad sökning, leder länken i tabellen till respektive artikel/objekt.
            </p>
            
            <form>
                <input type="search" name="search" placeholder="Sök efter valfritt ord." />
                <input type="submit" value="Sök" />
            </form>

        </div>
        <footer>
            <?php if (isset($articleData) ?? isset($objectData) ?? false) : ?>
                <?= resultFromDb($articleData, $objectData); ?>
            <?php endif; ?>
        </footer>
    </article>
</main>

<?php include(__DIR__ . "/views/footer.php"); ?>
