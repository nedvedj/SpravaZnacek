<?php

declare(strict_types=1);

namespace App\Presenters;

use Nette;
use App\Models;

final class LoginPresenter extends Nette\Application\UI\Presenter
{

    private $loginManager;
    private $znackyManager;

    public function __construct(Models\LoginManager $loginManager, Models\ZnackyManager $znackyManager) 
    {
            $this->loginManager = $loginManager;  
            $this->znackyManager = $znackyManager;        
    }
    

    /*
        Vykreslení uživatelů do přihlašovacího formuláře
    */
	
    public function renderDefault() {
        $this->template->uzivatel = "";
        $this->template->uzivatele = $this->znackyManager->getSpravciZnacky();
        bdump($this->znackyManager->getSpravciZnacky());
    }

    /*
        Funkce pro přihlášení, která se podívá, zda v poli v BaseModel existuje dané ID 
        * @param string $id id uživatele
    */

    public function actionPrihlas(string $id) {
        if ($id==null) {
            $this->flashMessage('Nebyl vybrán uživatel');
            $this->redirect("Login:");
        }
        $user = $this->getUser();
        $user->setAuthenticator($this->loginManager);    
        $user->login($id, "");    
        $this->redirect('Homepage:');
    }

    public function actionOdhlas() {
        $this->getUser()->logout();
        $this->redirect("Homepage:");
    }



}
