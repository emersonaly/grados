/*
 Navicat Premium Data Transfer

 Source Server         : root
 Source Server Type    : MariaDB
 Source Server Version : 100418
 Source Host           : localhost:3306
 Source Schema         : db_grados

 Target Server Type    : MariaDB
 Target Server Version : 100418
 File Encoding         : 65001

 Date: 07/11/2021 13:43:30
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_categoria
-- ----------------------------
DROP TABLE IF EXISTS `tbl_categoria`;
CREATE TABLE `tbl_categoria`  (
  `categoria_ide` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `categoria_descrip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Descripcion',
  `categoria_borrado` int(11) NULL DEFAULT 0 COMMENT '1 si, 0 no',
  PRIMARY KEY (`categoria_ide`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Informacion acerca de las categorias' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_categoria
-- ----------------------------
INSERT INTO `tbl_categoria` VALUES (1, 'FRANELAS', 1);
INSERT INTO `tbl_categoria` VALUES (2, 'CARTERAS', 1);

-- ----------------------------
-- Table structure for tbl_cliente
-- ----------------------------
DROP TABLE IF EXISTS `tbl_cliente`;
CREATE TABLE `tbl_cliente`  (
  `clien_ide` int(11) NOT NULL AUTO_INCREMENT,
  `clien_ndi` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'numero de identificacion',
  `clien_nomb` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Nombres',
  `clien_apel` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Apellidos',
  `clien_direc` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'direccion especifica',
  `clien_tel` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'numero de celular',
  `clien_mail` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Correo',
  `clien_borrado` int(11) NULL DEFAULT 0 COMMENT '0 no, 1 si',
  PRIMARY KEY (`clien_ide`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Informacion  de los clientes' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_cliente
-- ----------------------------
INSERT INTO `tbl_cliente` VALUES (1, '19875625', 'Emerson', 'Rosales', 'la concordia', '5555-5555', 'emer@emer.com', 1);
INSERT INTO `tbl_cliente` VALUES (2, '12569874', 'MARCONS PEREZ', 'JIMENEZ', 'MIAMI-USA', '555888', 'MARCOSMIAMI@USA.COM', 0);

-- ----------------------------
-- Table structure for tbl_compra
-- ----------------------------
DROP TABLE IF EXISTS `tbl_compra`;
CREATE TABLE `tbl_compra`  (
  `compra_ide` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `compra_fecha` date NOT NULL COMMENT 'fecha de insercion',
  `compra_total` int(11) NULL DEFAULT NULL COMMENT 'total compra',
  PRIMARY KEY (`compra_ide`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Informacion entradas' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_compra
-- ----------------------------
INSERT INTO `tbl_compra` VALUES (1, '2000-01-01', NULL);

-- ----------------------------
-- Table structure for tbl_detacom
-- ----------------------------
DROP TABLE IF EXISTS `tbl_detacom`;
CREATE TABLE `tbl_detacom`  (
  `detacom_ide` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `detacom_codcom` int(11) NULL DEFAULT NULL COMMENT 'cod de entrda',
  `detacom_codproduc` int(11) NULL DEFAULT NULL COMMENT 'cod producto',
  `detacom_precioproduc` decimal(11, 2) NOT NULL DEFAULT 0.00 COMMENT 'precio producto',
  `detacom_cantidad` int(11) NULL DEFAULT NULL COMMENT 'cantidad',
  PRIMARY KEY (`detacom_ide`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Informacion detalle compra' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_detacom
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_detafac
-- ----------------------------
DROP TABLE IF EXISTS `tbl_detafac`;
CREATE TABLE `tbl_detafac`  (
  `detafac_ide` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `detafac_codfac` int(11) NULL DEFAULT NULL COMMENT 'cod de factura o entrda',
  `detafac_codproduc` int(11) NULL DEFAULT NULL COMMENT 'cod producto',
  `detafac_precioproduc` decimal(11, 2) NOT NULL DEFAULT 0.00 COMMENT 'precio producto',
  `detafac_cantidad` int(11) NULL DEFAULT NULL COMMENT 'cantidad',
  `detafac_fecha` datetime NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'fecha de insercion',
  PRIMARY KEY (`detafac_ide`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Informacion detalle factura' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_detafac
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_factura
-- ----------------------------
DROP TABLE IF EXISTS `tbl_factura`;
CREATE TABLE `tbl_factura`  (
  `factura_ide` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `factura_fecha` date NULL DEFAULT NULL COMMENT 'fecha de insercion',
  `factura_codclie` int(11) NULL DEFAULT NULL COMMENT 'cod cliente',
  `factura_subtotal` decimal(11, 2) NULL DEFAULT NULL COMMENT 'sub total',
  `factura_impuesto` decimal(11, 2) NULL DEFAULT NULL COMMENT 'cod cliente',
  `factura_total` decimal(11, 2) NULL DEFAULT NULL COMMENT 'cod cliente',
  PRIMARY KEY (`factura_ide`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Informacion entradas y salidas' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_factura
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_marca
-- ----------------------------
DROP TABLE IF EXISTS `tbl_marca`;
CREATE TABLE `tbl_marca`  (
  `marca_ide` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `marca_descrip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Descripcion',
  `marca_borrado` int(11) NULL DEFAULT 0 COMMENT '1 si, 0 no',
  PRIMARY KEY (`marca_ide`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Informacion acerca de las marcas' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_marca
-- ----------------------------
INSERT INTO `tbl_marca` VALUES (1, 'ADDIDAS', 1);
INSERT INTO `tbl_marca` VALUES (2, 'Levy`s', 1);
INSERT INTO `tbl_marca` VALUES (3, 'TOMMY', 1);
INSERT INTO `tbl_marca` VALUES (4, 'NIKE', 1);
INSERT INTO `tbl_marca` VALUES (5, 'EPK VENEZUELA', 1);

-- ----------------------------
-- Table structure for tbl_producto
-- ----------------------------
DROP TABLE IF EXISTS `tbl_producto`;
CREATE TABLE `tbl_producto`  (
  `produc_ide` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `produc_codigo` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Codigo de Barra o codigo de identificacion interno del producto',
  `produc_descrip` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'Descripcion del producto o articulo',
  `produc_existen` int(11) NOT NULL DEFAULT 0 COMMENT 'Cantidad o Existencia',
  `produc_costo` decimal(11, 2) NULL DEFAULT 0.00 COMMENT 'Costo o precio de compra',
  `produc_preciovent` decimal(11, 2) NOT NULL DEFAULT 0.00 COMMENT 'Precio de Venta por Default',
  `produc_talla` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '0' COMMENT 'Talla del producto',
  `produc_impuesto` int(11) NULL DEFAULT 0 COMMENT 'impuesto',
  `produc_porc1` int(11) NULL DEFAULT 0 COMMENT 'porcentaje de ganancia 1',
  `produc_observa` varchar(256) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Cualquier comentario u observacion sobre el producto',
  `produc_marca` int(11) NOT NULL DEFAULT 0 COMMENT 'Foranea de tbl_marca',
  `produc_cat` int(11) NOT NULL DEFAULT 0 COMMENT 'Foranea de tbl_categoria',
  `produc_user` int(11) NOT NULL COMMENT 'foranea Usuario que registro producto',
  `produc_borrado` int(11) NULL DEFAULT 0 COMMENT '0 no, 1 si',
  PRIMARY KEY (`produc_ide`, `produc_marca`, `produc_cat`, `produc_user`) USING BTREE,
  INDEX `produc_marca`(`produc_marca`) USING BTREE,
  INDEX `produc_cat`(`produc_cat`) USING BTREE,
  INDEX `produc_user`(`produc_user`) USING BTREE,
  CONSTRAINT `tbl_producto_ibfk_1` FOREIGN KEY (`produc_marca`) REFERENCES `tbl_marca` (`marca_ide`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tbl_producto_ibfk_2` FOREIGN KEY (`produc_cat`) REFERENCES `tbl_categoria` (`categoria_ide`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `tbl_producto_ibfk_3` FOREIGN KEY (`produc_user`) REFERENCES `tbl_usuarios` (`usua_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Informacion de Productos o Articulos' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_producto
-- ----------------------------
INSERT INTO `tbl_producto` VALUES (1, 'gra001', 'Franela Tommy gris', 35, 5.00, 21.00, 'M', 0, 5, 'Franela Nueva', 3, 1, 1, 1);
INSERT INTO `tbl_producto` VALUES (2, 'GRACAR22', 'CARTERA CABALLERO', 16, 5.00, 25.00, 'NA', 0, 10, 'CARTERA CABALLERO', 2, 2, 1, 1);
INSERT INTO `tbl_producto` VALUES (3, 'PANTA555', 'PANTALON DAMA IMPORTADO', 0, 11.00, 14.00, '34', 0, 10, 'AZUL OSCURO', 2, 2, 1, 1);

-- ----------------------------
-- Table structure for tbl_tipousua
-- ----------------------------
DROP TABLE IF EXISTS `tbl_tipousua`;
CREATE TABLE `tbl_tipousua`  (
  `tius_ide` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `tius_descrip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Descripcion',
  `tius_borrado` int(11) NULL DEFAULT 0 COMMENT '1 si, 0 no',
  PRIMARY KEY (`tius_ide`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Informacion acerca de los tipos de usuario' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_tipousua
-- ----------------------------
INSERT INTO `tbl_tipousua` VALUES (1, 'ADMINISTRADOR', 0);
INSERT INTO `tbl_tipousua` VALUES (2, 'ESTANDAR', 0);
INSERT INTO `tbl_tipousua` VALUES (3, 'LIMITADO', 0);

-- ----------------------------
-- Table structure for tbl_usuarios
-- ----------------------------
DROP TABLE IF EXISTS `tbl_usuarios`;
CREATE TABLE `tbl_usuarios`  (
  `usua_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador',
  `usua_nomb` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Nombres Del Usuario',
  `usua_apel` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'Apellidos',
  `usua_mail` varchar(150) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'correo electronico',
  `usua_login` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Nombre de usuario',
  `usua_clave` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Clave de acceso',
  `usua_estado` int(11) NOT NULL COMMENT '1 activo, 2 inactivo, 0 borrado',
  `fk_tipousua` int(11) NOT NULL COMMENT 'Foranea de tbl_tipousua',
  PRIMARY KEY (`usua_id`, `fk_tipousua`) USING BTREE,
  INDEX `fk_tipousua`(`fk_tipousua`) USING BTREE,
  INDEX `usua_id`(`usua_id`) USING BTREE,
  CONSTRAINT `tbl_usuarios_ibfk_1` FOREIGN KEY (`fk_tipousua`) REFERENCES `tbl_tipousua` (`tius_ide`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = 'Informacion acerca de los tipos de usuario' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_usuarios
-- ----------------------------
INSERT INTO `tbl_usuarios` VALUES (1, 'Administrador', 'Administrador', 'admin@admin.com', 'ADMIN', '1234', 1, 1);
INSERT INTO `tbl_usuarios` VALUES (2, 'Emerson', 'Rosales', 'emer@emer.com', 'EMERSON', '1234', 1, 2);
INSERT INTO `tbl_usuarios` VALUES (3, 'Gabriel', 'G', 'gab@gab.com', 'GABRIEL', '1234', 1, 3);

SET FOREIGN_KEY_CHECKS = 1;
