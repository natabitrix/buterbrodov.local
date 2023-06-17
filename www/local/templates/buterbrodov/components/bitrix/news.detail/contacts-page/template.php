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

<div class="container">
	<div class="text-content">

		<h1><?=$arResult["NAME"]?></h1>
		<?=$arResult["DETAIL_TEXT"]?>

		
		<?if($arResult["PROPERTIES"]["CONTACTS"]["VALUE"]):?>
			<div class="contact-items">
				<div class="row">
					<?foreach($arResult["PROPERTIES"]["CONTACTS"]["VALUE"] as $key => $value):?>
					<?$sub_values = $value["SUB_VALUES"];?>
					<div class="col-lg-4 contact-item">
						<?if($sub_values["CONTACTS__NAME"]["VALUE"]):?>
						<div class="contact-item__name"><?=$sub_values["CONTACTS__NAME"]["VALUE"]?></div>
						<?endif?>
						<?if($sub_values["CONTACTS__TEXT"]["VALUE"]):?>
						<div class="contact-item__value"><?=$sub_values["CONTACTS__TEXT"]["~VALUE"]["TEXT"]?></div>
						<?endif?>
					</div>
					<?endforeach?>
				</div>
			</div>
		<?endif?>


		<?if($arResult["PROPERTIES"]["MANAGERS"]["VALUE"]):?>
			<div class="manager-items">
				<div class="row">
					<?foreach($arResult["PROPERTIES"]["MANAGERS"]["VALUE"] as $key => $value):?>
					<?$sub_values = $value["SUB_VALUES"];?>
					<div class="col-md-6 col-lg-4 col-xl-3 manager-item">
						<?if($sub_values["MANAGERS__NAME"]["VALUE"]):?>
							<div class="manager-item__name"><?=$sub_values["MANAGERS__NAME"]["VALUE"]?></div>
						<?endif?>
						<?if($sub_values["MANAGERS__TEXT"]["VALUE"]):?>
							<div class="manager-item__contact"><?=$sub_values["MANAGERS__TEXT"]["~VALUE"]["TEXT"]?></div>
						<?endif?>
						<?if($sub_values["MANAGERS__POST"]["VALUE"]):?>
							<div class="manager-item__post"><?=$sub_values["MANAGERS__POST"]["VALUE"]?></div>
						<?endif?>
					</div>
					<?endforeach?>
				</div>
			</div>
		<?endif?>
		

	</div>
</div>

</main>
