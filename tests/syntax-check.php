<?php
$root=dirname(__DIR__);$it=new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root,FilesystemIterator::SKIP_DOTS));$bad=false;
foreach($it as $f){if(!$f->isFile()||$f->getExtension()!=='php'||str_contains($f->getPathname(),DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR))continue;$out=[];exec(escapeshellarg(PHP_BINARY).' -l '.escapeshellarg($f->getPathname()).' 2>&1',$out,$code);if($code!==0){$bad=true;fwrite(STDERR,implode(PHP_EOL,$out).PHP_EOL);}}
if($bad)exit(1);echo "All project PHP files passed syntax check.\n";
