parse-app
=============

php解析android xml，ipa plist二进制文件，获取应用信息

## 使用示例
```php
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
```

##更新日志
2015/11/24 修复部分包解析bug

##contributor
loncool
[chg365](https://github.com/chg365)