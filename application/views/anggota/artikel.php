<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="breadcrumb-hero">
            <div class="container">
                <div class="breadcrumb-hero">
                    <h2><b><?= $title; ?></b></h2>
                </div>
            </div>
        </div>
        <div class="container">
            <ol>
                <li><a href="<?= base_url('anggota/beranda') ?>"><i class="fas fa-fw fa-home"></i> Beranda</a></li>
                <li><a href="<?= base_url('anggota/artikel') ?>"></a> Artikel</li>
            </ol>
        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container">

            <div class="row">

                <?php $i = 1; ?>
                <?php foreach ($artikel as $art) : ?>
                    <div class="col-lg-4  col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                        <article class="entry">
                            <h2 class="entry-title">
                                <a href="<?= base_url('anggota/detailArtikel/') . $art['id_artikel']; ?>"><?= $art['judul']; ?></a>
                            </h2>

                            <div class="entry-meta">
                                <ul>
                                    </li>
                                    <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="<?= base_url('artikel/detailArtikel/') . $art['id_artikel']; ?>">Admin</a>
                                    </li>
                                    <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="<?= base_url('artikel/detailArtikel/') . $art['id_artikel']; ?>"><time datetime=""><?= date('d F Y', strtotime($art['tanggal_buat'])); ?></time></a>
                                    </li>
                                </ul>
                            </div>

                            <div class="entry-content">
                                <p class="text-justify">
                                    <?= implode(' ', array_slice(explode(' ', $art['isi']), 0, 15)) . "\n"; ?>...
                                </p>
                                <div class="read-more">
                                    <a href="<?= base_url('anggota/detailArtikel/') . $art['id_artikel']; ?>">Selengkapnya</a>
                                </div>
                            </div>

                        </article><!-- End blog entry -->
                    </div>

                <?php endforeach; ?>

            </div>

            <div class="blog-pagination" data-aos="fade-up">
                <ul class="justify-content-center">
                    <li class="disabled"><i class="icofont-rounded-left"></i></li>
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#"><i class="icofont-rounded-right"></i></a></li>
                </ul>
            </div>

        </div>
    </section><!-- End Blog Section -->

</main><!-- End #main -->