-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Abr 23, 2009 as 07:27 PM
-- Versão do Servidor: 5.1.30
-- Versão do PHP: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Banco de Dados: `banco_helpdesk`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acos`
--

CREATE TABLE IF NOT EXISTS `acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `acos`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `aros`
--

CREATE TABLE IF NOT EXISTS `aros` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `foreign_key` int(10) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `lft` int(10) DEFAULT NULL,
  `rght` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `aros`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `aros_acos`
--

CREATE TABLE IF NOT EXISTS `aros_acos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `aro_id` int(10) NOT NULL,
  `aco_id` int(10) NOT NULL,
  `_create` varchar(2) NOT NULL DEFAULT '0',
  `_read` varchar(2) NOT NULL DEFAULT '0',
  `_update` varchar(2) NOT NULL DEFAULT '0',
  `_delete` varchar(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `ARO_ACO_KEY` (`aro_id`,`aco_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `aros_acos`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacoes`
--

CREATE TABLE IF NOT EXISTS `avaliacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_hora` datetime NOT NULL,
  `nivel` int(11) NOT NULL,
  `chamado_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_avaliacoes_chamados` (`chamado_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `avaliacoes`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `chamados`
--

CREATE TABLE IF NOT EXISTS `chamados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `problema_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `data_hora_abertura` datetime NOT NULL,
  `aberto_por` int(11) NOT NULL COMMENT 'Id do usuário que registra a chamada',
  `descricao_problema` longtext NOT NULL,
  `descricao_solucao` longtext,
  `prioridade_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `data_hora_limite` datetime NOT NULL,
  `data_hora_encerramento` datetime DEFAULT NULL,
  `responsavel_id` int(11) DEFAULT NULL COMMENT 'Usuário (Atendente, Técnico ou outro) que será responsável pelo Chamado',
  PRIMARY KEY (`id`),
  KEY `fk_chamados_prioridades` (`prioridade_id`),
  KEY `fk_chamados_status` (`status_id`),
  KEY `fk_chamados_sub_problemas` (`problema_id`),
  KEY `fk_chamados_usuarios` (`usuario_id`),
  KEY `fk_chamados_usuarios1` (`responsavel_id`),
  KEY `aberto_por` (`aberto_por`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `chamados`
--

INSERT INTO `chamados` (`id`, `problema_id`, `usuario_id`, `data_hora_abertura`, `aberto_por`, `descricao_problema`, `descricao_solucao`, `prioridade_id`, `status_id`, `data_hora_limite`, `data_hora_encerramento`, `responsavel_id`) VALUES
(1, 1, 10, '2009-04-21 00:00:00', 0, 'teste de problema', 'aetasdqas', 1, 1, '2009-04-21 00:00:00', '2009-04-21 00:00:00', 8),
(2, 1, 10, '0000-00-00 00:00:00', 0, 'dfasd asdqfasd', NULL, 0, 1, '0000-00-00 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamado_historicos`
--

CREATE TABLE IF NOT EXISTS `chamado_historicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_hora` datetime NOT NULL,
  `chamado_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `descricao` text,
  PRIMARY KEY (`id`),
  KEY `fk_chamado_historicos_chamados` (`chamado_id`),
  KEY `fk_chamado_historicos_usuarios` (`usuario_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `chamado_historicos`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos`
--

CREATE TABLE IF NOT EXISTS `grupos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `grupos`
--

INSERT INTO `grupos` (`id`, `descricao`) VALUES
(1, 'Solicitante'),
(2, 'Administrador'),
(3, 'Atendente'),
(4, 'Técnico');

-- --------------------------------------------------------

--
-- Estrutura da tabela `prioridades`
--

CREATE TABLE IF NOT EXISTS `prioridades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) CHARACTER SET latin1 NOT NULL,
  `sla_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `prioridades`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `problemas`
--

CREATE TABLE IF NOT EXISTS `problemas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL,
  `sla_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sla_id` (`sla_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `problemas`
--

INSERT INTO `problemas` (`id`, `descricao`, `sla_id`) VALUES
(1, 'Hardware', 0),
(2, 'Software', 0),
(3, 'Outros Equipamentos', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `setores`
--

CREATE TABLE IF NOT EXISTS `setores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `setores`
--

INSERT INTO `setores` (`id`, `descricao`) VALUES
(1, 'Diretoria'),
(2, 'Recursos Humanos'),
(3, 'Vendas'),
(4, 'Marketing'),
(5, 'Atendimento ao Cliente'),
(6, 'Help Desk');

-- --------------------------------------------------------

--
-- Estrutura da tabela `slas`
--

CREATE TABLE IF NOT EXISTS `slas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tempo` int(11) NOT NULL COMMENT 'tempo em minutos',
  `descricao` varchar(100) NOT NULL COMMENT 'descrição do tempo mais legível',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Tabela de SLA' AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `slas`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`id`, `descricao`) VALUES
(1, 'Em Andamento'),
(2, 'Resolvido'),
(3, 'ção é ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sub_problemas`
--

CREATE TABLE IF NOT EXISTS `sub_problemas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `problema_id` int(11) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_sub_problemas_problemas` (`problema_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `sub_problemas`
--

INSERT INTO `sub_problemas` (`id`, `problema_id`, `descricao`) VALUES
(1, 1, 'Monitor'),
(2, 1, 'Computador'),
(3, 1, 'Impressora'),
(4, 1, 'Mouse'),
(5, 2, 'Windows'),
(6, 1, 'Office'),
(7, 1, 'Sistema X'),
(8, 3, 'Telefone'),
(9, 1, 'MÃ¡quina de Xerox');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_id` int(11) NOT NULL,
  `setor_id` int(11) NOT NULL,
  `matricula` varchar(20) NOT NULL COMMENT 'É o número de matrícula do funcionário ou um outro valor caso seja um usuário externo	',
  `nome` varchar(150) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `ramal` varchar(10) DEFAULT NULL,
  `ativo` char(1) NOT NULL DEFAULT 'S' COMMENT 'Campo para indicar se o usuário está ativo (S) ou não (N)',
  `data_cadastro` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `matricula` (`matricula`),
  KEY `fk_usuarios_grupos` (`grupo_id`),
  KEY `fk_usuarios_setores` (`setor_id`),
  KEY `matricula_2` (`matricula`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `grupo_id`, `setor_id`, `matricula`, `nome`, `senha`, `email`, `celular`, `telefone`, `ramal`, `ativo`, `data_cadastro`) VALUES
(8, 2, 5, 'admin', 'Admin', '6cb23894e504f9385646f78f141375c33f33922c', '', NULL, NULL, NULL, 'S', '0000-00-00 00:00:00'),
(10, 1, 1, 'abre', 'abre', '6cb23894e504f9385646f78f141375c33f33922c', 'roger.sistemas@yahoo.com.br', '3187690548', '3134567894', '', 'S', '0000-00-00 00:00:00'),
(11, 3, 6, 'atende', 'atende', '6cb23894e504f9385646f78f141375c33f33922c', 'siste@sdas.com', 'klkl', '3187690548', 'klkl', 'S', '0000-00-00 00:00:00');
