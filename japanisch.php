<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="utf-8">
    <title>Japanisch Vokabular</title>
    <link rel= "stylesheet" type="text/css" href="linkcss.css">
    <style>table {border: 1px solid black}</style>
</head>
<body>
<div>
<h1>Japanisch Vokabular Training</h1>
</div>
<div>
    <form action="japanisch.php" method="post">
    <?php

$rundetotal = 5;

if (isset($_POST['eingabe']))
{
    $runde = $_POST['runde'];
    $runde++;
    $punkte = $_POST['punkte'];
    $frage = $_POST['frage'];
    $loesung = $_POST['loesung'];
    $eingabe = $_POST['eingabe'];
    

    if ($eingabe == $loesung)
    {
        echo "<p><b>Richtig!</b></p>";
        $punkte++;
    }
    else
    {
        echo "<p><b>Falsch!<br>$frage = $loesung</b></p>";
    }
    if ($runde > $rundetotal)
    {
        echo "<h2>Du hast " . $punkte . " von " . $rundetotal . " Wörter richtig!</h2>";
        echo "<h3><a href='japanisch.php'>Nochmal? </h3></a>";
        exit;
    }
}
else
{
    $runde = 1;
    $punkte = 0;
}


if ($runde <= $rundetotal)
{
echo "<h2>Wort " . $runde . " / " . $rundetotal . "</h2>";
}


// Neues Prüfwort generieren
    $pool = array(
"au/treffen", 
"akeru/öffnen", 
"ageru/geben", 
"asobu/spielen", 
"arau/waschen", 
"aru/da_sein(Dinge)", 
"aruku/gehen", 
"iu/sagen", 
"iku/fahren", 
"itadaku/bekommen", 
"iru/da_sein(Lebewesen)", 
"uru/verkaufen", 
"undo_suru/sport_machen", 
"okiru/aufstehen", 
"oku/hintun", 
"okuru/verschicken",
"okureru/verspäten",
"oshieru/lehren",
"ochiru/herunterfallen",
"odoroku/erschrecken",
"oboeru/merken",
"omou/meinen",
"oreru/brechen",
"owaru/enden",
"kau/kaufen",
"kaeru/zurückkehren",
"kakaru/kosten",
"kaku/schreiben",
"kasu/verleihen",
"katadzukeru/aufräumen",
"katsu/gewinnen",
"kariru/ausleihen",
"ganbaru/anstrengen",
"kiku/hören",
"kiku/hören",
"kimeru/entscheden",
"kyukei_suru/pause",
"kiru(s)/schneiden",
"kiru(t)/tragen",
"kuru/kommen",
"kureru/schenken",
"kokai_suru/bereuen",
"kowareru/kaputt_gehen",
"sawaru/anfassen",
"sanpo_suru/spazieren",
"shaberu/unterhalten",
"shinu/sterben",
"shiraberu/untersuchen",
"shiru/wissen",
"shinpai_suru/sorgen_machen",
"sumu/wohnen",
"suru/machen",
"suwaru/hinsetzen",
"soji_suru/reinigen",
"taberu/essen",
"tamaru/ruhig sein",
"chumon_suru/bestellen",
"tsukau/verwenden",
"tsukuru/herstellen",
"tsukeru/anbringen",
"dekakeru/ausgehen",
"dekiru/können",
"deru/raus_gehen",
"denwa_suru/telefonieren",
"tobu/springen",
"tomaru/anhalten",
"toru(n)/nehmen",
"toru(f)/foto machen",
"naosu/reparieren",
"nakusu/verschwinden",
"naru/werden",
"neru/schlafen",
"nomu/trinken",
"noru/einsteigen",
"hairu/reingehen",
"hajimeru/anfangen",
"hashiru/rennen",
"hataraku/arbeiten",
"hanasu/reden",
"harau/bezahlen",
"fueru/mehr_werden",
"futoru/dick_werden",
"benkyo_suru/lernen",
"honyaku_suru/übersetzen",
"matsu/warten",
"mieru/sehen_können",
"miseru/zeigen",
"mitsukeru/finden",
"miru/sehen",
"musubu/zusammen binden",
"motsu/halten",
"motte_iku/mitnehmen",
"morau/bekommen",
"yakusoku suru/verabreden",
"yasumu/ausruhen",
"yameru/aufhören",
"yogoreru/schmutzig_werden",
"yomu/lesen",
"renshu suru/üben",
"wakaru/verstehen",
"wasureru/vergessen",
"warau/lachen", 
    );

    $count = count($pool);
    $random = (random_int(1, $count) - 1);
    
    $frage = explode ("/", $pool[$random]);

    $japdeu = random_int(0,1);

    echo "<table>";
    echo "<tr><td><h1>$frage[$japdeu]</h1></td></tr>";
    echo "</table>";

    // Antwortauswahl

    function antworten()
    {
        global $pool;
        global $count;
        $random = (random_int(1, $count) - 1);
        $antwort = explode ("/", $pool[$random]);
        $antjd = random_int(0,1);
        return $antwort[$antjd];
    }

    for ($i=1; $i<=4; $i++)
    {
        $antwort[$i] = antworten();
    }

    // Richtige Antwort

    $richtig = random_int(1,4);

    if ($japdeu == 0)
    {
        $r = 1;
    }
    else
    {
        $r = 0;
    }

    $antwort[$richtig] = $frage[$r];

    echo "<input type='hidden' name='runde' value=$runde>";
    echo "<input type='hidden' name='punkte' value=$punkte>";
    echo "<input type='hidden' name='frage' value=$frage[$japdeu]>";
    echo "<input type='hidden' name='loesung' value=$frage[$r]>";

    echo "<p><input type='submit' name='eingabe' value=$antwort[1]> <input type='submit' name='eingabe' value=$antwort[2]></p>";
    echo "<p><input type='submit' name='eingabe' value=$antwort[3]> <input type='submit' name='eingabe' value=$antwort[4]></p>";

    ?>
</form>
</div>
</body>
</html>
