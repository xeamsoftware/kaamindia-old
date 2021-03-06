-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2022 at 04:08 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_kaamindia`
--

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `sortname` varchar(3) DEFAULT NULL,
  `name` varchar(150) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `phonecode` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `sortname`, `name`, `status`, `phonecode`, `created_at`, `updated_at`) VALUES
(1, 'AF', 'Afghanistan', 1, 93, NULL, '2021-10-22 01:40:04'),
(2, 'AL', 'Albania', 1, 355, NULL, '2021-10-22 01:32:24'),
(3, 'DZ', 'Algeria', 1, 213, NULL, NULL),
(4, 'AS', 'American Samoa', 1, 1684, NULL, NULL),
(5, 'AD', 'Andorra', 1, 376, NULL, NULL),
(6, 'AO', 'Angola', 1, 244, NULL, NULL),
(7, 'AI', 'Anguilla', 1, 1264, NULL, NULL),
(8, 'AQ', 'Antarctica', 1, 0, NULL, NULL),
(9, 'AG', 'Antigua And Barbuda', 1, 1268, NULL, NULL),
(10, 'AR', 'Argentina', 1, 54, NULL, NULL),
(11, 'AM', 'Armenia', 1, 374, NULL, NULL),
(12, 'AW', 'Aruba', 1, 297, NULL, NULL),
(13, 'AU', 'Australia', 1, 61, NULL, NULL),
(14, 'AT', 'Austria', 1, 43, NULL, NULL),
(15, 'AZ', 'Azerbaijan', 1, 994, NULL, NULL),
(16, 'BS', 'Bahamas The', 1, 1242, NULL, NULL),
(17, 'BH', 'Bahrain', 1, 973, NULL, NULL),
(18, 'BD', 'Bangladesh', 1, 880, NULL, NULL),
(19, 'BB', 'Barbados', 1, 1246, NULL, NULL),
(20, 'BY', 'Belarus', 1, 375, NULL, NULL),
(21, 'BE', 'Belgium', 1, 32, NULL, NULL),
(22, 'BZ', 'Belize', 1, 501, NULL, NULL),
(23, 'BJ', 'Benin', 1, 229, NULL, NULL),
(24, 'BM', 'Bermuda', 1, 1441, NULL, NULL),
(25, 'BT', 'Bhutan', 1, 975, NULL, NULL),
(26, 'BO', 'Bolivia', 1, 591, NULL, NULL),
(27, 'BA', 'Bosnia and Herzegovina', 1, 387, NULL, NULL),
(28, 'BW', 'Botswana', 1, 267, NULL, NULL),
(29, 'BV', 'Bouvet Island', 1, 0, NULL, NULL),
(30, 'BR', 'Brazil', 1, 55, NULL, NULL),
(31, 'IO', 'British Indian Ocean Territory', 1, 246, NULL, NULL),
(32, 'BN', 'Brunei', 1, 673, NULL, NULL),
(33, 'BG', 'Bulgaria', 1, 359, NULL, NULL),
(34, 'BF', 'Burkina Faso', 1, 226, NULL, NULL),
(35, 'BI', 'Burundi', 1, 257, NULL, NULL),
(36, 'KH', 'Cambodia', 1, 855, NULL, NULL),
(37, 'CM', 'Cameroon', 1, 237, NULL, NULL),
(38, 'CA', 'Canada', 1, 1, NULL, NULL),
(39, 'CV', 'Cape Verde', 1, 238, NULL, NULL),
(40, 'KY', 'Cayman Islands', 1, 1345, NULL, NULL),
(41, 'CF', 'Central African Republic', 1, 236, NULL, NULL),
(42, 'TD', 'Chad', 1, 235, NULL, NULL),
(43, 'CL', 'Chile', 1, 56, NULL, NULL),
(44, 'CN', 'China', 1, 86, NULL, NULL),
(45, 'CX', 'Christmas Island', 1, 61, NULL, NULL),
(46, 'CC', 'Cocos (Keeling) Islands', 1, 672, NULL, NULL),
(47, 'CO', 'Colombia', 1, 57, NULL, NULL),
(48, 'KM', 'Comoros', 1, 269, NULL, NULL),
(49, 'CG', 'Republic Of The Congo', 1, 242, NULL, NULL),
(50, 'CD', 'Democratic Republic Of The Congo', 1, 242, NULL, NULL),
(51, 'CK', 'Cook Islands', 1, 682, NULL, NULL),
(52, 'CR', 'Costa Rica', 1, 506, NULL, NULL),
(53, 'CI', 'Cote D\'Ivoire (Ivory Coast)', 1, 225, NULL, NULL),
(54, 'HR', 'Croatia (Hrvatska)', 1, 385, NULL, NULL),
(55, 'CU', 'Cuba', 1, 53, NULL, NULL),
(56, 'CY', 'Cyprus', 1, 357, NULL, NULL),
(57, 'CZ', 'Czech Republic', 1, 420, NULL, NULL),
(58, 'DK', 'Denmark', 1, 45, NULL, NULL),
(59, 'DJ', 'Djibouti', 1, 253, NULL, NULL),
(60, 'DM', 'Dominica', 1, 1767, NULL, NULL),
(61, 'DO', 'Dominican Republic', 1, 1809, NULL, NULL),
(62, 'TP', 'East Timor', 1, 670, NULL, NULL),
(63, 'EC', 'Ecuador', 1, 593, NULL, NULL),
(64, 'EG', 'Egypt', 1, 20, NULL, NULL),
(65, 'SV', 'El Salvador', 1, 503, NULL, NULL),
(66, 'GQ', 'Equatorial Guinea', 1, 240, NULL, NULL),
(67, 'ER', 'Eritrea', 1, 291, NULL, NULL),
(68, 'EE', 'Estonia', 1, 372, NULL, NULL),
(69, 'ET', 'Ethiopia', 1, 251, NULL, NULL),
(70, 'XA', 'External Territories of Australia', 1, 61, NULL, NULL),
(71, 'FK', 'Falkland Islands', 1, 500, NULL, NULL),
(72, 'FO', 'Faroe Islands', 1, 298, NULL, NULL),
(73, 'FJ', 'Fiji Islands', 1, 679, NULL, NULL),
(74, 'FI', 'Finland', 1, 358, NULL, NULL),
(75, 'FR', 'France', 1, 33, NULL, NULL),
(76, 'GF', 'French Guiana', 1, 594, NULL, NULL),
(77, 'PF', 'French Polynesia', 1, 689, NULL, NULL),
(78, 'TF', 'French Southern Territories', 1, 0, NULL, NULL),
(79, 'GA', 'Gabon', 1, 241, NULL, NULL),
(80, 'GM', 'Gambia The', 1, 220, NULL, NULL),
(81, 'GE', 'Georgia', 1, 995, NULL, NULL),
(82, 'DE', 'Germany', 1, 49, NULL, NULL),
(83, 'GH', 'Ghana', 1, 233, NULL, NULL),
(84, 'GI', 'Gibraltar', 1, 350, NULL, NULL),
(85, 'GR', 'Greece', 1, 30, NULL, NULL),
(86, 'GL', 'Greenland', 1, 299, NULL, NULL),
(87, 'GD', 'Grenada', 1, 1473, NULL, NULL),
(88, 'GP', 'Guadeloupe', 1, 590, NULL, NULL),
(89, 'GU', 'Guam', 1, 1671, NULL, NULL),
(90, 'GT', 'Guatemala', 1, 502, NULL, NULL),
(91, 'XU', 'Guernsey and Alderney', 1, 44, NULL, NULL),
(92, 'GN', 'Guinea', 1, 224, NULL, NULL),
(93, 'GW', 'Guinea-Bissau', 1, 245, NULL, NULL),
(94, 'GY', 'Guyana', 1, 592, NULL, NULL),
(95, 'HT', 'Haiti', 1, 509, NULL, NULL),
(96, 'HM', 'Heard and McDonald Islands', 1, 0, NULL, NULL),
(97, 'HN', 'Honduras', 1, 504, NULL, NULL),
(98, 'HK', 'Hong Kong S.A.R.', 1, 852, NULL, NULL),
(99, 'HU', 'Hungary', 1, 36, NULL, NULL),
(100, 'IS', 'Iceland', 1, 354, NULL, NULL),
(101, 'IN', 'India', 1, 91, NULL, NULL),
(102, 'ID', 'Indonesia', 1, 62, NULL, NULL),
(103, 'IR', 'Iran', 1, 98, NULL, NULL),
(104, 'IQ', 'Iraq', 1, 964, NULL, NULL),
(105, 'IE', 'Ireland', 1, 353, NULL, NULL),
(106, 'IL', 'Israel', 1, 972, NULL, NULL),
(107, 'IT', 'Italy', 1, 39, NULL, NULL),
(108, 'JM', 'Jamaica', 1, 1876, NULL, NULL),
(109, 'JP', 'Japan', 1, 81, NULL, NULL),
(110, 'XJ', 'Jersey', 1, 44, NULL, NULL),
(111, 'JO', 'Jordan', 1, 962, NULL, NULL),
(112, 'KZ', 'Kazakhstan', 1, 7, NULL, NULL),
(113, 'KE', 'Kenya', 1, 254, NULL, NULL),
(114, 'KI', 'Kiribati', 1, 686, NULL, NULL),
(115, 'KP', 'Korea North', 1, 850, NULL, NULL),
(116, 'KR', 'Korea South', 1, 82, NULL, NULL),
(117, 'KW', 'Kuwait', 1, 965, NULL, NULL),
(118, 'KG', 'Kyrgyzstan', 1, 996, NULL, NULL),
(119, 'LA', 'Laos', 1, 856, NULL, NULL),
(120, 'LV', 'Latvia', 1, 371, NULL, NULL),
(121, 'LB', 'Lebanon', 1, 961, NULL, NULL),
(122, 'LS', 'Lesotho', 1, 266, NULL, NULL),
(123, 'LR', 'Liberia', 1, 231, NULL, NULL),
(124, 'LY', 'Libya', 1, 218, NULL, NULL),
(125, 'LI', 'Liechtenstein', 1, 423, NULL, NULL),
(126, 'LT', 'Lithuania', 1, 370, NULL, NULL),
(127, 'LU', 'Luxembourg', 1, 352, NULL, NULL),
(128, 'MO', 'Macau S.A.R.', 1, 853, NULL, NULL),
(129, 'MK', 'Macedonia', 1, 389, NULL, NULL),
(130, 'MG', 'Madagascar', 1, 261, NULL, NULL),
(131, 'MW', 'Malawi', 1, 265, NULL, NULL),
(132, 'MY', 'Malaysia', 1, 60, NULL, NULL),
(133, 'MV', 'Maldives', 1, 960, NULL, NULL),
(134, 'ML', 'Mali', 1, 223, NULL, NULL),
(135, 'MT', 'Malta', 1, 356, NULL, NULL),
(136, 'XM', 'Man (Isle of)', 1, 44, NULL, NULL),
(137, 'MH', 'Marshall Islands', 1, 692, NULL, NULL),
(138, 'MQ', 'Martinique', 1, 596, NULL, NULL),
(139, 'MR', 'Mauritania', 1, 222, NULL, NULL),
(140, 'MU', 'Mauritius', 1, 230, NULL, NULL),
(141, 'YT', 'Mayotte', 1, 269, NULL, NULL),
(142, 'MX', 'Mexico', 1, 52, NULL, NULL),
(143, 'FM', 'Micronesia', 1, 691, NULL, NULL),
(144, 'MD', 'Moldova', 1, 373, NULL, NULL),
(145, 'MC', 'Monaco', 1, 377, NULL, NULL),
(146, 'MN', 'Mongolia', 1, 976, NULL, NULL),
(147, 'MS', 'Montserrat', 1, 1664, NULL, NULL),
(148, 'MA', 'Morocco', 1, 212, NULL, NULL),
(149, 'MZ', 'Mozambique', 1, 258, NULL, NULL),
(150, 'MM', 'Myanmar', 1, 95, NULL, NULL),
(151, 'NA', 'Namibia', 1, 264, NULL, NULL),
(152, 'NR', 'Nauru', 1, 674, NULL, NULL),
(153, 'NP', 'Nepal', 1, 977, NULL, NULL),
(154, 'AN', 'Netherlands Antilles', 1, 599, NULL, NULL),
(155, 'NL', 'Netherlands The', 1, 31, NULL, NULL),
(156, 'NC', 'New Caledonia', 1, 687, NULL, NULL),
(157, 'NZ', 'New Zealand', 1, 64, NULL, NULL),
(158, 'NI', 'Nicaragua', 1, 505, NULL, NULL),
(159, 'NE', 'Niger', 1, 227, NULL, NULL),
(160, 'NG', 'Nigeria', 1, 234, NULL, NULL),
(161, 'NU', 'Niue', 1, 683, NULL, NULL),
(162, 'NF', 'Norfolk Island', 1, 672, NULL, NULL),
(163, 'MP', 'Northern Mariana Islands', 1, 1670, NULL, NULL),
(164, 'NO', 'Norway', 1, 47, NULL, NULL),
(165, 'OM', 'Oman', 1, 968, NULL, NULL),
(166, 'PK', 'Pakistan', 1, 92, NULL, NULL),
(167, 'PW', 'Palau', 1, 680, NULL, NULL),
(168, 'PS', 'Palestinian Territory Occupied', 1, 970, NULL, NULL),
(169, 'PA', 'Panama', 1, 507, NULL, NULL),
(170, 'PG', 'Papua new Guinea', 1, 675, NULL, NULL),
(171, 'PY', 'Paraguay', 1, 595, NULL, NULL),
(172, 'PE', 'Peru', 1, 51, NULL, NULL),
(173, 'PH', 'Philippines', 1, 63, NULL, NULL),
(174, 'PN', 'Pitcairn Island', 1, 0, NULL, NULL),
(175, 'PL', 'Poland', 1, 48, NULL, NULL),
(176, 'PT', 'Portugal', 1, 351, NULL, NULL),
(177, 'PR', 'Puerto Rico', 1, 1787, NULL, NULL),
(178, 'QA', 'Qatar', 1, 974, NULL, NULL),
(179, 'RE', 'Reunion', 1, 262, NULL, NULL),
(180, 'RO', 'Romania', 1, 40, NULL, NULL),
(181, 'RU', 'Russia', 1, 70, NULL, NULL),
(182, 'RW', 'Rwanda', 1, 250, NULL, NULL),
(183, 'SH', 'Saint Helena', 1, 290, NULL, NULL),
(184, 'KN', 'Saint Kitts And Nevis', 1, 1869, NULL, NULL),
(185, 'LC', 'Saint Lucia', 1, 1758, NULL, NULL),
(186, 'PM', 'Saint Pierre and Miquelon', 1, 508, NULL, NULL),
(187, 'VC', 'Saint Vincent And The Grenadines', 1, 1784, NULL, NULL),
(188, 'WS', 'Samoa', 1, 684, NULL, NULL),
(189, 'SM', 'San Marino', 1, 378, NULL, NULL),
(190, 'ST', 'Sao Tome and Principe', 1, 239, NULL, NULL),
(191, 'SA', 'Saudi Arabia', 1, 966, NULL, NULL),
(192, 'SN', 'Senegal', 1, 221, NULL, NULL),
(193, 'RS', 'Serbia', 1, 381, NULL, NULL),
(194, 'SC', 'Seychelles', 1, 248, NULL, NULL),
(195, 'SL', 'Sierra Leone', 1, 232, NULL, NULL),
(196, 'SG', 'Singapore', 1, 65, NULL, NULL),
(197, 'SK', 'Slovakia', 1, 421, NULL, NULL),
(198, 'SI', 'Slovenia', 1, 386, NULL, NULL),
(199, 'XG', 'Smaller Territories of the UK', 1, 44, NULL, NULL),
(200, 'SB', 'Solomon Islands', 1, 677, NULL, NULL),
(201, 'SO', 'Somalia', 1, 252, NULL, NULL),
(202, 'ZA', 'South Africa', 1, 27, NULL, NULL),
(203, 'GS', 'South Georgia', 1, 0, NULL, NULL),
(204, 'SS', 'South Sudan', 1, 211, NULL, NULL),
(205, 'ES', 'Spain', 1, 34, NULL, NULL),
(206, 'LK', 'Sri Lanka', 1, 94, NULL, NULL),
(207, 'SD', 'Sudan', 1, 249, NULL, NULL),
(208, 'SR', 'Suriname', 1, 597, NULL, NULL),
(209, 'SJ', 'Svalbard And Jan Mayen Islands', 1, 47, NULL, NULL),
(210, 'SZ', 'Swaziland', 1, 268, NULL, NULL),
(211, 'SE', 'Sweden', 1, 46, NULL, NULL),
(212, 'CH', 'Switzerland', 1, 41, NULL, NULL),
(213, 'SY', 'Syria', 1, 963, NULL, NULL),
(214, 'TW', 'Taiwan', 1, 886, NULL, NULL),
(215, 'TJ', 'Tajikistan', 1, 992, NULL, NULL),
(216, 'TZ', 'Tanzania', 1, 255, NULL, NULL),
(217, 'TH', 'Thailand', 1, 66, NULL, NULL),
(218, 'TG', 'Togo', 1, 228, NULL, NULL),
(219, 'TK', 'Tokelau', 1, 690, NULL, NULL),
(220, 'TO', 'Tonga', 1, 676, NULL, NULL),
(221, 'TT', 'Trinidad And Tobago', 1, 1868, NULL, NULL),
(222, 'TN', 'Tunisia', 1, 216, NULL, NULL),
(223, 'TR', 'Turkey', 1, 90, NULL, NULL),
(224, 'TM', 'Turkmenistan', 1, 7370, NULL, NULL),
(225, 'TC', 'Turks And Caicos Islands', 1, 1649, NULL, NULL),
(226, 'TV', 'Tuvalu', 1, 688, NULL, NULL),
(227, 'UG', 'Uganda', 1, 256, NULL, NULL),
(228, 'UA', 'Ukraine', 1, 380, NULL, NULL),
(229, 'AE', 'United Arab Emirates', 1, 971, NULL, NULL),
(230, 'GB', 'United Kingdom', 1, 44, NULL, NULL),
(231, 'US', 'United States', 1, 1, NULL, NULL),
(232, 'UM', 'United States Minor Outlying Islands', 1, 1, NULL, NULL),
(233, 'UY', 'Uruguay', 1, 598, NULL, NULL),
(234, 'UZ', 'Uzbekistan', 1, 998, NULL, NULL),
(235, 'VU', 'Vanuatu', 1, 678, NULL, NULL),
(236, 'VA', 'Vatican City State (Holy See)', 1, 39, NULL, NULL),
(237, 'VE', 'Venezuela', 1, 58, NULL, NULL),
(238, 'VN', 'Vietnam', 1, 84, NULL, NULL),
(239, 'VG', 'Virgin Islands (British)', 1, 1284, NULL, NULL),
(240, 'VI', 'Virgin Islands (US)', 1, 1340, NULL, NULL),
(241, 'WF', 'Wallis And Futuna Islands', 1, 681, NULL, NULL),
(242, 'EH', 'Western Sahara', 1, 212, NULL, NULL),
(243, 'YE', 'Yemen', 1, 967, NULL, NULL),
(244, 'YU', 'Yugoslavia', 1, 38, NULL, NULL),
(245, 'ZM', 'Zambia', 1, 260, NULL, NULL),
(246, 'ZW', 'Zimbabwe', 1, 263, NULL, '2021-10-22 02:08:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
