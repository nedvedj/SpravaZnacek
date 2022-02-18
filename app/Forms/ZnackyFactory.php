<?php

namespace App\Forms;

use Nette;
use App\Models;
use Nette\Application\UI\Form;

final class ZnackyFactory {

    private $znackyManager;   // Instance k DB
   

    public function __construct(Models\ZnackyManager $znackyManager) {
        $this->znackyManager = $znackyManager;
        
    }

    public function vlozZnacku() : Form {
        bdump($this->znackyManager->getSpravciZnacky());
        $form = new Form;

        $form->addText('nazev', 'Název:')
	        ->setRequired('Vyplňte prosím %label');

        $form->addTextArea('popis', 'Popis:')
	        ->setRequired('Vyplňte prosím %label');

        $form->addUpload('logo', 'Logo:')
            ->addRule($form::IMAGE, 'Logo musí být JPEG, PNG, GIF or WebP.')
            ->addRule($form::MAX_FILE_SIZE, 'Maximální velikost je 1 MB.', 1024 * 1024)
            ->setRequired('Vložte prosím %label');
    
        $form->addSelect('spravce_znacky_id', 'Zodpovídá:', $this->znackyManager->getSpravciZnacky())
            ->setPrompt('Vyberte prosím zodpovědnou osobu')
            ->setRequired('Vyplňte prosím %label');

        $form->addSelect('dodavatel_id', 'Dodavatel:', $this->znackyManager->getDodavatele())
            ->setPrompt('Vyberte prosím dodavatele')
            ->setRequired('Vyplňte prosím %label');

        return $form;
    }

}
