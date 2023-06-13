<?
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

// printArr($arResult);

//вытаскиваем торговые предложения
$arSKU = CCatalogSku::GetInfoByProductIBlock($arParams['IBLOCK_ID']);

$arSelect = Array("ID", "NAME", "PROPERTY_CML2_LINK", "PROPERTY_IMAGE", "PROPERTY_BARCODE", "PROPERTY_PACKAGE", "PROPERTY_WEIGHT", "PROPERTY_NEW", "PROPERTY_GOST");
$arFilter = Array("IBLOCK_ID" => $arSKU["IBLOCK_ID"], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "PROPERTY_CML2_LINK" => $arResult["ID"]);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
$arOffers = array();
while($arFields = $res->GetNext())
{
	//printArr($arFields);
	$arOffers[] = $arFields;
}

$arResult["OFFERS"] = $arOffers;


//достаем UF_ поля родительского раздела для наследования цвета темы и декора
//printArr($arResult["SECTION"]["PATH"]);

$arSectionIDs = array();
foreach($arResult["SECTION"]["PATH"] as $arSection)
{
	$arSectionIDs[] = $arSection["ID"];
}

$arSections = array();
$arFilter = Array('IBLOCK_ID' => $arParams["IBLOCK_ID"], "ID" => $arSectionIDs);
$res = CIBlockSection::GetList(Array($by=>$order), $arFilter, true, array("ID", "NAME", "IBLOCK_SECTION_ID", "SECTION_PAGE_URL", "UF_*"));
while($arRes = $res->GetNext())
{
	//достаем XML_ID списка цветов вместо ID
	if($arRes['UF_THEME_COLOR'])
	{
		$rsEnum = CUserFieldEnum::GetList(array(), array("ID" => $arRes['UF_THEME_COLOR'])); 
		if($arEnum = $rsEnum->GetNext())
			$arRes['UF_THEME_COLOR'] = $arEnum["XML_ID"];
	}
	$arSections[$arRes["ID"]] = $arRes;
}

//printArr($arSections);

$arResult["SECTION"]["CURRENT"] = $arSections[$arResult["IBLOCK_SECTION_ID"]];
if(count($arResult["SECTION"]["PATH"]) > 1)
{
	$arResult["SECTION"]["PARENT"] = $arSections[$arResult["SECTION"]["CURRENT"]["IBLOCK_SECTION_ID"]];
	//меняем поля на родительские, если в данном разделе они не заполнены
	foreach($arResult["SECTION"]["CURRENT"] as $key => $value) 
	{
		if( (strpos($key, "UF_") !== false) && (!$value || $value == "" || (is_array($value) && count($value) == 0)) )
		{
			$arResult["SECTION"]["CURRENT"][$key] = $arResult["SECTION"]["PARENT"][$key]; 
		}
	}
}


//printArr($arResult);



