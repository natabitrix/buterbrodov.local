<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Бутербродов");
?>


<?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH."/include_home_page_content.php", Array(), Array(
    "MODE"      => "php",
    "NAME"      => "",
    "TEMPLATE"  => ""
));?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>

