<?php
/*Переменные сайта*/
\Bitrix\Main\Loader::includeModule('iblock');
\Bitrix\Main\Loader::IncludeModule("highloadblock");

use Bitrix\Highloadblock as HL;
use Bitrix\Main\Entity;

$IblockID_site_variables = 7;
// global $APPLICATION;

$hlblock_site_variables = HL\HighloadBlockTable::getById($IblockID_site_variables)->fetch();
$entity_site_variables = HL\HighloadBlockTable::compileEntity($hlblock_site_variables);
$entity_data_class_site_variables = $entity_site_variables->getDataClass();
$rsData_site_variables = $entity_data_class_site_variables::getList(array(
	"select" => array("*")
));
while ($arData_site_variables = $rsData_site_variables->Fetch()) 
{
	//echo '<pre>' . print_r($arData_site_variables,1) . '</pre>';
	//if($arData_site_variables['UF_ACTIVE'])
	//{
	$GLOBALS['SITE_VARIABLES'][$arData_site_variables['UF_CODE']] = $arData_site_variables['UF_VALUE'];
	//}
}
//printArr($GLOBALS['SITE_VARIABLES']);


// $arSiteVariablesHL = $APPLICATION->IncludeComponent(
// 	"twoi.digital:hlblock.list",
// 	"",
// 	array(
// 		"COMPONENT_TEMPLATE" => "",
// 		"BLOCK_ID" => $IblockID_site_variables,
// 		"DETAIL_URL" => "",
// 		"PAGE_COUNT" => "999",
// 		"SORT_FIELD" => "UF_CODE",
// 		"SORT_ORDER" => "ASC",
// 		"CACHE_FILTER" => "N",
// 		"AJAX_MODE" => "N",
// 		"AJAX_OPTION_JUMP" => "N",
// 		"AJAX_OPTION_STYLE" => "N",
// 		"AJAX_OPTION_HISTORY" => "N",
// 		"AJAX_OPTION_ADDITIONAL" => "",
// 		"CACHE_TYPE" => "N",
// 		"CACHE_TIME" => "86400",
// 		"USER_PROPERTY" => array(
// 			0 => "UF_CODE",
// 			1 => "UF_VALUE",
// 		),
// 		"PAGER_TEMPLATE" => ".default",
// 		"DISPLAY_TOP_PAGER" => "N",
// 		"DISPLAY_BOTTOM_PAGER" => "N",
// 		"PAGER_SEF_MODE" => "N",
// 		"PAGER_SHOW_ALL" => "N",
// 		"FILTER_NAME" => "",
// 	),
// 	false
// );
// foreach ($arSiteVariablesHL['ITEMS'] as $key => $arItem) {
// 	$GLOBALS['SITE_VARIABLES'][$arItem['UF_CODE']] = $arItem['UF_VALUE'];
// }



/*Переводы из хайлоадблока
* выводим эл-ты ХБ
* и помещаем в языковой массив $MESS
*/
/*
$arTranslateHL = $APPLICATION->IncludeComponent(
	"twoi.digital:hlblock.list", 
	"", 
	array(
		"COMPONENT_TEMPLATE" => "",
		"BLOCK_ID" => "2",
		"DETAIL_URL" => "",
		"PAGE_COUNT" => "999",
		"SORT_FIELD" => "UF_CODE",
		"SORT_ORDER" => "ASC",
		"CACHE_FILTER" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "86400",
		"USER_PROPERTY" => array(
			0 => "UF_CODE",
			1 => "UF_RU",
			2 => "UF_KZ",
		),
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_SEF_MODE" => "N",
		"PAGER_SHOW_ALL" => "N",
		"FILTER_NAME" => "",
	),
	false
);

foreach($arTranslateHL['ITEMS'] as $key => $arItem)
{
	//echo '<pre>' . print_r($arItem,1) . '</pre>';
	$value = strlen(trim(str_replace("&nbsp;","",$arItem["~UF_".$LNG]))) > 0 ? $arItem["~UF_".$LNG] : $arItem["~UF_RU"];
	$MESS[trim($arItem["~UF_CODE"])] = trim(html_entity_decode($value));
	}
*/

/*Иконки из хайлоадблока
* выводим эл-ты ХБ
* и помещаем в массив $ARR_ICONS;
*/
/*
$arIconsHL = $APPLICATION->IncludeComponent(
	"twoi.digital:hlblock.list", 
	"", 
	array(
		"COMPONENT_TEMPLATE" => "",
		"BLOCK_ID" => "3",
		"DETAIL_URL" => "",
		"PAGE_COUNT" => "999",
		"SORT_FIELD" => "UF_CODE",
		"SORT_ORDER" => "ASC",
		"CACHE_FILTER" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "86400",
		"USER_PROPERTY" => array(
			0 => "UF_CODE",
			1 => "UF_ICON",
			2 => "UF_ICON_ACTIVE",
		),
		"PAGER_TEMPLATE" => ".default",
		"DISPLAY_TOP_PAGER" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"PAGER_SEF_MODE" => "N",
		"PAGER_SHOW_ALL" => "N",
		"FILTER_NAME" => "",
	),
	false
);

$ARR_ICONS = array();
foreach($arIconsHL['ITEMS'] as $key => $arItem)
{
	//echo '<pre>' . print_r($arItem,1) . '</pre>';
	$iconSrc = false;
	$iconActiveSrc = false;
	if($arItem['UF_ICON'])
	{
		if(preg_match('/<a href="(.+)" title="(.+)">(.+)<\/a>/', $arItem['UF_ICON'], $matches_icon))
		{
			$ARR_ICONS[trim($arItem['~UF_CODE'])] = array("ICON" => $matches_icon[1]);

			if($arItem['UF_ICON_ACTIVE'])
			{
				if(preg_match('/<a href="(.+)" title="(.+)">(.+)<\/a>/', $arItem['UF_ICON_ACTIVE'], $matches_icon_active))
				{
					$iconSrc = $matches[0];
					$ARR_ICONS[trim($arItem['~UF_CODE'])]["ICON_ACTIVE"] = $matches_icon_active[1];
				}
			}
		}
	}
}
$GLOBALS["ARR_ICONS"]  = $ARR_ICONS;
*/
