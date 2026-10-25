<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<?php $edit=$mode==='edit';
$id=$record[$config['pk']]??'';
$action=$edit?'data/'.$resource.'/'.rawurlencode((string)$id).'/update':'data/'.$resource.'/simpan'; ?>
<div class="page-heading">
<div>
<p class="eyebrow">
<a href="<?= site_url('data/'.$resource) ?>">
<?= esc($config['title']) ?>
</a> / FORM</p>
<h1>
<?= $edit?'Edit ':'Tambah ' ?>
<?= esc($config['singular']) ?>
</h1>
<p class="muted">Lengkapi field bertanda <b>*</b>.</p>
</div>
<a class="btn btn-secondary" href="<?= site_url('data/'.$resource) ?>">← Kembali</a>
</div>
<div class="form-layout">
<section class="panel form-panel">
<div class="panel-heading">
<div>
<h2>Informasi <?= esc($config['singular']) ?>
</h2>
<p>Periksa kembali data sebelum disimpan.</p>
</div>
</div>
<?php if(!empty($errors)): ?>
<div class="alert alert-danger">
<ul>
<?php foreach($errors as $e): ?>
<li>
<?= esc($e) ?>
</li>
<?php endforeach ?>
</ul>
</div>
<?php endif ?>
<?php if($m=session()->getFlashdata('error')): ?>
<div class="alert alert-danger">
<?= esc($m) ?>
</div>
<?php endif ?>
<form method="post" action="<?= site_url($action) ?>" class="record-form">
<?= csrf_field() ?>
<div class="form-grid">
<?php foreach($config['fields'] as $f): $n=$f[0];
$t=$f[2];
$v=old($n,$record[$n]??''); ?>
<div class="field <?= $t==='textarea'?'field-wide':'' ?>">
<label for="field-<?= esc($n) ?>">
<?= esc($f[1]) ?>
<?= $f[3]?' *':'' ?>
</label>
<?php if($t==='textarea'): ?>
<textarea id="field-<?= esc($n) ?>" name="<?= esc($n) ?>" rows="4" maxlength="<?= (int)($f[4]??1000) ?>" <?= $f[3]?'required':'' ?>>
<?= esc($v) ?>
</textarea>
<?php elseif($t==='select'): ?>
<select id="field-<?= esc($n) ?>" name="<?= esc($n) ?>" <?= $f[3]?'required':'' ?>>
<option value="">Pilih <?= esc(strtolower($f[1])) ?>
</option>
<?php foreach(($options[$n]??[]) as $ov=>$ol): ?>
<option value="<?= esc($ov) ?>" <?= (string)$v===(string)$ov?'selected':'' ?>>
<?= esc($ol) ?>
</option>
<?php endforeach ?>
</select>
<?php else: ?>
<input id="field-<?= esc($n) ?>" name="<?= esc($n) ?>" type="<?= $t==='readonly'?'text':esc($t) ?>" value="<?= esc($v) ?>" <?= $t==='readonly'?'readonly':'' ?>
<?= $t==='number'?'min="0" step="1000"':'' ?>
<?= $f[3]?'required':'' ?>>
</div>
<?php endif ?>
<?php if($t==='readonly'): ?>
<small class="field-hint">ID dibuat otomatis.</small>
<?php endif ?>
</div>
<?php endforeach ?>
</div>
<div class="form-actions">
<a class="btn btn-secondary" href="<?= site_url('data/'.$resource) ?>">Batal</a>
<button class="btn btn-ghost" type="reset">Reset</button>
<button class="btn btn-primary" type="submit">
<?= $edit?'Simpan Perubahan':'Simpan Data' ?> →</button>
</div>
</form>
</section>
<aside class="panel form-help">
<div class="help-icon">✦</div>
<h3>Petunjuk</h3>
<ul>
<li>Isi semua field wajib.</li>
<li>Pilih ID relasi dari dropdown.</li>
<li>Hapus data akan ditolak bila masih dipakai transaksi.</li>
</ul>
</aside>
</div>
<?= $this->endSection() ?>
