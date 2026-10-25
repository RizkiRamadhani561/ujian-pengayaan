<?php
namespace Config;
use App\Filters\AuthFilter;
use CodeIgniter\Config\Filters as BaseFilters;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
class Filters extends BaseFilters {
 public array $aliases=['csrf'=>CSRF::class,'toolbar'=>DebugToolbar::class,'auth'=>AuthFilter::class];
 public array $globals=['before'=>['csrf'],'after'=>['toolbar']];
 public array $methods=[];
 public array $filters=[];
}
