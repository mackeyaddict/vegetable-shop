<div class="container">
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">

                <div class="d-flex justify-content-between pt-4">
                    <a href="<?php echo base_url() . 'admin/laporan' ?>" class="btn btn-success"><i
                            class="bi bi-arrow-left"></i></a>
                </div>
                <br />
                <div class="row">
                </div>
                <h1 class="mt-4">Statistik Laporan Penjualan</h1>
                <br />
                <br />
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-area me-1"></i>
                        Area Chart
                    </div>
                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
                    <div class="card-footer small text-muted">Updated <?php echo date('d/m/Y'); ?></div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-bar me-1"></i>
                                Bar Chart
                            </div>
                            <div class="card-body"><canvas id="myBarChart" width="100%" height="50"></canvas></div>
                            <div class="card-footer small text-muted">Updated <?php echo date('d/m/Y'); ?></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-chart-pie me-1"></i>
                                Pie Chart
                            </div>
                            <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                            <div class="card-footer small text-muted">Updated <?php echo date('d/m/Y'); ?></div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Mendapatkan data dari database
<?php
    // Lakukan query ke database dan ambil data yang diperlukan
    $data = []; // Simpan data yang diambil dari database ke dalam array ini

    // Contoh query menggunakan PDO
    $pdo = new PDO('mysql:host=localhost;dbname=sayur', 'root', '');
    $stmt = $pdo->query('SELECT penjualan_tanggal, penjualan_total_harga FROM penjualan');
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
    }
    ?>

// Menggunakan data dari database dalam grafik
// Area Chart
var areaChartData = {
    labels: <?php echo json_encode(array_column($data, 'penjualan_tanggal')); ?>,
    datasets: [{
        label: 'Data',
        data: <?php echo json_encode(array_column($data, 'penjualan_total_harga')); ?>,
        fill: false,
        borderColor: 'rgb(75, 192, 192)',
        tension: 0.1
    }]
};

var ctx = document.getElementById('myAreaChart').getContext('2d');
new Chart(ctx, {
    type: 'line',
    data: areaChartData,
});

// Bar Chart
var barChartData = {
    labels: <?php echo json_encode(array_column($data, 'penjualan_tanggal')); ?>,
    datasets: [{
        label: 'Data',
        data: <?php echo json_encode(array_column($data, 'penjualan_total_harga')); ?>,
        backgroundColor: 'rgb(75, 192, 192)',
        borderColor: 'rgb(75, 192, 192)',
        borderWidth: 1
    }]
};

var ctx2 = document.getElementById('myBarChart').getContext('2d');
new Chart(ctx2, {
    type: 'bar',
    data: barChartData,
});

// Pie Chart
var pieChartData = {
    labels: <?php echo json_encode(array_column($data, 'penjualan_tanggal')); ?>,
    datasets: [{
        data: <?php echo json_encode(array_column($data, 'penjualan_total_harga')); ?>,
        backgroundColor: [
            'rgb(255, 99, 132)',
            'rgb(54, 162, 235)',
            'rgb(255, 205, 86)',
            // Tambahkan warna tambahan jika diperlukan
        ],
        hoverOffset: 4
    }]
};

var ctx3 = document.getElementById('myPieChart').getContext('2d');
new Chart(ctx3, {
    type: 'pie',
    data: pieChartData,
});
</script>