/*
 Navicat Premium Data Transfer

 Source Server         : BD_MySQL
 Source Server Type    : MySQL
 Source Server Version : 50717
 Source Host           : localhost:3306
 Source Schema         : bd_bomberos

 Target Server Type    : MySQL
 Target Server Version : 50717
 File Encoding         : 65001

 Date: 29/01/2021 15:47:00
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for permisos_bomberos
-- ----------------------------
DROP TABLE IF EXISTS `permisos_bomberos`;
CREATE TABLE `permisos_bomberos`  (
  `per_codigo` int(11) NOT NULL AUTO_INCREMENT,
  `per_fechaemision` datetime(0) NULL DEFAULT NULL,
  `per_numero` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `per_local` varchar(510) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `per_propietario` varchar(510) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `per_ruc` varchar(13) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `per_direccion` varchar(510) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `per_telefono` varbinary(10) NULL DEFAULT NULL,
  `per_tasapermisofuncionamiento` decimal(18, 2) NULL DEFAULT NULL,
  `per_tasapermisoinspeccion` decimal(18, 2) NULL DEFAULT NULL,
  `año` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`per_codigo`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'auto incrementing user_id of each user, unique index',
  `firstname` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'user\'s name, unique',
  `user_password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'user\'s password in salted and hashed format',
  `user_email` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'user\'s email, unique',
  `date_added` datetime(0) NOT NULL,
  `user_king` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `user_status` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL DEFAULT NULL,
  `user_foto` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NULL,
  PRIMARY KEY (`user_id`) USING BTREE,
  UNIQUE INDEX `user_name`(`user_name`) USING BTREE,
  UNIQUE INDEX `user_email`(`user_email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_unicode_ci COMMENT = 'user data' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'WALTER DANIEL', 'PÁRRAGA ANDRADE', 'ADMIN', '$2y$10$Yrit0fA7b0hKSvUbO0NmWOkJB8zOtQArL4iZkBqu0GSDTkYJDgyBK', 'wparraga@flavioalfaro.gob.ec', '2017-02-06 15:06:00', 'Administrador', 'Habilitado', 'ADMIN.jpg');
INSERT INTO `users` VALUES (2, 'KAREN LILIBETH', 'VERA MOREIRA', 'KAREN', '$2y$10$7kH.cJ2rMxaJwN/yDPQf0ubrPDMcOmo.cvPKWvt2EXTbxd/dgmfdm', 'antflavioalfaro@flavioalfaro.gob.ec', '2017-02-17 10:45:24', 'ANT', 'Habilitado', 'KAREN.jpg');
INSERT INTO `users` VALUES (3, 'LIGIA LORENA', 'PINO CEVALLOS', 'LIGIA', '$2y$10$lhmg2X1BRWbq.nMqwVR5YuVxVmBG/0JniOO8PLvuKAMc/W1VfI16K', 'ligialo-87@hotmail.com', '2020-07-17 11:08:56', 'Registro de la Propiedad', 'Deshabilitado', 'LIGIA.jpg');
INSERT INTO `users` VALUES (4, 'DENNY MARIA', 'ZAMBRANO ZAMBRANO', 'DENNY', '$2y$10$3vZsJ63clal6sRSWsZlJVOwmOn3WglV3hcnMzg0AdWkx6EjoTidR6', 'dennyzambrano2@hotmail.com', '2020-07-13 16:48:30', 'Registro de la Propiedad', 'Habilitado', 'DENNY.jpg');
INSERT INTO `users` VALUES (5, 'TANYA ', 'SOLORZANO ORDOÑEZ', 'TANYA', '$2y$10$M6UXWYE4PvXidrYmO8jKj.N63iVHQwsCVrqgtpR0R7JhKnv1QFzsK', 'jenjah2008@hotmail.com', '2020-07-15 10:29:16', 'Registro de la Propiedad', 'Habilitado', 'TANYA.jpg');
INSERT INTO `users` VALUES (6, 'DOLORES ALEXANDRA', 'CEDEÑO MOREIRA', 'NANA', '$2y$10$GYbPkd/5VOqybBp8fGPcKODRCW4c.A6gg09ltS.jgxYbb2KgUaQzi', 'alexandramoreira2016@outlook.es', '2020-07-15 10:32:21', 'Registro de la Propiedad', 'Habilitado', 'NANA.jpg');
INSERT INTO `users` VALUES (7, 'MARICELA', 'MUÑOZ', 'MARICELA', '$2y$10$jcCPDe5XVjEBq7C41sS/NOmnGNkwahCgTEef/bLpNRW6rD.yp7QUG', 'maricela91munoz@gmail.com', '2020-07-17 10:40:19', 'Registro de la Propiedad', 'Habilitado', 'MARICELA.jpg');
INSERT INTO `users` VALUES (8, 'GIMLI', 'HIJO DE GLOIN', 'GIMLI', '$2y$10$yKrC/V2O0N9Bmd8knOq55OqxZkMpaj1w/tlfP97JqmrzjwbwgjKyG', 'gimli001@hotmail.com', '2020-07-27 16:06:24', 'Planificación', 'Habilitado', 'GIMLI.png');
INSERT INTO `users` VALUES (9, 'MARITZA GALUD', 'PALMA BRAVO', 'GALUD', '$2y$10$OZAMVSImCMsAs1GEYt4kn.py6yoXFkCtfVtDk0PDDACHMawxLMquO', 'palma6761@hotmail.com', '2020-10-15 11:07:42', 'Avaluos y Catastro', 'Habilitado', 'GALUD.jpg');
INSERT INTO `users` VALUES (10, 'JOVITA LEONOR', 'VERA ZAMBRANO', 'LEONOR', '$2y$10$f2xGe/OdcBmSNnhX.jDMW.z2DCe3I77CSMKBgWSS6u9d7SpDLkQEi', 'wiledama@hotmail.com', '2020-10-15 11:12:52', 'Avaluos y Catastro', 'Habilitado', 'LEONOR.jpg');
INSERT INTO `users` VALUES (11, 'EULALIA MARIA', 'CHUEZ CARRANZA', 'EULALIA', '$2y$10$YyZPOiB6TvzP3/FDdZ.DCu9G5xmvCf7Wxrwd1uUtjuJPPZGeZK5b.', 'eulalia19840506@hotmail.com', '2020-10-15 11:18:21', 'Avaluos y Catastro', 'Habilitado', 'EULALIA.jpg');
INSERT INTO `users` VALUES (12, 'CARLA YIMABEL', 'ZAMBRANO SORNOZA', 'CARLA', '$2y$10$rujElajJiJvi/5KleoN30eEPfpWvDw0o5OVx1VXoJtz5O1gj1EziK', 'carlaliuski@hotmail.com', '2020-10-15 13:31:21', 'Avaluos y Catastro', 'Habilitado', 'CARLA.jpg');
INSERT INTO `users` VALUES (13, 'CARLOS JULIO', 'PADILLA ALCÍVAR', 'CARLOS', '$2y$10$0mOhxV4HoA.5PAa0O5JOLeXv8n3ul6LoqVMp4FyR5PELgSdUMn67m', 'cpadilla@flavioalfaro.gob.ec', '2020-10-23 11:36:47', 'Rentas', 'Habilitado', 'defecto.png');

SET FOREIGN_KEY_CHECKS = 1;
