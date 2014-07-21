<?php namespace Wegnermedia\Presenter;

trait PresentableTrait {

	/**
	 * undocumented class variable
	 *
	 * @var string
	 **/
	protected $presenterInstance;

	/**
	 * Return the Entity
	 *
	 * @return object
	 **/
	public function present()
	{
		// Check for Existing Presenter
		// and try to autoresolve
		if ( ! $this->presenter )
		{
			// No Presenter is set on the Model ...
			// so try to set to a default Value
			$this->presenter = get_class($this) . 'Presenter';
		}

		// Just a quick check for existance
		if ( ! class_exists($this->presenter) )
		{
			throw new PresenterException("Presenter [{$this->presenter}] not Found", $this->presenter);
		}

		// Singleton ... (on the current Object)
		if ( ! $this->$presenterInstance )
		{
			$this->$presenterInstance = new $this->presenter($this);
		}

		return $this->$presenterInstance;
	}

}