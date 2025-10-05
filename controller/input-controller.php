<?php
include("./model/calculation-model.php");

$rounded_result = null;
$show_result = false;
$list_data_array = null;
$model = new CalculationModel($connection_db);

if (isset($_SESSION['calculation_result'])) {
    $rounded_result = $_SESSION['calculation_result'];
    $population = $_SESSION['calculation_population'];
    $error_rate = $_SESSION['calculation_error'];

    $show_result = true;
    unset($_SESSION['calculation_result']);
    unset($_SESSION['calculation_population']);
    unset($_SESSION['calculation_error']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    # code...
    $population_raw = $_POST["input_population"];
    $population_clean = str_replace(",", "", $population_raw);
    $population = filter_var($population_clean, FILTER_VALIDATE_INT);

    $error_rate = filter_input(INPUT_POST, 'input_error', FILTER_VALIDATE_FLOAT);
    $error_rate_formated = number_format($error_rate);
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

        $_SESSION['calculation_result'] = $rounded_result;
        $_SESSION['calculation_population'] = $population;
        $_SESSION['calculation_error'] = $error_rate;

        header("Location: index.php");
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $model->deleteData($_GET['id']);
}

$list_data_array = $model->showData();
?>