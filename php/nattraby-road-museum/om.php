<?php
$title = "Om Nättraby Vägmuseum | Nättraby Vägmuseum";

include(__DIR__ . "/views/header.php");
?>

<main>
    <article>
        <header>
            <?php
            $db = connectToDb($dsnNVM2);
            $sql = "select * from article where id = 2;";
            $stmt = $db->prepare($sql);
            $data = tryStmt($stmt);
            ?>

            <?php foreach ($data as $column) : ?>
                <h1><?= $column["title"] ?></h1>
                <hr />
            <?php endforeach; ?>
        </header>
        <div class="about-article-body">
            <?php foreach ($data as $column) : ?>
                <?php
                $img = <<<EOD
                <div class="about-img-box">
                    <img src="img/orig/{$column["image1"]}" alt="{$column["image1Alt"]}" />
                    <span class="about-img-box-text"><em>{$column["image1Text"]}</em></span>
                </div>
EOD;
                echo $img;
                ?>
                <?= $column["data"] ?>
            <?php endforeach; ?>
        </div>

        <footer class="about-footer">
            <h2>Om skaparen bakom denna webbsida</h2>

            <p>
                Den här sidan är skapad av Krystian Manczak, som studerar Webbprogrammering på Blekinge Tekniska Högskola (BTH) på den blåsiga "halvön" Karlskrona. Webbapplikationen skapades - och är den, som ska presenteras - vid ett slutligt projekt inför kursen "<b>Webbteknologier</b>", även känd som <i>htmlphp</i>. Kursen <cite>lär ut webbutveckling där teknikerna HTML, CSS, PHP och SQL används för att tillsammans bygga en databasdriven webbplats</cite>.
            </p>

            <p>
                Krystian Manczak studerar Webbprogrammering, ett tre-årigt program på BTH, där man kommer i konktakt med olika programmeringsspråk; HTML, CSS, PHP, Python, mm. Den här sidan är byggd i HTML, CSS och PHP med SQLite.
            </p>

            <p>
                Den mesta, om nästan inte all information på den här webbsidan hämtas ifrån en databas. Bilder och allt material kommer ifrån Nättraby Vägmuseum.
            </p>
            <div class="about-images clearfix">
                <div class="about-images-width">
                    <img src="img/krystian-manczak.png" alt="Bild på mig själv, Krystian Manczak" />
                    <span class="about-images-text">
                        Krystian Manczak.
                    </span>
                </div>

                <div class="about-images-width">
                    <img src="img/arbetsplats-hemma.png" alt="Krystians arbetsplats hemma" />
                    <span class="about-images-text">
                        Min arbetsplats hemma när jag knappar kod för det befintliga projektet.
                    </span>
                </div>

                <div class="about-images-width">
                    <img src="img/nara-till-labbsalen.png" alt="Labbsalen i skolan på BTH" />
                    <span class="about-images-text">
                        Labbsalen på BTH befinner sig innanför fönstren till höger där jag brukar sitta och studera.
                    </span>
                </div>
            </div>
        </footer>
    </article>
</main>


<?php include(__DIR__ . "/views/footer.php"); ?>
