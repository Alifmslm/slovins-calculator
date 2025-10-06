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
                    <p class="card-subtitle history-value"><strong><?= $row['error_rate'] ?>%</strong></p>
                </div>
                <h5 class="card-title mt-2 fw-bold history-value"><?= number_format($row['result']) ?> Sampel Dibutuhkan</h5>
            </div>
            <div class="card-footer d-flex justify-content-end">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Hapus History
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Menghapus Data History</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Apakah anda yakin ingin menghapus data history ini?
                            </div>
                            <div class="modal-footer">
                                <a href="index.php?id=<?= $row['id'] ?>" type="button" class="btn btn-danger">Ya, Hapus History</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
?>