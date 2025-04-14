<script>
    function refresh_peserta(keyword, page, kelompok, kolom, sort) {
        $.ajax({
            url: method_url('Home', 'refresh_tabel_peserta'),
            data: {
                keyword: keyword,
                page: page,
                kelompok: kelompok,
                kolom: kolom,
                sort: sort,
            },
            method: 'post',
            dataType: 'html',
            success: function(data) {
                $('.tabel-peserta').html(data);
            }
        });
    }
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
        $('#kelompok_bravo').on('change', function() {
            refresh_peserta($('#keyword-peserta').val(), 1, $(this).val(), $('#kolom-peserta').val(), $('#sort-peserta').val());
        });
        $('#keyword-peserta').on('keyup', function() {
            refresh_peserta($(this).val(), 1, $('#kelompok_bravo').val(), $('#kolom-peserta').val(), $('#sort-peserta').val());
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