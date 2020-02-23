<?php 

namespace App\Repositories\Eloquent;

/**
 * 
 */
class EducationRepository extends Repository
{

	public function model()
	{
		return 'App\Models\UserEducation';
	}

	public function educations()
	{
		return $this->model;
	}

	public function store($request ,$user)
	{
        $user->educations()
            ->create(
                [
					'user_id' =>$user->id,
                    'education' => $request->education,
                    'from'  => $request->from,
                    'to'    => $request->to? $request->to :null,
                ]);

        return $user->education;
    }
}