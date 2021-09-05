# INSTALLATION 
composer create-project rosebub/rosebub --stability=dev

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
  `phone_mobile` varchar(100) DEFAULT NULL,
  `address_street` varchar(150) DEFAULT NULL,
  `address_postalcode` varchar(150) DEFAULT NULL,
  `address_city` varchar(150) DEFAULT NULL,
  `address_country` varchar(20) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `lang` varchar(5) DEFAULT NULL,
  `dateformat` varchar(5) DEFAULT 'd/m/Y',
  `timezone` varchar(255) DEFAULT 'Europe/Paris',
  `calendars` json DEFAULT NULL,
  `roles` json DEFAULT NULL,
  `groups` json DEFAULT NULL,
  `api_key` char(36) DEFAULT NULL,
  `api_limit` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


## Add first user

**Please** Change data in insert query: add your email, your name etc..
⚠️Change email value !!

INSERT INTO `contacts` (`id`, `id_ext`, `created_at`, `updated_at`, `deleted_at`, `first_name`, `last_name`, `email`, `password`, `phone_mobile`, `address_street`, `address_postalcode`, `address_city`, `address_country`, `birthdate`, `lang`, `dateformat`, `timezone`, `calendars`, `roles`, `groups`, `api_key`, `api_limit`) VALUES
('1', '', '2021-07-20 14:43:07', '2021-07-20 14:43:07', NULL, 'Dupont', 'Eric', 'eric.dupont@gmail.com', '', '+33630432923', '1 rue de la paix', '75000', 'Paris', 'FRANCE', '1970-01-01', 'fr', 'd/m/y', 'Europe/Paris', NULL, '[\"admin\", \"superadmin\"]', NULL, '', '');

## Add index
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`);
COMMIT;

## Change your password
index.php?q=fr/auth/password-forgot