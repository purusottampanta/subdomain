<?php 

namespace App\Repositories\Eloquent;

/**
 * 
 */
class DetailRepository extends Repository
{

	public function model()
	{
		return 'App\Models\UserDetail';
	}

	public function details()
	{
		return $this->model;
	}

	public function store($request)
	{
        $detail->users()
            ->attach($user,
                [
                    'father_name' => $request->father_name? :null,
                    'mother_name' => $request->mother_name? :null,
                    'grandfather_name' => $request->grandfather_name? :null,
                    'spouse_name' => $request->spouse_name? :null,
                    'permanent_address' => $request->permanent_address,
                    'temporary_address' => $request->temporary_address? :null,
                    'dob'  => $request->dob? :null,
                    'citizenship_no' => $request->citizenship_no? :null,
                    'citizenship_issue_district' => $request->citizenship_issue_district? :null,
                    'citizenship_issue_date' => $request->citizenship_issue_date? :null,
                    'pan_no' => $request->pan_no? :null,
                ]);

        return $detail;
    }
}