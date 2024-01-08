<?php require_once("controller/script.php");
require_once("templates/top.php");
require_once("sections/navbar.php");
?>

<!-- Page Header Section Start Here -->
<section class="page-header bg_img padding-tb">
  <div class="overlay"></div>
  <div class="container">
    <div class="page-header-content-area">
      <h4 class="ph-title">Berita</h4>
      <ul class="lab-ul">
        <li><a href="./">Home</a></li>
        <li><a class="active">Berita</a></li>
      </ul>
    </div>
  </div>
</section>
<!-- Page Header Section Ending Here -->

<!-- Service section start here -->
<?php if (!isset($_GET['read'])) {
  if (mysqli_num_rows($views_berita) > 0) { ?>
    <section class="service-section padding-tb padding-b shape-2">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="header-title">
              <h2>Berita</h2>
            </div>
          </div>
          <div class="col-12">
            <div class="row g-0 justify-content-start service-wrapper">
              <?php while ($data = mysqli_fetch_assoc($views_berita)) { ?>
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
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php }
} else {
  $read = valid($conn, $_GET['read']);
  $nama_berita = ucwords(str_replace("_", " ", $read));
  $berita = "SELECT * FROM berita WHERE nama_berita='$nama_berita'";
  $views_berita_detail = mysqli_query($conn, $berita);
  $data = mysqli_fetch_assoc($views_berita_detail); ?>
  <div class="blog-section blog-page padding-tb">
    <div class="container">
      <div class="section-wrapper">
        <div class="row justify-content-center">
          <div class="col-lg-12 col-12">
            <article>
              <div class="post-item-2">
                <div class="post-inner">
                  <div class="post-content">
                    <h3><?= $data['nama_berita'] ?></h3>
                    <ul class="lab-ul post-date">
                      <li><span><i class="icofont-ui-calendar"></i> <?php $created_at = date_create($data["created_at"]);
                                                                    echo date_format($created_at, "l, d M Y h:i a"); ?>
                        </span></li>
                      <li><span><i class="icofont-user"></i><a href="#"><?= $data['author'] ?></a></span>
                      </li>
                    </ul>
                    <?= $data['deskripsi'] ?>

                    <div class="tags-area">
                      <ul class="share lab-ul justify-content-center">
                        <li>
                          <a href="javascript:void(0);" onclick="window.open('https://api.whatsapp.com/send?text=https://100166.tugasakhir.my.id/<?= strtolower(str_replace(" ", "_", $data['nama_berita'])); ?>', '_blank', 'width=600,height=600,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');" class="bg-success"><i class="fab fa-whatsapp"></i></a>
                        </li>
                        <li>
                          <a href="javascript:void(0);" onclick="window.open('https://twitter.com/share?url=https://100166.tugasakhir.my.id/<?= strtolower(str_replace(" ", "_", $data['nama_berita'])); ?>', '_blank', 'width=600,height=600,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');" class="twitter"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li>
                          <a href="javascript:void(0);" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=https://100166.tugasakhir.my.id/<?= strtolower(str_replace(" ", "_", $data['nama_berita'])); ?>', '_blank', 'width=600,height=600,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');" class="facebook"><i class="fab fa-facebook-f"></i></a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>

              <section class="service-section padding-tb padding-b">
                <div class="container">
                  <div class="row">
                    <div class="col-12">
                      <h4>Berita Lainnya</h4>
                      <hr>
                    </div>
                    <div class="col-12">
                      <div class="row g-0 justify-content-start service-wrapper">
                        <?php if (mysqli_num_rows($views_berita) > 0) {
                          while ($data = mysqli_fetch_assoc($views_berita)) { ?>
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
                        <?php }
                        } else {
                          echo "Belum ada berita";
                        } ?>
                      </div>
                    </div>
                  </div>
                </div>
              </section>

            </article>
          </div>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
<!-- Service section end here -->

<?php require_once("templates/bottom.php"); ?>