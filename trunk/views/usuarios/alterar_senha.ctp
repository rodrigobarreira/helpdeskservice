<?php
    if  ($session->check('Message.auth')) $session->flash('auth');
    echo $form->create('Usuario', array('action' => 'alterarSenha'));
    echo '<div class="input text required">';
    echo $form->input('senha_atual', array(
    	'label' => 'Senha Atual',
    	'type' => 'password',
    	'maxlength' => '10',
    ));
    echo '</div>';
    
    echo '<div class="input text required">';
    echo $form->input('senha_nova', array(
    	'label' => 'Nova Senha',
    	'type' => 'password',
    	'maxlength' => '10',
    ));
    echo '</div>';
    
    echo '<div class="input text required">';
    echo $form->input('senha_confirmar', array(
    	'label' => 'Confirmar',
    	'type' => 'password',
    	'maxlength' => '10'
    ));
    echo '</div>';
    echo $form->end('Alterar');
?>
