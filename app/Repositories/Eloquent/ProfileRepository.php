<?php 

namespace App\Repositories\Eloquent;

/**
 * 
 */
class ProfileRepository extends Repository
{

	public function model()
	{
		return 'App\Models\UserProfile';
	}

	public function profiles()
	{
		return $this->model;
	}

	public function store($request)
	{
        $profile->users()
            ->attach($user,
                [
                    'profession' => $request->profession,
                    'current_company' => $request->current_company,
                    'expected_salary' => $request->expected_salary,
                    'description' => $request->expected_salary,
                ]);

        return $profile;
    }
}