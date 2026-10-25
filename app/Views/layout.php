<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>
<?= esc($title??'Dashboard') ?> · Klinik Sehat</title>
<link rel="stylesheet" href="<?= base_url('assets/css/app.css') ?>">
</head>
<body>
<div class="app-shell">
<aside class="sidebar" id="sidebar">
<a class="brand-lockup" href="<?= site_url('dashboard') ?>">
<span class="brand-mark">✚</span>
<span>
<strong>KLINIK SEHAT</strong>
<small>Sistem Informasi Klinik</small>
</span>
</a>
<nav class="side-nav">
<a class="nav-link <?= ($activeMenu??'')==='dashboard'?'active':'' ?>" href="<?= site_url('dashboard') ?>">⌂ Dashboard</a>
<div class="nav-heading">MASTER DATA</div>
<a class="nav-link <?= ($activeMenu??'')==='pasien'?'active':'' ?>" href="<?= site_url('data/pasien') ?>">♙ Data Pasien</a>
<a class="nav-link <?= ($activeMenu??'')==='dokter'?'active':'' ?>" href="<?= site_url('data/dokter') ?>">✚ Data Dokter</a>
<a class="nav-link <?= ($activeMenu??'')==='poli'?'active':'' ?>" href="<?= site_url('data/poli') ?>">▦ Data Poli</a>
<div class="nav-heading">TRANSAKSI</div>
<a class="nav-link <?= ($activeMenu??'')==='berobat'?'active':'' ?>" href="<?= site_url('data/berobat') ?>">▤ Data Berobat</a>
<div class="nav-heading">LAPORAN</div>
<?php foreach([['pasien','Laporan Data Pasien'],['dokter','Laporan Dokter per Poli'],['poli','Laporan Data Poli'],['berobat','Laporan Berobat'],['biaya','Rekap Biaya']] as [$t,$label]): ?>
<a class="nav-link <?= ($activeMenu??'')==='laporan-'.$t?'active':'' ?>" href="<?= site_url('reports/'.$t) ?>">▧ <?= esc($label) ?>
</a>
<?php endforeach ?>
</nav>
<div class="sidebar-bottom">
<div class="security-note">
<span class="security-dot">
</span>
<div>
<strong>Sesi aman</strong>
<small>Aplikasi administrasi</small>
</div>
</div>
<a class="nav-link" href="<?= site_url('logout') ?>">↪ Keluar</a>
</div>
</aside>
<div class="main-area">
<header class="topbar">
<button class="mobile-menu" data-sidebar-toggle type="button">☰</button>
<div class="breadcrumb">Sistem Informasi Klinik <span>/</span>
<strong>
<?= esc($title??'Dashboard') ?>
</strong>
</div>
<div class="user-menu">
<span class="user-avatar">
<?= esc(strtoupper(substr(session()->get('user')['name']??'A',0,1))) ?>
</span>
<span>
<strong>
<?= esc(session()->get('user')['name']??'Admin') ?>
</strong>
<small>
<?= esc(session()->get('user')['role']??'admin') ?>
</small>
</span>
<a class="logout-mini" href="<?= site_url('logout') ?>">Keluar</a>
</div>
</header>
<main class="page-content">
<?php foreach(['success'=>'success','error'=>'danger','warning'=>'warning'] as $k=>$v): if($m=session()->getFlashdata($k)): ?>
<div class="alert alert-<?= esc($v) ?>">
<?= esc($m) ?>
</div>
<?php endif; endforeach ?>
<?= $this->renderSection('content') ?>
</main>
<footer class="app-footer">
<span>© <?= date('Y') ?> Klinik Sehat</span>
<span>CodeIgniter 4 · Administrasi Klinik</span>
</footer>
</div>
</div>
<script src="<?= base_url('assets/js/app.js') ?>">
</script>
</body>
</html>
