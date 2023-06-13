<?php
define("STOP_STATISTICS", true);
define("NO_KEEP_STATISTIC", true);
define("NO_AGENT_STATISTIC", true);
require($_SERVER["DOCUMENT_ROOT"] . '/bitrix/modules/main/include/prolog_before.php');
use Bitrix\Main\Loader;

global $USER;
if($USER->IsAdmin())
{
    if(Loader::includeModule('iblock'))
	{
        /*$query = CIBlockElement::GetList(array("ID" => "ASC"), array("ACTIVE" => "Y", "IBLOCK_ID" => 2), false, false, array('*'));
        $arResult = [];
        $i = 0;
        while ($element = $query->GetNextElement()){
            $arResult[$i] = $element->GetFields();
            $arResult[$i]["PROPERTIES"] = $element->GetProperties();
            $i++;
        }*/
    }
}
else
{ 
	header("HTTP/1.1 404 Not Found"); 
}