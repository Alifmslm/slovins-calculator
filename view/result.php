<?php
?>
<div class="d-flex flex-column align-items-center gap-2">
    <h3 class="text-center fw-bold">
        Hasil Perhitungan:
        <mark>
            <?= $rounded_result; ?>
                Sampel
        </mark>
    </h3>
    <p class="w-50 text-center text-secondary">Perhitungan Slovin menunjukkan bahwa untuk populasi: <b><?= $population; ?></b> dengan toleransi kesalahan:
        <b><?= $error_rate; ?></b>%,
        jumlah sampel minimum yang Anda butuhkan adalah <b><?= $rounded_result; ?></b> responden agar penelitian tetap
        representatif.
    </p>
</div>