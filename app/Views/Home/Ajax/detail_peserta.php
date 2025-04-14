<div class="detail-peserta">
    <div class="label-peserta">Nama</div>
    <div class="label-peserta">:</div>
    <div class="label-peserta text-success"><?= $peserta['nama']; ?></div>
    <div class="label-peserta">Bagian</div>
    <div class="label-peserta">:</div>
    <div class="label-peserta text-success"><?= $peserta['bagian']; ?></div>
    <div class="label-peserta">Kelompok</div>
    <div class="label-peserta">:</div>
    <div class="label-peserta text-success"><?= $peserta['kelompok']; ?></div>
    <div class="label-peserta">Stal 1</div>
    <div class="label-peserta">:</div>
    <div class="label-peserta text-success">
        <?php if ($peserta['stal1'] == 1) : ?>
            <i class="fa-solid fa-check"></i>
        <?php else : ?>
            <i class="fa-solid fa-xmark"></i>
        <?php endif; ?>
    </div>
    <div class="label-peserta">Stal 2</div>
    <div class="label-peserta">:</div>
    <div class="label-peserta text-success">
        <?php if ($peserta['stal2'] == 1) : ?>
            <i class="fa-solid fa-check"></i>
        <?php else : ?>
            <i class="fa-solid fa-xmark"></i>
        <?php endif; ?>
    </div>
    <div class="label-peserta">Stal 3</div>
    <div class="label-peserta">:</div>
    <div class="label-peserta text-success">
        <?php if ($peserta['stal3'] == 1) : ?>
            <i class="fa-solid fa-check"></i>
        <?php else : ?>
            <i class="fa-solid fa-xmark"></i>
        <?php endif; ?>
    </div>
    <div class="label-peserta">PIC</div>
    <div class="label-peserta">:</div>
    <div class="label-peserta text-success">
        <?= $peserta['pic']; ?>
    </div>
</div>