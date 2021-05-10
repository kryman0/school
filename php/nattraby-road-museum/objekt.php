<?php
$title = "Objekt ifrån Nättraby Vägmuseum | Nättraby Vägmuseum";

include(__DIR__ . "/views/header.php");
$db = connectToDb($dsnNVM2);
$sql = "select * from object;";
$stmt = $db->prepare($sql);
$data = tryStmt($stmt);
$text = <<<EOD
<p>
In principio creavit Deus caelum et terram. Terra autem erat inanis et vacua, et tenebrae erant super faciem abyssi : et spiritus Dei ferebatur super aquas. Dixitque Deus : Fiat lux. Et facta est lux. Et vidit Deus lucem quod esset bona : et divisit lucem a tenebris. Appellavitque lucem Diem, et tenebras Noctem : factumque est vespere et mane, dies unus.
</p>

<p>
Dixit quoque Deus : <blockquote><p>Fiat firmamentum in medio aquarum : et dividat aquas ab aquis.</p></blockquote> Et fecit Deus firmamentum, divisitque aquas, quae erant sub firmamento, ab his, quae erant super firmamentum. Et factum est ita. Vocavitque Deus firmamentum, Caelum : et factum est vespere et mane, dies secundus. Dixit vero Deus : Congregentur aquae, quae sub caelo sunt, in locum unum : et appareat arida. Et factum est ita. Et vocavit Deus aridam Terram, congregationesque aquarum appellavit Maria. Et vidit Deus quod esset bonum.
</p>

<p>
Et ait : Germinet terra herbam virentem, et facientem semen, et lignum pomiferum faciens fructum juxta genus suum, cujus semen in semetipso sit super terram. Et factum est ita. Et protulit terra herbam virentem, et facientem semen juxta genus suum, lignumque faciens fructum, et habens unumquodque sementem secundum speciem suam. Et vidit Deus quod esset bonum. Et factum est vespere et mane, dies tertius. Dixit autem Deus : Fiant luminaria in firmamento caeli, et dividant diem ac noctem, et sint in signa et tempora, et dies et annos : ut luceant in firmamento caeli, et illuminent terram. Et factum est ita.
</p>

<p>
Fecitque Deus duo luminaria magna : luminare majus, ut praeesset diei : et luminare minus, ut praeesset nocti : et stellas. Et posuit eas in firmamento caeli, ut lucerent super terram, et praeessent diei ac nocti, et dividerent lucem ac tenebras. Et vidit Deus quod esset bonum. Et factum est vespere et mane, dies quartus. Dixit etiam Deus : Producant aquae reptile animae viventis, et volatile super terram sub firmamento caeli.
</p>

<p>
Creavitque Deus cete grandia, et omnem animam viventem atque motabilem, quam produxerant aquae in species suas, et omne volatile secundum genus suum. Et vidit Deus quod esset bonum. Benedixitque eis, dicens : <blockquote><p>Crescite, et multiplicamini, et replete aquas maris : avesque multiplicentur super terram.</p></blockquote> Et factum est vespere et mane, dies quintus. Dixit quoque Deus : Producat terra animam viventem in genere suo, jumenta, et reptilia, et bestias terrae secundum species suas. Factumque est ita. Et fecit Deus bestias terrae juxta species suas, et jumenta, et omne reptile terrae in genere suo. Et vidit Deus quod esset bonum,
</p>

<p>
et ait : Faciamus hominem ad imaginem et similitudinem nostram : et praesit piscibus maris, et volatilibus caeli, et bestiis, universaeque terrae, omnique reptili, quod movetur in terra. Et creavit Deus hominem ad imaginem suam : ad imaginem Dei creavit illum, masculum et feminam creavit eos. Benedixitque illis Deus, et ait : Crescite et multiplicamini, et replete terram, et subjicite eam, et dominamini piscibus maris, et volatilibus caeli, et universis animantibus, quae moventur super terram. Dixitque Deus : Ecce dedi vobis omnem herbam afferentem semen super terram, et universa ligna quae habent in semetipsis sementem generis sui, ut sint vobis in escam : et cunctis animantibus terrae, omnique volucri caeli, et universis quae moventur in terra, et in quibus est anima vivens, ut habeant ad vescendum. Et factum est ita.
</p>

<p>
Viditque Deus cuncta quae fecerat, et erant valde bona. Et factum est vespere et mane, dies sextus.
</p>
EOD;

?>
<main>
    <article>
        <?php foreach ($data as $column) : ?>
        <div class="objects-article-header">
            <?php
            $headTitle = substr_replace($column["title"], "", 0, 3);
            ?>
            <h1><a id="<?= str_replace(" ", "", $column["title"]) ?>"><?= $headTitle ?></a></h1>
            <hr />
        </div>

        <div class="objects-article-body">
            <?php
            $img2 = <<<EOD
            <div class="objects-img-box">
                <img src="img/orig/{$column["image2"]}" alt="{$column["image2Alt"]}" />
                <span class="objects-img-box-text"><em>{$column["image2Text"]}</em></span>
            </div>
EOD;
            $img1 = <<<EOD
            <div class="objects-img-box">
                <img src="img/orig/{$column["image1"]}" alt="{$column["image1Alt"]}" />
                <span class="objects-img-box-text"><em>{$column["image1Text"]}</em></span>
            </div>
EOD;
            if (str_word_count($img2) > 18) {
                echo $img2;
            }

            if (str_word_count($img1) > 18) {
                echo $img1;
            }

            echo $text;
            ?>
        </div>

        <div class="objects-article-footer">
            <?php
            echo "<p>Författare till bildtexten: {$column["author"]}</p>";
            echo "<p>{$column["gps"]}</p>";
            ?>
        </div>
        <?php endforeach; ?>
    </article>
</main>

<?php include(__DIR__ . "/views/footer.php"); ?>
