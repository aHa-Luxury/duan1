-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: duan1
-- ------------------------------------------------------
-- Server version	8.0.34

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `bill`
--

DROP TABLE IF EXISTS `bill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `bill` (
  `id_bill` int NOT NULL AUTO_INCREMENT,
  `price` float DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `ngay_tao` date DEFAULT NULL,
  `id_sanpham` int DEFAULT NULL,
  PRIMARY KEY (`id_bill`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bill`
--

LOCK TABLES `bill` WRITE;
/*!40000 ALTER TABLE `bill` DISABLE KEYS */;
/*!40000 ALTER TABLE `bill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `binhluan`
--

DROP TABLE IF EXISTS `binhluan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `binhluan` (
  `id_binhluan` int NOT NULL,
  `noidung` varchar(45) DEFAULT NULL,
  `id_sanpham` int NOT NULL,
  `id_user` int NOT NULL,
  PRIMARY KEY (`id_binhluan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `binhluan`
--

LOCK TABLES `binhluan` WRITE;
/*!40000 ALTER TABLE `binhluan` DISABLE KEYS */;
/*!40000 ALTER TABLE `binhluan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chitietbill`
--

DROP TABLE IF EXISTS `chitietbill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `chitietbill` (
  `id_chitietbill` int NOT NULL AUTO_INCREMENT,
  `order_status` varchar(45) DEFAULT '0',
  `id_user` int DEFAULT NULL,
  `id_bill` int DEFAULT NULL,
  PRIMARY KEY (`id_chitietbill`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chitietbill`
--

LOCK TABLES `chitietbill` WRITE;
/*!40000 ALTER TABLE `chitietbill` DISABLE KEYS */;
/*!40000 ALTER TABLE `chitietbill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `danhmuc`
--

DROP TABLE IF EXISTS `danhmuc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `danhmuc` (
  `id_danhmuc` int NOT NULL AUTO_INCREMENT,
  `ten_danhmuc` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_danhmuc`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `danhmuc`
--

LOCK TABLES `danhmuc` WRITE;
/*!40000 ALTER TABLE `danhmuc` DISABLE KEYS */;
INSERT INTO `danhmuc` VALUES (1,'rolex'),(2,'hublot'),(3,'richardmille'),(4,'franckmuller');
/*!40000 ALTER TABLE `danhmuc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `khachhang` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tel` varchar(45) DEFAULT NULL,
  `role` int DEFAULT '0',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `khachhang`
--

LOCK TABLES `khachhang` WRITE;
/*!40000 ALTER TABLE `khachhang` DISABLE KEYS */;
/*!40000 ALTER TABLE `khachhang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sanpham` (
  `id_sanpham` int NOT NULL AUTO_INCREMENT,
  `ten_sanpham` varchar(255) DEFAULT NULL,
  `image_sanpham` varchar(255) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `price` int DEFAULT NULL,
  `size` float DEFAULT NULL,
  `soluong` int DEFAULT NULL,
  `tinhtrang` varchar(105) DEFAULT NULL,
  `id_danhmuc` int NOT NULL,
  PRIMARY KEY (`id_sanpham`),
  KEY `fk_danhmuc_idx` (`id_danhmuc`),
  CONSTRAINT `fk_danhmuc` FOREIGN KEY (`id_danhmuc`) REFERENCES `danhmuc` (`id_danhmuc`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sanpham`
--

LOCK TABLES `sanpham` WRITE;
/*!40000 ALTER TABLE `sanpham` DISABLE KEYS */;
INSERT INTO `sanpham` VALUES (1,'Đồng hồ Rolex 228345RBR Day Date 40mm Chocolate','images/Rolex1.png','Vỏ bằng Titanium được hoàn thiện và đánh bóng bằng Satin dây đeo da, Chiếc đồng hồ là một thiết kế độc đáo của đồng hồ bấm giờ tự động Unico. Nó có thể dự trữ năng lượng lên tới 42 giờ.',195000000,42,1333,'MỚI 100% FULLBOX SÁCH HỘP',1);
/*!40000 ALTER TABLE `sanpham` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `thongsokithuat`
--

DROP TABLE IF EXISTS `thongsokithuat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `thongsokithuat` (
  `id_tskt_sp` int NOT NULL AUTO_INCREMENT,
  `dongsanpham` varchar(45) DEFAULT NULL,
  `thamnuoc` varchar(255) DEFAULT NULL,
  `kichthuocmat` varchar(255) DEFAULT NULL,
  `vanhdongho` varchar(255) DEFAULT NULL,
  `nangluong` varchar(255) DEFAULT NULL,
  `chatlieuvo` varchar(255) DEFAULT NULL,
  `daydeo` varchar(255) DEFAULT NULL,
  `khoa` varchar(145) DEFAULT NULL,
  `matkinh` varchar(145) DEFAULT NULL,
  `sanxuattai` varchar(255) DEFAULT NULL,
  `anh1` varchar(255) DEFAULT NULL,
  `anh2` varchar(255) DEFAULT NULL,
  `anh3` varchar(255) DEFAULT NULL,
  `tieude1` text,
  `tieude2` text,
  `tieude3` text,
  `mota1` text,
  `mota2` text,
  `mota3` text,
  `id_sanpham` int NOT NULL,
  PRIMARY KEY (`id_tskt_sp`,`id_sanpham`),
  KEY `fk_sanhpham_idx` (`id_sanpham`),
  CONSTRAINT `fk_sanhpham` FOREIGN KEY (`id_sanpham`) REFERENCES `sanpham` (`id_sanpham`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `thongsokithuat`
--

LOCK TABLES `thongsokithuat` WRITE;
/*!40000 ALTER TABLE `thongsokithuat` DISABLE KEYS */;
INSERT INTO `thongsokithuat` VALUES (1,'Classic Fusion','Chống thấm nước mức 50m hoặc 5 ATM','45mm','Titanium được hoàn thiện và đánh bóng bằng Satin với 6 ốc vít hình chữ H','Máy cơ, tự lên dây HUB1143 Self-winding Chronograph Movement dự trữ năng lượng 42 giờ','Vỏ bằng Titanium được hoàn thiện và đánh bóng bằng Satin','Dây đeo cao su màu xanh và da cá sấu','Khóa clasp bằng thép không gỉ','Sapphire với khả năng chống phản chiếu','Nhà máy đồng hồ Thụy Sĩ','images/hublot2.jpg','images/hublot2.jpg','images/hublot3.jpg','ĐỒNG HỒ HUBLOT CLASSIC FUSION CHRONOGRAPH TITANIUM BLUE 521.NX.7170.LR 45MM','Thiết kế của Hublot Classic Fusion Chronograph Titanium Blue','Bên trongđồng hồ Hublot Classic Fusion Chronograph Titanium Blue','Tên tuổi của Hublot ghi dấu ấn trong lòng giới thượng lưu qua độ chỉnh chu bậc nhất khi chế tác từng chiếc đồng hồ. Một trong những siêu phẩm của đồng hồ Hublot được quý khách hàng ưa chuộng nhất tại EU Luxury là chiếc Hublot Classic Fusion Chronograph Titanium Blue 45MM, mang mã hiệu 521.NX.7170.LR.','đồng hồ Hublot Classic Fusion Chronograph Titanium Blue có vẻ bề ngoài khỏe khoắn, nam tính, thời thượng. Với vành đồng hồ làm từ chất liệu titanium siêu nhẹ và siêu bền bỉ, chiếc đồng hồ có kích thước mặt 45mm này là người bạn đồng hành hoàn hảo của các quý ông. Vành đồng hồ được chải xước dọc công phu và đánh bóng với Satin làm nổi bật 6 đinh ốc cách điệu theo chữ H trứ danh của Hublot. Chi tiết này tạo ra độ tương đồng hoàn hảo giữa mặt đồng hồ và càng nối dây.','Hublot Classic Fusion Chronograph Titanium Blue hoạt động chính xác nhờ bộ máy tự động HUB1143. Chế tác thủ công bằng tay hoàn hảo cho một khả năng chống nước tuyệt vời, đạt mức 50m chiều sâu. Thời lượng cót 42 giờ đồng hồ minh chứng cho độ chỉnh chu từ công nghệ làm đồng hồ cơ tiên tiến bật nhất của Hublot.',1);
/*!40000 ALTER TABLE `thongsokithuat` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-13  8:11:18