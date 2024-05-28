-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 28 May 2024, 15:51:39
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `php_proje`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'batu', '123'),
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yemekler`
--

CREATE TABLE `yemekler` (
  `id` int(11) NOT NULL,
  `ad` varchar(255) NOT NULL,
  `tarif` text NOT NULL,
  `malzemeler` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `yemekler`
--

INSERT INTO `yemekler` (`id`, `ad`, `tarif`, `malzemeler`) VALUES
(2, 'Tavuk Izgara', 'Tavuk göğsünü marine etmek için bir kasede zeytinyağı, limon suyu, ezilmiş sarımsak, tuz ve karabiberi karıştırın. Marine ettiğiniz tavukları bu karışımla kaplayın ve buzdolabında en az bir saat bekletin. Izgarayı ısıtın ve tavuk parçalarını üzeri iyice kızarana kadar ızgarada pişirin. Pişmiş tavukları servis tabağına alın ve üzerine taze limon dilimleri ile servis yapın.', 'Tavuk göğsü, zeytinyağı, limon suyu, sarımsak, tuz, karabiber'),
(3, 'Mercimek Çorbası', 'Soğanı ve sarımsağı doğrayın, havuçları ve patatesleri küçük küpler halinde kesin. Bir tencerede sıvı yağı ısıtın ve doğranmış soğan ve sarımsağı ekleyip kavurun. Havuç ve patatesleri ekleyin ve birkaç dakika daha kavurun. Kırmızı mercimeği ve suyu ekleyin, tuz ve karabiberle tatlandırın. Mercimekler yumuşayana kadar pişirin. Çorbayı blenderdan geçirin veya pürüzsüz olana kadar ezin. Servis yaparken üzerine kırmızı biber serpin ve sıcak servis yapın.', 'Kırmızı mercimek, soğan, havuç, patates, sıvı yağ, tuz, karabiber, kırmızı biber'),
(4, 'Fırında Tavuk', 'Tavuk butlarını yıkayıp kurulayın. Üzerlerine zeytinyağı, tuz, karabiber ve isteğe bağlı olarak baharatlar sürün. Fırın tepsisine yerleştirin ve önceden ısıtılmış 200°C fırında pişirin.', 'Tavuk butları, zeytinyağı, tuz, karabiber, baharatlar'),
(5, 'Mevsim Salatası', 'Marul, roka, domates, salatalık gibi mevsim sebzelerini doğrayın. Üzerine zeytinyağı ve limon suyu ekleyip karıştırın. İsteğe göre peynir veya ceviz ekleyebilirsiniz.', 'Marul, roka, domates, salatalık, zeytinyağı, limon suyu, peynir, ceviz'),
(6, 'Sebzeli Omlet', 'Yumurtaları bir kapta çırpın. Doğranmış biber, domates, soğan gibi sebzeleri ekleyin. Tavada yağı ısıtın ve yumurta karışımını dökün. Altı pişince çevirip diğer tarafını da pişirin.', 'Yumurta, biber, domates, soğan, tuz, karabiber, zeytinyağı'),
(7, 'Ispanaklı Börek', 'Yufka ve ıspanak kullanarak börek hazırlayın. Yufkaları yağlayın, ıspanaklı iç harcı yayın, katlayın ve fırında pişirin.', 'Yufka, ıspanak, beyaz peynir, yumurta, sıvı yağ'),
(8, 'Köfte Pilav', 'Köfteyi hazırlayın ve tavada pişirin. Pilavı ayrı bir tencerede hazırlayın. Servis tabağına önce pilavı, üzerine köfteyi yerleştirin ve servis yapın.', 'Köfte, pirinç, soğan, biber, domates, baharatlar'),
(9, 'Mantar Sote', 'Mantarları temizleyip dilimleyin. Tavada yağı ısıtın, mantarları ekleyin ve suyunu çekene kadar soteleyin. Üzerine sarımsak, tuz ve karabiber ekleyip servis yapın.', 'Mantar, zeytinyağı, sarımsak, tuz, karabiber'),
(10, 'Kuru Fasulye', 'Kuru fasulyeyi akşamdan ıslatın. Tencereye alın, üzerine su ekleyin ve yumuşayana kadar pişirin. Soğan ve domates doğrayıp tencereye ekleyin. Salça, tuz ve karabiber ekleyip pişirin.', 'Kuru fasulye, su, soğan, domates, salça, tuz, karabiber'),
(11, 'Balık Tava', 'Balıkları temizleyip yıkayın. Üzerlerine limon suyu ve baharatlar sürün. Tavada yağı ısıtın ve balıkları her iki tarafı da kızarana kadar pişirin.', 'Balık filetosu, limon suyu, zeytinyağı, tuz, karabiber, kekik'),
(12, 'Karnabahar Salatası', 'Karnabaharları haşlayın ve küçük parçalara ayırın. Doğranmış maydanoz, ceviz ve nar taneleriyle karıştırın. Üzerine yoğurt ve zeytinyağı sosu dökün.', 'Karnabahar, maydanoz, ceviz, nar, yoğurt, zeytinyağı, limon suyu, tuz');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yemekler`
--
ALTER TABLE `yemekler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `yemekler`
--
ALTER TABLE `yemekler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
