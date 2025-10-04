<?php
if ($list_data_array === null) {
    # code...
    echo "<h5>Data Masih Kosong</h5>";
} else {
    while ($row = mysqli_fetch_assoc($list_data_array)) {
        ?>
        <div class="card">
            <div class="header-card d-flex flex-column gap-2 p-3">
                <div class="item-text d-flex gap-1">
                    <p class="card-subtitle">Jumlah Populasi: </p>
                    <p class="card-subtitle history-value"><strong><?= number_format($row['population']) ?></strong></p>
                </div>
                <div class="item-text d-flex gap-1">
                    <p class="card-subtitle">Persentase Error: </p>
                    <p class="card-subtitle history-value"><strong><?= number_format($row['error_rate']) ?></strong></p>
                </div>
                <h5 class="card-title mt-2 fw-bold history-value"><?= number_format($row['result']) ?> Sampel Dibutuhkan</h5>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <a href="index.php?id=<?= $row['id'] ?>" class="btn btn-danger">Hapus History</a>
            </div>
        </div>
        <?php
    }
}
?>