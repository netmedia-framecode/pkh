<?php require_once("../controller/script.php");
$_SESSION["project_pkh"]["name_page"] = "";
require_once("../templates/views_top.php"); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  </div>

  <!-- Content Row -->
  <div class="row">

    <div class="col-xl-4 col-md-6 mb-4">
      <a href="bantuan" class="text-decoration-none">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                  Bantuan</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $counts_bantuan ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-list fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
      <a href="pendamping" class="text-decoration-none">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                  Pendamping</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $counts_pendamping ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-list fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>

    <div class="col-xl-4 col-md-6 mb-4">
      <a href="warga" class="text-decoration-none">
        <div class="card border-left-primary shadow h-100 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                  Warga</div>
                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $counts_warga ?></div>
              </div>
              <div class="col-auto">
                <i class="fas fa-list fa-2x text-gray-300"></i>
              </div>
            </div>
          </div>
        </div>
      </a>
    </div>

  </div>

  <!-- Content Row -->
  <div class="row">

    <div class="col-lg-6">
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Bantuan</h6>
          <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
              <div class="dropdown-header">Action:</div>
              <a class="dropdown-item" href="bantuan?add=true">Tambah Data</a>
              <a class="dropdown-item" href="bantuan">Lihat Detail</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered text-dark" id="dataTable1" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th class="text-center">Jenis</th>
                  <th class="text-center">Nama</th>
                  <th class="text-center">Bulan</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th class="text-center">Jenis</th>
                  <th class="text-center">Nama</th>
                  <th class="text-center">Bulan</th>
                </tr>
              </tfoot>
              <tbody>
                <?php foreach ($views_bantuan as $data) { ?>
                  <tr>
                    <td><?= $data['jenis_bantuan'] ?></td>
                    <td><?= $data['nama_bantuan'] ?></td>
                    <td><?php $dateTime = DateTime::createFromFormat('Y-m', $data['bulan_bantuan']);
                        echo $dateTime->format('F Y'); ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="col-lg-6">
      <div class="card shadow">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Pendamping</h6>
          <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
              <div class="dropdown-header">Action:</div>
              <a class="dropdown-item" href="pendamping?add=true">Tambah Data</a>
              <a class="dropdown-item" href="pendamping">Lihat Detail</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered text-dark" id="dataTable2" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th class="text-center">Kode</th>
                  <th class="text-center">Nama</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th class="text-center">Kode</th>
                  <th class="text-center">Nama</th>
                </tr>
              </tfoot>
              <tbody>
                <?php foreach ($views_pendamping as $data) { ?>
                  <tr>
                    <td><?= $data['kode_pendamping'] ?></td>
                    <td><?= $data['nama_pendamping'] ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Content Row -->
  <div class="row">
    <div class="col-lg-12 mb-4">
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold text-primary">Warga</h6>
          <div class="dropdown no-arrow">
            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
              <div class="dropdown-header">Action:</div>
              <a class="dropdown-item" href="warga?add=true">Tambah Data</a>
              <a class="dropdown-item" href="warga">Lihat Detail</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered text-dark" id="dataTable3" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th class="text-center" rowspan="2">Pendamping</th>
                  <th class="text-center" colspan="8">Biodata</th>
                  <th class="text-center" colspan="5">Alamat</th>
                  <th class="text-center" colspan="9">Kepemilikan</th>
                </tr>
                <tr>
                  <th class="text-center">No. KK</th>
                  <th class="text-center">Nama</th>
                  <th class="text-center">TTL</th>
                  <th class="text-center">Pendidikan</th>
                  <th class="text-center">Pekerjaan</th>
                  <th class="text-center">Penghasilan</th>
                  <th class="text-center">No. Handphone</th>
                  <th class="text-center">No. Rekening</th>
                  <th class="text-center">Kode Pos</th>
                  <th class="text-center">Desa/Kelurahan</th>
                  <th class="text-center">Kecamatan</th>
                  <th class="text-center">Kabupaten/Kota</th>
                  <th class="text-center">Provinsi</th>
                  <th class="text-center">Jumlah Anak</th>
                  <th class="text-center">Jumlah SD</th>
                  <th class="text-center">Jumlah SMP</th>
                  <th class="text-center">Jumlah SMA</th>
                  <th class="text-center">Jumlah Balita</th>
                  <th class="text-center">Jumlah Ibu Hamil</th>
                  <th class="text-center">Jumlah Lansia</th>
                  <th class="text-center">Jumlah Disabilitas</th>
                  <th class="text-center">Nama Desa</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th class="text-center" rowspan="2">Pendamping</th>
                  <th class="text-center" colspan="8">Biodata</th>
                  <th class="text-center" colspan="5">Alamat</th>
                  <th class="text-center" colspan="9">Kepemilikan</th>
                </tr>
                <tr>
                  <th class="text-center">No. KK</th>
                  <th class="text-center">Nama</th>
                  <th class="text-center">TTL</th>
                  <th class="text-center">Pendidikan</th>
                  <th class="text-center">Pekerjaan</th>
                  <th class="text-center">Penghasilan</th>
                  <th class="text-center">No. Handphone</th>
                  <th class="text-center">No. Rekening</th>
                  <th class="text-center">Kode Pos</th>
                  <th class="text-center">Desa/Kelurahan</th>
                  <th class="text-center">Kecamatan</th>
                  <th class="text-center">Kabupaten/Kota</th>
                  <th class="text-center">Provinsi</th>
                  <th class="text-center">Jumlah Anak</th>
                  <th class="text-center">Jumlah SD</th>
                  <th class="text-center">Jumlah SMP</th>
                  <th class="text-center">Jumlah SMA</th>
                  <th class="text-center">Jumlah Balita</th>
                  <th class="text-center">Jumlah Ibu Hamil</th>
                  <th class="text-center">Jumlah Lansia</th>
                  <th class="text-center">Jumlah Disabilitas</th>
                  <th class="text-center">Nama Desa</th>
                </tr>
              </tfoot>
              <tbody>
                <?php foreach ($views_warga as $data) { ?>
                  <tr>
                    <td><?= $data['nama_pendamping'] ?></td>
                    <td><?= $data['no_kk'] ?></td>
                    <td><?= $data['nama'] ?></td>
                    <td><?= $data['tempat_lahir'] . ", " . $data['tgl_lahir'] ?></td>
                    <td><?= $data['pendidikan'] ?></td>
                    <td><?= $data['pekerjaan'] ?></td>
                    <td><?= $data['penghasilan'] ?></td>
                    <td><?= $data['no_hp'] ?></td>
                    <td><?= $data['no_rek'] ?></td>
                    <td><?= $data['kd_pos'] ?></td>
                    <td><?= $data['desa_kel'] ?></td>
                    <td><?= $data['kec'] ?></td>
                    <td><?= $data['kab_kota'] ?></td>
                    <td><?= $data['prov'] ?></td>
                    <td><?= $data['jumlah_anak'] ?></td>
                    <td><?= $data['jumlah_sd'] ?></td>
                    <td><?= $data['jumlah_smp'] ?></td>
                    <td><?= $data['jumlah_sma'] ?></td>
                    <td><?= $data['jumlah_balita'] ?></td>
                    <td><?= $data['jumlah_bumil'] ?></td>
                    <td><?= $data['jumlah_lansia'] ?></td>
                    <td><?= $data['jumlah_disabilitas'] ?></td>
                    <td><?= $data['nama_desa'] ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->

<?php require_once("../templates/views_bottom.php") ?>