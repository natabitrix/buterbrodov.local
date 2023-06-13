<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();


/**
 * @global CMain $APPLICATION
 */

global $APPLICATION;

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '';

$strReturn .= '<div class="bx-breadcrumb" itemscope itemtype="http://schema.org/BreadcrumbList">';

$itemSize = count($arResult);
for($index = 0; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);
	$class = " d-none";
	$button_title = $title;
	if($index == $itemSize-2)
	{
		// $button_title = ($index > 0 ? 'Назад' : 'Все бренды');
		// $button_title = $APPLICATION->ShowViewContent('back_button_text');
		$button_title = 'Назад';
		$class = "";
	}

	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
		$strReturn .= '
			<div class="'.$class.'" id="bx_breadcrumb_'.$index.'" itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
				<a href="'.$arResult[$index]["LINK"].'" title="'.$title.'" itemprop="item" class="btn back-button-catalog-">
					<img src="'.SITE_TEMPLATE_PATH.'/assets/img/icons/arrow-left.svg" alt="←" class="icon">
					<span itemprop="name" class="d-none d-lg-block">'.$button_title.'</span>
				</a>
				<meta itemprop="position" content="'.($index + 1).'" />
			</div>';
	}

}

$strReturn .= '</div>';

return $strReturn;


