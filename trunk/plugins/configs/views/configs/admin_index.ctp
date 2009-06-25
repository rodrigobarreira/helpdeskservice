<h2>Config Values</h2>

<?php
echo $form->create('Configs',array('action' => 'save' ));
?>
<table>
	<thead>
		<tr>
			<th>Name</th>
			<th>Value</th>
		</tr>
	</thead>
	<tfoot>
		<tr>
			<td><?php echo $form->input('ConfigsConfig.0.name',array('label'=>false)); ?>
			</td>
			<td><?php echo $form->input('ConfigsConfig.0.value',array('label'=>false)); ?>
			</td>
		</tr>
		<tr>
			<td colspan="2"><?php echo $form->submit(); ?></td>
		</tr>
	
	
	<tbody>
	<?php
	$i = 1;
	foreach($configs as $config) {
		$form->data = $config;
		echo "<tr>";
		echo "<td>" . $form->input('ConfigsConfig.'.$i.'.id') . $form->input('ConfigsConfig.'.$i.'.name',array('label'=>false)) . "</td>";
		echo "<td>" . $form->input('ConfigsConfig.'.$i.'.value',array('label'=>false)) . "</td>";
		echo "<td>" . $html->link('Delete','delete/'.$config['ConfigsConfig']['id'],null,'Are your sure?') . "</td>";
		echo "</tr>";
		$i++;
}
 ?>
	</tbody>
</table>
