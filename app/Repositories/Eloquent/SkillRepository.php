<?php 

namespace App\Repositories\Eloquent;

/**
 * 
 */
class SkillRepository extends Repository
{

	public function model()
	{
		return 'App\Models\UserSkill';
	}

	public function skills()
	{
		return $this->model;
	}

	public function store($request, $user)
	{
        $user->skills()
            ->create(
                [
					'user_id' =>$user->id,
                    'skill' => $request->skill,
                ]);

        return $user->skill;
    }
}