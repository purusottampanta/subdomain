<?php 

namespace App\Repositories\Eloquent;

use Illuminate\Support\Facades\Hash;

/**
 * 
 */
class UserRepository extends Repository
{

	public function model()
	{
		return 'App\Models\User';
	}

	public function users()
	{
		return $this->model;
	}

	public function store($request)
	{
		$user = $this->getNew();
		if ($request->first_name && $request->last_name) {
			$user->name = $request->first_name . ' ' . $request->last_name;
		} else {
			$user->name = $request->name;
		}
		// $user->name = $request->first_name . ' ' . $request->last_name;
		$user->email = $request->email;
		$user->phone = $request->phone;
		$user->type = $request->type;

		$user->password = bcrypt($request->password);
		$user->email_verified_at = now();
		$user->phone_verified_at = now();
		$user->created_by = $request->created_by;
		$user->save();

		if($request->has('roles')){
			$user->roles()->sync($request->roles);
		}

		return $user;
	}

	public function renew($user, $request)
	{
		if ($request->first_name && $request->last_name) {
			$user->name = $request->first_name . ' ' . $request->last_name;
		} else {
			$user->name = $request->name;
		}
		

		if($request->hasFile('profile_picture')){
			$file = $this->uploadPhoto($request->file('profile_picture'), "uploads/users/{$user->id}/profile");
			$user->profile_picture = $file['photo_path'];
		}

		if ($request->password) {
			$user->password = Hash::make($request->password);
		}

		$user->type = $request->type;

		$user->save();

		if($request->has('roles')){
			$user->roles()->sync($request->roles);
		}
		
		return $user;
	}
	public function passwordChange($user, $request)
	{
		if ($request->password) {
			$user->password = Hash::make($request->password);
		}
		$user->save();
		return $user;
	}
	public function archives()
	{
		return $this->users()->onlyTrashed()->paginate(12);
	}

	public function restore($id)
	{
		return $this->findWithTrashed($id)->restore();
	}

	public function getLists($request)
	{
		$users = $this->users()
			->when($request->q, function($query, $q){
				return $query->where('name', 'like', "%{$q}%");
			})
			->when($request->type, function($query, $type){
				return $query->where('type', $type);
			})
			->paginate(20);

		$items['total'] = $users->total();

		$items['items'] = $users->transform(function($item){
		    return [
		        'id' => $item->id,
		        'text' => $item->name
		    ];
		});

		return $items;
	}

	public function getList($request, $id)
	{
		$ids = explode(',', $id);
        $models = $this->findWithTrashed($ids);

        if(count($ids) == 1){
            return [
                'id' => $models->first()->id,
                'text' => $models->first()->name,
                'email' => $models->first()->email,
                'phone' => $models->first()->phone,
            ];
        }

        return $models->transform(function($item){
            return [
                'id' => $item->id,
                'text' => $item->name,
            ];
        });
	}
}