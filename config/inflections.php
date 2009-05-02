<?php
/* SVN FILE: $Id: inflections.php 7945 2008-12-19 02:16:01Z gwoo $ */
/**
 * Custom Inflected Words.
 *
 * This file is used to hold words that are not matched in the normail Inflector::pluralize() and
 * Inflector::singularize()
 *
 * PHP versions 4 and %
 *
 * CakePHP(tm) :  Rapid Development Framework (http://www.cakephp.org)
 * Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2005-2008, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 * @link          http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app.config
 * @since         CakePHP(tm) v 1.0.0.2312
 * @version       $Revision: 7945 $
 * @modifiedby    $LastChangedBy: gwoo $
 * @lastmodified  $Date: 2008-12-18 18:16:01 -0800 (Thu, 18 Dec 2008) $
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
/**
 * This is a key => value array of regex used to match words.
 * If key matches then the value is returned.
 *
 *  $pluralRules = array('/(s)tatus$/i' => '\1\2tatuses', '/^(ox)$/i' => '\1\2en', '/([m|l])ouse$/i' => '\1ice');
 */
	//$pluralRules = array();
/**
 * This is a key only array of plural words that should not be inflected.
 * Notice the last comma
 *
 * $uninflectedPlural = array('.*[nrlm]ese', '.*deer', '.*fish', '.*measles', '.*ois', '.*pox');
 */
	//$uninflectedPlural = array();
/**
 * This is a key => value array of plural irregular words.
 * If key matches then the value is returned.
 *
 *  $irregularPlural = array('atlas' => 'atlases', 'beef' => 'beefs', 'brother' => 'brothers')
 */
	//$irregularPlural = array();
/**
 * This is a key => value array of regex used to match words.
 * If key matches then the value is returned.
 *
 *  $singularRules = array('/(s)tatuses$/i' => '\1\2tatus', '/(matr)ices$/i' =>'\1ix','/(vert|ind)ices$/i')
 */
	//$singularRules = array();
/**
 * This is a key only array of singular words that should not be inflected.
 * You should not have to change this value below if you do change it use same format
 * as the $uninflectedPlural above.
 */
	//$uninflectedSingular = $uninflectedPlural;
/**
 * This is a key => value array of singular irregular words.
 * Most of the time this will be a reverse of the above $irregularPlural array
 * You should not have to change this value below if you do change it use same format
 *
 * $irregularSingular = array('atlases' => 'atlas', 'beefs' => 'beef', 'brothers' => 'brother')
 */
	//$irregularSingular = array_flip($irregularPlural);
	
	
	
	
/* SVN FILE: $Id: inflections.php 6311 2008-01-02 06:33:52Z phpnut $ */
/**
 * Custom Inflected Words.
 *
 * This file is used to hold words that are not matched in the normail Inflector::pluralize() and
 * Inflector::singularize()
 *
 * PHP versions 4 and %
 *
 * CakePHP(tm) :  Rapid Development Framework <http://www.cakephp.org/>
 * Copyright 2005-2008, Cake Software Foundation, Inc.
 *								1785 E. Sahara Avenue, Suite 490-204
 *								Las Vegas, Nevada 89104
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright		Copyright 2005-2008, Cake Software Foundation, Inc.
 * @link				http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package			cake
 * @subpackage		cake.app.config
 * @since			CakePHP(tm) v 1.0.0.2312
 * @version			$Revision: 6311 $
 * @modifiedby		$LastChangedBy: phpnut $
 * @lastmodified	$Date: 2008-01-02 00:33:52 -0600 (Wed, 02 Jan 2008) $
 * @license			http://www.opensource.org/licenses/mit-license.php The MIT License
 */
