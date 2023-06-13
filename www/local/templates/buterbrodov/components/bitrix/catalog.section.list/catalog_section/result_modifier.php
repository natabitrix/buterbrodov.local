<?
/** CATALOG.SECTION.LIST/section/ */
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

//достаем поля родительского раздела
$arSections = array();

$arFilter = Array('IBLOCK_ID'=>$arParams["IBLOCK_ID"]);
$res = CIBlockSection::GetList(Array("SORT" => "ASC"), $arFilter, true, array("ID", "NAME", "IBLOCK_SECTION_ID", "SECTION_PAGE_URL", "DESCRIPTION", "UF_*"));
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


//достаем XML_ID списка цветов вместо ID для текущего раздела
if($arResult["SECTION"]["UF_THEME_COLOR"])
{
	$arResult["SECTION"]["UF_THEME_COLOR"] = $arSections[$arResult["SECTION"]["ID"]]["UF_THEME_COLOR"];
}

// kintArr($arSections);

if($arResult["SECTION"]["DEPTH_LEVEL"] > 1)
{
	$arResult["SECTION"]["PARENT"] = $arSections[$arResult["SECTION"]["IBLOCK_SECTION_ID"]];

	//printArr($arResult["SECTION"]["PARENT"]);

	//формируем массив дочерних разделов родительского раздела (соседних данного раздела)
	foreach($arSections as $id => $arSection)
	{
		if($arSection["IBLOCK_SECTION_ID"] == $arResult["SECTION"]["PARENT"]["ID"])
			$arResult["SECTION"]["PARENT"]["SECTIONS"][] =  $arSection;
	}

	//меняем поля на родительские, если в данном разделе они не заполнены
	foreach($arResult["SECTION"] as $key => $value) 
	{
		if( (strpos($key, "UF_") !== false || $key == "DESCRIPTION" || $key == "SECTIONS") && (!$value || $value == "" || (is_array($value) && count($value) == 0)) )
		{
			//kintArr($key);
			$arResult["SECTION"][$key] = $arResult["SECTION"]["PARENT"][$key]; 
		}
	}
}
else 
{

}


//достаем XML_ID списка цветов вместо ID для подразделов
if($arResult["SECTIONS"])
{
	foreach($arResult["SECTIONS"] as $key => $arSection)
	{
		if($arSection["UF_THEME_COLOR"])
		{
			$arResult["SECTIONS"][$key]["UF_THEME_COLOR"] = $arSections[$arSection["ID"]]["UF_THEME_COLOR"];
		}
		
	}
}



// kintArr($arResult);

?>