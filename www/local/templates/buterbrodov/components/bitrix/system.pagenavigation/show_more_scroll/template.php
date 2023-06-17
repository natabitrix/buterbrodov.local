<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//echo '<pre>' . print_r($arResult,1) . '</pre>';
$params = str_replace($arResult["sUrlPath"], "", $arResult["sUrlPathParams"]); //удаляем путь из строки параметров чтобы вставить свой
?>

<?if($arResult["NavPageCount"] > 1):?>

    <?if ($arResult["NavPageNomer"]+1 <= $arResult["nEndPage"]):?>
        <?
            $nextPage = $arResult["NavPageNomer"]+1;
            $pageN = "PAGEN_".$arResult["NavNum"];

            $url = $params . $pageN ."=".$nextPage;

        ?>
		<button type="button" onclick="" class="btn load-more animate-in-view" data-url="<?=$url?>" data-pagen="<?=$pageN?>" data-next-page="<?=$nextPage?>">
			<span>показать ещё</span>
		</button>

    <?else:?>

<?//Загружено все?>


    <?endif?>

<?endif?>



