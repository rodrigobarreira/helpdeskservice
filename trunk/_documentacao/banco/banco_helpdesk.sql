-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Mai 12, 2009 as 11:50 PM
-- Versão do Servidor: 5.1.33
-- Versão do PHP: 5.2.9

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
  KEY `chamado_id` (`chamado_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
  `titulo` varchar(50) NOT NULL,
  `descricao_problema` longtext CHARACTER SET utf8 NOT NULL COMMENT 'Descrição do problema informado pelo usuário solicitante.',
  `descricao_solucao` longtext CHARACTER SET utf8 COMMENT 'Descrição da solução final proposta para o problema.',
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `chamados`
--

INSERT INTO `chamados` (`id`, `problema_id`, `usuario_id`, `data_hora_abertura`, `aberto_por`, `titulo`, `descricao_problema`, `descricao_solucao`, `data_hora_atendimento`, `status_id`, `data_hora_encerramento`, `responsavel_id`) VALUES
(1, 1, 8, '2009-04-21 00:00:00', 10, '', 'teste de problema', 'aetasdqas', NULL, 1, '2009-04-21 00:00:00', 8),
(2, 1, 10, '0000-00-00 00:00:00', 10, '', 'dfasd asdqfasd', NULL, NULL, 1, NULL, NULL),
(3, 1, 10, '0000-00-00 00:00:00', 10, '', 'teste de problema', NULL, NULL, 1, NULL, NULL),
(6, 1, 8, '0000-00-00 00:00:00', 8, 'teste de titulo', 'probelma', NULL, NULL, 1, NULL, NULL),
(7, 1, 8, '0000-00-00 00:00:00', 8, 'Falha de Impressao', 'A impressora parou de imorimir\r\n', NULL, NULL, 1, NULL, NULL),
(8, 2, 8, '0000-00-00 00:00:00', 8, 'Probelma do ;windows ', 'probelmao\r\n', NULL, NULL, 1, NULL, NULL);

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
  `descricao` text CHARACTER SET latin1,
  PRIMARY KEY (`id`),
  KEY `chamado_id` (`chamado_id`),
  KEY `usuario_id` (`usuario_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `chamado_historicos`
--

INSERT INTO `chamado_historicos` (`id`, `data_hora_incial`, `data_hora_final`, `chamado_id`, `usuario_id`, `descricao`) VALUES
(1, '2009-05-08 04:21:33', '2009-05-08 04:21:39', 1, 10, 'teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `grupos`
--

CREATE TABLE IF NOT EXISTS `grupos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tempo` int(11) NOT NULL COMMENT 'Tempo em minutos',
  `descricao` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `prioridades`
--

INSERT INTO `prioridades` (`id`, `tempo`, `descricao`) VALUES
(1, 1440, 'Baixa (24 h)'),
(2, 120, 'Média (2 h)'),
(3, 30, 'Alta');

-- --------------------------------------------------------

--
-- Estrutura da tabela `problemas`
--

CREATE TABLE IF NOT EXISTS `problemas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) CHARACTER SET latin1 NOT NULL COMMENT 'Recebe a descrição do problema.',
  `prioridade_id` int(11) NOT NULL,
  `setor_id` int(11) NOT NULL COMMENT 'FK - id do setor que o problema está vinculado.',
  PRIMARY KEY (`id`),
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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL,
  `atende_chamado` tinyint(4) NOT NULL DEFAULT '0' COMMENT 'FLAG - indica se o setor está apto a atender chamados. 0 (zero) = não; 1 (um) = sim.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `setores`
--

INSERT INTO `setores` (`id`, `descricao`, `atende_chamado`) VALUES
(7, 'Help Desk - Atendimento', 1),
(8, 'Help Desk - Suporte Técnico', 1),
(9, 'Diretoria', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `slas`
--

CREATE TABLE IF NOT EXISTS `slas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tempo` int(11) NOT NULL COMMENT 'tempo em minutos',
  `descricao` varchar(100) NOT NULL COMMENT 'descrição do tempo mais legível',
  PRIMARY KEY (`id`)
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
(17, 43200, '1 mês'),
(18, 5, '5 minutos'),
(19, 10, '10 minutos'),
(20, 20, '20 minutos'),
(21, 25, '25 minutos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `status`
--

INSERT INTO `status` (`id`, `descricao`) VALUES
(1, 'Em Andamento'),
(2, 'Resolvido'),
(3, 'Aguardando Atendimento'),
(4, 'Encerrada');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `grupo_id` int(11) NOT NULL,
  `setor_id` int(11) NOT NULL,
  `matricula` varchar(20) NOT NULL COMMENT 'É o número de matrícula do funcionário ou um outro valor caso seja um usuário externo',
  `nome` varchar(150) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `email` varchar(150) CHARACTER SET utf8 NOT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `ramal` varchar(10) DEFAULT NULL,
  `ativo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Campo para indicar se o usuário está ativo (S) ou não (N)',
  `data_cadastro` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `matricula` (`matricula`),
  UNIQUE KEY `matricula_2` (`matricula`),
  UNIQUE KEY `matricula_3` (`matricula`),
  UNIQUE KEY `matricula_4` (`matricula`),
  KEY `grupo_id` (`grupo_id`),
  KEY `setor_id` (`setor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `grupo_id`, `setor_id`, `matricula`, `nome`, `senha`, `email`, `celular`, `telefone`, `ramal`, `ativo`, `data_cadastro`) VALUES
(8, 3, 7, 'admin', 'Admin', 'd6559320d5b1b858531731461259b7f973a84f48', '', '', '', '', 1, '2029-01-01 00:00:00'),
(10, 1, 9, 'abre', 'abre', '6cb23894e504f9385646f78f141375c33f33922c', 'roger.sistemas@yahoo.com.br', '3187690548', '3134567894', '', 1, '2029-01-01 00:00:00'),
(11, 2, 8, 'atende', 'atende', '6cb23894e504f9385646f78f141375c33f33922c', 'siste@sdas.com', 'klkl', '3187690548', 'klkl', 1, '0000-00-00 00:00:00'),
(12, 1, 7, 'teste', 'teste', 'f30ccfe0b7611ffd719a26f5b23933fa0e3f45f7', 'reore@dqsf.com', '32434343434', '32332323232', '3232', 1, '2009-05-06 20:22:00'),
(13, 1, 7, 'aaa', 'admin', '6cb23894e504f9385646f78f141375c33f33922c', '', '', '', '', 1, '2009-05-06 20:35:00');

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
