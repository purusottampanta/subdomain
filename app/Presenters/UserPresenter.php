<?php

namespace App\Presenters;

class UserPresenter extends Presenter{
    public function profilePicture()
	{
		$value = $this->entity->profile_picture;
		return asset($value ? getSmallThumbnail($value) : 'lte/dist/img/avatar6.png');
    }
    
    public function thumbnail()
	{
		$value = $this->entity->profile_picture;
		return asset($value ? getThumbnail($value) : 'lte/dist/img/avatar6.png');
	}


}