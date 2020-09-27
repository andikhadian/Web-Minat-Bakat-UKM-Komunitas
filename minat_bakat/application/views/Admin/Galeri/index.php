<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1><?= $title ?></h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="<?= base_url('Admin/Dashboard') ?>">Dashboard</a>
                </div>
                <div class="breadcrumb-item"><?= $title ?></div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Aturan</h2>
            <p class="section-lead">
                Disini anda dapat Melihat, Membuat, dan Menghapus Data
                <?= $title ?>
            </p>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar <?= $title ?></h4>
                        <div class="card-header-form"><a href="<?= base_url('Admin/Galeri/tambah') ?>" class="btn btn-icon icon-left btn-primary mr-2 ml-4"><i class="fas fa-plus-circle"></i> Tambah Galeri</a></div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="mytable">
                                <thead>
                                    <tr>
                                        <th>
                                            No
                                        </th>
                                        <th>Gambar</th>
                                        <th>Status</th>
                                        <th>Tanggal Diunggah</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <?php

                                $i = 1;
                                foreach ($allGaleri as $ao) : ?>
                                    <tr>
                                        <td style="vertical-align: middle;">
                                            <?= $i++; ?>
                                        </td>
                                        <td>
                                            <img alt="image" src="<?= base_url() ?>asset_organisasi/Galleries/<?= $ao['gambar']; ?>" style="width: 200px; height: 200px;" class="rounded img-thumbnail my-4" />
                                        </td>
                                        <td style="vertical-align: middle;">
                                            <?php if ($ao['status'] == 'AKTIF') : ?>
                                                <a href="<?= base_url('Admin/Galeri/tidak_aktif/' . $ao['galeri_id']) ?>" data-toggle="tooltip" data-placement="top" title="Ingin mengubah menjadi tidak aktif ?"><span class="badge badge-success"><i class="fa fa-check-circle mr-2" aria-hidden="true"></i><?= $ao['status']; ?></span></a>
                                            <?php elseif ($ao['status'] == 'TIDAK AKTIF') : ?>
                                                <a href="<?= base_url('Admin/Galeri/aktif/' . $ao['galeri_id']) ?>" data-toggle="tooltip" data-placement="top" title="Ingin mengubah menjadi aktif ?"><span class="badge badge-danger"><i class="fa fa-minus-circle mr-2" aria-hidden="true"></i><?= $ao['status']; ?></span></a>
                                            <?php endif; ?>
                                        </td>
                                        <td style="vertical-align: middle;"><?= date('d M Y', $ao['date_created']); ?></td>
                                        <td>
                                            <a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-h text-primary"></i></a>
                                            <div class="dropdown-menu">
                                                <div class="dropdown-title">Menu Pilihan</div>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item has-icon" href="<?= base_url('Admin/Galeri/ubah/') . $ao['galeri_id']; ?>"><i class="fas fa-edit text-primary"></i> Ubah</a>
                                                <a class="dropdown-item has-icon btnHapus" href="<?= base_url('Admin/Galeri/hapus/') . $ao['galeri_id']; ?>"><i class="fas fa-trash text-primary"></i> Hapus</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>