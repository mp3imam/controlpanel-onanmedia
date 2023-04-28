<style type="text/css">
	.datagrid-row-over td{
		background:#D0E5F5;
	}
	.datagrid-row-selected td{
		background:#FBEC88;
		color:#000;
	}
</style>

<div class="row" style="margin-bottom:0px !important;">	
	<div class="col-lg-12" id="grid_parent_{$main}">
		<div id='grid_{$main}'></div>
	</div>
</div>

<script>
$(function(){
	$('#grid_parent_{$main}').css({
		//'height': (getClientHeight()-165)
		'height':( {$height_grid|default:'getClientHeight()-165'} )
	});
	heighttree = (getClientHeight()-165)+'px';
	
	{if $jenis_grid eq 'grid'}
		genGridOnan('{$main}','grid_{$main}', '', '', "{$id_param|default:''}");
	{else}
		genTreeGrid('{$main}','grid_{$main}', '', heighttree, "{$id_param|default:''}");
	{/if}
});
</script>