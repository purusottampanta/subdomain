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

	public function store($request)
	{
        $education->users()
            ->attach($user,
                [
                    'education' => $request->education,
                    'from'  => $request->from,
                    'to'    => $request->to? :null,
                ]);

        return $education;
    }
}