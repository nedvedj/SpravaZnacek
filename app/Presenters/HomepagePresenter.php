<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use Tracy\Debugger;
use App\Models;
use App\Forms;
use Nette\Application\UI\Form;
use Nette\Application\UI\Multiplier;



final class HomepagePresenter extends Nette\Application\UI\Presenter
{

    private $znackyManager;   // Instance k DB
    private $logaManager;   // Instance k DB
    private $repo;          // Uložiště obrázků značek
    private $znackyFactory; // Instance k formuláři

    /** @persistent */
    public int $pocet;

    /** @persistent */
    public string $razeni;

    public function startup(): void
    {   
        parent::startup();
        if (!$this->getUser()->isLoggedIn()) {
            $this->redirect('Login:');
        }        
    }

    public function __construct(
            Models\ZnackyManager $znackyManager,
            Models\LogaManager $logaManager, 
            Forms\ZnackyFactory $znackyFactory
        ) 
        {
            $this->znackyManager = $znackyManager;
            $this->logaManager = $logaManager;
            $this->znackyFactory = $znackyFactory;
            $this->repo = "images/loga";
            
    }

    /**
    *    Funkce pro filtraci značek uživatele
    */

    public function actionMoje() {

        $this->flashMessage("Na této funkcionalitě pilně pracujeme");
        $this->redirect("Homepage:");
    }

    /**
    *  Funkce pro smazání značky 
    * @param int $znackaID ID značky ke smazání
    */

    public function actionSmaz(int $znackaID) {

        // TODO - konfirmační dialog + možnost smazat spolu se značkou i logo
        $this->znackyManager->Delete($znackaID);

        $this->flashMessage("Značka smazána");
        $this->redirect("Homepage:");
    }

    /**
    * Funkce pro zobrazení modal okna pro úpravu loga
    * @param int $id ID značky k editaci
    */

    public function handleUprav(int $id){

        //$this["formEdit"]->setDefaults($dat);

        if ($this->isAjax()) {
            $this->payload->isModal = TRUE;
            $this->template->modalNadpis = "Editovat položku";
            $znacka = $this->znackyManager->seznamZnacek()->get($id);

            $this["upravZnacku"]->setDefaults($znacka);
            $this->redrawControl("modal");

        }
    }

    /**
    * Funkce pro řazení výsledků z databáze podle abecedy
    * @param string $razeni ASC / DESC řazení
    */

    public function handleSerad(string $razeni = "ASC") {
        if ($razeni==="DESC" or $razeni==="ASC") {
            $this->template->znacky = $this->znackyManager->seznamZnacek("nazev ".$razeni)->fetchAll();
            $this->razeni = $razeni;
        }
        else {
                $this->flashMessage("Parametr je nesprávný, zvolte znovu a lépe!");
                $this->redirect("Homepage:");
            }
    }

   /**
    * Render hlavní strany, stará se o listování položek
    * @param int $strana číslo strany k zobrazení
    * @param string $razeni ASC / DESC řazení
    * @param int $pocet počet položek na stránku
    */

    public function renderDefault(int $strana=1, string $razeni = "ASC", int $pocet = 5) {
      
        // Pro počet výsledků a řazení využijeme persistentní proměnnou, aby se zachovaly během listování

        // ochrana před zápornou hodnotou výsledků z DB
        if ($pocet<1) $this->pocet = 1;
        else $this->pocet = $pocet;

        // ochrana před jiným typem řazení
        if ($razeni!=="DESC" and $razeni!=="ASC") $this->razeni = "ASC";
        else $this->razeni = $razeni;
        
        
        
        // pro stránkování nahrajeme značky do proměnné
        $znacky = $this->znackyManager->seznamZnacek("nazev ".$this->razeni);
        $this->template->pocetZnacek = count($znacky);  // pokud vypíšeme níže, dojde k omezení výsledku od paginatoru

        // a do šablony pošleme pouze jejich část omezenou podle výpočtu metody page
        $posledni = 0;
        $this->template->znacky = $znacky->page($strana, $this->pocet, $posledni);

        // Informace, pokud to uživatel se stránkováním přežene
        if ($strana<1 or $strana>$posledni) $this->flashMessage("Tolik stránek nemáme :(");

        $this->template->osoby = $this->znackyManager->getSpravciZnacky();
        $this->template->dodavatele = $this->znackyManager->getDodavatele();
		$this->template->strana = $strana;
        $this->template->pocet = $this->pocet;
		$this->template->posledni = $posledni;
        $this->template->uzivatel = $this->getUser()->roles["jmeno"];
        
    }

    // Vykreslení uživatele do šablony
    public function renderPridej() {
        $this->template->uzivatel = $this->getUser()->roles["jmeno"];
    }

    /**

    * Formulář pro úpravu značky
    * Funkce užívá již hotový formulář z Forms/ZnackyFactory
    * @return Form
    */

    protected function createComponentUpravZnacku(): Form
	{
        
        $form = $this->znackyFactory->vlozZnacku();
        $form->addHidden('id');
        //$form["nazev"]->addRule($form::IS_NOT_IN, 'Tato značka již existuje', array_keys($this->znackyManager->seznamZnacek()->fetchPairs("nazev")));

        unset($form["logo"]);   // Logo zatím upravovat nelze
        $form->addSubmit('send', 'Upravit značku');
        $form->onSuccess[] = [$this, 'upravZnacku'];
        return $form;
	}
    /**
     * Zpracování formuláře pro úpravu značky
     * @param Form $form objekt formuláře
     * @param $data vstupní hodnoty formuláře
     */

    public function upravZnacku(Form $form, $data): void
	{
        $id = intval($data->id);
        
        unset($data["id"]);     // odebereme ID z pole dat
        //if ($data->logo->hasFile()) $form->addError('Omlouváme se, tuto funkci ještě neumíme');       // Nelze použít s modal window - dochází k překreslení
        $this->znackyManager->Update($id, $data);
            
    }

    /**
     * Formulář pro přidání značky
     * Funkce užívá již hotový formulář z Forms/ZnackyFactory

    */

    protected function createComponentVlozZnacku(): Form
	{
		$form = $this->znackyFactory->vlozZnacku();
		$form->addSubmit('send', 'Vložit značku');
		$form->onSuccess[] = [$this, 'nahrajZnacku'];
		return $form;
	}

    /**
     * Zpracování formuláře pro novou značku
     * @param Form $form objekt formuláře
     * @param $data vstupní hodnoty formuláře
     */
  
    public function nahrajZnacku(Form $form, $data): void
	{
        

        if ($this->znackyManager->overZnacku($data->nazev)) $form->addError('Jméno je již použito');  
        else if (!$data->logo->hasFile()) $form->addError('Nebylo vybráno logo');  
        else {
            $cesta = $this->repo."/".$data->logo->name;     // úprava cesty k obrázku (mohlo by se vypustit a nechat jen nazev)
            
            // nejdřív vložíme logo a získáme si záznam řádku
            $logoID = $this->logaManager->vlozLogo($data->logo, $cesta);  

            // nyní vložíme značku
            $this->znackyManager->vlozZnacku($data, $logoID, $this->getUser()->id);          

            $this->flashMessage('Značka vložena');
            $this->redirect('Homepage:');
        }
	}



}
