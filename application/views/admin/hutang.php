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
                            <a href="<?php echo base_url() . 'admin/keranjang' ?>" class="btn btn-success"><i
                                    class="bi bi-arrow-left"></i></a>
                            <h5 class="mb-3 pb-3 text-center"
                                style="letter-spacing: 1px; font-weight: 300; color: #33691E;">
                                Hutang</h5>
                            <form action="<?php echo base_url() . 'admin/hutang_add_act' ?>" method="post">
                                <div class="d-flex justify-content-between mb-4">
                                    <div class="form-outline"></div>
                                    <select name="hutang_pelanggan" class="form-control form-control-md">
                                        <option value="">Pilih Pelanggan</option>
                                        <?php foreach ($pelanggan as $p) { ?>
                                        <option value="<?php echo $p->pelanggan_id ?>">
                                            <?php echo $p->pelanggan_nama ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                    <a href="<?php echo base_url() . 'admin/pelanggan_add' ?>" class="btn btn-success"
                                        style="margin-left: 10px;">Pelanggan Baru</a>
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="date" name="hutang_tanggal" class="form-control form-control-md"
                                        required placeholder="Tanggal Hutang" />
                                    <?php echo form_error('hutang_tanggal') ?>
                                </div>
                                <div class="form-outline mb-4">
                                    <input type="number" name="hutang_jumlah" class="form-control form-control-md"
                                        required readonly value="<?php echo $this->cart->total(); ?>" />
                                    <?php echo form_error('hutang_jumlah') ?>
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
    </div>
</section>