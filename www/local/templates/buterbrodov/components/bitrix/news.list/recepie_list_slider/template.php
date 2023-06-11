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

<div class="recepie_slider__swiper-navigation swiper-navigation">
	<div class="swiper-button-prev btn btn-simple"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/icons/arrow-left.svg" alt="prev"></div>
	<div class="swiper-button-next btn btn-simple"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/icons/arrow-right.svg" alt="next"></div>
</div>


<div class="recepie_slider recepie-list swiper">
	<div class="swiper-wrapper">
	<?foreach($arResult["ITEMS"] as $arItem):?>
		<?
		$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

		$date = $arItem['ACTIVE_FROM'] ? $arItem['ACTIVE_FROM'] : false;

		$img = $arItem['PROPERTIES']['IMAGE']['VALUE'] ? CFile::ResizeImageGet($arItem['PROPERTIES']['IMAGE']['VALUE'],array("width" => 404, "height" => 489),BX_RESIZE_IMAGE_EXACT) : false;

		//printArr($arItem);
		?>

		<div class="recepie-list-item swiper-slide" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<div class="recepie-list-item__wrapper">
				<div class="recepie-list-item__inner">
					<div class="recepie-list-item__img-block">
						<?if($img):?>
						<img src="<?=$img['src']?>" alt="<?=$arItem['NAME']?>" class="img-fluid" loading="lazy">
						<div class="swiper-lazy-preloader swiper-lazy-preloader-black"></div>
						<?endif?>
					</div>
					<a class="recepie-list-item__text-block" href="<?=$arItem['DETAIL_PAGE_URL']?>">
						<h3 class="h3">
							<?=$arItem['NAME']?>
						</h3>
						<?if($arItem['PROPERTIES']['TIME']['VALUE']):?>
						<div class="time">
							<?=$arItem['PROPERTIES']['TIME']['VALUE']?>
						</div>
						<?endif?>
					</a>
				</div>
			</div>
		</div>

	<?endforeach;?>
	</div>
</div>

<div class="animations__decor d-none d-lg-block">
	<div class="animations__decor-cow animations__decor-left animate-in-view">
		<div class="animations__cow1-2"><?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH."/include/animations/cow1.svg", Array(), Array("SHOW_BORDER"=>false));?></div>
	</div>
</div>

<div class="animations__decor">
	<div class="animations__decor-cow animations__decor-right">
		<div class="animations__cow2 animations__cow_stand"><?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH."/include/animations/cow2.svg", Array(), Array("SHOW_BORDER"=>false));?></div>
	</div>
</div>

<div class="show_all">
	<a href="/recepie/" class="btn">Смотреть все</a>
</div>