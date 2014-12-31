<?php
/**
 * 解析接口
 * @author zhoushen extrembravo@gmail.com
 * @since  2014/2/14
 */
interface ParserAppInterface{

	/**
	 * 解析包
	 * @param  应用包文件(apk or ipa file)
	 * @param  解析的目标名称(apk's androidmanifest.xml or ipa's info.plist)
	 * @return boolean true|false
	 */
	public function parse($package, $targetFile);
	//获取包名
	public function getPackage();
	//获取版本
	public function getVersion();
	//获取应用名称
	public function getAppName();
}
