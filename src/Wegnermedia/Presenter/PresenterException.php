<?php namespace Wegnermedia\Presenter;

/**
* Presenter Exception
*/
class PresenterException extends \Exception
{

	public $presenter;

	function __construct($message, $presenter)
	{
		$this->presenter = $presenter;

		parent::__construct($message);
	}
}