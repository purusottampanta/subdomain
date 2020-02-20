<?php

namespace App\Presenters;

class UserPresenter extends Presenter{
    public function profilePicture()
	{
		$value = $this->entity->profile_picture;
		return asset($value ? getSmallThumbnail($value) : 'dashboard/images/user.png');
    }
    
    public function thumbnail()
	{
		$value = $this->entity->profile_picture;
		return asset($value ? getThumbnail($value) : 'dashboard/images/user.png');
	}


}