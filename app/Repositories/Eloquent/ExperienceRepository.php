<?php 

namespace App\Repositories\Eloquent;

/**
 * 
 */
class ExperienceRepository extends Repository
{

	public function model()
	{
		return 'App\Models\UserExperience';
	}

	public function experiences()
	{
		return $this->model;
	}

	public function store($request)
	{
        $experience->users()
            ->attach($user,
                [
                    'company_name' => $request->company_name,
                    'designation' => $request->designation,
                    'from' => $request->from,
                    'to' => $request->to? :null,
                    'experience' => $request->experience,
                ]);

        return $experience;
    }
}