<?php
    if  ($session->check('Message.auth')) $session->flash('auth');
    echo $form->create('Usuario', array('action' => 'alterarSenha'));
    echo $form->input('senha_atual', array(
    	'label' => 'Senha Atual',
    	'type' => 'password',
    	'maxlength' => '10',
    ));
    echo $form->input('senha_nova', array(
    	'label' => 'Nova Senha',
    	'type' => 'password',
    	'maxlength' => '10',
    ));
    echo $form->input('senha_confirmar', array(
    	'label' => 'Confirmar',
    	'type' => 'password',
    	'maxlength' => '10'
    ));
    echo $form->end('Alterar');
?>
