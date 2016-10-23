<?php
namespace AppBundle\Service\Menu;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class Checkout
{
	public function getItems()
	{
		return [
			['path' => 'cart', 'label' => 'Cart (3)'],
			['path' => 'checkout', 'label' => 'Checkout'],
		];
	}
}