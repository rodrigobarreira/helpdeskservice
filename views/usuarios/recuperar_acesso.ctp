<div id="form_recuperar_acesso">
<?php

    echo $form->create('Usuario', array('action' => 'login'));
    echo $form->input('matricula', array('label' => 'Matr�cula', 'class'));
    echo $form->input('e-mail', array('type' => 'text'));
    echo $form->end('Login');
?>
</div>