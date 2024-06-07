<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col col-md-8">
            <?php if ($this->session->flashdata('success')) : ?>
                <div class="alert alert-danger pb-4" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
            <?php endif; ?>
            <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                    <div class="card-body p-4 p-lg-5 text-black">
                        <a href="<?php echo base_url() . 'admin/stok' ?>" class="btn btn-success"><i class="bi bi-arrow-left"></i></a>
                        <h5 class="mb-3 pb-3 text-center" style="letter-spacing: 1px; font-weight: 300; color: #33691E;">Data
                            Sayur Baru</h5>
                        <form action="<?php echo base_url() . 'admin/sayur_add_act' ?>" enctype="multipart/form-data" method="post">
                            <div class="form-outline mb-4">
                                <input type="text" name="sayur_nama" class="form-control form-control-md" required placeholder="Nama Sayur" />
                                <?php echo form_error('sayur_nama') ?>
                            </div>
                            <div class="form-outline mb-4">
                                <select name="sayur_satuan" class="form-control form-control-md">
                                    <option value="">Pilih Satuan</option>
                                    <?php foreach ($satuan as $s) { ?>
                                        <option value="<?php echo $s->satuan_id ?>"><?php echo $s->satuan_nama ?></option>
                                    <?php } ?>
                                </select>
                                <?php echo form_error('satuan'); ?>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="number" name="sayur_harga" class="form-control form-control-md" required placeholder="Harga Sayur" />
                                <?php echo form_error('sayur_harga') ?>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="number" name="sayur_stok" class="form-control form-control-md" required placeholder="Stok Sayur" />
                                <?php echo form_error('sayur_stok') ?>
                            </div>
                            <div class="form-outline mb-4">
                                <select name="kategori_id" class="form-control form-control-md">
                                    <option value="">Pilih Kategori</option>
                                    <?php foreach ($kategori as $k) { ?>
                                        <option value="<?php echo $k->kategori_id ?>"><?php echo $k->kategori_nama ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-outline mb-4">
                                <input type="file" name="sayur_img" class="form-control form-control-md" required placeholder="Gambar Sayur" />
                                <?php echo form_error('sayur_img') ?>
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