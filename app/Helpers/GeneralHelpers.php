<?php

if (! function_exists('authUser')) {
	function authUser()
	{
		return auth()->user();
	}
}

if (! function_exists('getUserTypes')) {
	function getUserTypes()
	{
		return [
			'default' 			=> 'Default',
			'system' 			=> 'System',
			'organization'			=> 'Organization'
		];
	}
}

if (! function_exists('getUserStatus')) {
	function getUserStatus()
	{
		return [
			'pending' 			=> 'Pending',
			'verified' 			=> 'Verified',
			'unverified'			=> 'Unverified'
		];
	}
}

if(! function_exists('getThumbnail')){
	function getThumbnail($photoPath)
	{
		$name = explode('/', $photoPath);
		array_push($name, 'thumbnail-' . array_pop($name));
		$new_path = implode('/', $name);

		if(file_exists($new_path)) return $new_path;
		return $photoPath;
	}
}

if(! function_exists('getSmallThumbnail')){
	function getSmallThumbnail($photoPath)
	{
		$name = explode('/', $photoPath);
		array_push($name, 'thumbnail-small-' . array_pop($name));
		$new_path = implode('/', $name);

		if(file_exists($new_path)) return $new_path;
		return $photoPath;
	}
}

if (! function_exists('unlinkFiles')) {
	function unlinkFiles($path){
		if(file_exists($path) && $path){
			if(file_exists(getThumbnail($path))){
				unlink(getThumbnail($path));
			}
			if(file_exists(getSmallThumbnail($path)))
			{
				unlink(getSmallThumbnail($path));
			}
			unlink($path);
		}
	}
}

if(! function_exists('setActive')){
	function setActive($route, $class = 'active'){
		$current_route = Route::getCurrentRoute() ? Route::getCurrentRoute()->getName() : null;
		if($current_route){
			if(is_array($route)){
				if(in_array($current_route, $route)){
					return $class;
				}

				return '';
			}else{
				if($current_route == $route){
					return $class;
				}

				return '';
			}
		}
		return '';
	}
}