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
            <h2 class="section-title">Aturan</h2>
            <p class="section-lead">
                Disini anda dapat melihat data
                pendaftaran peserta
            </p>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Daftar Pendaftaran Peserta</h4>
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
                                        <th>TTL </th>
                                        <th>Program Studi</th>
                                        <th>Alasan</th>
                                    </tr>
                                </thead>
                                <?php

                                $i = 1;
                                foreach ($allPendaftaran as $ao) : ?>
                                    <tr>
                                        <td style="vertical-align: middle;">
                                            <?= $i++; ?>
                                        </td>
                                        <td style="vertical-align: middle;"><?= $ao['nama']; ?></td>
                                        <td style="vertical-align: middle;"><?= $ao['npm']; ?></td>
                                        <td style="vertical-align: middle;"><?= $ao['tgl_lahir']; ?></td>
                                        <td style="vertical-align: middle;"><?= $ao['prodi']; ?></td>
                                        <td style="vertical-align: middle;"><?= $ao['alasan']; ?></td>
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