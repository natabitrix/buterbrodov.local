<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
?>

<div class="row">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

	$date = $arItem['PROPERTIES']['DATE']['VALUE'] ? $arItem['PROPERTIES']['DATE']['VALUE'] : ($arItem['ACTIVE_FROM'] ? $arItem['ACTIVE_FROM'] : false);
	$img = $arItem['PROPERTIES']['IMAGE']['VALUE'] ? CFile::ResizeImageGet($arItem['PROPERTIES']['IMAGE']['VALUE'],array("width" => 402, "height" => 263),BX_RESIZE_IMAGE_EXACT) : false;
	//printArr($arItem);
	?>
	<div class="news-list-item <?=$arParams['COL_CLASS']?> col-md-6" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="news-list-item__inner">
			<div class="news-list-item__img-block">
			<?if($img):?>
				<img src="<?=$img['src']?>" alt="<?=$arItem['NAME']?>" class="img-fluid">
			<?endif?>
			</div>

			<div class="news-list-item__text-block">
				<?if($date):?>
				<div class="date">
				<?=FormatDate('j F, Y', strtotime($date))?>
				</div>
				<?endif?>
				
				<h3 class="h3"><a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a></h3>

				<div class="text">
				<?=$arItem['PREVIEW_TEXT']?>
				</div>
			</div>
		</div>
	</div>

	<?endforeach;?>
</div>

