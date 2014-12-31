<?php
/**
 * 解析android apk文件
 * 
 * @author zhoushen extrembravo@gmail.com
 * @since  2014/2/14
 */
require dirname(__FILE__) . '/lib/DecodeManifest.php';

class ApkParser implements ParserAppInterface{

	const XML_FILE = 'AndroidManifest.xml';
	protected $decode = null;

	public function __construct(){
		$this->decode = new DecodeManifest;
	}
	
	public function parse($apkFile, $xmlFile=self::XML_FILE){
		$zipObj = new ZipArchive;
		if($zipObj->open($apkFile) !== true){
			throw new ParseException("unable to open {$apkFile} file!");
		}
		$xml = $zipObj->getFromName($xmlFile);
		if($xml === false){
			throw new ParseException("unable to find {$xmlFile} file!");
		}
		$zipObj->close();
		return $this->decode->parseString($xml);
	}

	//获取包名
	public function getPackage(){ 
		return $this->decode->getAttribute('manifest', 'package');
	}
	//获取版本
	public function getVersion(){
	    return $this->decode->getAttribute('manifest', 'android:versionName');
	}
	//获取应用名称
	public function getAppName(){
		return $this->decode->getAttribute('manifest/application', 'android:name');
	}

	//获取解析后的xml文件
	public function getMainXml($node=NULL, $lv=-1){
		return $this->decode->getXML($node, $lv);
	}

}