<?
/** CATALOG.SECTION.LIST/section/ */
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$theme_color = $arResult["SECTION"]["UF_THEME_COLOR"] ? " theme-".$arResult["SECTION"]["UF_THEME_COLOR"] : "";
$APPLICATION->AddViewContent("pageClasses", "catalog-page catalog-section-page".$theme_color);

// $back_button_text = $arResult["SECTION"]["DEPTH_LEVEL"] > 1 ? "Назад" : "Все бренды";
// $APPLICATION->AddViewContent("back_button_text", $back_button_text);
