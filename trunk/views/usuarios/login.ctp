<div id="form_login">
<?php

    echo $form->create('Usuario', array('action' => 'login'));
    echo $form->input('matricula', array('label' => 'Matrícula', 'class'));
    echo $form->input('senha', array('type' => 'password'));
    echo $form->end('Login');
?>
	
</div>

<?php 
echo $html->link('Recuperar Senha', array ('action' => 'recuperarAcesso'));
?>