<?php
/**
 * 解析Ipa plist文件
 * 
 * @author zhoushen extrembravo@gmail.com
 * @since  2014/2/14
 */
require dirname(__FILE__) . '/CFPropertyList/CFPropertyList.php';

class IpaParser{

	const INFO_PLIST = 'Info.plist';

	public function parse($ipaFile, $infoFile=self::INFO_PLIST){
		$zipObj = new ZipArchive;
		if($zipObj->open($ipaFile) !== true){
			throw new PListException("unable to open {$ipaFile} file!");
		}
		//scan plist file
		$plistFile = null;
	    for ($i=0; $i < $zipObj->numFiles; $i++) {
	    	$name = $zipObj->getNameIndex($i);
	    	if(preg_match('/Payload\/(.+)?\.app\/' . preg_quote($infoFile) . '$/i', $name)){
	    		$plistFile = $name;
	    		break;
	    	}			
	    }	    
	    //parse plist file
	    if(!$plistFile){
	    	throw new PListException("unable to parse plist file！");
	    }

	    //deal in memory
	    $plistHandle = fopen('php://memory', 'wb');
	    fwrite( $plistHandle, $zipObj->getFromName($plistFile) );
	    rewind($plistHandle);
	    $zipObj->close();
	    $plist = new CFPropertyList($plistHandle, CFPropertyList::FORMAT_AUTO);
	    $this->plistContent = $plist->toArray();

	    return true;
	}

	//获取包名
	public function getPackage(){
		return $this->plistContent['CFBundleIdentifier'];
	}
	//获取版本
	public function getVersion(){
		return $this->plistContent['CFBundleVersion'];
	}
	//获取应用名称
	public function getAppName(){
		return $this->plistContent['CFBundleDisplayName'];
	}
	//获取解析后的plist文件
	public function getPlist(){
		return $this->plistContent;
	}
}
