<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <title>Calcolo resistenza</title>
</head>

<?php

$valore_resistenza = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fascia1 = $_POST['f1'];
    $fascia2 = $_POST['f2'];
    $moltiplicatore = $_POST['molt'];
    $tolleranza = $_POST['toll'];
    if (is_numeric($fascia1) && is_numeric($fascia2) && is_numeric($moltiplicatore) && is_numeric($tolleranza)) {
        $valore_resistenza = ($fascia1 * 10 + $fascia2) * $moltiplicatore;

        if ($valore_resistenza >= 1000000) {
            $valore_resistenza /= 1000000;
            $udm = "MΩ";
        } elseif ($valore_resistenza >= 1000) {
            $valore_resistenza /= 1000;
            $udm = "KΩ";
        } else {
            $udm = "Ω";
        }

        $valToll = $tolleranza*$valore_resistenza;

        $valToll = round($valToll, 2);


        $valore_resistenza = number_format($valore_resistenza, 2, '.', '') . " ± " . $valToll. " " . $udm;
    }
}

?>

<body>

    <h1>Calcolo resistenza</h1>

    <div class="container">

        <br><br>

        <form method="post" action="">

            <div class="fascia">
                <br>
                <label>Fascia 1</label> <br><br>
                <select name="f1" id="f1">
                    <option value="#">Seleziona</option>
                    <option value="0">Nero</option>
                    <option value="1">Marrone</option>
                    <option value="2">Rosso</option>
                    <option value="3">Arancione</option>
                    <option value="4">Giallo</option>
                    <option value="5">Verde</option>
                    <option value="6">Blu</option>
                    <option value="7">Viola</option>
                    <option value="8">Grigio</option>
                    <option value="9">Bianco</option>
                </select>
            </div>

            <br><br>

            <div class="fascia">
                <br>
                <label>Fascia 2</label> <br><br>
                <select name="f2" id="f2">
                    <option value="#">Seleziona</option>
                    <option value="0">Nero</option>
                    <option value="1">Marrone</option>
                    <option value="2">Rosso</option>
                    <option value="3">Arancione</option>
                    <option value="4">Giallo</option>
                    <option value="5">Verde</option>
                    <option value="6">Blu</option>
                    <option value="7">Viola</option>
                    <option value="8">Grigio</option>
                    <option value="9">Bianco</option>
                </select>
            </div>

            <br><br>

            <div class="fascia">
                <br>
                <label>Moltiplicatore</label> <br><br>
                <select name="molt" id="molt">
                    <option value="#">Seleziona</option>
                    <option value="1">Nero</option>
                    <option value="10">Marrone</option>
                    <option value="100">Rosso</option>
                    <option value="1000">Arancione</option>
                    <option value="10000">Giallo</option>
                    <option value="100000">Verde</option>
                    <option value="1000000">Blu</option>
                    <option value="0.1">Oro</option>
                    <option value="0.01">Argento</option>
                </select>
            </div>

            <br><br>

            <div class="fascia">
                <br>
                <label>Tolleranza</label> <br> <br>
                <select name="toll" id="toll">
                    <option value="#">Seleziona</option>
                    <option value="0.01">Marrone</option>
                    <option value="0.02">Rosso</option>
                    <option value="0.05">Oro</option>
                    <option value="0.10">Argento</option>
                </select>
            </div>

            <br><br>

            <input type="submit" value="Invia" class="btn" id="btnInvia" onclick="check()"> <br>

            <br><br>

            <div class="buttons">
                <br><br>
                <input type="text" readonly id="ris" style="text-align: center;"
                    value="<? echo $valore_resistenza ?>"><br>
                <br><br>
            </div>

            <br><br>

            <input type="reset" value="Reset" class="btn"> <br>

            <br>

        </form>

        <br><br>

    </div>

</body>

</html>