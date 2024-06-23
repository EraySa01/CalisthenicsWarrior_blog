

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE DATABASE IF NOT EXISTS `caliusers` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `caliusers`;



CREATE TABLE `caliform` (
  `ID` int(11) NOT NULL,
  `adsoyad` varchar(30) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `telefon` varchar(11) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `email` varchar(40) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `level` varchar(10) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL,
  `ileti` varchar(500) CHARACTER SET utf8 COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO `caliform` (`ID`, `adsoyad`, `telefon`, `email`, `level`, `ileti`) VALUES
(1, 'Eray Sarıkaya', '05426681365', 'eray-sarikaya@hotmail.com', 'Seviye3', 'Eray Sarıkaya was here.');


ALTER TABLE `caliform`
  ADD PRIMARY KEY (`ID`);


ALTER TABLE `caliform`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

