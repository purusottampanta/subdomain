<?php 

namespace App\Repositories\Eloquent;

/**
 * 
 */
class DocumentRepository extends Repository
{

	public function model()
	{
		return 'App\Models\UserDocument';
	}

	public function documents()
	{
		return $this->model;
	}

	public function store($request, $user = null)
	{
        if(!$user){
            $user = authUser();
        }

        if($request->hasFile('pp_photo'))
        {
            $file = $request->file('pp_photo');
			$data = $this->uploadPhoto($file, "uploads/usersDetails/{$user->id}", NULL, 100, 90);
            $request['pp_photo'] = $data['photo_path'];
        }

        if($request->hasFile('citizenship_front'))
        {
            $file = $request->file('citizenship_front');
			$data = $this->uploadPhoto($file, "uploads/usersDetails/{$user->id}", NULL, 100, 90);
            $request['citizenship_front'] = $data['citizenship_front'];
        }

        if($request->hasFile('citizenship_back'))
        {
            $file = $request->file('citizenship_back');
			$data = $this->uploadPhoto($file, "uploads/usersDetails/{$user->id}", NULL, 100, 90);
            $request['citizenship_back'] = $data['citizenship_back'];
        }

        if($request->hasFile('resume'))
        {
            $file = $request->file('resume');
			$data = $this->uploadFile($file, "uploads/usersDetails/{$user->id}", NULL);
            $request['resume'] = $data['resume'];
        }
        
        $documnet->users()
            ->attach($user,
                [
                    'pp_photo'            => $request->pp_photo,
                    'citizenship_front'   => $request->citizenship_front,
                    'citizenship_back'    => $request->citizenship_back,
                    'resume'              => $request->resume,
                ]);

        return $education;
    }
}