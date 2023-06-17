<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
//printArr($arResult);
//echo '<pre>' . print_r($arParams,1) . '</pre>';
//echo '<pre>' . print_r($arResult,1) . '</pre>';
//echo '<pre>' . print_r($arResult["FORM_ERRORS"],1) . '</pre>';
?>
<div class="arenda__form">


<div class="loader">
<div class="loader_animation">
<div class="floatingCirclesG">
	<div class="f_circleG frotateG_01"></div>
	<div class="f_circleG frotateG_02"></div>
	<div class="f_circleG frotateG_03"></div>
	<div class="f_circleG frotateG_04"></div>
	<div class="f_circleG frotateG_05"></div>
	<div class="f_circleG frotateG_06"></div>
	<div class="f_circleG frotateG_07"></div>
	<div class="f_circleG frotateG_08"></div>
</div>
</div>
</div>

<?if($arResult["FORM_ERRORS"]):?>
<?foreach($arResult["FORM_ERRORS"] as $error):?>
	<div class="error">
	<?=$error?>
	</div>
<?endforeach;?>
<?endif;?>

<?
$FORM_HEADER = $arResult["FORM_HEADER"];
$FORM_HEADER = str_replace('<form', '<form class="form', $FORM_HEADER);
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
			$errReplace = GetMessage("FORM_ERROR_TEXT");
			if($FIELD_SID == "SOGLASIE") 
				$errReplace = GetMessage("FORM_ERROR_AGREE");
			$error = str_replace($default_err, $errReplace, $errStr);
		}

		$placeholder = $arResult["arQuestions"][$FIELD_SID]["COMMENTS"];
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
			$input = str_replace('inputtextarea', $input_class, $input);
			$input = str_replace('inputtext', $input_class, $input);
			
			$input = str_replace('<input', '<input placeholder="'.$placeholder.'"', $input);
			$input = str_replace('<textarea', '<textarea placeholder="'.$placeholder.'"', $input);

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
		
		//$input_name = "form_".$arQuestion["STRUCTURE"][0]["FIELD_TYPE"]."_".$arQuestion["STRUCTURE"][0]["ID"];
		
		$row_class = "form-row mb-5";
		if($is_checkbox_or_radio) $row_class = "form-check mb-3";
		if($is_file) $row_class = "my-4";
		?>
		
<div class="<?=$row_class?>"<?if($error):?> title="<?=$error?>"<?endif;?><?if($FIELD_SID == "EVENT" || $FIELD_SID == "PAKET"):?> style="display:none"<?endif?>>

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
			<?elseif($is_file):?>
				<div class="row-file">
					<div class="file_output"></div>
				<?foreach($arQuestion["STRUCTURE"] as $key => $arr):?>
					<?
					$label_descr = "";
					$file_type = "text";
					if($arr["FIELD_PARAM"]=="file_type_text") $label_descr = "txt или docx до 500 МБ";
					if($arr["FIELD_PARAM"]=="file_type_img") {
						$label_descr = "jpeg, mov или mp4 до 500 МБ";
						$file_type = "img";
					}
					//$input_id = "form_".$arr["FIELD_TYPE"]."_".$arr["ID"];
					?>
					
					<label for="<?=$input_id?>" class="btn-file">
						<input type="file" class="input_file input_file<?=$key?>" name="form_<?=$arr["FIELD_TYPE"]?>_<?=$arr["ID"]?>" id="<?=$input_id?>" data-file-type="<?=$file_type?>">
						<div class="label-text ic ic_text"><?=$arQuestion["CAPTION"];?></div>
						<div class="label-description"><?=$label_descr?></div>
					</label>
					
				<?endforeach?>
				
				</div>
			<?else:?>
				<label for="<?=$input_id?>"><?=$caption?></label>
				<?=$input;?>

			<?endif;?>

		</div>
	<?
	}
} //endwhile
?>


	<div class="text-center">
		<input type="submit" name="web_form_submit" class="btn btn__accent mt-4" value="<?=$arResult["arForm"]["BUTTON"]?>">
	</div>


	<?=$arResult["FORM_FOOTER"]?>
	
	
	<?if ($arResult["isFormNote"] == "Y"):?>
	
	<?endif?>

</div>


<script>
<?if ($arResult["isFormNote"] == "Y"):?>

<?endif?>
</script>







