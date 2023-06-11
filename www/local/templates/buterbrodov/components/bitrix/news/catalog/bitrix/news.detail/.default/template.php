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
printArr($arResult["OFFERS"]);
?>

<main class="main catalog-detail">
	<div class="container">
		<div class="h1 d-md-none"><?=$arResult["NAME"]?></div>
		<div class="row">
			<div class="col-md-6 col-lg-6 catalog-detail__col-slider">

				<div style="--swiper-navigation-color: #4a2b2b; --swiper-pagination-color: #fff" class="swiper catalog-detail__slider">
					<div class="swiper-wrapper">
					<?foreach($arResult["OFFERS"] as $key => $arOffer):?>
						<div class="swiper-slide slide">
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
								<?$img = CFile::ResizeImageGet($arOffer['PROPERTY_IMAGE_VALUE'],array("width" => 500, "height" => 600),BX_RESIZE_IMAGE_PROPORTIONAL)?>
								<img src="<?=$img['src']?>" alt="<?=$arOffer["NAME"]?>">
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

					<?if($arResult["PROPERITES"]["SOSTAV"]["VALUE"]):?>
					<div class="catalog-detail__props-item">
						<div class="h4">Состав</div>
						<p><?=$arResult["PROPERITES"]["SOSTAV"]["VALUE"]?></p>
					</div>
					<?endif?>

					<?if($arResult["PROPERITES"]["EXPIRATION_DATE"]["VALUE"]):?>
					<div class="catalog-detail__props-item">
						<div class="h4">Срок годности</div>
						<p><?=$arResult["PROPERITES"]["EXPIRATION_DATE"]["VALUE"]?></p>
					</div>
					<?endif?>

					<?if($arResult["PROPERITES"]["PISH_CENNOST"]["VALUE"]):?>
					<div class="catalog-detail__props-item">
						<div class="h4">Пищевая ценность на 100 г (БЖУ)</div>
						<div class="catalog-detail__props-item--items">
						<div class="d-flex">
							<div class="catalog-detail__props-item--item">
								<div class="catalog-detail__props-item--item-name">Белки</div>
								<div class="catalog-detail__props-item--item-value">10,0 г</div>
							</div>
							<div class="catalog-detail__props-item--item">
								<div class="catalog-detail__props-item--item-name">Жиры</div>
								<div class="catalog-detail__props-item--item-value">2,8 г</div>
							</div>
							<div class="catalog-detail__props-item--item">
								<div class="catalog-detail__props-item--item-name">Углеводы</div>
								<div class="catalog-detail__props-item--item-value">3,9 г</div>
							</div>

						</div>
						</div>
					</div>    
					<?endif?>

					<?if($arResult["PROPERITES"]["ENERG_CENNOST"]["VALUE"]):?>
					<div class="catalog-detail__props-item">
						<div class="h4">Энергетическая ценность</div>
						<p><?=$arResult["PROPERITES"]["ENERG_CENNOST"]["VALUE"]?></p>
					</div>  
					<?endif?>

					<?if($arResult["PROPERITES"]["PISH_CENNOST"]["VALUE"]):?>
					<div class="catalog-detail__props-item">
						<div class="h4">Где купить?</div>
						<ul class="list-unstyled">
							<li><a href="">Компания ЙОНАС</a></li>
							<li><a href="">Сеть Магнит</a></li>
							<li><a href="">Сеть Пятерочка</a></li>
						</ul>
					</div>  
					<?endif?>

					<?if($arResult["PROPERITES"]["PISH_CENNOST"]["VALUE"]):?>
					<div class="catalog-detail__props-item">
						<div class="h4">Награды</div>
						<ul class="list-unstyled">
							<li><a href="">Победитель “The Baltic cheese awards 2022” в номинации “из молока”</a></li>
						</ul>
					</div>   
					<?endif?>

				</div>

				<div class="catalog-detail__share-btn">
					<a href="" class="btn"><img src="@img/icons/message.svg" alt="message" class="icon">Поделиться впечатлением</a>
				</div>
				
			</div>
		</div>
	</div>



	<div class="products">
		<div class="decor">
			<div class="decor-left decor-left1" data-hs="fade right" style="--hs-delay: 0ms; --hs-translate-ratio: 10; --hs-duration-ratio: 2;">
				<img src="@img/catalog-section/decor-left2.png" alt="">
			</div>
			
			<div class="decor-right decor-right1 d-none d-sm-block" data-hs="fade left" style="--hs-delay: 500ms; --hs-translate-ratio: 10; --hs-duration-ratio: 2;">
				<img src="@img/catalog-section/decor-right2.png" alt="">
			</div>
		</div>

		<div class="products-wrapper">
			<div class="products-inner">
				<div class="container">
					<div class="h2">Другая продукция</div>
					<div class="product-list row">
						@@include('include/catalog-product-item.html', {
								"id": "1",
								"img": "1.png",
								"name": 'Масло Крестьянское "Бутербродов"',
								"icon": 'new.svg',
							})
							@@include('include/catalog-product-item.html', {
								"id": "2",
								"img": "2.png",
								"name": 'Масло Крестьянское "Бутербродов"',
								"icon": 'gost.svg',
							})
							@@include('include/catalog-product-item.html', {
								"id": "3",
								"img": "3.png",
								"name": 'Масло Крестьянское "Бутербродов"',
								"icon": '',
							})
							@@include('include/catalog-product-item.html', {
								"id": "4",
								"img": "4.png",
								"name": 'Масло Крестьянское "Бутербродов"',
								"icon": '',
							})
							@@include('include/catalog-product-item.html', {
								"id": "5",
								"img": "2.png",
								"name": 'Масло Крестьянское "Бутербродов"',
								"icon": 'gost.svg',
							})
							@@include('include/catalog-product-item.html', {
								"id": "6",
								"img": "3.png",
								"name": 'Масло Крестьянское "Бутербродов"',
								"icon": '',
							})
					</div>
				</div>
			</div>
		</div>
	</div>

</main>

