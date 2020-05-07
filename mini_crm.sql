-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table mini_crm.companies
CREATE TABLE IF NOT EXISTS `companies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `companies_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mini_crm.companies: ~10 rows (approximately)
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` (`id`, `name`, `slug`, `email`, `logo`, `website`, `created_at`, `updated_at`) VALUES
	(1, 'Helmer Hansen', 'helmer-hansen', 'wrippin@example.com', NULL, 'http://www.batz.com/qui-nesciunt-accusantium-ab-facilis-voluptate-dicta.html', '2020-05-07 08:59:56', '2020-05-07 08:59:56'),
	(2, 'Prof. Michel Wiza DVM', 'prof-michel-wiza-dvm', 'lnicolas@example.com', NULL, 'https://parker.com/repellendus-et-expedita-ea.html', '2020-05-07 08:59:56', '2020-05-07 08:59:56'),
	(3, 'Brown Block', 'brown-block', 'bert66@example.net', NULL, 'http://krajcik.com/repellat-in-accusamus-sit-aperiam.html', '2020-05-07 08:59:56', '2020-05-07 08:59:56'),
	(4, 'Chasity Emard', 'chasity-emard', 'hyatt.eva@example.net', NULL, 'http://marquardt.com/dolores-velit-incidunt-fuga-laboriosam-eligendi-eum', '2020-05-07 08:59:56', '2020-05-07 08:59:56'),
	(5, 'Lon Senger', 'lon-senger', 'isaac.sporer@example.com', NULL, 'http://kovacek.biz/est-autem-porro-blanditiis-libero', '2020-05-07 08:59:56', '2020-05-07 08:59:56'),
	(6, 'Prof. Foster Gorczany Sr.', 'prof-foster-gorczany-sr', 'rylee.schmitt@example.net', NULL, 'http://hyatt.biz/at-explicabo-qui-animi-alias-corrupti-et', '2020-05-07 08:59:56', '2020-05-07 08:59:56'),
	(7, 'Madisen Sauer', 'madisen-sauer', 'laron.witting@example.org', NULL, 'https://www.koch.info/facilis-quo-vero-nostrum-neque-optio-rerum', '2020-05-07 08:59:56', '2020-05-07 08:59:56'),
	(8, 'Johnnie Ratke', 'johnnie-ratke', 'millie.herzog@example.com', NULL, 'http://schroeder.com/voluptas-eius-quo-nisi-voluptatem-sit-quo', '2020-05-07 08:59:56', '2020-05-07 08:59:56'),
	(9, 'Mrs. Rosa Batz', 'mrs-rosa-batz', 'rratke@example.com', NULL, 'http://jenkins.com/ut-ad-et-qui-rerum-ducimus-et', '2020-05-07 08:59:56', '2020-05-07 08:59:56'),
	(10, 'Dr. Cade Bosco', 'dr-cade-bosco', 'alemke@example.com', NULL, 'http://cormier.com/necessitatibus-quia-velit-aut-sed-illo-iure-dolorem', '2020-05-07 08:59:57', '2020-05-07 08:59:57');
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;

-- Dumping structure for table mini_crm.employees
CREATE TABLE IF NOT EXISTS `employees` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_id` bigint(20) unsigned NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employees_email_unique` (`email`),
  KEY `employees_company_id_foreign` (`company_id`),
  CONSTRAINT `employees_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mini_crm.employees: ~50 rows (approximately)
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` (`id`, `first_name`, `last_name`, `company_id`, `email`, `phone`, `created_at`, `updated_at`) VALUES
	(1, 'Ubaldo', 'Bartell', 1, 'hermiston.larissa@example.org', '+17063883029', '2020-05-07 08:59:57', '2020-05-07 08:59:57'),
	(2, 'Deondre', 'Mitchell', 1, 'makayla.auer@example.net', '295.687.4191', '2020-05-07 08:59:57', '2020-05-07 08:59:57'),
	(3, 'Nelda', 'Torphy', 1, 'adell69@example.org', '(618) 630-4229', '2020-05-07 08:59:57', '2020-05-07 08:59:57'),
	(4, 'Sydnie', 'Stamm', 1, 'cnader@example.net', '+1-968-678-4251', '2020-05-07 08:59:57', '2020-05-07 08:59:57'),
	(5, 'Britney', 'Watsica', 1, 'gpowlowski@example.com', '+1-671-717-2380', '2020-05-07 08:59:57', '2020-05-07 08:59:57'),
	(6, 'Alena', 'Stokes', 2, 'sritchie@example.net', '(859) 884-9902', '2020-05-07 08:59:57', '2020-05-07 08:59:57'),
	(7, 'Maudie', 'Bosco', 2, 'fpfannerstill@example.net', '1-928-655-8185', '2020-05-07 08:59:57', '2020-05-07 08:59:57'),
	(8, 'Damian', 'Welch', 2, 'bergstrom.demetris@example.net', '+19072135157', '2020-05-07 08:59:57', '2020-05-07 08:59:57'),
	(9, 'Darrion', 'Shanahan', 2, 'sadie.hahn@example.com', '+1-290-372-5718', '2020-05-07 08:59:57', '2020-05-07 08:59:57'),
	(10, 'Natasha', 'Denesik', 2, 'rice.willy@example.com', '295.839.1786', '2020-05-07 08:59:57', '2020-05-07 08:59:57'),
	(11, 'Roberta', 'Baumbach', 3, 'antwan91@example.org', '+1-376-771-7222', '2020-05-07 08:59:57', '2020-05-07 08:59:57'),
	(12, 'Reuben', 'Murazik', 3, 'rhagenes@example.com', '1-363-240-0876 x25486', '2020-05-07 08:59:57', '2020-05-07 08:59:57'),
	(13, 'Edythe', 'Raynor', 3, 'feil.garrett@example.net', '(219) 851-3893 x0560', '2020-05-07 08:59:57', '2020-05-07 08:59:57'),
	(14, 'Howard', 'McDermott', 3, 'kunze.irma@example.com', '(338) 753-6117 x73251', '2020-05-07 08:59:57', '2020-05-07 08:59:57'),
	(15, 'Cedrick', 'Crona', 3, 'xmaggio@example.org', '(240) 941-8299', '2020-05-07 08:59:57', '2020-05-07 08:59:57'),
	(16, 'Jailyn', 'Kreiger', 4, 'ressie.tromp@example.com', '(657) 354-4614 x847', '2020-05-07 08:59:57', '2020-05-07 08:59:57'),
	(17, 'Marlene', 'Bailey', 4, 'emelia.ebert@example.com', '+17519760734', '2020-05-07 08:59:57', '2020-05-07 08:59:57'),
	(18, 'Jakayla', 'Mosciski', 4, 'jlang@example.com', '607-298-4527', '2020-05-07 08:59:57', '2020-05-07 08:59:57'),
	(19, 'Catharine', 'Moore', 4, 'oral23@example.net', '(573) 962-7856 x2211', '2020-05-07 08:59:57', '2020-05-07 08:59:57'),
	(20, 'Jess', 'Cummings', 4, 'stewart42@example.com', '291.897.9808 x005', '2020-05-07 08:59:57', '2020-05-07 08:59:57'),
	(21, 'Brisa', 'Kihn', 5, 'xjenkins@example.net', '+1.603.507.1613', '2020-05-07 08:59:58', '2020-05-07 08:59:58'),
	(22, 'Delilah', 'Durgan', 5, 'emily.rodriguez@example.org', '409-765-1533 x3061', '2020-05-07 08:59:58', '2020-05-07 08:59:58'),
	(23, 'Heaven', 'Price', 5, 'albertha.will@example.com', '+1-486-215-3930', '2020-05-07 08:59:58', '2020-05-07 08:59:58'),
	(24, 'Connor', 'Reinger', 5, 'pfeffer.karen@example.com', '(590) 367-4576 x8518', '2020-05-07 08:59:58', '2020-05-07 08:59:58'),
	(25, 'Kellie', 'Wunsch', 5, 'kuhlman.gail@example.com', '701-315-4174', '2020-05-07 08:59:58', '2020-05-07 08:59:58'),
	(26, 'Gabriel', 'Corwin', 6, 'marjory.grimes@example.com', '(565) 704-4760 x860', '2020-05-07 08:59:58', '2020-05-07 08:59:58'),
	(27, 'Elias', 'Gleason', 6, 'mariane.kohler@example.com', '(337) 422-1608', '2020-05-07 08:59:58', '2020-05-07 08:59:58'),
	(28, 'Genevieve', 'Dibbert', 6, 'vincent.schaefer@example.org', '+1.650.613.0669', '2020-05-07 08:59:58', '2020-05-07 08:59:58'),
	(29, 'Elinore', 'Kautzer', 6, 'romaine.medhurst@example.net', '485-990-0544', '2020-05-07 08:59:58', '2020-05-07 08:59:58'),
	(30, 'Ernestina', 'Medhurst', 6, 'lockman.lilian@example.org', '(321) 372-4532', '2020-05-07 08:59:58', '2020-05-07 08:59:58'),
	(31, 'Adolfo', 'Berge', 7, 'aric.tillman@example.com', '547.959.9966 x821', '2020-05-07 08:59:58', '2020-05-07 08:59:58'),
	(32, 'Diamond', 'Hand', 7, 'bryan@example.net', '1-630-917-2113 x6874', '2020-05-07 08:59:58', '2020-05-07 08:59:58'),
	(33, 'Kathryne', 'Pagac', 7, 'gerlach.dallin@example.org', '(627) 564-2851 x204', '2020-05-07 08:59:58', '2020-05-07 08:59:58'),
	(34, 'Regan', 'Hudson', 7, 'spencer85@example.org', '+1 (529) 490-2956', '2020-05-07 08:59:58', '2020-05-07 08:59:58'),
	(35, 'Jaquan', 'Kuhn', 7, 'grayson.hill@example.com', '534.219.1036 x519', '2020-05-07 08:59:58', '2020-05-07 08:59:58'),
	(36, 'Lilliana', 'Kerluke', 8, 'burnice10@example.net', '+1.565.223.1692', '2020-05-07 08:59:58', '2020-05-07 08:59:58'),
	(37, 'Kole', 'Romaguera', 8, 'ryan.hildegard@example.org', '1-805-674-1237', '2020-05-07 08:59:58', '2020-05-07 08:59:58'),
	(38, 'Izabella', 'Rogahn', 8, 'alexandria.kuphal@example.com', '480.650.3247', '2020-05-07 08:59:58', '2020-05-07 08:59:58'),
	(39, 'Dax', 'Wolff', 8, 'frances79@example.org', '(657) 961-9623', '2020-05-07 08:59:59', '2020-05-07 08:59:59'),
	(40, 'Tristian', 'Glover', 8, 'manuel.doyle@example.org', '573-727-7484 x218', '2020-05-07 08:59:59', '2020-05-07 08:59:59'),
	(41, 'Marty', 'Reynolds', 9, 'rippin.jarrett@example.com', '830.456.0799 x807', '2020-05-07 08:59:59', '2020-05-07 08:59:59'),
	(42, 'Coleman', 'Rippin', 9, 'emile.mayer@example.org', '358-654-9950', '2020-05-07 08:59:59', '2020-05-07 08:59:59'),
	(43, 'Polly', 'Spencer', 9, 'ashleigh.konopelski@example.com', '+1-308-255-7375', '2020-05-07 08:59:59', '2020-05-07 08:59:59'),
	(44, 'Candido', 'Kihn', 9, 'haley.xzavier@example.org', '951.418.3069', '2020-05-07 08:59:59', '2020-05-07 08:59:59'),
	(45, 'Guiseppe', 'Swaniawski', 9, 'romaguera.green@example.net', '+15456237498', '2020-05-07 08:59:59', '2020-05-07 08:59:59'),
	(46, 'Rita', 'Connelly', 10, 'dina.jacobson@example.com', '529.928.3721 x6556', '2020-05-07 08:59:59', '2020-05-07 08:59:59'),
	(47, 'Amir', 'Fadel', 10, 'eupton@example.org', '569-329-9210 x54241', '2020-05-07 08:59:59', '2020-05-07 08:59:59'),
	(48, 'Cruz', 'Padberg', 10, 'arowe@example.org', '+1.857.687.2467', '2020-05-07 08:59:59', '2020-05-07 08:59:59'),
	(49, 'Aisha', 'Kreiger', 10, 'bria.miller@example.org', '1-287-854-9997 x0531', '2020-05-07 08:59:59', '2020-05-07 08:59:59'),
	(50, 'Wilfred', 'Leannon', 10, 'leonor.dooley@example.net', '914.978.8949', '2020-05-07 08:59:59', '2020-05-07 08:59:59');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;

-- Dumping structure for table mini_crm.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mini_crm.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table mini_crm.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mini_crm.migrations: ~5 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(26, '2014_10_12_000000_create_users_table', 1),
	(27, '2014_10_12_100000_create_password_resets_table', 1),
	(28, '2019_08_19_000000_create_failed_jobs_table', 1),
	(29, '2020_05_05_120640_create_companies_table', 1),
	(30, '2020_05_05_120651_create_employees_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table mini_crm.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mini_crm.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table mini_crm.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table mini_crm.users: ~1 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin@admin.com', '2020-05-06 19:44:20', '$2y$10$CFpx3XlnMlGUK1KvHHpJFOM7EKoT9DGWNiHnIqGJ7CSRC/H6L.Rrq', NULL, NULL, NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
