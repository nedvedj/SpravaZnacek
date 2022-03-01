<?php

use Latte\Runtime as LR;

/** source: C:\Users\ZCU\source\repos\nedvedj\SpravaZnacek\app\Presenters/templates/Login/default.latte */
final class Templatef4f752c263 extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		['content' => 'blockContent'],
	];


	public function main(): array
	{
		extract($this->params);
		if ($this->getParentName()) {
			return get_defined_vars();
		}
		$this->renderBlock('content', get_defined_vars()) /* line 1 */;
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['key' => '5', 'val' => '5'], $this->params) as $ʟ_v => $ʟ_l) {
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
    
	Vítejte na přihlašovací stránce!
';
		$iterations = 0;
		foreach ($uzivatele as $key=>$val) /* line 5 */ {
			echo '		<br>Přihlaš uživatele <a href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("prihlas", [$key])) /* line 6 */;
			echo '"> ';
			echo LR\Filters::escapeHtmlText($val) /* line 6 */;
			echo '</a>
';
			$iterations++;
		}
		echo '
</div>
';
	}

}
