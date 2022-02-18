<?php

declare(strict_types=1);

namespace App\Models;
use Nette;
use Nette\Security\SimpleIdentity;
use Models\BaseModel;

/**
 * Pseudo přihlašovací třída
 * Třída slouží jen pro udržování informace o uživateli

*/

class LoginManager implements Nette\Security\Authenticator 
{
	private $users;
	private $znackyManager;

	public function __construct(ZnackyManager $znackyManager) {
		$this->znackyManager = $znackyManager;
	}

	/**
	 * Funkce pro ověření uživatele. Na základě uživatelského id provede ověření, zda se uživatel nachází
	 * ve správcích značky (BaseModel)
	 * Metoda authentiace očekává 2 stringy, nelze zasílat jen ID
	 * @param string $username - id uživatele
	 * @param string $password - heslo - posílá se prázdný string
	 * @return object SimpleIdentity - ID a jméno uživatele
	 */

	public function authenticate(string $username, string $password): SimpleIdentity
	{   
        $users = $this->znackyManager->getSpravciZnacky();
        $id = intval($username);
        if(!array_key_exists($id, $users)) throw new Nette\Security\AuthenticationException('Tento uživatel nebyl nalezen');

		return new SimpleIdentity(
			$id,
			['jmeno' => $users[$id]]
		);
	}

    
}

