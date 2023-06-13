<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

/** @var array $arParams */
/** @var array $arResult */

$config = \Bitrix\Main\Web\Json::encode($arResult['CONFIG']);
$page = $APPLICATION->GetCurPage(false);
?>




<label data-bx-user-consent="<?=htmlspecialcharsbx($config)?>" class="main-user-consent-request" style="display:none">
	<input type="checkbox" value="Y" <?=($arParams['IS_CHECKED'] ? 'checked' : '')?> name="<?=htmlspecialcharsbx($arParams['INPUT_NAME'])?>" class="btn main-user-consent-request-btn">
	<span class="main-user-consent-request-announce"><?=htmlspecialcharsbx($arResult['INPUT_LABEL'])?></span>
</label>


<script type="text/html" data-bx-template="main-user-consent-request-loader">
	<div class="main-user-consent-request-popup" id="cookie_info">
		<div class="main-user-consent-request-popup-cont">
			<div class="main-user-consent-request-popup-body">
				<div data-bx-content="" class="main-user-consent-request-popup-content">
					<span class="main-user-consent-request-popup-textarea-block">
						<span class="main-user-consent-request-popup-text">
						<?=$arResult["CONFIG"]["text"]?>
						</span>
					</span>
					<span class="main-user-consent-request-popup-buttons">
						<span data-bx-btn-accept="" class="btn main-user-consent-request-popup-button main-user-consent-request-popup-button-acc">Y</span>
					</span>
				</div>
			</div>
		</div>
	</div>
</script>