<div id="form_login">
<?php

    echo $form->create('Usuario', array('action' => 'login'));
    echo $form->input('matricula', array('label' => 'Matr�cula', 'class'));
    echo $form->input('senha', array('type' => 'password'));
    echo $form->end('Login');
?>
</div>