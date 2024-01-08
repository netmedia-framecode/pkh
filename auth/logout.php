<?php if (!isset($_SESSION)) {
  session_start();
}
require_once("../controller/script.php");
if (isset($_SESSION["project_pkh"])) {
  unset($_SESSION["project_pkh"]);
  header("Location: ./");
  exit();
}
