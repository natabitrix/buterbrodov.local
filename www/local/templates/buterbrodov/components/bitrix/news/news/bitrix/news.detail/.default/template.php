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
?>


<?$this->SetViewTarget('top_content');?>
<div class="recepie-detail__top-img">
	<?$img = CFile::ResizeImageGet($arResult["DETAIL_PICTURE"],array("width" => 1440, "height" => 615),BX_RESIZE_IMAGE_PROPORTIONAL)?>
	<img src="<?=$img['src']?>" alt="<?=$arResult["NAME"]?>">
</div>
<div class="recepie-detail__top-text">
	<div class="container">
		<h1><?=$arResult["NAME"]?></h1>
		<?if($arResult["PROPERTIES"]["TIME"]["VALUE"]):?>
		<div class="time">
			<?=$arResult["PROPERTIES"]["TIME"]["VALUE"]?>
		</div>
		<?endif?>
	</div>
</div>
<?$this->EndViewTarget();?>


<?$this->SetViewTarget('ingredients');?>
<?if($arResult["PROPERTIES"]["INGREDIENTS"]["VALUE"]):?>
<div class="recepie-detail__ingredients-name">Ингредиенты</div>
<dl class="recepie-detail__ingredients-list row">
<?foreach($arResult["PROPERTIES"]["INGREDIENTS"]["VALUE"] as $key => $value):?>
	<dt class="col-6"><?=$value?></dt><dd class="col-6"><?=$arResult["PROPERTIES"]["INGREDIENTS"]["DESCRIPTION"][$key]?></dd>
<?endforeach?>
</dl>
<?endif?>
<?$this->EndViewTarget();?>

<?$this->SetViewTarget('detail_text');?>
<?=$arResult["DETAIL_TEXT"]?>
<?$this->EndViewTarget();?>






