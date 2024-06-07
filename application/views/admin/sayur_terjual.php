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
                        <h4 class="text-center">Daftar Sayur Terjual</h4>
                        <hr>
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true"
                                    style="position: relative; height: 700px">
                                    <table class="table table-striped mb-0">
                                        <thead class="bg-success">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama Sayur</th>
                                                <th scope="col">Jumlah Sayur</th>
                                                <th scope="col">Total Harga</th>
                                                <th scope="col">Tanggal Terjual</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($sayur_terjual as $s) { ?>
                                            <tr>
                                                <td><?php echo $no++; ?></td>
                                                <td><?php echo $s->sayur_terjual_nama ?></td>
                                                <td><?php echo $s->sayur_terjual_jumlah ?></td>
                                                <td><?php echo $s->sayur_terjual_total_harga ?></td>
                                                <td><?php echo $s->sayur_terjual_tanggal ?></td>
                                                <td>
                                                    <a class="btn btn-sm btn-danger"
                                                        href="<?php echo base_url() . 'admin/sayur_terjual_hapus/' . $s->sayur_terjual_id; ?>"><span></span>Hapus</a>
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