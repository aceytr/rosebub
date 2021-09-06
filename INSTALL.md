# INSTALLATION 
composer create-project rosebub/rosebub --stability=dev

## Configure file
www/config.php

## Create database 
CREATE TABLE `contacts` (
  `id` char(36) NOT NULL,
  `id_ext` char(36) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `address_street` varchar(150) DEFAULT NULL,
  `address_postalcode` varchar(150) DEFAULT NULL,
  `address_city` varchar(150) DEFAULT NULL,
  `address_country` varchar(20) DEFAULT NULL,
  `country_code` varchar(5) DEFAULT NULL,
  `dialing_code` varchar(10) DEFAULT NULL,
  `phone_mobile` varchar(20) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `lang` varchar(5) DEFAULT NULL,
  `dateformat` varchar(5) DEFAULT 'Y-m-d',
  `timezone` varchar(255) DEFAULT 'Europe/Paris',
  `calendars` longtext,
  `roles` longtext,
  `groups` longtext,
  `api_key` char(36) DEFAULT NULL,
  `api_limit` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


## Add first user

**Please** Change data in insert query: add your email, your name etc..
⚠️Change email value !!

INSERT INTO `contacts` (`id`, `id_ext`, `created_at`, `updated_at`, `deleted_at`, `first_name`, `last_name`, `email`, `password`, `address_street`, `address_postalcode`, `address_city`, `address_country`, `country_code`, `dialing_code`, `phone_mobile`, `birthdate`, `lang`, `dateformat`, `timezone`, `calendars`, `roles`, `groups`, `api_key`, `api_limit`) VALUES
('1', '', '2021-09-05 14:49:34', '2021-09-06 15:37:56', NULL, 'Dupont', 'Eric', 'eric.dupont@gmail.com', '$2y$10$5tCZOQmmRIQr2dYE6rfPk.KwN/YP9PSQcSchIxwG3IxSlvdMApwXu', '1 rue du stade', '75000', 'Paris', 'FRANCE', 'FR', '+33', '630432923', '1971-06-22', 'fr', 'd/m/Y', 'Europe/Paris', '', '[\"admin\", \"superadmin\"]', NULL, '', '');

## Add index
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);
COMMIT;

## Change your password
index.php?q=fr/auth/password-forgot