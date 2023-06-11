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

<?
$i = 0;
foreach ($arResult['SECTIONS'] as &$arSection):
	$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
	$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
?>
	<div class="header__categories-item<?if($i > 0):?> animations__other-logo<?endif?>">
		<a href="<?=$arSection["SECTION_PAGE_URL"]?>">
		<?if($arSection["UF_LOGO"]):?> 
		<img src="<?=CFile::GetPath($arSection["UF_LOGO"])?>" alt="<?=$arSection["NAME"];?>" title="<?=$arSection["NAME"];?>">
		<?endif?>
		</a>
	</div>
<?
$i++;
endforeach?>

<?endif?>

