<div class="view-object-arrows">
    <?php
    $arr = [];
    foreach ($data as $value) {
        $arr[] = $value["id"];
    }

    for ($i = 0; $i < count($arr); $i++) {
        if ($arr[$i] == $object[0]["id"]) {
            if ($i == 0 || $i == count($arr) - 1) {
                if ($i == 0) {
                    $firstObj = $arr[$i];
                    $iterator = $i;
                } else {
                    $lastObj = $arr[$i];
                    $iterator = $i;
                }
            } else {
                $currObj = $arr[$i];
                $iterator = $i;
            }
        }
    }

    $firstObj ?? null;
    $lastObj ?? null;
    $currObj ?? null;

    foreach ($data as $value) {
        if (isset($firstObj) && $value["id"] == $firstObj) {
            foreach ($data as $v) {
                if ($v["id"] == $arr[$iterator + 1]) {
                    echo <<<EOD
                        <div class="view-object-arrow-next-box"><a href="oversikt.php?object={$v["title"]}">Nästa &nbsp;&xrarr;</a></div>
EOD;
                }
            }
        } elseif (isset($currObj) && $value["id"] == $currObj) {
            foreach ($data as $v) {
                if ($v["id"] == $arr[$iterator - 1]) {
                    echo <<<EOD
                        <div class="view-object-arrow-prev-box"><a href="oversikt.php?object={$v["title"]}">&xlarr;&nbsp; Föregående</a></div>
EOD;
                }
                if ($v["id"] == $arr[$iterator + 1]) {
                    echo <<<EOD
                        <div class="view-object-arrow-next-box"><a href="oversikt.php?object={$v["title"]}">Nästa &nbsp;&xrarr;</a></div>
EOD;
                }
            }
        } elseif (isset($lastObj) && $value["id"] == $lastObj) {
            foreach ($data as $v) {
                if ($v["id"] == $arr[$iterator - 1]) {
                    echo <<<EOD
                        <div class="view-object-arrow-prev-box"><a href="oversikt.php?object={$v["title"]}">&xlarr;&nbsp; Föregående</a></div>
EOD;
                }
            }
        }
    }
    ?>
</div>

