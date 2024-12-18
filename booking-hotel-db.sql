-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 12, 2024 at 12:19 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booking-hotel-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `hotel_id` bigint UNSIGNED NOT NULL,
  `num_people` int NOT NULL,
  `num_children` int NOT NULL,
  `pay_method` enum('full','deposit') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_cost` int NOT NULL,
  `check_in` timestamp NULL DEFAULT NULL,
  `check_out` timestamp NULL DEFAULT NULL,
  `accepted` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evaluations`
--

CREATE TABLE `evaluations` (
  `id` bigint UNSIGNED NOT NULL,
  `hotel_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `point` int NOT NULL DEFAULT '0',
  `feedback` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_in_date` date NOT NULL,
  `price` int NOT NULL,
  `num_guest` int NOT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `owner_id` bigint UNSIGNED DEFAULT NULL,
  `admin_accepted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `city`, `country`, `description`, `check_in_date`, `price`, `num_guest`, `image1`, `image2`, `image3`, `created_at`, `updated_at`, `deleted_at`, `owner_id`, `admin_accepted`) VALUES
(1, 'Sin Suoi Ho Bungalow và Homestay', 'Lai Châu', 'Việt Nam', 'Nơi ở trong một nhà siêu nhỏ.\r\nChúng tôi đang làm du lịch cộng đồng, chúng tôi có \r\nnhiều hoạt động trong làng như: tham quan thác nước, \r\nkhám phá làng Sin Suối Hồ, ngắm sân thượng, vườn đào, vườn hoa lan….', '2024-10-26', 90, 5, 'uploads/images/hotels/sinsuoihobungalowvàhomestay1.png', 'uploads/images/hotels/sinsuoihobungalowvàhomestay2.png', 'uploads/images/hotels/sinsuoihobungalowvàhomestay3.png', '2024-10-24 20:03:53', '2024-12-09 21:26:03', NULL, 5, 1),
(2, 'Da Lat Resort', 'Đà Lạt', 'Việt Nam', 'Khu nghỉ dưỡng ấm cúng nghỉ ngơi giữa thiên nhiên\r\nVới cánh đồng hoa và bầu không khí tự nhiên tuyệt đẹp,\r\nnó có những cánh đồng hoa đáng yêu và bầu không khí tuyệt đẹp.', '2024-10-25', 100, 10, 'uploads/images/hotels/dalatresort1.png', 'uploads/images/hotels/dalatresort2.png', 'uploads/images/hotels/dalatresort3.png', '2024-10-24 20:11:29', '2024-12-11 21:37:12', NULL, 5, 1),
(3, 'Tiny House', 'Lạng Sơn', 'Việt Nam', 'Trong khi ngôi nhà được trang bị để đón tiếp 5 người, chúng tôi nghĩ rằng kích thước hoàn hảo là 2-4 người. Chúng tôi rất vui được đón tiếp cả 5 người, nhưng lưu ý rằng nó sẽ ấm cúng hơn một chút.', '2024-10-25', 150, 5, 'uploads/images/hotels/tinyhouse1.png', 'uploads/images/hotels/tinyhouse2.png', 'uploads/images/hotels/tinyhouse3.png', '2024-10-24 20:14:23', '2024-12-11 21:52:54', NULL, 5, 1),
(4, 'Bảo tàng d’Orsay', 'Paris', 'France', 'Từng là một nhà ga xe lửa ở trung tâm Paris 125 năm về trước, \r\nMusée d’Orsay hiện là một trong những bảo tàng hàng đầu thế giới, \r\ntự hào với bộ sưu tập tranh theo trường phái Ấn tượng đồ sộ nhất. \r\nMọi nét kiến trúc từ thuở đầu vẫn được bảo tồn nguyên vẹn, \r\nbao gồm chiếc đồng hồ rất lớn mang tính biểu tượng, có thể quan \r\nsát từ cả bên trong và bên ngoài.', '2024-10-26', 120, 10, 'uploads/images/hotels/bảotàngd’orsay1.png', 'uploads/images/hotels/bảotàngd’orsay2.png', 'uploads/images/hotels/bảotàngd’orsay3.png', '2024-10-24 20:20:27', '2024-12-11 21:50:48', NULL, 5, 1),
(5, 'Saint-Germain', 'Seigy', 'France', 'Nhà mái vòm.\r\n2 khách- 1 phòng ngủ \r\n1 giường-1 phòng tắm', '2024-10-26', 110, 2, 'uploads/images/hotels/bongbóng1.png', 'uploads/images/hotels/bongbóng2.png', 'uploads/images/hotels/bongbóng3.png', '2024-10-24 20:25:45', '2024-12-11 22:02:38', NULL, 5, 1),
(6, 'Chateau La Bainerie', 'Tiercé, Pays de la Loire', 'France', 'Phòng trong lâu đài\r\nBạn sẽ có phòng riêng trong một ngôi nhà và được sử dụng những khu vực chung.\r\nKhông gian riêng để làm việc\r\nMột khu vực chung có Wi-fi, phù hợp để làm việc.\r\nTự nhận phòng\r\nTự nhận phòng bằng khóa thông minh.', '2024-10-26', 150, 6, 'uploads/images/hotels/chateaulabainerie1.png', 'uploads/images/hotels/chateaulabainerie2.png', 'uploads/images/hotels/chateaulabainerie3.png', '2024-10-24 20:27:47', '2024-12-11 22:04:09', NULL, 5, 1),
(7, 'COCOON', 'Choye, Bourgogne-Franche-Comté', 'France', 'Cocoon là một môi trường sống có chân thấp, bán ngập tràn để tận hưởng sự thoải mái tự nhiên của quán tính nhiệt của sàn nhà; đó là một tổ ergonomic diễn ra ở nơi sảng khoái này. Nội thất phù hợp với một phong bì cong làm bằng vật liệu sinh học.', '2024-10-26', 105, 3, 'uploads/images/hotels/cocoon1.png', 'uploads/images/hotels/cocoon2.png', 'uploads/images/hotels/cocoon3.png', '2024-10-24 20:34:21', '2024-12-09 21:26:36', NULL, 5, 1),
(8, 'Arang Palace', 'Jeonju-si, North Jeolla Province', 'Korea', 'Đây là một ngôi nhà truyền thống yên tĩnh. \r\nNgôi nhà chính, được xây dựng bằng gỗ và đất thân thiện với môi trường, \r\nbao gồm một phòng nhóm gác mái và phòng tình nhân ấm cúng, \r\nvà phòng phụ của cấu trúc nhiều tầng có cửa sổ trời.', '2024-10-25', 100, 5, 'uploads/images/hotels/arangpalace1.png', 'uploads/images/hotels/arangpalace2.png', 'uploads/images/hotels/arangpalace3.png', '2024-10-24 20:37:28', '2024-12-11 22:03:12', NULL, 5, 1),
(9, 'Sol Forest Villa', 'Anmok', 'Korea', 'Đó là một ngôi nhà làm bằng tay,\r\nvì vậy mọi thứ ở đây đều được tạo thủ công,\r\nĐây là một không gian được tạo ra một cách cẩn thận để tránh sự bất tiện.', '2024-10-26', 125, 6, 'uploads/images/hotels/solforestvilla1.png', 'uploads/images/hotels/solforestvilla2.png', 'uploads/images/hotels/solforestvilla3.png', '2024-10-24 20:45:32', '2024-10-24 20:45:32', NULL, 5, 1),
(10, 'Hwangnidan-gil', 'Hanok', 'Korea', '', '2024-10-26', 50, 2, 'uploads/images/hotels/hwangnidan-gil1.png', 'uploads/images/hotels/hwangnidan-gil2.png', 'uploads/images/hotels/hwangnidan-gil3.png', '2024-10-24 20:52:05', '2024-10-24 20:52:05', NULL, 5, 1),
(11, 'New Hanok Stay Baekseondang', 'Andong, North Gyeongsang Province', 'Korea', 'Bạn có thể cảm nhận được tình cảm và sự chu đáo \r\ncủa hanok cũng như mục đích sống với gia đình trong một thời gian dài, \r\nkhông chỉ vì mục đích sống trong một thời gian dài, \r\nkhông chỉ cho công việc kinh doanh.', '2024-10-26', 350, 8, 'uploads/images/hotels/newhanokstaybaekseondang1.png', 'uploads/images/hotels/newhanokstaybaekseondang2.png', 'uploads/images/hotels/newhanokstaybaekseondang3.png', '2024-10-24 20:56:04', '2024-10-24 20:56:04', NULL, 6, 1),
(12, 'Aurora', 'Milano, Lombardia', 'Italy', 'Căn hộ ấm cúng, mọi thứ bạn cần.\r\nBạn có thể sử dụng tất cả các khu vực chung miễn là\r\nnó được duy trì liên quan đến những thứ của người khác. \r\nVui lòng cho chúng tôi biết nếu bạn có bất kỳ câu hỏi nào!', '2024-10-25', 85, 3, 'uploads/images/hotels/phòngđôitrongcănhộ1.png', 'uploads/images/hotels/phòngđôitrongcănhộ2.png', 'uploads/images/hotels/phòngđôitrongcănhộ3.png', '2024-10-24 21:04:13', '2024-10-24 21:04:13', NULL, 6, 1),
(13, 'Alba Resort', 'Loceri, Sardinia', 'Italy', 'Thư giãn với gia đình hoặc bạn bè của bạn\r\ntại địa điểm nghỉ dưỡng yên tĩnh ở vùng nông thôn này.\r\nỞ một địa điểm thuận tiện: đi bộ ngắn đến sông/hồ/biển\r\nvà đường mòn đi bộ đường dài.', '2024-10-25', 130, 12, 'uploads/images/hotels/albaresort1.png', 'uploads/images/hotels/albaresort2.png', 'uploads/images/hotels/albaresort3.png', '2024-10-24 21:07:14', '2024-10-24 21:07:14', NULL, 6, 1),
(14, 'Gombola tower house', 'Gombola, Emilia-Romagna', 'Italy', 'Tháp của chúng tôi là một nơi độc đáo được bao\r\nquanh bởi thiên nhiên của Modena Apennines. \r\nMột tòa nhà chưa bao giờ được sửa đổi và\r\nluôn có người ở kể từ thế kỷ 18.', '2024-10-25', 105, 5, 'uploads/images/hotels/gombolatowerhouse1.png', 'uploads/images/hotels/gombolatowerhouse2.png', 'uploads/images/hotels/gombolatowerhouse3.png', '2024-10-24 21:09:57', '2024-10-24 21:09:57', NULL, 6, 0),
(15, 'Cabane de la Semine', 'La Pesse, Bourgogne-Franche-Comté', 'France', 'Đắm chìm trong thiên nhiên có tầm nhìn ra \r\nthung lũng, âm thanh từ dòng suối ở tầng dưới.\r\nNhiều chuyến đi bộ và thác nước gần đó, \r\ncách trung tâm làng La Pesse 1 km.', '2024-10-25', 120, 8, 'uploads/images/hotels/cabanedelasemine1.png', 'uploads/images/hotels/cabanedelasemine2.png', 'uploads/images/hotels/cabanedelasemine3.png', '2024-10-24 21:12:18', '2024-10-24 21:12:18', NULL, 6, 0),
(16, 'Villa FLC Hạ Long', 'Hạ Long, Quảng Ninh', 'Việt Nam', 'Căn hộ sang trọng, hiện đại, có tầm nhìn tuyệt đẹp ra Vịnh Hạ Long và Biển Đông.\r\nCăn hộ nằm ở vị trí trung tâm của khu đô thị \r\nHạ Long Marina, cách bãi biển chỉ vài bước chân.', '2024-10-25', 205, 6, 'uploads/images/hotels/baysidecondotel1.png', 'uploads/images/hotels/baysidecondotel2.png', 'uploads/images/hotels/baysidecondotel3.png', '2024-10-24 21:18:28', '2024-10-24 21:18:28', NULL, 6, 0),
(17, 'Mia Resort Nha Trang', 'Nha Trang, Khánh Hòa', 'Việt Nam', 'Ngay sát bờ sông, đây là sự lựa chọn hoàn hảo cho cả nhóm và gia đình;\r\nvới 5 phòng ngủ tuyệt đẹp, phòng chờ rộng rãi,\r\nkhông gian sống phong phú và sang trọng trên 3 tầng kết nối.', '2024-10-24', 310, 10, 'uploads/images/hotels/miaresortnhatrang1.png', 'uploads/images/hotels/miaresortnhatrang2.png', 'uploads/images/hotels/miaresortnhatrang3.png', '2024-10-24 21:21:28', '2024-10-24 21:21:28', NULL, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_favorites`
--

CREATE TABLE `hotel_favorites` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `hotel_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2024_10_26_000001_create_users_table', 1),
(3, '2024_10_26_000002_create_users_info_table', 1),
(4, '2024_10_26_000003_create_images_table', 1),
(5, '2024_10_26_000004_create_hotels_table', 1),
(6, '2024_10_26_000005_create_evaluations_table', 1),
(7, '2024_10_26_000006_create_hotel_favorites_table', 1),
(8, '2024_10_26_000007_create_bookings_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `username`, `password`, `email`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin', '$2y$10$aprd.Kg7hZXHA8ASfwtRWuY3xn0I0YXNN1I1PIKQeryqPTQW9UNY2', 'admin@gmail.com', '2024-10-24 19:23:16', '2024-12-09 20:28:51', NULL),
(2, 'user', 'user1', '$2y$10$aprd.Kg7hZXHA8ASfwtRWuY3xn0I0YXNN1I1PIKQeryqPTQW9UNY2', 'hoangbaof992@gmail.com', '2024-10-24 19:23:16', '2024-12-09 20:28:54', NULL),
(3, 'user', 'user2', '$2y$10$aprd.Kg7hZXHA8ASfwtRWuY3xn0I0YXNN1I1PIKQeryqPTQW9UNY2', 'user2@gmail.com', '2024-10-25 00:23:16', '2024-10-25 17:37:58', NULL),
(4, 'user', 'user3', '$2y$10$aprd.Kg7hZXHA8ASfwtRWuY3xn0I0YXNN1I1PIKQeryqPTQW9UNY2', 'user3@gmail.com', '2024-10-25 02:33:16', '2024-10-25 17:38:06', NULL),
(5, 'owner', 'owner1', '$2y$10$aprd.Kg7hZXHA8ASfwtRWuY3xn0I0YXNN1I1PIKQeryqPTQW9UNY2', 'owner1@gmail.com', '2024-10-24 19:58:51', '2024-12-09 20:29:05', NULL),
(6, 'owner', 'owner2', '$2y$10$aprd.Kg7hZXHA8ASfwtRWuY3xn0I0YXNN1I1PIKQeryqPTQW9UNY2', 'owner2@gmail.com', '2024-10-23 12:55:46', '2024-10-23 12:55:46', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_info`
--

CREATE TABLE `users_info` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_info`
--

INSERT INTO `users_info` (`id`, `user_id`, `first_name`, `last_name`, `dob`, `address`, `phone_number`, `created_at`, `updated_at`) VALUES
(1, 2, 'Nguyễn', 'Văn A', '2002-10-12', 'Hà Nội', '0123456789', '2024-10-24 19:23:16', '2024-10-08 05:43:26'),
(2, 3, 'Nguyễn', 'Văn B', '1988-10-12', 'Ha Noi', '0123456789', '2024-10-24 20:23:16', '2024-10-24 20:23:16'),
(3, 4, 'Nguyễn', 'Văn C', '1988-11-16', 'Ha Noi', '0123456789', '2024-10-24 20:25:16', '2024-10-24 20:25:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_hotel_id_foreign` (`hotel_id`);

--
-- Indexes for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `evaluations_hotel_id_foreign` (`hotel_id`),
  ADD KEY `evaluations_user_id_foreign` (`user_id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotels_owner_id_foreign` (`owner_id`);

--
-- Indexes for table `hotel_favorites`
--
ALTER TABLE `hotel_favorites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_favorites_user_id_foreign` (`user_id`),
  ADD KEY `hotel_favorites_hotel_id_foreign` (`hotel_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_info`
--
ALTER TABLE `users_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `users_info_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evaluations`
--
ALTER TABLE `evaluations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `hotel_favorites`
--
ALTER TABLE `hotel_favorites`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users_info`
--
ALTER TABLE `users_info`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `evaluations`
--
ALTER TABLE `evaluations`
  ADD CONSTRAINT `evaluations_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `evaluations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hotels`
--
ALTER TABLE `hotels`
  ADD CONSTRAINT `hotels_owner_id_foreign` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hotel_favorites`
--
ALTER TABLE `hotel_favorites`
  ADD CONSTRAINT `hotel_favorites_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hotel_favorites_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users_info`
--
ALTER TABLE `users_info`
  ADD CONSTRAINT `users_info_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
