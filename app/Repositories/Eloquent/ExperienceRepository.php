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

	public function store($request, $user)
	{
        $user->experiences()
            ->create(
                [
                    'user_id' =>$user->id,
                    'company_name' => $request->company_name,
                    'designation' => $request->designation,
                    'from' => $request->from,
                    'to' => $request->to? :null,
                    // 'experience' => $request->experience,
                ]);

        return $user->experience;
    }
}