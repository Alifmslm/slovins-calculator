<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    # code...
    $population = filter_input(INPUT_POST,'input_population', FILTER_VALIDATE_INT);
    $error_rate = filter_input(INPUT_POST,'input_error', FILTER_VALIDATE_FLOAT);

    // ubah bentuk angka menjadi persen(desimal)
    $error_percen = $error_rate / 100;
    // test
    $result = null;

    if ($population === false || $error_rate === false) {
        echo'Tipe data anda salah';
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

        include_once("./view/result.php");
    }
}
?>