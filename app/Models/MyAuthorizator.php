<?php

declare(strict_types=1);

namespace App\Models;
use Nette;

class MyAuthorizator implements Nette\Security\Authorizator
{
	public function isAllowed($role, $resource, $operation): bool
	{
		
		if ($role === 'editor' && $resource === 'file' && $operation=== 'delete') {
			return true;
		}

		// ...

		return false;
	}
}