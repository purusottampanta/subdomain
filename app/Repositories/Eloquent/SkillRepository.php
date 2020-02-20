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

	public function store($request)
	{
        $skill->users()
            ->attach($user,
                [
                    'skill' => $request->skill,
                ]);

        return $skill;
    }
}