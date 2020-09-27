<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Kelola Organisasi Saya</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="<?= base_url('Pengurus/Dashboard') ?>">Dashboard</a>
                </div>
                <div class="breadcrumb-item">Kelola Organisasi Saya</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row sortable-card">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4><?= $item['jenis_organisasi'] ?> <?= $item['nama_organisasi'] ?></h4>
                            <div class="card-header-form">

                                <?php if ($item['status_pendaftaran'] == 'BUKA PENDAFTARAN') : ?>
                                    <a href="<?= base_url('Pengurus/Organisasi/tutup/' . $item['organisasi_id']) ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Ingin menutup pendaftaran ?"> <i class="fa fa-check-circle" aria-hidden="true"></i> <?= $item['status_pendaftaran'] ?></a>
                                <?php else : ?>
                                    <a href="<?= base_url('Pengurus/Organisasi/buka/' . $item['organisasi_id']) ?>" class="btn btn-danger mr-2 ml-4" data-toggle="tooltip" data-placement="top" title="Ingin membuka pendaftaran ?"> <i class="fa fa-minus-circle" aria-hidden="true"></i> <?= $item['status_pendaftaran'] ?></a>
                                <?php endif; ?>
                            </div>

                        </div>
                        <div class="card-body">
                            <img alt="image" src="<?= base_url('') ?>asset_organisasi/Documents/<?= $item['nama_organisasi'] ?>/<?= $item['gambar_organisasi'] ?>" class="img-fluid">
                            <a href="<?= base_url('Pengurus/Organisasi/kelola/' . $item['organisasi_id']) ?>" class="btn btn-primary btn-lg btn-block btn-icon-split mt-3"> <i class="fa fa-folder-open" aria-hidden="true"></i>Kelola</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>