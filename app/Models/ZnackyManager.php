<?php
declare(strict_types=1);

namespace App\Models;
use Nette;
use Nette\Database\Table\Selection;


class ZnackyManager extends BaseModel
{

    /**
     * Funkce nastaví jméno tabulky s kterou pracujeme (viz abstraktní třída v rodiči)
     * @return string nazev tabulky
     */
    public function getTable() : String    
    {
        return "znacky";
    }


    /**
     * Metoda, která vrátí seznam všech značek seřazených abecedně a připojí automaticky loga z tabulky
     * @param string $order ASC / DESC
     * @return object Table Selection
    */

    public function seznamZnacek(string $order = "") : Selection
    {
        $zaznamy = $this->Select();
        if ($order!="") $zaznamy->order($order);
        return $zaznamy;
    }

    /**
     * Metoda kontroluje, zda značka již neexistuje 
     * @param string $nazev název značky
     * @return bool 
     */

    public function overZnacku(string $nazev) : bool
    {
        $zaznamy = $this->Select()->select("id")->where("nazev",$nazev);
        if (count($zaznamy) == 0) return false;
        else return true;
    }

    /**
     * Funkce vloží formulářem odeslaná data do tabulky
     * @param object $data data z formuláře
     * @param int $logoID ID uloženého loga
     * @param int $user ID uživatele, který vložení provedl
    */

    public function vlozZnacku(object $data, int $logoID,int $user) 
    {
        unset($data["logo"]);
        $data["loga_id"] = $logoID;  
        $data["vlozil"] = $user;
        $this->Insert($data);
    }


}