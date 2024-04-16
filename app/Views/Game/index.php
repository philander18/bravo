<?= $this->extend('Templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col col-sm-8 col-md-6 col-xl-4 text-center">
            <div class="mt-3">
                <img src="<?= base_url(); ?>public/images/Bravo.png" class="img-fluid" alt="">
            </div>
            <h2 class="mb-3 oswald-700 fw-bold mt-3">Masukkan Nama</h2>
            <input type="text" class="form-control" id="nama" placeholder="Nama Medion">
        </div>
    </div>
</div>
<?= $this->endSection(); ?>