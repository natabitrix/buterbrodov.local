<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
// kintArr($arResult["PROPERTIES"]["INGREDIENTS"]);
$date = $arResult['PROPERTIES']['DATE']['VALUE'] ? $arResult['PROPERTIES']['DATE']['VALUE'] : ($arResult['ACTIVE_FROM'] ? $arResult['ACTIVE_FROM'] : false);
$img_source = $arResult["DETAIL_PICTURE"] ? $arResult["DETAIL_PICTURE"] : $arResult['PROPERTIES']['IMAGE']['VALUE'];
$img = CFile::ResizeImageGet($img_source, array("width" => 1440, "height" => 615),BX_RESIZE_IMAGE_PROPORTIONAL);
$text = $arResult["DETAIL_TEXT"] ? $arResult["DETAIL_TEXT"] : $arResult["PREVIEW_TEXT"];
?>

<?if($img):?>
<?$this->SetViewTarget('image');?>
	<img src="<?=$img['src']?>" alt="<?=$arResult["NAME"]?>">
<?$this->EndViewTarget();?>
<?endif?>

<?$this->SetViewTarget('detail_text');?>
	<?if($date):?>
	<div class="news-detail__content-date">
		<?=FormatDate('j F, Y', strtotime($date))?>
	</div>
	<?endif?>
	<h1><?=$arResult["NAME"]?></h1>
	<?=$text?>
<?$this->EndViewTarget();?>






