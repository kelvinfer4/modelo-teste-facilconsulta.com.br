CREATE DATABASE teste_fc;

CREATE TABLE `medico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` VARCHAR(112) NOT NULL,
  `nome` VARCHAR(112) NOT NULL,
  `senha` VARCHAR(112) NOT NULL,
  `endereco_consultorio` VARCHAR(112) NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT current_timestamp(),
  `data_alteracao` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
);

INSERT INTO `medico` (`id`, `email`, `nome`, `senha`, `endereco_consultorio`, `data_criacao`, `data_alteracao`) VALUES
(7, 'dobke@gmail.com', 'Kelvin', 'd41d8cd98f00b204e9800998ecf8427e', 'Rua Flores da Cunha, 1785', '2020-03-03 23:34:03', '2020-03-03 12:03:49'),
(8, 'luizcesar@gmail.com', 'Luiz Cezar', 'd41d8cd98f00b204e9800998ecf8427e', 'Rua Pernambuco, 8758', '2020-03-03 23:34:38', '2020-03-03 12:03:45'),
(9, 'manu@gmail.com', 'Manu Lapschies', 'd41d8cd98f00b204e9800998ecf8427e', 'Rua das Flores, 88', '2020-03-04 00:01:54', '2020-03-03 12:03:27'),
(10, 'miguel@gmail.com', 'Miguel Lapschies Silveira', 'd41d8cd98f00b204e9800998ecf8427e', 'Av. Bento 17855', '2020-03-04 00:03:15', '2020-03-03 12:03:53'),
(11, 'antoniosouza@gmail.com', 'Antonio Souza', 'd41d8cd98f00b204e9800998ecf8427e', 'Av. Bento 88', '2020-03-04 00:20:12', '2020-03-03 12:03:30'); 
