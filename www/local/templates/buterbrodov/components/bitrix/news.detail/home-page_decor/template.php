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
//printArr($arResult['PROPERTIES']);

$img_left = $arResult['PROPERTIES']['IMAGE_LEFT']['VALUE'];
$img_right = $arResult['PROPERTIES']['IMAGE_RIGHT']['VALUE'];

$img_left_back = $arResult['PROPERTIES']['IMAGE_LEFT_BACK']['VALUE'];
$img_right_back = $arResult['PROPERTIES']['IMAGE_RIGHT_BACK']['VALUE'];

$img_left_fore = $arResult['PROPERTIES']['IMAGE_LEFT_FORE']['VALUE'];
$img_right_fore = $arResult['PROPERTIES']['IMAGE_RIGHT_FORE']['VALUE'];

?>


<?if($img_left_back || $img_right_back):?>
	<div class="decor decor-bg parallax__layer parallax__layer--deep">
	<?if($img_left_back):?>
		<?$i = 1;?>
		<?foreach($img_left_back as $img_id):?>
		<?
			$class = "decor-left home-section__categories-bg-decor-left".$i;
			$animation_type = "fade";
			$animation_delay = "--hs-delay: 0ms;";
			$animation_translate_ratio = "--hs-translate-ratio: 5;";
		?>
		<div class="<?=$class?>" data-hs="<?=$animation_type?>" style="<?=$animation_delay?><?=$animation_translate_ratio?>">
			<img src="<?=CFile::GetPath($img_id)?>" alt="">
		</div>
		<?$i++;?>
		<?endforeach?>
	<?endif?>

	<?if($img_right_back):?>
		<?$i = 1;?>
		<?foreach($img_right_back as $img_id):?>
		<?
			$class = "decor-right home-section__categories-bg-decor-right".$i;
			$animation_type = "fade";
			$animation_delay = "--hs-delay: 0ms;";
			$animation_translate_ratio = "--hs-translate-ratio: 5;";
		?>
		<div class="<?=$class?>" data-hs="<?=$animation_type?>" style="<?=$animation_delay?><?=$animation_translate_ratio?>">
			<img src="<?=CFile::GetPath($img_id)?>" alt="">
		</div>
		<?$i++;?>
		<?endforeach?>
	<?endif?>
	</div>
<?endif?>




<?if($img_left || $img_right):?>
	<div class="decor parallax__layer parallax__layer--back">
	<?if($img_left):?>
		<?$i = 1;?>
		<?foreach($img_left as $img_id):?>
		<?
			$class = "decor-left home-section__categories-decor-left".$i;
			$animation_type = "fade";
			$animation_delay = "--hs-delay: 0ms;";
			$animation_translate_ratio = "--hs-translate-ratio: 5;";
		?>
		<div class="<?=$class?>" data-hs="<?=$animation_type?>" style="<?=$animation_delay?><?=$animation_translate_ratio?>">
			<img src="<?=CFile::GetPath($img_id)?>" alt="">
		</div>
		<?$i++;?>
		<?endforeach?>
	<?endif?>

	<?if($img_right):?>
		<?$i = 1;?>
		<?foreach($img_right as $img_id):?>
		<?
			$class = "decor-right home-section__categories-decor-right".$i;
			$animation_type = "fade";
			$animation_delay = "--hs-delay: 0ms;";
			$animation_translate_ratio = "--hs-translate-ratio: 5;";
		?>
		<div class="<?=$class?>" data-hs="<?=$animation_type?>" style="<?=$animation_delay?><?=$animation_translate_ratio?>">
			<img src="<?=CFile::GetPath($img_id)?>" alt="">
		</div>
		<?$i++;?>
		<?endforeach?>
	<?endif?>
	</div>
<?endif?>




<?if($img_left_fore || $img_right_fore):?>
	<div class="decor parallax__layer parallax__layer--back">
	<?if($img_left_fore):?>
		<?$i = 1;?>
		<?foreach($img_left_fore as $img_id):?>
		<?
			$class = "decor-left home-section__categories-leaf-decor-left".$i;
			$animation_type = "fade";
			$animation_delay = "--hs-delay: 0ms;";
			$animation_translate_ratio = "--hs-translate-ratio: 5;";
		?>
		<div class="<?=$class?>" data-hs="<?=$animation_type?>" style="<?=$animation_delay?><?=$animation_translate_ratio?>">
			<img src="<?=CFile::GetPath($img_id)?>" alt="">
		</div>
		<?$i++;?>
		<?endforeach?>
	<?endif?>

	<?if($img_right_fore):?>
		<?$i = 1;?>
		<?foreach($img_right_fore as $img_id):?>
		<?
			$class = "decor-right home-section__categories-leaf-decor-right".$i;
			$animation_type = "fade";
			$animation_delay = "--hs-delay: 0ms;";
			$animation_translate_ratio = "--hs-translate-ratio: 5;";
		?>
		<div class="<?=$class?>" data-hs="<?=$animation_type?>" style="<?=$animation_delay?><?=$animation_translate_ratio?>">
			<img src="<?=CFile::GetPath($img_id)?>" alt="">
		</div>
		<?$i++;?>
		<?endforeach?>
	<?endif?>
	</div>
<?endif?>

