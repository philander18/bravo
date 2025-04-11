<?= $this->extend('Templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-phil" x-data="{akses: '<?= $akses; ?>'}">
    <div class="judul-1">Absensi Konsumsi Bravo</div>
    <section class="section-1">
        <div class="konten-phil">
            <div class="phil-tabel">
                <div class="search">
                    <label class="text-dark">Search </label>
                    <input class="form-control form-control-sm" type="search" style="background: rgba(255, 255, 255, 0.5);" id="keyword-peserta">
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>