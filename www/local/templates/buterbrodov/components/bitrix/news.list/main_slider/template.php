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


<div class="main_slider swiper">
	<div class="decor d-none d-lg-block">
		<div class="main_slider__decor-left" data-hs="fade right" style="--hs-delay: 0ms; --hs-translate-ratio: 10; ">
			<img src="<?=SITE_TEMPLATE_PATH?>/assets/img/decor/leaf1.png" alt="">
		</div>
	</div>

	<div class="swiper-wrapper">

<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

	
	//$link = $arItem['DETAIL_PAGE_URL'];
	$link = $arItem["PROPERTIES"]["LINK"]["VALUE"];
	$speak = $arItem["PROPERTIES"]["SPEAK"]["VALUE"];

	
	$img_source = $arItem["PROPERTIES"]["IMAGE"]["VALUE"];
	//$img = $img_source ? CFile::ResizeImageGet($img_source,array("width" => 1440, "height" => 750),BX_RESIZE_IMAGE_EXACT) : false;

	$img_width = 1440;
	$img_height = 750;
	$tablet_img_width = 800;
	$mobile_img_width = 600;
	$alt = $arItem['NAME'];
	$class = 'w-100';
	$params = ' loading="lazy"';
	$picture = false;
	
	if($img_source)
	{
		$picture = Picture2($img_source, $img_width, $img_height, $tablet_img_width, $mobile_img_width, $alt, $class, $params);
	}
	//printArr($arItem);
	?>

	<div class="swiper-slide" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
		<div class="swiper-slide-inner">
	
			<div class="main_slider__img-block">
				<?if($picture):?>
					<?=$picture?>
					<div class="swiper-lazy-preloader swiper-lazy-preloader-black"></div>
				<?endif?>
			</div>

			<div class="main_slider__text-block">
				<div class="h2">
					<?=$arItem['NAME']?>
				</div>
				<?if($arItem['PREVIEW_TEXT']):?>
				<div class="text">
					<?=$arItem['PREVIEW_TEXT']?>
				</div>
				<?endif?>
				<?if($link):?>
				<div class="button">
					<a href="<?=$link?>" class="btn">Подробнее</a>
				</div>
				<?endif?>
			</div>
	
	
			<div class="animations__decor d-none d-lg-block">
				<?if($speak):?>
				<div class="animations__decor-speak animations__speak">
					<?=$speak?>
				</div>
				<?endif?>
			</div>
	
		</div>
	</div>

<?endforeach;?>

	</div>
	
	<div class="swiper-navigation">
		<div class="swiper-button-prev btn btn-simple"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/icons/arrow-left.svg" alt="prev"></div>
		<div class="swiper-button-next btn btn-simple"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/icons/arrow-right.svg" alt="next"></div>
	</div>
	
	<div class="animations__decor d-none d-lg-block">
		<div class="animations__decor-cow">
			<div class="animations__cow2 animations__cow_stand">
				<?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH."/include/animations/cow2.svg", Array(), Array("SHOW_BORDER"=>false));?>
			</div>
		</div>
	</div>

</div>


