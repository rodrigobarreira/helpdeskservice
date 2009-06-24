<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery("#botaoPesquisa").click(function () {
			jQuery("#pesquisa").slideToggle("fast");
    	});
		jQuery("#campo").change(function () {
			var campo = this.value;
			var html = "";
			if (campo == 'chamado_id'){
				html = '<input type="text" id="valor" value="" style="font-size: 9px; margin-left: 5px;" name="data[valor]"/>';
			}else if(campo == 'chamado_prioridade_descricao'){
				html = '<input type="text" id="valor" value="" style="font-size: 9px; margin-left: 5px;" name="data[valor]"/>';
			}else if(campo == 'chamado_status_descricao'){
				html = '<input type="text" id="valor" value="" style="font-size: 9px; margin-left: 5px;" name="data[valor]"/>';
			}else if(campo == 'problema_tipo_descricao'){
				html = '<input type="text" id="valor" value="" style="font-size: 9px; margin-left: 5px;" name="data[valor]"/>';
			}else if(campo == 'chamado_titulo'){
				html = '<div class="barraFerramentasElemento"><select name="data[quantidadeRegistros]" id="valor" style="height: 20px; font-size: 9px;">
					<option value="5" selected="selected">5</option>
					<option value="10">10</option>
					<option value="15">15</option>
					<option value="20">20</option>
					</select></div>';			
			}else{
			alert("Campo não reconhecido!");
			}
			
			jQuery("#valor").remove();
			jQuery("#filtroValor").append(html);
			
    	});
    	
  	});

		
	
	</script>
