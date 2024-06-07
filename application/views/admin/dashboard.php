<section class="feature">
    <div class="container">
        <div class="row g-3 my-2 ">
            <h2 class="text-center">Dashboard</h2>
            <div class="col-md-4">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2"><?php echo $this->MSayur->get_data('sayur')->num_rows(); ?></h3>
                        <p class="fs-5">Sayur</p>
                    </div>
                    <div>
                        <i class="bi bi-box-seam-fill fs-1 primary-text p-3"></i>
                    </div>
                    <a href="<?php echo base_url() . 'admin/stok' ?>" class="btn btn-outline-white bt-sm">Lihat
                        Lebih</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2"><?php echo $this->MSayur->get_data('penjualan')->num_rows(); ?></h3>
                        <p class="fs-5">Penjualan</p>
                    </div>
                    <div>
                        <i class="bi bi-currency-dollar fs-1 primary-text p-3"></i>
                    </div>
                    <a href="<?php echo base_url() . 'admin/laporan_penjualan' ?>"
                        class="btn btn-outline-white bt-sm">Lihat
                        Lebih</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2"><?php echo $this->MSayur->get_data('hutang')->num_rows(); ?></h3>
                        <p class="fs-5">Hutang</p>
                    </div>
                    <div>
                        <i class="bi bi-credit-card-fill fs-1 primary-text p-3"></i>
                    </div>
                    <a href="<?php echo base_url() . 'admin/daftar_hutang' ?>" class="btn btn-outline-white bt-sm">Lihat
                        Lebih</a>
                </div>
            </div>
            <hr>
            <div class="col-md-4">
                <h4 class="text-center">Table Hutang</h4>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="bg-success">
                                <tr>
                                    <th>Nama Pelanggan</th>
                                    <th>Total Hutang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($hutang as $h) {
                                ?>
                                <tr>
                                    <td><?php echo $h->pelanggan_nama; ?></td>
                                    <td><?php echo "Rp. " . number_format($h->hutang_jumlah) . " ,-"; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-right"></div>
                </div>
            </div>
            <div class="col-md-4">
                <h4 class="text-center">Table Penjualan</h4>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="bg-success">
                                <tr>
                                    <th>Transaksi Tanggal</th>
                                    <th>Total Transaksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($penjualan as $p) {
                                ?>
                                <tr>
                                    <td><?php echo $p->penjualan_tanggal; ?></td>
                                    <td><?php echo "Rp. " . number_format($p->penjualan_total_harga) . " ,-"; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-right"></div>
                </div>
            </div>
            <div class="col-md-4">
                <h4 class="text-center">Table Sayur</h4>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="bg-success">
                                <tr>
                                    <th>Nama Sayur</th>
                                    <th>Harga Sayur</th>
                                    <th>Stok Sayur</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($sayur as $s) {
                                ?>
                                <tr>
                                    <td><?php echo $s->sayur_nama; ?></td>
                                    <td><?php echo "Rp. " . number_format($s->sayur_harga) . " ,-"; ?></td>
                                    <td><?php echo $s->sayur_stok; ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        Area Chart
                    </div>
                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                    <div class="card-footer small text-muted">Updated <?php echo date('d/m/Y'); ?></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
<?php
    $data = [];
    $pdo = new PDO('mysql:host=localhost;dbname=sayur', 'root', '');
    $stmt = $pdo->query('SELECT penjualan_tanggal, penjualan_total_harga FROM penjualan');
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
    }
    ?>
var areaChartData = {
    labels: <?php echo json_encode(array_column($data, 'penjualan_tanggal')); ?>,
    datasets: [{
        label: 'Data',
        data: <?php echo json_encode(array_column($data, 'penjualan_total_harga')); ?>,
        fill: false,
        borderColor: 'rgb(60, 182, 76)',
        tension: 0.1
    }]
};
var ctx = document.getElementById('myAreaChart').getContext('2d');
new Chart(ctx, {
    type: 'line',
    data: areaChartData,
});
</script>