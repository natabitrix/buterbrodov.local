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
// kintArr($arResult['PROPERTIES']);
?>



<main class="main">

<?if($arResult["PROPERTIES"]["IMAGE"]["VALUE"]):?>
	<?
	/**дублируем слайды, иначе слайдер неверно работает */
	$arSlider = array();
	foreach($arResult["PROPERTIES"]["IMAGE"]["VALUE"] as $key => $value)
	{
		$img = CFile::ResizeImageGet($value, array("width" => 1280, "height" => 900),BX_RESIZE_IMAGE_EXACT);
		$alt = $arResult["PROPERTIES"]["IMAGE"]["DESCRIPTION"][$key] ?? $arResult["NAME"];
		if($img)
		{
			$arSlider[] = array("img" => $img["src"], "alt" => $alt);
		}
	}
	$arSliders = array($arSlider, $arSlider);
	?>
	<div class="swiper about_slider">
		<div class="swiper-wrapper">

		<?foreach($arSliders as $arSlider):?>
			<?foreach($arSlider as $arImg):?>
				<div class="swiper-slide slide">
					<div class="slide__wrapper">
						<div class="slide__img"><img src="<?=$arImg["img"]?>" alt="<?=$arImg["alt"]?>" title="<?=$arImg["alt"]?>"></div>
					</div>
				</div>
			<?endforeach?>
		<?endforeach?>
			
		</div>
	</div>
<?endif?>


<div class="text-content">
	<div class="container">

		<h1><?=$arResult["NAME"]?></h1>
		<?=$arResult["DETAIL_TEXT"]?>
		
		<?if($arResult["PROPERTIES"]["INFO"]["VALUE"]):?>
		<div class="about-items">
			<?foreach($arResult["PROPERTIES"]["INFO"]["VALUE"] as $key => $value):?>
				<?$sub_values = $value["SUB_VALUES"];?>
				<div class="about-item">
					<?if($sub_values["INFO__IMAGE"]["VALUE"]):?>
						<div class="about-item__icon">
							<img src="<?=CFile::GetPath($sub_values["INFO__IMAGE"]["VALUE"])?>" alt="<?=$sub_values["INFO__NAME"]["VALUE"]?>">
						</div>
					<?endif?>

					<?if($sub_values["INFO__NAME"]["VALUE"]):?>
						<div class="about-item__h2"><h2><?=$sub_values["INFO__NAME"]["VALUE"]?></h2></div>
					<?endif?>

					<?if($sub_values["INFO__TEXT"]["VALUE"]):?>
						<div class="about-item__text"><?=$sub_values["INFO__TEXT"]["~VALUE"]["TEXT"]?></div>
					<?endif?>
				</div>
		
			<?endforeach?>
		</div>
		<?endif?>

	</div>
</div>

</main>
