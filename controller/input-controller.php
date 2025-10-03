<?php
include("./model/calculation-model.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    # code...
    $population_raw = $_POST["input_population"];

    $population_clean = str_replace(",","", $population_raw);

    $population = filter_var($population_clean, FILTER_VALIDATE_INT);
    $error_rate = filter_input(INPUT_POST,'input_error', FILTER_VALIDATE_FLOAT);

    // ubah bentuk angka menjadi persen(desimal)
    $error_percen = $error_rate / 100;

    $result = null;

    if ($population === false || $error_rate === false) {
        echo'Tipe data anda salah';
        echo'<br>';
        echo'Tipe Data Populasi: ' . gettype($population);
        echo'<br>';
        echo'Tipe Data Error: ' . gettype($error_rate);
    } else if ($population <= 0 || $error_rate <= 0){
        echo 'Input tidak boleh 0';
    } else {
        $denominator = 1 + $population * pow($error_percen, 2);
        
        try {
            $result = $population / $denominator;
        } catch (DivisionByZeroError $ez) {
            echo "Terjadi Error Pembagian dengan Nol: " . $e->getMessage();
        } catch (Exception $e) {
            echo "Error ditemukan!: ". $e->getMessage();
        }

        $rounded_result = round($result);

        $model = new CalculationModel($connection_db);
        $model->addCalculation($rounded_result, $error_rate, $population);

        $list_data_array = mysqli_fetch_array($model->list_data);

        include_once("./view/result.php");
    }
}
?>