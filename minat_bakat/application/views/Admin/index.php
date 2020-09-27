<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>
        <?= $this->session->flashdata('message'); ?>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>User</h4>
                        </div>
                        <div class="card-body">
                            <?= $countUser; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-info">
                        <i class="fas fa-university"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Organisasi</h4>
                        </div>
                        <div class="card-body">
                            <?= $countOrganisasi; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="fas fa-images"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Galeri Kegiatan</h4>
                        </div>
                        <div class="card-body">
                            <?= $countGaleri; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-list"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Pendaftaran Peserta</h4>
                        </div>
                        <div class="card-body">
                            <?= $countPendaftaran; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar user yang baru mendaftar</h4>
                        <div class="card-header-form"><a href="<?= base_url('Admin/User/index') ?>" class="btn btn-icon icon-left btn-primary mr-2 ml-4"><i class="fas fa-info-circle"></i> Lihat detail</a></div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="mytable">
                                <thead>
                                    <tr>
                                        <th>
                                            No
                                        </th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Status</th>
                                        <th>Mendaftar</th>
                                    </tr>
                                </thead>
                                <?php

                                $i = 1;
                                foreach ($newUser as $au) : ?>
                                    <tr>
                                        <td style="vertical-align: middle;">
                                            <?= $i++; ?>
                                        <td style="vertical-align: middle;"><?= $au['nama_user']; ?></td>
                                        <td style="vertical-align: middle;"><?= $au['username']; ?></td>
                                        <td style="vertical-align: middle;">
                                            <?php if ($au['status'] == 'AKTIF') : ?>
                                                <span class="badge badge-success"><i class="fa fa-check-circle mr-2" aria-hidden="true"></i><?= $au['status']; ?></span>
                                            <?php elseif ($au['status'] == 'MENUNGGU PERSETUJUAN') : ?>
                                                <a href="<?= base_url('Admin/User/aktif/' . $au['user_id']) ?>" data-toggle="tooltip" data-placement="top" title="Ingin mengubah user ini menjadi aktif ?"><span class="badge badge-warning"><i class="fa fa-exclamation mr-2" aria-hidden="true"></i><?= $au['status']; ?></span></a>
                                            <?php else : ?>
                                                <span class="badge badge-danger"><i class="fa fa-minus-circle mr-2" aria-hidden="true"></i><?= $au['status']; ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td style="vertical-align: middle;"><?= date('d M Y', $au['date_created']); ?></td>
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
</div>
</div>