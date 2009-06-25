<div id="loadAjax"
	style="position: absolute; margin-left: 250px; display: none;"><?php echo $html->image('LoadAjax.gif');?>
</div>
<div class="usuarios form"><?php echo $form->create('Usuario', array('url' => '/admin/usuarios/alterar'));?>
<fieldset><?php
echo $form->input('id', array(
			'type' => 'text',
			'div' => array ('class' => 'campoBloqueado'),

));
echo $form->input('grupo_id', array(
			'type' => 'select',
			'div' => array ('class' => 'campo'),

));
echo $form->input('setor_id', array(
			'type' => 'select',
			'div' => array ('class' => 'campo')
));
echo $form->input('matricula', array(
			'div' =>'campo'
			));
			echo $form->input('nome', array(
			'div' => 'campo',
			'style' => 'width: 300px;'
			));
			echo $form->input('senha', array(
			'div' => array ('class' => 'campo'),
			'type' => 'hidden'
			));
			echo $form->input('email', array(
			'div' => array ('class' => 'campo'),
			'style' => 'width: 220px;'
			));
			echo $form->input('celular', array(
			'div' => array ('class' => 'campo')
			));
			echo $form->input('telefone', array(
			'div' => array ('class' => 'campo')
			));
			echo $form->input('ramal', array(
			'div' => array ('class' => 'campo'),
			'style' => 'width: 130px;'
			));
			echo $form->input('ativo', array(
			'div' => array ('class' => 'campo')
			));
			echo $form->input('data_cadastro', array(
			'div' => array ('class' => 'campo'),
			'type' => 'hidden'
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

