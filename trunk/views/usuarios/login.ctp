<?php
    if  ($session->check('Message.auth')) $session->flash('auth');
    echo $form->create('Usuario', array('controller' => 'usuarios', 'action' => 'login'));
    echo $form->input('matricula', array('label' => 'Matrícula'));
    echo $form->input('senha');
    echo $form->end('Login');
?>
