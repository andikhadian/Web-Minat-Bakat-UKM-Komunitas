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
            <?php if ($dokumen == NULL) : ?>
                <div class="row sortable-card">
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>FTI (Fakultas Teknik Informatika)</h4>
                            </div>
                            <div class="card-body">
                                <p><span class="font-weight-bold"><?= $num_dokumen_fti ?></span> Dokumen</p>
                                <?php if ($num_dokumen_fti == 0) : ?>
                                    <a href="<?= base_url('Admin/Dokumen?folder=FTI') ?>" class="btn btn-primary btn-lg btn-block disabled btn-icon-split"><i class="fas fa-file"></i>Dokumen Kosong</a>
                                <?php else : ?>
                                    <a href="<?= base_url('Admin/Dokumen?folder=FTI') ?>" class="btn btn-primary btn-lg btn-block btn-icon-split"> <i class="fa fa-folder-open" aria-hidden="true"></i> Masuk Folder</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>SI (Sistem Informasi)</h4>
                            </div>
                            <div class="card-body">
                                <p><span class="font-weight-bold"><?= $num_dokumen_si ?></span> Dokumen</p>
                                <?php if ($num_dokumen_si == 0) : ?>
                                    <a href="<?= base_url('Admin/Dokumen?folder=SI') ?>" class="btn btn-primary btn-lg btn-block disabled btn-icon-split"> <i class="fas fa-file"></i>Dokumen Kosong</a>
                                <?php else : ?>
                                    <a href="<?= base_url('Admin/Dokumen?folder=SI') ?>" class="btn btn-primary btn-lg btn-block btn-icon-split"><i class="fa fa-folder-open" aria-hidden="true"></i> Masuk Folder</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>IK (Ilmu Komputer)</h4>
                            </div>
                            <div class="card-body">
                                <p><span class="font-weight-bold"><?= $num_dokumen_ik ?></span> Dokumen</p>
                                <?php if ($num_dokumen_ik == 0) : ?>
                                    <a href="<?= base_url('Admin/Dokumen?folder=IK') ?>" class="btn btn-primary btn-lg btn-block disabled btn-icon-split"> <i class="fas fa-file"></i> Dokumen Kosong</a>
                                <?php else : ?>
                                    <a href="<?= base_url('Admin/Dokumen?folder=IK') ?>" class="btn btn-primary btn-lg btn-block btn-icon-split"><i class="fa fa-folder-open" aria-hidden="true"></i>Masuk Folder</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Daftar Dokumen SPMI <?= $isi_get ?></h4>
                                <div class="card-header-form"><a href="<?= base_url('Admin/Unggah') ?>" class="btn btn-icon icon-left btn-success mr-2 ml-4"><i class="fas fa-upload"></i> Unggah Dokumen Baru</a></div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover" id="mytable">
                                        <thead>
                                            <tr>
                                                <th>
                                                    No
                                                </th>
                                                <th>Nama Dokumen</th>
                                                <th>Jenis Dokumen</th>
                                                <th>Kategori Dokumen</th>
                                                <th>File Dokumen</th>
                                                <th>Diunggah Pada</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <?php

                                        $i = 1;
                                        foreach ($dokumen as $item) : ?>
                                            <tr>
                                                <td style="vertical-align: middle;">
                                                    <?= $i++; ?>
                                                </td>
                                                <td style="vertical-align: middle;"><?= $item['nama_dokumen']; ?></td>
                                                <td style="vertical-align: middle;"><?= $item['jenis_dokumen']; ?></td>
                                                <td class="align-middle">
                                                    <?php if ($item['kategori_dokumen'] == 'GAMBAR') {
                                                        $icon = '<i class="fas fa-file-image mr-2"></i>';
                                                        $badge = 'badge-warning';
                                                    } else if ($item['kategori_dokumen'] == 'PDF') {
                                                        $icon = '<i class="fas fa-file-pdf mr-2"></i>';
                                                        $badge = 'badge-danger';
                                                    } else if ($item['kategori_dokumen'] == 'OFFICE') {
                                                        $badge = 'badge-info';
                                                        $icon = '<i class="fa fa-briefcase mr-2"></i>';
                                                    }
                                                    ?>
                                                    <div class="badge font-weight-bold <?= $badge ?>"><?= $icon . $item['kategori_dokumen']; ?></div>
                                                </td>
                                                <td style="vertical-align: middle;">
                                                    <a download href="<?= base_url('assets/Documents/') . $item['fakultas_dokumen'] . '/' . $item['jenis_dokumen'] . '/' . $item['kategori_dokumen'] . '/' . $item['file_dokumen']; ?>"><i class="fa fa-download mr-2" aria-hidden="true"></i>Unduh File</a>
                                                </td>
                                                <td style="vertical-align: middle;"><?= date('d M Y', $item['tgl_dokumen_masuk']); ?></td>
                                                <td>
                                                    <a class="btn btn-danger has-icon btnHapus" href="<?= base_url('Admin/Dokumen/hapus/') . $item['dokumen_id'] . '/' . $item['fakultas_dokumen'] . '/' . $item['jenis_dokumen'] . '/' . $item['kategori_dokumen'] . '/' . $item['file_dokumen']; ?>"><i class="fas fa-trash-alt"></i> Hapus</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <a href="<?= base_url('Admin/Dokumen') ?>" class="btn btn-primary btn-block btn-lg btn-icon-split"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali</a>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
</div>