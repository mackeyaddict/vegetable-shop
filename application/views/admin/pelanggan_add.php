<section>
    <div class="container">
        <div class="row  d-flex justify-content-center align-items-center">
            <div class="col col-md-8 p-4">
                <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-success pb-4" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php endif; ?>
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="card-body p-4 p-lg-5 text-black">
                            <a href="<?php echo base_url() . 'admin/hutang' ?>" class="btn btn-success"><i
                                    class="bi bi-arrow-left"></i></a>
                            <h5 class="mb-3 pb-3 text-center"
                                style="letter-spacing: 1px; font-weight: 300; color: #33691E;">
                                Data Pelanggan Hutang Baru</h5>
                            <form action="<?php echo base_url() . 'admin/pelanggan_add_act' ?>" method="post">
                                <div class="form-outline mb-4">
                                    <input type="text" name="pelanggan_nama" class="form-control form-control-md"
                                        required placeholder="Nama Pelanggan" />
                                    <?php echo form_error('pelanggan_nama') ?>
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="number" name="pelanggan_hp" class="form-control form-control-md"
                                        required placeholder="No Hp" />
                                    <?php echo form_error('pelanggan_hp') ?>
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="text" name="pelanggan_alamat" class="form-control form-control-md"
                                        required placeholder="Alamat" />
                                    <?php echo form_error('pelanggan_alamat') ?>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Simpan" class="btn btn-success">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>