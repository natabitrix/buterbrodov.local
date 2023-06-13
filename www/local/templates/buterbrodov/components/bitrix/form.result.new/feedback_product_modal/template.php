<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
// kintArr($arResult);
?>


<?if ($arResult["isFormNote"] != "Y"):?>

	<?/*if($arResult["FORM_ERRORS"]):?>
	<?foreach($arResult["FORM_ERRORS"] as $error):?>
		<div class="error mb-2" style="color:#d30b0d">
		<?=$error?>
		</div>
	<?endforeach;?>
	<?endif;*/?>

	<h5 class="modal-title" id="feedbackFormModalLabel"><?=$arResult["FORM_TITLE"]?></h5>

	<?
	$FORM_HEADER = $arResult["FORM_HEADER"];
	$FORM_HEADER = str_replace('<form', '<form class="form needs-validation" novalidate', $FORM_HEADER);
	echo $FORM_HEADER;
	?>
	<input type="hidden" name="token" id="token<?=$arResult["arForm"]["ID"]?>">
	<input type="hidden" name="action" id="action<?=$arResult["arForm"]["ID"]?>">
	<input type="hidden" name="tpl" value="<?=$arParams["COMPONENT_TEMPLATE"]?>">
	<?
	foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion)
	{
		if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden')
		{
			echo $arQuestion["HTML_CODE"];
		}
		else
		{
			$error = false;  
			if (is_array($arResult["FORM_ERRORS"]) && array_key_exists($FIELD_SID, $arResult['FORM_ERRORS']))
			{
				$errStr = $arResult["FORM_ERRORS"][$FIELD_SID];
				$default_err = "Не заполнены следующие обязательные поля:";
				$errReplace = GetMessage("FORM_ERROR_TEXT_HINT");
				if($FIELD_SID == "SOGLASIE") 
					$errReplace = GetMessage("FORM_ERROR_AGREE");
				$error = str_replace($default_err, $errReplace, $errStr);
			}

			//$placeholder = $arResult["arQuestions"][$FIELD_SID]["COMMENTS"];
			$caption = $arQuestion["CAPTION"];

			$is_checkbox_or_radio = (in_array($arQuestion["STRUCTURE"][0]["FIELD_TYPE"],array("radio","checkbox")));
			$is_checkbox = (in_array($arQuestion["STRUCTURE"][0]["FIELD_TYPE"],array("checkbox")));
			$is_radio = (in_array($arQuestion["STRUCTURE"][0]["FIELD_TYPE"],array("radio")));
			$radio_switch_style = ($is_radio && count($arAnswers) == 2);
			
			$is_file = (in_array($arQuestion["STRUCTURE"][0]["FIELD_TYPE"],array("file")));

			$input = $arQuestion["HTML_CODE"];
			if(!$is_checkbox_or_radio) 
			{
				$input_id = $arResult["arForm"]["SID"].'_'.$FIELD_SID;
				
				$input = str_replace('<input', '<input id="'.$input_id.'"', $input);
				$input = str_replace('<textarea', '<textarea id="'.$input_id.'"', $input);
				
				$input_class = 'form-control '.$FIELD_SID;
				if($error) $input_class .= ' is-invalid';
				if($FIELD_SID == "NAME") $input_class .= ' sm';

				$input = str_replace('inputtextarea', $input_class, $input);
				$input = str_replace('inputtext', $input_class, $input);
				$input = str_replace('inputfile', $input_class, $input);

				$input = str_replace('<input', '<input placeholder="'.$caption.'"', $input);
				$input = str_replace('<textarea', '<textarea placeholder="'.$caption.'"', $input);

				if($arQuestion["REQUIRED"] == "Y") 
				{
					$input = str_replace('<input', '<input required', $input);
					$input = str_replace('<textarea', '<textarea required', $input);
				}
				
				$input = str_replace('<span class="bx-input-file-desc"></span>', '', $input);
				$input = str_replace('size="0"', '', $input);

				if(strpos($FIELD_SID,"PHONE") !== false)
				{
					$input = str_replace('<input', '<input data-mask="+7 (___) ___-__-__"', $input);
					$input = str_replace('type="text"', 'type="tel"', $input);
				}
			}

			$row_class = "form-row mb-3";
			if($is_checkbox_or_radio) $row_class = "form-check";
			//if($FIELD_SID == "") $row_class = "";
			?>

			<div class="<?=$row_class?>"<?if($error):?> title="<?=$error?>"<?endif;?>>

				<?if($is_checkbox_or_radio):?>
					<?foreach($arQuestion["STRUCTURE"] as $arr):?>
						<?
						$input_id = $arResult["arForm"]["SID"].'_'.$FIELD_SID.'_'.$arr["ID"];

						$input_class = 'form-check-input';
						if($error) $input_class .= ' is-invalid';
						
						$required = ($arQuestion["REQUIRED"] == "Y") ? " required" : "";
						?>

						<input type="<?=$arr["FIELD_TYPE"]?>" id="<?=$input_id?>" name="form_<?=$arr["FIELD_TYPE"]?>_<?=$FIELD_SID?><?if($is_checkbox):?>[]<?endif?>" value="<?=$arr["ID"]?>" class="<?=$input_class?>"<?=$required?>>
						<label for="<?=$input_id?>" class="form-check-label"><?=$arr["MESSAGE"]?></label>

					<?endforeach?>

				<?else:?>
				
                    <div class="form-floating">
						<?=$input;?>
						<label for="<?=$input_id?>"><?=$caption?></label>
                    </div>

					<?if($is_file && $arResult["arQuestions"][$FIELD_SID]["COMMENTS"]):?><div><small><?=$arResult["arQuestions"][$FIELD_SID]["COMMENTS"]?></small></div><?endif?>

				<?endif;?>

				<?if($error):?><div class="error"><span>!</span><?=GetMessage("FORM_ERROR_TEXT")?></div><?endif;?>
			</div>

		<?
		}
	} //endwhile
	?>



	
	<input type="submit" name="web_form_submit" class="btn btn__black" value="<?=$arResult["arForm"]["BUTTON"]?>">
	
	

				
	<?=$arResult["FORM_FOOTER"]?>
<?endif;?>


<?if ($arResult["isFormNote"] == "Y"):?>

<div class="success-note">
	<div class="modal-title"><?=GetMessage("FORM_SUCCESS_TEXT")?></div>
</div>

<?endif;?>





<script data-skip-moving="true">
var feedBackformJSParams = new Object();
feedBackformJSParams = {
	"form": 'form[name="<?=$arResult["arForm"]["SID"]?>"]',
	"ajax_url": "<?=$templateFolder?>/ajax.php"
}
</script>




