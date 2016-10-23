<?php
namespace AppBundle\Service\Menu;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class Customer
{
	public function getItems()
	{
		return [
			['path' => 'account', 'label' => 'John Doe'],
			['path' => 'logout', 'label' => 'Logout'],
		];
	}
}