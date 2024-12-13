-- --------------------------------------------------------
-- Host:                         junction.proxy.rlwy.net
-- Versión del servidor:         9.1.0 - MySQL Community Server - GPL
-- SO del servidor:              Linux
-- HeidiSQL Versión:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `Proyecto_Fin_Grado` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `Proyecto_Fin_Grado`;

CREATE TABLE IF NOT EXISTS `alergenos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `imagen` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT IGNORE INTO `alergenos` (`id`, `imagen`, `nombre`) VALUES
	(1, 'celery', 'Apio'),
	(2, 'crustacean', 'Crustáceos'),
	(3, 'eggs', 'Huevo'),
	(4, 'fish', 'Pescado'),
	(5, 'gluten', 'Gluten'),
	(6, 'lupin', 'Altramuz'),
	(7, 'milk', 'Lácteos'),
	(8, 'mollusk', 'Moluscos'),
	(9, 'mustard', 'Mostaza'),
	(10, 'nuts', 'Frutos con cascara'),
	(11, 'peanut', 'Cacahuetes'),
	(12, 'sesame', 'Semillas de Sésamo'),
	(13, 'sulphites', 'Dióxido de azufre y sulfitos'),
	(14, 'soya', 'Soja');

CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `imagen` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT IGNORE INTO `categorias` (`id`, `imagen`, `nombre`, `slug`) VALUES
	(1, 'ensalada-dieguichi.webp', 'Ensaladas y entrantes fríos', 'ensaladas-y-entrantes-frios'),
	(2, 'croquetas-gambas.webp', 'Entrantes calientes', 'entrantes-calientes'),
	(3, 'carabineros.webp', 'Crustaceos y moluscos', 'crustaceos-y-moluscos'),
	(4, 'arroz-bogavante.webp', 'Arroces y Paellas', 'arroces-y-paellas'),
	(5, 'salmon.webp', 'Plancha', 'plancha'),
	(6, 'nuggets.webp', 'Menú infantil', 'menu-infantil'),
	(7, 'solomillo.webp', 'Carnes', 'carnes'),
	(8, 'bacalao-frito.webp', 'Frituras', 'frituras'),
	(9, 'ventresca-atun.webp', 'Espetos', 'espetos'),
	(10, 'milhojas-nata.webp', 'Postres', 'postres'),
	(11, 'alhambra-reserva.webp', 'Bebidas', 'bebidas'),
	(12, 'sex-on-the-beach.webp', 'Cocktails', 'cocktails'),
	(13, 'coca-cola.webp', 'Refrescos', 'refrescos'),
	(14, 'frappe.webp', 'Cafés', 'cafes');

CREATE TABLE IF NOT EXISTS `pedidos` (
  `id_pedido` int NOT NULL AUTO_INCREMENT,
  `fecha_pedido` datetime(6) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `id_usuario` int NOT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `FK4a0lfwlpmytywxpwjfa1a3ar2` (`id_usuario`),
  CONSTRAINT `FK4a0lfwlpmytywxpwjfa1a3ar2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


