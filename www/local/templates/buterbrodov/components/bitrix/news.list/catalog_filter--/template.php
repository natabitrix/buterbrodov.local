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
<div class="filter__items">
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	$icon = $arItem['PROPERTIES']['IMAGE']['VALUE'] ? CFile::ResizeImageGet($arItem['PROPERTIES']['IMAGE']['VALUE'],array("width" => 100, "height" => 100),BX_RESIZE_IMAGE_EXACT) : false;
	//printArr($arItem);
	?>
	<div class="filter__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<a href="<?=$APPLICATION->GetCurPageParam("type=".$arItem["CODE"], array("type"))?>#products">
		<?if($icon):?>
			<div class="filter__item-icon">
				<img src="<?=$icon['src']?>" alt="<?=$arItem['NAME']?>" title="<?=$arItem['NAME']?>">
			</div>
			<div class="filter__item-name">
				<?=$arItem['NAME']?>
			</div>
		<?endif?>
		</a>
	</div>

<?endforeach;?>
</ul>