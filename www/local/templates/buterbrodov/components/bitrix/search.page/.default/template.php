<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
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
$KZ = ($GLOBALS['KZ']) ? true : false;
CModule::IncludeModule('iblock');
//echo '<pre>' . print_r($_GET,1) . '</pre>';
//echo '<pre>' . print_r($arParams,1) . '</pre>';
//echo '<pre>' . print_r($arResult,1) . '</pre>';
function mymessage($message)
{
	return $message;
}
?>
<div class="row">


<div class="col-lg-8">
	<div class="page__search search-area d-flex">
		<a class="detail-header__btn" href="#" onclick="history.back();return false;"><i class="detail-header__icon icon-back"></i></a>
		<form action="<?=$APPLICATION->GetCurPage(false)?>" method="get" class="search-page-form flex-grow-1">
			<i class="search__icon icon-search"></i>
			<input type="text" name="q" value="<?=$arResult["REQUEST"]["QUERY"]?>"  class="search__input"  placeholder="<?=mymessage("SEARCH")?>">

			<!--input type="submit" value="<?=mymessage("SEARCH_GO")?>"-->
			
			<input type="hidden" name="title_rank" value="<?=$arResult["REQUEST"]["TITLE_RANK"]?>">
			<input type="hidden" name="how" value="<?=$arResult["REQUEST"]["HOW"]=="d"? "d": "r"?>">
			<input type="hidden" name="from" value="<?=$arResult["REQUEST"]["FROM"]?>">
			<input type="hidden" name="to" value="<?=$arResult["REQUEST"]["TO"]?>">

			<?if($arParams["request_iblock"]):?>
			<input type="hidden" name="iblock" value="<?=implode(",",$arParams['request_iblock'])?>">
			<?endif?>
			
			<?if($arParams["request_section"]):?>
			<input type="hidden" name="section" value="<?=implode(",",$arParams['request_section'])?>">
			<?endif?>
		</form>
	</div>
</div>




<div class="col-lg-4">

