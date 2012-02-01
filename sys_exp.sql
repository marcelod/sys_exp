-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 31/01/2012 às 16h29min
-- Versão do Servidor: 5.1.58
-- Versão do PHP: 5.3.6-13ubuntu3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Banco de Dados: `exemplo`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_acesso`
--

CREATE TABLE IF NOT EXISTS `tb_acesso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `str_acesso` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tb_acesso`
--

INSERT INTO `tb_acesso` (`id`, `str_acesso`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'USU&Aacute;RIO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_ci_sessions`
--

CREATE TABLE IF NOT EXISTS `tb_ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(255) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tb_ci_sessions`
--

INSERT INTO `tb_ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('06134a30f40382e534b103d792cb9b82', '127.0.0.1', 'Mozilla/5.0 (X11; Ubuntu; Linux i686; rv:10.0) Gec', 1328034222, ''),
('a86ed6b193f2ca585c0209c49d37e7c1', '127.0.0.1', 'Mozilla/5.0 (Ubuntu; X11; Linux i686; rv:9.0.1) Ge', 1328032289, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_contato`
--

CREATE TABLE IF NOT EXISTS `tb_contato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `str_nome` varchar(255) NOT NULL,
  `str_email` varchar(255) NOT NULL,
  `str_titulo` varchar(255) NOT NULL,
  `txt_msg` text NOT NULL,
  `id_usuario` int(11) NOT NULL DEFAULT '0',
  `dt_envio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `tb_contato`
--

INSERT INTO `tb_contato` (`id`, `str_nome`, `str_email`, `str_titulo`, `txt_msg`, `id_usuario`, `dt_envio`) VALUES
(1, 'asdfasdf', 'asdfasdf@sada.com', 'sadf', 'sadf\nasdf\nç\nsadf\nçsadfsa\ndfãs\n', 1, '2012-01-31 17:15:40');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_log`
--

CREATE TABLE IF NOT EXISTS `tb_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) DEFAULT NULL,
  `dt_access` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip_address` varchar(16) NOT NULL,
  `str_user_agent` varchar(255) NOT NULL,
  `str_link` varchar(255) DEFAULT NULL,
  `class_method` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tb_log`
--

INSERT INTO `tb_log` (`id`, `id_usuario`, `dt_access`, `ip_address`, `str_user_agent`, `str_link`, `class_method`) VALUES
(1, 0, '2012-01-24 19:08:22', '127.0.0.1', 'Mozilla/5.0 (Ubuntu; X11; Linux i686; rv:9.0.1) Gecko/20100101 Firefox/9.0.1', 'localhost/exemplo/', 'home::index'),
(2, 1, '2012-01-24 19:08:39', '127.0.0.1', 'Mozilla/5.0 (Ubuntu; X11; Linux i686; rv:9.0.1) Gecko/20100101 Firefox/9.0.1', 'localhost/exemplo/home/send', 'home::send'),
(3, 1, '2012-01-24 19:09:30', '127.0.0.1', 'Mozilla/5.0 (Ubuntu; X11; Linux i686; rv:9.0.1) Gecko/20100101 Firefox/9.0.1', 'localhost/exemplo/cadastro', 'cadastro::index');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_menu`
--

CREATE TABLE IF NOT EXISTS `tb_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `str_menu` varchar(50) NOT NULL,
  `str_link` varchar(255) NOT NULL,
  `str_alt` varchar(150) DEFAULT NULL,
  `str_target` varchar(50) DEFAULT NULL,
  `str_icon` varchar(255) DEFAULT NULL,
  `id_submenu` int(11) DEFAULT NULL,
  `int_ordem` int(11) NOT NULL,
  `opt_ativo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `tb_menu`
--

INSERT INTO `tb_menu` (`id`, `str_menu`, `str_link`, `str_alt`, `str_target`, `str_icon`, `id_submenu`, `int_ordem`, `opt_ativo`) VALUES
(1, 'Home', 'home', 'Home', '_parent', NULL, NULL, 1, 1),
(2, 'Quem Somos', 'quem_somos', 'Quem Somos', '_parent', NULL, NULL, 2, 1),
(3, 'Regulamento', 'regulamento', 'Regulamento', '_parent', NULL, NULL, 3, 1),
(4, 'Contato', 'contato', 'Contato', '_parent', NULL, NULL, 4, 1),
(5, 'Sair', 'home/logout', 'Sair', '_parent', NULL, NULL, 5, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_menu_acesso`
--

