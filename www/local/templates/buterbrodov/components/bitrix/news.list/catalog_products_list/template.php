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

<div class="product-list row">
	
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

	$date = $arItem['ACTIVE_FROM'] ? $arItem['ACTIVE_FROM'] : false;

	//printArr($arItem["PROPERTIES"]);
	//printArr($arItem["OFFERS"]);
	?>

	<div class="col-lg-6 col-xl-4 product-list__item" data-hs="fade up" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="product-list__item-wrapper">

			<div class="product-list__item-switcher">

				<div class="tab-content">
					<?//торговые предложения (result_modifier.php)?>
					<?foreach($arItem["OFFERS"] as $key => $arOffer):?>
					<div class="tab-pane fade<?if($key == 0):?> show active<?endif?>" id="img<?=$arItem['ID'].'-'.$arOffer['ID']?>" role="tabpanel">

						<?//Иконки NEW и ГОСТ; если обе установлены, меняются плавно анимацией?>
						<?$animate_icons_class = ($arOffer["PROPERTY_NEW_VALUE"] && $arOffer["PROPERTY_GOST_VALUE"]) ? " animate-fade" : ""?>
						<?if($arOffer["PROPERTY_NEW_VALUE"]):?>
						<div class="product-list__item-top-icon<?=$animate_icons_class?>">
							<img src="<?=SITE_TEMPLATE_PATH?>/assets/img/icons/catalog/new.svg" alt="NEW">
						</div>
						<?endif?>
						<?if($arOffer["PROPERTY_GOST_VALUE"]):?>
						<div class="product-list__item-top-icon<?=$animate_icons_class?>">
							<img src="<?=SITE_TEMPLATE_PATH?>/assets/img/icons/catalog/gost.svg" alt="ГОСТ">
						</div>
						<?endif?>

						<?//картинка?>
						<?if($arOffer["PROPERTY_IMAGE_VALUE"]):?>
						<?$img = CFile::ResizeImageGet($arOffer['PROPERTY_IMAGE_VALUE'],array("width" => 400, "height" => 400),BX_RESIZE_IMAGE_PROPORTIONAL)?>
						<div class="product-list__item-switcher-img">
							<img src="<?=$img['src']?>" alt="<?=$arOffer["NAME"]?>">
						</div>
						<?endif?>

					</div>
					<?endforeach?>
				</div>


				<ul class="nav nav-pills" role="tablist">
					<?//торговые предложения (result_modifier.php)?>
					<?foreach($arItem["OFFERS"] as $key => $arOffer):?>
					<li class="nav-item" role="presentation">
						<button class="nav-link<?if($key == 0):?> active<?endif?>" 
							data-bs-toggle="pill" 
							data-bs-target="#img<?=$arItem['ID'].'-'.$arOffer['ID']?>" 
							data-barcode="<?=$arOffer["PROPERTY_BARCODE_VALUE"]?>" 
							type="button" role="tab">
						<?=$arOffer["PROPERTY_WEIGHT_VALUE"]?>
					</button>
					</li>
					<?endforeach?>
				</ul>
			</div>

	
			<h3 class="product-list__item-name"><a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a></h3>

			<div class="product-list__item-code">ID <span><?=$arItem["OFFERS"][0]["PROPERTY_BARCODE_VALUE"]?></span></div>
			
			<div class="product-list__item-props">
				<?if($arItem['PROPERTIES']['EXPIRATION_DATE']['VALUE']):?>
				<div class="product-list__item-props-item">
					<div class="product-list__item-props-item-icon">
						<img src="<?=SITE_TEMPLATE_PATH?>/assets/img/icons/catalog/time.svg" alt="">
					</div>
					<div class="product-list__item-props-item-name">
						<?=$arItem['PROPERTIES']['EXPIRATION_DATE']['VALUE']?>
					</div>
				</div>
				<?endif?>
				<?if($arItem['PROPERTIES']['ENERG_CENNOST']['VALUE']):?>
				<div class="product-list__item-props-item">
					<div class="product-list__item-props-item-icon">
						<img src="<?=SITE_TEMPLATE_PATH?>/assets/img/icons/catalog/weight.svg" alt="">
					</div>
					<div class="product-list__item-props-item-name">
						<?=$arItem['PROPERTIES']['ENERG_CENNOST']['VALUE']?>
					</div>
				</div>
				<?endif?>
				<?if($arItem['PROPERTIES']['FAT']['VALUE']):?>
				<div class="product-list__item-props-item">
					<div class="product-list__item-props-item-icon">
						<img src="<?=SITE_TEMPLATE_PATH?>/assets/img/icons/catalog/fat.svg" alt="">
					</div>
					<div class="product-list__item-props-item-name">
						<?=$arItem['PROPERTIES']['FAT']['VALUE']?>%
					</div>
				</div>
				<?endif?>
			</div>
	
		</div>
	</div>

<?endforeach;?>
</div>

