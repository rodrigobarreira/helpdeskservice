<?php
    /*if  ($session->check('Message.auth')) $session->flash('auth');*/
    echo $form->create('Usuario', array('action' => 'login'));
    echo $form->input('matricula', array('label' => 'Matrícula', 'class'));
    echo $form->input('senha', array('type' => 'password'));
    echo $form->end('Login');
?>