<div class="sidebar__wrap">
	<section class="search-params search-params--collapse sidebar--collapse">
		<h2 class="search-params__title search-params__title--collapse"><i class="search-params__icon icon-filters"></i><?=mymessage("PARAMETRY_POISKA")?></h2>
		<form action="<?=$APPLICATION->GetCurPage(false)?>" method="get" class="search-params-form">
		
		<input type="hidden" name="q" value="<?=$arResult["REQUEST"]["QUERY"]?>">
		
		<div class="search-params__body">
		
			<?/***Искать только в заголовках***/?>
			<div class="search-params__row d-none">
				<div class="search-params__row-head form-switch d-flex py-1">
					<label class="py-2" for="title_rank">
						<?=mymessage("ISKAT_TOLKO_V_ZAGOLOVKAH")?>
					</label>
					<input class="form-check-input float-none me-0 ms-auto" type="checkbox" value="Y" name="title_rank" id="title_rank" onchange="this.form.submit()"<?if($arParams["USE_TITLE_RANK"]==1) echo " checked"?>>
				</div>
			</div>
			
			<?/***Сортировка по дате-релевантности***/?>
			<div class="search-params__row d-none">
				<div class="search-params__row-head d-flex" data-bs-toggle="collapse" data-bs-target="#search_sort">
					<label><?=mymessage("SORTIROVAT")?></label>
					<span class="ms-auto"><?echo ($arResult["REQUEST"]["HOW"]=="d") ? mymessage("PO_DATE") : mymessage("PO_RELEVANTNOSTI")?></span>
				</div>
				<div class="collapsible collapse" id="search_sort">
					<div class="form-check p-0 d-flex mb-3">
						<label class="form-check-label" for="sort_r"><?=mymessage("PO_RELEVANTNOSTI")?></label>
						<input class="form-check-input float-none m-0 ms-auto" type="radio" name="how" value="r" id="sort_r" onchange="this.form.submit()"<?if($arResult["REQUEST"]["HOW"]!="d") echo " checked"?>>
					</div>
					<div class="form-check p-0 d-flex mb-3">
						<label class="form-check-label" for="sort_d"><?=mymessage("PO_DATE")?></label>
						<input class="form-check-input float-none m-0 ms-auto" type="radio" name="how" value="d" id="sort_d" onchange="this.form.submit()"<?if($arResult["REQUEST"]["HOW"]=="d") echo " checked"?>>
					</div>
				</div>
			</div>
			
			<?/***Инфоблоки***/?>
			<?
			$IBLOCK_ID_CATALOG = intval($GLOBALS['IBLOCK_ID_CATALOG']);
	$arIblocks = array($IBLOCK_ID_CATALOG => mymessage("CATALOG"), /*"40" => mymessage("STATI"), "3" => mymessage("PARTNERSKIE_MATERIALY")*/);
			$isSelectedAllIblocks = !$arParams['request_iblock'] || ($arParams["request_iblock"] && count($arParams["request_iblock"]) == count($arIblocks));
			?>
			<div class="search-params__row d-none">
				<div class="search-params__row-head d-flex" data-bs-toggle="collapse" data-bs-target="#search_ib">
					<label><?=mymessage("POKAZYVAT")?></label>
					<?if($isSelectedAllIblocks):?><span class="ms-auto"><?=mymessage("VSE_MATERIALY")?></span><?endif?>
				</div>
				<div class="collapsible collapse<?if(!$isSelectedAllIblocks):?> show<?endif?>" id="search_ib"> 
					<?foreach($arIblocks as $iblockID => $iblockName):?>
					<div class="form-check p-0 d-flex mb-3">
						<label class="form-check-label" for="ib<?=$iblockID?>"><?=$iblockName?></label>
						<input class="form-check-input float-none m-0 ms-auto" type="checkbox" value="<?=$iblockID?>" id="ib<?=$iblockID?>" <?if(!$arParams['request_iblock'] || in_array($iblockID, $arParams["request_iblock"])) echo " checked"?>>
					</div>
					<?endforeach?>
					<input type="hidden" name="iblock" value="<?if(is_array($arParams['request_iblock'])):?><?=implode(",",$arParams['request_iblock'])?><?endif?>">
				</div>
			</div>


			<?/***Разделы***/?>
			<?
			$arSections = array();
			$db_list = CIBlockSection::GetList(array("sort" => "asc"), array("IBLOCK_ID" => 17, "DEPTH_LEVEL" => 1, "ACTIVE" => "Y"), true, array("UF_SHORT_TITLE", "UF_SHORT_TITLE_KZ", "UF_NAME_KZ"));
			$KZ = ($GLOBALS['KZ']) ? true : false;
			while($ar_result = $db_list->GetNext())
			{
				$arSections[$ar_result["ID"]] = $KZ && $ar_result["UF_SHORT_TITLE_KZ"] ? $ar_result["UF_SHORT_TITLE_KZ"] : ($ar_result["UF_SHORT_TITLE"] ? $ar_result["UF_SHORT_TITLE"] : $ar_result["NAME"]);
				//echo '<pre>' . print_r($ar_result,1) . '</pre>';
			}
			$isSelectedAllSections = !$arParams['request_section'] || ($arParams["request_section"] && count($arParams["request_section"]) == count($arSections));
			?>
			<div class="search-params__row">
				<div class="search-params__row-head d-flex" data-bs-toggle="collapse" data-bs-target="#search_sections">
					<label><h3>Бренды</h3></label>
					<?if($isSelectedAllSections):?><span class="ms-auto"><?=mb_strtolower(mymessage("ALL"))?></span><?endif?>
				</div>
				<div class="collapsible collapse<?if(!$isSelectedAllSections):?> show<?endif?>" id="search_sections">
					<?foreach($arSections as $sectionID => $sectionName):?>
					<div class="form-check p-0 d-flex mb-3">
						<label class="form-check-label" for="section<?=$sectionID?>"><?=$sectionName?></label>
						<input class="form-check-input float-none m-0 ms-auto" type="checkbox" value="<?=$sectionID?>" id="section<?=$sectionID?>" <?if(!$arParams['request_section'] || in_array($sectionID, $arParams["request_section"])) echo " checked"?>>
					</div>
					<?endforeach?>
					<input type="hidden" name="section" value="<?if(is_array($arParams['request_iblock'])):?><?=implode(",",$arParams['request_section'])?><?endif?>">
				</div>
			</div>
			
			<?
			/***Даты***/
			$now = date("Y-m-d");
			$year_ago = strtotime("$now-1 year");
			$year_ago_format = date("d.m.Y", $year_ago);
			$month_ago = strtotime("$now-1 month");
			$month_ago_format = date("d.m.Y", $month_ago);
			$today = date("d.m.Y");
			
			$isSelectedPeriod = $arResult["REQUEST"]["FROM"] || $arResult["REQUEST"]["TO"];
			$isSelectedYear = $arResult["REQUEST"]["FROM"] == $year_ago_format  && $arResult["REQUEST"]["TO"] == $today;
			$isSelectedMonth = $arResult["REQUEST"]["FROM"] == $month_ago_format  && $arResult["REQUEST"]["TO"] == $today;

			?>
			<div class="search-params__row d-none">
				<div class="search-params__row-head d-flex" data-bs-toggle="collapse" data-bs-target="#search_date">
					<label><?=mymessage("PERIOD")?></label>
					<?if(!$isSelectedPeriod):?><span class="ms-auto"><?=mymessage("VSE_VREMYA")?></span><?endif?>
				</div>
				<div class="collapsible collapse<?if($isSelectedPeriod):?> show<?endif?>" id="search_date">
					<div class="form-check p-0 d-flex mb-3">
						<label class="form-check-label" for="all_dates"><?=mymessage("VSE_VREMYA")?></label>
						<input class="form-check-input float-none m-0 ms-auto" type="radio" value="" id="all_dates"<?if(!$isSelectedPeriod):?> checked<?endif?>>
					</div>
					<div class="form-check p-0 d-flex mb-3">
						<label class="form-check-label" for="year"><?=mymessage("ZA_GOD")?></label>
						<input class="form-check-input float-none m-0 ms-auto" type="radio" value="year" id="year"<?if($isSelectedYear):?> checked<?endif?>>
					</div>
					<div class="form-check p-0 d-flex mb-3">
						<label class="form-check-label" for="month"><?=mymessage("ZA_MESYAC")?></label>
						<input class="form-check-input float-none m-0 ms-auto" type="radio" value="month" id="month"<?if($isSelectedMonth):?> checked<?endif?>>
					</div>
					<div class="form-check p-0 d-flex mb-3">
						<label class="form-check-label" for="period"><?=mymessage("UKAZAT_PERIOD")?></label>
						<input class="form-check-input float-none m-0 ms-auto" type="radio" value="period" id="period"<?if($isSelectedPeriod && !$isSelectedYear && !$isSelectedMonth):?> checked<?endif?>>
					</div>
				</div>
				<div class="collapse<?if($isSelectedPeriod && !$isSelectedYear && !$isSelectedMonth):?> show<?endif?> pt-1 pb-3 px-3" id="search_from_to">
					<div class="d-flex">
						<label class="pe-2"><?=mymessage("FROM")?></label>
						<input type="text" class="form-control form-control-sm border-0 border-bottom-2 border-accent" name="from" placeholder="" id="search_from" value="<?=$arResult["REQUEST"]["~FROM"]?>" autocomplete="off">

						<label class="ps-4 pe-2"><?=mymessage("TO")?></label>
						<input type="text" class="form-control form-control-sm border-0 border-bottom-2 border-accent" name="to" placeholder="" id="search_to" value="<?=$arResult["REQUEST"]["~TO"]?>" autocomplete="off">
					</div>
				</div>
			</div>
			
			<button type="submit" class="btn btn__accent d-block w-100"><?=mymessage("PRIMENIT_FILTR")?></button> 
		</div>
		</form>
	</section>