CREATE TABLE IF NOT EXISTS `productos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `unidades` int DEFAULT NULL,
  `categoria` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK2g49dxv5ssl0hkd00v4badmsw` (`categoria`),
  CONSTRAINT `FK2g49dxv5ssl0hkd00v4badmsw` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT IGNORE INTO `productos` (`id`, `descripcion`, `imagen`, `nombre`, `precio`, `slug`, `unidades`, `categoria`) VALUES
	(1, '¡Un festín para los sentidos! Esta ensalada fresca y vibrante está preparada con los mejores ingredientes de la temporada: ventresca de atún, tomates maduros, cebolla y aceitunas negras', 'ensalada-dieguichi.webp', 'Ensalada Dieguichi', 13, 'ensalada-dieguichi', 100, 1),
	(2, 'Sencillez y frescura en su máxima expresión. Una combinación clásica de lechuga crujiente, tomate, zanahoria rallada, cebolla fresca y atún de primera calidad.', 'ensalada-mixta.webp', 'Ensalada Mixta', 12, 'ensalada-mixta', 100, 1),
	(3, 'El sabor de lo auténtico. Pimientos rojos asados lentamente hasta conseguir un punto de dulzura perfecto. Disfruta de su sabor ahumado, acompañado de un toque de aceite de oliva virgen extra y sal marina.', 'pimientos-asados.webp', 'Pimientos Asados', 10, 'pimientos-asados', 100, 1),
	(4, 'Frescura y sabor del huerto. Tomates de la mejor calidad, recogidos en su punto óptimo, que explotan en jugosidad y sabor. Perfectos para disfrutar con un buen trozo de pan recién horneado. ', 'tomate-castellano.webp', 'Tomate Castellano', 7, 'tomate-castellano', 100, 1),
	(5, 'El verano en tu paladar. Una combinación de tomates maduros, mozzarella fresca, albahaca aromática y un chorrito de aceite de oliva virgen extra, coronado con un toque de sal y pimienta.', 'ensalada-caprese.webp', 'Ensalada Caprese', 13, 'ensalada-caprese', 100, 1),
	(6, 'Crema y frescura en un solo plato. Aguacate cremoso en capas, acompañado de tomates y un toque de limón, todo aderezado con aceite de oliva y especias. Un plato refrescante y lleno de sabor, ideal para comenzar tu comida con un toque saludable.', 'timbal-aguacates.webp', 'Timbal de Aguacate', 18, 'timbal-de-aguacates', 100, 1),
	(7, 'Una delicia marina. Pulpo tierno, cortado en rodajas finas, sobre una cama de hojas verdes, aderezado con vinagreta de mostaza y miel, para una mezcla perfecta entre mar y tierra. ¡El toque gallego que refrescará tu paladar y te hará querer más!', 'ensalada-pulpo.webp', 'Ensalada de Pulpo', 12, 'ensalada-de-pulpo', 100, 1),
	(8, 'Un clásico que nunca pasa de moda. Camarones frescos salteados en una tortilla esponjosa, con un toque de cebolla y especias. Perfecta para compartir o disfrutar en solitario. ¡Crujiente por fuera y suave por dentro, ideal para cualquier momento del día!', 'tortilla-camarones.webp', 'Tortilla de Camarones', 2.5, 'tortilla-de-camarones', 100, 2),
	(9, 'El marisco en su máximo esplendor. Gambas frescas cocinadas con ajo, guindilla y aceite de oliva virgen extra, creando una explosión de sabores en cada bocado. Atrévete a saborear el auténtico sabor del mar con un toque picante que cautivará tus sentidos', 'gambas-pil-pil.webp', 'Gambas al Pil-Pil', 15.5, 'gambas-pil-pil', 100, 2),
	(10, 'El toque picante que estabas buscando. Patatas crujientes por fuera y tiernas por dentro, acompañadas de una salsa brava casera que tiene el equilibrio perfecto entre picante y sabroso. ¡Un plato irresistible para compartir o disfrutar por ti mismo!', 'patatas-bravas.webp', 'Patatas Bravas', 7, 'patatas-bravas', 100, 2),
	(11, 'Cremosas y crocantes, una delicia del mar. Croquetas de calamar, crujientes por fuera y suaves por dentro, llenas de sabor a mar. Cada bocado es una explosión de sabor que te hará querer más. ¡El mar nunca fue tan delicioso!', 'croquetas.webp', 'Croquetas de Choco', 13, 'croquetas-de-choco', 100, 2),
	(12, 'Un bocado de lujo. Estas croquetas rellenas de gambas frescas y cremosas son el acompañamiento perfecto o el plato ideal para un picoteo entre amigos. La crujiente capa exterior esconde un interior suave y lleno de sabor a mar.', 'croquetas-gambas.webp', 'Croquetas de Gambas', 14, 'croquetas-de-gambas', 100, 2),
	(13, 'Refrescante, saludable y lleno de sabor. Este gazpacho casero, hecho con tomates maduros, pepino, pimientos y un toque de aceite de oliva virgen extra, es la bebida perfecta para los días más calurosos.', 'gazpacho.webp', 'Gazpacho', 6, 'gazpacho', 100, 1),
	(14, 'La tradición en su forma más deliciosa. Este salmorejo, cremoso y espeso, está hecho con tomates frescos, pan y aceite de oliva, acompañado de huevo duro y jamón. ¡Es el plato perfecto para disfrutar de un sabor auténtico y refrescante!', 'salmorejo.webp', 'Salmorejo', 6.5, 'salmorejo', 100, 1),
	(15, 'Marisco fresco, directo del océano a tu plato. Almejas chirlas cocinadas al vapor, con un toque de vino blanco, ajo y perejil. Este manjar del mar es perfecto para disfrutar con una copa de vino blanco bien frío.', 'almejas-chirlas.webp', 'Almejas Chirlas', 14.5, 'almejas-chirlas', 100, 3),
	(16, 'Un manjar gallego. Coquinas frescas, cocidas al vapor con un toque de limón y perejil. Un sabor auténtico que te hará sentirte como en las mejores tabernas del norte de España. ¡El mar en su máxima expresión!', 'coquinas.webp', 'Coquinas', 21, 'coquinas', 100, 3),
	(17, 'Frescura en cada bocado. Mejillones cocidos al vapor, con un toque de vino blanco y hierbas, para una experiencia única que te hará saborear el mar en cada bocado. ¡Perfectos para acompañar una cerveza bien fría!', 'mejillones.webp', 'Mejillones al Vapor', 10, 'mejillones', 100, 3),
	(18, 'Sabor a Galicia en tu paladar. Zamburiñas a la plancha con un toque de ajo, aceite y perejil, servidas recién hechas. Un manjar delicado y sabroso que te hará soñar con las olas del Atlántico.', 'zamburinas.webp', 'Zamburiñas', 14, 'zamburinas', 100, 3),
	(19, 'El marisco más codiciado. Gambas blancas frescas, cocidas a la perfección, con un sabor dulce y tierno que hará que cada bocado sea un placer irresistible. ¡Perfectas para los amantes del buen marisco!\n\n', 'gamba-blanca.webp', 'Gambas Blancas', 24, 'gambas-blancas', 100, 3),
	(20, 'Exquisitez en cada bocado. Gambas rojas de calidad superior, cocinadas con cariño para resaltar su sabor inconfundible. ¡Un lujo del mar que se deshace en tu boca!', 'gamba-roja.webp', 'Gambas Rojas', 30, 'gambas-rojas', 100, 3),
	(21, 'Un lujo del mar en tu plato. Carabineros gigantes, a la plancha, jugosos y llenos de sabor, con un toque de sal y aceite de oliva que potencia su sabor natural. ¡Ideal para quienes buscan una experiencia gastronómica única!', 'carabineros.webp', 'Carabineros a la Plancha', 60, 'carabineros-plancha', 100, 3),
	(22, 'Del mar a la mesa. Navajas gallegas cocinadas al vapor, con un toque de limón y perejil fresco, para una experiencia refrescante y llena de sabor.', 'navajas.webp', 'Navajas Gallegas', 14, 'navajas', 100, 3),
	(23, 'Un festín del mar en cada grano de arroz. Nuestra paella de marisco es un verdadero homenaje a la tradición mediterránea. Arroz perfectamente cocido en un caldo rico, repleto de mariscos frescos como mejillones, gambas, calamares y almejas.', 'paella-marisco.webp', 'Paella de Marisco', 40, 'paella-de-marisco', 100, 4),
	(24, 'La combinación perfecta de mar y tierra. Arroz jugoso, cocinado con la mejor carne y mariscos frescos, en una mezcla deliciosa de sabores que te sorprenderán. Esta paella mixta es ideal para aquellos que buscan disfrutar de lo mejor de dos mundos.', 'paella-mixta.webp', 'Paella Mixta', 40, 'paella-mixta', 100, 4),
	(25, 'El sabor profundo del mar en cada cucharada. Un arroz caldoso lleno de sabor, cocinado a fuego lento con mariscos frescos y un caldo exquisito que hará que no puedas dejar de comer. Perfecto para los amantes del arroz meloso.', 'arroz-caldoso-marisco.webp', 'Arroz Caldoso de Marisco', 40, 'arroz-caldoso-de-marisco', 100, 4),
	(26, 'El arroz más sabroso y sorprendente. Arroz caldoso teñido con la tinta de sepia, creando un sabor profundo y único que resalta los calamares y mariscos. Cada bocado es un placer para los sentidos, con un toque salado que te dejará sin palabras.', 'arroz-negro.webp', 'Arroz Negro', 38, 'arroz-negro', 100, 4),
	(27, 'Sabor fresco y saludable. Si prefieres una opción sin carne ni mariscos, nuestra paella de verduras te sorprenderá. Con una mezcla vibrante de vegetales de temporada, esta paella es un plato delicioso, lleno de color y sabor natural.', 'paella-verdura.webp', 'Paella de Verdura', 36, 'paella-de-verdura', 100, 4),
	(28, 'Un arroz lleno de sabor a mar. Arroz meloso, suave y cremoso, con trozos de pulpo tierno, que aportan un sabor profundo y delicioso. Perfecto para quienes buscan una experiencia gastronómica diferente, llena de matices del océano.', 'arroz-meloso-pulpo.webp', 'Arroz Meloso de Pulpo', 44, 'arroz-meloso-de-pulpo', 100, 4),
	(29, 'El lujo del mar en cada cucharada. Este arroz caldoso con carabineros es una verdadera delicia para los amantes de los mariscos. El arroz, absorbido por el sabor de los carabineros, es una combinación de texturas y sabores intensos que harán que no puedas', 'arroz-carabineros.webp', 'Arroz Caldoso con Carabineros', 50, 'arroz-caldoso-con-carabineros', 100, 4),
	(30, 'Un arroz caldoso digno de una celebración. Este plato es una obra maestra culinaria, con bogavantes frescos que aportan su delicioso sabor al caldo, y un arroz caldoso y sabroso que te hará soñar con las olas del mar. ¡Una experiencia de lujo!', 'arroz-bogavante.webp', 'Arroz Caldoso con Bogavantes', 50, 'arroz-caldoso-con-bogavantes', 100, 4),
	(31, 'Un pescado suave y jugoso. La rosada es uno de los pescados más sabrosos y versátiles. Cocinado a la plancha o a la parrilla, es un plato ligero pero delicioso, ideal para disfrutar con un toque de limón y aceite de oliva virgen extra. ¡La sencillez nunca', 'rosada-plancha.webp', 'Rosada', 15, 'rosada-plancha', 100, 5),
	(32, 'El auténtico sabor del mar. El choco, o sepia, es un pescado tierno y sabroso que se cocina perfectamente a la plancha o frito. Su carne jugosa y su sabor suave lo convierten en un manjar delicioso para los amantes de los mariscos.', 'choco-plancha.webp', 'Choco', 13.5, 'choco-plancha', 100, 5),
	(33, 'Frescura y ternura en cada bocado. Calamares fritos o a la plancha, crujientes por fuera y tiernos por dentro. Este plato, acompañado de una buena salsa alioli, es una opción ideal para disfrutar de un bocado delicado y sabroso, lleno de frescura marina.', 'calamar-plancha.webp', 'Calamar', 28, 'calamar-plancha', 100, 5),
	(34, 'Una opción saludable y sabrosa. El salmón fresco, cocinado a la parrilla o a la plancha, es perfecto para aquellos que buscan un plato ligero pero delicioso. Su sabor suave y jugoso se realza con un toque de hierbas y limón, creando una combinación perfec', 'salmon.webp', 'Salmón', 22, 'salmon', 100, 5),
	(35, 'Sencillez y sabor en su máxima expresión. Pechuga de pollo a la plancha, jugosa y perfectamente cocinada, acompañada con una guarnición fresca. Un plato clásico, saludable y lleno de sabor, ideal para disfrutar al aire libre.', 'pollo-plancha.webp', 'Pechuga de Pollo Plancha', 11, 'pechuga-de-pollo-plancha', 100, 6),
	(36, 'Crujiente y jugosa por dentro. Pechuga de pollo empanada y frita hasta dorarse, conservando su jugosidad por dentro. Un plato reconfortante que gusta a todos, acompañado de una buena ración de patatas fritas.', 'pollo-empanado.webp', 'Pechuga de Pollo Empanado', 12, 'pechuga-de-pollo-empanado', 100, 6),
	(37, 'Comida divertida para todos. Nuggets de pollo crujientes y sabrosos, acompañados de unas patatas fritas doradas. Un plato ideal para picar o compartir con amigos, que siempre es un éxito en la mesa.', 'nuggets.webp', 'Nuggets con Patatas', 10, 'nuggets', 100, 6),
	(38, 'Un clásico que nunca falla. Spaghetti al dente, bañados en una salsa de tomate fresca, y cubiertos con queso rallado. Un plato delicioso, sencillo y lleno de sabor, perfecto para quienes buscan algo reconfortante.', 'spaguettis-tomate.webp', 'Spaghetti con Tomate y Queso', 10, 'spaghetti-con-tomate-queso', 100, 6),
	(39, 'Una explosión de sabores del mar. Spaghetti cocinados con una mezcla de mariscos frescos: mejillones, gambas y calamares. Todo bañado con una salsa marinera que te hará sentirte en pleno Mediterráneo con cada bocado.', 'spaguettis-marinera.webp', 'Spaghetti Marinera', 13, 'spaghetti-marinera', 100, 6),
	(40, 'Frescura y ligereza. Boquerones marinados con vinagre, ajo y aceite de oliva, servidos con una pizca de sal. Un plato fresco, ideal para compartir con una bebida refrescante mientras disfrutas del sol y la brisa del mar.', 'boquerones-fritos.webp', 'Boquerones', 12, 'boquerones-fritos', 100, 8),
	(41, 'El sabor de la mar con un toque crujiente. El choco (sepia) es un manjar de la costa, cuya carne suave y jugosa se convierte en un festín cuando se sirve frita. Con un toque crujiente por fuera y tierno por dentro.', 'choco-frito.webp', 'Choco', 13, 'choco-frito', 100, 8),
	(42, 'Un bocado de mar en cada pieza. La rosada es un pescado suave y sabroso, ideal para quienes disfrutan de la frescura del mar. Su carne tierna y jugosa, perfectamente frita, ofrece un sabor delicado que hará que cada bocado sea una experiencia deliciosa.', 'rosada-frita.webp', 'Rosada', 14, 'rosada-frita', 100, 8),
	(43, '¡Disfruta de un placer gastronómico auténtico! Nuestros deliciosos espetos de pescado frito, preparados con técnicas tradicionales y ingredientes frescos de la costa, ofrecen una experiencia culinaria única.', 'palomitas.webp', 'Palomitas', 13.5, 'palomitas-fritas', 100, 8),
	(44, 'Un clásico irresistible. Calamares fritos crujientes o a la plancha, con un toque de limón y sal. Perfectos como aperitivo o plato principal, siempre son un éxito entre los amantes del marisco.', 'calamares-fritos.webp', 'Calamares', 19, 'calamares-fritos', 100, 8),
	(45, 'El pescado tradicional por excelencia. Bacalao fresco, cocinado a la parrilla o a la plancha, con su característico sabor suave y delicado. Un plato de siempre, ideal para disfrutar con un buen vino blanco.', 'bacalao-frito.webp', 'Bacalao', 14, 'bacalao-frito', 100, 8),
	(46, 'El sabor del mar en su máxima expresión. Sardinas a la parrilla, servidas con un toque de sal y limón. Un plato sencillo, pero lleno de sabor, perfecto para disfrutar al aire libre mientras sientes la brisa marina.', 'sardinas.webp', 'Sardinas', 10, 'sardinas', 100, 9),
	(47, 'Un pescado suave y jugoso. Lubina fresca, cocinada a la plancha con aceite de oliva y un toque de sal. Su carne delicada y sabrosa se deshace en tu boca, haciendo de este plato una opción ideal para quienes buscan una comida ligera y llena de sabor.', 'lubina.webp', 'Lubina', 50, 'lubina', 100, 9),
	(48, 'El sabor del mar, fresco y delicado. Dorada a la parrilla, cocinada con un toque de sal y aceite de oliva, que resalta su sabor natural. Perfecta para disfrutar con una ensalada fresca o unas patatas al gusto.', 'dorada.webp', 'Dorada', 50, 'dorada', 100, 9),
	(49, 'El lujo del atún. La ventresca de atún, jugosa y llena de sabor, se sirve a la parrilla o a la plancha, acompañada de un toque de aceite de oliva y sal. Un manjar del mar que no puedes dejar de probar.', 'ventresca-atun.webp', 'Ventresca de Atún', 30, 'ventresca-de-atun', 100, 9),
	(50, 'Marisco a la parrilla en su mejor versión. Gambones gigantes a la parrilla, marinados con aceite de oliva, ajo y perejil. Un bocado espectacular, jugoso y lleno de sabor a mar, ideal para compartir entre amigos.', 'gambones.webp', 'Brocheta de Gambones', 16, 'brocheta-de-gambones', 100, 9),
	(51, 'El lujo del mar en brocheta. Carabineros frescos, cocinados a la parrilla con un toque de sal y aceite de oliva, servidos en brocheta. Cada bocado es un manjar que te transporta directamente al océano.', 'carabineros.webp', 'Brocheta de Carabineros', 60, 'brocheta-de-carabineros', 100, 9),
	(52, 'Un postre que enamora. Capas de hojaldre crujiente rellenas con una suave y deliciosa nata fresca. Un postre que, con su textura ligera y sabor dulce, se convierte en el cierre perfecto para cualquier comida.', 'milhojas-nata.webp', 'Milhojas de Nata', 6.5, 'milhojas-de-nata', 100, 10),
	(53, 'El toque dulce para tu día perfecto. Tarta de queso cremosa, suave y ligeramente ácida, con una base crujiente de galleta. Un clásico que nunca falla, ideal para los amantes de los postres sencillos pero deliciosos.', 'tarta-queso.webp', 'Tarta de Queso', 6.5, 'tarta-de-queso', 100, 10),
	(54, 'Un capricho irresistible. Mousse de chocolate suave y aireada, con un sabor intenso y profundo que se derrite en tu boca. Un postre perfecto para los más golosos y los amantes del buen chocolate.', 'mousse-chocolate.webp', 'Mousse de Chocolate', 6.5, 'mousse-de-chocolate', 100, 10),
	(55, 'Un pedacito de Italia en tu mesa. Este tiramisú casero es un festín de capas de crema de mascarpone, bizcochos empapados en café y cacao espolvoreado por encima. Un postre suave, cremoso y con un toque de cafeína.', 'tiramisu.webp', 'Tiramisú', 6.5, 'tiramisu', 100, 10),
	(56, 'El postre más irresistible. El banoffe es una explosión de sabores en cada bocado. Con una base crujiente de galletas, una capa de plátano fresco, toffee cremoso y nata montada, este postre es la combinación perfecta entre dulce y cremoso.', 'banoffe.webp', 'Banoffe', 6.5, 'banoffe', 100, 10),
	(57, 'Dulce, jugosa y deliciosa. Nuestra tarta de zanahoria es esponjosa y aromática, hecha con zanahorias frescas, nueces y un toque de especias. Su cobertura de queso crema suave y ligeramente dulce la convierte en un postre perfecto para cualquier ocasión.', 'tarta-zanahoria.webp', 'Tarta de Zanahoria', 6.5, 'tarta-de-zanahoria', 100, 10),
	(58, 'La dulzura y tradición de Cataluña. La crema catalana es un postre cremoso, con una capa de azúcar caramelizado por encima que cruje al primer toque. Con su sabor a vainilla y cítricos, este postre es una deliciosa manera de cerrar cualquier comida.', 'crema-catalana.webp', 'Crema Catalana', 6.5, 'crema-catalana', 100, 10),
	(59, 'El refresco clásico de siempre. Refrescante y burbujeante, Coca-Cola es la opción ideal para acompañar cualquier plato en tu visita al chiringuito. Su sabor inconfundible y su frescura harán que tu comida sea aún más placentera.', 'coca-cola.webp', 'Coca-Cola', 2.5, 'coca-cola', 100, 13),
	(60, 'Dulce y refrescante. Fanta de naranja es la bebida perfecta para los días calurosos. Con su sabor afrutado y burbujeante, esta bebida es una opción clásica que nunca falla para acompañar cualquier comida o disfrutar mientras te relajas bajo el sol.', 'fanta-naranja.webp', 'Fanta de Naranja', 2.5, 'fanta-naranja', 100, 13),
	(61, 'Todo el sabor, sin calorías. Si buscas la frescura de Coca-Cola pero sin azúcar, la Coca-Cola Zero es la opción ideal. Con el mismo sabor refrescante, es perfecta para aquellos que quieren disfrutar de su bebida favorita sin preocuparse por las calorías.', 'coca-cola-zero.webp', 'Coca-Cola Zero', 2.5, 'coca-cola-zero', 100, 13),
	(62, 'Sabor refrescante y cítrico. Fanta de limón te ofrece una explosión de sabor cítrico en cada sorbo. Perfecta para acompañar tus platos, su toque ácido y afrutado es ideal para los que buscan algo refrescante.', 'fanta-limon.webp', 'Fanta de Limón', 2.5, 'fanta-limon', 100, 13),
	(63, 'Refresca tu día. Sprite es la bebida refrescante por excelencia, con su sabor limpio y ligero de limón-lima. ¡Perfecta para disfrutar en cualquier momento del día, ideal para combatir el calor y acompañar tus platillos!', 'sprite.webp', 'Sprite', 2.5, 'sprite', 100, 13),
	(64, 'Refresca tu cuerpo con energía. Aquarius de naranja es la bebida isotónica ideal para mantenerte hidratado y energizado mientras disfrutas del sol. Con su sabor afrutado y refrescante, te hará sentir renovado al instante.', 'aquarius-naranja.webp', 'Aquarius de Naranja', 2.5, 'aquarius-naranja', 100, 13),
	(65, 'Refrescante y revitalizante. Aquarius de limón es la bebida perfecta para refrescarte mientras disfrutas de un día soleado. Su sabor ligero y refrescante te ayudará a mantenerte hidratado y lleno de energía.', 'aquarius-limon.webp', 'Aquarius de Limón', 2.5, 'aquarius-limon', 100, 13),
	(66, 'El sabor fresco del té con un toque cítrico. Nestea de limón es la bebida perfecta para refrescarte, combinando el sabor del té helado con el frescor del limón. ¡Ideal para disfrutar en un día caluroso junto a la playa!', 'nestea.webp', 'Nestea de Limón', 2.5, 'nestea', 100, 13),
	(67, 'Natural y refrescante. Zumo de manzana recién exprimido, sin aditivos ni azúcares añadidos. Un trago refrescante y lleno de sabor natural, ideal para acompañar tus platos o disfrutar como bebida independiente.', 'zumo-manzana.webp', 'Zumo de manzana', 2, 'zumo-manzana', 100, 13),
	(68, 'Tropical y refrescante. Zumo de piña, 100% natural y fresco, que te transporta a un paraíso tropical. Perfecto para acompañar cualquier comida o disfrutar como bebida refrescante en una tarde soleada.', 'zumo-pina.webp', 'Zumo de Piña', 2, 'zumo-pina', 100, 13),
	(69, 'Dulce y suave. Zumo de melocotón natural, con todo el sabor y dulzura de esta fruta jugosa. Ideal para quienes buscan un toque de frescura y sabor afrutado en su bebida.', 'zumo-melocoton.webp', 'Zumo de Melocotón', 2, 'zumo-melocoton', 100, 13),
	(70, 'El sabor auténtico de la cerveza andaluza. Con una tradición cervecera única, la cerveza Alhambra es perfecta para acompañar tus platos del chiringuito. Su sabor equilibrado y suave es ideal para disfrutar en cualquier momento del día.', 'alhambra.webp', 'Cerveza Alhambra', 3.5, 'alhambra', 100, 11),
	(71, 'La cerveza de autor que te sorprenderá. Alhambra 1925 es una cerveza de edición especial, con un sabor intenso y maltoso que destaca por su calidad y carácter. Perfecta para los amantes de las cervezas más complejas y sofisticadas.', 'alhambra-reserva.webp', 'Alhambra 1925', 3, 'alhambra-reserva', 100, 11),
	(72, 'La cerveza internacional por excelencia. Heineken es una opción refrescante y ligera que se disfruta en todo el mundo. Con su sabor único y equilibrado, es ideal para acompañar una buena comida al aire libre.', 'heineken.webp', 'Heineken', 3, 'heineken', 100, 11),
	(73, 'El sabor gallego que conquista. Estrella Galicia es una cerveza con carácter, suave y refrescante, ideal para disfrutar junto al mar o después de una buena comida. Perfecta para quienes buscan un toque auténtico y sabroso en su bebida.', 'estrella-galicia.webp', 'Estrella Galicia', 3, 'estrella-galicia', 100, 11),
	(74, 'Refrescante y ligera. Coronita es una cerveza refrescante, con un sabor suave que la hace perfecta para relajarte bajo el sol. Con su tamaño pequeño, es ideal para disfrutar mientras te relajas en tu lugar favorito.', 'coronita.webp', 'Coronita', 3.5, 'coronita', 100, 11),
	(75, 'La cerveza con un toque cítrico. Radler es la mezcla perfecta entre cerveza y limonada, ofreciendo un sabor refrescante y ligeramente ácido. Ideal para disfrutar en una tarde calurosa mientras te relajas junto al mar.', 'radler.webp', 'Radler', 3, 'radler', 100, 11),
	(76, 'El sabor del verano en una copa. Vino tinto mezclado con refresco de limón, creando una bebida refrescante y ligera. Perfecta para disfrutar en las calurosas tardes de verano, ideal para acompañar cualquier plato.', 'tinto-verano.webp', 'Tinto de Verano ', 4, 'tinto-verano', 100, 11),
	(77, 'La cerveza sin alcohol para todos. Para quienes prefieren evitar el alcohol pero no quieren renunciar a la frescura de una buena cerveza, esta opción es perfecta. ¡Sabor y frescura en cada sorbo!', 'alhambra.webp', 'Cerveza S/A', 3, 'cerveza-sa', 100, 11),
	(78, 'Hidrátate con la mejor calidad. Agua fresca y pura, ideal para mantenerte hidratado mientras disfrutas de tu día en el chiringuito. Disponible en botellas de 1 litro.', 'agua-grande.webp', 'Agua 1L', 3, 'agua-litro', 100, 13),
	(79, 'Pequeña, pero refrescante. Agua fresca en formato de 0,5 litros, ideal para llevar a cualquier parte y disfrutar de la hidratación necesaria durante tu jornada.', 'agua-pequena.webp', 'Agua 0,5L', 2, 'agua-pequena', 100, 13),
	(80, 'El sabor tropical en su máxima expresión. Piña Colada, un cóctel cremoso y dulce, hecho con piña, coco y ron. Este cóctel es perfecto para disfrutar mientras te relajas bajo el sol, transportándote a un paraíso tropical en cada sorbo.', 'pina-colada.webp', 'Piña Colada', 10, 'pina-colada', 100, 12),
	(81, 'Dulce y refrescante. El Daikiri de fresa es el cóctel perfecto para los amantes de las frutas. Su mezcla de ron blanco, fresa fresca y un toque de limón crea una bebida refrescante y vibrante.', 'daiquiri-fresa.webp', 'Daikiri de Fresa', 10, 'daikiri-fresa', 100, 12),
	(82, 'El clásico de los cócteles. Con tequila, licor de naranja y lima fresca, la Margarita es el cóctel perfecto para disfrutar en una tarde de verano. Su sabor ácido y refrescante es el acompañamiento ideal para un día de sol.', 'margarita.webp', 'Margarita', 10, 'margarita', 100, 12),
	(83, 'Un cóctel lleno de pasión. Sex on the Beach combina vodka, licor de durazno, jugo de naranja y un toque de granadina, creando una bebida refrescante y afrutada. ¡Un cóctel vibrante y delicioso para disfrutar con amigos!', 'sex-on-the-beach.webp', 'Sex on the Beach', 10, 'sex-on-the-beach', 100, 12),
	(84, 'Una explosión de colores y sabores. Tequila, jugo de naranja y un toque de granadina crean este cóctel visualmente espectacular. Con un sabor afrutado y refrescante, es perfecto para acompañar un día de relax al sol.', 'tequila-sunrise.webp', 'Tequila Sunrise', 10, 'tequila-sunrise', 100, 12),
	(85, 'El cóctel ideal para cualquier momento. Vodka, jugo de tomate y especias crean el sabor único de este cóctel, perfecto para disfrutar como aperitivo o en una tarde relajada junto al mar.', 'bloody-mary.webp', 'Bloody Mary', 10, 'bloody-mari', 100, 12),
	(86, 'Dulce, fresco y sin alcohol. Disfruta de un Daikiri de fresa sin alcohol, con todo el sabor y frescura del cóctel original, pero sin preocupaciones. Ideal para los que buscan una bebida refrescante y afrutado.', 'daiquiri-fresa.webp', 'Daikiri de Fresa S/A', 7, 'daikiri-fresa-sa', 100, 12),
	(87, 'El sabor tropical sin alcohol. Disfruta de una Piña Colada sin alcohol, igual de cremosa y deliciosa, con el sabor suave de la piña y el coco. Perfecta para aquellos que desean refrescarse con un cóctel sin preocuparse por el alcohol.', 'pina-colada.webp', 'Piña Colada S/A', 7, 'pina-colada-sa', 100, 12),
	(88, 'Refrescante y afrutado. El cóctel San Francisco es una explosión de frutas tropicales como naranja, piña, fresa y más, combinado con hielo y servido de manera refrescante. Ideal para disfrutar durante el día, con un sabor dulce y natural.', 'san-francisco.webp', 'San Francisco', 7, 'san-francisco', 100, 12),
	(89, 'El cóctel natural de la fruta. Nuestros smoothies son batidos frescos, hechos con frutas naturales y helado. La mezcla perfecta para disfrutar de una bebida refrescante y saludable mientras te relajas en el chiringuito.', 'smoothies.webp', 'Smoothies', 7, 'smoothies', 100, 12),
	(90, 'La frescura de la naranja, recién exprimida. Zumo de naranja natural, lleno de vitaminas y sabor. El complemento perfecto para tu desayuno o para acompañar cualquier plato. ¡El zumo más fresco y delicioso que puedas imaginar!', 'zumo-naranja.webp', 'Zumo Natural de Naranja', 5, 'zumo-naranja', 100, 12),
	(91, 'La intensidad del café en su estado más puro. Si eres amante del buen café, no puedes perderte nuestro café solo. Con su sabor fuerte y auténtico, es ideal para disfrutar en cualquier momento del día.', 'cafe-solo.webp', 'Café Solo', 2, 'cafe-solo', 100, 14),
	(92, 'El equilibrio perfecto entre café y leche. Nuestro café con leche es cremoso, suave y delicioso. Con una mezcla perfecta de café fuerte y leche espumosa, es ideal para quienes buscan un toque de dulzura en su bebida, perfecta para cualquier hora del día.', 'cafe-leche.webp', 'Café con Leche', 2.5, 'cafe-con-leche', 100, 14),
	(93, 'El café cremoso y con carácter. El capuccino, con su espresso suave, leche espumosa y una pizca de cacao por encima, es ideal para quienes disfrutan de un café reconfortante con un toque de dulzura.', 'capuccino.webp', 'Capuccino', 3, 'capuccino', 100, 14),
	(94, 'Refrescante y energizante. Nuestro frappé es una bebida helada y espumosa, preparada con café, hielo y leche. Perfecto para los días calurosos, cuando necesitas algo refrescante, pero sin renunciar al sabor intenso del café.', 'frappe.webp', 'Frappé', 3.5, 'frappe', 100, 14),
	(95, 'Un toque dulce para tu café. El café bombón es una mezcla de espresso y leche condensada, creando una bebida dulce, cremosa y deliciosa. Ideal para aquellos que buscan un café con un toque extra de dulzura para disfrutar en cualquier momento.', 'cafe-leche.webp', 'Café Bombón', 3, 'cafe-bombon', 100, 14),
	(96, 'Sabor suave y delicioso. El café americano es una opción ideal para quienes prefieren un café más suave. Con un toque de agua caliente, se obtiene una bebida suave y ligera, perfecta para acompañar cualquier momento del día, especialmente en la terraza.', 'cafe-solo.webp', 'Café Americano', 2, 'cafe-americano', 100, 14),
	(97, 'Un corte jugoso y tierno. El entrecot de ternera es uno de los platos más sabrosos y populares, perfecto para los amantes de la carne. Cocinado a la parrilla o a la plancha, se sirve con un toque de sal y pimienta para resaltar su sabor natural, ideal par', 'entrecot.webp', 'Entrecot de Ternera', 23, 'entrecot', 100, 7),
	(98, 'El lujo de la carne ibérica. El secreto ibérico es una carne jugosa, de sabor intenso y suave, ideal para quienes buscan algo realmente especial. Su textura y sabor hacen de este plato una experiencia gourmet, que se derrite en la boca. ¡Una joya gastronó', 'secreto-iberico.webp', 'Secreto Ibérico', 22, 'secreto-iberico', 100, 7),
	(99, 'La pieza más tierna y sabrosa. El solomillo de ternera es un corte suave y jugoso, ideal para los paladares más exigentes. Cocinado a la plancha o a la parrilla, este plato es perfecto para disfrutarlo con una buena copa de vino tinto y una guarnición al ', 'solomillo.webp', 'Solomillo de Ternera', 24, 'solomillo', 100, 7),
	(100, 'La mejor carne en una hamburguesa. La hamburguesa Angus es una opción jugosa y sabrosa para quienes buscan calidad en cada bocado. Hecha con carne de ternera Angus, es perfecta para aquellos que disfrutan de una hamburguesa de alto nivel.', 'hamburguesa.webp', 'Hamburguesa Angus', 16, 'hamburguesa', 100, 7),
	(101, 'Un mojito que hará que olvidéis el calor. Este cóctel cubano de ensueño combina el sabor suave del ron blanco con el frescor del limón y la fragancia de la menta, todo mezclado con hielo picado y una nota efervescente de soda.', 'mojito.webp', 'Mojito', 8, 'mojito', 100, 12),
	(102, 'El mojito de fresa, la versión tropical de este clásico cubano.', 'mojito-fresa.webp', 'Mojito de Fresa', 9, 'mojito-fresa', 100, 12);

