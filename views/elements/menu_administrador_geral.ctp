<?php
//pr($this->params); 
$acao = $this->params['action'];
$controller = $this->params['controller'];
$classMenuMarcado = '';

?>
<div id="menu_secundario">
<ul class="menu" "font-size: 12px;">
	<li>
		<?php 
		if ($controller == 'usuarios'){
			$classMenuMarcado = 'menuVerticalSelecionado';			
		}
		echo $html->link(
			$html->tag(
				'span',
				$html->image(
					'add_chamado.gif', array(
						'alt' => 'Usuários', 
					)
				).'Usuários',
				array(
					'class' => $classMenuMarcado
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
		$classMenuMarcado = '';
		?>
	</li>
	<li>
		<?php
		if ($acao == 'chamadosAbertos'){
			$classMenuMarcado = 'menuVerticalSelecionado';			
		}
		echo $html->link(
			$html->tag(
				'span',
				$html->image(
					'chamados.gif', array(
						'alt' => 'Setores', 
					)
				).'Setores',
				array(
					'class' => $classMenuMarcado
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
		$classMenuMarcado = '';
		?>
	</li>
	<li>
		<?php
		if ($acao == 'chamadosAbertos'){
			$classMenuMarcado = 'menuVerticalSelecionado';			
		}
		echo $html->link(
			$html->tag(
				'span',
				$html->image(
					'chamados.gif', array(
						'alt' => 'Tipos de Problemas', 
					)
				).'Tipos de Problemas',
				array(
					'class' => $classMenuMarcado
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
		$classMenuMarcado = '';
		?>
	</li>
	<li>
		<?php
		if ($acao == 'chamadosAbertos'){
			$classMenuMarcado = 'menuVerticalSelecionado';			
		}
		echo $html->link(
			$html->tag(
				'span',
				$html->image(
					'chamados.gif', array(
						'alt' => 'Relatórios', 
					)
				).'Relatórios',
				array(
					'class' => $classMenuMarcado
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
		$classMenuMarcado = '';
		?>
	</li>
</ul>
</div>
