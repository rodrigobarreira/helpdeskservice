-- phpMyAdmin SQL Dump
-- version 3.1.2deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Mai 28, 2009 as 07:01 PM
-- Versão do Servidor: 5.0.75
-- Versão do PHP: 5.2.6-3ubuntu4.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Banco de Dados: `banco_helpdesk`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacoes`
--

CREATE TABLE IF NOT EXISTS `avaliacoes` (
  `id` int(11) NOT NULL auto_increment,
  `data_hora` datetime NOT NULL,
  `nivel` int(11) NOT NULL,
  `chamado_id` int(11) default NULL,
  PRIMARY KEY  (`id`),
  KEY `chamado_id` (`chamado_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `avaliacoes`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `chamados`
--

CREATE TABLE IF NOT EXISTS `chamados` (
  `id` int(11) NOT NULL auto_increment,
  `problema_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL COMMENT 'FK - id do usu�rio solicitante.',
  `data_hora_abertura` datetime NOT NULL,
  `aberto_por` int(11) NOT NULL COMMENT 'FK - id do usu�rio que cria o chamado. Normalmente ser� o usu�rio que est� logado no sistema.',
  `titulo` varchar(50) character set latin1 NOT NULL,
  `descricao_problema` longtext NOT NULL COMMENT 'Descri��o do problema informado pelo usu�rio solicitante.',
  `descricao_solucao` longtext COMMENT 'Descri��o da solu��o final proposta para o problema.',
  `data_hora_atendimento` datetime default NULL COMMENT 'Registra o dia e o hor�rio que iniciou o atendimento do chamado.',
  `status_id` int(11) NOT NULL COMMENT 'FK - id do status do problema.',
  `data_hora_encerramento` datetime default NULL,
  `responsavel_id` int(11) default NULL COMMENT 'FK - id do Usu�rio (Atendente, T�cnico ou outro) que ser� respons�vel pelo Chamado.',
  PRIMARY KEY  (`id`),
  KEY `fk_chamados_status` (`status_id`),
  KEY `fk_chamados_sub_problemas` (`problema_id`),
  KEY `fk_chamados_usuarios` (`usuario_id`),
  KEY `fk_chamados_usuarios1` (`responsavel_id`),
  KEY `aberto_por` (`aberto_por`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Extraindo dados da tabela `chamados`
--

INSERT INTO `chamados` (`id`, `problema_id`, `usuario_id`, `data_hora_abertura`, `aberto_por`, `titulo`, `descricao_problema`, `descricao_solucao`, `data_hora_atendimento`, `status_id`, `data_hora_encerramento`, `responsavel_id`) VALUES
(1, 1, 8, '2009-04-21 00:00:00', 10, '', 'teste de problema', 'aetasdqas', NULL, 1, '2009-04-21 00:00:00', 8),
(13, 2, 10, '2009-05-13 22:05:03', 10, 'dasdqfasdqf', 'wdfasdqfasdqf', NULL, NULL, 1, NULL, NULL),
(14, 2, 10, '2009-05-14 07:05:31', 10, 'ssdsdadqs', 'csdasdq', NULL, NULL, 1, NULL, NULL),
(15, 1, 10, '2009-05-15 18:05:14', 10, 'teste de tÃ­tulo', 'Teste de descrioÃ§aoao asnd as ndfasd ', NULL, NULL, 1, NULL, NULL),
(16, 3, 10, '2009-05-15 21:05:33', 10, 'TEste', 'asdfasdqfasfdqa', NULL, NULL, 1, NULL, 11),
(17, 3, 10, '2009-05-15 21:05:48', 10, 'sadgalsdj', 'asfgasga', NULL, NULL, 1, NULL, 11),
(18, 3, 10, '2009-05-16 12:05:08', 10, 'teste de prioridade alta', 'testando a aplicaÃ§Ã£o na aprte de criaÃ§Ã£o de chamado\r\n', NULL, NULL, 1, NULL, 11),
(19, 1, 10, '2009-05-16 12:19:32', 10, 'atesasdqta', 'asdgasdqgasgdqa', NULL, NULL, 3, NULL, NULL),
(20, 1, 10, '2009-05-16 12:19:50', 10, 'atesasdqta', 'asdgasdqgasgdqa', NULL, NULL, 3, NULL, NULL),
(21, 1, 10, '2009-05-16 12:20:22', 10, 'mais  Ã£o Ã­', 'maims asiafsd\r\n asÃ§askh asndoh asoi Ã¡sdasa asÃ§~ao sa ssa', NULL, NULL, 3, NULL, NULL),
(22, 1, 11, '2009-05-18 21:49:41', 11, 'testesdfasd', 'sdfasfdasdga', NULL, NULL, 3, NULL, NULL),
(23, 3, 11, '2009-05-19 00:46:53', 11, 'asfdasdfasfd', 'Ã¡sdvasdvm asd,', NULL, NULL, 5, NULL, 11),
(24, 3, 11, '2009-05-19 18:48:38', 11, 'teste de titulo', 'sdfasdqfk asdá¹•o asdk', NULL, NULL, 1, NULL, NULL),
(25, 1, 11, '2009-05-26 19:13:26', 11, 'teste de problema', 'asdfasdfasfÃ§lkasdqÃ§lfkasdqfk', NULL, NULL, 3, NULL, NULL),
(26, 1, 11, '2009-05-26 19:54:32', 11, 'teste de tÃ­tulo de problema', 'descriÃ§Ã£o do problema  descriÃ§Ã£o do problema  descriÃ§Ã£o do problema  descriÃ§Ã£o do problema  descriÃ§Ã£o do problema  descriÃ§Ã£o do problema  descriÃ§Ã£o do problema  descriÃ§Ã£o do problema  descriÃ§Ã£o do problema  descriÃ§Ã£o do problema  descriÃ§Ã£o do problema  descriÃ§Ã£o do problema  descriÃ§Ã£o do problema  descriÃ§Ã£o do problema  ', NULL, NULL, 3, NULL, NULL),
(27, 1, 10, '2009-05-27 20:19:10', 10, 'teste de tÃ­tulo', 'asdfasdqfasdqfasdqf', NULL, NULL, 3, NULL, NULL),
(28, 1, 10, '2009-05-27 20:46:07', 10, 'sadqfaspdfapsdfasdfasdqfinp', 'apwidfpoasindpfonaspdqifopasindofinasodifnopnasdqf', NULL, NULL, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `chamado_historicos`
--

CREATE TABLE IF NOT EXISTS `chamado_historicos` (
  `id` int(11) NOT NULL auto_increment,
  `data_hora_inicial` datetime NOT NULL,
  `data_hora_final` datetime NOT NULL,
  `chamado_id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `descricao` text character set latin1,
  PRIMARY KEY  (`id`),
  KEY `chamado_id` (`chamado_id`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Extraindo dados da tabela `chamado_historicos`
--

INSERT INTO `chamado_historicos` (`id`, `data_hora_inicial`, `data_hora_final`, `chamado_id`, `usuario_id`, `descricao`) VALUES
(1, '2009-05-08 04:21:33', '2009-05-08 04:21:39', 1, 10, 'teste'),
(2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 16, 11, 'asdfasdfasdqfasfdq'),
(3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 17, 11, 'sdasdfasdqfasdqf'),
(4, '0000-00-00 00:00:00', '2009-05-22 19:35:34', 18, 11, 'teste'),
(5, '0000-00-00 00:00:00', '2009-05-22 19:37:58', 23, 11, 'testando de novo'),
(6, '0000-00-00 00:00:00', '2009-05-22 19:40:19', 24, 11, 'dfasdfasdqfa'),
(7, '0000-00-00 00:00:00', '2009-05-22 19:43:14', 23, 11, 'asdqdsfasdqfa'),
(8, '0000-00-00 00:00:00', '2009-05-22 19:47:36', 23, 11, 'asdqdsfasdqfa'),
(9, '0000-00-00 00:00:00', '2009-05-22 19:51:24', 23, 11, 'asdqdsfasdqfa'),
(10, '0000-00-00 00:00:00', '2009-05-22 19:52:47', 17, 11, 'asdqfadqfasdqgasdqg'),
(11, '0000-00-00 00:00:00', '2009-05-22 19:54:01', 17, 11, 'asdqfadqfasdqgasdqg'),
(12, '0000-00-00 00:00:00', '2009-05-22 20:07:31', 16, 11, 'dasfasdqfasdqf'),
(13, '0000-00-00 00:00:00', '2009-05-22 20:09:10', 18, 11, 'asdqfasdqfasdqf'),
(14, '0000-00-00 00:00:00', '2009-05-22 20:27:02', 16, 11, 'dfasdfasdfasdqf'),
(15, '0000-00-00 00:00:00', '2009-05-22 20:27:56', 16, 11, 'sdqfasdfasdqf'),
(16, '2009-05-22 20:30:41', '2009-05-22 20:30:55', 16, 11, 'asdqfasdfasdqfasdgfasdqgag\r\n<< previous\r\n|\r\nnext >>'),
(17, '2009-05-22 20:09:27', '2009-05-22 20:31:41', 17, 11, 'sdfasdqfasdqfas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `configuracoes`
--

CREATE TABLE IF NOT EXISTS `configuracoes` (
  `id` int(11) NOT NULL,
  `status_abertura` int(11) NOT NULL COMMENT 'indica qual será o status padrão para os chamados criados',
  `status_encerramento` int(11) NOT NULL COMMENT 'indica qual status é o do encerramento do chamado',
  `titulo_aplicacao` varchar(50) NOT NULL COMMENT 'Título do Sistema',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `configuracoes`
--

INSERT INTO `configuracoes` (`id`, `status_abertura`, `status_encerramento`, `titulo_aplicacao`) VALUES
(1, 3, 0, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos`
--

CREATE TABLE IF NOT EXISTS `grupos` (
  `id` int(11) NOT NULL auto_increment,
  `descricao` varchar(45) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `grupos`
--

INSERT INTO `grupos` (`id`, `descricao`) VALUES
(1, 'Solicitante'),
(2, 'Atendente'),
(3, 'Administrador de Area'),
(5, 'Administrador Geral');

-- --------------------------------------------------------

--
-- Estrutura da tabela `prioridades`
--

CREATE TABLE IF NOT EXISTS `prioridades` (
  `id` int(11) NOT NULL auto_increment,
  `tempo` int(11) NOT NULL COMMENT 'Tempo em minutos',
  `descricao` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `prioridades`
--

INSERT INTO `prioridades` (`id`, `tempo`, `descricao`) VALUES
(1, 1440, 'Baixa (24 h)'),
(2, 120, 'MÃ©dia'),
(3, 30, 'Alta');

-- --------------------------------------------------------

--
-- Estrutura da tabela `problemas`
--

CREATE TABLE IF NOT EXISTS `problemas` (
  `id` int(11) NOT NULL auto_increment,
  `descricao` varchar(50) character set latin1 NOT NULL COMMENT 'Recebe a descri��o do problema.',
  `prioridade_id` int(11) NOT NULL,
  `setor_id` int(11) NOT NULL COMMENT 'FK - id do setor que o problema est� vinculado.',
  PRIMARY KEY  (`id`),
  KEY `setor_id` (`setor_id`),
  KEY `sla_id` (`prioridade_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `problemas`
--

INSERT INTO `problemas` (`id`, `descricao`, `prioridade_id`, `setor_id`) VALUES
(1, 'Hardware', 1, 7),
(2, 'Software', 2, 9),
(3, 'Outros Equipamentos', 3, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `setores`
--

CREATE TABLE IF NOT EXISTS `setores` (
  `id` int(11) NOT NULL auto_increment,
  `descricao` varchar(45) NOT NULL,
  `atende_chamado` tinyint(4) NOT NULL default '0' COMMENT 'FLAG - indica se o setor est� apto a atender chamados. 0 (zero) = n�o; 1 (um) = sim.',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `setores`
--

INSERT INTO `setores` (`id`, `descricao`, `atende_chamado`) VALUES
(7, 'Help Desk - Atendimento', 1),
(8, 'Help Desk - Suporte TÃ©cnico', 1),
(9, 'Diretoria', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `slas`
--

CREATE TABLE IF NOT EXISTS `slas` (
  `id` int(11) NOT NULL auto_increment,
  `tempo` int(11) NOT NULL COMMENT 'tempo em minutos',
  `descricao` varchar(100) NOT NULL COMMENT 'descri��o do tempo mais leg�vel',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Tabela de SLA' AUTO_INCREMENT=22 ;

--
-- Extraindo dados da tabela `slas`
--

INSERT INTO `slas` (`id`, `tempo`, `descricao`) VALUES
(1, 15, '15 minutos'),
(2, 30, '30 minutos'),
(3, 45, '45 minutos'),
(4, 60, '1 hora'),
(5, 120, '2 horas'),
(6, 180, '3 horas'),
(7, 240, '4 horas'),
(8, 480, '8 horas'),
(9, 720, '12 horas'),
(10, 1440, '24 horas'),
(11, 2880, '2 dias'),
(12, 4320, '3 dias'),
(13, 5760, '4 dias'),
(14, 10080, '1 semana'),
(15, 20160, '2 semanas'),
(16, 30240, '3 semanas'),
(17, 43200, '1 m'),
(18, 5, '5 minutos'),
(19, 10, '10 minutos'),
(20, 20, '20 minutos'),
(21, 25, '25 minutos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL auto_increment,
  `descricao` varchar(45) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`id`, `descricao`) VALUES
(1, 'Em Atendimento'),
(2, 'Resolvido'),
(3, 'Aguardando Atendimento'),
(4, 'Encerrado'),
(5, 'Cancelado'),
(6, 'Aguardando Usuário');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL auto_increment,
  `grupo_id` int(11) NOT NULL,
  `setor_id` int(11) NOT NULL,
  `matricula` varchar(20) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `celular` varchar(20) default NULL,
  `telefone` varchar(20) default NULL,
  `ramal` varchar(10) default NULL,
  `ativo` tinyint(1) NOT NULL default '1' COMMENT 'Campo para indicar se o usu�rio est� ativo (S) ou n�o (N)',
  `data_cadastro` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `matricula` (`matricula`),
  UNIQUE KEY `matricula_2` (`matricula`),
  UNIQUE KEY `matricula_3` (`matricula`),
  UNIQUE KEY `matricula_4` (`matricula`),
  KEY `grupo_id` (`grupo_id`),
  KEY `setor_id` (`setor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `grupo_id`, `setor_id`, `matricula`, `nome`, `senha`, `email`, `celular`, `telefone`, `ramal`, `ativo`, `data_cadastro`) VALUES
(8, 3, 7, 'admin', 'Admin', '6cb23894e504f9385646f78f141375c33f33922c', '', '', '', '', 1, '2029-01-01 00:00:00'),
(10, 1, 9, 'abre', 'abre', '6cb23894e504f9385646f78f141375c33f33922c', 'roger.sistemas@yahoo.com.br', '3187690548', '3134567894', '', 1, '2029-01-01 00:00:00'),
(11, 2, 8, 'atende', 'atende', '6cb23894e504f9385646f78f141375c33f33922c', 'siste@sdas.com', 'klkl', '3187690548', 'klkl', 1, '0000-00-00 00:00:00'),
(12, 1, 7, 'teste', 'teste', 'f30ccfe0b7611ffd719a26f5b23933fa0e3f45f7', 'reore@dqsf.com', '32434343434', '32332323232', '3232', 1, '2009-05-06 20:22:00');

-- --------------------------------------------------------

--
-- Estrutura stand-in para visualizar `vw_chamados`
--
CREATE TABLE IF NOT EXISTS `vw_chamados` (
`id` int(11)
,`tempo_decorrido` time
,`tempo_restante` time
,`prioridade` varchar(50)
,`tempo` int(11)
,`setor_id` int(11)
,`area` varchar(45)
,`problema` varchar(50)
,`titulo` varchar(50)
,`responsavel` varchar(150)
,`solicitante` varchar(150)
,`data_hora_abertura` datetime
,`data_hora_limite` datetime
,`status_id` int(11)
,`status` varchar(45)
);
-- --------------------------------------------------------

--
-- Estrutura para visualizar `vw_chamados`
--
DROP TABLE IF EXISTS `vw_chamados`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_chamados` AS select `cha`.`id` AS `id`,timediff(`cha`.`data_hora_abertura`,now()) AS `tempo_decorrido`,timediff((`cha`.`data_hora_abertura` + interval `pri`.`tempo` minute),now()) AS `tempo_restante`,`pri`.`descricao` AS `prioridade`,`pri`.`tempo` AS `tempo`,`pro`.`setor_id` AS `setor_id`,`str`.`descricao` AS `area`,`pro`.`descricao` AS `problema`,`cha`.`titulo` AS `titulo`,`res`.`nome` AS `responsavel`,`usu`.`nome` AS `solicitante`,`cha`.`data_hora_abertura` AS `data_hora_abertura`,(`cha`.`data_hora_abertura` + interval `pri`.`tempo` minute) AS `data_hora_limite`,`cha`.`status_id` AS `status_id`,`sta`.`descricao` AS `status` from ((((((`chamados` `cha` join `problemas` `pro` on((`cha`.`problema_id` = `pro`.`id`))) join `prioridades` `pri` on((`pri`.`id` = `pro`.`prioridade_id`))) join `setores` `str` on((`str`.`id` = `pro`.`setor_id`))) left join `usuarios` `res` on((`res`.`id` = `cha`.`responsavel_id`))) join `usuarios` `usu` on((`usu`.`id` = `cha`.`usuario_id`))) join `status` `sta` on((`sta`.`id` = `cha`.`status_id`)));

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD CONSTRAINT `fk_avaliacoes.chamado.id` FOREIGN KEY (`chamado_id`) REFERENCES `chamados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `chamados`
--
ALTER TABLE `chamados`
  ADD CONSTRAINT `fk_chamados.aberto_por` FOREIGN KEY (`aberto_por`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `fk_chamados.problema_id` FOREIGN KEY (`problema_id`) REFERENCES `problemas` (`id`),
  ADD CONSTRAINT `fk_chamados.responsavel_id` FOREIGN KEY (`responsavel_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `fk_chamados.status_id` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `fk_chamados.usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Restrições para a tabela `chamado_historicos`
--
ALTER TABLE `chamado_historicos`
  ADD CONSTRAINT `fk_chamado_historicos.chamado_id` FOREIGN KEY (`chamado_id`) REFERENCES `chamados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_chamado_historicos.usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Restrições para a tabela `problemas`
--
ALTER TABLE `problemas`
  ADD CONSTRAINT `fk_problemas.prioridade_id` FOREIGN KEY (`prioridade_id`) REFERENCES `prioridades` (`id`),
  ADD CONSTRAINT `fk_problemas.setor_id` FOREIGN KEY (`setor_id`) REFERENCES `setores` (`id`);

--
-- Restrições para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios.grupo_id` FOREIGN KEY (`grupo_id`) REFERENCES `grupos` (`id`),
  ADD CONSTRAINT `fk_usuarios.setor_id` FOREIGN KEY (`setor_id`) REFERENCES `setores` (`id`);

