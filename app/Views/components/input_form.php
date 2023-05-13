{assign var="readonly" value={$read|default:''}}
{if $read|default:'' eq "readonly"}
	{assign var="style_readonly" value="style='background-color:#fff !important;'"}
{else}
	{assign var="style_readonly" value=""}
{/if}

{assign var="multiple" value='' }
{if $multi|default:'' eq "multiple"}
	{assign var="multiple" value='multiple="multiple"'}
{/if}

<div class="row" id="{$id|default:''}_parent">
	<div class="{$class_width|default:'col-lg-12'}">
		<div class="form-group">
			<label>{$label} {if $required|default:'' eq "true"}<font color="red">*</font>{/if}</label>
			{if $type eq 'select'}
				{assign var="requirednya" value=''}
				{if $required|default:'' eq "true"}
					{assign var="requirednya" value='required="true"'}
				{/if}
				
				<select id="{$id|default:''}" name="{$name|default:''}" {$multiple} {* $requirednya *} class="form-control form-control-sm {$class|default:''}">
					{$option|default:''}
				</select>
			{elseif $type eq 'select2_multiple'}
				{assign var="requirednya" value=''}
				{if $required|default:'' eq "true"}
					{assign var="requirednya" value='required="true"'}
				{/if}
			
				<select id="{$id|default:''}" multiple="multiple" name="{$name|default:''}" {$multiple} {$requirednya} class="form-control form-control-sm {$class|default:''}">
					{$option|default:''}
				</select>
				<label class="validation_error_message" for="{$name|default:''}"></label>	
			{elseif $type eq 'select2'}
				{assign var="requirednya" value=''}
				{if $required|default:'' eq "true"}
					{assign var="requirednya" value='required="true"'}
				{/if}
			
				<select id="{$id|default:''}" name="{$name|default:''}" {$multiple} {$requirednya} class="form-control {$class|default:''}">
					{$option|default:''}
				</select>
				<label class="validation_error_message" for="{$name|default:''}"></label>	
			{elseif $type eq 'time'}
				<div class="bootstrap-timepicker">
					<div class="form-group">
						<div class="input-group">
							<input {$readonly} {$style_readonly} autocomplete="off" type="text" class="form-control pull-right timepicker {$class|default:''}" id="{$id|default:''}" name="{$name|default:''}" value="{$value|default:'00:00'}" style="{$style_obj|default:''}" />
							<div class="input-group-addon">
								<i class="fa fa-clock-o"></i>
							</div>
						</div>
					</div>
				</div>	
			{elseif $type eq 'date'}
				<div class="input-group date">
					<div class="input-group-addon">
						<i class="fa fa-calendar"></i>
					</div>
					<input {$readonly} {$style_readonly} autocomplete="{$auto|default:'off'}" type="text" placeholder="{$placeholder|default:''}" class="form-control pull-right tanggalnya {$class|default:''}" id="{$id|default:''}" name="{$name|default:''}" value="{$value|default:''}" style="{$style_obj|default:''}" />
				</div>
				<label for="tanggal_mulai" class="validation_error_message"></label>
			{elseif $type eq 'text'}
				<input {$readonly} {$style_readonly} autocomplete="{$auto|default:'on'}" type="text" placeholder="{$placeholder|default:''}" class="form-control form-control-sm {$class|default:''}" id="{$id|default:''}" name="{$name|default:''}" value="{$value|default:''}" style="{$style_obj|default:''}" />
			{elseif $type eq 'file'}
				<input {$readonly} type="file" class="{$class|default:''}" id="{$id|default:''}" name="{$name|default:''}" style="{$style_obj|default:''}"  />
			{elseif $type eq 'pwd'}
				 <div class="input-group">
					<input type="password" class="form-control {$class|default:''}" id="{$id|default:''}" name="{$name|default:''}" value="{$value|default:''}" />
					<span class="input-group-addon">
						<a href="javascript:void(0);" onclick="konversi_pwd_text('{$id}')">Show</a>
					</span> 
				 </div>
			{elseif $type eq 'textarea'}
				<textarea class="form-control {$class|default:''}" id="{$id|default:''}" name="{$name|default:''}">{$value|default:''}</textarea>
			{elseif $type eq 'textarea_wysig'}
				<textarea class="form-control {$class|default:''}" id="{$id|default:''}" name="{$name|default:''}">{$value|default:''}</textarea>
			{/if}
		</div>
	</div>
</div>

<script>
	{if $type eq 'time'}
		$('.timepicker').timepicker({
			showInputs: false,
			showMeridian: false
		});
	{/if}
	{if $type eq 'date'}
		$('.tanggalnya').datepicker({ 
			format: 'yyyy-mm-dd',
			orientation:'auto',
			changeMonth: true,
			changeYear: true,
			yearRange: "c-80:c+10",
			dayNamesMin: ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'],
			monthNamesShort: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
		});
	{/if}
	
	{if $type eq 'select2_multiple'}
		$("#{$id}").select2({
			width: '100%',
		});
	{/if}
	{if $type eq 'select2'}
		$("#{$id}").select2({
			width: '100%',
		});
	{/if}
	
	{if $type eq 'textarea_wysig'}
		CKEDITOR.config.toolbar = [
		   ['Styles','Format','Font','FontSize','Link','Unlink'],
		   '/',
		   ['Bold','Italic','Underline','StrikeThrough','-','Undo','Redo','-','Cut','Copy','Paste','Find','Replace','-','NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
		];
		CKEDITOR.replace( '{$id}', {
			height:'300px',
			shiftEnterMode : CKEDITOR.ENTER_P,
			enterMode : CKEDITOR.ENTER_BR
		} );
	{/if}
</script>
