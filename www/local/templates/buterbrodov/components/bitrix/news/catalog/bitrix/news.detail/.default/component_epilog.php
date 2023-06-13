<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
// printArr($arResult);

$theme_color = $arResult["SECTION"]["CURRENT"]["UF_THEME_COLOR"] ? " theme-".$arResult["SECTION"]["CURRENT"]["UF_THEME_COLOR"] : "";
$APPLICATION->AddViewContent("pageClasses", "catalog-page catalog-detail-page".$theme_color);

// $APPLICATION->AddViewContent("back_button_text", "Назад");