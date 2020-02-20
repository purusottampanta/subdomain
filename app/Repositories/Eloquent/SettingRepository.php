<?php 

namespace App\Repositories\Eloquent;

use App\Models\Setting;

/**
 * 
 */
class SettingRepository extends Repository
{

	public function model()
	{
		return 'App\Models\Setting';
	}

	public function settings()
	{
		return $this->model;
	}
	public function renew($request, $id)
	{
		$setting = $this->requiredById($id);

		if(!in_array($setting->key, Setting::DEFAULT_KEYS)){
			$setting->key = $request->key;
		}

		$setting->value = $request->value;
		$setting->save();

		return $setting;
	}
}