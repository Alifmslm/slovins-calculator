<?php
    if ($list_data_array === null) {
        # code...
        echo"<h5>Data Masih Kosong</h5>";
    } else {
        foreach($list_data_array as $row):
?>
<div class="card">
    <div class="header-card d-flex flex-column gap-2 p-3">
        <div class="item-text d-flex gap-1">
            <p class="card-subtitle">Jumlah Populasi: </p>
            <p class="card-subtitle"><strong><?= $row['population'] ?></strong></p>
        </div>
        <div class="item-text d-flex gap-1">
            <p class="card-subtitle">Persentase Error: </p>
            <p class="card-subtitle"><strong><?= $row['error_rate']?></strong></p>
        </div>
        <h5 class="card-title mt-2 fw-bold"><?= $row['result']?> Sampel Dibutuhkan</h5>
    </div>
    <div class="card-footer d-flex justify-content-end">
        <button class="btn btn-danger">Hapus History</button>
    </div>
</div>
<?php
        endforeach;
    }
?>