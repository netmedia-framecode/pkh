<?php if (!isset($_SESSION[""])) {
  session_start();
}
error_reporting(~E_NOTICE & ~E_DEPRECATED);
require_once("db_connect.php");
require_once(__DIR__ . "/../models/sql.php");
require_once("functions.php");

$messageTypes = ["success", "info", "warning", "danger", "dark"];

$baseURL = "http://$_SERVER[HTTP_HOST]/apps/tugas/pkh/";
$name_website = "PKH";

$select_auth = "SELECT * FROM auth";
$views_auth = mysqli_query($conn, $select_auth);
$select_sejarah = "SELECT * FROM sejarah";
$views_sejarah = mysqli_query($conn, $select_sejarah);
$select_visi = "SELECT * FROM visi";
$views_visi = mysqli_query($conn, $select_visi);
$select_misi = "SELECT * FROM misi";
$views_misi = mysqli_query($conn, $select_misi);
$select_berita = "SELECT * FROM berita ORDER BY id_berita ASC";
$views_berita = mysqli_query($conn, $select_berita);

if (!isset($_SESSION["project_pkh"]["users"])) {
  if (isset($_SESSION["project_pkh"]["time_message"]) && (time() - $_SESSION["project_pkh"]["time_message"]) > 2) {
    foreach ($messageTypes as $type) {
      if (isset($_SESSION["project_pkh"]["message_$type"])) {
        unset($_SESSION["project_pkh"]["message_$type"]);
      }
    }
    unset($_SESSION["project_pkh"]["time_message"]);
  }
  if (isset($_POST["register"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (register($conn, $validated_post, $action = 'insert') > 0) {
      header("Location: verification?en=" . $_SESSION['data_auth']['en_user']);
      exit();
    }
  }
  if (isset($_POST["re_verifikasi"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (re_verifikasi($conn, $validated_post, $action = 'update') > 0) {
      $message = "Kode token yang baru telah dikirim ke email anda.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: verification?en=" . $_SESSION['data_auth']['en_user']);
      exit();
    }
  }
  if (isset($_POST["verifikasi"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (verifikasi($conn, $validated_post, $action = 'update') > 0) {
      $message = "Akun anda berhasil di verifikasi.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: ./");
      exit();
    }
  }
  if (isset($_POST["forgot_password"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (forgot_password($conn, $validated_post, $action = 'update', $baseURL) > 0) {
      $message = "Kami telah mengirim link ke email anda untuk melakukan reset kata sandi.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: ./");
      exit();
    }
  }
  if (isset($_POST["new_password"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (new_password($conn, $validated_post, $action = 'update') > 0) {
      $message = "Kata sandi anda telah berhasil diubah.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: ./");
      exit();
    }
  }
  if (isset($_POST["login"])) {
    if (login($conn, $_POST) > 0) {
      header("Location: ../views/");
      exit();
    }
  }
}

if (isset($_SESSION["project_pkh"]["users"])) {
  $id_user = valid($conn, $_SESSION["project_pkh"]["users"]["id"]);
  $id_role = valid($conn, $_SESSION["project_pkh"]["users"]["id_role"]);
  $role = valid($conn, $_SESSION["project_pkh"]["users"]["role"]);
  $email = valid($conn, $_SESSION["project_pkh"]["users"]["email"]);
  $name = valid($conn, $_SESSION["project_pkh"]["users"]["name"]);
  if (isset($_SESSION["project_pkh"]["users"]["time_message"]) && (time() - $_SESSION["project_pkh"]["users"]["time_message"]) > 2) {
    foreach ($messageTypes as $type) {
      if (isset($_SESSION["project_pkh"]["users"]["message_$type"])) {
        unset($_SESSION["project_pkh"]["users"]["message_$type"]);
      }
    }
    unset($_SESSION["project_pkh"]["users"]["time_message"]);
  }
  $select_profile = "SELECT users.*, user_role.role, user_status.status 
                      FROM users
                      JOIN user_role ON users.id_role=user_role.id_role 
                      JOIN user_status ON users.id_active=user_status.id_status 
                      WHERE users.id_user='$id_user'
                    ";
  $view_profile = mysqli_query($conn, $select_profile);
  if (isset($_POST["edit_profil"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (profil($conn, $validated_post, $action = 'update', $id_user) > 0) {
      $message = "Profil Anda berhasil diubah.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: profil");
      exit();
    }
  }
  if (isset($_POST["setting"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (setting($conn, $validated_post, $action = 'update') > 0) {
      $message = "Setting pada system login berhasil diubah.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: setting");
      exit();
    }
  }

  $select_users = "SELECT users.*, user_role.role, user_status.status 
                    FROM users
                    JOIN user_role ON users.id_role=user_role.id_role 
                    JOIN user_status ON users.id_active=user_status.id_status
                  ";
  $views_users = mysqli_query($conn, $select_users);
  $select_user_role = "SELECT * FROM user_role";
  $views_user_role = mysqli_query($conn, $select_user_role);
  if (isset($_POST["edit_users"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (users($conn, $validated_post, $action = 'update') > 0) {
      $message = "data users berhasil diubah.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: users");
      exit();
    }
  }
  if (isset($_POST["add_role"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (role($conn, $validated_post, $action = 'insert') > 0) {
      $message = "Role baru berhasil ditambahkan.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: role");
      exit();
    }
  }
  if (isset($_POST["edit_role"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (role($conn, $validated_post, $action = 'update') > 0) {
      $message = "Role " . $_POST['roleOld'] . " berhasil diubah.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: role");
      exit();
    }
  }
  if (isset($_POST["delete_role"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (role($conn, $validated_post, $action = 'delete') > 0) {
      $message = "Role " . $_POST['role'] . " berhasil dihapus.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: role");
      exit();
    }
  }

  $select_menu = "SELECT * 
                    FROM user_menu 
                    ORDER BY menu ASC
                  ";
  $views_menu = mysqli_query($conn, $select_menu);
  if (isset($_POST["add_menu"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (menu($conn, $validated_post, $action = 'insert') > 0) {
      $message = "Menu baru berhasil ditambahkan.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: menu");
      exit();
    }
  }
  if (isset($_POST["edit_menu"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (menu($conn, $validated_post, $action = 'update') > 0) {
      $message = "Menu " . $_POST['menuOld'] . " berhasil diubah.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: menu");
      exit();
    }
  }
  if (isset($_POST["delete_menu"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (menu($conn, $validated_post, $action = 'delete') > 0) {
      $message = "Menu " . $_POST['menu'] . " berhasil dihapus.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: menu");
      exit();
    }
  }

  $select_sub_menu = "SELECT user_sub_menu.*, user_menu.menu, user_status.status 
                        FROM user_sub_menu 
                        JOIN user_menu ON user_sub_menu.id_menu=user_menu.id_menu 
                        JOIN user_status ON user_sub_menu.id_active=user_status.id_status 
                        ORDER BY user_sub_menu.title ASC
                      ";
  $views_sub_menu = mysqli_query($conn, $select_sub_menu);
  $select_user_status = "SELECT * 
                          FROM user_status
                        ";
  $views_user_status = mysqli_query($conn, $select_user_status);
  if (isset($_POST["add_sub_menu"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (sub_menu($conn, $validated_post, $action = 'insert', $baseURL) > 0) {
      $message = "Sub Menu baru berhasil ditambahkan.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: sub-menu");
      exit();
    }
  }
  if (isset($_POST["edit_sub_menu"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (sub_menu($conn, $validated_post, $action = 'update', $baseURL) > 0) {
      $message = "Sub Menu " . $_POST['titleOld'] . " berhasil diubah.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: sub-menu");
      exit();
    }
  }
  if (isset($_POST["delete_sub_menu"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (sub_menu($conn, $validated_post, $action = 'delete', $baseURL) > 0) {
      $message = "Sub Menu " . $_POST['title'] . " berhasil dihapus.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: sub-menu");
      exit();
    }
  }

  $select_user_access_menu = "SELECT user_access_menu.*, user_role.role, user_menu.menu
                                FROM user_access_menu 
                                JOIN user_role ON user_access_menu.id_role=.user_role.id_role 
                                JOIN user_menu ON user_access_menu.id_menu=user_menu.id_menu
                              ";
  $views_user_access_menu = mysqli_query($conn, $select_user_access_menu);
  $select_menu_check = "SELECT user_menu.* 
                    FROM user_menu 
                    ORDER BY user_menu.menu ASC
                  ";
  $views_menu_check = mysqli_query($conn, $select_menu_check);
  if (isset($_POST["add_menu_access"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (menu_access($conn, $validated_post, $action = 'insert') > 0) {
      $message = "Akses ke menu berhasil ditambahkan.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: menu-access");
      exit();
    }
  }
  if (isset($_POST["edit_menu_access"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (menu_access($conn, $validated_post, $action = 'update') > 0) {
      $message = "Akses menu " . $_POST['menu'] . " berhasil diubah.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: menu-access");
      exit();
    }
  }
  if (isset($_POST["delete_menu_access"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (menu_access($conn, $validated_post, $action = 'delete') > 0) {
      $message = "Akses menu " . $_POST['menu'] . " berhasil dihapus.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: menu-access");
      exit();
    }
  }

  $select_user_access_sub_menu = "SELECT user_access_sub_menu.*, user_role.role, user_sub_menu.title
                                FROM user_access_sub_menu 
                                JOIN user_role ON user_access_sub_menu.id_role=.user_role.id_role 
                                JOIN user_sub_menu ON user_access_sub_menu.id_sub_menu=user_sub_menu.id_sub_menu
                              ";
  $views_user_access_sub_menu = mysqli_query($conn, $select_user_access_sub_menu);
  $select_sub_menu_check = "SELECT user_sub_menu.*, user_menu.menu
                              FROM user_sub_menu 
                              JOIN user_menu ON user_sub_menu.id_menu=user_menu.id_menu
                              ORDER BY user_sub_menu.title ASC
                            ";
  $views_sub_menu_check = mysqli_query($conn, $select_sub_menu_check);
  if (isset($_POST["add_sub_menu_access"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (sub_menu_access($conn, $validated_post, $action = 'insert') > 0) {
      $message = "Akses ke sub menu berhasil ditambahkan.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: sub-menu-access");
      exit();
    }
  }
  if (isset($_POST["edit_sub_menu_access"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (sub_menu_access($conn, $validated_post, $action = 'update') > 0) {
      $message = "Akses sub menu " . $_POST['title'] . " berhasil diubah.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: sub-menu-access");
      exit();
    }
  }
  if (isset($_POST["delete_sub_menu_access"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (sub_menu_access($conn, $validated_post, $action = 'delete') > 0) {
      $message = "Akses sub menu " . $_POST['title'] . " berhasil dihapus.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: sub-menu-access");
      exit();
    }
  }

  $select_bantuan = "SELECT * 
                    FROM bantuan 
                    ORDER BY id_bantuan ASC
                  ";
  $views_bantuan = mysqli_query($conn, $select_bantuan);
  $counts_bantuan = mysqli_num_rows($views_bantuan);
  if (isset($_POST["add_bantuan"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (bantuan($conn, $validated_post, $action = 'insert') > 0) {
      $message = "Bantuan baru berhasil ditambahkan.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: bantuan");
      exit();
    }
  }
  if (isset($_POST["edit_bantuan"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (bantuan($conn, $validated_post, $action = 'update') > 0) {
      $message = "Bantuan " . $_POST['nama_bantuanOld'] . " berhasil diubah.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: bantuan");
      exit();
    }
  }
  if (isset($_POST["delete_bantuan"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (bantuan($conn, $validated_post, $action = 'delete') > 0) {
      $message = "Bantuan " . $_POST['nama_bantuan'] . " berhasil dihapus.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: bantuan");
      exit();
    }
  }

  $select_pendamping = "SELECT * 
                    FROM pendamping 
                    ORDER BY id_pendamping ASC
                  ";
  $views_pendamping = mysqli_query($conn, $select_pendamping);
  $counts_pendamping = mysqli_num_rows($views_pendamping);
  if (isset($_POST["add_pendamping"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (pendamping($conn, $validated_post, $action = 'insert') > 0) {
      $message = "Pendamping baru berhasil ditambahkan.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: pendamping");
      exit();
    }
  }
  if (isset($_POST["edit_pendamping"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (pendamping($conn, $validated_post, $action = 'update') > 0) {
      $message = "Pendamping " . $_POST['nama_pendampingOld'] . " berhasil diubah.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: pendamping");
      exit();
    }
  }
  if (isset($_POST["delete_pendamping"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (pendamping($conn, $validated_post, $action = 'delete') > 0) {
      $message = "Pendamping " . $_POST['pendamping'] . " berhasil dihapus.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: pendamping");
      exit();
    }
  }

  $select_warga = "SELECT warga.*, pendamping.kode_pendamping, pendamping.nama_pendamping, pendidikan.pendidikan
                    FROM warga 
                    JOIN pendamping ON warga.id_pendamping=pendamping.id_pendamping
                    JOIN pendidikan ON warga.id_pendidikan=pendidikan.id_pendidikan
                    ORDER BY warga.id_warga ASC
                  ";
  $views_warga = mysqli_query($conn, $select_warga);
  $counts_warga = mysqli_num_rows($views_warga);
  $select_pendidikan = "SELECT * 
                    FROM pendidikan 
                    ORDER BY id_pendidikan ASC
                  ";
  $views_pendidikan = mysqli_query($conn, $select_pendidikan);
  if (isset($_POST["add_warga"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (warga($conn, $validated_post, $action = 'insert') > 0) {
      $message = "warga baru berhasil ditambahkan.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: warga");
      exit();
    }
  }
  if (isset($_POST["edit_warga"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (warga($conn, $validated_post, $action = 'update') > 0) {
      $message = "warga " . $_POST['nama_wargaOld'] . " berhasil diubah.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: warga");
      exit();
    }
  }
  if (isset($_POST["delete_warga"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (warga($conn, $validated_post, $action = 'delete') > 0) {
      $message = "warga " . $_POST['warga'] . " berhasil dihapus.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: warga");
      exit();
    }
  }

  if (isset($_POST["add_berita"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (berita($conn, $validated_post, $action = 'insert', $deskripsi = $_POST['deskripsi']) > 0) {
      $message = "Berita baru berhasil ditambahkan.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: berita");
      exit();
    }
  }
  if (isset($_POST["edit_berita"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (berita($conn, $validated_post, $action = 'update', $deskripsi = $_POST['deskripsi']) > 0) {
      $message = "Berita " . $_POST['nama_beritaOld'] . " berhasil diubah.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: berita");
      exit();
    }
  }
  if (isset($_POST["delete_berita"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (berita($conn, $validated_post, $action = 'delete', $deskripsi = $_POST['deskripsi']) > 0) {
      $message = "Berita " . $_POST['nama_berita'] . " berhasil dihapus.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: berita");
      exit();
    }
  }

  if (isset($_POST["edit_visi"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (visi($conn, $validated_post, $action = 'update', $deskripsi = $_POST['deskripsi']) > 0) {
      $message = "Visi berhasil diubah.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: visi");
      exit();
    }
  }

  if (isset($_POST["edit_misi"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (misi($conn, $validated_post, $action = 'update', $deskripsi = $_POST['deskripsi']) > 0) {
      $message = "Misi berhasil diubah.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: misi");
      exit();
    }
  }

  if (isset($_POST["edit_sejarah"])) {
    $validated_post = array_map(function ($value) use ($conn) {
      return valid($conn, $value);
    }, $_POST);
    if (sejarah($conn, $validated_post, $action = 'update', $deskripsi = $_POST['deskripsi']) > 0) {
      $message = "Sejarah berhasil diubah.";
      $message_type = "success";
      alert($message, $message_type);
      header("Location: sejarah");
      exit();
    }
  }
}
