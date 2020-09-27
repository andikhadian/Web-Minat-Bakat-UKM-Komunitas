<div class="intro-section" id="home-section">
    <div class="slide-1" style="background-image: url('<?= base_url() ?>asset_home/images/backround_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="row align-items-center">
                        <div class="row mb-7 justify-content-center">
                            <div class="col-lg-8 text-center" data-aos="fade-up" data-aos-delay="">
                                <h2 class="section-title text-white text-center"><?= $itemOrganisasi['nama_organisasi']; ?></h2>
                            </div>
                            <h5 class="text-white text-center">
                                <p><?= $itemOrganisasi['deskripsi_organisasi']; ?>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="site-section courses-title" id="courses-section">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
                <h2 class="section-title">Kegiatan <?= $itemOrganisasi['jenis_organisasi']; ?> <?= $itemOrganisasi['singkatan_organisasi']; ?> </h2>
            </div>
        </div>
    </div>
</div>
<div class="site-section courses-entry-wrap" data-aos="fade-up" data-aos-delay="100">
    <div class="container">
        <div class="row">
            <div class="owl-carousel col-12 nonloop-block-14">
                <?php foreach ($itemKegiatan as $itemK) : ?>
                    <img src="<?= base_url('') ?>asset_organisasi/Documents/<?= $itemK['nama_organisasi'] ?>/Kegiatan Organisasi/<?= $itemK['gambar'] ?>" width="250px" height="250px">
                <?php endforeach; ?>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-7 text-center">
                <button class="customPrevBtn btn btn-primary m-1">Sebelumnya</button>
                <button class="customNextBtn btn btn-primary m-1">Selanjutnya</button>
            </div>
        </div>
    </div>
</div>

<div class="site-section" id="teachers-section">
    <div class="container">
        <div class="row mb-2 justify-content-center">
            <div class="col-lg-9 mb-5 text-center" data-aos="fade-up" data-aos-delay="">
                <h2 class="section-title">Struktur Organisasi <?= $itemOrganisasi['jenis_organisasi']; ?> <?= $itemOrganisasi['singkatan_organisasi']; ?></h2>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <?php foreach ($itemStruktur as $itemS) : ?>
                <div class="col-md-6 col-lg-4 mb-4 mx-auto" data-aos="fade-up" data-aos-delay="100">
                    <div class="teacher text-center">
                        <img src="<?= base_url('') ?>asset_organisasi/Documents/<?= $itemS['nama_organisasi'] ?>/Struktur Organisasi/<?= $itemS['gambar'] ?>" alt="Image" class="img-fluid w-51 rounded-circle mx-auto mb-4">
                        <div class="py-2">
                            <h3 class="text-black"><?= $itemS['nama'] ?></h3>
                            <p class="position"><?= $itemS['jabatan'] ?> <?= $itemOrganisasi['jenis_organisasi']; ?> <?= $itemOrganisasi['singkatan_organisasi']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="site-section courses-title" id="courses-section">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
                <h2 class="section-title">Hai, <?= $user['nama_user'] ?> <br> Ingin bergabung dengan Kami di <?= $itemOrganisasi['jenis_organisasi']; ?> <?= $itemOrganisasi['singkatan_organisasi']; ?>?</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <form action="" method="post">
                    <div class="col-lg-12 mt-4">
                        <div class="form-group">
                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama Anda" readonly value="<?= $user['nama_user'] ?>">
                            <?= form_error('nama', '<small class="text-white text-left">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <input type="number" name="npm" id="npm" class="form-control" placeholder="Masukan NPM Anda">
                            <?= form_error('npm', '<small class="text-white text-left">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-4">
                        <div class="form-group">
                            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control" placeholder="Masukan Tanggal Lahir Anda">
                            <?= form_error('tgl_lahir', '<small class="text-white text-left">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-4">
                        <div class="form-group">
                            <select name="prodi" id="prodi" class="form-control">
                                <option value="">Pilih Prodi Anda</option>
                                <option value="Ilmu Komputer">Ilmu Komputer</option>
                                <option value="Sistem Informasi">Sistem Informasi</option>
                            </select>
                            <?= form_error('prodi', '<small class="text-white text-left">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-4">
                        <div class="form-group">
                            <textarea class="form-control" name="alasan" id="alasan" cols="30" rows="10" placeholder="Apa alasan anda memilih untuk mendaftarkan diri di organisasi ini"></textarea>
                            <?= form_error('alasan', '<small class="text-white text-left">', '</small>'); ?>
                        </div>
                    </div>
                    <div class="col-lg-12 mt-4">
                        <?php if ($itemOrganisasi['status_pendaftaran'] == 'BUKA PENDAFTARAN') : ?>
                            <?php if ($cekDaftar != 0) : ?>
                                <button disabled class="btn btn-warning btn-lg btn-block text-white">MOHON MAAF ANDA TIDAK DAPAT MENDAFTAR LAGI YAA </button>
                            <?php else : ?>
                                <button type="submit" class="btn btn-warning btn-lg btn-block text-white">Kirim</button>
                            <?php endif; ?>
                        <?php else : ?>
                            <button disabled class="btn btn-warning btn-lg btn-block text-white disabled">MOHON MAAF KAMI SEDANG TIDAK MEMBUKA PENDAFTARAN PESERTA</button>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="site-section bg-light" id="contact-section">
    <div class="container">
        <p>
            <iframe style="border: 0;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3965.599864728413!2d106.89846501432133!3d-6.316175963565635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f7928392814b%3A0x4062fc4a6fa4587!2sUniversitas+Respati+Indonesia+(Kampus+A)!5e0!3m2!1sid!2sid!4v1502294198094" width="1000" height="300" frameborder="0" allowfullscreen="allowfullscreen">
            </iframe>
        </p>
    </div>
</div>