<?php

include __DIR__."/IpaParser.php";
include __DIR__."/ApkParser.php";

#apk解析
$main = new ApkParser;
$main->open('blabla.apk');
echo $main->getPackage();
echo $main->getVersionName();
echo $main->getVersionCode();
echo $main->getAppName();

#ipa解析
$main = new IpaParser;
echo $main->parse('blabla.ipa');
echo $main->getPackage();
echo $main->getVersion();
echo $main->getAppName();
var_dump( $main->getPlist() );
