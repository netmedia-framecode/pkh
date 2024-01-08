<?php require_once("controller/script.php");
require_once("templates/top.php");
require_once("sections/navbar.php");
?>

<!-- Banner Section start here -->
<section class="banner-section">
  <div class="container">
    <div class="row align-items-center flex-column-reverse flex-md-row">
      <div class="col-md-6">
        <div class="banner-item">
          <div class="banner-inner">
            <div class="banner-thumb">
              <img src="assets/img/banner.png" alt="Banner-image">
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="banner-item">
          <div class="banner-inner">
            <div class="banner-content align-middle">
              <h1><span class="">Program Keluarga Harapan</span> (PKH)</h1>
              <p>Sistem informasi pengelolan data peserta program keluarga harapan (PKH) pada desa Silaipui Kecamatan Alor Selatan Kabupaten Alor</p>
              <a href="#about" class="lab-btn mt-3">Lihat Lebih</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Banner Section end here -->

<!-- About section start here -->
<section class="about-section padding-tb shape-1" id="about">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 col-12">
        <div class="lab-item">
          <div class="lab-inner">
            <div class="lab-content">
              <div class="header-title text-start m-0">
                <h5>Sejarah</h5>
                <h2 class="mb-0">Program Keluarga Harapan</h2>
              </div>
              <p><?php foreach ($views_sejarah as $data) {
                    $num_char = 500;
                    $text = trim($data['deskripsi']);
                    $text = preg_replace('#</?strong.*?>#is', '', $text);
                    $lentext = strlen($text);
                    if ($lentext > $num_char) {
                      echo substr($text, 0, $num_char) . '...';
                    } else if ($lentext <= $num_char) {
                      echo substr($text, 0, $num_char);
                    }
                  } ?></p>
              <a href="sejarah-pkh" class="lab-btn mt-4">Baca Lebih</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-12">
        <div class="lab-item">
          <div class="lab-inner">
            <div class="lab-thumb">
              <div class="img-grp">
                <div class="about-circle-wrapper">
                  <div class="about-circle-2"></div>
                  <div class="about-circle"></div>
                </div>
                <div class="about-fg-img">
                  <img src="assets/img/about.png" alt="about-image">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- About section end here -->

<!-- Faith section start here -->
<section class="faith-section padding-tb shape-3">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="header-title">
          <h2>Visi Misi</h2>
        </div>
      </div>
      <div class="col-12">
        <div class="faith-content">
          <div class="tab-content" id="pills-tabContent">

            <div class="tab-pane fade show active" id="shahadah" role="tabpanel" aria-labelledby="sahadah-tab">
              <div class="lab-item faith-item tri-shape-1 pattern-2">
                <div class="lab-inner d-flex align-items-center">
                  <div class="lab-thumb">
                    <img src="assets/img/visi.png" style="width: 300px;" alt="faith-image">
                  </div>
                  <div class="lab-content">
                    <h4>Visi</h4>
                    <p><?php foreach ($views_visi as $data) {
                          $num_char = 200;
                          $text = trim($data['deskripsi']);
                          $text = preg_replace('#</?strong.*?>#is', '', $text);
                          $lentext = strlen($text);
                          if ($lentext > $num_char) {
                            echo substr($text, 0, $num_char) . '...';
                          } else if ($lentext <= $num_char) {
                            echo substr($text, 0, $num_char);
                          }
                        } ?></p>
                  </div>
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="prayer" role="tabpanel" aria-labelledby="salah-tab">
              <div class="lab-item faith-item tri-shape-1 pattern-2">
                <div class="lab-inner d-flex align-items-center">
                  <div class="lab-thumb">
                    <img src="assets/img/misi.png" style="width: 300px;" alt="faith-image">
                  </div>
                  <div class="lab-content">
                    <h4>Misi</h4>
                    <p><?php foreach ($views_misi as $data) {
                          $num_char = 200;
                          $text = trim($data['deskripsi']);
                          $text = preg_replace('#</?strong.*?>#is', '', $text);
                          $lentext = strlen($text);
                          if ($lentext > $num_char) {
                            echo substr($text, 0, $num_char) . '...';
                          } else if ($lentext <= $num_char) {
                            echo substr($text, 0, $num_char);
                          }
                        } ?></p>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <ul class="nav nav-pills mb-3 align-items-center justify-content-center" id="pills-tab" role="tablist">

            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="sahadah-tab" data-bs-toggle="pill" href="#shahadah" role="tab" aria-controls="sahadah-tab" aria-selected="true">
                <img src="assets/img/visi.png" alt="faith-icon">
              </a>
            </li>

            <li class="nav-item" role="presentation">
              <a class="nav-link" id="salah-tab" data-bs-toggle="pill" href="#prayer" role="tab" aria-controls="salah-tab" aria-selected="false">
                <img src="assets/img/misi.png" alt="faith-icon">
              </a>
            </li>

          </ul>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Faith section end here -->

<!-- Service section start here -->
<?php if (mysqli_num_rows($views_berita) > 0) {
  $count = 0; ?>
  <section class="service-section padding-tb padding-b shape-2">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="header-title">
            <h2>Berita</h2>
          </div>
        </div>
        <div class="col-12">
          <div class="row g-0 justify-content-center service-wrapper">
            <?php while ($data = mysqli_fetch_assoc($views_berita)) {
              if ($count < 3) { ?>
                <div class="col-lg-4 col-md-6 col-12 p-3">
                  <div class="lab-item service-item">
                    <div class="lab-inner">
                      <div class="lab-content pattern-2">
                        <div class="lab-content-wrapper">
                          <div class="content-top">
                            <div class="service-top-thumb"><img src="assets/img/newspaper.png" style="width: 50px;" alt="service-icon"></div>
                            <div class="service-top-content">
                              <h5><a href="berita?read=<?= strtolower(str_replace(" ", "_", $data['nama_berita'])); ?>"><?= $data['nama_berita'] ?></a></h5>
                            </div>
                          </div>
                          <div class="content-bottom">
                            <p><?php $num_char = 75;
                                $text = trim($data['deskripsi']);
                                $text = preg_replace('#</?strong.*?>#is', '', $text);
                                $lentext = strlen($text);
                                if ($lentext > $num_char) {
                                  echo substr($text, 0, $num_char) . '...';
                                } else if ($lentext <= $num_char) {
                                  echo substr($text, 0, $num_char);
                                } ?></p>
                            <a href="berita?read=<?= strtolower(str_replace(" ", "_", $data['nama_berita'])); ?>" class="text-btn">Baca Lebih +</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            <?php
                $count++;
              } else {
                break;
              }
            } ?>
          </div>
          <div class="row justify-content-center text-center">
            <div class="col">
              <a href="berita" class="lab-btn mt-4 text-center">Lihat Lainnya</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php } ?>
<!-- Service section end here -->

<?php require_once("templates/bottom.php"); ?>