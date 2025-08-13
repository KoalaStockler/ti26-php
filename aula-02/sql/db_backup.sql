DROP TABLE IF EXISTS `tb_usuario`;

CREATE TABLE `tb_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `senha` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

LOCK TABLES `tb_usuario` WRITE;

INSERT INTO `tb_usuario` VALUES (1,'Ana Silva','11999999901','ana.silva','senha123'),(2,'Bruno Costa','11999999902','bruno.costa','123456'),(3,'Carla Mendes','11999999903','carla.m','abc123'),(4,'Diego Souza','11999999904','diego.s','minhasenha'),(5,'Eduarda Lima','11999999905','edu.lima','pass2024'),(6,'Felipe Rocha','11999999906','felipe.rocha','senha456'),(7,'Gabriela Torres','11999999907','gabi.t','meupass'),(8,'Henrique Alves','11999999908','henrique.a','123abc'),(9,'Isabela Santos','11999999909','isa.santos','teste321'),(10,'Jo?o Pereira','11999999910','joao.p','senha789');

UNLOCK TABLES;