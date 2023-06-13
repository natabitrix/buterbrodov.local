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

$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));
//printArr($arResult['SECTIONS']);
?>

<?if(0 < $arResult["SECTIONS_COUNT"]):?>
<div class="row_ home-section__categories-items">
<?
$i = 1;
foreach ($arResult['SECTIONS'] as &$arSection):
	$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
	$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
	$class = "";
	$animation_type = "";
	$animation_delay = "";
	$animation_translate_ratio = "--hs-translate-ratio: 5;";
	$animation_blur = "--hs-blur: 0px;";


	if($i == 1) 
	{
		$class = "col-8 offset-2";
		$animation_type = "fade down zoom-out";
		$animation_delay = "--hs-delay: 100ms;";
	}
	if($i == 2) 
	{
		$class = "col-6";
		$animation_type = "fade right zoom-out";
		$animation_delay = "--hs-delay: 100ms;";
	}
	if($i == 3) 
	{
		$class = "col-6";
		$animation_type = "fade left zoom-out";
		$animation_delay = "--hs-delay: 100ms;";
	}
	if($i == 4) 
	{
		$class = "col-8 offset-2";
		$animation_type = "fade up zoom-out";
		$animation_delay = "--hs-delay: 100ms;";
	}
	// $animation_delay = "--hs-delay: 200ms;";
	$animation_translate_ratio = "--hs-translate-ratio: 3;";
	$animation_type = "fade up zoom-in";
	$animation_blur = "";

?>
	<div class="home-section__categories-item <?//=$class?> anim-repeat" data-hs="<?=$animation_type?>" style="<?=$animation_delay?><?=$animation_translate_ratio?><?=$animation_blur?>">
		<a href="<?=$arSection["SECTION_PAGE_URL"]?>">
		<?if($arSection["UF_LOGO"]):?> 
		<img src="<?=CFile::GetPath($arSection["UF_LOGO"])?>" alt="<?=$arSection["NAME"];?>" title="<?=$arSection["NAME"];?>">
		<?endif?>
		</a>
	</div>
<?
$i++;
endforeach?>
</div>
<?endif?>

