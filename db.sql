-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1:3307
-- Vytvořeno: Pát 28. led 2022, 16:45
-- Verze serveru: 10.4.13-MariaDB
-- Verze PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `nette_sportisimo`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `loga`
--

DROP TABLE IF EXISTS `loga`;
CREATE TABLE IF NOT EXISTS `loga` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `cesta` varchar(50) COLLATE utf8_czech_ci NOT NULL,
  `typ` varchar(10) COLLATE utf8_czech_ci NOT NULL,
  `sirka` smallint(4) NOT NULL,
  `vyska` smallint(4) NOT NULL,
  `velikost` int(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `loga`
--

INSERT INTO `loga` (`id`, `cesta`, `typ`, `sirka`, `vyska`, `velikost`) VALUES
(1, 'images/loga/14434[1].jpg', 'png', 350, 150, 3820),
(2, 'images/loga/15589[1].jpg', 'png', 223, 150, 9029),
(3, 'images/loga/44191821[1].jpg', 'jpeg', 2400, 1373, 172762),
(4, 'images/loga/nike1[1].jpg', 'jpeg', 400, 215, 10870),
(5, 'images/loga/logo.png', 'png', 695, 241, 9609),
(6, 'images/loga/intersport.png', 'png', 1920, 1080, 71908);

-- --------------------------------------------------------

--
-- Struktura tabulky `znacky`
--

DROP TABLE IF EXISTS `znacky`;
CREATE TABLE IF NOT EXISTS `znacky` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nazev` varchar(100) COLLATE utf8_czech_ci NOT NULL,
  `popis` text COLLATE utf8_czech_ci NOT NULL,
  `spravce_znacky_id` int(5) NOT NULL,
  `loga_id` int(5) NOT NULL,
  `stav` tinyint(1) DEFAULT NULL,
  `dodavatel_id` int(5) NOT NULL,
  `pridano` datetime NOT NULL DEFAULT current_timestamp(),
  `vlozil` int(5) NOT NULL,
  `aktualizace` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `loga_id` (`loga_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_czech_ci;

--
-- Vypisuji data pro tabulku `znacky`
--

INSERT INTO `znacky` (`id`, `nazev`, `popis`, `spravce_znacky_id`, `loga_id`, `stav`, `dodavatel_id`, `pridano`, `vlozil`, `aktualizace`) VALUES
(1, 'Thule', 'Jednička na trhu může být jen jedna. Co se týče řešení přepravy pro aktivní rodiny, profesionální sportovce i outdoorové nadšence, jedničkou na globálním trhu je švédská prémiová značka Thule. Převoz sportovního vybavení nebo zavazadel na dovolenou nebylo nikdy pohodlnější a stylovější.\n\nThule hraje prim především v automobilovém průmyslu. Z nabídky si vyberete střešní nosiče, nosiče kol, střešní boxy, nosiče lyží nebo nosiče vybavení na vodní sporty. Je tedy jedno, jestli se chystáte na rodinnou dovolenou k moři nebo na hory a aktivně strávený čas na sjezdovkách.', 0, 1, NULL, 0, '2022-01-28 17:17:00', 1, '2022-01-28 17:17:00'),
(2, 'Adidas', 'Historie značky adidas sahá až do roku 1920, kdy velký milovník sportu Adolf \"Adi\" Dassler ve svých 20 letech postavil první dílnu a začal vyrábět sportovní boty.\n\nDnes je adidas jedním z největších sportovních výrobců na světě a mezi konkurencí se drží nejen díky své dlouhé historii a vysoké kvalitě. Nové kolekce adidas pro nejrůznější sportovní kategorie, dávají další rozměr vysoce funkčnímu textilu, obuvi i doplňkům a výjimečným způsobem slučují sportovní funkčnost a moderní styl.', 1, 2, NULL, 2, '2022-01-28 17:18:33', 1, '2022-01-28 17:18:33'),
(3, 'Under Armour', 'Sportovní oblečení Under Armour není značkou se stoletou tradicí. Under Armour vznikl teprve v roce 1996 v garáži Kevina Planka, ale o to rychleji se prodral na trůn funkčního oblečení a platí za jednu z nejvýznamnějších značek ve sportovně-oděvním průmyslu.\n\nOblečení Under Armour se dělí na oblečení do chladného počasí a do teplého. Under Armour ColdGear je perfektní do zimy. Vaše tělo se udrží v provozní teplotě a domů nepřijdete s promrzlým zadkem. Under Armour HeatGear je naopak funkční oblečení do tepla. Výsledkem jeho nošení bude příjemné chlazení a absence koláčů v podpaží.', 1, 3, NULL, 2, '2022-01-28 17:19:57', 1, '2022-01-28 17:19:57'),
(4, 'Nike', ' roce 1998 politický aktivista Mark Kasky obvinil Nike, že lže svým zákazníkům, když v dopise v novinách San Francisco Examiner ujišťovala všechny, že dělníci této korporace po světě se mohou těšit ze základních pracovních práv (jako minimální mzda, zdravotní a bezpečnostní směrnice a rovné možnosti zaměstnání). Kasky věděl, že v tomto případě to nebyla pravda – audit v roce 1996 odhalil, že například dělníci ve Vietnamu byli rutinně vystaveni chemikáliím způsobujícím rakovinu, které ve Spojených státech byly nezákonné. Další studie, kterou sama Nike zaplatila, nalezla „důkazy fyzického a slovního zneužívání a sexuálního obtěžování v devíti jejích továrnách v Indonésii.“[zdroj?!] Po zjištění, že on a další tisíce zákazníků Nike byli obelháni a kupovali od ní zboží na základě lživých předpokladů, dostal Kasky korporaci Nike k soudu. A v roce 2002 Kasky svůj případ vyhrál a vrchní kalifornský soud řekl, že Nike vskutku porušila zákony (jako je nekalá soutěž a lživá reklama).[3] Nike se ale odvolala, vzala případ k Nejvyššímu soudu a ten v roce 2003 souhlasil se slyšením. Nike tvrdila, že coby korporátní osoba měla nárok na svobodu projevu, která (v tomto případě) znamenala i svobodu lhát. Opírala se o precedens Southern Pacific Railroad versus kraj Santa Clara z roku 1886, ve kterém jistý John Chandler Bancroft Davis přisoudil korporacím status osoby. Kaskyho právník ale vystoupil s detailním rozborem tohoto případu a argumentoval, že Nejvyšší soud tehdy nevyřkl, že by korporace byly osoby, a výše zmíněný precedens je mylně chápán. Předsedající soudce Nejvyššího soudu, William Ranquist vyslechl tuto argumentaci a soudní spor rozpustil, protože ke slyšení tohoto případu vůbec nemělo dojít. Rozhodnutí soudu nižší instance nabylo právní moci, Nike prohrála tento případ a vyrovnala se s Kaskym, souhlasíc, že daruje sedmimístné sumy na pomoc pracovníkům v textilu na celém světě.', 2, 4, NULL, 1, '2022-01-28 17:24:50', 1, '2022-01-28 17:24:50'),
(5, 'Sportisimo', 'Vznikli jsme v České republice v roce 2000 a první prodejnu jsme otevřeli na podzim roku 2001 v Mladé Boleslavi. Naše rodina kamenných obchodů se od té doby pravidelně rozrůstala. Bylo jen otázkou času, kdy expandujeme i za hranice České republiky. Stalo se tak v roce 2008, kdy jsme otevřeli prodejny ve slovenské Nitře a v Popradu.\n\nNa konci tohoto roku se stala ještě jedna událost, kterou považujeme za důležitý mezník – jako první významný sportovní řetězec na českém trhu jsme umožnili našim zákazníkům nákup z pohodlí domova pomocí e-shopu. Velmi nás potěšil rok 2011, kdy jsme si přebrali první cenu v anketě Obchodník roku za rok 2010 v kategorii prodejců se sportovními potřebami. Od té doby svou sbírku díky vaší přízni postupně rozšiřujeme.\n\nV prosinci 2021 jsme se dostali na metu 200 prodejen v Evropě. Naším cílem je i nadále dynamicky růst – jak v počtu prodejen, tak v rozšiřování nabídky na e-shopu – a motivovat našimi aktivitami stále více lidí ke sportu a pohybu.', 2, 5, NULL, 0, '2022-01-28 17:31:39', 1, '2022-01-28 17:31:39'),
(6, 'Intersport', 'Oficiálně prodejce sportovního vybavení se sítí 21 prodejen po celé České republice. Ale můžeme to říct i jinak: jsme místo, kde to žije sportem.\n\nProdáváme sportovní oblečení a doplňky, našim zákazníkům servisujeme vybavení, komunikujeme se zástupci předních světových značek, zajímáme se o trendy, zkoušíme nové produkty, školíme se. Ale hlavně se bavíme a ze všeho nejčastěji se bavíme o sportu se zákazníky.\n\nNaši zaměstnanci jsou z drtivé většiny sportovní nadšenci – máme tady všechny od trenérů až po běžce začátečníky. Nabízíme široký výběr sportovního vybavení a oblečení předních světových značek i značek exkluzivních.', 0, 6, NULL, 2, '2022-01-28 17:36:32', 1, '2022-01-28 17:36:32');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
