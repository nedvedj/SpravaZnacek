<?php

use Latte\Runtime as LR;

/** source: C:\Users\ZCU\source\repos\nedvedj\SpravaZnacek\app\Presenters/templates/@layout.latte */
final class Template97faf891af extends Latte\Runtime\Template
{
	protected const BLOCKS = [
		['scripts' => 'blockScripts'],
	];


	public function main(): array
	{
		extract($this->params);
		echo '<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">

	<title>';
		if ($this->hasBlock("title")) /* line 7 */ {
			$this->renderBlock('title', [], function ($s, $type) {
				$ʟ_fi = new LR\FilterInfo($type);
				return LR\Filters::convertTo($ʟ_fi, 'html', $this->filters->filterContent('striphtml', $ʟ_fi, $s));
			}) /* line 7 */;
			echo ' | ';
		}
		echo 'Administrace značek</title>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 10 */;
		echo '/assets/materialize/css/materialize.css">
	<link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 11 */;
		echo '/css/styl.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>

<body>
';
		$iterations = 0;
		foreach ($flashes as $flash) /* line 17 */ {
			echo '	<div class="msg">
		<div class="card-stacked">
			<div class="card-content">
			<p>';
			echo LR\Filters::escapeHtmlText($flash->message) /* line 20 */;
			echo ' </p>
			</div>
			<div class="card-action">
			<a id="skryjFlash" href="#">Zavřít</a>
			</div>
		</div>
	</div>
';
			$iterations++;
		}
		echo '

	<div class="row">
		<div class="section header valign-wrapper">
			<div class="col s1">
				<a href="#" data-target="slide-out" id="menu" class="sidenav-trigger left"><i class="material-icons">menu</i></a>
			</div>
			<div class="col s9">
';
		if ($uzivatel!='') /* line 40 */ {
			echo '				<a class="odhlas" href="';
			echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Login:odhlas")) /* line 40 */;
			echo '">Odhlásit(';
			echo LR\Filters::escapeHtmlText($uzivatel) /* line 40 */;
			echo ')</a>
';
		}
		echo '			</div>
		</div>
	</div>

	<ul id="slide-out" class="sidenav">
		<li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:pridej")) /* line 46 */;
		echo '">Nová značka <i class="material-icons right">home</i></a></li>
		<li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default")) /* line 47 */;
		echo '">Značky  <i class="material-icons right">collections_bookmark</i></a></li>
		<li><a href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:moje")) /* line 48 */;
		echo '">Moje značky<i class="material-icons right">cloud</i></a></li>
	</ul>
	




	<div class="row flex">

      	<div id="nav" class="col l2 hide-on-med-and-down">
			<ul>
				<li><a class="waves-effect waves-light btn ';
		echo LR\Filters::escapeHtmlAttr($presenter->isLinkCurrent('Homepage:pridej') ? 'active' : null) /* line 59 */;
		echo '" href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:pridej")) /* line 59 */;
		echo '"><span class="hide-on-med-and-down">Nová značka </span> <i class="material-icons right">home</i></a></li>
				<li><a class="waves-effect waves-light btn ';
		echo LR\Filters::escapeHtmlAttr($presenter->isLinkCurrent('Homepage:default') ? 'active' : null) /* line 60 */;
		echo '" href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default")) /* line 60 */;
		echo '"><span class="hide-on-med-and-down">Značky</span>  <i class="material-icons right">collections_bookmark</i></a></li>
				<li><a class="waves-effect waves-light btn" href="';
		echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:moje")) /* line 61 */;
		echo '"><span class="hide-on-med-and-down">Moje značky </span> <i class="material-icons right">cloud</i></a></li>

			</ul> 
      	</div>

      	<div class="col l10 m12 s12">
			<div class="content">
				<div class="progress">
					<div class="indeterminate"></div>
					
				</div>
';
		$this->renderBlock('content', [], 'html') /* line 72 */;
		echo '			</div>
		</div>
	</div>
	
';
		if ($this->getParentName()) {
			return get_defined_vars();
		}
		$this->renderBlock('scripts', get_defined_vars()) /* line 77 */;
		echo '
</body>
</html>
';
		return get_defined_vars();
	}


	public function prepare(): void
	{
		extract($this->params);
		if (!$this->getReferringTemplate() || $this->getReferenceType() === "extends") {
			foreach (array_intersect_key(['flash' => '17'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	/** {block scripts} on line 77 */
	public function blockScripts(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);
		echo '	<script type="text/javascript" src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 78 */;
		echo '/assets/jquery-3.6.0.js"></script>
	<script src="https://nette.github.io/resources/js/3/netteForms.min.js"></script>
	<script type="text/javascript" src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 80 */;
		echo '/assets/materialize/js/materialize.min.js"></script>
	
	<script type="text/javascript" src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 82 */;
		echo '/assets/nette.ajax.js"></script>

	<script>



$(document).ready(function(){
	$.nette.init();
	$(\'ul.tabs\').tabs();
	$(\'select\').formSelect();
	$(\'.sidenav\').sidenav();

	$.nette.ext("modals", {
        success: function(payload) {
            if (payload.redirect) {
               // $(".modal").modal("hide");
            } else if(payload.isModal) {  
				$(\'.modal\').modal({
					dismissible:false
				}); 
				$(\'.modal\').modal("open");
				$(".progress").hide();
            }
        }
    });

	$( ".btn" ).click(function() {
		$(".progress").show();
	});

	$( "#skryjFlash" ).click(function() {
		$( ".msg" ).hide();
	});

	if($(window).width() <= 993) $(\'#menu\').show();
    else $(\'#menu\').hide();

	$(window).resize(function() {
        if($(window).width() <= 993) {
            $(\'#menu\').show();
        } else {
            // if smaller
            $(\'#menu\').hide();
        }
	});

});

	</script>
';
	}

}
