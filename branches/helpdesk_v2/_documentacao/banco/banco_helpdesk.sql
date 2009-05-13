-- phpMyAdmin SQL Dump
-- version 3.1.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Mai 02, 2009 as 01:41 AM
-- Versão do Servidor: 5.1.30
-- Versão do PHP: 5.2.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Banco de Dados: `banco_helpdesk`
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
  `usuario_id` int(11) NOT NULL COMMENT 'FK - id do usuário solicitante.',
  `data_hora_abertura` datetime NOT NULL,
  `aberto_por` int(11) NOT NULL COMMENT 'FK - id do usuário que cria o chamado. Normalmente será o usuário que está logado no sistema.',
  `descricao_problema` longtext NOT NULL COMMENT 'Descrição do problema informado pelo usuário solicitante.',
  `descricao_solucao` longtext COMMENT 'Descrição da solução final proposta para o problema.',
  `data_hora_atendimento` datetime DEFAULT NULL COMMENT 'Registra o dia e o horário que iniciou o atendimento do chamado.',
  `status_id` int(11) NOT NULL COMMENT 'FK - id do status do problema.',
  `data_hora_encerramento` datetime DEFAULT NULL,
  `responsavel_id` int(11) DEFAULT NULL COMMENT 'FK - id do Usuário (Atendente, Técnico ou outro) que será responsável pelo Chamado.',
  PRIMARY KEY (`id`),
  KEY `fk_chamados_status` (`status_id`),
  KEY `fk_chamados_sub_problemas` (`problema_id`),
  KEY `fk_chamados_usuarios` (`usuario_id`),
  KEY `fk_chamados_usuarios1` (`responsavel_id`),
  KEY `aberto_por` (`aberto_por`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `chamados`
--

INSERT INTO `chamados` (`id`, `problema_id`, `usuario_id`, `data_hora_abertura`, `aberto_por`, `descricao_problema`, `descricao_solucao`, `data_hora_atendimento`, `status_id`, `data_hora_encerramento`, `responsavel_id`) VALUES
(1, 1, 10, '2009-04-21 00:00:00', 0, 'teste de problema', 'aetasdqas', NULL, 1, '2009-04-21 00:00:00', 8),
(2, 1, 10, '0000-00-00 00:00:00', 0, 'dfasd asdqfasd', NULL, NULL, 1, NULL, NULL),
(3, 1, 10, '0000-00-00 00:00:00', 0, 'teste de problema', NULL, NULL, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamado_historicos`
--

CREATE TABLE IF NOT EXISTS `chamado_historicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data_hora_incial` datetime NOT NULL,
  `data_hora_final` datetime NOT NULL,
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
(2, 'Atendente'),
(3, 'Administrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `problemas`
--

CREATE TABLE IF NOT EXISTS `problemas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) NOT NULL COMMENT 'Recebe a descrição do problema.',
  `sla_id` int(11) NOT NULL,
  `setor_id` int(11) NOT NULL COMMENT 'FK - id do setor que o problema está vinculado.',
  PRIMARY KEY (`id`),
  KEY `sla_id` (`sla_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `problemas`
--

INSERT INTO `problemas` (`id`, `descricao`, `sla_id`, `setor_id`) VALUES
(1, 'Hardware', 0, 0),
(2, 'Software', 0, 0),
(3, 'Outros Equipamentos', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `setores`
--

CREATE TABLE IF NOT EXISTS `setores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL,
  `sla_id` int(11) NOT NULL COMMENT 'Chave secundária da tabela slas. Indica o tempo de resposta máximo para o setor.',
  `atende_chamado` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'FLAG - indica se o setor está apto a atender chamados. 0 (zero) = não; 1 (um) = sim.',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `setores`
--


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
(3, 'atÃ©');

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
(8, 3, 5, 'admin', 'Admin', '6cb23894e504f9385646f78f141375c33f33922c', '', NULL, NULL, NULL, 'S', '0000-00-00 00:00:00'),
(10, 1, 1, 'abre', 'abre', '6cb23894e504f9385646f78f141375c33f33922c', 'roger.sistemas@yahoo.com.br', '3187690548', '3134567894', '', 'S', '0000-00-00 00:00:00'),
(11, 2, 6, 'atende', 'atende', '6cb23894e504f9385646f78f141375c33f33922c', 'siste@sdas.com', 'klkl', '3187690548', 'klkl', 'S', '0000-00-00 00:00:00');
