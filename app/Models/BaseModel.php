<?php
declare(strict_types=1);

namespace App\Models;
use Nette;
use Nette\Database\Table\Selection;


abstract class BaseModel
{

    private $dbexplorer;

    private $tableName;


    public function __construct(Nette\Database\Explorer $dbexplorer)
    {
        // přístup k DB
        $this->dbexplorer = $dbexplorer;

        // Jméno tabulky s kterou budeme pracovat
        $this->tableName = $this->getTable();
        
    }

    /**
     * Funkce vrací správce značek, pro jednoduchost namísto DB vloženy hodnoty přímo
     * @return array pole správců značek
     */

    public function getSpravciZnacky() : Array {         
        return [ 
             0 =>    "Pepa Novák",
             1 =>    "Alena Nedůvěřivá",
             2 =>    "Honza Podezřívavý",
         ];
     }

    /**
     * Funkce vrací dodavatele značek, pro jednoduchost namísto DB vloženy hodnoty přímo
     * @return array pole dodavatelů značek
     */
     public function getDodavatele() : Array {         
         return [ 
             0 =>    "Agrofert",
             1 =>    "Tesla",
             2 =>    "Škoda",
         ];
     }
    
     /**
      * Abstraktní metoda pro práci s názvem tabulky
      * Díky ní můžeme nastavit jméno tabulky v potomkovi a snadno tak přidat další modely (Znackymodel, LogoModel, ProduktModel, ..)
      */
    abstract public function getTable();   

    /**
     *  funkce vrátí všechny záznamy z tabulky, případná další pravidla a omezení se nastavují v potomkovi
     * @return Table Selection
    */
    public function Select() : Selection
    {
        return $this->dbexplorer->table($this->tableName);
    }

    /**
     * funkce pro vkládání dat do tabulky
     * @param array $data pole klic => hodnota
    */

    public function Insert($data) : void
    {
        $this->dbexplorer->table($this->tableName)->insert($data);
    }

    /**
     * funkce pro vkládání dat do tabulky
     * @param $id id záznamu 
     * @param array $data pole klic => hodnota
    */

    public function Update(int $id, $data) : void
    {
        $this->dbexplorer->table($this->tableName)->where("id",$id)->update($data);
    }


    /** 
     * funkce pro mazání dat z tabulky
     * @param $id id záznamu pro smazání
    */
    public function Delete($id) : void
    {
        $this->dbexplorer->table($this->tableName)->where("id", $id)->delete();
    }
}