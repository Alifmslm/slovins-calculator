<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    # code...
    $population = filter_input(INPUT_POST,'input_population', FILTER_VALIDATE_INT);
    $error_rate = filter_input(INPUT_POST,'input_error', FILTER_VALIDATE_FLOAT);

    if ($population === false || $error_rate === false) {
        echo'Tipe data anda salah';
    } else if ($population <= 0 || $error_rate <= 0){
        echo 'Input tidak boleh 0';
    } else {
        echo'Pouplation: ' . $population . ", Tipe Data: " . gettype($population);
        echo'<br>';
        echo'Error Rate: ' . $error_rate . ", Tipe Data: " . gettype($error_rate);
    }
} else {
    echo "Gagal Melakukan Proses Post.";
}
?>