/**
 * This is a key => value array of regex used to match words.
 * If key matches then the value is returned.
 *
 *  $pluralRules = array('/(s)tatus$/i' => '\1\2tatuses', '/^(ox)$/i' => '\1\2en', '/([m|l])ouse$/i' => '\1ice');
 */
	//$pluralRules = array();
 
	/*
	* Por Sadjow Medeiros Le�o (sadjow@gmail.com)
	* Baseado em http://forum.rubyonbr.org/forums/14/topics/520
	*/
 
	$pluralRules = array(
 
		# # Regra geral: adiciona um "s" no final da palavra
 
		# #casa - casas  
		'/^([a-zA-Z]*)a$/i' => '\1as',  
		#  #pe - pes  
		'/^([a-zA-Z]*)e$/i' => '\1es',
		#  #sem exemplo  
		'/^([a-zA-Z]*)i$/i' => '\1is', 
		#  #carro - carros
		'/^([a-zA-Z]*)o$/i' => '\1os',
		#  #pneu - pneus
		'/^([a-zA-Z]*)u$/i' => '\1us',
 
 
		# # Se a palavra termina com "r" or "z", adiciona "es"   
		#  #luz - luzes  
		#  #flor - flores  
		#  #arroz - arrozes
 
		'/^([a-zA-Z]*)r$/i' => '\1res',
		'/^([a-zA-Z]*)z$/i' => '\1zes',
 
		# # Se a pelavra termina com "al", "el", "ol", "ul": Troca "l" por "is"   
		#  #farol - farois  
		#  #hospital - hospitais  
		#  #telemovel - telemoveis  
		#  #pincel - pinceis  
		#  #anzol - anzois
		'/^([a-zA-Z]*)al$/i' => '\1ais',
		'/^([a-zA-Z]*)el$/i' => '\1eis',
		'/^([a-zA-Z]*)ol$/i' => '\1ois',
		'/^([a-zA-Z]*)ul$/i' => '\1uis',  
 
 
		# # Se palavra termina em "il" e tem acento agudo na �ltima s�laba, troca "il", por "is"
		#cantil - cantis
		'/^([a-zA-Z]*)il$/i' => '\1is',
 
		# # TODO
		#  # Se a palavra termina com "il" e tiver um acento agudo na penultima s�laba, troca "il" por "eis"  
		#  # sem exemplo
 
		// Esse aqui � um pouco mais complicado. Fiquei de fazer, porque n�o tem como 
		// identificar acentos quando n�o se usa acentos( nome das tabelas)
		// Ainda estou pensando. Me ajuda ok?!
 
		# # Se a palavra termina com "m", troca "m" por "ns" 
		#  #armazem - armazens  
		#  #portagem - portagens  
		#  inflect.plural /^([a-zA-z]*)m$/i, '\1ns'
		'/^([a-zA-Z]*)m$/i' => '\1ns',
 
		# #TODO  
		#  # Se a palavra termana com "s" e tem uma s�laba, troca "s" por "es" 
		#  #sem exemplo  
		#  #inflect.plural /^([a-zA-z]*)e$/i, '\1es'  
		#   
		#  #TODO  
		#  # Se a palavra termna com "x" fica a mesma
		#  #sem exemplo... professor X, telvez?   
		#  #inflect.plural /^([a-zA-z]*)x$/i, '\1x'  
		#   
		#  # Se a palavra termina com "�o", Existem 3 jeitos para o prural: �os, �es, �es
		#  #NOTA: D�ficil de achar, Eu usei os casos mais conhecidos 
		#  # e depois usei os casos irregulares (l� embaixo em $irregularPlural) para os outros. Se alguem conhece  
		#  # mais casos, por favor adicione na lista e mande-me um e-mail, obrigado!
		#  #  
		#  #c�o - c�es  
		#  #colch�o - colch�es  
		#  #port�o - port�es  
		#  #p�o - p�es  
		#  #alem�o - alem�es  
		#  #ch�o - ?  
		#  #pilh�o - pilh�es  
		#  #canh�o - canh�es  
		#  #bid�o - bid�es  
		#  #m�o - m�os  
		'/^([a-zA-Z]*)ao$/i' => '\1oes'
 
	);
