<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div class="page-heading">
<div>
<p class="eyebrow">MASTER DATA / TRANSAKSI</p>
<h1>
<?= esc($config['title']) ?>
</h1>
<p class="muted">Kelola, cari, ubah, lihat detail, atau hapus record.</p>
</div>
<a class="btn btn-primary" href="<?= site_url('data/'.$resource.'/baru') ?>">＋ Tambah <?= esc($config['singular']) ?>
</a>
</div>
<div class="panel list-panel">
<div class="list-toolbar">
<div class="result-summary">
<strong>
<?= count($rows) ?>
</strong> data ditemukan</div>
<form method="get" class="search-form" action="<?= site_url('data/'.$resource) ?>">
<span class="search-symbol">⌕</span>
<input type="search" name="q" value="<?= esc($q) ?>" placeholder="Cari ID, nama, kata kunci...">
<button class="btn btn-secondary">Cari</button>
<?php if($q!==''): ?>
<a class="btn btn-ghost" href="<?= site_url('data/'.$resource) ?>">Reset</a>
<?php endif ?>
</form>
</div>
<div class="table-wrap">
<table class="data-table">
<thead>
<tr>
<?php foreach($config['columns'] as $c): ?>
<th>
<?= esc($c[1]) ?>
</th>
<?php endforeach ?>
<th>Aksi</th>
</tr>
</thead>
<tbody>
<?php if(empty($rows)): ?>
<tr>
<td colspan="<?= count($config['columns'])+1 ?>" class="empty-state">Data tidak ditemukan.</td>
</tr>
<?php else: foreach($rows as $row): ?>
<tr>
<?php foreach($config['columns'] as $c): $v=$row[$c[0]]??''; ?>
<td>
<?php if(($c[2]??'')==='currency'): ?>
<span class="currency">
<?= esc('Rp '.number_format((float)$v,0,',','.')) ?>
</span>
<?php elseif(in_array($c[0],['pasien_id','dokter_id','poli_id','no_transaksi'],true)): ?>
<span class="mono">
<?= esc($v) ?>
</span>
<?php else: ?>
<?= esc($v) ?>
<?php endif ?>
</td>
<?php endforeach ?>
<td class="row-actions">
<a class="table-action" href="<?= site_url('data/'.$resource.'/'.rawurlencode((string)$row[$config['pk']])) ?>">Lihat</a>
<a class="table-action edit" href="<?= site_url('data/'.$resource.'/'.rawurlencode((string)$row[$config['pk']]).'/edit') ?>">Edit</a>
<form method="post" data-confirm="Hapus data ini?" action="<?= site_url('data/'.$resource.'/'.rawurlencode((string)$row[$config['pk']]).'/hapus') ?>">
<?= csrf_field() ?>
<button class="table-action danger-link">Hapus</button>
</form>
</td>
</tr>
<?php endforeach; endif ?>
</tbody>
</table>
</div>
<div class="list-footer">Menampilkan <?= count($rows) ?> data <span>Record relasi dilindungi database.</span>
</div>
</div>
<?= $this->endSection() ?>
