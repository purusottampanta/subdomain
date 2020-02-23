<?php 

namespace App\Repositories\Eloquent;

/**
 * 
 */
class PortfolioRepository extends Repository
{

	public function model()
	{
		return 'App\Models\UserPortfolio';
	}

	public function portfolios()
	{
		return $this->model;
	}

	public function store($request, $user)
	{
        $user->portfolios()
            ->create(
                [
					'user_id' => $user->id,
                    'project_name' => $request->project_name,
                    'project_type' => $request->project_type,
                    'project_url' => $request->project_url,
                ]);

        return $user->portfolio;
    }
}