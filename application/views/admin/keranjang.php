<?php if ($this->session->flashdata('success')) : ?>
<div class="alert alert-success" role="alert">
    <?php echo $this->session->flashdata('success'); ?>
</div>
<?php endif; ?>

<section>
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <br>
            <br>
            <br>
            <a href="<?php echo base_url() . 'admin/penjualan' ?>" style="color: #3CB64C; font-size: 30px;"><i
                    class="bi bi-arrow-left"></i></a>
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Keranjang Belanja</h5>
                    </div>
                    <div class="card-body">
                        <ul id="cartItems" class="list-group">
                            <?php foreach ($this->cart->contents() as $item) : ?>
                            <li class="list-group-item">
                                <?php echo $item['name']; ?> -
                                Rp. <?php echo number_format($item['price']); ?>,-
                                <div class="d-flex justify-content-between">
                                    <form action="<?php echo base_url() . 'admin/update_keranjang' ?>" method="POST">
                                        <input type="hidden" name="rowid" value="<?php echo $item['rowid']; ?>">
                                        <input type="number" name="qty" value="<?php echo $item['qty']; ?>" min="1">
                                        <button type="submit" class="btn btn-success">Ubah</button>
                                    </form>
                                    <form action="<?php echo base_url() . 'admin/hapus_item' ?>" method="POST">
                                        <input type="hidden" name="rowid" value="<?php echo $item['rowid']; ?>">
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Apakah anda yakin menghapus sayur ini?')">Hapus</button>
                                    </form>
                                </div>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="card-footer justify-content-center">
                        <h6 class="mb-0">Total: Rp. <?php echo number_format($this->cart->total()); ?></h6>
                        <div class="col d-flex justify-content-end">
                            <form action="<?php echo base_url('admin/pembayaran_tunai'); ?>" method="POST">
                                <input type="hidden" name="total_harga" value="<?php echo $this->cart->total(); ?>">
                                <button class="btn btn-success btn-sm" type="submit"
                                    style="margin-right: 10px;">Tunai</button>
                            </form>
                            <form action="<?php echo base_url() . 'admin/hutang' ?>" method="post">
                                <button class="btn btn-success btn-sm" type="submit">Hutang</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>