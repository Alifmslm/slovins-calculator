<?php
include("./model/calculation-model.php");

$rounded_result = null;
$list_data_array = null;
$model = new CalculationModel($connection_db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    # code...
    $population_raw = $_POST["input_population"];

    $population_clean = str_replace(",", "", $population_raw);

    $population = filter_var($population_clean, FILTER_VALIDATE_INT);
    $error_rate = filter_input(INPUT_POST, 'input_error', FILTER_VALIDATE_FLOAT);

    $error_rate_formated = number_format($error_rate);

    // ubah bentuk angka menjadi persen(desimal)
    $error_percen = $error_rate / 100;

    $result = null;

    if ($population === false || $error_rate === false) {
        echo 'Tipe data anda salah';
        echo '<br>';
        echo 'Tipe Data Populasi: ' . gettype($population);
        echo '<br>';
        echo 'Tipe Data Error: ' . gettype($error_rate);
    } else if ($population <= 0 || $error_rate <= 0) {
        echo 'Input tidak boleh 0';
    } else {
        $denominator = 1 + $population * pow($error_percen, 2);

        try {
            $result = $population / $denominator;
        } catch (DivisionByZeroError $ez) {
            echo "Terjadi Error Pembagian dengan Nol: " . $ez->getMessage();
        } catch (Exception $e) {
            echo "Error ditemukan!: " . $e->getMessage();
        }

        $rounded_result = number_format(round($result));

        $model->addCalculation($rounded_result, $error_rate, $population);
        // Perlu diperbaiki, Result Tidak Terlihat
        include_once("./view/result.php");
        header("Location: index.php");
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset( $_GET['id'] )) {
    $model->deleteData($_GET['id']);
}

$list_data_array = $model->showData();
?>