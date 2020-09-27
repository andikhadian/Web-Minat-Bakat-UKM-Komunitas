<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Organisasi</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="<?= base_url('Admin/Dashboard') ?>">Dashboard</a>
                </div>
                <div class="breadcrumb-item">Organisasi</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Aturan</h2>
            <p class="section-lead">
                Disini anda dapat Melihat, Membuat, dan Menghapus Data
                Organisasi
            </p>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Organisasi</h4>
                        <div class="card-header-form"><a href="<?= base_url('Admin/Organisasi/tambah') ?>" class="btn btn-icon icon-left btn-primary mr-2 ml-4"><i class="fas fa-plus-circle"></i> Tambah Organisasi</a></div>
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
                                        <th>Nama Organisasi</th>
                                        <th>Jenis Organisasi</th>
                                        <th>Pengurus</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <?php

                                $i = 1;
                                foreach ($allOrganisasi as $ao) : ?>
                                    <tr>
                                        <td style="vertical-align: middle;">
                                            <?= $i++; ?>
                                        </td>
                                        <td>
                                            <img alt="image" src="<?= base_url() ?>asset_organisasi/Documents/<?= $ao['nama_organisasi']; ?>/<?= $ao['gambar_organisasi']; ?>" style="width: 70px; height: 70px;" class="rounded img-thumbnail my-4" />
                                        </td>
                                        <td style="vertical-align: middle;"><?= $ao['nama_organisasi']; ?></td>
                                        <td style="vertical-align: middle;"><?= $ao['jenis_organisasi']; ?></td>
                                        <td style="vertical-align: middle;"><?= $ao['nama_user']; ?></td>
                                        <td style="vertical-align: middle;">
                                            <?php if ($ao['status_pendaftaran'] == 'BUKA PENDAFTARAN') : ?>
                                                <span class="badge badge-success"><i class="fa fa-check-circle mr-2" aria-hidden="true"></i><?= $ao['status_pendaftaran']; ?></span>
                                            <?php elseif ($ao['status_pendaftaran'] == 'TUTUP PENDAFTARAN') : ?>
                                                <span class="badge badge-danger"><i class="fa fa-minus-circle mr-2" aria-hidden="true"></i><?= $ao['status_pendaftaran']; ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-h text-primary"></i></a>
                                            <div class="dropdown-menu">
                                                <div class="dropdown-title">Menu Pilihan</div>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item has-icon btnHapus" href="<?= base_url('Admin/Organisasi/hapus/') . $ao['organisasi_id']; ?>"><i class="fas fa-trash text-primary"></i> Hapus</a>
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