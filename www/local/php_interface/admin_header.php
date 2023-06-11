<?
global $USER, $APPLICATION;
$page = $APPLICATION->GetCurPage(false);

CJSCore::Init(array("jquery"));

?>

<link href="/bitrix/css/main/font-awesome.css" type="text/css" rel="stylesheet" />

<script>

/*view svg files as image iblock props*/
BX.addCustomEvent("onFileIsBound",function (id, res, caller, node) {
	if(res.ext == "svg") {
		var placeHolder = node.getElementsByClassName("adm-fileinput-item-preview-icon");
		placeHolder[0].innerHTML = '<img src="'+res.file.real_url+'">';	
	}
});
//BX.addCustomEvent("onFileIsAppended",function (id, res, caller, node) {console.log(res)});
$(document).ready(function(){
/*view svg files as image uf props*/
	$('.adm-input-file-ex-wrap').each(function(){
		var a = $(this).find('a');
		var path = a.attr('href');
		var ext = path.substr( (path.lastIndexOf('.') +1) );
		if(ext == "svg")
			a.html('<img src="'+path+'">')
	});
});



function getURLParameter(url, name) {
    return (RegExp(name + '=' + '(.+?)(&|$)').exec(url)||[,null])[1];
}
String.prototype.replaceAll = function(s1, s2) {
    return this.replace(
        new RegExp(  s1.replace(/[.^$*+?()[{\|]/g, '\\$&'),  'g'  ),
        s2
    );
};



$(document).ready(function(){

$arTitleChain = [];
$('#main_navchain .adm-navchain-item').each(function(){
	if($(this).text().length > 0)
		$arTitleChain.push($(this).text());
});

$arTitleChain.reverse();
$title_chain = $arTitleChain.join(" / ");

//$('title').text($('title').text().replace("Редактирование файла ", "")+$title_chain);
$('title').text($title_chain);

$arTitleChainShort = [];
$.each($arTitleChain, function(i,v){
	if(i < 3){
		$arTitleChainShort.push(v);
	}
});
$title_chain_short = $arTitleChainShort.join(" / ");

$('.adm-detail-title').append(' <small style="font-size:80%;color:#999">'+$title_chain_short+'</small>');


<?if(!isset($_GET["USER_TYPE_ID"]) || empty($_GET["USER_TYPE_ID"]) || $_GET["USER_TYPE_ID"] == 'string'):?>

if($('select#USER_TYPE_ID').html() != undefined)
{
	$('#USER_TYPE_ID').val("string");
	$('input[name="SETTINGS[SIZE]"]').val("52");
	$('input[name="SETTINGS[ROWS]"]').val("2");
}
<?endif?>



	$('input[name="EDIT_FORM_LABEL[ru]"]').on('input',function(){
		var val = $(this).val();
		$('input[name="LIST_COLUMN_LABEL[ru]"]').val(val);
		$('input[name="LIST_FILTER_LABEL[ru]"]').val(val);
	});
	$('input[name="FIELD_NAME"]').on('input',function(){
		var val = $(this).val();
		$('input[name="HELP_MESSAGE[ru]"]').val(val);
	});
		


	$('#bx-panel-view-tab').attr("target","_blank");


	$('textarea[name="PREVIEW_TEXT"], textarea[name="DETAIL_TEXT"], textarea[name="DESCRIPTION"]').css('height','100px');

	$('.adm-detail-content-table > tbody > tr > td.adm-detail-content-cell-l').css({'width':'40%'});
	$('.adm-detail-content-table > tbody > tr > td.adm-detail-content-cell-r table td ').css({'text-align':'left'});


	<?if($page == "/bitrix/admin/iblock_edit.php" && !isset($_GET["ID"])):?>
	<?$dir = "#SITE_DIR#";?>
	$('input[name="LIST_PAGE_URL"]').val('/<?=$dir?>/#IBLOCK_CODE#/');
	$('input[name="SECTION_PAGE_URL"]').val('/<?=$dir?>/#IBLOCK_CODE#/#SECTION_CODE_PATH#/');
	$('input[name="DETAIL_PAGE_URL"]').val('/<?=$dir?>/#IBLOCK_CODE#/#SECTION_CODE_PATH#/#ELEMENT_CODE#.html');
	$('select[name="FIELDS[ACTIVE_FROM][DEFAULT_VALUE]"]').val('=now');
	$('input[name="FIELDS[CODE][DEFAULT_VALUE][TRANSLITERATION]"]').attr('checked',true);
	$('input[name="FIELDS[SECTION_CODE][DEFAULT_VALUE][TRANSLITERATION]"]').attr('checked',true);
	$('select[name="GROUP[2]"]').val('R');

	$('input[name="LID[]"]#s2').attr('checked',true);

	<?endif?>

	<?//if($_SERVER['REMOTE_ADDR'] == '109.106.139.64'):?>
	$('#_global_menu_desktop .adm-submenu-item-name-link').each(function(){
		var href = $(this).attr('href');
		var path = getURLParameter(href, 'path');
		path = decodeURIComponent(path);
		//path = $.replace('');
		//console.log(path);
		$(this).attr('title',path);
		//var templatepath = "/local/templates/jonas/components/";
		//console.log(path.indexOf("template.php"));
		//if(path.indexOf("template.php")>-1)
		var template_names = ['jonas','mobile','buterbrodov'];
		var replaces = ['local/','php_interface/','templates/', 'compontents/'];
	

		if(path[0] == '/')
			path = path.substring(1);
		
		$.each(replaces,function(i,val){
			path = path.replace(val, '')
		});
			
		if(path.indexOf(".php")>-1 || path.indexOf(".css")>-1 || path.indexOf(".js")>-1)
		{
			namepath = path;
			
			//namepath = namepath.replace(templatepath,'');
			//namepath = namepath.replace('bitrix/','');
			//namepath = namepath.replace('custom/','');
			//namepath = namepath.replace('/template.php','');
			//namepath = namepath.split('/').join(':');
			//namepath = namepath.split('/')[0];
			//$(this).children('span:last-child').text("tpl: "+namepath);
			
			var arr_path = namepath.split('/');
			var new_str = "";
			$.each(arr_path,function(i,val){
				var elem = "";
				if($.inArray(val,template_names) > -1) {
					elem = "/<b>"+val+"</b>";
				}
				else
					elem = "/<span>"+val+"</span>";
				
				new_str += elem;
			})
			
			$(this).children('span:last-child').html(new_str);
		}
	});
	<?//endif?>

	$(document).on("contextmenu", '#_global_menu_content > .adm-sub-submenu-block:lt(-2):gt(0) .adm-submenu-item-name-link', function(event) { 
		var a = $(this);
		var href = a.attr('href');
		var IBLOCK_ID = getURLParameter(href, 'IBLOCK_ID');
		var find_section_section = getURLParameter(href, 'find_section_section');
		var type = getURLParameter(href, 'type');

		var parent_href = a.closest('.adm-sub-submenu-block-children').prev('.adm-submenu-item-name').children('.adm-submenu-item-name-link').attr('href');
		var parent_sect = getURLParameter(parent_href, 'find_section_section');

		var edit_sect_url = '/bitrix/admin/iblock_section_edit.php?IBLOCK_ID='+IBLOCK_ID+'&type='+type+'&ID='+find_section_section+'&lang=ru&find_section_section='+parent_sect;
		var add_sect_url = '/bitrix/admin/iblock_section_edit.php?IBLOCK_ID='+IBLOCK_ID+'&type='+type+'&ID=0&lang=ru&IBLOCK_SECTION_ID='+find_section_section+'&find_section_section='+find_section_section+'&from=iblock_list_admin';
		var add_element_url = '/bitrix/admin/iblock_element_edit.php?IBLOCK_ID='+IBLOCK_ID+'&type='+type+'&ID=0&lang=ru&IBLOCK_SECTION_ID='+find_section_section+'&find_section_section='+find_section_section+'&from=iblock_list_admin';
		$('.edit_sect').remove();
		var edit_sect = '<div class="edit_sect"><i></i>'+
					'<a href="'+href+'"><i class="fa fa-folder-open-o" aria-hidden="true"></i><i class="fa fa-folder-open-o" style="opacity:0" aria-hidden="true"></i>Открыть</a>' + 
					'<a href="'+href+'" target="_blank" class="blank"><i class="fa fa-folder-open-o" aria-hidden="true"></i><i class="fa fa-external-link" aria-hidden="true"></i>Открыть в новой вкладке</a>' + 
					'<a href="'+add_sect_url+'" class="add"><i class="fa fa-folder-o" aria-hidden="true"></i><i class="fa fa-plus" aria-hidden="true"></i>Добавить раздел</a>' + 
					'<a href="'+add_element_url+'" class="add"><i class="fa fa-file-o" aria-hidden="true"></i><i class="fa fa-plus" aria-hidden="true"></i>Добавить элемент</a>' + 
					'<a href="'+edit_sect_url+'" class="edit"><i class="fa fa-folder-o" aria-hidden="true"></i><i class="fa fa-pencil" aria-hidden="true"></i>Изменить</a>' + 
					'<a href="'+edit_sect_url+'" class="edit" target="_blank"><i class="fa fa-folder-o" aria-hidden="true"></i><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Изменить в новой вкладке</a>' + 
				'</div>';
		a.parent().append(edit_sect);

		var mouse_is_inside = false;
		$('.edit_sect').on({mouseenter:function(){
				mouse_is_inside=true;
			}, mouseleave:function(){
				mouse_is_inside=false;
			}
		});
		$('body').click(function(){
			if(!mouse_is_inside) {
				$('.edit_sect').remove();
			}
		});

		return false;
	});


	var main_grid_header_th_active_num;
	$('.main-grid-table .main-grid-header th').each(function(){
		 $('.main-grid-table thead.main-grid-header th').each(function(){
			if($(this).data("name") == "ACTIVE"){
				main_grid_header_th_active_num = $(this).index();
				console.log(main_grid_header_th_active_num);
			}
			 
		});
	});
	
	$('.main-grid-table .main-grid-row td').each(function(){
		if($(this).index() == main_grid_header_th_active_num && $(this).text() == "Нет"){
			$(this).parent('tr').find('span').css({'opacity':0.4});
		}
	});



// /bitrix/admin/iblock_list_admin.php?IBLOCK_ID=1&type=content&lang=ru&find_section_section=4
// /bitrix/admin/iblock_section_edit.php?IBLOCK_ID=1&type=content&ID=4&lang=ru&find_section_section=0
// /bitrix/admin/iblock_section_edit.php?IBLOCK_ID=1&type=content&ID=0&lang=ru&IBLOCK_SECTION_ID=4&find_section_section=4&from=iblock_list_admin
// /bitrix/admin/iblock_element_edit.php?IBLOCK_ID=7&type=content&ID=0&lang=ru&IBLOCK_SECTION_ID=0&find_section_section=0&from=iblock_list_admin
});



</script>

<style>


.settings-form select{
	min-width:200px;
}


.edit_sect {
	position: absolute;
	width: 230px;
	height: 200px;
	z-index: 9999;
	background: white;
	padding: 6px 0px 18px;
	left: 50%;
	margin-left: -100px;
	border: solid 1px #d5e1e4;
	border-radius: 4px;
	-webkit-box-shadow: 0 18px 20px rgba(72, 93, 99, 0.3);
	box-shadow: 0 18px 20px rgba(72, 93, 99, 0.3);
}
.edit_sect >i {
	display: block;
	position: absolute;
	height: 10px;
	width: 25px;
	content: "";
	line-height: 1px;
	font-size: 1px;
	padding: 0 ;
	margin: 0;
	background: url(/bitrix/panel/main/images/popup_menu_sprite_2.png) no-repeat;
	background-position: 6px -1480px;
	top:-10px;
	left:20px;
}
.edit_sect a {
	display: block;
	margin: 5px 0;
	padding: 5px 20px 5px 20px ;
	color: black;
	text-decoration: none;
	position:relative;
	border-top: solid 1px #fff;
}
.edit_sect a i:first-child{
    font-size: 16px;
    width: 15px;
    display: inline-block;
}
.edit_sect a i:last-child{
    left: -7px;
    position: relative;
    background: white;
    padding: 1px;
    top: 4px;
    width: 10px;
    display: inline-block;
    font-size: 11px;
    text-align: center;
}
.edit_sect a:hover {
	background: #ebf2f4 !important;
	border-top: solid 1px #e3eaec;
}
.edit_sect a:hover i{
	background: #ebf2f4 !important;
}



.adm-detail-content-table > tbody > tr[id^="tr_PROPERTY_"] > td.adm-detail-content-cell-l,
.adm-detail-content-table > tbody > tr[id^="tr_PROPERTY_"] > td.adm-detail-content-cell-r{
	padding-top:20px
}

.bxce .bxce-highlight .bxce-tag{
	color:#E8BF6A;
}
.bxce .bxce-highlight .bxce-meta{
	color:red
}
.bxce .bxce-highlight .bxce-attribute{
	color:#BABABA;
}
.bxce .bxce-highlight .bxce-string{
	color:#A5C261
}
<?
$editor_height = 600;
$editor_height_big = 900;
?>
.bxce{
	min-height:<?=$editor_height?>px
}
.bxce-scroller{
	min-height:<?=$editor_height?>px
}

@media (min-height: 1000px) {
.bxce{
	min-height:<?=$editor_height_big?>px
}
.bxce-scroller{
	min-height:<?=$editor_height_big?>px
}
}
</style>


