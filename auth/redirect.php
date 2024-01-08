<?php
if (isset($_SESSION["project_pkh"]["users"])) {
  header("Location: ../views/");
  exit;
}
