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

<div class="news_slider__swiper-navigation swiper-navigation">
	<div class="swiper-button-prev btn btn-simple"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/icons/arrow-left.svg" alt="prev"></div>
	<div class="swiper-button-next btn btn-simple"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/icons/arrow-right.svg" alt="next"></div>
</div>

<div class="row">
	<div class="col-md-4 col-xl-3 order-1 order-md-0 col-decor">
		<div class="animations__cow3 animations__cow_stand3"><?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH."/include/animations/cow3.svg", Array(), Array("SHOW_BORDER"=>false));?></div>
	</div>
	<div class="col-md-8 col-xl-9 order-0 order-md-1 col-slider">
		<div class="news_slider news-list swiper">

			<div class="swiper-wrapper">
			<?foreach($arResult["ITEMS"] as $arItem):?>
				<?
				$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
				$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

				$date = $arItem['ACTIVE_FROM'] ? $arItem['ACTIVE_FROM'] : false;

				$img = $arItem['PROPERTIES']['IMAGE']['VALUE'] ? CFile::ResizeImageGet($arItem['PROPERTIES']['IMAGE']['VALUE'],array("width" => 402, "height" => 263),BX_RESIZE_IMAGE_EXACT) : false;

				//printArr($arItem);
				?>
					<div class="news-list-item swiper-slide" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
						<div class="news-list-item__wrapper">
							<div class="news-list-item__inner">

								<div class="news-list-item__img-block">
									<?if($img):?>
									<img src="<?=$img['src']?>" alt="<?=$arItem['NAME']?>" class="img-fluid" loading="lazy">
									<div class="swiper-lazy-preloader swiper-lazy-preloader-black"></div>
									<?endif?>
								</div>

								<div class="news-list-item__text-block">
									<div class="date">
										<?=FormatDate('j F, D', strtotime($date))?>
									</div>
									<h3 class="h3">
										<a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem['NAME']?></a>
									</h3>
									<div class="text">
										<?=$arItem['PREVIEW_TEXT']?>
									</div>
								</div>
					
							</div>
						</div>
					</div>
				<?endforeach;?>
			</div>

		</div>

	</div>
</div>

<div class="show_all">
	<a href="/news/" class="btn">Смотреть все</a>
</div>