
{if $btn_goyz|default:'false' eq 'true'}
	<a href="{$href|default:'javascript:void(0);'}"  target='{$target|default:''}' class="btn btn-sm {$style_btn|default:'btn-success'}" group="" id="{$id_na|default:'add'}_{$acak}" onClick="{$click|default:''}" style="{$style|default:''}">{$text}</a> 
{else}
	<button type="submit" href="javascript:void(0);" id="{$id_na}" class="btn btn-sm {$style_btn|default:'btn-success'}">
		{$text|default:'Simpan'}
	</button>
{/if}