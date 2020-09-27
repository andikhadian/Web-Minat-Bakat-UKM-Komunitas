<div class="intro-section" id="home-section">
    <div class="slide-1" style="background-image: url('<?= base_url() ?>asset_home/images/backround_1.jpg');" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="row align-items-center">
                        <div class="row mb-7 justify-content-center">
                            <div class="col-lg-8 text-center" data-aos="fade-up" data-aos-delay="">
                                <h2 class="section-title text-white">Layanan Minat & Bakat</h2>
                            </div>
                            <h5 class="text-white">
                                Selamat datang di Website Layanan Informasi Minat dan Bakat Fakultas Teknologi
                                Informasi
                                Universitas Respati Indonesia, Website ini akan menampilkan informasi mengenai Unit Kegiatan
                                Mahasiswa (UKM) dan Komunitas yang ada di Universitas Respati Indonesia sehingga dapat membantu
                                Mahasiswa untuk mencari Informasi mengenai UKM dan Komunitas apa saja yang ada di Universitas
                                Respati Indonesia. Universitas Respati Indonesia sebagai Universitas Enterpreneuship dan sebagai
                                Universitas ramah lansia.
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
                <h2 class="section-title">Galeri Foto Kegiatan</h2>
            </div>
        </div>
    </div>
</div>
<div class="site-section courses-entry-wrap" data-aos="fade-up" data-aos-delay="100">
    <div class="container">
        <div class="row">
            <div class="owl-carousel col-12 nonloop-block-14">
                <?php foreach ($galeri as $item) : ?>
                    <img src="<?= base_url() ?>asset_organisasi/Galleries/<?= $item['gambar'] ?>" width="250px" height="250px">
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
<div class="site-section" id="programs-section">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
                <h2 class="section-title">Minat dan Bakat</h2>
                <p>Selain memiliki BEM, Universitas Respati Indonesia juga memiliki Unit Kegiatan Mahasiswa (UKM) dan
                    beberapa
                    Komunitas,
                    UKM dan Komunitas merupakan club ekstrakulikuler sebagai wadah untuk mempelajari ataupun mengesplor bakat
                    maupun minat yang
                    dimiliki oleh mahasiswa!
                </p>
            </div>
        </div>
        <div class="row mb-5 align-items-center">
            <div class="col-lg-7 mb-5" data-aos="fade-up" data-aos-delay="100">
                <img src="<?= base_url() ?>asset_home/images/perkenalan_1.jpg" alt="Image" class="img-fluid">
            </div>
            <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
                <h2 class="text-black mb-4">Perkenalan</h2>
                <p class="mb-4">
                    <p align="justify">Diawal menjadi Mahasiswa, akan diadakan UKM expo untuk memperkenalkan masing-masing UKM
                        dan
                        Komunitas ke
                        mahasiswa agar bisa mengesplor minat dan bakat mereka serta perekrutan anggota baru untuk Mahasiswa yang
                        ingin
                        bergabung,
                        Unit Kegiatan Mahasiswa atau dikenal (UKM) dan Komunitas sendiri adalah wadah aktivitas Mahasiswa luar
                        kelas
                        untuk
                        mengembangkan minat, bakat dan keahlian tertentu.
                    </p>
            </div>
        </div>
        <div class="row mb-5 align-items-center">
            <div class="col-lg-7 mb-5 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100">
                <img src="<?= base_url() ?>asset_home/images/perkenalan_2.jpg" alt="Image" class="img-fluid">
            </div>
            <div class="col-lg-4 mr-auto order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                <p class="mb-4">
                    <p align="justify">Mahasiswa yang telah resmi menjadi anggota dari masing-masing UKM dan Komunitas akan
                        mendapatkan
                        pelatihan
                        dari UKM dan Komunitas
                        tersebut, sehingga sangat memungkinkan untuk Mahasiswa yang belum mempunyai bakat khusus namun ingin
                        bergabung.
                        UKM dan Komunitas URINDO juga bisa dikatakan sebagai wadah untuk mempelajari ekstrakulikuler yang telah
                        teredia, disini
                        Mahasiswa
                        juga akan mendapatkan pengalaman baru dan memiliki keluarga baru didunia perkuliahan.
                    </p>
            </div>
        </div>

        <div class="row mb-5 align-items-center">
            <div class="col-lg-7 mb-5" data-aos="fade-up" data-aos-delay="100">
                <img src="<?= base_url() ?>asset_home/images/perkenalan_3.jpg" alt="Image" class="img-fluid">
            </div>
            <div class="col-lg-4 ml-auto" data-aos="fade-up" data-aos-delay="200">
                <p class="mb-4">
                    <p align="justify">Untuk itu sangat disarankan kepada teman-teman Mahasiswa agar dapat bergabung dengan
                        UKM
                        dan
                        Komunitas yang ada di Universitas Respati Indonesia dan selalu mengasah bakat yang dimiliki.</p>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="site-section" id="teachers-section">
    <div class="container">
        <div class="row mb-2 justify-content-center">
            <div class="col-lg-9 mb-5 text-center" data-aos="fade-up" data-aos-delay="">
                <h2 class="section-title">Struktur Organisasi Fakultas Teknologi Informasi</h2>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="teacher text-center">
                    <img src="<?= base_url() ?>asset_home/images/dosen_4.jpg" alt="Image" class="img-fluid w-52 rounded-circle mx-auto mb-4">
                    <div class="py-2">
                        <h3 class="text-black">Desmiwati, S.Kom, M.Si</h3>
                        <p class="position">Dekan Fakultas Teknologi Informasi</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 mb-2" data-aos="fade-up" data-aos-delay="200">
                <div class="teacher text-center">
                    <img src="<?= base_url() ?>asset_home/images/dosen_2.jpg" alt="Image" class="img-fluid w-52 rounded-circle mx-auto mb-4">
                    <div class="py-2">
                        <h3 class="text-black">Andi Susilo, S.Kom, M.TI</h3>
                        <p class="position">Ketua Program Studi Ilmu Komputer</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="teacher text-center">
                    <img src="<?= base_url() ?>asset_home/images/dosen_3.jpg" alt="Image" class="img-fluid w-52 rounded-circle mx-auto mb-4">
                    <div class="py-2">
                        <h3 class="text-black">Ramadhani Ulansari S.Kom, MT</h3>
                        <p class="position">Ketua Program Studi Sistem Informasi</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="site-section bg-image overlay" style="background-image: url('images/urindo_1.png');">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8 text-center testimony">
                <img src="<?= base_url() ?>asset_home/images/kabag_1.jpg" alt="Image" class="img-fluid w-25 mb-4 rounded-circle">
                <h3 class="mb-4">Sugeng Hadi Saputra M.Kep Sp.An</h3>
                <blockquote>
                    <p>&ldquo; Kabag Kemahasiswaan &rdquo;</p>
                </blockquote>
            </div>
        </div>
    </div>
