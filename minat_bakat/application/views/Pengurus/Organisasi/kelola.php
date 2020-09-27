<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="<?= base_url('Pengurus/Dashboard') ?>">Dashboard</a>
                </div>
                <div class="breadcrumb-item"><?= $title ?></div>
            </div>
        </div>

        <div class="section-body">
            <div class="row sortable-card">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card card-primary">
                        <?php if ($item_deskripsi['deskripsi_organisasi'] == NULL) : ?>
                            <div class="card-header">
                                <h4>Deskripsi Organisasi</h4>
                                <div class="card-header-form">
                                    <a href="<?= base_url('Pengurus/Organisasi/buat_deskripsi/' . $item_deskripsi['organisasi_id']) ?>" class="btn btn-success mr-2 ml-4">Buat Deskripsi Organisasi</a>
                                </div>

                            </div>
                            <div class="card-body">
                                <p>
                                    Belum ada deskripsi organisasi
                                </p>
                            </div>
                        <?php else : ?>
                            <div class="card-header">
                                <h4>Deskripsi Organisasi</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="mytable">
                                        <thead>
                                            <tr>
                                                <th>Deskripsi Organisasi</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tr>
                                            <td style="width: 90%"><?= $item_deskripsi['deskripsi_organisasi'] ?></td>
                                            <td class="text-center">
                                                <a class="btn btn-danger my-4 btnHapus" href="<?= base_url('Pengurus/Organisasi/hapus_deskripsi/') . $item_deskripsi['organisasi_id']; ?>"><i class="fas fa-trash"></i> <br> Hapus</a>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="row sortable-card">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Struktur Organisasi</h4>
                            <div class="card-header-form">
                                <a href="<?= base_url('Pengurus/Organisasi/buat_struktur/' . $item_deskripsi['organisasi_id']) ?>" class="btn btn-success mr-2 ml-4">Buat Struktur Organisasi</a>
                            </div>

                        </div>
                        <?php if ($item_struktur == NULL) : ?>
                            <div class="card-body">
                                <p>
                                    Belum ada struktur organisasi
                                </p>
                            </div>
                        <?php else : ?>
                            <div class=" card-body" style="height: 470px; overflow-y: scroll;"">
                                <div class=" table-responsive">
                                <table class="table table-striped table-hover" id="mytable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>Nama</th>
                                            <th>Jabatan</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $i = 1;
                                    foreach ($item_struktur as $item) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td><img src="<?= base_url('') ?>asset_organisasi/Documents/<?= $item['nama_organisasi'] ?>/Struktur Organisasi/<?= $item['gambar'] ?>" alt="" class="img-thumbnail my-4" style="width: 70px; height: 70px"></td>
                                            <td><?= $item['nama'] ?></td>
                                            <td><?= $item['jabatan'] ?></td>
                                            <td class="text-center">
                                                <a class="btn btn-danger btnHapus" href="<?= base_url('Pengurus/Organisasi/hapus_struktur/') . $item['struktur_organisasi_id'] . '/' . $item['organisasi_id']; ?>"><i class="fas fa-trash"></i> <br> Hapus</a>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                    </div>
                <?php endif; ?>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Kegiatan Organisasi</h4>
                        <div class="card-header-form">
                            <a href="<?= base_url('Pengurus/Organisasi/buat_kegiatan/' . $item_deskripsi['organisasi_id']) ?>" class="btn btn-success mr-2 ml-4">Buat Kegiatan Organisasi</a>
                        </div>

                    </div>
                    <?php if ($item_kegiatan == NULL) : ?>
                        <div class="card-body">
                            <p>
                                Belum ada kegiatan organisasi
                            </p>
                        </div>
                    <?php else : ?>
                        <div class="card-body" style=" height: 470px; overflow-y: scroll;">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" id="mytable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th class="text-center">Gambar</th>
                                            <th>Nama Kegiatan</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    $i = 1;
                                    foreach ($item_kegiatan as $item) : ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td class="text-center"><img src="<?= base_url('') ?>asset_organisasi/Documents/<?= $item['nama_organisasi'] ?>/Kegiatan Organisasi/<?= $item['gambar'] ?>" alt="" class="img-thumbnail my-4" style="width: 70px; height: 70px"></td>
                                            <td><?= $item['nama_kegiatan'] ?></td>
                                            <td class="text-center">
                                                <a class="btn btn-danger btnHapus" href="<?= base_url('Pengurus/Organisasi/hapus_kegiatan/') . $item['kegiatan_organisasi_id'] . '/' . $item['organisasi_id']; ?>"><i class="fas fa-trash"></i> <br> Hapus</a>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>