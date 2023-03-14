<?php

use Config\Database;

require_once __DIR__ . "/Database.php";

$db = Database::getConnection();
echo "koneksi behasil";

$db = null;
