<?php

use Latte\Runtime as LR;

/** source: C:\Users\ZCU\source\repos\nedvedj\SpravaZnacek\app\Presenters/templates/Homepage/default.latte */
final class Templateb31a966290 extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		0 => ['content' => 'blockContent'],
		'snippet' => ['modal' => 'blockModal'],
	];


	public function main(): array
	{
		extract($this->params);
		if ($this->getParentName()) {
			return get_defined_vars();
		}
		$this->renderBlock('content', get_defined_vars()) /* line 1 */;
		echo '


Nevyužité - card s image - špatně zobrazeno na telefonech 

<div class="col s12 m12">
			<h2>';
		echo LR\Filters::escapeHtmlText($znacka->nazev) /* line 146 */;
		echo '</h2>
			<div class="card horizontal">
				<div class="card-image valign-wrapper">
					<img  src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($znacka->loga->cesta)) /* line 149 */;
		echo '" alt="';
		echo LR\Filters::escapeHtmlAttr($znacka->nazev) /* line 149 */;
		echo '">
				</div>
				<div class="card-stacked">
					<div class="card-content"> 
						<p>';
		echo LR\Filters::escapeHtmlText($znacka->popis) /* line 153 */;
		echo '</p>
					</div>
					<div class="card-tabs">
						<ul class="tabs tabs-fixed-width">
							<li class="tab"><a class="active" href="#osoba_';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($znacka->id)) /* line 157 */;
		echo '">Zodpovědná osoba</a></li>
							<li class="tab"><a href="#dodavatel_';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($znacka->id)) /* line 158 */;
		echo '">Dodavatel</a></li>
						</ul>
					</div>
					<div class="card-content grey lighten-4">
						<div id="osoba_';
		echo LR\Filters::escapeHtmlAttr($znacka->id) /* line 162 */;
		echo '">';
		echo LR\Filters::escapeHtmlText($osoby[$znacka->spravce_znacky_id]) /* line 162 */;
		echo '</div>
						<div id="dodavatel_';
		echo LR\Filters::escapeHtmlAttr($znacka->id) /* line 163 */;
		echo '">';
		echo LR\Filters::escapeHtmlText($dodavatele[$znacka->dodavatel_id]) /* line 163 */;
		echo '</div>
					</div>
					<div class="card-action">
						<a class="ajax waves-effect waves-teal btn" title="editovat" href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("uprav!", [$znacka->id])) /* line 166 */;
		echo '"><i class="fa fa-balance-scale fa-lg"></i>Upravit</a>
				
						<a onclick="return confirm(\'Opravdu chcete smazat danou značku?\');" class="waves-effect waves-teal btn red" href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("smaz", [$znacka->id])) /* line 168 */;
		echo '">Smazat značku</a>
						<div class="card-footer">
							Vložil/a: ';
		echo LR\Filters::escapeHtmlText($osoby[$znacka->vlozil]) /* line 170 */;
		echo ', ';
		echo LR\Filters::escapeHtmlText(($this->filters->date)($znacka->pridano, "d/m/Y H:i")) /* line 170 */;
		echo '.<br>
							 Poslední aktualizace ';
		echo LR\Filters::escapeHtmlText(($this->filters->date)($znacka->aktualizace, "d/m/Y H:i")) /* line 171 */;
		echo '
					</div>
					
				</div>
			</div>
		</div>';
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['znacka' => '11', 'vysledku' => '75'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	/** {block content} on line 1 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '<div class="obsah">
    Počet značek v databázi: ';
		echo LR\Filters::escapeHtmlText($pocetZnacek) /* line 3 */;
		echo '<br>
	<a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("serad!", ['ASC'])) /* line 4 */;
		echo '">Seřadit sestupně</a> / 
		<a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("serad!", ['DESC'])) /* line 5 */;
		echo '">Seřadit vzestupně</a>



	

';
		$iterations = 0;
		foreach ($znacky as $znacka) /* line 11 */ {
			echo '		


		<div class="col s12 m12">
			<h2>';
			echo LR\Filters::escapeHtmlText($znacka->nazev) /* line 16 */;
			echo '</h2>
			<div class="card horizontal">
				
				<div class="card-stacked">
					<div class="card-content"> 
						<p><img  src="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($znacka->loga->cesta)) /* line 21 */;
			echo '" alt="';
			echo LR\Filters::escapeHtmlAttr($znacka->nazev) /* line 21 */;
			echo '">
						';
			echo LR\Filters::escapeHtmlText($znacka->popis) /* line 22 */;
			echo '</p>
					</div>
					<div class="card-tabs">
						<ul class="tabs tabs-fixed-width">
							<li class="tab"><a class="active" href="#osoba_';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($znacka->id)) /* line 26 */;
			echo '">Zodpovědná osoba</a></li>
							<li class="tab"><a href="#dodavatel_';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($znacka->id)) /* line 27 */;
			echo '">Dodavatel</a></li>
						</ul>
					</div>
					<div class="card-content grey lighten-4">
						<div id="osoba_';
			echo LR\Filters::escapeHtmlAttr($znacka->id) /* line 31 */;
			echo '">';
			echo LR\Filters::escapeHtmlText($osoby[$znacka->spravce_znacky_id]) /* line 31 */;
			echo '</div>
						<div id="dodavatel_';
			echo LR\Filters::escapeHtmlAttr($znacka->id) /* line 32 */;
			echo '">';
			echo LR\Filters::escapeHtmlText($dodavatele[$znacka->dodavatel_id]) /* line 32 */;
			echo '</div>
					</div>
					<div class="card-action">
						<a class="ajax waves-effect waves-teal btn" title="editovat" href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("uprav!", [$znacka->id])) /* line 35 */;
			echo '"><i class="fa fa-balance-scale fa-lg"></i>Upravit</a>
				
						<a onclick="return confirm(\'Opravdu chcete smazat danou značku?\');" class="waves-effect waves-teal btn red" href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("smaz", [$znacka->id])) /* line 37 */;
			echo '">Smazat značku</a>
						<div class="card-footer">
							Vložil/a: ';
			echo LR\Filters::escapeHtmlText($osoby[$znacka->vlozil]) /* line 39 */;
			echo ', ';
			echo LR\Filters::escapeHtmlText(($this->filters->date)($znacka->pridano, "d/m/Y H:i")) /* line 39 */;
			echo '.<br>
							 Poslední aktualizace ';
			echo LR\Filters::escapeHtmlText(($this->filters->date)($znacka->aktualizace, "d/m/Y H:i")) /* line 40 */;
			echo '
					</div>
					
				</div>
			</div>
		</div>
		
		

