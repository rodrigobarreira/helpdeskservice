<div class="form">
<fieldset style="width: 210px"><legend>Formulário de Troca de Senha</legend>

<?php
if  ($session->check('Message.auth')) $session->flash('auth');
echo $form->create('Usuario', array('action' => 'alterarSenha'));
echo '<div class="input text required" style="margin-left: 20px">';
echo $form->input('senha_atual', array(
    	'label' => 'Senha Atual',
    	'type' => 'password',
    	'maxlength' => '10',
));
echo '</div>';

echo '<div class="input text required" style="margin-left: 20px">';
echo $form->input('senha_nova', array(
    	'label' => 'Nova Senha',
    	'type' => 'password',
    	'maxlength' => '10',
));
echo '</div>';

echo '<div class="input text required" style="margin-left: 20px">';
echo $form->input('senha_confirmar', array(
    	'label' => 'Confirmar',
    	'type' => 'password',
    	'maxlength' => '10'
    	));
    	echo '</div>';
    	//echo $form->end('Alterar');
    	?></fieldset>
<fieldset style="text-align: left; width: 210px">

<div class="botao"><?php 
echo $form->button('Alterar',array(
		'type'=>'submit',
	    'url' => array(
	    	'controller' => 'usuarios',
	        'action' => 'alterarSenha'
	        ),
	        ));
	        ?></div>
<div class="botao"><?php 
echo $form->button('Voltar', array(
		'type'=>'button', 
		'id' => 'btnVoltar', 
		'onClick'=>'history.go(-1)',
));
?></div>
</fieldset>

</div>
