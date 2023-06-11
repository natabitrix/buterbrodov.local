<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

//printArr($arResult["ITEMS"]);

//вытаскиваем торговые предложения
$arSKU = CCatalogSku::GetInfoByProductIBlock($arParams['IBLOCK_ID']);

$arSelect = Array("ID", "NAME", "PROPERTY_CML2_LINK", "PROPERTY_IMAGE", "PROPERTY_BARCODE", "PROPERTY_PACKAGE", "PROPERTY_WEIGHT", "PROPERTY_NEW", "PROPERTY_GOST");
$arFilter = Array("IBLOCK_ID" => $arSKU["IBLOCK_ID"], "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "PROPERTY_CML2_LINK" => $arResult["ID"]);
$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
$arOffers = array();
while($arFields = $res->GetNext())
{
	//printArr($arFields);
	$arOffers[]= $arFields;
}

$arResult["OFFERS"] = $arOffers;