</div>
</div>
</div>

<script>
$(document).on('change', '#search_ib .form-check-input', function(){
	var checkedIB = [];
	$('#search_ib .form-check-input:checked').each(function(){
		checkedIB.push($(this).val());
	});
	$('input[name="iblock"]').val(checkedIB);
	//$('.search-params-form').submit();
});
$(document).on('change', '#search_sections .form-check-input', function(){
	var checkedSection = [];
	$('#search_sections .form-check-input:checked').each(function(){
		checkedSection.push($(this).val());
	});
	$('input[name="section"]').val(checkedSection);
	//$('.search-params-form').submit();
});

var DatePickerOptions = {
	format: "dd.mm.yyyy",
	language: "<?if($KZ):?>kk<?else:?>ru<?endif?>",
	autoclose: true,
	todayHighlight: true
};
var datepickerFrom = $('#search_from').datepicker(DatePickerOptions).on("changeDate", function(e) {
        //$('.search-params-form').submit();
    });
var datepickerTo = $('#search_to').datepicker(DatePickerOptions).on("changeDate", function(e) {
       //$('.search-params-form').submit();
    });

$(document).on('change', '#search_date .form-check-input', function(){
	$('#search_date .form-check-input').prop('checked',false);
	$(this).prop('checked',true);

	//$('.search-params-form').submit();

	if($(this).val()=="year"){
		$('input[name="from"]').val("<?=$year_ago_format?>");
	}
	if($(this).val()=="month"){
		$('input[name="from"]').val("<?=$month_ago_format?>");
	}
	if($(this).val()=="year" || $(this).val()=="month"){
		$('input[name="to"]').val("<?=$today?>");
	}

	if($(this).val()=="" || $(this).val()=="period"){
		$('#search_from').val("");
		$('#search_to').val("");
	}

	$('#search_from_to').collapse('hide');

	if($(this).val()=="period"){
		$('#search_from_to').collapse('show');
	}
});


	
</script>

