<?php
namespace Config;
use CodeIgniter\Config\BaseConfig;
use CodeIgniter\Validation\StrictRules\{Rules,FormatRules,FileRules,CreditCardRules};
class Validation extends BaseConfig {
 public array $ruleSets=[Rules::class,FormatRules::class,FileRules::class,CreditCardRules::class];
 public array $templates=['list'=>'CodeIgniter\\Validation\\Views\\list','single'=>'CodeIgniter\\Validation\\Views\\single'];
}
