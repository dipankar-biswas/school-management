-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 11, 2023 at 10:23 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `priority` int DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `slug`, `designation`, `description`, `priority`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'মোঃ জিয়াউর রহমান', 'mo-jizaur-rhman', 'সভাপতি', 'আর প্রশাসন ক্যাডারের ২৯তম ব্যাচের ১৯৫ জন কর্মকর্তাকে উপ-সচিব পদে পদোন্নতি দেওয়ার সিদ্ধান্ত নেওয়া হয়েছে। এছাড়া, বিভাগীয় কমিশনার থেকে এপিডি এবং ৮ থেকে ১০ জেলার ডিসিকে মাঠ পর্যায় থেকে তুলে নেওয়া হচ্ছে। সোমবার সচিবালয়ে মন্ত্রিপরিষদ বিভাগের সম্মেলন কক্ষে মন্ত্রিপরিষদ সচিব মো. মাহবুব হোসেনের সভাপতিত্বে সুপিরিয়র সিলেকশন বোর্ড (এসএসবি) সভায় এ সুপারিশ বিবেচনায় নেওয়া হয়।\r\n\r\nসুপিরিয়র সিলেকশন বোর্ড (এসএসবি) সভায় পদোন্নতির তালিকার বাইরে নিয়মিত ব্যাচ থেকে ১৯৫ জনকে বিবেচনায় নেওয়া হচ্ছে। জানা গেছে, এক সময় উপ-সচিব পদে চাকরির ১৭-১৮ বছরে পদোন্নতি হতো। সেই সময় অনেক ব্যাচের কর্মকর্তা পদোন্নতি থেকে বঞ্চিত হয়েছেন। এ কারণে এসব ব্যাচের কর্মকর্তাদের চাকরি জীবনের প্রথম পদোন্নতি পেতে দীর্ঘসময় অপেক্ষা করতে হয়েছে।\r\n\r\nপ্রশাসনে সচিবের বেশ কয়েকটি গুরুত্বপূর্ণ পদে রদবদল হবে বলে জানা গেছে। প্রধানমন্ত্রী শেখ হাসিনা বুধবার দেশে ফিরলে সচিব পদে রদবদল করা হবে। প্রধানমন্ত্রী ফিরলে রদবদলের বিষয়ে জনপ্রশাসন থেকে প্রশাসনিক প্রক্রিয়া শুরু হবে। চলতি সপ্তাহে বা আগামী সপ্তাহে রদবদল হওয়ার সম্ভাবনা রয়েছে।\r\n\r\nমন্ত্রিপরিষদ সচিব মো. মাহবুব হোসেনের চাকরির মেয়াদ শেষ হচ্ছে ১৩ অক্টোবর। তাকে এক বছরের চুক্তিভিত্তিক নিয়োগ দেওয়ার বিষয়টি প্রায় চূড়ান্ত। তবে কোনো কারণে যদি চুক্তিভিত্তিক নিয়োগ দেওয়া না হয়, সেক্ষেত্রে জনপ্রশাসন মন্ত্রণালয়ের সিনিয়র সচিব মেজবাহ উদ্দিন চৌধুরী হবেন পরবর্তী নতুন মন্ত্রিপরিষদ সচিব।\r\n\r\nস্বাস্থ্য ও পরিবারকল্যাণ মন্ত্রণালয়ের স্বাস্থ্য সেবা বিভাগের সিনিয়র সচিব ড. মু. আনোয়ার হোসেন হাওলাদারের চাকরির মেয়াদ শেষ হচ্ছে ৯ অক্টোবর। বর্তমানে কর্মরত সচিবদের মধ্য থেকে স্বাস্থ্য সেবা বিভাগে সচিব নিয়োগ দেওয়া হবে বলে গুঞ্জন রয়েছে। সমাজকল্যাণ মন্ত্রণালয়ের সচিব মো. জাহাঙ্গীর আলম অথবা খাদ্য মন্ত্রণালয়ের সচিব মো. ইসমাইল হোসেনকে এ মন্ত্রণালয়ে নিয়োগ দেওয়া হতে পারে।', 1, 'uploads/14161fbd30.webp', 1, '2023-10-02 22:47:53', '2023-10-02 22:49:01'),
(2, 'দীপঙ্কর বিশ্বাস', 'deepnkr-biswas', 'প্রধান শিক্ষক', 'স্বাস্থ্য ও পরিবারকল্যাণ মন্ত্রণালয়ের স্বাস্থ্য সেবা বিভাগের সিনিয়র সচিব ড. মু. আনোয়ার হোসেন হাওলাদারের চাকরির মেয়াদ শেষ হচ্ছে ৯ অক্টোবর। বর্তমানে কর্মরত সচিবদের মধ্য থেকে স্বাস্থ্য সেবা বিভাগে সচিব নিয়োগ দেওয়া হবে বলে গুঞ্জন রয়েছে। সমাজকল্যাণ মন্ত্রণালয়ের সচিব মো. জাহাঙ্গীর আলম অথবা খাদ্য মন্ত্রণালয়ের সচিব মো. ইসমাইল হোসেনকে এ মন্ত্রণালয়ে নিয়োগ দেওয়া হতে পারে।\r\n\r\nসম্প্রতি সচিব পদে পদোন্নতি পাওয়া ১৩তম ব্যাচের মো. আব্দুর সবুর মণ্ডলকে একই সময়ে নিয়োগ দেওয়া হবে। স্বাস্থ্য মন্ত্রণালয়ে যিনি নিয়োগ পাবেন, তার খালি হওয়া মন্ত্রণালয়ে সবুর মণ্ডলের নিয়োগ পাওয়ার সম্ভাবনা রয়েছে। তিনি এখন পর্যন্ত তার পূর্বের পদে সংযুক্তি হিসাবে দায়িত্ব পালন করছেন।', 2, 'uploads/8919726a71.webp', 1, '2023-10-02 22:51:25', '2023-12-11 04:20:04');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_08_044817_create_widgets_table', 1),
(6, '2023_09_08_145243_create_widget_links_table', 1),
(7, '2023_09_08_162253_create_sidelinks_table', 1),
(8, '2023_09_08_162315_create_sidelinktitles_table', 1),
(9, '2023_09_10_025711_create_sliders_table', 1),
(10, '2023_09_10_054526_create_settings_table', 1),
(11, '2023_09_12_012052_create_members_table', 1),
(12, '2023_09_12_015348_create_navbars_table', 1),
(13, '2023_09_13_020342_create_notices_table', 1),
(14, '2023_09_13_024950_create_scrollnotices_table', 1),
(15, '2023_09_14_013824_create_pages_table', 1),
(16, '2023_09_14_025211_create_sideimages_table', 1),
(17, '2023_09_23_233108_create_employees_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `navbars`
--

CREATE TABLE `navbars` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parentid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `navbars`
--

INSERT INTO `navbars` (`id`, `name`, `slug`, `parentid`, `link`, `priority`, `status`, `created_at`, `updated_at`) VALUES
(1, 'আমাদের সম্পর্কে', 'amader-smprke', '0', '#', 1, 1, '2023-10-02 05:02:59', '2023-10-02 05:02:59'),
(2, 'পাঠ্যক্রম', 'pathzkrm', '0', '#', 9, 1, '2023-10-02 05:03:14', '2023-10-02 05:06:40'),
(3, 'প্রকাশনা', 'prkasna', '0', '#', 3, 1, '2023-10-02 05:03:30', '2023-10-02 05:03:30'),
(4, 'রেজাল্ট', 'rejalt', '0', '#', 4, 1, '2023-10-02 05:03:48', '2023-10-02 05:03:48'),
(5, 'ডাউনলোড', 'daunlod', '0', '#', 5, 1, '2023-10-02 05:03:59', '2023-10-02 05:03:59'),
(6, 'NTVQF', 'ntvqf', '0', '#', 6, 1, '2023-10-02 05:04:16', '2023-10-02 05:04:16'),
(7, 'ই-সেবা', 'i-seba', '0', '#', 7, 1, '2023-10-02 05:04:28', '2023-10-02 05:04:28'),
(8, 'যোগাযোগ', 'zogazog', '0', '#', 13, 1, '2023-10-02 05:05:24', '2023-10-02 05:12:57'),
(9, 'প্রশাসন', 'prsasn', '0', '#', 2, 1, '2023-10-02 05:06:20', '2023-10-02 05:06:20'),
(10, 'নোটিশ', 'notis', '0', '#', 10, 1, '2023-10-02 05:07:40', '2023-10-02 05:07:40'),
(11, 'শিক্ষকবৃন্দ', 'sikshkbrrind', '9', '#', 1, 1, '2023-10-02 05:09:14', '2023-10-02 05:09:14'),
(12, 'কর্মকর্তা-কর্মচারী', 'krmkrta-krmcaree', '9', '#', 2, 1, '2023-10-02 05:09:34', '2023-10-02 05:09:34'),
(13, 'ম্যানেজিং কমিটি', 'mzanejing-kmiti', '9', '#', 10, 1, '2023-10-02 05:09:59', '2023-10-02 05:09:59');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE `notices` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `name`, `slug`, `file`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ডিপ্লোমা ইন ফিসারিজ, ফরেস্ট্রি ও লাইভস্টক শিক্ষাক্রমের পুনঃভর্তির অনুমোদন প্রসঙ্গে', 'diploma-in-fisarij-frestri-oo-laivstk-sikshakrmer-punvrtir-onumodn-prsngoe', 'notice/a1da7422c9.pdf', 1, '2023-10-02 05:15:21', '2023-10-02 05:15:21'),
(2, '২০২৩ সালের এসএসসি (ভোকেশনাল) ও দাখিল (ভোকেশনাল) শিক্ষাক্রমের নবম শ্রেণী সমাপনী পরীক্ষার সময়সূচি', '2023-saler-esessi-vokesnal-oo-dakhil-vokesnal-sikshakrmer-nbm-srenee-smapnee-preekshar-smysuuci', 'notice/b2ba3e1357.pdf', 1, '2023-10-02 05:15:32', '2023-10-02 05:15:32'),
(3, 'জনাব মোহাম্মদ ছামিদুল ইসলাম, কম্পোজিটর কাম টাইপিস্ট এর পবিত্র ওমরা হজ্জ পালনের জন্য ছুটি মঞ্জুরের অফিস আদেশ', 'jnab-mohammd-chamidul-islam-kmpojitr-kam-taipist-er-pbitr-oomra-hjj-palner-jnz-chuti-mnjurer-ofis-ades', 'notice/9a5b719dbc.pdf', 1, '2023-10-02 05:15:43', '2023-10-02 05:15:43'),
(4, 'জনাব মোঃ আবুল হাশেম, সহকারী প্রোগ্রামার এর পবিত্র ওমরা হজ্জ পালনের জন্য ছুটি মঞ্জুরের অফিস আদেশ', 'jnab-mo-abul-hasem-shkaree-programar-er-pbitr-oomra-hjj-palner-jnz-chuti-mnjurer-ofis-ades', 'notice/4824ef41e4.pdf', 1, '2023-10-02 05:15:53', '2023-10-02 05:15:53'),
(5, 'জাতীয় দক্ষতামান বেসিক ৩৬০ ঘন্টা মেয়াদি প্রতিষ্ঠান পরিদর্শন সংক্রান্ত অফিস আদেশ', 'jateey-dkshtaman-besik-360-ghnta-meyadi-prtishthan-pridrsn-sngkrant-ofis-ades', 'notice/2755d773ac.pdf', 1, '2023-10-02 05:16:01', '2023-10-02 05:16:01'),
(6, 'জাতীয় দক্ষতামান বেসিক সার্টিফিকেট কোর্স (৩৬০ ঘন্টা মেয়াদি) শিক্ষাক্রমের জুলাই-ডিসেম্বর-২০২৩ (৬ মাস মেয়াদি) রেজিস্ট্রেশন সংক্রান্ত বিজ্ঞপ্তি', 'jateey-dkshtaman-besik-sartifiket-kors-360-ghnta-meyadi-sikshakrmer-julai-disembr-2023-6-mas-meyadi-rejistresn-sngkrant-bijngpti', 'notice/5bf91019df.pdf', 1, '2023-10-02 05:16:19', '2023-10-02 05:16:19');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scrollnotices`
--

CREATE TABLE `scrollnotices` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scrollnotices`
--

INSERT INTO `scrollnotices` (`id`, `name`, `slug`, `link`, `priority`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ডিপ্লোমা ইন ফিসারিজ, ফরেস্ট্রি ও লাইভস্টক শিক্ষাক্রমের পুনঃভর্তির অনুমোদন প্রসঙ্গে', 'diploma-in-fisarij-frestri-oo-laivstk-sikshakrmer-punvrtir-onumodn-prsngoe', '#', 1, 1, '2023-10-02 05:17:13', '2023-10-02 05:17:13'),
(2, '২০২৩ সালের এসএসসি (ভোকেশনাল) ও দাখিল (ভোকেশনাল) শিক্ষাক্রমের নবম শ্রেণী সমাপনী পরীক্ষার সময়সূচি', '2023-saler-esessi-vokesnal-oo-dakhil-vokesnal-sikshakrmer-nbm-srenee-smapnee-preekshar-smysuuci', '#', 2, 1, '2023-10-02 05:17:24', '2023-10-02 05:17:24'),
(3, 'জাতীয় দক্ষতামান বেসিক সার্টিফিকেট কোর্স (৩৬০ ঘন্টা মেয়াদি) শিক্ষাক্রমের জুলাই-ডিসেম্বর-২০২৩ (৬ মাস মেয়াদি) রেজিস্ট্রেশন সংক্রান্ত বিজ্ঞপ্তি', 'jateey-dkshtaman-besik-sartifiket-kors-360-ghnta-meyadi-sikshakrmer-julai-disembr-2023-6-mas-meyadi-rejistresn-sngkrant-bijngpti', '#', 3, 1, '2023-10-02 05:17:36', '2023-10-02 05:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maps` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `emimage` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bannerlink` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `metadescription` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `about` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `likepage` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `address`, `logo`, `email`, `phone`, `maps`, `emimage`, `banner`, `bannerlink`, `keywords`, `metadescription`, `about`, `likepage`, `created_at`, `updated_at`) VALUES
(1, 'আমাদের উচ্চ বিদ্যালয়', 'সি আর দত্ত রোড, এফ হক টাওয়ার, ঢাকা।', 'uploads/a8a87a29c8.webp', 'demo@mail.com', '017XXXXXXX', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3070.9345320035404!2d90.3920772384837!3d23.748192620706774!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8bd757aaaab%3A0x938e4758a260e476!2sSobkisu%20Bazar!5e0!3m2!1sen!2sbd!4v1696243080018!5m2!1sen!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'uploads/dbe261ce1f263.webp', 'uploads/dbe261ce1f26.webp', '#', 'জাতীয় সংসদের স্পিকার ড. শিরীন শারমিন চৌধুরী বলেছেন,', 'জাতীয় সংসদের স্পিকার ড. শিরীন শারমিন চৌধুরী বলেছেন, আজকের শিশুরা জ্ঞানবিজ্ঞান, মুক্ত চিন্তা-চেতনায় সমৃদ্ধ হয় উঠলেই আগামী দিনের বিশ্ব তার সুন্দর প্রভাব ও ফল পাবে; বিশ্ব হয়ে উঠবে আরও সুন্দর, আরও শান্তিময়। তাই সবার আগে আমাদের শিশুদের নিরাপত্তার বিষয়ে গুরুত্ব দিতে হবে।', '<p>জাতীয় সংসদের স্পিকার ড. শিরীন শারমিন চৌধুরী বলেছেন, আজকের শিশুরা জ্ঞানবিজ্ঞান, মুক্ত চিন্তা-চেতনায় সমৃদ্ধ হয় উঠলেই আগামী দিনের বিশ্ব তার সুন্দর প্রভাব ও ফল পাবে; বিশ্ব হয়ে উঠবে আরও সুন্দর, আরও শান্তিময়। তাই সবার আগে আমাদের শিশুদের নিরাপত্তার বিষয়ে গুরুত্ব দিতে হবে।</p>', NULL, '2023-10-02 04:43:48', '2023-12-11 04:16:13');

-- --------------------------------------------------------

--
-- Table structure for table `sideimages`
--

CREATE TABLE `sideimages` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sltid` int DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sideimages`
--

INSERT INTO `sideimages` (`id`, `name`, `sltid`, `image`, `link`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Image', 1, 'uploads/5464cb5d90.webp', NULL, 1, '2023-10-02 05:39:19', '2023-10-02 05:39:19'),
(2, 'প্রতিরোধে', 4, 'uploads/a08dc6af4b.webp', 'https://bangladesh.gov.bd/site/page/91530698-c795-4542-88f2-5da1870bd50c', 1, '2023-10-02 05:44:09', '2023-10-02 05:44:09');

-- --------------------------------------------------------

--
-- Table structure for table `sidelinks`
--

CREATE TABLE `sidelinks` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sltid` int DEFAULT NULL,
  `linkstatus` int DEFAULT NULL,
  `targetlink` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sidelinks`
--

INSERT INTO `sidelinks` (`id`, `name`, `sltid`, `linkstatus`, `targetlink`, `status`, `created_at`, `updated_at`) VALUES
(1, 'নাম ও বয়স সংশোধনের আবেদন', 3, 0, '#', 1, '2023-10-02 05:39:55', '2023-10-02 05:39:55'),
(2, 'বিদ্যালয় শাখার আবেদন', 3, 0, '#', 1, '2023-10-02 05:40:58', '2023-10-02 05:40:58'),
(3, 'অভিযোগের আবেদন', 3, 0, '#', 1, '2023-10-02 05:41:11', '2023-10-02 05:41:11'),
(4, 'গণপ্রজাতন্ত্রী বাংলাদেশ সরকার', 2, 0, '#', 1, '2023-10-02 05:45:05', '2023-10-02 05:45:05'),
(5, 'শিক্ষা মন্ত্রণালয়', 2, 0, '#', 1, '2023-10-02 05:45:16', '2023-10-02 05:45:16'),
(6, 'আন্ত: শিক্ষা বোর্ড', 2, 0, '#', 1, '2023-10-02 05:45:41', '2023-10-02 05:45:41'),
(7, 'ebook', 2, 0, '#', 0, '2023-10-02 05:45:57', '2023-10-02 05:46:59'),
(8, 'আই-বুক', 2, 0, '#', 1, '2023-10-02 05:46:07', '2023-10-02 05:46:07'),
(9, 'কোভিড-১৯', 2, 0, '#', 1, '2023-10-02 05:46:25', '2023-10-02 05:46:25'),
(10, 'কারিগরি শিক্ষা অধিদপ্তর', 2, 0, '#', 1, '2023-10-02 05:46:40', '2023-10-02 05:46:40');

-- --------------------------------------------------------

--
-- Table structure for table `sidelinktitles`
--

CREATE TABLE `sidelinktitles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sidelinktitles`
--

INSERT INTO `sidelinktitles` (`id`, `name`, `priority`, `status`, `created_at`, `updated_at`) VALUES
(1, 'সুবর্ণজয়ন্তী কর্নার', 2, 1, '2023-10-02 05:36:47', '2023-10-02 05:37:06'),
(2, 'গুরুত্বপূর্ণ লিংক', 1, 1, '2023-10-02 05:36:57', '2023-10-02 05:36:57'),
(3, 'On-line Application', 3, 1, '2023-10-02 05:38:34', '2023-10-02 05:38:34'),
(4, 'ডেঙ্গু প্রতিরোধে করণীয়', 4, 1, '2023-10-02 05:42:22', '2023-10-02 05:42:33');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` int DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `name`, `priority`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Slider 1', 1, 'uploads/b1f37dbf95.webp', 1, '2023-10-02 23:08:50', '2023-12-11 04:14:43'),
(2, 'Slider 2', 2, 'uploads/25664359dc.webp', 1, '2023-10-02 23:11:39', '2023-12-11 04:14:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dipankar', 'admin@admin.com', '2023-10-02 04:34:47', '$2y$10$d43FKDEpgsGfbdRU2RC1oOAtggTuonMgt09hTyimN/omLxUD9jBGy', 'd0oAWZ38869U2yaEAV0QAL8sifAwuOukANsHTy5YUdfafxLjdtnUypQYDwhg', '2023-10-02 04:34:47', '2023-10-02 04:34:47'),
(2, 'Erika Shields II', 'rparker@example.net', '2023-10-02 04:34:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '8SLQNREDBr', '2023-10-02 04:34:47', '2023-10-02 04:34:47'),
(3, 'Miss Aylin Blick', 'fconnelly@example.net', '2023-10-02 04:34:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'oMUY1php1G', '2023-10-02 04:34:47', '2023-10-02 04:34:47'),
(4, 'Sunny Renner', 'afritsch@example.net', '2023-10-02 04:34:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'HXqoXrQuAo', '2023-10-02 04:34:47', '2023-10-02 04:34:47'),
(5, 'Prof. Alycia Hauck V', 'cayla.leuschke@example.org', '2023-10-02 04:34:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'MpOXN2HPs0', '2023-10-02 04:34:47', '2023-10-02 04:34:47'),
(6, 'Jaron Labadie Jr.', 'shields.onie@example.com', '2023-10-02 04:34:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'jhbU2fUGXI', '2023-10-02 04:34:47', '2023-10-02 04:34:47'),
(7, 'Solon Sawayn DDS', 'wsmith@example.com', '2023-10-02 04:34:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1WYpWEgPYX', '2023-10-02 04:34:47', '2023-10-02 04:34:47'),
(8, 'Robert Ullrich II', 'wiza.celestine@example.net', '2023-10-02 04:34:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '23H61teQJo', '2023-10-02 04:34:47', '2023-10-02 04:34:47'),
(9, 'Joany Hettinger', 'fabian.kuhn@example.org', '2023-10-02 04:34:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'npshwexkZm', '2023-10-02 04:34:47', '2023-10-02 04:34:47'),
(10, 'Ford Gottlieb', 'jgutmann@example.net', '2023-10-02 04:34:47', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Qdclb6LlCZ', '2023-10-02 04:34:47', '2023-10-02 04:34:47');

-- --------------------------------------------------------

--
-- Table structure for table `widgets`
--

CREATE TABLE `widgets` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` int DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `widgets`
--

INSERT INTO `widgets` (`id`, `name`, `slug`, `priority`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'বিজ্ঞপ্তি', 'bijngpti', 1, 'uploads/dbe23aa4cc.webp', 1, '2023-10-02 22:21:15', '2023-10-02 22:21:15'),
(2, 'অনলাইনে ভর্তি (সেশনঃ ২০২৩-২০২৪)', 'onlaine-vrti-sesn-2023-2024', 2, 'uploads/0b471d06aa.webp', 1, '2023-10-02 22:21:27', '2023-10-02 22:21:27'),
(3, 'ইনস্টিটিউট কর্ণার', 'institiut-krnar', 3, 'uploads/1c59ce8177.webp', 1, '2023-10-02 22:22:11', '2023-10-02 22:22:11'),
(4, 'ফর্ম ফিলআপ', 'frm-filap', 4, 'uploads/abb50d866f.webp', 1, '2023-10-02 22:22:39', '2023-10-02 22:22:39'),
(5, 'রেজিষ্ট্রেশন', 'rejishtresn', 5, 'uploads/99d7bf412e.webp', 1, '2023-10-02 22:22:56', '2023-10-02 22:22:56'),
(6, 'অনলাইন তথ্য প্রেরণ/গ্রহণ', 'onlain-tthz-prerngrhn', 6, 'uploads/b7324ffca6.webp', 1, '2023-10-02 22:23:11', '2023-10-02 22:23:11'),
(7, 'চলমান ফলাফল', 'clman-flafl', 7, 'uploads/c946d5317e.webp', 1, '2023-10-02 22:23:26', '2023-10-02 22:23:26'),
(8, 'উত্তরপত্র পুণঃনিরীক্ষণ/স্থগিত ফলাফল', 'uttrptr-punnireekshnsthgit-flafl', 8, 'uploads/384073f50d.webp', 1, '2023-10-02 22:24:14', '2023-10-02 22:24:14'),
(9, 'জব প্লেসমেন্ট', 'jb-plesment', 9, 'uploads/9b51670292.webp', 1, '2023-10-02 22:53:08', '2023-10-02 22:53:08'),
(10, 'বার্ষিক কর্মসম্পাদন চুক্তি', 'barshik-krmsmpadn-cukti', 10, 'uploads/5b913bc2bf.webp', 1, '2023-10-02 22:53:28', '2023-10-02 22:53:28'),
(11, 'অন্যান্য সেবা ও পরিসংখ্যান', 'onzanz-seba-oo-prisngkhzan', 11, 'uploads/2370129c86.webp', 1, '2023-10-02 22:53:47', '2023-10-02 22:53:47'),
(12, 'অভিযোগ প্রতিকার ব্যবস্থাপনা', 'ovizog-prtikar-bzbsthapna', 12, 'uploads/7f65dcaa45.webp', 1, '2023-10-02 22:54:09', '2023-10-02 22:54:09'),
(13, 'জাতীয় শুদ্ধাচার কৌশল', 'jateey-suddhacar-kousl', 13, 'uploads/3b9e4bd427.webp', 1, '2023-10-02 22:54:41', '2023-10-02 22:54:41'),
(14, 'উদ্ভাবনী কার্যক্রম', 'udvabnee-karzkrm', 14, 'uploads/087b8b2ee3.webp', 1, '2023-10-02 22:54:59', '2023-10-02 22:54:59');

-- --------------------------------------------------------

--
-- Table structure for table `widget_links`
--

CREATE TABLE `widget_links` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wedgetid` int DEFAULT NULL,
  `linkstatus` int DEFAULT NULL,
  `target` int DEFAULT NULL,
  `targetdata` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `widget_links`
--

INSERT INTO `widget_links` (`id`, `name`, `slug`, `wedgetid`, `linkstatus`, `target`, `targetdata`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ডিপ্লোমা পর্যায়', 'diploma-przay', 1, 0, 0, '#', 1, '2023-10-02 22:25:10', '2023-10-02 22:25:10'),
(2, 'এইচ এস সি পর্যায়', 'eic-es-si-przay', 1, 0, 0, '#', 1, '2023-10-02 22:25:36', '2023-10-02 22:25:36'),
(3, 'এস,এস,সি পর্যায়', 'esessi-przay', 1, 0, 0, '#', 1, '2023-10-02 22:25:52', '2023-10-02 22:25:52'),
(4, 'সল্প মেয়াদী ও অন্যান্য', 'slp-meyadee-oo-onzanz', 1, 0, 0, '#', 1, '2023-10-02 22:26:07', '2023-10-02 22:26:07'),
(5, 'সরকারি ও বেসরকারি সকল শিক্ষাক্রমে ভর্তি', 'srkari-oo-besrkari-skl-sikshakrme-vrti', 2, 0, 0, '#', 1, '2023-10-02 22:27:45', '2023-10-02 22:27:45'),
(6, 'প্রতিষ্ঠানের তালিকা', 'prtishthaner-talika', 2, 0, 0, '#', 1, '2023-10-02 22:28:04', '2023-10-02 22:28:04'),
(7, 'ভর্তির নীতিমালা', 'vrtir-neetimala', 2, 0, 0, '#', 1, '2023-10-02 22:28:22', '2023-10-02 22:28:22'),
(8, 'ইনস্টিটিউট লগইন (এসএসসি ও এইচএসসি পর্যায়)', 'institiut-lgin-esessi-oo-eicessi-przay', 3, 0, 0, '#', 1, '2023-10-02 22:29:08', '2023-10-02 22:29:08'),
(9, 'ইনস্টিটিউট লগইন (ডিপ্লোমা ও সার্টিফিকেট পর্যায়)', 'institiut-lgin-diploma-oo-sartifiket-przay', 3, 0, 0, '#', 1, '2023-10-02 22:29:21', '2023-10-02 22:29:21'),
(10, 'ডিপ্লোমা পর্যায়', 'diploma-przay', 4, 0, 0, '#', 1, '2023-10-02 22:29:55', '2023-10-02 22:29:55'),
(11, 'এইচ এস সি পর্যায়', 'eic-es-si-przay', 4, 0, 0, '#', 1, '2023-10-02 22:30:10', '2023-10-02 22:30:10'),
(12, 'এস,এস,সি পর্যায়', 'esessi-przay', 4, 0, 0, '#', 1, '2023-10-02 22:30:27', '2023-10-02 22:30:27'),
(13, 'সল্প মেয়াদী ও অন্যান্য', 'slp-meyadee-oo-onzanz', 4, 0, 0, '#', 1, '2023-10-02 22:30:40', '2023-10-02 22:30:40'),
(14, 'বেসরকারি নতুন ভর্তি ২০২১-২০২২', 'besrkari-ntun-vrti-2021-2022', 5, 0, 0, '#', 1, '2023-10-02 22:31:27', '2023-10-02 22:31:27'),
(15, 'ডিপ্লোমা / এইচএসসি পর্যায়', 'diploma-eicessi-przay', 5, 0, 0, '#', 1, '2023-10-02 22:32:18', '2023-10-02 22:32:18'),
(16, 'এস এস সি পর্যায়', 'es-es-si-przay', 5, 0, 0, '#', 1, '2023-10-02 22:32:32', '2023-10-02 22:32:32'),
(18, 'ডিপ্লোমা পর্যায়', 'diploma-przay', 6, 0, 0, '#', 1, '2023-10-02 22:33:49', '2023-10-02 22:33:49'),
(19, 'TC/PC/PF/IA মার্ক ও GPA এন্ট্রি', 'tcpcpfia-mark-oo-gpa-entri', 6, 0, 0, '#', 1, '2023-10-02 22:34:04', '2023-10-02 22:34:04'),
(20, 'Center Examinee & Absent/Expelled তথ্য প্রেরণ', 'center-examinee-absentexpelled-tthz-prern', 6, 0, 0, '#', 2, '2023-10-02 22:34:19', '2023-10-02 22:34:33'),
(21, 'ডিপ্লোমা পর্যায়', 'diploma-przay', 7, 0, 0, '#', 1, '2023-10-02 22:35:14', '2023-10-02 22:35:14'),
(22, 'এইচ এস সি পর্যায়', 'eic-es-si-przay', 7, 0, 0, '#', 1, '2023-10-02 22:35:30', '2023-10-02 22:35:30'),
(23, 'এস,এস,সি পর্যায়', 'esessi-przay', 7, 0, 0, '#', 1, '2023-10-02 22:35:48', '2023-10-02 22:35:48'),
(24, 'সল্প মেয়াদী ও অন্যান্য', 'slp-meyadee-oo-onzanz', 7, 0, 0, '#', 1, '2023-10-02 22:35:59', '2023-10-02 22:35:59'),
(25, 'ডিপ্লোমা পর্যায়', 'diploma-przay', 8, 0, 0, '#', 1, '2023-10-02 22:36:28', '2023-10-02 22:36:28'),
(26, 'এইচ এস সি পর্যায়', 'eic-es-si-przay', 8, 0, 0, '#', 1, '2023-10-02 22:36:39', '2023-10-02 22:36:39'),
(27, 'এস,এস,সি পর্যায়', 'esessi-przay', 8, 0, 0, '#', 1, '2023-10-02 22:36:54', '2023-10-02 22:36:54'),
(28, 'সল্প মেয়াদী ও অন্যান্য', 'slp-meyadee-oo-onzanz', 8, 0, 0, '#', 1, '2023-10-02 22:37:07', '2023-10-02 22:37:07'),
(29, 'সেবা প্রদান প্রতিশ্রুতি', 'seba-prdan-prtisruti', 9, 0, 0, '#', 1, '2023-10-02 22:56:17', '2023-10-02 22:56:17'),
(30, 'ফোকাল পয়েন্ট কর্মকর্তা/পরীবীক্ষন কমিটি', 'fokal-pyent-krmkrtapreebeekshn-kmiti', 9, 0, 0, '#', 1, '2023-10-02 22:56:32', '2023-10-02 22:56:32'),
(31, 'এপিএ প্রকাশনা/নির্দেশিকা/পরিপত্র/এপিএ টীম', 'epie-prkasnanirdesikapriptrepie-teem', 10, 0, 0, '#', 1, '2023-10-02 22:57:11', '2023-10-02 22:57:11'),
(32, 'চুক্তিসমূহ', 'cuktismuuh', 10, 0, 0, '#', 1, '2023-10-02 22:57:23', '2023-10-02 22:57:23'),
(33, 'পরিবীক্ষণ ও মূল্যায়ন প্রতিবেদন', 'pribeekshn-oo-muulzayn-prtibedn', 10, 0, 0, '#', 1, '2023-10-02 22:57:39', '2023-10-02 22:57:39'),
(34, 'পরীক্ষা নিয়মনীতি (ডিপ্লোমা)', 'preeksha-niymneeti-diploma', 11, 0, 0, '#', 1, '2023-10-02 22:58:12', '2023-10-02 22:58:12'),
(35, 'রীক্ষা নিয়মনীতি (অন্যান্য)', 'reeksha-niymneeti-onzanz', 11, 0, 0, '#', 1, '2023-10-02 22:58:25', '2023-10-02 22:58:25'),
(36, 'পরিসংখ্যান', 'prisngkhzan', 11, 0, 0, '#', 1, '2023-10-02 22:58:38', '2023-10-02 22:58:38'),
(37, 'অনিক ও আপিল কর্মকর্তাগণ', 'onik-oo-apil-krmkrtagn', 12, 0, 0, '#', 1, '2023-10-02 22:59:19', '2023-10-02 22:59:19'),
(38, 'মাসিক/ত্রৈমাসিক', 'masiktroimasik', 12, 0, 0, '#', 1, '2023-10-02 22:59:36', '2023-10-02 23:01:08'),
(39, 'অভিযোগ দাখিল (অনলাইনে আবেদন)', 'ovizog-dakhil-onlaine-abedn', 12, 0, 0, '#', 1, '2023-10-02 22:59:50', '2023-10-02 23:00:30'),
(40, 'শুদ্ধাচার কৌশল কর্মপরিকল্পনা', 'suddhacar-kousl-krmpriklpna', 13, 0, 0, '#', 1, '2023-10-02 23:01:38', '2023-10-02 23:01:38'),
(41, 'ফোকাল পয়েন্ট কর্মকর্তা ও বিকল্প কর্মকর্তা', 'fokal-pyent-krmkrta-oo-biklp-krmkrta', 13, 0, 0, '#', 1, '2023-10-02 23:01:55', '2023-10-02 23:01:55'),
(42, 'প্রজ্ঞাপন/পরিপত্র/নীতিমালা/ সংকলন     ইনোভেশন টিম', 'prjngapnpriptrneetimala-sngkln-inovesn-tim', 14, 0, 0, '#', 1, '2023-10-02 23:02:24', '2023-10-02 23:02:24'),
(43, 'বার্ষিক উদ্ভাবন কর্মপরিকল্পনা     উদ্ভাবনী প্রকল্পসমূহ', 'barshik-udvabn-krmpriklpna-udvabnee-prklpsmuuh', 14, 0, 0, '#', 1, '2023-10-02 23:02:37', '2023-10-02 23:02:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navbars`
--
ALTER TABLE `navbars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notices`
--
ALTER TABLE `notices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `scrollnotices`
--
ALTER TABLE `scrollnotices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sideimages`
--
ALTER TABLE `sideimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sidelinks`
--
ALTER TABLE `sidelinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sidelinktitles`
--
ALTER TABLE `sidelinktitles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `widgets`
--
ALTER TABLE `widgets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `widget_links`
--
ALTER TABLE `widget_links`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `navbars`
--
ALTER TABLE `navbars`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `notices`
--
ALTER TABLE `notices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scrollnotices`
--
ALTER TABLE `scrollnotices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sideimages`
--
ALTER TABLE `sideimages`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sidelinks`
--
ALTER TABLE `sidelinks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sidelinktitles`
--
ALTER TABLE `sidelinktitles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `widgets`
--
ALTER TABLE `widgets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `widget_links`
--
ALTER TABLE `widget_links`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
