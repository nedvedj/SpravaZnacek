<?php
declare(strict_types=1);

namespace App\Models;
use Nette;
use Nette\Database\Table\Selection;
use Nette\Utils\Image;

class LogaManager extends BaseModel
{  
    /**
     * Funkce nastaví jméno tabulky s kterou pracujeme (viz abstraktní třída v rodiči)
     * @return string nazev tabulky
     */

    public function getTable() : String 
    {
        return "loga";
    }

    /**
     * Funkce převezme logo odeslané skrz formulář a uloží do složky určené v proměnné $cesta, návratová hodnota id položky v tabulce loga
     * @param object $img objekt obrázku
     * @param string $cesta složka k ukládání obrázků
     * @return int id loga v DB
    */

    public function vlozLogo(object $img, string $cesta) : Int
    {
        $img->move($cesta);       
       
        
        $obr = $img->getImageSize();
        $data = [
            "cesta" =>  $cesta,
            "typ"   =>  explode("/",$img->getContentType())[1],
            "sirka" =>  $obr[0],
            "vyska" =>  $obr[1],
            "velikost"  => $img->getSize()
        ];
        $vloz = $this->Insert($data);
        
        return $this->Select()->max('id');
    }

}