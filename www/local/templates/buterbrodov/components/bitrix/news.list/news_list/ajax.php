<?php
define('STOP_STATISTICS', true);
define('PUBLIC_AJAX_MODE', true);
define('NOT_CHECK_PERMISSIONS', true);

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
use Bitrix\Main;

$context = Main\Application::getInstance()->getContext();
$request = $context->getRequest();

global $APPLICATION;

if (!isset($_POST['siteId']) || !is_string($_POST['siteId']))
	die();

if (!isset($_POST['templateName']) || !is_string($_POST['templateName']))
	die();

if ($_SERVER['REQUEST_METHOD'] != 'POST' ||
	preg_match('/^[A-Za-z0-9_]{2}$/', $_POST['siteId']) !== 1 ||
	preg_match('/^[.A-Za-z0-9_-]+$/', $_POST['templateName']) !== 1)
	die;

define('SITE_ID', $_POST['siteId']);
require_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php');
if (!check_bitrix_sessid())
	die;

$template = trim($_POST['templateName']);
$params = isset($_POST['arParams']) && is_array($_POST['arParams']) ? $_POST['arParams'] : [];
$params['AJAX'] = 'Y';

$params = array_diff_key(
	$params,
	[
		'SEF_MODE' => true,
		'SEF_FOLDER' => true,
		'SEF_URL_TEMPLATES' => true,
	],
);

$APPLICATION->RestartBuffer();
header('Content-Type: text/html; charset='.LANG_CHARSET);
$APPLICATION->IncludeComponent('bitrix:sale.basket.basket.line', $template, $params);









// //$template = $request->get('tpl');

// CModule::IncludeModule('iblock');
// $IBLOCK_ID = 8; //Афиша
// $arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "PROPERTY_DATE", "PROPERTY_AGE");
// $arFilter = Array("IBLOCK_ID"=>IntVal($IBLOCK_ID), "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "!=PROPERTY_DATE"=>false );
// $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
// $arIDs = array();
// $arAgeIDs = array();
// while($arRes = $res->GetNext())
// {
// 	if((strtotime($arRes["PROPERTY_DATE_VALUE"])+86400) >= time()) 
// 	{
// 		$arIDs[] = $arRes["ID"];
// 	}
// }
// $arIDs = array_unique($arIDs);
// global $arrFilter; 
// $arrFilter = array("ID" => $arIDs, "!=PROPERTY_DATE" => false); 

// $APPLICATION->IncludeComponent(
// 	"bitrix:news.list", 
// 	"afisha", 
// 	array(
// 		"COMPONENT_TEMPLATE" => "afisha",
// 		"IBLOCK_TYPE" => "-",
// 		"IBLOCK_ID" => "8",
// 		"NEWS_COUNT" => "8",//8
// 		"SORT_BY1" => "PROPERTY_DATE",
// 		"SORT_ORDER1" => "ASC",
// 		"SORT_BY2" => "ID",
// 		"SORT_ORDER2" => "DESC",
// 		"FILTER_NAME" => "arrFilter",
// 		"FIELD_CODE" => array(
// 			0 => "NAME",
// 			1 => "",
// 		),
// 		"PROPERTY_CODE" => array(
// 			0 => "DATE",
// 			1 => "PROFTICKET_CODE",
// 			2 => "TIME",
// 			3 => "",
// 		),
// 		"CHECK_DATES" => "Y",
// 		"DETAIL_URL" => "/repertuar/#ID#.html",
// 		"AJAX_MODE" => "N",
// 		"AJAX_OPTION_JUMP" => "N",
// 		"AJAX_OPTION_STYLE" => "N",
// 		"AJAX_OPTION_HISTORY" => "N",
// 		"AJAX_OPTION_ADDITIONAL" => "",
// 		"CACHE_TYPE" => "N",
// 		"CACHE_TIME" => "36000000",
// 		"CACHE_FILTER" => "N",
// 		"CACHE_GROUPS" => "N",
// 		"PREVIEW_TRUNCATE_LEN" => "",
// 		"ACTIVE_DATE_FORMAT" => "d.m.Y",
// 		"SET_TITLE" => "N",
// 		"SET_BROWSER_TITLE" => "N",
// 		"SET_META_KEYWORDS" => "N",
// 		"SET_META_DESCRIPTION" => "N",
// 		"SET_LAST_MODIFIED" => "N",
// 		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
// 		"ADD_SECTIONS_CHAIN" => "N",
// 		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
// 		"PARENT_SECTION" => "",
// 		"PARENT_SECTION_CODE" => "",
// 		"INCLUDE_SUBSECTIONS" => "N",
// 		"STRICT_SECTION_CHECK" => "N",
// 		"DISPLAY_DATE" => "Y",
// 		"DISPLAY_NAME" => "Y",
// 		"DISPLAY_PICTURE" => "Y",
// 		"DISPLAY_PREVIEW_TEXT" => "Y",
// 		"PAGER_TEMPLATE" => "afisha_show_more",
// 		"DISPLAY_TOP_PAGER" => "N",
// 		"DISPLAY_BOTTOM_PAGER" => "Y",
// 		"PAGER_TITLE" => "Новости",
// 		"PAGER_SHOW_ALWAYS" => "N",
// 		"PAGER_DESC_NUMBERING" => "N",
// 		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
// 		"PAGER_SHOW_ALL" => "N",
// 		"PAGER_BASE_LINK_ENABLE" => "N",
// 		"SET_STATUS_404" => "N",
// 		"SHOW_404" => "N",
// 		"MESSAGE_404" => "",
// 		"COMPOSITE_FRAME_MODE" => "A",
// 		"COMPOSITE_FRAME_TYPE" => "AUTO"
// 	),
// 	false
// );

