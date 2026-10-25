<?php
namespace Config;
use CodeIgniter\Database\Config;
class Database extends Config {
 public string $defaultGroup='default';
 public array $default=[
  'DSN'=>'','hostname'=>'localhost','username'=>'root','password'=>'','database'=>'klinik_sehat','DBDriver'=>'MySQLi','DBPrefix'=>'','pConnect'=>false,'DBDebug'=>true,'charset'=>'utf8mb4','DBCollat'=>'utf8mb4_unicode_ci','swapPre'=>'','encrypt'=>false,'compress'=>false,'strictOn'=>true,'failover'=>[],'port'=>3306,'numberNative'=>false,'foundRows'=>false,'dateFormat'=>['date'=>'Y-m-d','datetime'=>'Y-m-d H:i:s','time'=>'H:i:s']
 ];
 public function __construct() {
  parent::__construct();
  foreach(['hostname','username','password','database','DBDriver','charset','DBCollat'] as $key) $this->default[$key]=env('database.default.'.$key,$this->default[$key]);
  $this->default['port']=(int)env('database.default.port',$this->default['port']);
  $this->default['DBDebug']=filter_var(env('database.default.DBDebug',$this->default['DBDebug']),FILTER_VALIDATE_BOOLEAN);
 }
}
