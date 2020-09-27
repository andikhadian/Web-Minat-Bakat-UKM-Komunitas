<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Profil Saya</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active">
                    <a href="<?= base_url('Admin/Dashboard') ?>">Dashboard</a>
                </div>
                <div class="breadcrumb-item">Profil Saya</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-5">
                    <div class="card author-box card-primary">
                        <div class="card-body">
                            <div class="author-box-left">
                                <?php
                                $pp = "https://ui-avatars.com/api/?background=3ABAF4&bold=true&color=fff&length=1&size=128&name=" . $user['nama_user'];
                                ?>
                                <img alt="image" src="<?= $pp ?>" class="rounded-circle author-box-picture">
                                <div class="clearfix"></div>
                            </div>
                            <div class="author-box-details">
                                <div class="author-box-name">
                                    <a href="#">Hi, <?= $user['nama_user']; ?></a>
                                </div>
                                <div class="mt-3">
                                    <div class="text-small font-weight-bold">Username : <?= $user['username']; ?></div>
                                    <div class="text-small font-weight-bold">Role : <?= $user['role']; ?></div>
                                    <div class="text-small font-weight-bold">Bergabung Sejak : <?= date('d M Y', $user['date_created']); ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
</section>
</div>