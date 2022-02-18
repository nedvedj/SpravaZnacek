Sportisimo správce značek
=================

Aplikace pro správu značek zapomocí Nette 3.1


Požadavky
------------

PHP 7.2, MySQL 


Instalace
------------

v config/local.neon přepsat přístupové údaje k DB
do DB importovat SQL soubor - sportisimo.sql


Popis funkčnosti
----------------

Systém umožňuje se přihlásit za jednoho ze 3 předdefinovaných uživatelů (lze přepsat v APP/models/BaseModel), z důvodu úspory času uloženy zde, namísto v DB. ID uživatele je používáno k ukládání informací, kdo vložil značku do systému

Systém umožňuje vložit novou značku či editovat stávající. Výsledky lze řadit vzestupně či sestupně dle názvu a je možné zvolit počet výsledků na stránku

Demo verze dostupná online na [sportisimo.esnpilsen.cz](https://sportisimo.esnpilsen.cz)

![Návrh databáze](navrhDB.png?raw=true)

TO DO
----------------
- oprava bugu u formuláře (špatné odesílání dat, neposkytování zpětné vazby)
- možnost změny loga u značky
- ukládání informací jaký user naposledy provedl změny + ukládat info i k logu
- ošetření přepisování již existujících souborů (nabídnout přejmenování, přepsání)
- automatická konverze obrázků
- filtrace výsledků dle uživatele
- dodělání DB
- ošetření délky - v DB omezeno (název, cesta, ...), ve scriptu nijak --> error
- PHP 8
