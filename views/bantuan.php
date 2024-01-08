<?php require_once("../controller/script.php");
$_SESSION["project_pkh"]["name_page"] = "Bantuan";
require_once("../templates/views_top.php"); ?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $_SESSION["project_pkh"]["name_page"] ?></h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambah"><i class="bi bi-plus-lg"></i> Tambah</a>
  </div>

  <div class="card shadow mb-4 border-0">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered text-dark" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th class="text-center">Jenis</th>
              <th class="text-center">Nama</th>
              <th class="text-center">Bulan</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th class="text-center">Jenis</th>
              <th class="text-center">Nama</th>
              <th class="text-center">Bulan</th>
              <th class="text-center">Aksi</th>
            </tr>
          </tfoot>
          <tbody>
            <?php foreach ($views_bantuan as $data) { ?>
              <tr>
                <td><?= $data['jenis_bantuan'] ?></td>
                <td><?= $data['nama_bantuan'] ?></td>
                <td><?php $dateTime = DateTime::createFromFormat('Y-m', $data['bulan_bantuan']);
                    echo $dateTime->format('F Y'); ?></td>
                <td class="text-center">
                  <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ubah<?= $data['id_bantuan'] ?>">
                    <i class="bi bi-pencil-square"></i> Ubah
                  </button>
                  <div class="modal fade" id="ubah<?= $data['id_bantuan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header border-bottom-0 shadow">
                          <h5 class="modal-title" id="exampleModalLabel">Ubah <?= $data['nama_bantuan'] ?></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="" method="post">
                          <input type="hidden" name="id_bantuan" value="<?= $data['id_bantuan'] ?>">
                          <input type="hidden" name="nama_bantuanOld" value="<?= $data['nama_bantuan'] ?>">
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="jenis_bantuan">Jenis</label>
                              <input type="text" name="jenis_bantuan" value="<?= $data['jenis_bantuan'] ?>" class="form-control" id="jenis_bantuan" minlength="3" required>
                            </div>
                            <div class="form-group">
                              <label for="nama_bantuan">Nama</label>
                              <input type="text" name="nama_bantuan" value="<?= $data['nama_bantuan'] ?>" class="form-control" id="nama_bantuan" minlength="3" required>
                            </div>
                            <div class="form-group">
                              <label for="bulan_bantuan">Bulan</label>
                              <input type="month" name="bulan_bantuan" value="<?= $data['bulan_bantuan'] ?>" class="form-control" id="bulan_bantuan" minlength="3" required>
                            </div>
                          </div>
                          <div class="modal-footer justify-content-center border-top-0">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                            <button type="submit" name="edit_bantuan" class="btn btn-warning btn-sm">Ubah</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?= $data['id_bantuan'] ?>">
                    <i class="bi bi-trash3"></i> Hapus
                  </button>
                  <div class="modal fade" id="hapus<?= $data['id_bantuan'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header border-bottom-0 shadow">
                          <h5 class="modal-title" id="exampleModalLabel">Hapus <?= $data['nama_bantuan'] ?></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="" method="post">
                          <input type="hidden" name="id_bantuan" value="<?= $data['id_bantuan'] ?>">
                          <input type="hidden" name="nama_bantuan" value="<?= $data['nama_bantuan'] ?>">
                          <div class="modal-body">
                            <p>Jika anda yakin ingin menghapus data ini, klik Hapus!</p>
                          </div>
                          <div class="modal-footer justify-content-center border-top-0">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                            <button type="submit" name="delete_bantuan" class="btn btn-danger btn-sm">hapus</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <div class="modal fade <?php if (isset($_GET['add']) == "true") {
                            echo "show";
                          } ?>" id="tambah" tabindex="-1" aria-labelledby="tambahLabel" <?php if (!isset($_GET['add']) == "true") {
                                                                                          echo 'aria-hidden="true"';
                                                                                        }
                                                                                        if (isset($_GET['add']) == "true") {
                                                                                          echo 'style="display: block;" aria-modal="true" role="dialog"';
                                                                                        } ?>">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header border-bottom-0 shadow">
          <h5 class="modal-title" id="tambahLabel">Tambah Bantuan</h5>
          <?php if (!isset($_GET['add']) == "true") { ?>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          <?php } ?>
        </div>
        <form action="" method="post">
          <div class="modal-body">
            <div class="form-group">
              <label for="jenis_bantuan">Jenis</label>
              <input type="text" name="jenis_bantuan" class="form-control" id="jenis_bantuan" minlength="3" required>
            </div>
            <div class="form-group">
              <label for="nama_bantuan">Nama</label>
              <input type="text" name="nama_bantuan" class="form-control" id="nama_bantuan" minlength="3" required>
            </div>
            <div class="form-group">
              <label for="bulan_bantuan">Bulan</label>
              <input type="month" name="bulan_bantuan" class="form-control" id="bulan_bantuan" minlength="3" required>
            </div>
          </div>
          <div class="modal-footer justify-content-center border-top-0">
            <?php if (isset($_GET['add']) == "true") { ?>
              <a href="bantuan" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</a>
            <?php } else { ?>
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
            <?php } ?>
            <button type="submit" name="add_bantuan" class="btn btn-primary btn-sm">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php require_once("../templates/views_bottom.php") ?>