CREATE TABLE IF NOT EXISTS `producto_alergeno` (
  `id_producto` int NOT NULL,
  `id_alergeno` int NOT NULL,
  KEY `FKb5wyeq77vx1ldhol68noym2r4` (`id_alergeno`),
  KEY `FKn7sxu7gaa2o13jhpedtm7hnmx` (`id_producto`),
  CONSTRAINT `FKb5wyeq77vx1ldhol68noym2r4` FOREIGN KEY (`id_alergeno`) REFERENCES `alergenos` (`id`),
  CONSTRAINT `FKn7sxu7gaa2o13jhpedtm7hnmx` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT IGNORE INTO `producto_alergeno` (`id_producto`, `id_alergeno`) VALUES
	(2, 3),
	(2, 4),
	(1, 4),
	(3, 4),
	(5, 7),
	(6, 2),
	(7, 8),
	(8, 5),
	(8, 2),
	(9, 5),
	(9, 2),
	(11, 5),
	(11, 8),
	(12, 5),
	(12, 8),
	(14, 5),
	(15, 8),
	(16, 8),
	(17, 8),
	(18, 8),
	(19, 2),
	(20, 2),
	(21, 2),
	(22, 8),
	(23, 2),
	(23, 8),
	(23, 4),
	(24, 2),
	(24, 8),
	(24, 4),
	(25, 2),
	(25, 8),
	(25, 4),
	(26, 4),
	(26, 2),
	(26, 8),
	(28, 2),
	(28, 4),
	(28, 8),
	(29, 2),
	(29, 4),
	(29, 8),
	(30, 2),
	(30, 4),
	(30, 8),
	(31, 4),
	(32, 8),
	(33, 8),
	(34, 4),
	(36, 5),
	(37, 5),
	(38, 5),
	(38, 7),
	(39, 2),
	(39, 4),
	(39, 8),
	(39, 5),
	(40, 4),
	(40, 5),
	(41, 8),
	(43, 5),
	(41, 5),
	(42, 4),
	(42, 5),
	(43, 2),
	(44, 5),
	(44, 8),
	(45, 4),
	(45, 5),
	(46, 4),
	(47, 4),
	(48, 4),
	(49, 4),
	(50, 2),
	(51, 2),
	(52, 5),
	(52, 7),
	(53, 5),
	(53, 7),
	(54, 5),
	(54, 7),
	(55, 5),
	(55, 7),
	(56, 5),
	(56, 7),
	(57, 7),
	(58, 7),
	(58, 3),
	(55, 7),
	(95, 7),
	(94, 7),
	(93, 7),
	(92, 7);

CREATE TABLE IF NOT EXISTS `producto_pedido` (
  `id_pedido` int NOT NULL,
  `id_producto` int NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `precio` double NOT NULL,
  `unidades` int NOT NULL,
  PRIMARY KEY (`id_pedido`,`id_producto`),
  KEY `FKibkl5ly2c2gv0pcjp7nkp299l` (`id_producto`),
  CONSTRAINT `FKb4a0a5fp32buxg3u5rf54am8o` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id_pedido`),
  CONSTRAINT `FKibkl5ly2c2gv0pcjp7nkp299l` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `clave` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nombre_usuario` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;