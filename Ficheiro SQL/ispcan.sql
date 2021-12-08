-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 08-Dez-2021 às 00:43
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ispcan`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alunos`
--

DROP TABLE IF EXISTS `alunos`;
CREATE TABLE IF NOT EXISTS `alunos` (
  `id_aluno` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `ano_id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  `periodo_id` int(11) NOT NULL,
  `criado` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modificado` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `turma_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_aluno`),
  KEY `alunos_ibfk_1` (`curso_id`),
  KEY `periodo_id` (`periodo_id`),
  KEY `ano_id` (`ano_id`),
  KEY `turma_id` (`turma_id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `alunos`
--

INSERT INTO `alunos` (`id_aluno`, `nome`, `ano_id`, `curso_id`, `periodo_id`, `criado`, `modificado`, `turma_id`) VALUES
(2, 'jussias', 3, 1, 1, NULL, NULL, 19),
(4, 'silvio', 3, 1, 1, NULL, NULL, 19),
(6, 'mariana', 3, 1, 1, NULL, NULL, 19),
(24, 'joelson', 3, 1, 1, NULL, NULL, 19),
(44, 'marquinha', 3, 1, 1, NULL, NULL, 19),
(46, 'Adriano Alberto Bernardo', 3, 3, 1, NULL, NULL, 20),
(48, 'Acacia jacline', 2, 5, 1, NULL, NULL, 15),
(49, 'Geovania arez', 2, 5, 1, NULL, NULL, 15),
(50, 'Cezaltina Daniela Andre', 2, 7, 1, NULL, NULL, 28),
(51, 'José Marta', 1, 1, 1, NULL, NULL, 18),
(53, 'Vilma Maria', 2, 5, 1, NULL, NULL, 24),
(54, 'Laurinda Caxongo', 1, 8, 1, NULL, NULL, 31),
(55, 'Nuria Chivandaula', 1, 8, 1, NULL, NULL, 31),
(56, 'Labão Romeo', 1, 8, 1, NULL, NULL, 34),
(63, 'Teumiro Fernandes', 2, 1, 2, '2021-12-02 17:43:32', NULL, 20),
(64, 'Joelson Antonio', 2, 3, 2, '2021-12-02 18:02:16', NULL, 21),
(66, 'Zara Wiliams', 2, 3, 2, '2021-12-02 22:05:11', NULL, 21),
(67, 'Zara Wiliams C4 B', 2, 3, 2, '2021-12-08 00:13:10', NULL, 21),
(68, 'Zara Antonio', 2, 3, 3, '2021-12-08 00:15:48', NULL, 21),
(69, 'Manuela Andrade', 1, 3, 2, '2021-12-08 00:18:14', '2021-12-08 00:18:14', 21),
(70, 'Tinilson Agostinho', 1, 1, 1, '2021-12-08 00:39:27', '2021-12-08 00:39:27', 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ano`
--

DROP TABLE IF EXISTS `ano`;
CREATE TABLE IF NOT EXISTS `ano` (
  `id_ano` int(11) NOT NULL AUTO_INCREMENT,
  `ano` varchar(11) NOT NULL,
  PRIMARY KEY (`id_ano`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `ano`
--

INSERT INTO `ano` (`id_ano`, `ano`) VALUES
(1, '1º'),
(2, '2º'),
(3, '3º'),
(4, '4º'),
(5, '5º');

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

DROP TABLE IF EXISTS `curso`;
CREATE TABLE IF NOT EXISTS `curso` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `curso` varchar(60) NOT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `curso`
--

INSERT INTO `curso` (`id_curso`, `curso`) VALUES
(1, 'Eng. informática'),
(2, 'Eng. de construção civil'),
(3, 'Eng. electrônica e telecomunicações '),
(4, 'Contabilidade e gestão'),
(5, 'enfermagem'),
(6, 'ecomomia'),
(7, 'Psicologia'),
(8, 'G.R.H'),
(9, 'Fisioterapia'),
(10, 'Lingua Portuguesa'),
(11, '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `periodo`
--

DROP TABLE IF EXISTS `periodo`;
CREATE TABLE IF NOT EXISTS `periodo` (
  `id_periodo` int(11) NOT NULL AUTO_INCREMENT,
  `periodo` varchar(20) NOT NULL,
  PRIMARY KEY (`id_periodo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `periodo`
--

INSERT INTO `periodo` (`id_periodo`, `periodo`) VALUES
(1, 'manhã'),
(2, 'tarde'),
(3, 'noite');

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

DROP TABLE IF EXISTS `professor`;
CREATE TABLE IF NOT EXISTS `professor` (
  `id_prof` int(11) NOT NULL AUTO_INCREMENT,
  `disciplina` varchar(60) NOT NULL,
  `nome_prof` varchar(30) NOT NULL,
  `id_prof_ano` int(11) NOT NULL,
  `id_prof_curso` int(60) NOT NULL,
  PRIMARY KEY (`id_prof`),
  KEY `id_prof_ano` (`id_prof_ano`),
  KEY `id_prof_curso` (`id_prof_curso`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `professor`
--

INSERT INTO `professor` (`id_prof`, `disciplina`, `nome_prof`, `id_prof_ano`, `id_prof_curso`) VALUES
(7, 'Redes de computador', 'Kissoloquele Pinto', 3, 1),
(8, 'Sistemas distribuidos', 'Nilton Joveta', 3, 1),
(9, 'Computação gráfica', 'Edna Agostinho', 3, 1),
(10, 'Engenharia de software', 'Edna Agostinho', 3, 1),
(11, 'Base de dados', 'Osvaldo Queta', 3, 1),
(12, 'Direito informático', 'Massoxi Rafael', 3, 1),
(13, 'Electrónica II', 'Mateus Mulula', 3, 3),
(14, 'Circuitos Electricos III', 'Mateus Mulula', 3, 3),
(15, 'Electrónica digital I', 'Andre Andre', 3, 3),
(16, 'Fundamento das comunicações', 'Jony da Silva', 3, 3),
(17, 'Contabilidade e gestão', 'Adelina', 3, 2),
(18, 'Gestão de projetos', 'Miguel Cravid', 3, 3),
(19, 'Educação ambiental', 'José Guilherme', 3, 3),
(20, 'intr. a gestão I', 'Lisboa Junior', 1, 4),
(21, 'Matemática', 'Ivo Ngunza', 1, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turma`
--

DROP TABLE IF EXISTS `turma`;
CREATE TABLE IF NOT EXISTS `turma` (
  `id_turma` int(11) NOT NULL AUTO_INCREMENT,
  `bloco` varchar(20) NOT NULL,
  PRIMARY KEY (`id_turma`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `turma`
--

INSERT INTO `turma` (`id_turma`, `bloco`) VALUES
(15, 'F1'),
(16, 'F2'),
(17, 'F3'),
(18, 'F4'),
(19, 'Administrativo_1'),
(20, 'Administrativo_2'),
(21, 'Administrativo_3'),
(22, 'Administrativo_4'),
(23, 'B1'),
(24, 'B2'),
(25, 'B3'),
(26, 'B4'),
(27, 'C1'),
(28, 'C2'),
(29, 'C3'),
(30, 'C4'),
(31, 'D1'),
(32, 'D2'),
(33, 'D3'),
(34, 'D4');

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `alunos`
--
ALTER TABLE `alunos`
  ADD CONSTRAINT `alunos_ibfk_1` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id_curso`),
  ADD CONSTRAINT `alunos_ibfk_2` FOREIGN KEY (`periodo_id`) REFERENCES `periodo` (`id_periodo`),
  ADD CONSTRAINT `alunos_ibfk_4` FOREIGN KEY (`ano_id`) REFERENCES `ano` (`id_ano`),
  ADD CONSTRAINT `alunos_ibfk_5` FOREIGN KEY (`turma_id`) REFERENCES `turma` (`id_turma`);

--
-- Limitadores para a tabela `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `professor_ibfk_1` FOREIGN KEY (`id_prof_ano`) REFERENCES `ano` (`id_ano`),
  ADD CONSTRAINT `professor_ibfk_2` FOREIGN KEY (`id_prof_curso`) REFERENCES `curso` (`id_curso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
