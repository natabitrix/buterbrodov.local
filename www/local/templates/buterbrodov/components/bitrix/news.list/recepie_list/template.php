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


<div class="ajax-container">
	<div class="row ajax-items">
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

			$date = $arItem['ACTIVE_FROM'] ? $arItem['ACTIVE_FROM'] : false;

			$img = $arItem['PROPERTIES']['IMAGE']['VALUE'] ? CFile::ResizeImageGet($arItem['PROPERTIES']['IMAGE']['VALUE'],array("width" => 404, "height" => 489),BX_RESIZE_IMAGE_EXACT) : false;

			//printArr($arItem);
			?>

			<div class="recepie-list-item col-md-6 <?=$arParams['COL_LG_CLASS']?> col-xl-6 ajax-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">

				<div class="recepie-list-item__wrapper">
					<div class="recepie-list-item__inner">

						<div class="recepie-list-item__img-block">
							<?if($img):?>
							<img src="<?=$img['src']?>" alt="<?=$arItem['NAME']?>" class="img-fluid">
							<?endif?>
						</div>

						<a class="recepie-list-item__text-block" href="<?=$arItem['DETAIL_PAGE_URL']?>">

							<h3 class="h3"><?=$arItem['NAME']?></h3>

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

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<div class="load-more-container text-center mt-5">
		<?=$arResult["NAV_STRING"]?>
	</div>
<?endif;?>
</div>
