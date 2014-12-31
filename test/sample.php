<?php
include dirname(__FILE__) . "/../ApkParser.php";
$main = new ApkParser;
var_dump($main->parse('blabla.apk'));
echo $main->getPackage();
echo $main->getVersion();
echo $main->getAppName();
echo $main->getMainXml();

include dirname(__FILE__) . "/../IpaParser.php";
$main = new IpaParser;
echo $main->parse('blabla.ipa');
echo $main->getPackage();
echo $main->getVersion();
echo $main->getAppName();
echo $main->getPlist();