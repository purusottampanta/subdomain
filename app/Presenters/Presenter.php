<?php

namespace App\Presenters;


abstract class Presenter {

	/**
	 * 			
	 * @var 
	 */
	protected $entity;


	/**
	 * 
	 * @param $entity 
	 */
	function __construct($entity)
	{
		$this->entity = $entity;
	}


	/**
	 * check if the method exists
	 * @param   $property 
	 * @return mixed           
	 */
	public function __get($property)
	{
		
		if(method_exists($this, $property))
		{

			return $this->{$property}();
		
		}

		return $this->entity->{$property};

	}

}