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
        $inputs=$request->except(['pp_photo','citizenship_back','citizenship_front','resume']);
        if($request->hasFile('pp_photo'))
        {
            $file = $request->file('pp_photo');
			$data = $this->uploadPhoto($file, "uploads/usersDetails/{$user->id}", NULL, 100, 90);
            $inputs['pp_photo'] = $data['photo_path'];
        }

        if($request->hasFile('citizenship_front'))
        {
            $file = $request->file('citizenship_front');
			$data = $this->uploadPhoto($file, "uploads/usersDetails/{$user->id}", NULL, 100, 90);
            $inputs['citizenship_front'] = $data['photo_path'];
        }

        if($request->hasFile('citizenship_back'))
        {
            $file = $request->file('citizenship_back');
			$data = $this->uploadPhoto($file, "uploads/usersDetails/{$user->id}", NULL, 100, 90);
            $inputs['citizenship_back'] = $data['photo_path'];
        }

        if($request->hasFile('resume'))
        {
            $file = $request->file('resume');
			$data = $this->uploadFile($file, "uploads/usersDetails/{$user->id}", NULL);
            $inputs['resume'] = $data['photo_path'];
        }
        
        $user->document()
            ->create($inputs);

        return $user->document;
    }
}