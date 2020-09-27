<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Ubah Status User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="<?= base_url('Admin/Dashboard') ?>">Dashboard</a>
                </div>
                <div class="breadcrumb-item active">
                    <a href="<?= base_url('Admin/User') ?>">User</a>
                </div>
                <div class="breadcrumb-item">Ubah Status User</div>
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
                            <h4>Form Ubah Status User</h4>
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="nama">Nama Lengkap</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control w-100" id="nama" name="nama" value="<?= $item['nama_user']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="username">Username</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control w-100" id="username" name="username" value="<?= $item['username']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="role">Role</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control w-100" id="role" name="role" value="<?= $item['role']; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3" for="status">Status</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="form-check form-check-inline mt-1">
                                            <input class="form-check-input" type="radio" id="aktif" value="AKTIF" name="status" <?= ($item['status'] == 'AKTIF') ? "checked" : ""; ?>>
                                            <label class="form-check-label" for="aktif">Aktif</label>
                                        </div>
                                        <div class="form-check form-check-inline mt-1">
                                            <input class="form-check-input" type="radio" id="aktif" value="MENUNGGU PERSETUJUAN" name="status" <?= ($item['status'] == 'MENUNGGU PERSETUJUAN') ? "checked" : ""; ?>>
                                            <label class="form-check-label" for="aktif">Menunggu Persetujuan</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" id="tidak" value="TIDAK AKTIF" name="status" <?= ($item['status'] == 'TIDAK AKTIF') ? "checked" : ""; ?>>
                                            <label class="form-check-label" for="tidak">Tidak Aktif</label>
                                        </div>
                                        <?= form_error('status', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary btn-block btn-lg" type="submit">Ubah Status User Sekarang</button>
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