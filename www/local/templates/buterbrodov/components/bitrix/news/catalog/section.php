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
//printArr($arResult);
?>



<?$APPLICATION->ShowViewContent('decor_top');?>

<main class="main">

	<?$APPLICATION->IncludeComponent("bitrix:catalog.section.list", "section", Array(
			"VIEW_MODE" => "TEXT",	// Вид списка подразделов
			"SHOW_PARENT_NAME" => "Y",	// Показывать название раздела
			"IBLOCK_TYPE" => "",	// Тип инфоблока
			"IBLOCK_ID" => $arParams["IBLOCK_ID"],	// Инфоблок
			"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],	// ID раздела
			"SECTION_CODE" => "",	// Код раздела
			"SECTION_URL" => "",	// URL, ведущий на страницу с содержимым раздела
			"COUNT_ELEMENTS" => "N",	// Показывать количество элементов в разделе
			"TOP_DEPTH" => "2",	// Максимальная отображаемая глубина разделов
			"SECTION_FIELDS" => "",	// Поля разделов
			"SECTION_USER_FIELDS" => array("UF_*"),	// Свойства разделов
			"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
			"CACHE_TYPE" => "A",	// Тип кеширования
			"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
			"CACHE_NOTES" => "",
			"CACHE_GROUPS" => "Y",	// Учитывать права доступа
			"SHOW_TITLE" => "Y",
		),
		false
	);?>


	<?
	/*section detail*/
	/*$arSection = array();
	if ($arResult["VARIABLES"]["SECTION_ID"] > 0)
	{
		// Создаем объект для работы с кешем (способ кеширования задается в .settings.php)
		$obCache = Bitrix\Main\Data\Cache::createInstance();
		// Время жизни кеша, в секундах
		$timeout = 3600;
		// Уникальный ключ для кешированных данных на основании входных данных
		$cacheKey = md5( $arParams["IBLOCK_ID"].$arResult["VARIABLES"]["SECTION_ID"]);
		// Путь относительно /bitrix/cache/
		// Т.о. можно сбросить часть, а не весь кеш проекта.
		// Для этого надо удалить папку /bitrix/cache/my/section/
		$cacheDir = "/my/section/";
	
		// Если кэш валиден
		if( $obCache->InitCache( $timeout, $cacheKey, $cacheDir ) )
		{
			// Извлекаем данные из кэша
			$arSection = $obCache->GetVars();
		}
		// Если кэш невалиден
		elseif( $obCache->StartDataCache()  )
		{
			$arFilter = Array('IBLOCK_ID'=>$arParams["IBLOCK_ID"], 'ID' => $arResult["VARIABLES"]["SECTION_ID"]);
			$res = CIBlockSection::GetList(Array($by=>$order), $arFilter, true, array("DESCRIPTION","UF_*"));
			if($arRes = $res->GetNext())
			{
				$arSection = $arRes;
				if($arSection['UF_THEME_COLOR'])
				{
					$rsEnum = CUserFieldEnum::GetList(array(), array("ID" => $arSection['UF_THEME_COLOR'])); 
					if($arEnum = $rsEnum->GetNext())
						$arSection['THEME_COLOR'] = $arEnum["XML_ID"];
				}
	
			}
			// Сохраняем данные в кэш
			$obCache->EndDataCache( $arSectionResult );
		}
	}*/
	?>



    <div class="products">

        <?$APPLICATION->ShowViewContent('decor_products');?>

        <div class="products-wrapper">
            <div class="products-inner">
                <div class="container">
                    <div class="h2">Продукция</div>


					<?$APPLICATION->IncludeComponent(
						"bitrix:news.list",
						"products_list",
						Array(
							"PARENT_SECTION" => $arResult["VARIABLES"]["SECTION_ID"],


							"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
							"IBLOCK_ID" => $arParams["IBLOCK_ID"],
							"NEWS_COUNT" => $arParams["NEWS_COUNT"],
							"SORT_BY1" => $arParams["SORT_BY1"],
							"SORT_ORDER1" => $arParams["SORT_ORDER1"],
							"SORT_BY2" => $arParams["SORT_BY2"],
							"SORT_ORDER2" => $arParams["SORT_ORDER2"],
							"FIELD_CODE" => $arParams["LIST_FIELD_CODE"],
							"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
							"DISPLAY_PANEL" => $arParams["DISPLAY_PANEL"],
							"SET_TITLE" => $arParams["SET_TITLE"],
							"SET_LAST_MODIFIED" => $arParams["SET_LAST_MODIFIED"],
							"MESSAGE_404" => $arParams["MESSAGE_404"],
							"SET_STATUS_404" => $arParams["SET_STATUS_404"],
							"SHOW_404" => $arParams["SHOW_404"],
							"FILE_404" => $arParams["FILE_404"],
							"INCLUDE_IBLOCK_INTO_CHAIN" => $arParams["INCLUDE_IBLOCK_INTO_CHAIN"],
							"ADD_SECTIONS_CHAIN" => $arParams["ADD_SECTIONS_CHAIN"],
							"CACHE_TYPE" => $arParams["CACHE_TYPE"],
							"CACHE_TIME" => $arParams["CACHE_TIME"],
							"CACHE_FILTER" => $arParams["CACHE_FILTER"],
							"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
							"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
							"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
							"PAGER_TITLE" => $arParams["PAGER_TITLE"],
							"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
							"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
							"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
							"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
							"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],
							"PAGER_BASE_LINK_ENABLE" => $arParams["PAGER_BASE_LINK_ENABLE"],
							"PAGER_BASE_LINK" => $arParams["PAGER_BASE_LINK"],
							"PAGER_PARAMS_NAME" => $arParams["PAGER_PARAMS_NAME"],
							"DISPLAY_DATE" => $arParams["DISPLAY_DATE"],
							"DISPLAY_NAME" => "Y",
							"DISPLAY_PICTURE" => $arParams["DISPLAY_PICTURE"],
							"DISPLAY_PREVIEW_TEXT" => $arParams["DISPLAY_PREVIEW_TEXT"],
							"PREVIEW_TRUNCATE_LEN" => $arParams["PREVIEW_TRUNCATE_LEN"],
							"ACTIVE_DATE_FORMAT" => $arParams["LIST_ACTIVE_DATE_FORMAT"],
							"USE_PERMISSIONS" => $arParams["USE_PERMISSIONS"],
							"GROUP_PERMISSIONS" => $arParams["GROUP_PERMISSIONS"],
							"FILTER_NAME" => $arParams["FILTER_NAME"],
							"HIDE_LINK_WHEN_NO_DETAIL" => $arParams["HIDE_LINK_WHEN_NO_DETAIL"],
							"CHECK_DATES" => $arParams["CHECK_DATES"],
							"STRICT_SECTION_CHECK" => $arParams["STRICT_SECTION_CHECK"],
							//"PARENT_SECTION" => $arResult["SECTION"]["ID"],

							"PARENT_SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
							"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["detail"],
							"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
							"IBLOCK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["news"],
						),
						$component
					);?>

                </div>
            </div>
        </div>
		
    </div>

</main>



