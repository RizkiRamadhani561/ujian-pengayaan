<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div class="page-heading">
<div>
<p class="eyebrow">DETAIL DATA</p>
<h1>
<?= esc($config['singular']) ?>
</h1>
<p class="muted">Informasi record tersimpan.</p>
</div>
<div class="heading-actions">
<a class="btn btn-secondary" href="<?= site_url('data/'.$resource) ?>">← Kembali</a>
<a class="btn btn-primary" href="<?= site_url('data/'.$resource.'/'.rawurlencode((string)$row[$config['pk']]).'/edit') ?>">Edit Data</a>
</div>
</div>
<section class="panel detail-panel">
<dl class="detail-grid">
<?php foreach($config['fields'] as $f): ?>
<div>
<dt>
<?= esc($f[1]) ?>
</dt>
<dd>
<?= esc($row[$f[0]]??'—') ?>
</dd>
</div>
<?php endforeach ?>
<?php foreach(['nama_pasien'=>'Nama Pasien','nama_dokter'=>'Nama Dokter','nama_poli'=>'Nama Poli'] as $k=>$label): if(isset($row[$k])&&!in_array($k,array_column($config['fields'],0),true)): ?>
<div>
<dt>
<?= esc($label) ?>
</dt>
<dd>
<?= esc($row[$k]) ?>
</dd>
</div>
<?php endif; endforeach ?>
</dl>
</section>
<?= $this->endSection() ?>
