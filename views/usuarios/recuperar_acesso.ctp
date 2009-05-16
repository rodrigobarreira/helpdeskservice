<div id="form_recuperar_acesso">
<?php

    echo $form->create('Usuario', array('action' => 'recuperarAcesso'));
    echo $form->input('matricula', array('label' => 'Matr&iacute;cula', 'class'));
   
    echo $form->end('Enviar');
?>
</div>