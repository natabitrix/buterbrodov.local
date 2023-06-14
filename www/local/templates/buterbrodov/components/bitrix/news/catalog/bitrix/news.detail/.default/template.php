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
//printArr($arResult["OFFERS"]);
?>

<div class="container">
	<div class="h1 d-md-none"><?=$arResult["NAME"]?></div>
	<div class="row">
		<div class="col-md-6 col-lg-6 catalog-detail__col-slider">

			<div style="--swiper-navigation-color: #4a2b2b; --swiper-pagination-color: #fff" class="swiper catalog-detail__slider">
				<div class="swiper-wrapper">
				<?foreach($arResult["OFFERS"] as $key => $arOffer):?>
					<div class="swiper-slide slide">
						<div class="slide__wrapper">
							<?$img = CFile::ResizeImageGet($arOffer['PROPERTY_IMAGE_VALUE'],array("width" => 500, "height" => 600),BX_RESIZE_IMAGE_PROPORTIONAL)?>
							<img src="<?=$img['src']?>" alt="<?=$arOffer["NAME"]?>">

							<?if($arOffer["PROPERTY_NEW_VALUE"]):?>
							<div class="icon icon-top">
								<img src="<?=SITE_TEMPLATE_PATH?>/assets/img/icons/catalog/new2.svg" alt="NEW">
							</div>
							<?endif?>

							<?if($arOffer["PROPERTY_GOST_VALUE"]):?>
							<div class="icon icon-bottom">
								<img src="<?=SITE_TEMPLATE_PATH?>/assets/img/icons/catalog/gost2.svg" alt="ГОСТ">
							</div>
							<?endif?>

							<div class="labels">
							<?if($arOffer["PROPERTY_PACKAGE_VALUE"]):?>
								<?=$arOffer["PROPERTY_PACKAGE_VALUE"]?>
							<?endif?>
							<?if($arOffer["PROPERTY_BARCODE_VALUE"]):?>
								<div>ID <?=$arOffer["PROPERTY_BARCODE_VALUE"]?></div>
							<?endif?>
							</div>

						</div>
					</div>
				<?endforeach?>
				</div>

				<div class="swiper-button-next"></div>
				<div class="swiper-button-prev"></div>
			</div>

			<div thumbsSlider="" class="swiper catalog-detail__slider-thumbs">
				<div class="swiper-wrapper">
				<?foreach($arResult["OFFERS"] as $key => $arOffer):?>
					<div class="swiper-slide slide">
						<div class="slide__wrapper">
							<?$img = CFile::ResizeImageGet($arOffer['PROPERTY_IMAGE_VALUE'],array("width" => 85, "height" => 85),BX_RESIZE_IMAGE_PROPORTIONAL)?>
							<div class="slide__img"><img src="<?=$img['src']?>" alt="<?=$arOffer["NAME"]?>"></div>
							<div class="slide__name">310 г</div>
						</div>
					</div>
				<?endforeach?>
				</div>
			</div>

		</div>

		<div class="col-md-6 col-lg-6 catalog-detail__col-text">
			<h1 class="d-none d-md-block"><?=$arResult["NAME"]?></h1>
			<?=$arResult["DETAIL_TEXT"]?>

			<div class="catalog-detail__props">

				<?if($arResult["PROPERTIES"]["SOSTAV"]["VALUE"]):?>
				<div class="catalog-detail__props-item">
					<div class="h4">Состав</div>
					<p><?=$arResult["PROPERTIES"]["SOSTAV"]["VALUE"]?></p>
				</div>
				<?endif?>

				<?if($arResult["PROPERTIES"]["EXPIRATION_DATE"]["VALUE"]):?>
				<div class="catalog-detail__props-item">
					<div class="h4">Срок годности</div>
					<p><?=$arResult["PROPERTIES"]["EXPIRATION_DATE"]["VALUE"]?></p>
				</div>
				<?endif?>

				<?if($arResult["PROPERTIES"]["BJU"]["VALUE"]):?>
				<div class="catalog-detail__props-item">
					<div class="h4">Пищевая ценность на 100 г (БЖУ)</div>
					<div class="catalog-detail__props-item--items">
						<div class="d-flex">

							<?if($arResult["PROPERTIES"]["BJU__BELKI"]["VALUE"]):?>
							<div class="catalog-detail__props-item--item">
								<div class="catalog-detail__props-item--item-name">Белки</div>
								<div class="catalog-detail__props-item--item-value"><?=$arResult["PROPERTIES"]["BJU__BELKI"]["VALUE"]?></div>
							</div>
							<?endif?>
							<?if($arResult["PROPERTIES"]["BJU__JYRY"]["VALUE"]):?>
							<div class="catalog-detail__props-item--item">
								<div class="catalog-detail__props-item--item-name">Жиры</div>
								<div class="catalog-detail__props-item--item-value"><?=$arResult["PROPERTIES"]["BJU__JYRY"]["VALUE"]?></div>
							</div>
							<?endif?>
							<?if($arResult["PROPERTIES"]["BJU__UGLEVODY"]["VALUE"]):?>
							<div class="catalog-detail__props-item--item">
								<div class="catalog-detail__props-item--item-name">Углеводы</div>
								<div class="catalog-detail__props-item--item-value"><?=$arResult["PROPERTIES"]["BJU__UGLEVODY"]["VALUE"]?></div>
							</div>
							<?endif?>

						</div>
					</div>
				</div>    
				<?endif?>

				<?if($arResult["PROPERTIES"]["ENERG_CENNOST"]["VALUE"]):?>
				<div class="catalog-detail__props-item">
					<div class="h4">Энергетическая ценность</div>
					<p><?=$arResult["PROPERTIES"]["ENERG_CENNOST"]["VALUE"]?></p>
				</div>  
				<?endif?>

				<?if($arResult["PROPERTIES"]["GDE_KUPIT"]["VALUE"]):?>
				<div class="catalog-detail__props-item">
					<div class="h4">Где купить?</div>
					<ul class="list-unstyled">
						<?foreach($arResult["PROPERTIES"]["GDE_KUPIT"]["VALUE"] as $key => $arSubProp):?>
							<?$arChild = $arSubProp["SUB_VALUES"];?>
							<li>
							<?if($arChild["GDE_KUPIT__LINK"]["VALUE"]):?><a href="<?=$arChild["GDE_KUPIT__LINK"]["VALUE"]?>" target="_blank"><?endif?>
								<?=$arChild["GDE_KUPIT__NAME"]["VALUE"]?>
							<?if($arChild["GDE_KUPIT__LINK"]["VALUE"]):?></a><?endif?>
							</li>
						<?endforeach?>
					</ul>
				</div>  
				<?endif?>

				<?if($arResult["PROPERTIES"]["NAGRADY"]["VALUE"]):?>
				<div class="catalog-detail__props-item">
					<div class="h4">Награды</div>
					<ul class="list-unstyled">
					<?foreach($arResult["PROPERTIES"]["NAGRADY"]["VALUE"] as $key => $arSubProp):?>
							<?$arChild = $arSubProp["SUB_VALUES"];?>
							<li>
							<?if($arChild["NAGRADY__LINK"]["VALUE"]):?><a href="<?=$arChild["NAGRADY__LINK"]["VALUE"]?>" target="_blank"><?endif?>
								<?=$arChild["NAGRADY__NAME"]["VALUE"]?>
							<?if($arChild["NAGRADY__LINK"]["VALUE"]):?></a><?endif?>
							</li>
						<?endforeach?>
					</ul>
				</div>   
				<?endif?>

			</div>

			<div class="catalog-detail__share-btn">
				<button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#feedbackFormModal">
					<img src="<?=SITE_TEMPLATE_PATH?>/assets/img/icons/message.svg" alt="message" class="icon">Поделиться впечатлением</a>
				</button>
			</div>
		</div>
		
	</div>
</div>