<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/css/bootstrap-datepicker.min.css");?>
<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/bootstrap-datepicker.min.js');?>
<?if($KZ):?>
<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/bootstrap-datepicker.kk.min.js');?>
<?else:?>
<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH.'/js/bootstrap-datepicker.ru.min.js');?>
<?endif?>








<?if(isset($arResult["REQUEST"]["ORIGINAL_QUERY"])):?>
	<div class="search-language-guess">
		<?echo mymessage("CT_BSP_KEYBOARD_WARNING", array("#query#"=>'<a href="'.$arResult["ORIGINAL_QUERY_URL"].'">'.$arResult["REQUEST"]["ORIGINAL_QUERY"].'</a>'))?>
	</div>
<?endif;?>


<?if($arResult["REQUEST"]["QUERY"] === false && $arResult["REQUEST"]["TAGS"] === false):?>
<?elseif($arResult["ERROR_CODE"]!=0):?>
	<p><?=mymessage("SEARCH_ERROR")?></p>
	<?ShowError($arResult["ERROR_TEXT"]);?>

<?elseif(count($arResult["SEARCH"])>0):?>

<?if($arResult["REQUEST"]["TAGS"] !== false):?>
<?$APPLICATION->AddViewContent('H1_PLUS', " ".mymessage("S_TEGOM"). " &laquo;".$arResult["REQUEST"]["TAGS"]. "&raquo;");?>
<?endif?>

	<?
	//echo '<pre>' . print_r($arResult["SEARCH"],1) . '</pre>';
	//printArr($arResult["SEARCH"]);
	$arFoundIDs = array();
	$arFoundFormated = array();
	foreach($arResult["SEARCH"] as $arItem)
	{
		$arFoundIDs[] = $arItem["ITEM_ID"];
		$arFoundFormated[$arItem["ITEM_ID"]] = array("TITLE_FORMATED" => $arItem["TITLE_FORMATED"], "BODY_FORMATED" => $arItem["BODY_FORMATED"]);
	}


