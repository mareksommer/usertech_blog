-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Počítač: db
-- Vytvořeno: Čtv 10. kvě 2018, 23:41
-- Verze serveru: 5.7.21
-- Verze PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `usertech_test`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `post`
--

CREATE TABLE `post` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `title` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci,
  `Date` datetime NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `views_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `post`
--

INSERT INTO `post` (`id`, `title`, `text`, `Date`, `slug`, `is_active`, `views_count`) VALUES
('1bc70e61-52f8-11e8-bcaa-0242ac1e0002', 'Johnson challenges', '<p>Another post</p>', '2018-05-08 14:15:00', 'johnson-challenges', 1, 5),
('33358b4f-52f8-11e8-bcaa-0242ac1e0002', 'Downing Street tried to side-step', '<p><span style=\"color: #333333; font-family: TimesDigitalW04-Regular; font-size: 18px;\">Downing Street tried to side-step the confrontation with the foreign secretary after he said that her plans for a customs partnership would create a &ldquo;whole new web of bureaucracy&rdquo;. Friends of Mr Johnson said that he would not resign.</span></p>', '2018-05-08 11:00:00', 'johnson-challenges_90', 0, 0),
('9104e65b-5287-11e8-bcaa-0242ac1e0002', 'No 10 said that Theresa May continued', '<p><strong>some bold text</strong></p>\r\n<p>some other text</p>', '2018-05-06 16:18:00', 'no-10-said-that-theresa-may-continued', 1, 2),
('aaf39571-529c-11e8-bcaa-0242ac1e0002', 'Recipe: Lindsey Bareham’s pineapple carpaccio with mint and chilli', '<section class=\"Article-body Article-container Theme--times2\" style=\"margin: 3rem auto 0px; padding: 0px; box-sizing: border-box; width: 664.984px; position: relative; color: #333333; font-family: TimesDigitalW04-Regular;\">\r\n<div class=\"Article-content \" style=\"margin: 0px; padding: 0px; box-sizing: border-box;\">\r\n<p style=\"margin: 2rem 0px 3rem; padding: 0px; box-sizing: border-box; line-height: 3rem; font-size: 1.8rem;\">This is one of my go-to dinner party puds, ideal when I want something fresh and light that is quick and easy. It can be made at the last minute or hours in advance. It is only worth making with a really ripe, sweetly honeyed pineapple. But that is hard to tell and we have to hope that if a leaf can be pulled out without resistance, it is perfectly ripe. The slices and copious resultant juices are stunningly enhanced by scraps of fresh mint. Another very good addition, a combination I learnt to love in Mauritius but is popular in Thai cuisine, is tiny scraps of red chilli. You don&rsquo;t need much and the heat is subdued by the sweet fruit. Do try it.</p>\r\n</div>\r\n</section>', '2018-05-07 18:00:00', 'recipe:-lindsey-bareham’s-pineapple-carpaccio-with-mint-and-chilli', 1, 0),
('cc1ffac0-53c6-11e8-9609-0242ac1e0003', 'New Post', '<p>Content...</p>', '2018-05-09 20:21:00', 'new-post', 1, 10),
('fc2ccf3c-52f7-11e8-bcaa-0242ac1e0002', 'BBC, Channel 4 and ITV in talks for on-demand service to rival Netflix', '<h1 class=\"Article-headline Headline Headline--article\" style=\"margin: 0px 0px 1.5rem; padding: 0px; box-sizing: border-box; color: #1d1d1b; -webkit-font-smoothing: auto; font-size: 4.5rem; line-height: 4.5rem; font-weight: 400; font-family: TimesModern-Bold;\">The BBC, Channel 4 and ITV have held early talks about setting up some kind of British streaming service to take on Netflix, it has been reported.</h1>', '2018-05-07 11:00:00', 'bbc,-channel-4-and-itv-in-talks-for-on-demand-service-to-rival-netflix', 1, 7);

-- --------------------------------------------------------

--
-- Struktura tabulky `post_tags`
--

CREATE TABLE `post_tags` (
  `post_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `tag_id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:guid)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `post_tags`
--

INSERT INTO `post_tags` (`post_id`, `tag_id`) VALUES
('33358b4f-52f8-11e8-bcaa-0242ac1e0002', '33359c19-52f8-11e8-bcaa-0242ac1e0002'),
('9104e65b-5287-11e8-bcaa-0242ac1e0002', '9104f967-5287-11e8-bcaa-0242ac1e0002'),
('9104e65b-5287-11e8-bcaa-0242ac1e0002', '96adae26-528c-11e8-bcaa-0242ac1e0002'),
('cc1ffac0-53c6-11e8-9609-0242ac1e0003', 'fc2d0a1b-52f7-11e8-bcaa-0242ac1e0002'),
('fc2ccf3c-52f7-11e8-bcaa-0242ac1e0002', 'fc2cdff1-52f7-11e8-bcaa-0242ac1e0002'),
('fc2ccf3c-52f7-11e8-bcaa-0242ac1e0002', 'fc2d0a1b-52f7-11e8-bcaa-0242ac1e0002');

-- --------------------------------------------------------

--
-- Struktura tabulky `tag`
--

CREATE TABLE `tag` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `tag`
--

INSERT INTO `tag` (`id`, `name`) VALUES
('33359c19-52f8-11e8-bcaa-0242ac1e0002', 'Blog'),
('96adae26-528c-11e8-bcaa-0242ac1e0002', 'new tag'),
('fc2d0a1b-52f7-11e8-bcaa-0242ac1e0002', 'Post'),
('9104f967-5287-11e8-bcaa-0242ac1e0002', 'TAG'),
('fc2cdff1-52f7-11e8-bcaa-0242ac1e0002', 'Third');

-- --------------------------------------------------------

--
-- Struktura tabulky `users`
--

CREATE TABLE `users` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:guid)',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Vypisuji data pro tabulku `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `roles`, `is_active`) VALUES
('070712ed-fa2f-11e7-8cd7-60011001006f', 'Marek', 'admin', '$2a$08$jHZj/wJfcVKlIwr5AvR78euJxYK7Ku5kURNhNx.7.CSIJ3Pq6LEPC', 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}', 1);

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_5A8A6C8D989D9B62` (`slug`),
  ADD KEY `date_index` (`Date`);

--
-- Klíče pro tabulku `post_tags`
--
ALTER TABLE `post_tags`
  ADD PRIMARY KEY (`post_id`,`tag_id`),
  ADD KEY `IDX_A6E9F32D4B89032C` (`post_id`),
  ADD KEY `IDX_A6E9F32DBAD26311` (`tag_id`);

--
-- Klíče pro tabulku `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_389B7835E237E06` (`name`);

--
-- Klíče pro tabulku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_1483A5E9F85E0677` (`username`);

--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `post_tags`
--
ALTER TABLE `post_tags`
  ADD CONSTRAINT `FK_A6E9F32D4B89032C` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_A6E9F32DBAD26311` FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
