<?php

/**
 * Helpher untuk menampilkan identitas aplikasi
 *
 * @package CodeIgniter
 * @category Helpers
 * @author Ardi Tri Heru (arditriheruh@gmail.com)
 * @link https://github.com/arditriheru
 */

if (!function_exists('getTabTitle')) {
	function getTabTitle()
	{
		$getTopTitle = "SIMKA";
		return $getTopTitle;
	}
}

if (!function_exists('getCopyright')) {
	function getCopyright()
	{
		$getCopyright = "Copyright &#169; <script type='text/javascript'>var creditsyear = new Date();document.write(creditsyear.getFullYear());</script></b> <a expr:href='data:blog.homepageUrl'><data:blog.title/></a> <a href='https://arditriheru.github.io' target='blank'> Fakultas Hukum UII</a>";
		return $getCopyright;
	}
}

if (!function_exists('getVersion')) {
	function getVersion()
	{
		$getVersion = "<a style='color:grey' href='https://arditriheru.github.io' target='blank'>Dev : Ardi Tri Heru</a>";
		return $getVersion;
	}
}
