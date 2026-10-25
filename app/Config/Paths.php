<?php
namespace Config;
class Paths {
 public string $systemDirectory;
 public string $appDirectory;
 public string $writableDirectory;
 public string $testsDirectory;
 public string $viewDirectory;
 public function __construct() {
  $this->systemDirectory = realpath(__DIR__.'/../../vendor/codeigniter4/framework/system') ?: __DIR__.'/../../vendor/codeigniter4/framework/system';
  $this->appDirectory = realpath(__DIR__.'/..') ?: __DIR__.'/..';
  $this->writableDirectory = realpath(__DIR__.'/../../writable') ?: __DIR__.'/../../writable';
  $this->testsDirectory = realpath(__DIR__.'/../../tests') ?: __DIR__.'/../../tests';
  $this->viewDirectory = $this->appDirectory.'/Views';
 }
}
