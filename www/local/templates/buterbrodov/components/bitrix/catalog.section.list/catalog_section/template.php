<?

/** CATALOG.SECTION.LIST/section*/
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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
$arSectionDeleteParams = array("CONFIRM" => GetMessage("CT_BCSL_ELEMENT_DELETE_CONFIRM"));

$curPage = $APPLICATION->GetCurPage(false);

//printArr($arResult);
$root_section = $arResult["SECTION"]["DEPTH_LEVEL"] == 1;
?>


<? $this->SetViewTarget('decor_top'); ?>
<? if ($arResult["SECTION"]["UF_DECOR_TOP"]) : ?>
	<div class="decor">
		<div class="decor-top d-none d-lg-block" data-hs="fade down" style="--hs-delay: 0ms; --hs-translate-ratio: 10; ">
			<img src="<?= CFile::GetPath($arResult["SECTION"]["UF_DECOR_TOP"]) ?>" alt="">
		</div>
	</div>
<? endif ?>
<? $this->EndViewTarget(); ?>



<div class="text-content">
	<div class="container">
		<div class="row">
			<div class="col-xl-6 col-xxxl-5 col-decor">
				<? if ($arResult["SECTION"]["UF_DECOR_LEFT"]) : ?>
					<div class="decor">
						<div class="decor-left decor-left1" data-hs="fade right blur" style="--hs-blur: 15px; --hs-rotate: -45deg; --hs-delay: 500ms; --hs-translate-ratio: 10; --hs-duration-ratio: 2;">
							<? $decor_left = CFile::ResizeImageGet($arResult["SECTION"]["UF_DECOR_LEFT"], array("width" => 680, "height" => 680), BX_RESIZE_IMAGE_EXACT) ?>
							<img src="<?= $decor_left["src"] ?>" alt="">
						</div>
					</div>
				<? endif ?>
			</div>
			<div class="col-xl-6 col-xxxl-7 col-text">
				<? if ($arResult["SECTION"]["UF_LOGO"]) : ?>
					<div class="logo">
						<? if (!$root_section) : ?><a href="<?= $arResult["SECTION"]["PATH"][0]["SECTION_PAGE_URL"] ?>"><? endif ?>
							<img src="<?= CFile::GetPath($arResult["SECTION"]["UF_LOGO"]) ?>" alt="<?= $arResult["SECTION"]["NAME"] ?>">
							<? if (!$root_section) : ?></a><? endif ?>
					</div>
				<? endif ?>
				<div class="position-relative">
					<div class="animations__decor d-none d-md-block">
						<div class="animations__decor-cow animations__cow1 animations__cow_stand d-none d-md-block">
							<? $APPLICATION->IncludeFile(SITE_TEMPLATE_PATH . "/include/animations/cow1.svg", array(), array("SHOW_BORDER" => false)); ?>
						</div>
					</div>

					<?= $arResult["SECTION"]["DESCRIPTION"] ?>

				</div>
			</div>
		</div>
	</div>
	<? if ($arResult["SECTION"]["UF_DECOR_RIGHT"]) : ?>
		<div class="decor">
			<div class="decor-right decor-right1" data-hs="fade left" style="--hs-delay: 1000ms; --hs-translate-ratio: 10; --hs-duration-ratio: 2;">
				<img src="<?= CFile::GetPath($arResult["SECTION"]["UF_DECOR_RIGHT"]) ?>" alt="">
			</div>
		</div>
	<? endif ?>
</div>




<div id="products"></div>

<? $arFilterSections = $root_section ? $arResult["SECTIONS"] : $arResult["SECTION"]["PARENT"]["SECTIONS"]; ?>
<? if (is_array($arFilterSections) && count($arFilterSections) > 0) : ?>
	<div class="filter">
		<div class="container">
			<div class="filter__items-wrapper">
				<div class="filter__items-scroller">
					<div class="filter__items-inner">
						<div class="filter__items">
							<? foreach ($arFilterSections as $arSection) : ?>
								<?
								$current_section = $arSection["SECTION_PAGE_URL"] == $curPage;
								$theme_color = $arSection["UF_THEME_COLOR"];
								?>

								<div class="filter__item">
									<? if (!$current_section) : ?><a href="<?= $arSection["SECTION_PAGE_URL"] ?>#products"><? endif ?>
										<div class="filter__item-icon hover-bg-<?= $theme_color ?> active-bg-<?= $theme_color ?><? if ($current_section) : ?> active<? endif ?>">
											<img src="<?= CFile::GetPath($arSection["UF_FILTER_ICON"]) ?>" alt="<?= $arSection["NAME"] ?>">
										</div>
										<div class="filter__item-name">
											<?= $arSection["NAME"] ?>
										</div>
										<? if (!$current_section) : ?>
										</a><? endif ?>
								</div>

							<? endforeach ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<? endif ?>




<? $this->SetViewTarget('decor_products'); ?>
<div class="decor">
	<? if ($arResult["SECTION"]["UF_DECOR_LEFT_PRODUCTS"]) : ?>
		<div class="decor-left decor-left1" data-hs="fade right" style="--hs-delay: 0ms; --hs-translate-ratio: 10; --hs-duration-ratio: 2;">
			<img src="<?= CFile::GetPath($arResult["SECTION"]["UF_DECOR_LEFT_PRODUCTS"]) ?>" alt="">
		</div>
	<? endif ?>
	<? if ($arResult["SECTION"]["UF_DECOR_RIGHT_PRODUCTS"]) : ?>
		<div class="decor-right decor-right1 d-none d-sm-block" data-hs="fade left" style="--hs-delay: 500ms; --hs-translate-ratio: 10; --hs-duration-ratio: 2;">
			<img src="<?= CFile::GetPath($arResult["SECTION"]["UF_DECOR_RIGHT_PRODUCTS"]) ?>" alt="">
		</div>
	<? endif ?>
</div>
<? $this->EndViewTarget(); ?>