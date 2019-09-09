-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Set-2019 às 19:09
-- Versão do servidor: 10.3.16-MariaDB
-- versão do PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_pc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `barramento`
--

CREATE TABLE `barramento` (
  `id` int(11) NOT NULL,
  `barramento` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `barramento`
--

INSERT INTO `barramento` (`id`, `barramento`) VALUES
(1, '10/100'),
(2, '10/100/1000');

-- --------------------------------------------------------

--
-- Estrutura da tabela `maquina`
--

CREATE TABLE `maquina` (
  `id` int(11) NOT NULL,
  `id_setor` int(11) NOT NULL,
  `id_rack` int(15) NOT NULL,
  `nome_maquina` varchar(150) NOT NULL,
  `nome_usuario` varchar(150) NOT NULL,
  `ponto` varchar(150) NOT NULL,
  `mac` varchar(150) NOT NULL,
  `id_sw` int(11) NOT NULL,
  `id_barramento` int(11) NOT NULL,
  `inv` varchar(25) DEFAULT NULL,
  `tombo` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `maquina`
--

INSERT INTO `maquina` (`id`, `id_setor`, `id_rack`, `nome_maquina`, `nome_usuario`, `ponto`, `mac`, `id_sw`, `id_barramento`, `inv`, `tombo`) VALUES
(16, 12, 7, 'DEf-01f', 'jose.walkirdesd', 'PP01PT023', '00:AF:SS:33:00:GG', 1, 1, '', 'sem tombo'),
(18, 18, 5, 'DEf-01', 'jose.walkirdes ', 'PP01PT02', '00:AF:SS:33:00:GG', 1, 1, '', ''),
(19, 16, 9, 'DEf-01', 'jose.walkirdes ', 'PP01PT02', '00:AF:SS:33:00:GG', 1, 1, '12331312', ''),
(20, 19, 9, 'DEf-01', 'jose.walkirdes ', 'PP01PT02', '00:AF:SS:33:00:GG', 1, 1, '12331312', ''),
(21, 18, 8, 'Veia01', 'thiago.silva', 'PP01PT02', '00:AF:SS:33:00:GG', 2, 1, '', '2334323'),
(22, 11, 2, 'DEf-01', 'fia2ss', 'PP01PT03', '55:aa:22:55:25:55', 2, 1, '', 'sem tombo');

-- --------------------------------------------------------

--
-- Estrutura da tabela `rack`
--

CREATE TABLE `rack` (
  `id` int(11) NOT NULL,
  `rack` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `rack`
--

INSERT INTO `rack` (`id`, `rack`) VALUES
(1, 'R001'),
(2, 'R002'),
(3, 'R003'),
(4, 'R004'),
(5, 'R005'),
(6, 'R006'),
(7, 'R007'),
(8, 'R008'),
(9, 'R009'),
(10, 'R0010');

-- --------------------------------------------------------

--
-- Estrutura da tabela `setor`
--

CREATE TABLE `setor` (
  `id` int(11) NOT NULL,
  `setor` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `setor`
--

INSERT INTO `setor` (`id`, `setor`) VALUES
(1, 'Arquivo Geral'),
(2, 'Assessoria Jurídica'),
(3, 'CAVAL'),
(4, 'CGI'),
(5, 'Contabilidade'),
(6, 'DAA'),
(7, 'DAC'),
(8, 'DCSD'),
(9, 'DEF'),
(10, 'DEF Ger.'),
(11, 'DEF Sim.'),
(12, 'DEPAC'),
(13, 'DEPAC Bal.'),
(14, 'DGAF'),
(15, 'DGF'),
(16, 'DGRH'),
(17, 'DICPA'),
(18, 'DIF'),
(19, 'DIJ'),
(20, 'Foral'),
(21, 'Divisão Estagio'),
(22, 'DPFP'),
(23, 'DPFP Inss'),
(24, 'DPSA'),
(25, 'DRF'),
(26, 'SEAD'),
(27, 'NEFIS'),
(28, 'Procuradoria'),
(29, 'Protocolo'),
(30, 'Gab. SEFAD'),
(31, 'Tesouraria'),
(32, 'Seplag'),
(33, 'DAP Conv.'),
(34, 'DAP Ger.'),
(35, 'DAT');

-- --------------------------------------------------------

--
-- Estrutura da tabela `switch`
--

CREATE TABLE `switch` (
  `id` int(11) NOT NULL,
  `sw` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `switch`
--

INSERT INTO `switch` (`id`, `sw`) VALUES
(1, 'SW001'),
(2, 'SW002'),
(3, 'SW003');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `login` varchar(40) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `login`, `senha`, `nivel`) VALUES
(1, 'luiz.ferreira', 'nando1176', 1),
(3, 'amiguinho', '123456', 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `barramento`
--
ALTER TABLE `barramento`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `maquina`
--
ALTER TABLE `maquina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maquina_ibfk_1` (`id_setor`),
  ADD KEY `maquina_ibfk_3` (`id_sw`) USING BTREE,
  ADD KEY `maquina_ibfk_4` (`id_barramento`) USING BTREE,
  ADD KEY `maquina_ibfk_2` (`id_rack`) USING BTREE;

--
-- Índices para tabela `rack`
--
ALTER TABLE `rack`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `setor`
--
ALTER TABLE `setor`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `switch`
--
ALTER TABLE `switch`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `barramento`
--
ALTER TABLE `barramento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `maquina`
--
ALTER TABLE `maquina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `rack`
--
ALTER TABLE `rack`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `setor`
--
ALTER TABLE `setor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `switch`
--
ALTER TABLE `switch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `maquina`
--
ALTER TABLE `maquina`
  ADD CONSTRAINT `maquina_ibfk_2` FOREIGN KEY (`id_rack`) REFERENCES `rack` (`id`),
  ADD CONSTRAINT `maquina_ibfk_3` FOREIGN KEY (`id_setor`) REFERENCES `setor` (`id`),
  ADD CONSTRAINT `maquina_ibfk_4` FOREIGN KEY (`id_sw`) REFERENCES `switch` (`id`),
  ADD CONSTRAINT `maquina_ibfk_5` FOREIGN KEY (`id_barramento`) REFERENCES `barramento` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
