-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 25-Nov-2017 às 12:46
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `projetointegrador`
--
CREATE DATABASE IF NOT EXISTS `projetointegrador` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `projetointegrador`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `alternativarespostapessoal`
--

CREATE TABLE IF NOT EXISTS `alternativarespostapessoal` (
  `idAlternativaRespostaPessoal` int(11) NOT NULL AUTO_INCREMENT,
  `alternativa` longtext NOT NULL,
  `idPergunta` int(11) NOT NULL,
  `idperguntapessoal` int(11) DEFAULT NULL,
  PRIMARY KEY (`idAlternativaRespostaPessoal`),
  KEY `idPergunta_idx` (`idPergunta`),
  KEY `idperguntapessoal` (`idperguntapessoal`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Extraindo dados da tabela `alternativarespostapessoal`
--

INSERT INTO `alternativarespostapessoal` (`idAlternativaRespostaPessoal`, `alternativa`, `idPergunta`, `idperguntapessoal`) VALUES
(32, 'Não consegui terminá-los mas vou fazer agora!', 6, 5),
(33, 'Não terminei, mas acho que não serão necessários.', 7, 5),
(34, 'Não serão necessários para a reunião, vou falar sobre as metas.', 8, 5),
(35, 'Eu gostaria de aproveitar essa reunião para falar.', 10, 6),
(36, 'Tudo bem, podemos deixar para a próxima, sem problemas.', 11, 6),
(37, 'Esqueci os relatórios e falei sobre a ação.', 12, 7),
(38, 'Não achei relevante os relatórios para falar sobre a ação.', 13, 7),
(39, 'Alternativa 01 (retorna para pergunta 5)', 5, 8),
(40, 'Alternativa 02 (retorna para pergunta 5)', 5, 8),
(41, 'Alternativa 01 (retorna para pergunta 5)', 5, 10),
(42, 'Alternativa 01 (retorna para pergunta 5)', 5, 10),
(43, 'Alternativa 01 (retorna para pergunta 5)', 5, 11),
(44, 'Alternativa 01 (retorna para pergunta 5)', 5, 11),
(45, 'Alternativa 01 (retorna para pergunta 5)', 5, 12),
(46, 'Alternativa 01 (retorna para pergunta 5)', 5, 12),
(47, 'Alternativa 01 (retorna para pergunta 5)', 5, 13),
(48, 'Alternativa 01 (retorna para pergunta 5)', 5, 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `caracteristica`
--

CREATE TABLE IF NOT EXISTS `caracteristica` (
  `idCaracteristica` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(60) NOT NULL,
  `descricao` longtext,
  PRIMARY KEY (`idCaracteristica`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Extraindo dados da tabela `caracteristica`
--

INSERT INTO `caracteristica` (`idCaracteristica`, `nome`, `descricao`) VALUES
(1, 'autruismo', 'ajduar as outras pessoas'),
(2, 'liderança', 'lider um grupo ou informações'),
(3, 'compaixão', 'amar o proximo'),
(4, 'proatividade', 'realizar tarefas antes do requisitado'),
(5, 'empatia', 'possuir amor ao proximo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `caracteristica_has_alternativarespostapessoal`
--

CREATE TABLE IF NOT EXISTS `caracteristica_has_alternativarespostapessoal` (
  `Caracteristica_idCaracteristica` int(11) NOT NULL,
  `AlternativaRespostaPessoal_idAlternativaRespostaPessoal` int(11) NOT NULL,
  `pontuacaoCaracteristica` int(11) NOT NULL,
  PRIMARY KEY (`Caracteristica_idCaracteristica`,`AlternativaRespostaPessoal_idAlternativaRespostaPessoal`),
  KEY `fk_Caracteristica_has_AlternativaRespostaPessoal_Alternativ_idx` (`AlternativaRespostaPessoal_idAlternativaRespostaPessoal`),
  KEY `fk_Caracteristica_has_AlternativaRespostaPessoal_Caracteris_idx` (`Caracteristica_idCaracteristica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `caracteristica_has_alternativarespostapessoal`
--

INSERT INTO `caracteristica_has_alternativarespostapessoal` (`Caracteristica_idCaracteristica`, `AlternativaRespostaPessoal_idAlternativaRespostaPessoal`, `pontuacaoCaracteristica`) VALUES
(1, 32, 30),
(1, 38, 35),
(2, 33, 60),
(2, 34, 100),
(3, 36, 70),
(4, 35, 90),
(4, 37, 57),
(5, 37, 76);

-- --------------------------------------------------------

--
-- Estrutura da tabela `caracteristica_has_personagem`
--

CREATE TABLE IF NOT EXISTS `caracteristica_has_personagem` (
  `Caracteristica_idCaracteristica` int(11) NOT NULL,
  `Personagem_idPersonagem` int(11) NOT NULL,
  `pontuacaoCaracPersonagem` int(11) NOT NULL,
  PRIMARY KEY (`Caracteristica_idCaracteristica`,`Personagem_idPersonagem`),
  KEY `fk_Caracteristica_has_Personagem_Personagem1_idx` (`Personagem_idPersonagem`),
  KEY `fk_Caracteristica_has_Personagem_Caracteristica1_idx` (`Caracteristica_idCaracteristica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `caracteristica_has_personagem`
--

INSERT INTO `caracteristica_has_personagem` (`Caracteristica_idCaracteristica`, `Personagem_idPersonagem`, `pontuacaoCaracPersonagem`) VALUES
(1, 2, -12),
(2, 2, 43),
(3, 2, 67),
(4, 2, 32),
(5, 2, 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta`
--

CREATE TABLE IF NOT EXISTS `conta` (
  `idConta` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `idEndereco` int(11) NOT NULL,
  `dtNasc` date NOT NULL,
  `sexo` tinyint(4) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `rg` varchar(14) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`idConta`),
  UNIQUE KEY `cpf_UNIQUE` (`cpf`),
  KEY `endereco_idx` (`idEndereco`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `conta`
--

INSERT INTO `conta` (`idConta`, `nome`, `sobrenome`, `idEndereco`, `dtNasc`, `sexo`, `cpf`, `rg`, `email`, `senha`) VALUES
(1, 'matheus', 'Fiebes', 1, '2017-11-25', 1, '111.111.111-11', '105135379', 'richardsassers@gmail.com', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE IF NOT EXISTS `endereco` (
  `idEndereco` int(11) NOT NULL AUTO_INCREMENT,
  `pais` varchar(100) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `cidade` varchar(255) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `numero` int(11) NOT NULL,
  `complemento` longtext,
  PRIMARY KEY (`idEndereco`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`idEndereco`, `pais`, `estado`, `cidade`, `cep`, `rua`, `bairro`, `numero`, `complemento`) VALUES
(1, 'br', 'santa catarina', 'blumenau', '89052-050', 'rua 7 de maio', 'itoupava norte', 662, 'casa'),
(2, 'teste', 'teste', 'teste', 'teste', 'teste', 'teste', 2322, '124123'),
(3, 'pais', 'estado', 'Blumenau', '23332-43', 'dasda', 'foortaleza', 0, 'fundos'),
(4, 'teste12', 'teste12', 'teste12', '3234234', 'mklmskdlmfk', 'teste12', 9988, 'teste12'),
(5, 'brasil', 'sc', 'blumenau', '89052050', 'rua 7 de maio', 'itoupava norte', 662, 'minha casa'),
(6, 'sdfsdf', 'sdfsd', 'dfsdfsd', '090909', 'rua', 'bairro', 324234, 'jsiojiaos'),
(7, 'Brasil', 'Santa Catarina', 'Blumenau', '93284-902', 'akjsdnuihudask', 'akjsdnuihudask', 90328490, 'Casa dos fundos'),
(8, 'BR', 'SC', 'Blumenau', '99809-809', 'Rua', 'Bairro', 123, 'Casa dos fundos'),
(9, 'nkjn', '(', 'jknj', '92423-04', 'jkmjkn', 'jknjknjkn', 90324023, 'knkjnkjnkj'),
(10, 'mlml', 'ml', 'mk', '23432-342', 'kkmkm', 'llkm', 0, 'mlkm'),
(11, '111.111.111-11', '111.111.111-11', '111.111.111-11', '11111-11', '111.111.111-11', '111.111.111-11', 111111, '111.111.111-11'),
(12, '111.111.111-11', '111.111.111-11', '111.111.111-11', '11111-11', '111.111.111-11', '111.111.111-11', 111111, '111.111.111-11'),
(13, '111.111.111-11', '111.111.111-11', '111.111.111-11', '11111-11', '111.111.111-11', '111.111.111-11', 111111, '111.111.111-11'),
(14, 'uih', 'huih', 'uih', 'u', 'jniu', 'nuin', 0, 'uihiu'),
(15, '44444444444444', '44444444444444', '44444444444444', '44444-444', '44444444444444', '44444444444444', 2147483647, '44444444444444');

-- --------------------------------------------------------

--
-- Estrutura da tabela `historia`
--

CREATE TABLE IF NOT EXISTS `historia` (
  `idHistoria` int(11) NOT NULL AUTO_INCREMENT,
  `dtComeco` date NOT NULL,
  `dtFinalizacao` date DEFAULT NULL,
  PRIMARY KEY (`idHistoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `historia`
--

INSERT INTO `historia` (`idHistoria`, `dtComeco`, `dtFinalizacao`) VALUES
(2, '2017-11-13', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `historia_has_perguntalogica`
--

CREATE TABLE IF NOT EXISTS `historia_has_perguntalogica` (
  `Historia_idHistoria` int(11) NOT NULL,
  `PerguntaLogica_idPerguntaLogica` int(11) NOT NULL,
  PRIMARY KEY (`Historia_idHistoria`,`PerguntaLogica_idPerguntaLogica`),
  KEY `fk_Historia_has_PerguntaLogica_Historia1_idx` (`Historia_idHistoria`),
  KEY `fk_Historia_has_PerguntaLogica_PerguntaLogica1_idx` (`PerguntaLogica_idPerguntaLogica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `historia_has_perguntapessoal`
--

CREATE TABLE IF NOT EXISTS `historia_has_perguntapessoal` (
  `Historia_idHistoria` int(11) NOT NULL,
  `PerguntaPessoal_idPerguntaPessoal` int(11) NOT NULL,
  PRIMARY KEY (`Historia_idHistoria`,`PerguntaPessoal_idPerguntaPessoal`),
  KEY `fk_Historia_has_PerguntaPessoal_Historia1_idx` (`Historia_idHistoria`),
  KEY `fk_Historia_has_PerguntaPessoal_PerguntaPessoal1_idx` (`PerguntaPessoal_idPerguntaPessoal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagemhistoria`
--

CREATE TABLE IF NOT EXISTS `imagemhistoria` (
  `idimagemHistoria` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(255) NOT NULL,
  `idPerguntaPessoalImagem` int(11) NOT NULL,
  PRIMARY KEY (`idimagemHistoria`),
  KEY `idPergunta_idx` (`idPerguntaPessoalImagem`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Extraindo dados da tabela `imagemhistoria`
--

INSERT INTO `imagemhistoria` (`idimagemHistoria`, `link`, `idPerguntaPessoalImagem`) VALUES
(1, 'img/pergunta1_1.jpg', 5),
(2, 'img/pergunta1_2.jpg', 5),
(3, 'img/pergunta1_3.jpg', 5),
(4, 'img/pergunta1_4.jpg', 5),
(5, 'img/pergunta1_5.jpg', 5),
(6, 'img/pergunta2_1.jpg', 6),
(7, 'img/pergunta2_2.jpg', 6),
(8, 'img/pergunta2_3.jpg', 6),
(9, 'img/pergunta3_1.jpg', 7),
(10, 'img/pergunta3_2.jpg', 7),
(11, 'img/pergunta3_3.jpg', 7),
(12, 'img/pergunta4_1.jpg', 8),
(13, 'img/pergunta4_2.jpg', 8),
(14, 'img/pergunta4_3.jpg', 8),
(15, 'img/pergunta5_1.jpg', 10),
(16, 'img/pergunta5_2.jpg', 10),
(17, 'img/pergunta6_1.jpg', 11),
(18, 'img/pergunta6_2.jpg', 11),
(19, 'img/pergunta7_1.jpg', 12),
(20, 'img/pergunta7_2.jpg', 12),
(21, 'img/pergunta7_1.jpg', 13),
(22, 'img/pergunta7_2.jpg', 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `texto` varchar(100) NOT NULL,
  `img_back_src` varchar(100) NOT NULL,
  `img_end_src` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Extraindo dados da tabela `menu`
--

INSERT INTO `menu` (`id`, `texto`, `img_back_src`, `img_end_src`, `link`) VALUES
(1, 'Alterar perfil', 'img/perfil.png', 'img/editar.png', 'editar.php'),
(2, 'Começar a historia', 'img/logica.png', 'img/editar.png', 'perguntas.php'),
(3, 'Veja sua pontuação!', 'img/pontuacao2.jpg', 'img/editar.png', 'pontos.php'),
(4, 'Notificações', 'img/notificacao.png', 'img/editar.png', '#'),
(8, 'Configurações', 'img/config2.png', 'img/editar.png', '#'),
(9, 'Sair', 'img/sair2.png', 'img/editar.png', 'sair.php');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntalogica`
--

CREATE TABLE IF NOT EXISTS `perguntalogica` (
  `idPerguntaLogica` int(11) NOT NULL AUTO_INCREMENT,
  `pergunta` longtext NOT NULL,
  `idRespostaLogica` int(11) NOT NULL,
  PRIMARY KEY (`idPerguntaLogica`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntapessoal`
--

CREATE TABLE IF NOT EXISTS `perguntapessoal` (
  `idPerguntaPessoal` int(11) NOT NULL AUTO_INCREMENT,
  `perguntaPessoal` longtext NOT NULL,
  PRIMARY KEY (`idPerguntaPessoal`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Extraindo dados da tabela `perguntapessoal`
--

INSERT INTO `perguntapessoal` (`idPerguntaPessoal`, `perguntaPessoal`) VALUES
(5, 'Qual a sua decisão? '),
(6, 'Qual a sua decisão? (Pergunta 2 referente a resposta 1,a)'),
(7, 'Qual a sua decisão? (Pergunta 2 referente a resposta 1,b)'),
(8, 'Qual a sua decisão? (pergunta 2 referente a resposta 1,c)'),
(10, 'Qual a sua decisão? (Pergunta 3 referente a resposta 2,a)'),
(11, 'Qual a sua decisão? (Pergunta 3 referente a resposta 2,b)'),
(12, 'Qual a sua decisão? (Pergunta 3 referente a resposta 2,a)'),
(13, 'Qual a sua decisão? (Pergunta 3 referente a resposta 2,b)');

-- --------------------------------------------------------

--
-- Estrutura da tabela `personagem`
--

CREATE TABLE IF NOT EXISTS `personagem` (
  `idPersonagem` int(11) NOT NULL AUTO_INCREMENT,
  `idConta` int(11) NOT NULL,
  `idHistoria` int(11) DEFAULT NULL,
  `nome` varchar(255) NOT NULL,
  `textos` longtext,
  `dtCriacao` date NOT NULL,
  PRIMARY KEY (`idPersonagem`),
  KEY `conta_idx` (`idConta`),
  KEY `historia_idx` (`idHistoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Extraindo dados da tabela `personagem`
--

INSERT INTO `personagem` (`idPersonagem`, `idConta`, `idHistoria`, `nome`, `textos`, `dtCriacao`) VALUES
(2, 1, 2, 'jackson', 'gay', '2017-11-13');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pontuacao`
--

CREATE TABLE IF NOT EXISTS `pontuacao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `x` int(11) NOT NULL,
  `y` int(11) NOT NULL,
  `questao` varchar(100) NOT NULL,
  `idCont` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idCont` (`idCont`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=105 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostaspersonagem`
--

CREATE TABLE IF NOT EXISTS `respostaspersonagem` (
  `idRespostas` int(11) NOT NULL,
  `tipoPergunta` tinyint(4) DEFAULT NULL,
  `idPerguntaLogica` int(11) DEFAULT NULL,
  `variavelPerguntaLogica1` int(11) DEFAULT NULL,
  `variavelPerguntaLogica2` int(11) DEFAULT NULL,
  `idRespostaPessoal` int(11) DEFAULT NULL,
  `idHistoria` int(11) NOT NULL,
  PRIMARY KEY (`idRespostas`),
  KEY `idPerguntaLogica_idx` (`idPerguntaLogica`),
  KEY `idRespostaPessoal_idx` (`idRespostaPessoal`),
  KEY `fk_RespostasPersonagem_Historia1_idx` (`idHistoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `alternativarespostapessoal`
--
ALTER TABLE `alternativarespostapessoal`
  ADD CONSTRAINT `idPergunta` FOREIGN KEY (`idPergunta`) REFERENCES `perguntapessoal` (`idPerguntaPessoal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idperguntapessoal` FOREIGN KEY (`idperguntapessoal`) REFERENCES `perguntapessoal` (`idPerguntaPessoal`);

--
-- Limitadores para a tabela `caracteristica_has_alternativarespostapessoal`
--
ALTER TABLE `caracteristica_has_alternativarespostapessoal`
  ADD CONSTRAINT `fk_Caracteristica_has_AlternativaRespostaPessoal_AlternativaR1` FOREIGN KEY (`AlternativaRespostaPessoal_idAlternativaRespostaPessoal`) REFERENCES `alternativarespostapessoal` (`idAlternativaRespostaPessoal`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Caracteristica_has_AlternativaRespostaPessoal_Caracteristi1` FOREIGN KEY (`Caracteristica_idCaracteristica`) REFERENCES `caracteristica` (`idCaracteristica`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `caracteristica_has_personagem`
--
ALTER TABLE `caracteristica_has_personagem`
  ADD CONSTRAINT `fk_Caracteristica_has_Personagem_Caracteristica1` FOREIGN KEY (`Caracteristica_idCaracteristica`) REFERENCES `caracteristica` (`idCaracteristica`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Caracteristica_has_Personagem_Personagem1` FOREIGN KEY (`Personagem_idPersonagem`) REFERENCES `personagem` (`idPersonagem`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `conta`
--
ALTER TABLE `conta`
  ADD CONSTRAINT `endereco` FOREIGN KEY (`idEndereco`) REFERENCES `endereco` (`idEndereco`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `historia_has_perguntalogica`
--
ALTER TABLE `historia_has_perguntalogica`
  ADD CONSTRAINT `fk_Historia_has_PerguntaLogica_Historia1` FOREIGN KEY (`Historia_idHistoria`) REFERENCES `historia` (`idHistoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Historia_has_PerguntaLogica_PerguntaLogica1` FOREIGN KEY (`PerguntaLogica_idPerguntaLogica`) REFERENCES `perguntalogica` (`idPerguntaLogica`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `historia_has_perguntapessoal`
--
ALTER TABLE `historia_has_perguntapessoal`
  ADD CONSTRAINT `fk_Historia_has_PerguntaPessoal_Historia1` FOREIGN KEY (`Historia_idHistoria`) REFERENCES `historia` (`idHistoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Historia_has_PerguntaPessoal_PerguntaPessoal1` FOREIGN KEY (`PerguntaPessoal_idPerguntaPessoal`) REFERENCES `perguntapessoal` (`idPerguntaPessoal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `imagemhistoria`
--
ALTER TABLE `imagemhistoria`
  ADD CONSTRAINT `idPerguntaPessoalImagem` FOREIGN KEY (`idPerguntaPessoalImagem`) REFERENCES `perguntapessoal` (`idPerguntaPessoal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `personagem`
--
ALTER TABLE `personagem`
  ADD CONSTRAINT `conta` FOREIGN KEY (`idConta`) REFERENCES `conta` (`idConta`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `historia` FOREIGN KEY (`idHistoria`) REFERENCES `historia` (`idHistoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pontuacao`
--
ALTER TABLE `pontuacao`
  ADD CONSTRAINT `idCont` FOREIGN KEY (`idCont`) REFERENCES `conta` (`idConta`);

--
-- Limitadores para a tabela `respostaspersonagem`
--
ALTER TABLE `respostaspersonagem`
  ADD CONSTRAINT `fk_RespostasPersonagem_Historia1` FOREIGN KEY (`idHistoria`) REFERENCES `historia` (`idHistoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idPerguntaLogica` FOREIGN KEY (`idPerguntaLogica`) REFERENCES `perguntalogica` (`idPerguntaLogica`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idRespostaPessoal` FOREIGN KEY (`idRespostaPessoal`) REFERENCES `alternativarespostapessoal` (`idAlternativaRespostaPessoal`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
