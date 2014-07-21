<?php namespace Wegnermedia\Presenter;

/**
* Abstract Presenter Class
*/
abstract class Presenter
{
	/**
	 * Instance of the Entitx
	 *
	 * @var object
	 **/
	protected $entity;


	/**
	 * Assign Entity to the Current Presenter
	 *
	 * @return void
	 **/
	function __construct($entity)
	{
		$this->entity = $entity;
	}

	/**
	 * Magic Property getter
	 *
	 * @return mixed
	 **/
	public function __get($property)
	{
		// If there is a defined Presenter
		// Method, call it, if not, stick
		// to the entities default property
		if ( method_exists($this, $property) )
		{
			return $this->{$property}();
		}

		return $this->entity->{$property};
	}

}