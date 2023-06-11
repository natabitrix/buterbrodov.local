<?/*Вставить строчку ниже в header.php?>
<?include($_SERVER['DOCUMENT_ROOT'].'/local/php_interface/admin_panel.php');?>
<?*/?>

<?if($USER->IsAdmin()):?>
<?
if(isset($_GET['hide_panel']) && $_GET['hide_panel']=='Y')
	$_SESSION['hide_panel'] = 'Y';
elseif(isset($_GET['hide_panel']) && $_GET['hide_panel']=='N')
	$_SESSION['hide_panel'] = 'N';
$hide_panel = ($_SESSION['hide_panel'] == 'Y') ? true : false;
$hide_panel_href = ($hide_panel) ? '?hide_panel=N&bitrix_include_areas=Y' : '?hide_panel=Y&bitrix_include_areas=N';
$hide_panel_symbol = ($hide_panel) ? '+' : '-';

if(isset($_GET['relative_header']) && $_GET['relative_header']=='Y')
	$_SESSION['relative_header'] = 'Y';
elseif(isset($_GET['relative_header']) && $_GET['relative_header']=='N')
	$_SESSION['relative_header'] = 'N';
$relative_header = ($_SESSION['relative_header'] == 'Y') ? true : false;
$relative_header_href = ($relative_header) ? '?relative_header=N' : '?relative_header=Y';
?>
<div id="panel" <?if($hide_panel):?>style="display:none"<?endif?>><?$APPLICATION->ShowPanel();?></div>
<a href="<?=$hide_panel_href?>"  class="admin_link hide_panel" title="Спрятать/показать админ-панель"><?=$hide_panel_symbol?></a>
<style>
<?if($relative_header):?>.header__navbar{position:relative}<?endif?>
	a.admin_link{position:fixed;z-index:1000;bottom:0;left:0;width:30px;height:30px;display:block;background:#ccc;opacity:.1;border:1px dashed #000;text-align:center;text-decoration:none}
a.admin_link:hover{opacity:1}
</style>



<?
/*if(isset($_GET['BANNER']) && $_GET['BANNER']=='Y') //показать баннеры
$_SESSION['SHOW_BANNER'] = 'Y';
elseif(isset($_GET['BANNER']) && $_GET['BANNER']=='N') //скрыть баннеры
	$_SESSION['SHOW_BANNER'] = 'N';
$show_banner = ($_SESSION['SHOW_BANNER'] == 'Y') ? true : false;
$show_banner_href = ($show_banner) ? $APPLICATION->GetCurPageParam("BANNER=N",array("BANNER")) : $APPLICATION->GetCurPageParam("BANNER=Y",array("BANNER"));
?>
<a href="<?=$show_banner_href?>"  class="banner_link" title="скрыть/показать баннеры"></a>
<style>
a.banner_link{position:fixed;z-index:1000;bottom:30px;left:0;width:30px;height:30px;display:block;background:#ccc;opacity:.1;border:1px dashed #000}
a.banner_link:hover{opacity:1}
</style>
<?*/?>

<?endif?>