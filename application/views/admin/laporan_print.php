<br />
<section class="intro">
    <div class="bg-image h-100">
        <div class="container">
            <div class="row pt-4">
                <div class="d-flex justify-content-start">
                    <a href="<?php echo base_url() . 'admin/laporan_penjualan' ?>" class="btn btn-success"><i
                            class="bi bi-arrow-left"></i></a>
                </div>
                <h3 class="text-center">Filter Data Penjualan</h3>
                <hr>
                <form method="post" action="<?php echo base_url() . 'admin/laporan_print' ?>">
                    <div class="form-group">
                        <label>Dari Tanggal</label>
                        <input type="date" name="dari" class="form-control">
                        <?php echo form_error('dari'); ?>
                    </div>
                    <br />
                    <div class="form-group">
                        <label>Sampai Tanggal</label>
                        <input type="date" name="sampai" class="form-control">
                        <?php echo form_error('sampai'); ?>
                    </div>
                    <br />
                    <div class="form-group">
                        <input type="submit" value="CARI" name="cari" class="btn btn-sm btn-success">
                    </div>
                </form>
            </div>
        </div>
</section>