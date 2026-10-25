<?php
namespace App\Database\Seeds;

        use CodeIgniter\Database\Seeder;

        class ClinicSeeder extends Seeder {
 public function run()
    {
  $n=date('Y-m-d H:i:s');

        if(!$this->db->table('users')->countAllResults())$this->db->table('users')->insert(['name'=>'Administrator Klinik','email'=>'admin@klinik.test','password'=>password_hash('Klinik123!',PASSWORD_DEFAULT),'role'=>'admin','is_active'=>1,'created_at'=>$n,'updated_at'=>$n]);

        if(!$this->db->table('poli')->countAllResults())$this->db->table('poli')->insertBatch([['poli_id'=>'POL001','nama_poli'=>'Gigi','created_at'=>$n,'updated_at'=>$n],['poli_id'=>'POL002','nama_poli'=>'Umum','created_at'=>$n,'updated_at'=>$n],['poli_id'=>'POL003','nama_poli'=>'THT','created_at'=>$n,'updated_at'=>$n],['poli_id'=>'POL004','nama_poli'=>'Anak','created_at'=>$n,'updated_at'=>$n],['poli_id'=>'POL005','nama_poli'=>'Kulit','created_at'=>$n,'updated_at'=>$n]]);

        if(!$this->db->table('pasien')->countAllResults())$this->db->table('pasien')->insertBatch([['pasien_id'=>'PS.001','nama_pasien'=>'Barata Yuda','tanggal_lahir'=>'1980-02-12','jenis_kelamin'=>'Laki-laki','alamat'=>'Jl. Melati No. 10','created_at'=>$n,'updated_at'=>$n],['pasien_id'=>'PS.005','nama_pasien'=>'Indah Susanti','tanggal_lahir'=>'2008-03-18','jenis_kelamin'=>'Perempuan','alamat'=>'Jl. Kenanga No. 5','created_at'=>$n,'updated_at'=>$n],['pasien_id'=>'PS.003','nama_pasien'=>'Kurniawan','tanggal_lahir'=>'1995-01-20','jenis_kelamin'=>'Laki-laki','alamat'=>'Jl. Mawar No. 8','created_at'=>$n,'updated_at'=>$n],['pasien_id'=>'PS.004','nama_pasien'=>'Rina Melati','tanggal_lahir'=>'2001-07-01','jenis_kelamin'=>'Perempuan','alamat'=>'Jl. Anggrek No. 12','created_at'=>$n,'updated_at'=>$n],['pasien_id'=>'PS.002','nama_pasien'=>'Dedi Kurniawan','tanggal_lahir'=>'1988-02-28','jenis_kelamin'=>'Laki-laki','alamat'=>'Jl. Cempaka No. 6','created_at'=>$n,'updated_at'=>$n]]);

        if(!$this->db->table('dokter')->countAllResults())$this->db->table('dokter')->insertBatch([['dokter_id'=>'DK001','nama_dokter'=>'dr. Erna','poli_id'=>'POL001','created_at'=>$n,'updated_at'=>$n],['dokter_id'=>'DK002','nama_dokter'=>'dr. Rudy','poli_id'=>'POL002','created_at'=>$n,'updated_at'=>$n],['dokter_id'=>'DK003','nama_dokter'=>'dr. Joko','poli_id'=>'POL003','created_at'=>$n,'updated_at'=>$n],['dokter_id'=>'DK004','nama_dokter'=>'dr. Sari','poli_id'=>'POL004','created_at'=>$n,'updated_at'=>$n],['dokter_id'=>'DK005','nama_dokter'=>'dr. Budi','poli_id'=>'POL005','created_at'=>$n,'updated_at'=>$n]]);

        if(!$this->db->table('berobat')->countAllResults())$this->db->table('berobat')->insertBatch([['no_transaksi'=>'TRX-0001','pasien_id'=>'PS.001','tanggal_berobat'=>date('Y-m-d'),'dokter_id'=>'DK001','keluhan'=>'Sakit Gigi','biaya_adm'=>125000,'created_at'=>$n,'updated_at'=>$n],['no_transaksi'=>'TRX-0002','pasien_id'=>'PS.005','tanggal_berobat'=>date('Y-m-d'),'dokter_id'=>'DK002','keluhan'=>'Demam','biaya_adm'=>75000,'created_at'=>$n,'updated_at'=>$n],['no_transaksi'=>'TRX-0003','pasien_id'=>'PS.003','tanggal_berobat'=>date('Y-m-d'),'dokter_id'=>'DK003','keluhan'=>'Pendarahan Telinga','biaya_adm'=>90000,'created_at'=>$n,'updated_at'=>$n]]);

        }
}