<?php
$text = [
"
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
",

"
<p>
 Igitur perfecti sunt caeli et terra, et omnis ornatus eorum.  Complevitque Deus die septimo opus suum quod fecerat : et requievit die septimo ab universo opere quod patrarat.  Et benedixit diei septimo, et sanctificavit illum, quia in ipso cessaverat ab omni opere suo quod creavit Deus ut faceret.  Istae sunt generationes caeli et terrae, quando creata sunt, in die quo fecit Dominus Deus caelum et terram,  et omne virgultum agri antequam orietur in terra, omnemque herbam regionis priusquam germinaret : non enim pluerat Dominus Deus super terram, et homo non erat qui operaretur terram : sed fons ascendebat e terra, irrigans universam superficiem terrae. 
</p>

<p>
 Formavit igitur Dominus Deus hominem de limo terrae, et inspiravit in faciem ejus spiraculum vitae, et factus est homo in animam viventem.  Plantaverat autem Dominus Deus paradisum voluptatis a principio, in quo posuit hominem quem formaverat.  Produxitque Dominus Deus de humo omne lignum pulchrum visu, et ad vescendum suave lignum etiam vitae in medio paradisi, lignumque scientiae boni et mali.  Et fluvius egrediebatur de loco voluptatis ad irrigandum paradisum, qui inde dividitur in quatuor capita.
</p>

<p>
 Nomen uni Phison : ipse est qui circuit omnem terram Hevilath, ubi nascitur aurum :  et aurum terrae illius optimum est; ibi invenitur bdellium, et lapis onychinus.  Et nomen fluvii secundi Gehon; ipse est qui circumit omnem terram Aethiopiae.  Nomen vero fluminis tertii, Tigris : ipse vadit contra Assyrios. Fluvius autem quartus, ipse est Euphrates.  Tulit ergo Dominus Deus hominem, et posuit eum in paradiso voluptatis, ut operaretur, et custodiret illum :
</p> 

<p>
 praecepitque ei, dicens : Ex omni ligno paradisi comede;  de ligno autem scientiae boni et mali ne comedas : in quocumque enim die comederis ex eo, morte morieris.  Dixit quoque Dominus Deus : Non est bonum esse hominem solum : faciamus ei adjutorium simile sibi.  Formatis igitur Dominus Deus de humo cunctis animantibus terrae, et universis volatilibus caeli, adduxit ea ad Adam, ut videret quid vocaret ea : omne enim quod vocavit Adam animae viventis, ipsum est nomen ejus.  Appellavitque Adam nominibus suis cuncta animantia, et universa volatilia caeli, et omnes bestias terrae : Adae vero non inveniebatur adjutor similis ejus.
</p>

<p>
 Immisit ergo Dominus Deus soporem in Adam : cumque obdormisset, tulit unam de costis ejus, et replevit carnem pro ea.  Et aedificavit Dominus Deus costam, quam tulerat de Adam, in mulierem : et adduxit eam ad Adam.  Dixitque Adam : Hoc nunc os ex ossibus meis, et caro de carne mea : haec vocabitur Virago, quoniam de viro sumpta est.  Quam ob rem relinquet homo patrem suum, et matrem, et adhaerebit uxori suae : et erunt duo in carne una.  Erat autem uterque nudus, Adam scilicet et uxor ejus : et non erubescebant.
</p>
",

"
<p>
 Sed et serpens erat callidior cunctis animantibus terrae quae fecerat Dominus Deus. Qui dixit ad mulierem : Cur praecepit vobis Deus ut non comederetis de omni ligno paradisi?  Cui respondit mulier : De fructu lignorum, quae sunt in paradiso, vescimur :  de fructu vero ligni quod est in medio paradisi, praecepit nobis Deus ne comederemus, et ne tangeremus illud, ne forte moriamur.  Dixit autem serpens ad mulierem : Nequaquam morte moriemini.  Scit enim Deus quod in quocumque die comederitis ex eo, aperientur oculi vestri, et eritis sicut dii, scientes bonum et malum.
</p>

<p>
 Vidit igitur mulier quod bonum esset lignum ad vescendum, et pulchrum oculis, aspectuque delectabile : et tulit de fructu illius, et comedit : deditque viro suo, qui comedit.  Et aperti sunt oculi amborum; cumque cognovissent se esse nudos, consuerunt folia ficus, et fecerunt sibi perizomata.  Et cum audissent vocem Domini Dei deambulantis in paradiso ad auram post meridiem, abscondit se Adam et uxor ejus a facie Domini Dei in medio ligni paradisi.  Vocavitque Dominus Deus Adam, et dixit ei : Ubi es?  Qui ait : Vocem tuam audivi in paradiso, et timui, eo quod nudus essem, et abscondi me.
</p>

<p>
 Cui dixit : Quis enim indicavit tibi quod nudus esses, nisi quod ex ligno de quo praeceperam tibi ne comederes, comedisti?  Dixitque Adam : Mulier, quam dedisti mihi sociam, dedit mihi de ligno, et comedi.  Et dixit Dominus Deus ad mulierem : Quare hoc fecisti? Quae respondit : Serpens decepit me, et comedi.  Et ait Dominus Deus ad serpentem : Quia fecisti hoc, maledictus es inter omnia animantia, et bestias terrae : super pectus tuum gradieris, et terram comedes cunctis diebus vitae tuae.  Inimicitias ponam inter te et mulierem, et semen tuum et semen illius : ipsa conteret caput tuum, et tu insidiaberis calcaneo ejus.
</p>

<p>
 Mulieri quoque dixit : Multiplicabo aerumnas tuas, et conceptus tuos : in dolore paries filios, et sub viri potestate eris, et ipse dominabitur tui.  Adae vero dixit : Quia audisti vocem uxoris tuae, et comedisti de ligno, ex quo praeceperam tibi ne comederes, maledicta terra in opere tuo : in laboribus comedes ex ea cunctis diebus vitae tuae.  Spinas et tribulos germinabit tibi, et comedes herbam terrae.  In sudore vultus tui vesceris pane, donec revertaris in terram de qua sumptus es : quia pulvis es et in pulverem reverteris.  Et vocavit Adam nomen uxoris suae, Heva : eo quod mater esset cunctorum viventium.
</p>

<p>
 Fecit quoque Dominus Deus Adae et uxori ejus tunicas pelliceas, et induit eos :  et ait : Ecce Adam quasi unus ex nobis factus est, sciens bonum et malum : nunc ergo ne forte mittat manum suam, et sumat etiam de ligno vitae, et comedat, et vivat in aeternum.  Et emisit eum Dominus Deus de paradiso voluptatis, ut operaretur terram de qua sumptus est.  Ejecitque Adam : et collocavit ante paradisum voluptatis cherubim, et flammeum gladium, atque versatilem, ad custodiendam viam ligni vitae.
</p>
",

"
<p>
 Adam vero cognovit uxorem suam Hevam, quae concepit et peperit Cain, dicens : Possedi hominem per Deum.  Rursumque peperit fratrem ejus Abel. Fuit autem Abel pastor ovium, et Cain agricola.  Factum est autem post multos dies ut offerret Cain de fructibus terrae munera Domino.  Abel quoque obtulit de primogenitis gregis sui, et de adipibus eorum : et respexit Dominus ad Abel, et ad munera ejus.  Ad Cain vero, et ad munera illius non respexit : iratusque est Cain vehementer, et concidit vultus ejus.
</p>

<p>
 Dixitque Dominus ad eum : Quare iratus es? et cur concidit facies tua?  nonne si bene egeris, recipies : sin autem male, statim in foribus peccatum aderit? sed sub te erit appetitus ejus, et tu dominaberis illius.  Dixitque Cain ad Abel fratrem suum : Egrediamur foras. Cumque essent in agro, consurrexit Cain adversus fratrem suum Abel, et interfecit eum.  Et ait Dominus ad Cain : Ubi est Abel frater tuus? Qui respondit : Nescio : num custos fratris mei sum ego?  Dixitque ad eum : Quid fecisti? vox sanguinis fratris tui clamat ad me de terra.
</p>

<p>
 Nunc igitur maledictus eris super terram, quae aperuit os suum, et suscepit sanguinem fratris tui de manu tua.  Cum operatus fueris eam, non dabit tibi fructus suos : vagus et profugus eris super terram.  Dixitque Cain ad Dominum : Major est iniquitas mea, quam ut veniam merear.  Ecce ejicis me hodie a facie terrae, et a facie tua abscondar, et ero vagus et profugus in terra : omnis igitur qui invenerit me, occidet me.  Dixitque ei Dominus : Nequaquam ita fiet : sed omnis qui occiderit Cain, septuplum punietur. Posuitque Dominus Cain signum, ut non interficeret eum omnis qui invenisset eum.
</p>

<p>
 Egressusque Cain a facie Domini, habitavit profugus in terra ad orientalem plagam Eden.  Cognovit autem Cain uxorem suam, quae concepit, et peperit Henoch : et aedificavit civitatem, vocavitque nomen ejus ex nomine filii sui, Henoch.  Porro Henoch genuit Irad, et Irad genuit Maviael, et Maviael genuit Mathusael, et Mathusael genuit Lamech.  Qui accepit duas uxores, nomen uni Ada, et nomen alteri Sella.  Genuitque Ada Jabel, qui fuit pater habitantium in tentoriis, atque pastorum.
</p>

<p>
 Et nomen fratris ejus Jubal : ipse fuit pater canentium cithara et organo.  Sella quoque genuit Tubalcain, qui fuit malleator et faber in cuncta opera aeris et ferri. Soror vero Tubalcain, Noema.  Dixitque Lamech uxoribus suis Adae et Sellae : Audite vocem meam, uxores Lamech; auscultate sermonem meum : quoniam occidi virum in vulnus meum, et adolescentulum in livorem meum.  Septuplum ultio dabitur de Cain : de Lamech vero septuagies septies.  Cognovit quoque adhuc Adam uxorem suam : et peperit filium, vocavitque nomen ejus Seth, dicens : Posuit mihi Deus semen aliud pro Abel, quem occidit Cain.  Sed et Seth natus est filius, quem vocavit Enos : iste coepit invocare nomen Domini.
</p>
",

"
<p>
 Hic est liber generationis Adam. In die qua creavit Deus hominem, ad similitudinem Dei fecit illum.  Masculum et feminam creavit eos, et benedixit illis : et vocavit nomen eorum Adam, in die quo creati sunt.  Vixit autem Adam centum triginta annis : et genuit ad imaginem et similitudinem suam, vocavitque nomen ejus Seth.  Et facti sunt dies Adam, postquam genuit Seth, octingenti anni : genuitque filios et filias.  Et factum est omne tempus quod vixit Adam, anni nongenti triginta, et mortuus est.
</p>

<p>
 Vixit quoque Seth centum quinque annis, et genuit Enos.  Vixitque Seth, postquam genuit Enos, octingentis septem annis, genuitque filios et filias.  Et facti sunt omnes dies Seth nongentorum duodecim annorum, et mortuus est.  Vixit vero Enos nonaginta annis, et genuit Cainan.  Post cujus ortum vixit octingentis quindecim annis, et genuit filios et filias.
</p>

<p>
 Factique sunt omnes dies Enos nongenti quinque anni, et mortuus est.  Vixit quoque Cainan septuaginta annis, et genuit Malaleel.  Et vixit Cainan, postquam genuit Malaleel, octingentis quadraginta annis, genuitque filios et filias.  Et facti sunt omnes dies Cainan nongenti decem anni, et mortuus est.  Vixit autem Malaleel sexaginta quinque annis, et genuit Jared.
</p>

<p>
 Et vixit Malaleel, postquam genuit Jared, octingentis triginta annis, et genuit filios et filias.  Et facti sunt omnes dies Malaleel octingenti nonaginta quinque anni, et mortuus est.  Vixitque Jared centum sexaginta duobus annis, et genuit Henoch.  Et vixit Jared, postquam genuit Henoch, octingentis annis, et genuit filios et filias.  Et facti sunt omnes dies Jared nongenti sexaginta duo anni, et mortuus est.
</p>

<p>
 Porro Henoch vixit sexaginta quinque annis, et genuit Mathusalam.  Et ambulavit Henoch cum Deo : et vixit, postquam genuit Mathusalam, trecentis annis, et genuit filios et filias.  Et facti sunt omnes dies Henoch trecenti sexaginta quinque anni.  Ambulavitque cum Deo, et non apparuit : quia tulit eum Deus.  Vixit quoque Mathusala centum octoginta septem annis, et genuit Lamech.
</p>

<p>
 Et vixit Mathusala, postquam genuit Lamech, septingentis octoginta duobus annis, et genuit filios et filias.  Et facti sunt omnes dies Mathusala nongenti sexaginta novem anni, et mortuus est.  Vixit autem Lamech centum octoginta duobus annis, et genuit filium :  vocavitque nomen ejus Noe, dicens : Iste consolabitur nos ab operibus et laboribus manuum nostrarum in terra, cui maledixit Dominus.  Vixitque Lamech, postquam genuit Noe, quingentis nonaginta quinque annis, et genuit filios et filias.
</p>

<p>
 Et facti sunt omnes dies Lamech septingenti septuaginta septem anni, et mortuus est. Noe vero cum quingentorum esset annorum, genuit Sem, Cham et Japheth.
</p>
",

"
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
",

"
<p>
 Igitur perfecti sunt caeli et terra, et omnis ornatus eorum.  Complevitque Deus die septimo opus suum quod fecerat : et requievit die septimo ab universo opere quod patrarat.  Et benedixit diei septimo, et sanctificavit illum, quia in ipso cessaverat ab omni opere suo quod creavit Deus ut faceret.  Istae sunt generationes caeli et terrae, quando creata sunt, in die quo fecit Dominus Deus caelum et terram,  et omne virgultum agri antequam orietur in terra, omnemque herbam regionis priusquam germinaret : non enim pluerat Dominus Deus super terram, et homo non erat qui operaretur terram : sed fons ascendebat e terra, irrigans universam superficiem terrae. 
</p>

<p>
 Formavit igitur Dominus Deus hominem de limo terrae, et inspiravit in faciem ejus spiraculum vitae, et factus est homo in animam viventem.  Plantaverat autem Dominus Deus paradisum voluptatis a principio, in quo posuit hominem quem formaverat.  Produxitque Dominus Deus de humo omne lignum pulchrum visu, et ad vescendum suave lignum etiam vitae in medio paradisi, lignumque scientiae boni et mali.  Et fluvius egrediebatur de loco voluptatis ad irrigandum paradisum, qui inde dividitur in quatuor capita.
</p>

<p>
 Nomen uni Phison : ipse est qui circuit omnem terram Hevilath, ubi nascitur aurum :  et aurum terrae illius optimum est; ibi invenitur bdellium, et lapis onychinus.  Et nomen fluvii secundi Gehon; ipse est qui circumit omnem terram Aethiopiae.  Nomen vero fluminis tertii, Tigris : ipse vadit contra Assyrios. Fluvius autem quartus, ipse est Euphrates.  Tulit ergo Dominus Deus hominem, et posuit eum in paradiso voluptatis, ut operaretur, et custodiret illum :
</p> 

<p>
 praecepitque ei, dicens : Ex omni ligno paradisi comede;  de ligno autem scientiae boni et mali ne comedas : in quocumque enim die comederis ex eo, morte morieris.  Dixit quoque Dominus Deus : Non est bonum esse hominem solum : faciamus ei adjutorium simile sibi.  Formatis igitur Dominus Deus de humo cunctis animantibus terrae, et universis volatilibus caeli, adduxit ea ad Adam, ut videret quid vocaret ea : omne enim quod vocavit Adam animae viventis, ipsum est nomen ejus.  Appellavitque Adam nominibus suis cuncta animantia, et universa volatilia caeli, et omnes bestias terrae : Adae vero non inveniebatur adjutor similis ejus.
</p>

<p>
 Immisit ergo Dominus Deus soporem in Adam : cumque obdormisset, tulit unam de costis ejus, et replevit carnem pro ea.  Et aedificavit Dominus Deus costam, quam tulerat de Adam, in mulierem : et adduxit eam ad Adam.  Dixitque Adam : Hoc nunc os ex ossibus meis, et caro de carne mea : haec vocabitur Virago, quoniam de viro sumpta est.  Quam ob rem relinquet homo patrem suum, et matrem, et adhaerebit uxori suae : et erunt duo in carne una.  Erat autem uterque nudus, Adam scilicet et uxor ejus : et non erubescebant.
</p>
",

"
<p>
 Sed et serpens erat callidior cunctis animantibus terrae quae fecerat Dominus Deus. Qui dixit ad mulierem : Cur praecepit vobis Deus ut non comederetis de omni ligno paradisi?  Cui respondit mulier : De fructu lignorum, quae sunt in paradiso, vescimur :  de fructu vero ligni quod est in medio paradisi, praecepit nobis Deus ne comederemus, et ne tangeremus illud, ne forte moriamur.  Dixit autem serpens ad mulierem : Nequaquam morte moriemini.  Scit enim Deus quod in quocumque die comederitis ex eo, aperientur oculi vestri, et eritis sicut dii, scientes bonum et malum.
</p>

<p>
 Vidit igitur mulier quod bonum esset lignum ad vescendum, et pulchrum oculis, aspectuque delectabile : et tulit de fructu illius, et comedit : deditque viro suo, qui comedit.  Et aperti sunt oculi amborum; cumque cognovissent se esse nudos, consuerunt folia ficus, et fecerunt sibi perizomata.  Et cum audissent vocem Domini Dei deambulantis in paradiso ad auram post meridiem, abscondit se Adam et uxor ejus a facie Domini Dei in medio ligni paradisi.  Vocavitque Dominus Deus Adam, et dixit ei : Ubi es?  Qui ait : Vocem tuam audivi in paradiso, et timui, eo quod nudus essem, et abscondi me.
</p>

<p>
 Cui dixit : Quis enim indicavit tibi quod nudus esses, nisi quod ex ligno de quo praeceperam tibi ne comederes, comedisti?  Dixitque Adam : Mulier, quam dedisti mihi sociam, dedit mihi de ligno, et comedi.  Et dixit Dominus Deus ad mulierem : Quare hoc fecisti? Quae respondit : Serpens decepit me, et comedi.  Et ait Dominus Deus ad serpentem : Quia fecisti hoc, maledictus es inter omnia animantia, et bestias terrae : super pectus tuum gradieris, et terram comedes cunctis diebus vitae tuae.  Inimicitias ponam inter te et mulierem, et semen tuum et semen illius : ipsa conteret caput tuum, et tu insidiaberis calcaneo ejus.
</p>

<p>
 Mulieri quoque dixit : Multiplicabo aerumnas tuas, et conceptus tuos : in dolore paries filios, et sub viri potestate eris, et ipse dominabitur tui.  Adae vero dixit : Quia audisti vocem uxoris tuae, et comedisti de ligno, ex quo praeceperam tibi ne comederes, maledicta terra in opere tuo : in laboribus comedes ex ea cunctis diebus vitae tuae.  Spinas et tribulos germinabit tibi, et comedes herbam terrae.  In sudore vultus tui vesceris pane, donec revertaris in terram de qua sumptus es : quia pulvis es et in pulverem reverteris.  Et vocavit Adam nomen uxoris suae, Heva : eo quod mater esset cunctorum viventium.
</p>

<p>
 Fecit quoque Dominus Deus Adae et uxori ejus tunicas pelliceas, et induit eos :  et ait : Ecce Adam quasi unus ex nobis factus est, sciens bonum et malum : nunc ergo ne forte mittat manum suam, et sumat etiam de ligno vitae, et comedat, et vivat in aeternum.  Et emisit eum Dominus Deus de paradiso voluptatis, ut operaretur terram de qua sumptus est.  Ejecitque Adam : et collocavit ante paradisum voluptatis cherubim, et flammeum gladium, atque versatilem, ad custodiendam viam ligni vitae.
</p>
",

"
<p>
 Adam vero cognovit uxorem suam Hevam, quae concepit et peperit Cain, dicens : Possedi hominem per Deum.  Rursumque peperit fratrem ejus Abel. Fuit autem Abel pastor ovium, et Cain agricola.  Factum est autem post multos dies ut offerret Cain de fructibus terrae munera Domino.  Abel quoque obtulit de primogenitis gregis sui, et de adipibus eorum : et respexit Dominus ad Abel, et ad munera ejus.  Ad Cain vero, et ad munera illius non respexit : iratusque est Cain vehementer, et concidit vultus ejus.
</p>

<p>
 Dixitque Dominus ad eum : Quare iratus es? et cur concidit facies tua?  nonne si bene egeris, recipies : sin autem male, statim in foribus peccatum aderit? sed sub te erit appetitus ejus, et tu dominaberis illius.  Dixitque Cain ad Abel fratrem suum : Egrediamur foras. Cumque essent in agro, consurrexit Cain adversus fratrem suum Abel, et interfecit eum.  Et ait Dominus ad Cain : Ubi est Abel frater tuus? Qui respondit : Nescio : num custos fratris mei sum ego?  Dixitque ad eum : Quid fecisti? vox sanguinis fratris tui clamat ad me de terra.
</p>

<p>
 Nunc igitur maledictus eris super terram, quae aperuit os suum, et suscepit sanguinem fratris tui de manu tua.  Cum operatus fueris eam, non dabit tibi fructus suos : vagus et profugus eris super terram.  Dixitque Cain ad Dominum : Major est iniquitas mea, quam ut veniam merear.  Ecce ejicis me hodie a facie terrae, et a facie tua abscondar, et ero vagus et profugus in terra : omnis igitur qui invenerit me, occidet me.  Dixitque ei Dominus : Nequaquam ita fiet : sed omnis qui occiderit Cain, septuplum punietur. Posuitque Dominus Cain signum, ut non interficeret eum omnis qui invenisset eum.
</p>

<p>
 Egressusque Cain a facie Domini, habitavit profugus in terra ad orientalem plagam Eden.  Cognovit autem Cain uxorem suam, quae concepit, et peperit Henoch : et aedificavit civitatem, vocavitque nomen ejus ex nomine filii sui, Henoch.  Porro Henoch genuit Irad, et Irad genuit Maviael, et Maviael genuit Mathusael, et Mathusael genuit Lamech.  Qui accepit duas uxores, nomen uni Ada, et nomen alteri Sella.  Genuitque Ada Jabel, qui fuit pater habitantium in tentoriis, atque pastorum.
</p>

<p>
 Et nomen fratris ejus Jubal : ipse fuit pater canentium cithara et organo.  Sella quoque genuit Tubalcain, qui fuit malleator et faber in cuncta opera aeris et ferri. Soror vero Tubalcain, Noema.  Dixitque Lamech uxoribus suis Adae et Sellae : Audite vocem meam, uxores Lamech; auscultate sermonem meum : quoniam occidi virum in vulnus meum, et adolescentulum in livorem meum.  Septuplum ultio dabitur de Cain : de Lamech vero septuagies septies.  Cognovit quoque adhuc Adam uxorem suam : et peperit filium, vocavitque nomen ejus Seth, dicens : Posuit mihi Deus semen aliud pro Abel, quem occidit Cain.  Sed et Seth natus est filius, quem vocavit Enos : iste coepit invocare nomen Domini.
</p>
",

"
<p>
 Hic est liber generationis Adam. In die qua creavit Deus hominem, ad similitudinem Dei fecit illum.  Masculum et feminam creavit eos, et benedixit illis : et vocavit nomen eorum Adam, in die quo creati sunt.  Vixit autem Adam centum triginta annis : et genuit ad imaginem et similitudinem suam, vocavitque nomen ejus Seth.  Et facti sunt dies Adam, postquam genuit Seth, octingenti anni : genuitque filios et filias.  Et factum est omne tempus quod vixit Adam, anni nongenti triginta, et mortuus est.
</p>

<p>
 Vixit quoque Seth centum quinque annis, et genuit Enos.  Vixitque Seth, postquam genuit Enos, octingentis septem annis, genuitque filios et filias.  Et facti sunt omnes dies Seth nongentorum duodecim annorum, et mortuus est.  Vixit vero Enos nonaginta annis, et genuit Cainan.  Post cujus ortum vixit octingentis quindecim annis, et genuit filios et filias.
</p>

<p>
 Factique sunt omnes dies Enos nongenti quinque anni, et mortuus est.  Vixit quoque Cainan septuaginta annis, et genuit Malaleel.  Et vixit Cainan, postquam genuit Malaleel, octingentis quadraginta annis, genuitque filios et filias.  Et facti sunt omnes dies Cainan nongenti decem anni, et mortuus est.  Vixit autem Malaleel sexaginta quinque annis, et genuit Jared.
</p>

<p>
 Et vixit Malaleel, postquam genuit Jared, octingentis triginta annis, et genuit filios et filias.  Et facti sunt omnes dies Malaleel octingenti nonaginta quinque anni, et mortuus est.  Vixitque Jared centum sexaginta duobus annis, et genuit Henoch.  Et vixit Jared, postquam genuit Henoch, octingentis annis, et genuit filios et filias.  Et facti sunt omnes dies Jared nongenti sexaginta duo anni, et mortuus est.
</p>

<p>
 Porro Henoch vixit sexaginta quinque annis, et genuit Mathusalam.  Et ambulavit Henoch cum Deo : et vixit, postquam genuit Mathusalam, trecentis annis, et genuit filios et filias.  Et facti sunt omnes dies Henoch trecenti sexaginta quinque anni.  Ambulavitque cum Deo, et non apparuit : quia tulit eum Deus.  Vixit quoque Mathusala centum octoginta septem annis, et genuit Lamech.
</p>

<p>
 Et vixit Mathusala, postquam genuit Lamech, septingentis octoginta duobus annis, et genuit filios et filias.  Et facti sunt omnes dies Mathusala nongenti sexaginta novem anni, et mortuus est.  Vixit autem Lamech centum octoginta duobus annis, et genuit filium :  vocavitque nomen ejus Noe, dicens : Iste consolabitur nos ab operibus et laboribus manuum nostrarum in terra, cui maledixit Dominus.  Vixitque Lamech, postquam genuit Noe, quingentis nonaginta quinque annis, et genuit filios et filias.
</p>

<p>
 Et facti sunt omnes dies Lamech septingenti septuaginta septem anni, et mortuus est. Noe vero cum quingentorum esset annorum, genuit Sem, Cham et Japheth.
</p>
",

"
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
",

"
<p>
 Igitur perfecti sunt caeli et terra, et omnis ornatus eorum.  Complevitque Deus die septimo opus suum quod fecerat : et requievit die septimo ab universo opere quod patrarat.  Et benedixit diei septimo, et sanctificavit illum, quia in ipso cessaverat ab omni opere suo quod creavit Deus ut faceret.  Istae sunt generationes caeli et terrae, quando creata sunt, in die quo fecit Dominus Deus caelum et terram,  et omne virgultum agri antequam orietur in terra, omnemque herbam regionis priusquam germinaret : non enim pluerat Dominus Deus super terram, et homo non erat qui operaretur terram : sed fons ascendebat e terra, irrigans universam superficiem terrae. 
</p>

<p>
 Formavit igitur Dominus Deus hominem de limo terrae, et inspiravit in faciem ejus spiraculum vitae, et factus est homo in animam viventem.  Plantaverat autem Dominus Deus paradisum voluptatis a principio, in quo posuit hominem quem formaverat.  Produxitque Dominus Deus de humo omne lignum pulchrum visu, et ad vescendum suave lignum etiam vitae in medio paradisi, lignumque scientiae boni et mali.  Et fluvius egrediebatur de loco voluptatis ad irrigandum paradisum, qui inde dividitur in quatuor capita.
</p>

<p>
 Nomen uni Phison : ipse est qui circuit omnem terram Hevilath, ubi nascitur aurum :  et aurum terrae illius optimum est; ibi invenitur bdellium, et lapis onychinus.  Et nomen fluvii secundi Gehon; ipse est qui circumit omnem terram Aethiopiae.  Nomen vero fluminis tertii, Tigris : ipse vadit contra Assyrios. Fluvius autem quartus, ipse est Euphrates.  Tulit ergo Dominus Deus hominem, et posuit eum in paradiso voluptatis, ut operaretur, et custodiret illum :
</p> 

<p>
 praecepitque ei, dicens : Ex omni ligno paradisi comede;  de ligno autem scientiae boni et mali ne comedas : in quocumque enim die comederis ex eo, morte morieris.  Dixit quoque Dominus Deus : Non est bonum esse hominem solum : faciamus ei adjutorium simile sibi.  Formatis igitur Dominus Deus de humo cunctis animantibus terrae, et universis volatilibus caeli, adduxit ea ad Adam, ut videret quid vocaret ea : omne enim quod vocavit Adam animae viventis, ipsum est nomen ejus.  Appellavitque Adam nominibus suis cuncta animantia, et universa volatilia caeli, et omnes bestias terrae : Adae vero non inveniebatur adjutor similis ejus.
</p>

<p>
 Immisit ergo Dominus Deus soporem in Adam : cumque obdormisset, tulit unam de costis ejus, et replevit carnem pro ea.  Et aedificavit Dominus Deus costam, quam tulerat de Adam, in mulierem : et adduxit eam ad Adam.  Dixitque Adam : Hoc nunc os ex ossibus meis, et caro de carne mea : haec vocabitur Virago, quoniam de viro sumpta est.  Quam ob rem relinquet homo patrem suum, et matrem, et adhaerebit uxori suae : et erunt duo in carne una.  Erat autem uterque nudus, Adam scilicet et uxor ejus : et non erubescebant.
</p>
",

"
<p>
 Sed et serpens erat callidior cunctis animantibus terrae quae fecerat Dominus Deus. Qui dixit ad mulierem : Cur praecepit vobis Deus ut non comederetis de omni ligno paradisi?  Cui respondit mulier : De fructu lignorum, quae sunt in paradiso, vescimur :  de fructu vero ligni quod est in medio paradisi, praecepit nobis Deus ne comederemus, et ne tangeremus illud, ne forte moriamur.  Dixit autem serpens ad mulierem : Nequaquam morte moriemini.  Scit enim Deus quod in quocumque die comederitis ex eo, aperientur oculi vestri, et eritis sicut dii, scientes bonum et malum.
</p>

<p>
 Vidit igitur mulier quod bonum esset lignum ad vescendum, et pulchrum oculis, aspectuque delectabile : et tulit de fructu illius, et comedit : deditque viro suo, qui comedit.  Et aperti sunt oculi amborum; cumque cognovissent se esse nudos, consuerunt folia ficus, et fecerunt sibi perizomata.  Et cum audissent vocem Domini Dei deambulantis in paradiso ad auram post meridiem, abscondit se Adam et uxor ejus a facie Domini Dei in medio ligni paradisi.  Vocavitque Dominus Deus Adam, et dixit ei : Ubi es?  Qui ait : Vocem tuam audivi in paradiso, et timui, eo quod nudus essem, et abscondi me.
</p>

<p>
 Cui dixit : Quis enim indicavit tibi quod nudus esses, nisi quod ex ligno de quo praeceperam tibi ne comederes, comedisti?  Dixitque Adam : Mulier, quam dedisti mihi sociam, dedit mihi de ligno, et comedi.  Et dixit Dominus Deus ad mulierem : Quare hoc fecisti? Quae respondit : Serpens decepit me, et comedi.  Et ait Dominus Deus ad serpentem : Quia fecisti hoc, maledictus es inter omnia animantia, et bestias terrae : super pectus tuum gradieris, et terram comedes cunctis diebus vitae tuae.  Inimicitias ponam inter te et mulierem, et semen tuum et semen illius : ipsa conteret caput tuum, et tu insidiaberis calcaneo ejus.
</p>

<p>
 Mulieri quoque dixit : Multiplicabo aerumnas tuas, et conceptus tuos : in dolore paries filios, et sub viri potestate eris, et ipse dominabitur tui.  Adae vero dixit : Quia audisti vocem uxoris tuae, et comedisti de ligno, ex quo praeceperam tibi ne comederes, maledicta terra in opere tuo : in laboribus comedes ex ea cunctis diebus vitae tuae.  Spinas et tribulos germinabit tibi, et comedes herbam terrae.  In sudore vultus tui vesceris pane, donec revertaris in terram de qua sumptus es : quia pulvis es et in pulverem reverteris.  Et vocavit Adam nomen uxoris suae, Heva : eo quod mater esset cunctorum viventium.
</p>

<p>
 Fecit quoque Dominus Deus Adae et uxori ejus tunicas pelliceas, et induit eos :  et ait : Ecce Adam quasi unus ex nobis factus est, sciens bonum et malum : nunc ergo ne forte mittat manum suam, et sumat etiam de ligno vitae, et comedat, et vivat in aeternum.  Et emisit eum Dominus Deus de paradiso voluptatis, ut operaretur terram de qua sumptus est.  Ejecitque Adam : et collocavit ante paradisum voluptatis cherubim, et flammeum gladium, atque versatilem, ad custodiendam viam ligni vitae.
</p>
",

"
<p>
 Adam vero cognovit uxorem suam Hevam, quae concepit et peperit Cain, dicens : Possedi hominem per Deum.  Rursumque peperit fratrem ejus Abel. Fuit autem Abel pastor ovium, et Cain agricola.  Factum est autem post multos dies ut offerret Cain de fructibus terrae munera Domino.  Abel quoque obtulit de primogenitis gregis sui, et de adipibus eorum : et respexit Dominus ad Abel, et ad munera ejus.  Ad Cain vero, et ad munera illius non respexit : iratusque est Cain vehementer, et concidit vultus ejus.
</p>

<p>
 Dixitque Dominus ad eum : Quare iratus es? et cur concidit facies tua?  nonne si bene egeris, recipies : sin autem male, statim in foribus peccatum aderit? sed sub te erit appetitus ejus, et tu dominaberis illius.  Dixitque Cain ad Abel fratrem suum : Egrediamur foras. Cumque essent in agro, consurrexit Cain adversus fratrem suum Abel, et interfecit eum.  Et ait Dominus ad Cain : Ubi est Abel frater tuus? Qui respondit : Nescio : num custos fratris mei sum ego?  Dixitque ad eum : Quid fecisti? vox sanguinis fratris tui clamat ad me de terra.
</p>

<p>
 Nunc igitur maledictus eris super terram, quae aperuit os suum, et suscepit sanguinem fratris tui de manu tua.  Cum operatus fueris eam, non dabit tibi fructus suos : vagus et profugus eris super terram.  Dixitque Cain ad Dominum : Major est iniquitas mea, quam ut veniam merear.  Ecce ejicis me hodie a facie terrae, et a facie tua abscondar, et ero vagus et profugus in terra : omnis igitur qui invenerit me, occidet me.  Dixitque ei Dominus : Nequaquam ita fiet : sed omnis qui occiderit Cain, septuplum punietur. Posuitque Dominus Cain signum, ut non interficeret eum omnis qui invenisset eum.
</p>

<p>
 Egressusque Cain a facie Domini, habitavit profugus in terra ad orientalem plagam Eden.  Cognovit autem Cain uxorem suam, quae concepit, et peperit Henoch : et aedificavit civitatem, vocavitque nomen ejus ex nomine filii sui, Henoch.  Porro Henoch genuit Irad, et Irad genuit Maviael, et Maviael genuit Mathusael, et Mathusael genuit Lamech.  Qui accepit duas uxores, nomen uni Ada, et nomen alteri Sella.  Genuitque Ada Jabel, qui fuit pater habitantium in tentoriis, atque pastorum.
</p>

<p>
 Et nomen fratris ejus Jubal : ipse fuit pater canentium cithara et organo.  Sella quoque genuit Tubalcain, qui fuit malleator et faber in cuncta opera aeris et ferri. Soror vero Tubalcain, Noema.  Dixitque Lamech uxoribus suis Adae et Sellae : Audite vocem meam, uxores Lamech; auscultate sermonem meum : quoniam occidi virum in vulnus meum, et adolescentulum in livorem meum.  Septuplum ultio dabitur de Cain : de Lamech vero septuagies septies.  Cognovit quoque adhuc Adam uxorem suam : et peperit filium, vocavitque nomen ejus Seth, dicens : Posuit mihi Deus semen aliud pro Abel, quem occidit Cain.  Sed et Seth natus est filius, quem vocavit Enos : iste coepit invocare nomen Domini.
</p>
",

"
<p>
 Hic est liber generationis Adam. In die qua creavit Deus hominem, ad similitudinem Dei fecit illum.  Masculum et feminam creavit eos, et benedixit illis : et vocavit nomen eorum Adam, in die quo creati sunt.  Vixit autem Adam centum triginta annis : et genuit ad imaginem et similitudinem suam, vocavitque nomen ejus Seth.  Et facti sunt dies Adam, postquam genuit Seth, octingenti anni : genuitque filios et filias.  Et factum est omne tempus quod vixit Adam, anni nongenti triginta, et mortuus est.
</p>

<p>
 Vixit quoque Seth centum quinque annis, et genuit Enos.  Vixitque Seth, postquam genuit Enos, octingentis septem annis, genuitque filios et filias.  Et facti sunt omnes dies Seth nongentorum duodecim annorum, et mortuus est.  Vixit vero Enos nonaginta annis, et genuit Cainan.  Post cujus ortum vixit octingentis quindecim annis, et genuit filios et filias.
</p>

<p>
 Factique sunt omnes dies Enos nongenti quinque anni, et mortuus est.  Vixit quoque Cainan septuaginta annis, et genuit Malaleel.  Et vixit Cainan, postquam genuit Malaleel, octingentis quadraginta annis, genuitque filios et filias.  Et facti sunt omnes dies Cainan nongenti decem anni, et mortuus est.  Vixit autem Malaleel sexaginta quinque annis, et genuit Jared.
</p>

<p>
 Et vixit Malaleel, postquam genuit Jared, octingentis triginta annis, et genuit filios et filias.  Et facti sunt omnes dies Malaleel octingenti nonaginta quinque anni, et mortuus est.  Vixitque Jared centum sexaginta duobus annis, et genuit Henoch.  Et vixit Jared, postquam genuit Henoch, octingentis annis, et genuit filios et filias.  Et facti sunt omnes dies Jared nongenti sexaginta duo anni, et mortuus est.
</p>

<p>
 Porro Henoch vixit sexaginta quinque annis, et genuit Mathusalam.  Et ambulavit Henoch cum Deo : et vixit, postquam genuit Mathusalam, trecentis annis, et genuit filios et filias.  Et facti sunt omnes dies Henoch trecenti sexaginta quinque anni.  Ambulavitque cum Deo, et non apparuit : quia tulit eum Deus.  Vixit quoque Mathusala centum octoginta septem annis, et genuit Lamech.
</p>

<p>
 Et vixit Mathusala, postquam genuit Lamech, septingentis octoginta duobus annis, et genuit filios et filias.  Et facti sunt omnes dies Mathusala nongenti sexaginta novem anni, et mortuus est.  Vixit autem Lamech centum octoginta duobus annis, et genuit filium :  vocavitque nomen ejus Noe, dicens : Iste consolabitur nos ab operibus et laboribus manuum nostrarum in terra, cui maledixit Dominus.  Vixitque Lamech, postquam genuit Noe, quingentis nonaginta quinque annis, et genuit filios et filias.
</p>

<p>
 Et facti sunt omnes dies Lamech septingenti septuaginta septem anni, et mortuus est. Noe vero cum quingentorum esset annorum, genuit Sem, Cham et Japheth.
</p>
"
];

// foreach ($object as $value) {
//     // echo $value["data"];
//     echo $text;
// }

foreach ($object as $value) {
    $titleNumber = (int)substr($value["title"], 0, 2);
    
    echo $text[$titleNumber];
}
?>