CREATE TABLE IF NOT EXISTS `tb_menu_acesso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `id_acesso` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `tb_menu_acesso`
--

INSERT INTO `tb_menu_acesso` (`id`, `id_menu`, `id_acesso`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 2),
(5, 3, 1),
(6, 3, 2),
(7, 4, 1),
(8, 4, 2),
(9, 5, 1),
(10, 5, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sys_menu`
--

CREATE TABLE IF NOT EXISTS `tb_sys_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `str_menu` varchar(50) NOT NULL,
  `str_link` varchar(255) NOT NULL,
  `str_alt` varchar(150) DEFAULT NULL,
  `str_target` varchar(50) DEFAULT NULL,
  `str_icon` varchar(255) DEFAULT NULL,
  `id_submenu` int(11) DEFAULT NULL,
  `int_ordem` int(11) NOT NULL,
  `opt_ativo` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `tb_sys_menu`
--

INSERT INTO `tb_sys_menu` (`id`, `str_menu`, `str_link`, `str_alt`, `str_target`, `str_icon`, `id_submenu`, `int_ordem`, `opt_ativo`) VALUES
(1, 'Cadastro', 'cadastro', 'Cadastro', '_parent', NULL, NULL, 1, 1),
(2, 'Sair', 'home/logout', 'Sair', '_parent', NULL, NULL, 3, 1),
(3, 'Template', 'cadastro_template', 'Template', '_parent', NULL, 1, 1, 1),
(4, 'Usuários', 'cadastro_usuarios', 'Usuários', '_parent', NULL, 1, 3, 1),
(5, 'Acessos', 'cadastro_acesso', 'Acessos', '_parent', NULL, 1, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sys_menu_acesso`
--

CREATE TABLE IF NOT EXISTS `tb_sys_menu_acesso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `id_acesso` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Extraindo dados da tabela `tb_sys_menu_acesso`
--

INSERT INTO `tb_sys_menu_acesso` (`id`, `id_menu`, `id_acesso`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(6, 1, 2),
(7, 2, 2),
(8, 4, 1),
(9, 3, 2),
(10, 5, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_template`
--

CREATE TABLE IF NOT EXISTS `tb_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `str_input_text` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `str_input_radio` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `int_input_checkbox1` tinyint(4) DEFAULT NULL,
  `int_input_checkbox2` tinyint(4) DEFAULT NULL,
  `id_select_option` int(11) DEFAULT NULL,
  `txt_textarea` text COLLATE utf8_unicode_ci,
  `opt_ativo` tinyint(4) NOT NULL DEFAULT '1',
  `opt_excluido` tinyint(4) NOT NULL DEFAULT '0',
  `dt_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_usuario` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tb_template`
--

INSERT INTO `tb_template` (`id`, `str_input_text`, `str_input_radio`, `int_input_checkbox1`, `int_input_checkbox2`, `id_select_option`, `txt_textarea`, `opt_ativo`, `opt_excluido`, `dt_cadastro`, `id_usuario`) VALUES
(1, 'asdf', 'Primeiro', 0, 0, 2, 'asdf', 1, 0, '2012-01-27 17:02:04', 1),
(2, 'testo 2', '0', 0, 0, 2, 'sdfg', 1, 0, '2012-01-27 17:42:27', 1),
(3, 'texto 3', '0', 0, 0, 1, 'sdfsdf', 1, 0, '2012-01-27 17:42:52', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE IF NOT EXISTS `tb_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `str_nome` varchar(255) NOT NULL,
  `str_login` varchar(100) NOT NULL,
  `str_email` varchar(100) NOT NULL,
  `id_acesso` int(11) NOT NULL,
  `str_pwd` varchar(255) NOT NULL,
  `str_image` varchar(255) DEFAULT NULL,
  `opt_ativo` tinyint(4) NOT NULL DEFAULT '1',
  `opt_excluido` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`id`, `str_nome`, `str_login`, `str_email`, `id_acesso`, `str_pwd`, `str_image`, `opt_ativo`, `opt_excluido`) VALUES
(1, 'Administrador', 'admin', 'admin@localhost.com.br', 1, '1234', '101c58b9d1508cabf4bd8e75a3f54181.gif', 1, 0),
(2, 'Usuario', 'usuario', 'usuario@localhost.com.br', 2, '4321', NULL, 1, 0),
(3, 'New User', 'newuser', 'new@user.com', 2, '1234', NULL, 1, 0),
(4, 'USUARIO ADMIN', 'newadmin', 'new@admin.com', 1, '1234', NULL, 1, 0);
