<div id="menu_secundario">
<ul class="menu" "font-size: 12px;">
	
	<li>
		<?php 
		echo $html->link(
			$html->tag(
				'span',
				$html->image(
					'add_chamado.gif', array(
						'alt' => 'Chamados Abertos', 
					)
				).'Chamados Abertos',
				array(
					'class' => ''
				),
				false
			),
			'/atendimento/chamadosAbertos',
			array(
				'class' => ''
			), 
			null, 
			false
		);
		?>
	</li>
	<li>
		<?php
		echo $html->link(
			$html->tag(
				'span',
				$html->image(
					'chamados.gif', array(
						'alt' => 'Chamados Encerrados', 
					)
				).'Chamados Encerrados',
				array(
					'class' => ''
				),
				false
			),
			'/atendimento/chamadosEncerrados',
			array(
				'class' => ''
			), 
			null, 
			false
		);
		?>
	</li>
	
</ul>
</div>