';
			$iterations++;
		}
		echo '	<div class="row">
		<div class="col s7 m7">
			<ul class="pagination">
';
		if ($strana == 1) /* line 53 */ {
			echo '					<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
';
		}
		else /* line 55 */ {
			echo '					<li class="waves-effect"><a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("default", [$strana - 1])) /* line 56 */;
			echo '"><i class="material-icons">chevron_left</i></a></li>
';
		}
		for ($i=1;
		$i<=$posledni;
		$i++) /* line 58 */ {
			if (($i==$strana)) /* line 59 */ {
				echo '						<li class="active"><a href="';
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("default", [$i])) /* line 60 */;
				echo '">';
				echo LR\Filters::escapeHtmlText($i) /* line 60 */;
				echo '</a></li>
';
			}
			else /* line 61 */ {
				echo '						<li class="waves-effect"><a href="';
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("default", [$i])) /* line 62 */;
				echo '">';
				echo LR\Filters::escapeHtmlText($i) /* line 62 */;
				echo '</a></li>
';
			}
		}
		if ($strana == $posledni) /* line 65 */ {
			echo '					<li class="disabled"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
';
		}
		else /* line 67 */ {
			echo '					<li class="waves-effect"><a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("default", [$strana + 1])) /* line 68 */;
			echo '"><i class="material-icons">chevron_right</i></a></li>
';
		}
		echo '			</ul>
		</div>
		<div class="col s5 m5">
			Počet výsledků na stránku:	';
		echo LR\Filters::escapeHtmlText($pocet) /* line 73 */;
		echo '
			<ul class="pagination">
';
		$iterations = 0;
		foreach ([3,5,10,15] as $vysledku) /* line 75 */ {
			echo '					<li class="waves-effect"><a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("default", ['pocet'=>$vysledku])) /* line 76 */;
			echo '">';
			echo LR\Filters::escapeHtmlText($vysledku) /* line 76 */;
			echo '</a></li>
';
			$iterations++;
		}
		echo '			</ul>
		</div>
	</div>
		
<div id="';
		echo htmlspecialchars($this->global->snippetDriver->getHtmlId('modal'));
		echo '">';
		$this->renderBlock('modal', [], null, 'snippet') /* line 82 */;
		echo '</div>

';
	}


	/** {snippet modal} on line 82 */
	public function blockModal(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		$this->global->snippetDriver->enter("modal", 'static');
		try {
			if (isset($modalNadpis)) /* line 83 */ {
				echo '		<div id="modal1" class="modal">
			<div class="modal-content">
				<h4>';
				echo LR\Filters::escapeHtmlText($modalNadpis) /* line 86 */;
				echo '</h4>
				<p>
					<div class="row">
						';
				echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin($form = $this->global->formsStack[] = $this->global->uiControl["upravZnacku"], ['class' => 'col s12']) /* line 89 */;
				echo '
						

							<div class="row">
								<div class="input-field col s8">
									';
				echo end($this->global->formsStack)["nazev"]->getControl()->addAttributes(['class' =>"validate"]) /* line 94 */;
				echo '
									
									';
				if ($ʟ_label = end($this->global->formsStack)["nazev"]->getLabel()) echo $ʟ_label->addAttributes(['class' =>"active"]);
				echo '
								</div>
							</div>

							<div class="row">
								<div class="input-field col s12">
									';
				echo end($this->global->formsStack)["popis"]->getControl()->addAttributes(['class' =>"materialize-textarea"]) /* line 102 */;
				echo '
									
									';
				if ($ʟ_label = end($this->global->formsStack)["popis"]->getLabel()) echo $ʟ_label->addAttributes(['class' =>"active"]);
				echo '
								</div>
							</div>

							<div class="input-field col s8">
								
								<br>
								';
				echo end($this->global->formsStack)["spravce_znacky_id"]->getControl() /* line 111 */;
				echo '
								';
				if ($ʟ_label = end($this->global->formsStack)["spravce_znacky_id"]->getLabel()) echo $ʟ_label;
				echo '
							</div>

							<div class="input-field col s8">
								
								<br>
								';
				echo end($this->global->formsStack)["dodavatel_id"]->getControl() /* line 118 */;
				echo '
								';
				if ($ʟ_label = end($this->global->formsStack)["dodavatel_id"]->getLabel()) echo $ʟ_label;
				echo '
								
							</div>
							<div class="input-field col s12">
								';
				echo end($this->global->formsStack)["send"]->getControl()->addAttributes(['class' =>"btn waves-effect waves-light"]) /* line 123 */;
				echo '
							</div>

						';
				echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack));
				echo '
					</div>
				
				</p>
			</div>
			
			<div class="modal-footer">	
				<a href="#" class="modal-close waves-effect waves-green btn-flat">Zavřít</a>
			</div>
			
		</div>
';
			}
		}
		finally {
			$this->global->snippetDriver->leave();
		}
		
	}

}
