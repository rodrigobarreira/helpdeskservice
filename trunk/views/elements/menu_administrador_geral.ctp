<div id="menu_secundario">
<ul class="menu" "font-size: 12px;">
	<li>
		<?php 
		echo $html->link(
			$html->tag(
				'span',
				$html->image(
					'add_chamado.gif', array(
						'alt' => 'Usuários', 
					)
				).'Usuários',
				array(
					'class' => ''
				),
				false
			),
			'/admin/usuarios',
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
						'alt' => 'Setores', 
					)
				).'Setores',
				array(
					'class' => ''
				),
				false
			),
			'/admin/setores',
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
						'alt' => 'Tipos de Problemas', 
					)
				).'Tipos de Problemas',
				array(
					'class' => ''
				),
				false
			),
			'/admin/problemas',
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
						'alt' => 'Relatórios', 
					)
				).'Relatórios',
				array(
					'class' => ''
				),
				false
			),
			'/admin/relatorios',
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
