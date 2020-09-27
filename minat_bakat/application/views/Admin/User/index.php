<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="<?= base_url('Admin/Dashboard') ?>">Dashboard</a>
                </div>
                <div class="breadcrumb-item">User</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">Aturan</h2>
            <p class="section-lead">
                Disini anda dapat Melihat, Membuat, dan Menghapus Data
                User
            </p>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar User</h4>
                        <div class="card-header-form"><a href="<?= base_url('Admin/User/tambah') ?>" class="btn btn-icon icon-left btn-primary mr-2 ml-4"><i class="fas fa-plus-circle"></i> Tambah User</a></div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="mytable">
                                <thead>
                                    <tr>
                                        <th>
                                            No
                                        </th>
                                        <th>Profil</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Sebagai</th>
                                        <th>Status</th>
                                        <th>Akun Dibuat Pada</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <?php

                                $i = 1;
                                foreach ($allUser as $au) : ?>
                                    <tr>
                                        <td style="vertical-align: middle;">
                                            <?= $i++; ?>
                                        </td>
                                        <td>
                                            <img alt="image" src="https://ui-avatars.com/api/?background=3abaf4&bold=true&color=fff&length=1&size=128&name=<?= $au['nama_user'] ?>" style="width: 40px; height: 40px;" class="rounded-circle mr-1" />
                                        </td>
                                        <td style="vertical-align: middle;"><?= $au['nama_user']; ?></td>
                                        <td style="vertical-align: middle;"><?= $au['username']; ?></td>
                                        <td style="vertical-align: middle;"><?= $au['role']; ?></td>
                                        <td style="vertical-align: middle;">
                                            <?php if ($au['status'] == 'AKTIF') : ?>
                                                <span class="badge badge-success"><i class="fa fa-check-circle mr-2" aria-hidden="true"></i><?= $au['status']; ?></span>
                                            <?php elseif ($au['status'] == 'MENUNGGU PERSETUJUAN') : ?>
                                                <span class="badge badge-warning"><i class="fa fa-exclamation mr-2" aria-hidden="true"></i><?= $au['status']; ?></span>
                                            <?php else : ?>
                                                <span class="badge badge-danger"><i class="fa fa-minus-circle mr-2" aria-hidden="true"></i><?= $au['status']; ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td style="vertical-align: middle;"><?= date('d M Y', $au['date_created']); ?></td>
                                        <td>
                                            <a href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-ellipsis-h text-primary"></i></a>
                                            <div class="dropdown-menu">
                                                <div class="dropdown-title">Menu Pilihan</div>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item has-icon" href="<?= base_url('Admin/User/ubah/') . $au['user_id']; ?>"><i class="fas fa-edit text-primary"></i> Ubah</a>
                                                <a class="dropdown-item has-icon btnHapus" href="<?= base_url('Admin/User/hapus/') . $au['user_id']; ?>"><i class="fas fa-trash text-primary"></i> Hapus</a>
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