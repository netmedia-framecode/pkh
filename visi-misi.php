<?php require_once("controller/script.php");
require_once("templates/top.php");
require_once("sections/navbar.php");
?>

<!-- Page Header Section Start Here -->
<section class="page-header bg_img padding-tb">
  <div class="overlay"></div>
  <div class="container">
    <div class="page-header-content-area">
      <h4 class="ph-title">Visi Misi</h4>
      <ul class="lab-ul">
        <li><a href="./">Home</a></li>
        <li><a class="active">Visi Misi</a></li>
      </ul>
    </div>
  </div>
</section>
<!-- Page Header Section Ending Here -->

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
                    <?php foreach ($views_visi as $data) {
                      echo $data['deskripsi'];
                    } ?>
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
                    <?php foreach ($views_misi as $data) {
                      echo $data['deskripsi'];
                    } ?>
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

<?php require_once("templates/bottom.php"); ?>