<script type="text/javascript">
<?php 
echo $ajax->remoteFunction(array(
	'url' => array ('controller' => 'chamados', 'action'=>'meusChamadosAbertos'),
	'update' => 'chamadosAbertos',
	'indicator' => 'loadAjax'
));
?>
</script>

<div id="loadAjax" style="position: absolute; margin-left: 250px;">
	<?php echo $html->image('LoadAjax.gif');?>
</div>

<div id="chamadosAbertos">
</div>
<div id="chamadosEncerrados">
<script type="text/javascript">
<?php 
echo $ajax->remoteFunction(array(
	'url' => array ('controller' => 'chamados', 'action'=>'meusChamadosEncerrados'),
	'update' => 'chamadosEncerrados'
));
?>
</script>
</div>