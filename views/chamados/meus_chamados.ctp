<script type="text/javascript">
<?php 
echo $ajax->remoteFunction(array(
	'url' => array ('controller' => 'chamados', 'action'=>'meusChamadosAbertos'),
	'update' => 'chamadosAbertos',
	'indicator' => 'loadAjax'
));
?>
</script>


<div id="chamadosAbertos" style="width: 100%"></div>
