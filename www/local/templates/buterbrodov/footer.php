<?if($APPLICATION->GetProperty("is_text_page") == "Y"):?>
	<?
	$content_open_divs = 
	"\t".'<main class="main">'."\n".
	"\t\t".'<div class="container">'."\n".
	"\t\t\t".'<div class="text-content">'."\n";
	$APPLICATION->AddViewContent('content_open_divs', $content_open_divs);
	$APPLICATION->AddChainItem($APPLICATION->GetTitle(), $APPLICATION->GetCurPage(false));
	$APPLICATION->AddViewContent("pageClasses", "text-page");
	?>

			</div><!--.text-content-->
		</div><!--.container-->
	</main>
<?endif?>


<?if($ERROR_404!="Y"):?>
	<footer class="footer">
		
		<button type="button" id="scrollTopBtn" class="btn_scroll_top btn btn-simple btn__white">
			<div class="icon"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/icons/arrow-top.svg" alt="&uarr;"></div>
		</button>
	
	
		<div class="footer__wrapper">
	
			<div class="container">
	
				<div class="row footer__row-1">
					<div class="col-lg-3 col-xl-4 order-1 order-lg-0">
						<div class="footer__logo">
							<a class="footer__logo-link" href="https://jonas-spb.com/" target="_blank">
								<img src="<?=SITE_TEMPLATE_PATH?>/assets/img/logo_footer.svg" alt="Jonas">
							</a>
						</div>
					</div>
					<div class="col-lg-9 col-xl-8 order-0 order-lg-1">
						<div class="row">
							<div class="col-lg-6 d-flex align-items-center justify-content-center justify-content-lg-start">

								<?$APPLICATION->IncludeComponent("bitrix:news.list", "socnet_links", Array(
									"COMPONENT_TEMPLATE" => "",
										"IBLOCK_ID" => "22",	// Код информационного блока
										"NEWS_COUNT" => "10",	// Количество новостей на странице
										"SORT_BY1" => "SORT",	// Поле для первой сортировки новостей
										"SORT_ORDER1" => "ASC",	// Направление для первой сортировки новостей
										"SORT_BY2" => "SORT",	// Поле для второй сортировки новостей
										"SORT_ORDER2" => "ASC",	// Направление для второй сортировки новостей
										"PROPERTY_CODE" => array(	// Свойства
											0 => "ICON", 1 => "LINK",
										),
										"CACHE_TYPE" => "A",	// Тип кеширования
										"CACHE_TIME" => "36000000",	// Время кеширования (сек.)
										"CACHE_FILTER" => "N",	// Кешировать при установленном фильтре
										"CACHE_GROUPS" => "N",	// Учитывать права доступа
										"SET_TITLE" => "N",	// Устанавливать заголовок страницы
										"SET_BROWSER_TITLE" => "N",	// Устанавливать заголовок окна браузера
										"SET_META_KEYWORDS" => "N",	// Устанавливать ключевые слова страницы
										"SET_META_DESCRIPTION" => "N",	// Устанавливать описание страницы
										"SET_LAST_MODIFIED" => "N",	// Устанавливать в заголовках ответа время модификации страницы
										"INCLUDE_IBLOCK_INTO_CHAIN" => "N",	// Включать инфоблок в цепочку навигации
										"ADD_SECTIONS_CHAIN" => "N",	// Включать раздел в цепочку навигации
										"COMPOSITE_FRAME_MODE" => "A",	// Голосование шаблона компонента по умолчанию
										"COMPOSITE_FRAME_TYPE" => "AUTO",	// Содержимое компонента
										"DISPLAY_TOP_PAGER" => "N",	// Выводить над списком
										"DISPLAY_BOTTOM_PAGER" => "N",	// Выводить под списком
										"SET_STATUS_404" => "N",	// Устанавливать статус 404
										"SHOW_404" => "N",	// Показ специальной страницы
									),
									false
								);?>

							</div>

							<div class="col-lg-6 d-flex align-items-center justify-content-center justify-content-lg-end">

								<?$APPLICATION->IncludeComponent("bitrix:menu", "footer_menu", Array(
									"ROOT_MENU_TYPE" => "buterbrodov_footer_menu",	// Тип меню для первого уровня
										"MENU_CACHE_TYPE" => "A",	// Тип кеширования
										"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
										"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
										"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
										"MAX_LEVEL" => "1",	// Уровень вложенности меню
										"CHILD_MENU_TYPE" => "gostinydvor_menu",	// Тип меню для остальных уровней
										"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
										"DELAY" => "N",	// Откладывать выполнение шаблона меню
										"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
										"COMPONENT_TEMPLATE" => "tree",
										"MENU_THEME" => "site",
										"COMPOSITE_FRAME_MODE" => "AUTO",
										"COMPOSITE_FRAME_TYPE" => "AUTO"
									),
									false
								);?>
							</div>
						</div>
	
						<div class="row  d-none d-lg-block">
							<div class="col-lg-8">
								<div class="footer__info">
									<?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH."/include/footer/info.php", Array(), Array(
										"MODE"      => "html",
										"NAME"      => "footer info",
										"TEMPLATE"  => "text_include_template.php"
									));?>
								</div>
							</div>
						</div>
	
					</div>
				</div>
	
	
				<div class="row footer__row-2">
					<div class="col-lg-3 col-xl-4 footer__copy">
						<?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH."/include/footer/copyright.php", Array(), Array(
							"MODE"      => "html",
							"NAME"      => "footer copyright",
							"TEMPLATE"  => "text_include_template.php"
						));?>
						<?/*© 2023. ООО “Йонас СПБ”. <br class="d-none d-lg-block d-xl-none"> Все права защищены*/?>
	
						<div class="footer__info d-lg-none">
							<?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH."/include/footer/info.php", Array(), Array(
								"MODE"      => "html",
								"NAME"      => "footer info",
								"TEMPLATE"  => "text_include_template.php"
							));?>
						</div>

					</div>
					<div class="col-lg-5 col-xl-4 footer__links">
						<?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH."/include/footer/links.php", Array(), Array(
							"MODE"      => "html",
							"NAME"      => "footer links",
							"TEMPLATE"  => "text_include_template.php"
						));?>

					</div>
					<div class="col-lg-4 col-xl-4 d-flex justify-content-center justify-content-lg-end">
						<div class="footer__dev">
							Разработка <a href="https://twoi.digital/" target="_blank">TWOi Digital</a>
						</div>
					</div>
				</div>
	
			</div>
			
		</div>
	</footer>
