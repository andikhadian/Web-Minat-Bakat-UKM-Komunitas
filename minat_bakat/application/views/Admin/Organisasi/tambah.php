<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Organisasi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="<?= base_url('Admin/Dashboard') ?>">Dashboard</a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="<?= base_url('Admin/Organisasi') ?>">Organisasi</a>
                </div>
                <div class="breadcrumb-item">Tambah Organisasi</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Aturan</h2>
            <p class="section-lead">
                Pastikan anda mengisi data dengan lengkap, agar tidak terjadi kesalahan dikemudian hari
            </p>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Tambah Organisasi</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="pengurus_id">Pengurus</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control" name="pengurus_id">
                                            <option value="">-- Pilih Pengurus --</option>
                                            <?php foreach ($pengurus as $item) : ?>
                                                <option value="<?= $item['user_id'] ?>"><?= $item['nama_user'] ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <?= form_error('pengurus_id', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="jenis_organisasi">Jenis Organisasi</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control" name="jenis_organisasi">
                                            <option value="">-- Pilih Jenis Organisasi --</option>
                                            <option value="UKM">UKM</option>
                                            <option value="Komunitas">Komunitas</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                        <?= form_error('jenis_organisasi', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="nama_organisasi">Nama Organisasi</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control w-100" id="nama_organisasi" name="nama_organisasi" value="<?= set_value('nama_organisasi'); ?>">
                                        <?= form_error('nama_organisasi', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="singkatan_organisasi">Singkatan Organisasi</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control w-100" id="singkatan_organisasi" name="singkatan_organisasi" value="<?= set_value('singkatan_organisasi'); ?>">
                                        <?= form_error('singkatan_organisasi', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="gambar_organisasi">Logo</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="file" class="form-control w-100 pb-5 pt-4" id="gambar_organisasi" name="gambar_organisasi">
                                        <?= form_error('gambar_organisasi', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary btn-block btn-lg" type="submit">Tambah Organisasi Sekarang</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>