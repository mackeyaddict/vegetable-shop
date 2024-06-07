<div class="container">
    <div class="row pt-4">
        <div class="d-flex justify-content-start">
            <a href="<?php echo base_url() . 'admin/laporan_print' ?>" class="btn btn-success"><i
                    class="bi bi-arrow-left"></i></a>
        </div>
        <h3 class="text-center">Filter Data Penjualan</h3>
        <hr>
        <div class="justify-content-start">
            <a class="btn btn-success btn-sm"
                href="<?php echo base_url() . 'admin/laporan_cetak/?dari=' . set_value('dari') . '&sampai=' . set_value('sampai'); ?>"><span
                    class="glyphicon glyphicon-print"></span> Cetak</a>
        </div>
        <br />
        <br />
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover" id="table-datatable">
                <thead class="bg-success">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Total Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($penjualan as $p) {
                    ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo date('d/m/Y', strtotime($p->penjualan_tanggal)); ?></td>
                        <td><?php echo "Rp. " . number_format($p->penjualan_total_harga); ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>