<?endif?>



<?if($homePage):?>
	</div><!--.parallax-->
<?endif?>


	<form id="cookie_userconsent">
	<?$APPLICATION->IncludeComponent("bitrix:main.userconsent.request", "cookie", Array(
			"AUTO_SAVE" => "Y",	// Сохранять автоматически факт согласия
			"COMPOSITE_FRAME_MODE" => "A",	// Голосование шаблона компонента по умолчанию
			"COMPOSITE_FRAME_TYPE" => "AUTO",	// Содержимое компонента
			"ID" => "1",	// Соглашение
			"IS_CHECKED" => "N",	// Галка согласия проставлена по умолчанию
			"IS_LOADED" => "Y",	// Загружать текст соглашения сразу
			"COMPONENT_TEMPLATE" => ".default"
		),
		false
	);?>
	</form>

</div>
<!--.wrapper-->


<?if(strpos($APPLICATION->GetCurPage(false), "catalog/") !== false && substr($APPLICATION->GetCurPage(false), -5) == ".html"):?>
<div class="modal fade" id="feedbackFormModal" tabindex="-1" aria-labelledby="feedbackFormModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <button type="button" class="modal-close btn btn-simple" data-bs-dismiss="modal" aria-label="x"><img src="<?=SITE_TEMPLATE_PATH?>/assets/img/icons/modal_close.svg" alt="x"></button>
            <div class="modal-body">
				<div class="feedback_product__form form-placeholder">
					<?$APPLICATION->IncludeComponent("bitrix:form.result.new", "feedback_product_modal", Array(
							"WEB_FORM_ID" => "2",	// ID веб-формы
							"COMPONENT_TEMPLATE" => "feedback_product_modal",
							"IGNORE_CUSTOM_TEMPLATE" => "N",	// Игнорировать свой шаблон
							"USE_EXTENDED_ERRORS" => "Y",	// Использовать расширенный вывод сообщений об ошибках
							"SEF_MODE" => "N",	// Включить поддержку ЧПУ
							"CACHE_TYPE" => "A",	// Тип кеширования
							"CACHE_TIME" => "3600",	// Время кеширования (сек.)
							"LIST_URL" => "",	// Страница со списком результатов
							"EDIT_URL" => "",	// Страница редактирования результата
							"SUCCESS_URL" => "",	// Страница с сообщением об успешной отправке
							"CHAIN_ITEM_TEXT" => "",	// Название дополнительного пункта в навигационной цепочке
							"CHAIN_ITEM_LINK" => "",	// Ссылка на дополнительном пункте в навигационной цепочке
							"VARIABLE_ALIASES" => array(
								"WEB_FORM_ID" => "WEB_FORM_ID",
								"RESULT_ID" => "RESULT_ID"
							)
						),
						false
					);?>

				</div>
            </div>
        </div>
    </div>
</div>
<?endif?>


<?/*$this->SetViewTarget('OPEN_GRAPH');?>
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?=$arResult["IPROPERTY_VALUES"]["ELEMENT_META_TITLE"]?>" />
    <meta property="og:description" content="<?=$arResult["IPROPERTY_VALUES"]["ELEMENT_META_DESCRIPTION"]?>" />
    <meta property="og:url" content="<?=$arResult["DETAIL_PAGE_URL"]?>" />
    <meta property="og:image" content="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>" />
    <meta property="og:image:width" content="<?=$arResult["PREVIEW_PICTURE"]["WIDTH"]?>" />
    <meta property="og:image:height" content="<?=$arResult["PREVIEW_PICTURE"]["HEIGHT"]?>" />
<?$this->EndViewTarget();*/?>


</body>

</html>

<?
//$APPLICATION->AddViewContent('breadcrumb', $breadCrumbs);
?>