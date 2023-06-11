<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
//printArr($arResult);

$theme_color = $arResult["SECTION"]["UF_THEME_COLOR"] ? " theme-".$arResult["SECTION"]["UF_THEME_COLOR"] : "";
$APPLICATION->AddViewContent("pageClasses", "catalog-page catalog-section-page".$theme_color);