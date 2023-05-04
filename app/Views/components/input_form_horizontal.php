{assign var="readonly" value={$read|default:''}}
{if $read|default:'' eq "readonly"}
	{assign var="style_readonly" value="style='background-color:#F0F0F0 !important;'"}
{else}
	{assign var="style_readonly" value=""}
{/if}


<div class="form-group row">
	<label class="col-sm-3 col-form-label">{$label} {if $required|default:'' eq "true"}<font color="red">*</font>{/if}</label>
	<div class="{$class_width|default:'col-sm-9'}">
		{if $type eq 'select'}
			<select id="{$id|default:''}" name="{$name|default:''}" class="form-control {$class|default:''}">
				{$option|default:''}
			</select>
		{elseif $type eq 'select_chosen'}
			<select id="{$id|default:''}" name="{$name|default:''}" class="form-control {$class|default:''}">
				{$option|default:''}
			</select>
		{elseif $type eq 'text'}
			<input {$readonly} {$style_readonly} type="text" class="form-control {$class|default:''}" id="{$id|default:''}" name="{$name|default:''}" value="{$value|default:''}" style="{$style_obj|default:''}" />	
		{elseif $type eq 'file'}
			<input {$readonly} type="file" class="{$class|default:''}" id="{$id|default:''}" name="{$name|default:''}" style="{$style_obj|default:''}"  />
			{if $value|default:''}
				<a href='{$path}{$value}' target='_blank'>Lihat File</a>
			{/if}
		{elseif $type eq 'pwd'}
			 <div class="input-group">
				<input type="password" class="form-control {$class|default:''}" id="{$id|default:''}" name="{$name|default:''}" value="{$value|default:''}" />
				<span class="input-group-addon">
					<a href="javascript:void(0);" onclick="konversi_pwd_text('{$id}')">Show</a>
				</span> 
			 </div>
		{elseif $type eq 'textarea'}
			<textarea class="form-control {$class|default:''}" id="{$id|default:''}" name="{$name|default:''}">{$value|default:''}</textarea>
		{/if}
	</div>
</div>

<script>
	{if $type eq 'textarea'}
		CKEDITOR.config.toolbar = [
		    [
				'Styles','Format','Font','FontSize','Bold','Italic','Underline','StrikeThrough','-', 'Table',
				'Undo','Redo','-','Cut','Copy','Paste','Find','Replace','-','Outdent','Indent','-',
				'Print','NumberedList','BulletedList','-',
				'JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'
			],
		];
	
		CKEDITOR.replace( '{$id}' );
	{/if}

	
	{if $type eq 'select_chosen'}
		$("#{$id}").chosen( { width: "100%" } );
		//$("#{$id}").chosen( { width: "inherit" } );
	{/if}
</script>