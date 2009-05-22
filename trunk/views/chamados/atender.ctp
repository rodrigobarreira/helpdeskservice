<div class="chamados form">
<?php //pr($solicitante);
//echo  '/atendimento/atenderChamado/'.$chamado['Chamado']['id'];?>
<?php echo $form->create('Chamado', array(
		'url'=> '/atendimento/atenderChamado/'.$chamado['Chamado']['id'],
	
	));?>
	<fieldset>
 		<legend><?php __('Atender Chamado');?></legend>
 		<fieldset>
 			<legend><?php __('Dados do Solicitante');?></lSolicitanteSolicitanteegend>
 			<?php  
 			echo $form->input('Usuario.id', array(
				'readonly' => 'readonly',
				'label' => 'Nome',
				'value' => $solicitante['Usuario']['nome'],
				'type' => 'text',
				
			));
			
			echo $form->input('Usuario.setor_id', array(
				'readonly' => 'readonly',
				'label' => 'Setor',
				'value' => $solicitante['Setor']['descricao'],
				'type' => 'text'
			));
			
			echo $form->input('Usuario.telefone', array(
				'readonly' => 'readonly',
				'label' => 'Telefone',
				'value' => $solicitante['Usuario']['telefone'],
				'type' => 'text'
			));
			?>
 		</fieldset>
 		<fieldset>
 			<legend><?php __('Dados do Chamado');?></legend>
 			<?php
			echo $form->input('id', array(
				'readonly' => 'readonly',
				'label' => 'Número',
				'value' => $chamado['Chamado']['id'],
				'type' => 'text'
			));
			
			echo $form->input('prioridade_id', array(
				'readonly' => 'readonly',
				'label' => 'Prioridade',
				'value' => $problema['Prioridade']['descricao'],
				'type' => 'text'
			));
			
			echo $form->input('Chamado.data_abertura', array(
				'readonly' => 'readonly',
				'label' => 'Data Abertura',
				'value' => @$time->format("d-m-Y H:i:s", $this->data['Chamado']['data_hora_abertura']),
				'type' => 'text'
			));
			
			echo $form->input('setor_id', array(
				'readonly' => 'readonly',
				'label' => 'Área Responsável',
				'value' => $problema['Setor']['descricao'],
				'type' => 'text'
			));
			
			echo $form->input('Problema.descricao', array(
				'readonly' => 'readonly',
				'label' => 'Tipo de Problema',
				'value' => $problema['Problema']['descricao'],
				'type' => 'text'
			));
			
			echo $form->input('chamado_titulo', array(
				'readonly' => 'readonly',
				'label' => 'Título',
				'value' => $chamado['Chamado']['titulo'],
				'type' => 'text',
				'required' => false,
				//'div' => '',
				'class' => ''
			));
			
			echo $form->input('problema_descricao', array(
				'readonly' => 'readonly',
				'label' => 'Descrição do Problema',
				'value' => $chamado['Problema']['descricao'],
				'type' => 'textarea'
			));
			
			
			
		?>
 		</fieldset>		
 		<fieldset>
 			<legend><?php __('Assentamento');?></legend>
 			<?php 
 			// verifica se foi atribuído algum valor a data de início do histórico
			
			if(!isset($this->data['ChamadoHistorico'])){
				$this->data['ChamadoHistorico'] = array(
					'chamado_id' => $chamado['Chamado']['id'],
					'data_hora_inicial' => date('Y-m-d H:i:s'), 
					'descricao' => '', 
					'usuario_id' => $usuarioId);
			}
			
 			echo $form->input('ChamadoHistorico.descricao', array(
				//'readonly' => 'readonly',
				'label' => false,
				'value' => $this->data['ChamadoHistorico']['descricao'],
				'type' => 'textarea'
			));
			
			echo $form->input('ChamadoHistorico.data_hora_inicial', array(
				//'readonly' => 'readonly',
				'label' => false,
				'value' => $this->data['ChamadoHistorico']['data_hora_inicial'],
				'type' => 'text'
			));
			
			echo $form->input('ChamadoHistorico.usuario_id', array(
				//'readonly' => 'readonly',
				'label' => false,
				'value' => @$this->data['ChamadoHistorico']['usuario_id'],
				'type' => 'text'
			));
			?>
 		</fieldset>
 	<fieldset>
<?php echo $form->end('Confirmar');?>
</div>
