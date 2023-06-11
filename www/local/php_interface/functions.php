<?php


function printArr($array, $userID = 8098, $userGroup = 1)
{
	global $USER;
	$adminCondition = in_array($userGroup,$USER->GetUserGroupArray());
	if($userID != 8098)
	{
		$adminCondition = $USER->GetID() == $userID;
	}
	if($USER && $USER->IsAdmin() && $adminCondition) echo '<pre>' . print_r($array,1) . '</pre>';

}



AddEventHandler("main", "OnEpilog", "Redirect404");
function Redirect404() {
    if( 
     !defined('ADMIN_SECTION') &&  
     defined("ERROR_404") &&  
     defined("PATH_TO_404") &&  
     file_exists($_SERVER["DOCUMENT_ROOT"].PATH_TO_404) 
   ) {
        //LocalRedirect("/404.php", "404 Not Found");
        global $APPLICATION;
        $APPLICATION->RestartBuffer();
        CHTTP::SetStatus("404 Not Found");
		$APPLICATION->SetTitle("Страница не найдена");
		include($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/header.php");
        include($_SERVER["DOCUMENT_ROOT"].PATH_TO_404);
        include($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/footer.php");
    }
}

function myShowProperty($property_id, $default_value=false) 
{ 
    global $APPLICATION; 
    $APPLICATION->AddBufferContent(Array(&$APPLICATION, "GetProperty"), $property_id, $default_value); 
} 


function myTrim($str)
{
	return trim(str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), ' ', $str));
}


function cleanStr($str)
{
	$str  = strip_tags($str);
	$str  = str_replace('"', "", $str);
	$str  = str_replace("'", "", $str);
	$str  = myTrim($str);
	return $str;
}


function Picture($img_source, $img_width, $img_height, $alt, $class = "img-fluid", $exact = false, $return_img_only = false)  
{
	$resize = $exact ? BX_RESIZE_IMAGE_EXACT : BX_RESIZE_IMAGE_PROPORTIONAL;
	$img = CFile::ResizeImageGet($img_source,array("width" => $img_width, "height" => $img_height),$resize);
	$img_2x = CFile::ResizeImageGet($img_source,array("width" => $img_width*2, "height" => $img_height*2),$resize);
	$img_mobile = CFile::ResizeImageGet($img_source,array("width" => $img_width/2, "height" => $img_height/2),$resize);
	$src = $img["src"];
	$src_2x = $img_2x["src"];
	$src_mobile = $img_mobile["src"];

	$picture = '<picture>';
	$picture .= '<source srcset="'.$src_2x.' 2x">';
	$picture .= '<source srcset="'.$src.'" media="(min-width: 600px)">';
	$picture .= '<img src="'.$src_mobile.'" alt="'.$alt.'" title="'.$alt.'" class="'.$class.'">';
	$picture .= '</picture>';
	
	if($return_img_only)
		$picture = '<img src="'.$src.'" alt="'.$alt.'" title="'.$alt.'" class="'.$class.'">';

	return $picture;
}

function Picture2($img_source, $img_width, $img_height, $tablet_img_width, $mobile_img_width, $alt, $class = "img-fluid", $params)  
{
	$resize = BX_RESIZE_IMAGE_EXACT;
	$img = CFile::ResizeImageGet($img_source,array("width" => $img_width, "height" => $img_height),$resize);
	$img_2x = CFile::ResizeImageGet($img_source,array("width" => $img_width*2, "height" => $img_height*2),$resize);
	
	$img_tablet = CFile::ResizeImageGet($img_source,array("width" => $tablet_img_width, "height" => $img_height),$resize);
	$img_tablet_2x = CFile::ResizeImageGet($img_source,array("width" => $tablet_img_width*2, "height" => $img_height*2),$resize);
	
	$img_mobile = CFile::ResizeImageGet($img_source,array("width" => $mobile_img_width, "height" => $img_height),$resize);
	$img_mobile_2x = CFile::ResizeImageGet($img_source,array("width" => $mobile_img_width*2, "height" => $img_height*2),$resize);
	
	$src = $img["src"];
	$src_2x = $img_2x["src"];
	$src_tablet = $img_tablet["src"];
	$src_tablet_2x = $img_tablet_2x["src"];
	$src_mobile = $img_mobile["src"];
	$src_mobile_2x = $img_mobile_2x["src"];

	/*
	$picture = '<picture>';
	$picture .= '<source srcset="'.$src_mobile.', '.$src_mobile_2x.' 2x" media="(max-width: 800px)">';
	$picture .= '<source srcset="'.$src_tablet.', '.$src_tablet_2x.' 2x" media="(max-width: 1200px)">';
	$picture .= '<img src="'.$src.'" srcset="'.$src_2x.' 2x" alt="'.$alt.'" title="'.$alt.'" class="'.$class.'">';
	$picture .= '</picture>';
	*/

	$picture = '<picture>'."\n";
	$picture .= '<source srcset="'.$src_mobile.'" media="(max-width: 992px)">'."\n";
	$picture .= '<source srcset="'.$src_tablet.'" media="(max-width: 1200px)">'."\n";
	$picture .= '<img src="'.$src.'" alt="'.$alt.'" title="'.$alt.'" class="'.$class.'"'.$params.'>'."\n";
	$picture .= '</picture>';

	return $picture;
}