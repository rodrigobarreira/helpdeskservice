<style>
.flexigrid div.fbutton .add {
	background: url(../js/jquery/flexigrid/css/images/add.png) no-repeat
		center left;
}

.flexigrid div.fbutton .delete {
	background: url(../js/jquery/flexigrid/css/images/close.png) no-repeat
		center left;
}
</style>

<?php



//($grid_chamados);
echo $javascript->link('jquery/jquery');
echo $javascript->link('jquery/flexigrid/flexigrid.js');
//echo $javascript->link('jquery/flexigrid/flexigrid.pack.js');
echo $html->css('../js/jquery/flexigrid/css/flexigrid/flexigrid.css');
//Debugger::dump($grid_chamados);
//pr($grid_chamados)
?>
<table id="flex1"
	style="display: none"></table>
<script type="text/javascript">
//alert("TESTE");

jQuery.noConflict();

$ = jQuery;

$(document).ready(function() {
	$('.flexme1').flexigrid();
	$('.flexme2').flexigrid({height:'auto',striped:false});

	$("#flex1").flexigrid({
		url: '<?php echo $html->url('/home/gridMeusChamados/1');?>',
		dataType: 'xml',
		colModel : [
			{display: 'Id', name : 'chamado_id', width : 40, sortable : true, align: 'center'},
			{display: 'Solicintante', name : 'solicitante_nome', width : 180, sortable : true, align: 'left'},
			{display: 'Printable Name', name : 'solicitante_id', width : 120, sortable : true, align: 'left'},
			{display: 'ISO3', name : 'solicitante_setor_id', width : 130, sortable : true, align: 'left', hide: true},
			{display: 'Number Code', name : 'solicitante_setor_nome', width : 80, sortable : true, align: 'right'}
			],
		buttons : [
			{name: 'Add', bclass: 'add', onpress : 'test'},
			{name: 'Delete', bclass: 'delete', onpress : 'test'},
			{separator: true}
			],
		searchitems : [
			{display: 'ISO', name : 'iso'},
			{display: 'Name', name : 'name', isdefault: true}
			],
		sortname: "solicitante_id",
		sortorder: "asc",
		usepager: true,
		title: 'Countries',
		useRp: true,
		rp: 15,
		showTableToggleBtn: true,
		width: 700,
		height: 200
	});		
});  
</script>
