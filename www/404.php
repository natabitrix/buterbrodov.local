<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Страница не найдена");

$APPLICATION->AddViewContent('pageClasses', " page-404");
?>

    <main class="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="content">
                        <h1>Страница
                            не найдена</h1>
                        <a href="/" class="btn">Перейти на главную</a>                     
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="animations__decor">
                        <div class="animations__decor-speak animations__speak animate-in-view">

                            Ошибочка вышла
                        </div>
                        <div class="animations__decor-cow">
                            <div class="animations__cow2 animations__cow_stand">
                                <?$APPLICATION->IncludeFile(SITE_TEMPLATE_PATH."/include/animations/cow2.svg", Array(), Array("SHOW_BORDER"=>false));?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>