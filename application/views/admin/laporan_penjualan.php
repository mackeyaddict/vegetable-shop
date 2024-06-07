<br />
<section class="intro">
    <div class="bg-image h-100">
        <div class="container">
            <div class="d-flex justify-content-between">
                <a href="<?php echo base_url() . 'admin/laporan' ?>" class="btn btn-success"><i
                        class="bi bi-arrow-left"></i></a>
                <a href="<?php echo base_url() . 'admin/laporan_print'; ?>" class="btn btn-success btn-sm">Filter</a>
            </div>
            <br />
            <br />
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true"
                                style="position: relative; height: 700px">
                                <table class="table table-striped mb-0">
                                    <thead class="bg-success">
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Tanggal</th>
                                            <th scope="col">Total Harga</th>
                                            <th scope="col"></th>
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
                                            <td>
                                                <a class="btn btn-sm btn-danger"
                                                    href="<?php echo base_url() . 'admin/laporan_penjualan_hapus/' . $p->penjualan_id; ?>"
                                                    onclick="return confirm('Apakah anda yakin ingin membatalkan transaksi')">
                                                    <span class="glyphicon glyphicon-remove"></span>Hapus</a>
                                            </td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>