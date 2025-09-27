<?php
    include_once("./controller/input-controller.php");
?>
<div class="d-flex justify-content-center">
    <form action="" method="POST" class="d-flex flex-column gap-4 w-75">
        <section class="form-group d-flex flex-column gap-2">
            <label>Jumlah Populasi</label>
            <input name="input_population" type="text" class="form-control" placeholder="Masukan jumlah populasi disini..." required>
        </section>
        <section class="form-group d-flex flex-column gap-2">
            <label>Tingkat Toleransi Kesalahan</label>
            <input name="input_error" type="text" class="form-control" placeholder="Masukan tingkat toleransi kesalahan disini..." required>
        </section>
        <button type="submit" class="btn btn-primary">Jalankan Perhitungan</button>
    </form>
</div>