<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Buat Kegiatan Organisasi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="<?= base_url('Pengurus/Dashboard') ?>">Dashboard</a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="<?= base_url('Pengurus/Organisasi') ?>">Kelola Organisasi Saya</a>
                </div>
                <div class="breadcrumb-item">Buat Kegiatan Organisasi</div>
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
                            <h4>Form Buat Kegiatan Organisasi</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="nama_kegiatan">Nama Kegiatan</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" name="nama_kegiatan" id="nama_kegiatan" class="form-control">
                                        <?= form_error('nama_kegiatan', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="gambar">Gambar</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="file" class="form-control w-100 pb-5 pt-4" id="gambar" name="gambar">
                                        <?= form_error('gambar', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary btn-block btn-lg" type="submit">Tambah Kegiatan Organisasi Sekarang</button>
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