<?php

namespace App\Traits;

use App\Exceptions\PresenterException;

trait PresentableTrait {


	protected $presenterInstance;

	/**
	 * this method presents the model
	 * @return mixed 
	 */
	public function present()
	{

		if(! $this->presenter or ! class_exists($this->presenter)){

			throw new PresenterException('Please set the $protected property to your presenter path.', 404);
		
		}

		if(! $this->presenterInstance){

		$this->presenterInstance = new $this->presenter($this);

		}

		return $this->presenterInstance;
	
	}

}