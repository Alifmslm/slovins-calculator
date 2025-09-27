<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    # code...
    $population = htmlspecialchars($_POST["input_population"]);
    $error = htmlspecialchars($_POST["input_error"]);

    $int_population = (int)$population;
    $int_error = (int)$error / 100;

    $result = round($int_population / (1 + $int_population * pow(($int_error), 2)));
    echo $result;
} else {
    echo "Gagal Melakukan Proses Post.";
}
?>