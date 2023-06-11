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
	<?$APPLICATION->IncludeComponent("bitrix:main.userconsent.request", "", Array(
		"AUTO_SAVE" => "Y",	// Сохранять автоматически факт согласия
			"COMPOSITE_FRAME_MODE" => "A",	// Голосование шаблона компонента по умолчанию
			"COMPOSITE_FRAME_TYPE" => "AUTO",	// Содержимое компонента
			"ID" => "2",	// Соглашение
			"IS_CHECKED" => "N",	// Галка согласия проставлена по умолчанию
			"IS_LOADED" => "Y",	// Загружать текст соглашения сразу
			"COMPONENT_TEMPLATE" => ".default"
		),
		false
	);?>
	</form>

</div>
<!--.wrapper-->


</body>

</html>