<?php require_once("../controller/script.php");
$_SESSION["project_pkh"]["name_page"] = "Warga";
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
              <th class="text-center" rowspan="2">Pendamping</th>
              <th class="text-center" colspan="8">Biodata</th>
              <th class="text-center" colspan="5">Alamat</th>
              <th class="text-center" colspan="9">Kepemilikan</th>
              <th class="text-center" rowspan="2">Aksi</th>
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
              <th class="text-center" rowspan="2">Aksi</th>
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
                <td>
                  <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ubah<?= $data['id_warga'] ?>">
                    <i class="bi bi-pencil-square"></i> Ubah
                  </button>
                  <div class="modal fade" id="ubah<?= $data['id_warga'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header border-bottom-0 shadow">
                          <h5 class="modal-title" id="exampleModalLabel">Ubah <?= $data['nama'] ?></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="" method="post">
                          <input type="hidden" name="id_warga" value="<?= $data['id_warga'] ?>">
                          <input type="hidden" name="namaOld" value="<?= $data['nama'] ?>">
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="id_pendamping">Pendamping</label>
                              <select name="id_pendamping" class="form-control" id="id_pendamping" required>
                                <option value="" selected>Pilih Pendamping</option>
                                <?php $id_pendamping = $data['id_pendamping'];
                                foreach ($views_pendamping as $data_select_pendamping) {
                                  $selected = ($data_select_pendamping['id_pendamping'] == $id_pendamping) ? 'selected' : ''; ?>
                                  <option value="<?= $data_select_pendamping['id_pendamping'] ?>" <?= $selected ?>><?= $data_select_pendamping['nama_pendamping'] ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <hr>
                            <h5 class="text-dark">Biodata</h5>
                            <div class="form-group">
                              <label for="no_kk">No. Kartu Keluarga</label>
                              <input type="number" name="no_kk" value="<?= $data['no_kk'] ?>" class="form-control" id="no_kk" maxlength="16" required>
                            </div>
                            <div class="form-group">
                              <label for="nama">Nama</label>
                              <input type="text" name="nama" value="<?= $data['nama'] ?>" class="form-control" id="nama" required>
                            </div>
                            <div class="row">
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label for="tempat_lahir">Tempat Lahir</label>
                                  <input type="text" name="tempat_lahir" value="<?= $data['tempat_lahir'] ?>" class="form-control" id="tempat_lahir" required>
                                </div>
                              </div>
                              <div class="col-lg-6">
                                <div class="form-group">
                                  <label for="tgl_lahir">Tgl Lahir</label>
                                  <input type="date" name="tgl_lahir" value="<?= $data['tgl_lahir'] ?>" class="form-control" id="tgl_lahir" required>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label for="id_pendidikan">Pendidikan</label>
                              <select name="id_pendidikan" class="form-control" id="id_pendidikan" required>
                                <option value="" selected>Pilih Pendidikan</option>
                                <?php $id_pendidikan = $data['id_pendidikan'];
                                foreach ($views_pendidikan as $data_select_pendidikan) {
                                  $selected = ($data_select_pendidikan['id_pendidikan'] == $id_pendidikan) ? 'selected' : ''; ?>
                                  <option value="<?= $data_select_pendidikan['id_pendidikan'] ?>" <?= $selected ?>><?= $data_select_pendidikan['pendidikan'] ?></option>
                                <?php } ?>
                              </select>
                            </div>
                            <div class="form-group">
                              <label for="pekerjaan">Pekerjaan</label>
                              <input type="text" name="pekerjaan" value="<?= $data['pekerjaan'] ?>" class="form-control" id="pekerjaan" required>
                            </div>
                            <div class="form-group">
                              <label for="penghasilan">Penghasilan</label>
                              <input type="text" name="penghasilan" value="<?= $data['penghasilan'] ?>" class="form-control" id="penghasilan" required>
                            </div>
                            <div class="form-group">
                              <label for="no_hp">No. Handphone</label>
                              <input type="number" name="no_hp" value="<?= $data['no_hp'] ?>" class="form-control" id="no_hp" required>
                            </div>
                            <div class="form-group">
                              <label for="no_rek">No. Rekening</label>
                              <input type="number" name="no_rek" value="<?= $data['no_rek'] ?>" class="form-control" id="no_rek" required>
                            </div>
                            <hr>
                            <h5 class="text-dark">Alamat</h5>
                            <div class="form-group">
                              <label for="kd_pos">Kode Pos</label>
                              <input type="number" name="kd_pos" value="<?= $data['kd_pos'] ?>" class="form-control" id="kd_pos" required>
                            </div>
                            <div class="form-group">
                              <label for="desa_kel">Desa/Kelurahan</label>
                              <input type="text" name="desa_kel" value="<?= $data['desa_kel'] ?>" class="form-control" id="desa_kel" required>
                            </div>
                            <div class="form-group">
                              <label for="kec">Kecamatan</label>
                              <input type="text" name="kec" value="<?= $data['kec'] ?>" class="form-control" id="kec" required>
                            </div>
                            <div class="form-group">
                              <label for="kab_kota">Kabupaten/Kota</label>
                              <input type="text" name="kab_kota" value="<?= $data['kab_kota'] ?>" class="form-control" id="kab_kota" required>
                            </div>
                            <div class="form-group">
                              <label for="prov">Provinsi</label>
                              <input type="text" name="prov" value="<?= $data['prov'] ?>" class="form-control" id="prov" required>
                            </div>
                            <hr>
                            <h5 class="text-dark">Kepemilikan</h5>
                            <div class="form-group">
                              <label for="jumlah_anak">Jumlah Anak</label>
                              <input type="number" name="jumlah_anak" value="<?= $data['jumlah_anak'] ?>" class="form-control" id="jumlah_anak" required>
                            </div>
                            <div class="form-group">
                              <label for="jumlah_sd">Jumlah SD</label>
                              <input type="number" name="jumlah_sd" value="<?= $data['jumlah_sd'] ?>" class="form-control" id="jumlah_sd" required>
                            </div>
                            <div class="form-group">
                              <label for="jumlah_smp">Jumlah SMP</label>
                              <input type="number" name="jumlah_smp" value="<?= $data['jumlah_smp'] ?>" class="form-control" id="jumlah_smp" required>
                            </div>
                            <div class="form-group">
                              <label for="jumlah_sma">Jumlah SMA</label>
                              <input type="number" name="jumlah_sma" value="<?= $data['jumlah_sma'] ?>" class="form-control" id="jumlah_sma" required>
                            </div>
                            <div class="form-group">
                              <label for="jumlah_balita">Jumlah Balita</label>
                              <input type="number" name="jumlah_balita" value="<?= $data['jumlah_balita'] ?>" class="form-control" id="jumlah_balita" required>
                            </div>
                            <div class="form-group">
                              <label for="jumlah_bumil">Jumlah Ibu Hamil</label>
                              <input type="number" name="jumlah_bumil" value="<?= $data['jumlah_bumil'] ?>" class="form-control" id="jumlah_bumil" required>
                            </div>
                            <div class="form-group">
                              <label for="jumlah_lansia">Jumlah Lansia</label>
                              <input type="number" name="jumlah_lansia" value="<?= $data['jumlah_lansia'] ?>" class="form-control" id="jumlah_lansia" required>
                            </div>
                            <div class="form-group">
                              <label for="jumlah_disabilitas">Jumlah Disabilitas</label>
                              <input type="number" name="jumlah_disabilitas" value="<?= $data['jumlah_disabilitas'] ?>" class="form-control" id="jumlah_disabilitas" required>
                            </div>
                            <div class="form-group">
                              <label for="nama_desa">Nama Desa</label>
                              <input type="text" name="nama_desa" value="<?= $data['nama_desa'] ?>" class="form-control" id="nama_desa" required>
                            </div>
                          </div>
                          <div class="modal-footer justify-content-center border-top-0">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                            <button type="submit" name="edit_warga" class="btn btn-warning btn-sm">Ubah</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?= $data['id_warga'] ?>">
                    <i class="bi bi-trash3"></i> Hapus
                  </button>
                  <div class="modal fade" id="hapus<?= $data['id_warga'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header border-bottom-0 shadow">
                          <h5 class="modal-title" id="exampleModalLabel">Hapus <?= $data['nama'] ?></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="" method="post">
                          <input type="hidden" name="id_warga" value="<?= $data['id_warga'] ?>">
                          <input type="hidden" name="nama" value="<?= $data['nama'] ?>">
                          <div class="modal-body">
                            <p>Jika anda yakin ingin menghapus data ini, klik Hapus!</p>
                          </div>
                          <div class="modal-footer justify-content-center border-top-0">
                            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                            <button type="submit" name="delete_warga" class="btn btn-danger btn-sm">hapus</button>
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
          <h5 class="modal-title" id="tambahLabel">Tambah Warga</h5>
          <?php if (!isset($_GET['add']) == "true") { ?>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          <?php } ?>
        </div>
        <form action="" method="post">
          <div class="modal-body">
            <div class="form-group">
              <label for="id_pendamping">Pendamping</label>
              <select name="id_pendamping" class="form-control" id="id_pendamping" required>
                <option value="" selected>Pilih Pendamping</option>
                <?php foreach ($views_pendamping as $data_select_pendamping) { ?>
                  <option value="<?= $data_select_pendamping['id_pendamping'] ?>"><?= $data_select_pendamping['nama_pendamping'] ?></option>
                <?php } ?>
              </select>
            </div>
            <hr>
            <h5 class="text-dark">Biodata</h5>
            <div class="form-group">
              <label for="no_kk">No. Kartu Keluarga</label>
              <input type="number" name="no_kk" class="form-control" id="no_kk" maxlength="16" required>
            </div>
            <div class="form-group">
              <label for="nama">Nama</label>
              <input type="text" name="nama" class="form-control" id="nama" required>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="tempat_lahir">Tempat Lahir</label>
                  <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" required>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="form-group">
                  <label for="tgl_lahir">Tgl Lahir</label>
                  <input type="date" name="tgl_lahir" class="form-control" id="tgl_lahir" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="id_pendidikan">Pendidikan</label>
              <select name="id_pendidikan" class="form-control" id="id_pendidikan" required>
                <option value="" selected>Pilih Pendidikan</option>
                <?php foreach ($views_pendidikan as $data_select_pendidikan) { ?>
                  <option value="<?= $data_select_pendidikan['id_pendidikan'] ?>"><?= $data_select_pendidikan['pendidikan'] ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="pekerjaan">Pekerjaan</label>
              <input type="text" name="pekerjaan" class="form-control" id="pekerjaan" required>
            </div>
            <div class="form-group">
              <label for="penghasilan">Penghasilan</label>
              <input type="text" name="penghasilan" class="form-control" id="penghasilan" required>
            </div>
            <div class="form-group">
              <label for="no_hp">No. Handphone</label>
              <input type="number" name="no_hp" class="form-control" id="no_hp" required>
            </div>
            <div class="form-group">
              <label for="no_rek">No. Rekening</label>
              <input type="number" name="no_rek" class="form-control" id="no_rek" required>
            </div>
            <hr>
            <h5 class="text-dark">Alamat</h5>
            <div class="form-group">
              <label for="kd_pos">Kode Pos</label>
              <input type="number" name="kd_pos" class="form-control" id="kd_pos" required>
            </div>
            <div class="form-group">
              <label for="desa_kel">Desa/Kelurahan</label>
              <input type="text" name="desa_kel" class="form-control" id="desa_kel" required>
            </div>
            <div class="form-group">
              <label for="kec">Kecamatan</label>
              <input type="text" name="kec" class="form-control" id="kec" required>
            </div>
            <div class="form-group">
              <label for="kab_kota">Kabupaten/Kota</label>
              <input type="text" name="kab_kota" class="form-control" id="kab_kota" required>
            </div>
            <div class="form-group">
              <label for="prov">Provinsi</label>
              <input type="text" name="prov" class="form-control" id="prov" required>
            </div>
            <hr>
            <h5 class="text-dark">Kepemilikan</h5>
            <div class="form-group">
              <label for="jumlah_anak">Jumlah Anak</label>
              <input type="number" name="jumlah_anak" class="form-control" id="jumlah_anak" required>
            </div>
            <div class="form-group">
              <label for="jumlah_sd">Jumlah SD</label>
              <input type="number" name="jumlah_sd" class="form-control" id="jumlah_sd" required>
            </div>
            <div class="form-group">
              <label for="jumlah_smp">Jumlah SMP</label>
              <input type="number" name="jumlah_smp" class="form-control" id="jumlah_smp" required>
            </div>
            <div class="form-group">
              <label for="jumlah_sma">Jumlah SMA</label>
              <input type="number" name="jumlah_sma" class="form-control" id="jumlah_sma" required>
            </div>
            <div class="form-group">
              <label for="jumlah_balita">Jumlah Balita</label>
              <input type="number" name="jumlah_balita" class="form-control" id="jumlah_balita" required>
            </div>
            <div class="form-group">
              <label for="jumlah_bumil">Jumlah Ibu Hamil</label>
              <input type="number" name="jumlah_bumil" class="form-control" id="jumlah_bumil" required>
            </div>
            <div class="form-group">
              <label for="jumlah_lansia">Jumlah Lansia</label>
              <input type="number" name="jumlah_lansia" class="form-control" id="jumlah_lansia" required>
            </div>
            <div class="form-group">
              <label for="jumlah_disabilitas">Jumlah Disabilitas</label>
              <input type="number" name="jumlah_disabilitas" class="form-control" id="jumlah_disabilitas" required>
            </div>
            <div class="form-group">
              <label for="nama_desa">Nama Desa</label>
              <input type="text" name="nama_desa" class="form-control" id="nama_desa" required>
            </div>
          </div>
          <div class="modal-footer justify-content-center border-top-0">
            <?php if (isset($_GET['add']) == "true") { ?>
              <a href="warga" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</a>
            <?php } else { ?>
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
            <?php } ?>
            <button type="submit" name="add_warga" class="btn btn-primary btn-sm">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php require_once("../templates/views_bottom.php") ?>