<div id="loadAjax"
	style="position: absolute; margin-left: 250px; display: none;"><?php echo $html->image('LoadAjax.gif');?>
</div>
<div class="setores form"><?php echo $form->create('Setor', array('url' => '/admin/setores/alterar'));?>
<fieldset><?php
echo $form->input('id', array(
			//'type' => 'select',
			'div' => array ('class' => 'campo'),
			'style' => 'width: 150px;'
			
			));
			echo $form->input('descricao', array(
			'type' => 'text',
			'div' => array ('class' => 'campo'),
			'style' => 'width: 200px;',
			'label' => 'Nome do Setor'
			));
			echo $form->input('atende_chamado', array(
			'div' => array ('class' => 'campo'),
			'style' => 'width: 120px;',
			'label' => 'Atende Chamado?',
			'type' => 'select',
			'options' => array(
				'1' => 'Sim',
				'2' => 'Não',
				)
			));
			?></fieldset>
<fieldset style="text-align: left;">

<div class="botao"><?php 
echo $form->button('Salvar',array(
		'type'=>'submit',
//'update'=>'main_conteudo',
//'url' => array(
//	'controller' => 'home',
//    'action' => 'abrirChamado'
//),
));
?></div>
<div class="botao"><?php 
echo $form->button('Cancelar', array(
		'type'=>'button', 
		'id' => 'btnVoltar', 
		'onClick'=>'history.go(-1)',
));
?></div>
</fieldset>

</div>

