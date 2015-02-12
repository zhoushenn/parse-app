<?php

$main = new ApkParser;
$main->open('blabla.apk');
echo $main->getPackage();
echo $main->getVersionName();
echo $main->getVersionCode();
echo $main->getAppName();

$main = new IpaParser;
echo $main->parse('blabla.ipa');
echo $main->getPackage();
echo $main->getVersion();
echo $main->getAppName();
echo $main->getPlist();
