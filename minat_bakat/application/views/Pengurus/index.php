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
                        <i class="fas fa-university"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Organisasi Saya</h4>
                        </div>
                        <div class="card-body">
                            <?= $countOrganisasi; ?>
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
                            <h4>Struktur Organisasi</h4>
                        </div>
                        <div class="card-body">
                            <?= $countStruktur; ?>
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
                            <h4>Kegiatan Organisasi</h4>
                        </div>
                        <div class="card-body">
                            <?= $countKegiatan; ?>
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
                        <h4>Daftar mahasiswa yang mendaftar</h4>
                        <div class="card-header-form"><a href="<?= base_url('Pengurus/Pendaftaran/index') ?>" class="btn btn-icon icon-left btn-primary mr-2 ml-4"><i class="fas fa-info-circle"></i> Lihat detail</a></div>
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
                                        <th>NPM</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Prodi</th>
                                        <th>Alasan Mendaftar</th>
                                        <th>Mendaftar</th>
                                    </tr>
                                </thead>
                                <?php

                                $i = 1;
                                foreach ($newDaftar as $au) : ?>
                                    <tr>
                                        <td style="vertical-align: middle;">
                                            <?= $i++; ?>
                                        <td style="vertical-align: middle;"><?= $au['nama']; ?></td>
                                        <td style="vertical-align: middle;"><?= $au['npm']; ?></td>
                                        <td style="vertical-align: middle;"><?= $au['tgl_lahir']; ?></td>
                                        <td style="vertical-align: middle;"><?= $au['prodi']; ?></td>
                                        <td style="vertical-align: middle;"><?= $au['alasan']; ?></td>
                                        <td style="vertical-align: middle;"><?= date('d M Y', $au['tgl_data_masuk']); ?></td>
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