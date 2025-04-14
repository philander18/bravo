<table class="table table-striped" style="width:100%">
    <thead>
        <tr class="table-dark header-peserta" style="vertical-align:middle">
            <th class="text-center sort-peserta" style="width: 50%;" data-kolom="nama" data-sort="<?= $sort_peserta; ?>">Nama
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
<script>
    $(document).ready(function() {
        $('.cek_stal1').on('change', function() {
            const id = $(this).data('id');
            let stal1;
            if ($(this).is(":checked")) {
                stal1 = 1
            } else {
                stal1 = 0
            }
            $.ajax({
                url: method_url('Home', 'update_stal1'),
                data: {
                    id: id,
                    stal1: stal1,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {}
            });
        });
        $('.cek_stal2').on('change', function() {
            const id = $(this).data('id');
            let stal2;
            if ($(this).is(":checked")) {
                stal2 = 1
            } else {
                stal2 = 0
            }
            $.ajax({
                url: method_url('Home', 'update_stal2'),
                data: {
                    id: id,
                    stal2: stal2,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {}
            });
        });
        $('.cek_stal3').on('change', function() {
            const id = $(this).data('id');
            let stal3;
            if ($(this).is(":checked")) {
                stal3 = 1
            } else {
                stal3 = 0
            }
            $.ajax({
                url: method_url('Home', 'update_stal3'),
                data: {
                    id: id,
                    stal3: stal3,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {}
            });
        });
        $('.modal-detail-peserta').on('click', function() {
            const id = $(this).data('id');
            $.ajax({
                url: method_url('Home', 'get_detail_peserta'),
                data: {
                    id: id,
                },
                method: 'post',
                dataType: 'html',
                success: function(data) {
                    $('.isi-detail-peserta').html(data);
                }
            });
        });
        $(".link-peserta").on('click', function() {
            refresh_peserta($('#keyword-peserta').val(), $(this).data('page'), $('#kelompok_bravo').val(), $('#kolom-peserta').val(), $('#sort-peserta').val());
        });
        $(".sort-peserta").on('click', function() {
            var sort = "ASC";
            if ($(this).data('kolom') == $('#kolom-peserta').val()) {
                if ($(this).data('sort') == 'ASC') {
                    sort = "DESC";
                } else {
                    sort = "ASC";
                }
            } else {
                sort = "ASC";
            }
            refresh_peserta($('#keyword-peserta').val(), 1, $('#kelompok_bravo').val(), $(this).data('kolom'), sort);
        });
    });
</script>