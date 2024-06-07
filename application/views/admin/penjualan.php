<section class="table-stok">
    <div class="container mx-auto mt-4">
        <div class="col-12 d-flex justify-content-between mt-auto">
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                    <?php endif; ?>
                    <?php
                    $kategori = [];
                    foreach ($sayur as $s) {
                        $kategori[$s->kategori_nama][] = $s;
                    }
                    ?>
                    <div class="col text-end">
                        <a href="<?php echo base_url() . 'admin/keranjang' ?>"><i class="bi bi-bag-fill"
                                style="font-size: 30px; color: #3CB64C;"></i></a>
                    </div>
                    <div class="col text-center">
                        <h3 style="padding-top: 20px; padding-bottom: 20px; color: #3CB64C;">Filter Kategori</h3>
                    </div>
                    <div class="row justify-content-between">
                        <?php foreach ($kategori as $kategoriName => $items) : ?>
                        <div class="col-2 text-start">
                            <form action="<?php echo base_url('admin/penjualan'); ?>" method="GET">
                                <input type="hidden" name="kategori" value="<?php echo $kategoriName; ?>">
                                <button class="btn btn-success btn-sm"
                                    type="submit"><?php echo $kategoriName; ?></button>
                            </form>
                        </div>
                        <?php endforeach; ?>
                        <div class="col-3 text-end">
                            <form action="<?php echo base_url('admin/penjualan'); ?>" method="GET">
                                <button class="btn btn-outline-white btn-sm" type="submit">Semua</button>
                            </form>
                        </div>
                    </div>

                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-6 mt-4">
                        <?php foreach ($sayur as $s) : ?>
                        <div class="col mb-4">
                            <div class="card h-100">
                                <br>
                                <h5 class="card-title font-weight-bold mb-4 text-center">
                                    <?php echo $s->sayur_nama; ?>
                                </h5>
                                <div class="card-body d-flex flex-column justify-content-between">
                                    <img class="card-img-top flex-grow-1"
                                        src="<?php echo base_url('assets/sayur-img/' . $s->sayur_img); ?>"
                                        alt="Card image cap">
                                    <br>
                                    <div class="d-flex text-start mt-auto">
                                        <p class="mb-0">Harga: <b>Rp.
                                                <?php echo number_format($s->sayur_harga); ?>,-</b> </p>
                                    </div>
                                    <div class="d-flex text-start mt-auto">
                                        <p class="mb-0">Stok: <b><?php echo $s->sayur_stok; ?></b>
                                            <?php echo $s->satuan_nama; ?></p>
                                    </div>
                                    <br>
                                    <div class="d-flex justify-content-end mt-auto">
                                        <form action="<?php echo base_url('admin/tambahKeranjang'); ?>" method="POST">
                                            <input type="hidden" name="sayur_id" value="<?php echo $s->sayur_id; ?>">
                                            <button class="btn btn-outline-white mt-auto add-to-cart-btn" type="submit">
                                                <i class="bi bi-bag-plus-fill"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>