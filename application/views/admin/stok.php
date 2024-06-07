<section class="table-stok">
    <div class="container mx-auto mt-4">
        <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-success pb-4" role="alert">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
        <?php endif; ?>
        <div class="col-12 d-flex justify-content-between mt-auto">
            <div class="col-5">
                <a href="<?= base_url() . 'admin/sayur_add' ?>" class="btn btn-success">Tambah Sayur</a>
            </div>
            <div class="col-4">
                <form method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Cari Sayur">
                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <?php
                $kategori = []; // Array untuk menyimpan nama kategori yang unik

                // Mengumpulkan nama kategori yang unik
                foreach ($sayur as $s) {
                    $kategori[$s->kategori_nama][] = $s;
                }

                $first_kategori = true;
                foreach ($kategori as $kategori => $items) :
                    // Periksa apakah ada permintaan pencarian
                    if (isset($_GET['search'])) {
                        // Memfilter item berdasarkan permintaan pencarian
                        $searchQuery = $_GET['search'];
                        $filteredItems = array_filter($items, function ($s) use ($searchQuery) {
                            return strpos(strtolower($s->sayur_nama), strtolower($searchQuery)) !== false;
                        });

                        // Jika ada item yang terfilter, tampilkan di bagian atas
                        if (!empty($filteredItems)) {
                ?>
                <div class='col text-center'>
                    <h3 style='padding-top: 20px; padding-bottom: 20px;'>Hasil pencarian untuk: <?= $searchQuery ?></h3>
                </div>
                <div class='row row-cols-1 row-cols-md-2 row-cols-lg-4 mt-4'>
                    <?php foreach ($filteredItems as $s) : ?>
                    <div class='col mb-4 d-flex'>
                        <div class='card w-100'>
                            <div class="d-flex justify-content-end mt-auto p-4">
                                <a href="<?php echo base_url() . 'admin/sayur_delete/' . $s->sayur_id ?>"
                                    class="btn btn-sm btn-success delete-btn" data-toggle="modal"
                                    data-target="#deleteModalSayur" data-sayur-id="<?= $s->sayur_id ?>"><i
                                        class="bi bi-trash-fill"></i></a>
                            </div>
                            <br>
                            <h4 class='card-title font-weight-bold mb-4 text-center' style='color: #3CB64C;'>
                                <?= $s->sayur_nama ?></h4>
                            <div class='card-body d-flex flex-column pt-4'>
                                <img class='card-img-top flex-grow-1'
                                    src='<?= base_url("assets/sayur-img/$s->sayur_img") ?>' alt='Card image cap' />
                                <div>
                                    <div class='d-flex justify-content-between mt-auto'>
                                        <div>
                                            <h5>Rp. <?= number_format($s->sayur_harga) ?>,-</h5>
                                            <p>Tersedia <b><?= $s->sayur_stok ?></b> <?= $s->satuan_nama ?></p>
                                        </div>
                                    </div>
                                    <div class='d-flex justify-content-between mt-auto'>
                                        <button class='btn btn-success btn-sm btn-add-stock'
                                            data-sayur-id='<?= $s->sayur_id ?>' data-sayur-stok='<?= $s->sayur_stok ?>'
                                            data-sayur-price='<?= $s->sayur_harga ?>' data-toggle='modal'
                                            data-target='#addStockModal'>Edit Stok & Harga</button>
                                        <button class='btn btn-danger btn-sm btn-delete-stock' data-toggle='modal'
                                            data-target='#deleteModal' data-sayur-id='<?= $s->sayur_id ?>'>Hapus
                                            Stok</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php
                        }
                    } else {
                        // Jika tidak ada permintaan pencarian, tampilkan semua item untuk kategori tersebut
                        ?>
                <div class='col text-center'>
                    <h3 style='padding-top: 20px; padding-bottom: 20px;'><?= $kategori ?></h3>
                </div>
                <div class='row row-cols-1 row-cols-md-2 row-cols-lg-4 mt-4'>
                    <?php foreach ($items as $s) : ?>
                    <div class='col mb-4 d-flex'>
                        <div class='card w-100'>
                            <div class="d-flex justify-content-end mt-auto p-4">
                                <a href="<?php echo base_url() . 'admin/sayur_delete/' . $s->sayur_id ?>"
                                    class="btn btn-sm btn-success delete-btn" data-toggle="modal"
                                    data-target="#deleteModalSayur" data-sayur-id="<?= $s->sayur_id ?>"><i
                                        class="bi bi-trash-fill"></i></a>
                            </div>
                            <br>
                            <h4 class='card-title font-weight-bold mb-4 text-center'>
                                <?= $s->sayur_nama ?></h4>
                            <div class=' card-body d-flex flex-column pt-4'>
                                <img class='card-img-top flex-grow-1'
                                    src='<?= base_url("assets/sayur-img/$s->sayur_img") ?>' alt='Card image cap' />
                                <div>
                                    <div class='d-flex justify-content-between mt-auto'>

                                        <div>
                                            <h5>Rp. <?= number_format($s->sayur_harga) ?>,-</h5>
                                            <p>Tersedia <b><?= $s->sayur_stok ?></b> <?= $s->satuan_nama ?></p>
                                        </div>
                                    </div>
                                    <div class='d-flex justify-content-between mt-auto'>
                                        <button class='btn btn-success btn-sm btn-add-stock'
                                            data-sayur-id='<?= $s->sayur_id ?>' data-sayur-stok='<?= $s->sayur_stok ?>'
                                            data-sayur-price='<?= $s->sayur_harga ?>' data-toggle='modal'
                                            data-target='#addStockModal'>Edit Stok & Harga</button>
                                        <button class='btn btn-danger btn-sm btn-delete-stock' data-toggle='modal'
                                            data-target='#deleteModal' data-sayur-id='<?= $s->sayur_id ?>'>Hapus
                                            Stok</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php
                    }
                endforeach;
                ?>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="addStockModal" tabindex="-1" aria-labelledby="addStockModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addStockModalLabel">Edit Sayur</h5>
                <button type="button" class="close btn btn-success" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addStockForm" method="POST" action="<?= base_url('admin/update_harga_stok') ?>">
                    <input type="hidden" name="sayur_id" id="sayur_id" value="">
                    <div class="form-group">
                        <label for="stock_update">Tambah Atau Kurangi Stok:</label>
                        <input type="number" class="form-control" id="stock_update" name="stok_update" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Harga:</label>
                        <input type="number" class="form-control" id="price" value="" name="sayur_harga" required>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Data</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus stok ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="#" class="btn btn-danger" id="deleteButton">Hapus</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteModalSayur" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Data</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda yakin ingin menghapus data sayur ini?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <a href="" class="btn btn-danger delete-confirm-btn">Hapus</a>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('.btn-add-stock').click(function() {
        var sayurId = $(this).data('sayur-id');
        var sayurPrice = $(this).data('sayur-price');
        var sayurStok = $(this).data('sayur-stok');
        $('#sayur_id').val(sayurId);
        $('#stock_amount').val(sayurStok);
        $('#price').val(sayurPrice);
    });
});
</script>

<script>
$(document).ready(function() {
    $('.btn-delete-stock').click(function() {
        var sayurId = $(this).data('sayur-id');
        $('#deleteButton').attr('href', '<?= base_url() . 'admin/hapus_stok/' ?>' + sayurId);
    });
});
</script>

<script>
$(document).ready(function() {
    $('.delete-btn').click(function() {
        var sayurId = $(this).data('sayur-id');
        $('.delete-confirm-btn').attr('href', '<?= base_url() . 'admin/sayur_delete/' ?>' + sayurId);
    });
});
</script>