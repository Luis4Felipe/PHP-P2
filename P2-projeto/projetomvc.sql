SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Banco de dados: `projetomvc`
--
-- --------------------------------------------------------

DROP TABLE IF EXISTS bebida;
CREATE TABLE `bebida` (
  `idBebida` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `preco` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS cliente;
CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `endereco` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS ingrediente;
CREATE TABLE `ingrediente` (
  `idIngrediente` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `preco` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS pedido;
CREATE TABLE `pedido` (
  `idPedido` int(11) NOT NULL,
  `dt_pedido` datetime NOT NULL DEFAULT current_timestamp(),
  `idCliente` int(11) NOT NULL,
  `idBebida` int(11) NOT NULL,
  `idPizza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS pizza;
CREATE TABLE `pizza` (
  `idPizza` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `preco` float NOT NULL,
  `tamanho` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

DROP TABLE IF EXISTS usuario;
CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `data_cadastro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

ALTER TABLE `bebida`
  ADD PRIMARY KEY (`idBebida`) ;

ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`) ;

ALTER TABLE `ingrediente`
  ADD PRIMARY KEY (`idIngrediente`);

ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `fk_id_cliente` (`idCliente`),
  ADD KEY `fk_id_pizza` (`idPizza`),
  ADD KEY `fk_id_bebida` (`idBebida`);

ALTER TABLE `pizza`
  ADD PRIMARY KEY (`idPizza`) ;

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

-- --------------------------------------------------------

ALTER TABLE `bebida`
  MODIFY `idBebida` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `ingrediente`
  MODIFY `idIngrediente` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `pedido`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `pizza`
  MODIFY `idPizza` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_id_cliente` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`);

INSERT INTO `usuario` (`nome`, `email`, `username`, `password`, `data_cadastro`) VALUES ('Administrador', 'admin@ratatouille.com', 'admin', '$2y$10$6az4mkFVgsuPqkP6631MOe2PO0Gdup.HFIDGJOZP70dQSo4w4geui', current_timestamp())

COMMIT;

