<?php if ($this->session->flashdata('success')) : ?>
<div class="alert alert-success" role="alert">
    <?php echo $this->session->flashdata('success'); ?>
</div>
<?php endif; ?>

<section>
    <br>
    <div class="bg-image h-100">
        <div class="mask d-flex align-items-center h-100">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="d-flex justify-content-start">
                            <a href="<?php echo base_url() . 'admin/laporan' ?>" class="btn btn-success"><i
                                    class="bi bi-arrow-left"></i></a>
                        </div>
                        <h4 class="text-center">Daftar Hutang</h4>
                        <hr>
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true"
                                    style="position: relative; height: 700px">
                                    <table class="table table-striped mb-0">
                                        <thead class="bg-success">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama Pelanggan</th>
                                                <th scope="col">Tanggal Transaksi</th>
                                                <th scope="col">Total Pembelian</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($hutang as $h) { ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $h->pelanggan_nama ?></td>
                                                <td><?php echo $h->hutang_tanggal ?></td>
                                                <td><?php echo $h->hutang_jumlah ?></td>
                                                <td>
                                                    <a class="btn btn-sm btn-success"
                                                        href="<?php echo base_url() . 'admin/hutang_bayar/' . $h->hutang_id; ?>"><span></span>Bayar</a>
                                                </td>
                                            </tr>
                                            <?php } ?>
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