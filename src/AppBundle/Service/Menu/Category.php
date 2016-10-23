<?php
namespace AppBundle\Service\Menu;

/**
 * @author Igor Vorobiov<igor.vorobioff@gmail.com>
 */
class Category
{
	/**
	 * @return array
	 */
	public function getItems()
	{
		return [
			['path' => 'women', 'label' => 'Women'],
			['path' => 'men', 'label' => 'Men'],
			['path' => 'sport', 'label' => 'Sport'],
		];
	}
}