/**
 * This is a key only array of plural words that should not be inflected.
 * Notice the last comma
 *
 * $uninflectedPlural = array('.*[nrlm]ese', '.*deer', '.*fish', '.*measles', '.*ois', '.*pox');
 */
	$uninflectedPlural = array();
/**
 * This is a key => value array of plural irregular words.
 * If key matches then the value is returned.
 *
 *  $irregularPlural = array('atlas' => 'atlases', 'beef' => 'beefs', 'brother' => 'brothers')
 */
	//$irregularPlural = array();
	/*
		Sadjow Medeiros Le�o (sadjow@gmail.com)
		// Irregular
	*/
 
	$irregularPlural = array(
		'cao' => 'caes',
		'pao' => 'paes',
		'mao' => 'maos',
		'alemao' => 'alemaes',
		'avaliacao' => 'avaliacoes',
		'setor' => 'setores',
		'status' => 'status',
	
	);
 
/**
 * This is a key => value array of regex used to match words.
 * If key matches then the value is returned.
 *
 *  $singularRules = array('/(s)tatuses$/i' => '\1\2tatus', '/(matr)ices$/i' =>'\1ix','/(vert|ind)ices$/i')
 */
	//$singularRules = array();
	/*
	* Sadjow Medeiros Le�o ( sadjow@gmail.com )
	*/
 
	$singularRules = array(
		# #pes - pe  
		#  #carros - carro  
		#  #pneus - pneu  
		'/^([a-zA-Z]*)as$/i' => '\1a',
		'/^([a-zA-Z]*)es$/i' => '\1e', 
		'/^([a-zA-Z]*)is$/i' => '\1i',
		'/^([a-zA-Z]*)os$/i' => '\1o',
		'/^([a-zA-Z]*)us$/i' => '\1u',
 
		# #luzes - luz  
		#  #flores - flor  
		#  #arrozes - arroz
		'/^([a-zA-Z]*)res$/i' => '\1r',
		'/^([a-zA-Z]*)zes$/i' => '\1z',
 
		# #cantis - cantil
		'/^([a-zA-Z]*)is$/i' => '\1il', 
		#   
		#  #farois - farol   
		#  #hospitais - hospital    
		#  #telemoveis - telemovel    
		#  #pinceis - pincel   
		#  #anzois - anzol    
		'/^([a-zA-Z]*)ais$/i' => '\1al',  
		'/^([a-zA-Z]*)eis$/i' => '\1el', 
		'/^([a-zA-Z]*)ois$/i' => '\1ol',
		'/^([a-zA-Z]*)uis$/i' => '\1ul',
		#   
		#  #armazens - armazem   
		#  #portagens - portagem    
		'/^([a-zA-Z]*)ns$/i' => '\1m', 
		#   
		#  #c�es - c�o  
		#  #colch�es - colch�o   
		#  #port�es - port�o   
		#  #p�es - p�o   
		#  #alem�es - alem�o
		'/^([a-zA-Z]*)oes$/i' => '\1ao',
		'/^([a-zA-Z]*)aes$/i' => '\1ao',
		'/^([a-zA-Z]*)aos$/i' => '\1ao'
 
	);
 
/**
 * This is a key only array of singular words that should not be inflected.
 * You should not have to change this value below if you do change it use same format
 * as the $uninflectedPlural above.
 */
	$uninflectedSingular = $uninflectedPlural;
/**
 * This is a key => value array of singular irregular words.
 * Most of the time this will be a reverse of the above $irregularPlural array
 * You should not have to change this value below if you do change it use same format
 *
 * $irregularSingular = array('atlases' => 'atlas', 'beefs' => 'beef', 'brothers' => 'brother')
 */
	$irregularSingular = array_flip($irregularPlural);
?>