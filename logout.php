<?php
session_start(); // Memulai atau melanjutkan sesi yang sudah ada

// Menghancurkan sesi sepenuhnya
session_destroy(); 

// Redirect ke halaman login atau halaman beranda setelah logout
header("Location: login");
exit();