</div>

<div class="site-section courses-title" id="courses-section">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-7 text-center" data-aos="fade-up" data-aos-delay="">
                <h2 class="section-title">Informasi Kegiatan Mahasiswa</h2>
            </div>
        </div>
    </div>
</div>
<div class="site-section courses-entry-wrap" data-aos="fade-up" data-aos-delay="100">
    <div class="container">
        <div class="album py-5">
            <div class="container">
                <div class="row">
                    <?php foreach ($organisasi as $item) : ?>
                        <div class="col-md-4">
                            <div class="card mb-4 shadow-sm" style="height: 420px">
                                <img src="<?= base_url() ?>asset_organisasi/Documents/<?= $item['nama_organisasi'] ?>/<?= $item['gambar_organisasi'] ?>" width="339" height="250">
                                <div class="card-body">
                                    <p class="card-text"><strong><?= $item['jenis_organisasi'] ?> <?= $item['nama_organisasi'] ?></strong></p>
                                </div>
                                <div class="card-footer bg-transparent">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="btn-group">
                                            <?php if ($user) : ?>
                                                <a href="<?= base_url('Organisasi?q=' . $item['organisasi_id']) ?>">
                                                    <button type="button" class="btn btn-sm btn-outline-secondary">Lihat detail</button>
                                                </a>
                                            <?php else : ?>
                                                <a href="<?= base_url('Auth') ?>">
                                                    <button type="button" class="btn btn-sm btn-outline-secondary">Login untuk melihat detail</button>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="site-section pb-0">
    <div class="future-blobs">
        <div class="blob_2">
            <img src="<?= base_url() ?>asset_home/images/blob_2.svg" alt="Image">
        </div>
        <div class="blob_1">
            <img src="<?= base_url() ?>asset_home/images/blob_1.svg" alt="Image">
        </div>
    </div>
    <div class="container">
        <div class="row mb-5 justify-content-center" data-aos="fade-up" data-aos-delay="">
            <div class="col-lg-7 text-center">




            </div>
            <div class="col-lg-7 align-self-end" data-aos="fade-left" data-aos-delay="200">

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