$arSelect = Array("ID", "IBLOCK_ID", "IBLOCK_SECTION_ID"/*, "PREVIEW_PICTURE", "DETAIL_PICTURE"*/);
$arFilter = Array("ID" => $arFoundIDs, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
$arFoundElementProps = array();
while($arFields = $res->GetNext())
{
	//printArr($arFields);
	//$arFoundElementProps[$arFields["ID"]]["PICTURE"] = $arFields["PREVIEW_PICTURE"] ? $arFields["PREVIEW_PICTURE"] : $arFields["DETAIL_PICTURE"];
	// $arFoundElementProps[$arFields["ID"]]["SECTION"] = itemSectionData($arFields["IBLOCK_SECTION_ID"], $arFields["IBLOCK_ID"]);
}

//printArr($arFoundElementProps);

?>

<?
/*	global $arSearchFilter;
	$arSearchFilter = array("ID" => $arFoundIDs);
	$APPLICATION->IncludeComponent(
		"bitrix:news.list",
		"ajax_news_and_partners",
		Array(
			"IBLOCK_TYPE" => "content",
			"IBLOCK_ID" => 2,
			"FILTER_NAME" => "arSearchFilter",
			"NOT_SHOW_PARTNERS_NEWS" => "Y",
		)
	);
//$arItemSection = itemSectionData($arItem["IBLOCK_SECTION_ID"], $arItem["IBLOCK_ID"]);
*/
	?>

<div class="ajax_news">
<?foreach($arResult["SEARCH"] as $arItem):?>
	<?
	//$img_width = 865; //635;
	//$picture = $arFoundElementProps[$arItem["ITEM_ID"]]["PICTURE"];
	//$arImg = CFile::ResizeImageGet($picture,array("width" => $img_width, "height" => 1000),BX_RESIZE_IMAGE_PROPORTIONAL, true);
	//$img_src = $arImg['src'];
	$item_date = strtotime($arItem["DATE_FROM"]);
	$arItemSection = $arFoundElementProps[$arItem["ITEM_ID"]]["SECTION"];
	$arItemSection["ICON"] = $GLOBALS["ARR_ICONS"][$arItemSection["CODE"]]["ICON_ACTIVE"];
	?>
	<article class="news ajax-news-item">
		<!--a class="news__img-link" href="#"><img class="news__img" src="img/demo/news1.jpg" alt=""></a-->
		<div class="news__body">
			<div class="news-meta news__news-meta">
				<a class="news-meta__category" href="<?=$arItemSection["URL"]?>">
					<i class="news-meta__icon">
						<img src="<?=$arItemSection["ICON"]?>" alt="<?=$arItemSection["NAME"]?>" title="<?=$arItemSection["NAME"]?>">
					</i>
					<?=$arItemSection["NAME"]?>
				</a>
				<time class="news-meta__date" datetime="<?=FormatDate("c", $item_date)?>">
					<?
					echo FormatDate(array(
					"tommorow" => "tommorow, H:i",    // выведет "завтра, 13:30", если дата завтрашний день
					"today" => "today, H:i",          // выведет "сегодня, 13:30", если дата текущий день
					"yesterday" => "yesterday, H:i",  // выведет "вчера, 13:30", если дата прошлый день
					"d" => 'j F, H:i',                // выведет "9 июля, 13:30", если месяц прошел
					"" => 'j F Y',                    // выведет "9 июля 2012", если год прошел
					), $item_date, time());
					?>
				</time>
			</div>

			<h2 class="news__title"><a class="news__title-link" href="<?echo $arItem["URL"]?>"><?echo $arItem["TITLE_FORMATED"]?></a></h2>
			<p class="news__desc"><?echo $arItem["BODY_FORMATED"]?></p>
		</div>
	</article>
<?endforeach;?>

<?if($arParams["DISPLAY_BOTTOM_PAGER"] != "N") echo $arResult["NAV_STRING"]?>
</div>



<?else:?>
	<?ShowNote(mymessage("SEARCH_NOTHING_TO_FOUND"));?>
<?endif;?>



