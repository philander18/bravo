<?= $this->extend('Templates/index'); ?>
<?= $this->section('page-content'); ?>
<div class="logout">
    <span class="nama-akses"><?= strtoupper($akses); ?></span><a href="<?= base_url(); ?>Home/keluar" id="log-out" class="mx-2"><i class="fa-solid fa-right-from-bracket"></i></a>
</div>
<div class="container-phil" x-data="{akses: '<?= $akses; ?>'}">
    <div class="judul-1">Absensi Konsumsi Bravo</div>
    <section class="section-1">
        <div class="konten-phil">
            <div class="phil-tabel">
                <div class="search filter-select">
                    <label class="text-dark">Search </label>
                    <input class="form-control form-control-sm" type="search" style="background: rgba(255, 255, 255, 0.5);" id="keyword-peserta">
                    <select class="form-select form-select-sm" aria-label="Kelompok bravo" id="kelompok_bravo">
                        <option value="All" data-bravo="All" selected>All</option>
                        <?php foreach ($list_bravo['list_bravo'] as $row) : ?>
                            <option value="<?= $row['kelompok']; ?>" data-bravo="<?= $row['kelompok']; ?>"><?= $row['kelompok']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="tabel tabel-peserta">
                    <table class="table table-striped" style="width:100%">
                        <thead>
                            <tr class="table-dark header-peserta" style="vertical-align:middle">
                                <th class="text-center sort-peserta" style="width: 55%;" data-kolom="nama" data-sort="<?= $sort_peserta; ?>">Nama
                                    <?php if ($kolom_peserta == 'nama') : ?>
                                        <?php if ($sort_peserta == 'ASC') : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                                        <?php else : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                                        <?php endif ?>
                                    <?php endif ?>
                                </th>
                                <th class="text-center sort-peserta" style="width: 55px;" data-kolom="stal1" data-sort="<?= $sort_peserta; ?>">Stal 1
                                    <?php if ($kolom_peserta == 'stal1') : ?>
                                        <?php if ($sort_peserta == 'ASC') : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                                        <?php else : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                                        <?php endif ?>
                                    <?php endif ?>
                                </th>
                                <th class="text-center sort-peserta" style="width: 55px;" data-kolom="stal2" data-sort="<?= $sort_peserta; ?>">Stal 2
                                    <?php if ($kolom_peserta == 'stal2') : ?>
                                        <?php if ($sort_peserta == 'ASC') : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                                        <?php else : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                                        <?php endif ?>
                                    <?php endif ?>
                                </th>
                                <th class="text-center sort-peserta" style="width: 55px;" data-kolom="stal3" data-sort="<?= $sort_peserta; ?>">Stal 3
                                    <?php if ($kolom_peserta == 'stal3') : ?>
                                        <?php if ($sort_peserta == 'ASC') : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                                        <?php else : ?>
                                            <span class="ms-2"><i class="fa-solid fa-arrow-up-wide-short"></i></span>
                                        <?php endif ?>
                                    <?php endif ?>
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($peserta as $row) : ?>
                                <tr>
                                    <td class="text-center align-middle m-1 p-1" style="width: 6.9em;">
                                        <a href="" class="link-primary modal-detail-peserta" data-bs-toggle="modal" data-bs-target="#detail-peserta" data-id="<?= $row["id"]; ?>">
                                            <?= $row["nama"]; ?>
                                        </a>
                                    </td>
                                    <td class="text-center align-middle m-1 p-1">
                                        <input type="checkbox" class="cek_stal1" value="1" data-id="<?= $row['id']; ?>" <?= ($row['stal1'] == 1) ? "checked" : ""; ?>>
                                    </td>
                                    <td class="text-center align-middle m-1 p-1">
                                        <input type="checkbox" class="cek_stal2" value="1" data-id="<?= $row['id']; ?>" <?= ($row['stal2'] == 1) ? "checked" : ""; ?>>
                                    </td>
                                    <td class="text-center align-middle m-1 p-1">
                                        <input type="checkbox" class="cek_stal3" value="1" data-id="<?= $row['id']; ?>" <?= ($row['stal3'] == 1) ? "checked" : ""; ?>>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?php if ($peserta) : ?>
                        <div aria-label="Page navigation">
                            <ul class="pagination mb-0">
                                <?php if ($pagination_peserta['first']) : ?>
                                    <li class="page-item">
                                        <button class="page-link text-dark link-peserta" aria-label="First" id="first" name="first" data-page="1">
                                            <span aria-hidden="false">First</span>
                                        </button>
                                    </li>
                                <?php endif ?>
                                <?php if ($pagination_peserta['previous']) : ?>
                                    <li class="page-item">
                                        <button class="page-link text-dark link-peserta" aria-label="Previous" id="previous" name="previous" data-page="<?= $page - 1; ?>">
                                            <span aria-hidden=" true">Previous</span>
                                        </button>
                                    </li>
                                <?php endif ?>
                                <?php foreach ($pagination_peserta['number'] as $number) : ?>
                                    <li class="page-item <?= $pagination_peserta['page'] == $number ? 'active' : '' ?>">
                                        <button class="page-link text-dark link-peserta" id="nomor<?= $number; ?>" name="nomor<?= $number; ?>" data-page="<?= $number; ?>">
                                            <span aria-hidden="true"><?= $number; ?></span>
                                        </button>
                                    </li>
                                <?php endforeach ?>
                                <?php if ($pagination_peserta['next']) : ?>
                                    <li class="page-item">
                                        <button class="page-link text-dark link-peserta" aria-label="Next" id="next" name="next" data-page="<?= $page + 1; ?>">
                                            <span aria-hidden=" true">Next</span>
                                        </button>
                                    </li>
                                <?php endif ?>
                                <?php if ($pagination_peserta['last']) : ?>
                                    <li class="page-item">
                                        <button class="page-link text-dark link-peserta" aria-label="<?= $last_peserta; ?>" id="last" name="last" data-page="<?= $last_peserta; ?>">
                                            <span aria-hidden="true"><?= $last_peserta; ?></span>
                                        </button>
                                    </li>
                                <?php endif ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <input type="hidden" id="kolom-peserta" value="<?= $kolom_peserta; ?>">
                    <input type="hidden" id="sort-peserta" value="<?= $sort_peserta; ?>">
                </div>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="detail-peserta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fw-bold" id="exampleModalLabel">Detail Peserta</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body isi-detail-peserta">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>