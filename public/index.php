<?php
use CodeIgniter\Boot;
use Config\Paths;
define('FCPATH',__DIR__.DIRECTORY_SEPARATOR);
chdir(FCPATH);
$pathsPath=realpath(FCPATH.'../app/Config/Paths.php');
require $pathsPath ?: FCPATH.'../app/Config/Paths.php';
$paths=new Paths();
require $paths->systemDirectory.'/Boot.php';
exit(Boot::bootWeb($paths));
