<?php require_once("controller/script.php");
require_once("templates/top.php");
require_once("sections/navbar.php");
?>

<!-- Page Header Section Start Here -->
<section class="page-header bg_img padding-tb">
  <div class="overlay"></div>
  <div class="container">
    <div class="page-header-content-area">
      <h4 class="ph-title">Sejarah PKH</h4>
      <ul class="lab-ul">
        <li><a href="./">Home</a></li>
        <li><a class="active">Sejarah</a></li>
      </ul>
    </div>
  </div>
</section>
<!-- Page Header Section Ending Here -->

<!-- About section start here -->
<!-- <style>
  .lab-thumb {
    position: fixed;
    top: 50%;
    right: 5%;
    transform: translateY(-50%);
  }

  .img-grp {
    position: relative;
    overflow: hidden;
  }

  .about-fg-img img {
    width: 100%;
    height: auto;
  }
</style> -->
<section class="about-section padding-tb shape-1" id="about">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-6 col-12">
        <div class="lab-item">
          <div class="lab-inner">
            <div class="lab-content">
              <div class="header-title text-start m-0 mb-4">
                <h5>Sejarah</h5>
                <h2 class="mb-0">Program Keluarga Harapan</h2>
              </div>
              <?php foreach ($views_sejarah as $data) {
                echo $data['deskripsi'];
              } ?>
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

<?php require_once("templates/bottom.php"); ?>