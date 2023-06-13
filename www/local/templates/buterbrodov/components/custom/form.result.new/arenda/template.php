<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$formNote = $arResult["isFormNote"] == "Y";
?>


<div class="container">
<div class="arenda__form">


<?/*if($arResult["isFormErrors"] == "Y"):?><?=$arResult["FORM_ERRORS_TEXT"];?><?endif;*/?>
<?//echo '<pre>' . print_r($arResult,1) . '</pre>';?>



<div class="thank"<?if(!$formNote):?> style="display:none"<?endif;?>>
	<div class="form_note">
		<div class="h3">
		Ваша заявка отправлена. Наш менеджер свяжется с вами
			в течение 24 часов или раньше<br>
		</div>
	</div>
</div>

<div class="error-msg"></div>

<?
//if($arResult["isFormNote"] != "Y")
//{
?>

<?
//echo '<pre>' . print_r($arResult,1) . '</pre>';
$FORM_HEADER = str_replace('<form', '<form novalidate class="form needs-validation"', $arResult["FORM_HEADER"]);
?>

<?=$FORM_HEADER?>

	<input type="hidden" name="FORM_NAME" value="<?=$arResult["arForm"]["SID"]?>">
	<input type="hidden" name="token" id="token<?=$arResult["arForm"]["ID"]?>">
	<input type="hidden" name="action" id="action<?=$arResult["arForm"]["ID"]?>">

	<div class="row">

	<?
	foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
	{
		//if($USER && $USER->IsAdmin()) echo '<pre>' . print_r($arQuestion,1) . '</pre>';
		//if($USER && $USER->IsAdmin()) echo '<pre>' . print_r($arResult["arQuestions"][$FIELD_SID],1) . '</pre>';

		if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden')
		{
			echo $arQuestion["HTML_CODE"];
		}
		else
		{
			$is_error = (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS']));

			$is_checkbox = (in_array($arQuestion["STRUCTURE"][0]["FIELD_TYPE"],array("checkbox")));

			$is_file = ($arQuestion["STRUCTURE"][0]["FIELD_TYPE"]=="file") ? true : false;
			
			$input = $arQuestion["HTML_CODE"];

			if(!in_array($arQuestion["STRUCTURE"][0]["FIELD_TYPE"],array("radio","checkbox"))) 
			{
				$inputID = $arResult["arForm"]["SID"].'_'.$FIELD_SID;
				$input = str_replace('<input', '<input id="'.$inputID.'"', $input);
				$input = str_replace('<textarea', '<textarea id="'.$inputID.'"', $input);
				
				$input = str_replace(array('class="inputtext"', 'class="inputtextarea"'), '', $input);
	
				if($arQuestion["REQUIRED"] == "Y") 
				{
					$input = str_replace('<input', '<input required', $input);
					$input = str_replace('<textarea', '<textarea required', $input);
				}

				if($FIELD_SID == "PHONE") 
				{
					$input = str_replace('type="text"', 'type="tel"', $input);
				}


				$input = str_replace('<span class="bx-input-file-desc"></span>', '', $input);
				$input = str_replace('size="0"', '', $input);
			}

			$input_name = "form_".$arQuestion["STRUCTURE"][0]["FIELD_TYPE"]."_".$arQuestion["STRUCTURE"][0]["ID"];

			$class = "col-lg-6";
			$required = "";

			if($FIELD_SID == "AREA")
			{
				$input = str_replace(array('<br>','<br />'), "", $input);
				$input = str_replace('<input', '<input class="sm"', $input);
			}

			if($FIELD_SID == "FIO")
			{
				$class = "col-12";
			}

			if($FIELD_SID == "AGREE")
			{
				$class = "col-12 form-field-agree";
			}
			//if($arQuestion["REQUIRED"] == "Y")
			//	$required = " required";
		?>
		

		<? //echo '<pre>' . print_r($arQuestion,1) . '</pre>';?>
		<? //echo '<pre>' . print_r($arQuestion[STRUCTURE][0][FIELD_TYPE],1) . '</pre>';?>


		<?if($FIELD_SID == "FIO"):?>
			<div class="col-sm-12">
				<div class="h4">Контактное лицо</div>
			</div>
		<?endif;?>
				
				
		<div class="<?=$class?> field-<?=strtolower($FIELD_SID)?><?if ($is_error):?> error<?endif?>"<?if($is_error):?> title="<?=$arResult["FORM_ERRORS"][$FIELD_SID]?>"<?endif;?>>
			<div class="form-row">

		<?
		//swich input type custom style
		if($is_checkbox):?>
			<div class="caption">
				<?=$arQuestion["CAPTION"];?>
			</div>
			<?foreach($arQuestion["STRUCTURE"] as $arr):?>
			<?
			$required = ($arQuestion["REQUIRED"] == "Y") ? 'required' : '';
			?>
			<div class="form-field check">
                <label for="<?=$arr["FIELD_TYPE"]?>_<?=$arr["ID"]?>_<?=$arParams["FORM_INDEX"]?>" class="form-check-label">
					<input type="<?=$arr["FIELD_TYPE"]?>" class="form-check-input" id="<?=$arr["FIELD_TYPE"]?>_<?=$arr["ID"]?>_<?=$arParams["FORM_INDEX"]?>" name="form_<?=$arr["FIELD_TYPE"]?>_<?=$FIELD_SID?><?if($is_checkbox):?>[]<?endif?>" value="<?=$arr["ID"]?>"<?=$required?>>
					<span></span>
					<div>
					<?=$arr["MESSAGE"]?>
					</div>
				</label>
			</div>
			<?endforeach?>
		<?/*elseif($is_file):////////////////////////////////////////////////file?>
			<div class="form-field file">
				<?=$input;?>
				<label for="<?=$inputID?>">Прикрепить файл</label>
			</div>
			<p><?=$arResult["arQuestions"][$FIELD_SID]["COMMENTS"]?></p>
		<?*/?>
		<?else:?>
			<label><?=$arQuestion["CAPTION"];?></label>
			<div class="form-field">
				<?=$input;?>
			</div>
		<?endif;//end swich input type custom style?>



	<?/*if($is_error):?>
			<?$error_text = ($FIELD_SID=="AGREE") ? "" : "Поле необходимо заполнить"?>
			<span class="error-msg" title="<?=$arResult["FORM_ERRORS"][$FIELD_SID]?>"><?=$error_text?></span>
	<?endif;*/?>


			</div><?//form-row?>
		</div>
		<?

		}
	} //endwhile
	?>


	</div><!--.row-->
	
	
	
	<div class="captcha">
		<?if(defined('RE_SITE_KEY')):?><!--div class="g-recaptcha" id="captcha<?=$arParams["FORM_INDEX"]?>" data-sitekey="<?=RE_SITE_KEY?>"></div--><?endif;?>
		<?if (is_array($arResult["FORM_ERRORS"]) && array_key_exists("recaptcha", $arResult['FORM_ERRORS'])):?>
		<span class="error-fld" title="<?=$arResult["FORM_ERRORS"]["recaptcha"]?>"><?=$arResult["FORM_ERRORS"]["recaptcha"]?></span>
		<?endif;?>
	</div>


	<div class="form-row button">
		<input class="btn" type="submit" name="web_form_submit" value="<?=$arResult["arForm"]["BUTTON"]?>">
	</div>

<?=$arResult["FORM_FOOTER"]?>

</div><?//arenda__form?>
</div><?//container?>






<script>
	<?if(defined('RE_SITE_KEY')):?>
	grecaptcha.ready(function() {
		grecaptcha.execute('<?=RE_SITE_KEY?>', {action: 'form_<?=$arResult["arForm"]["SID"]?>'})
			.then(function(token) {
				if (token) {
					document.getElementById('token<?=$arResult["arForm"]["ID"]?>').value = token;
					document.getElementById('action<?=$arResult["arForm"]["ID"]?>').value = 'form_<?=$arResult["arForm"]["SID"]?>';
				}
			});
	});
	<?endif;?>

		//ajaxForm(document.getElementsByName('<?=$arResult['arForm']['SID']?>')[0], '<?=$templateFolder?>/ajax.php')

/*	
<?if (is_array($arResult["FORM_ERRORS"]) && count($arResult['FORM_ERRORS'])>0):?>
	$('.checks input').on('change', function(){
		
		if($(this).is(':checked'))
		{
			$(this).parents('.checks').removeClass('error')
		}
		else
		{
			$(this).parents('.checks').addClass('error')
		}
	});
	
	$('.form-control').on('blur', function(){
		if($(this).val()=="")
		{
			$(this).parents('.form-group').addClass('error');
			$(this).parents('.form-group').find('.error-fld').css('opacity',1);
		}
	});
	$('.form-control').on('focus', function(){
		
		if($(this).parents('.form-group').hasClass('error'))
		{
			$(this).parents('.form-group').removeClass('error');
			$(this).parents('.form-group').find('.error-fld').css('opacity',0);
		}
	});
<?endif?>

<?if($formNote):?>$('.order_form').find('.contact').hide()<?endif;?>
*/
</script>



<?
//} //endif (isFormNote)
?>


