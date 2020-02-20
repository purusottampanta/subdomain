<?php 

namespace App\Repositories\Eloquent;

use Illuminate\Support\Str;
use Illuminate\Container\Container as App;
use Intervention\Image\ImageManager as Image;
use Illuminate\Database\Eloquent\ModelNotFoundException;

abstract class Repository 
{
	protected $homestay;
	protected $user;
	protected $model;
	protected $image;
	protected $per_page = 10;
	protected $current_page = 1;
	private   $app;

	function __construct(App $app, Image $image)
	{
		$this->app = $app;
		$this->image = $image;
		$this->makeModel();
		$this->user = auth()->user();
	}

	/**
	 * make model for repositories
	 * @return  mixed
	 */
	public function makeModel()
	{
		$model = $this->app->make($this->model());

		return $this->model = $model;
	}


	/**
	 * this method allows the user to select models for repository
	 * @return  mixed
	 */
	abstract public function model();

	/**
	 * This method fetch all the values from database table for colums
	 * @param  array  $columns columns of database table
	 * @return mixed          [description]
	 */
	public function all($columns = ['*'])
	{
		return $this->model->get($columns);
	}

	/**
	 * This method fetch all the values from database table for colums
	 * @param  array  $columns columns of database table
	 * @return mixed          [description]
	 */
	public function paginate($with = null, $per_page = 10, $columns = ['*'])
	{
		if($with){
			return $this->model->with($with)->latest()->paginate( $per_page, $columns);
		}
		return $this->model->latest()->paginate( $per_page, $columns);
	}

	/**
	 * this method finds model by id
	 * @param   $id      [description]
	 * @param  array  $columns columns of table to find
	 * @return mixed          [description]
	 */
	public function findById($id, $columns = ['*'])
	{
		return $this->model->find($id, $columns);
	}

	/**
	 * find the models by id and throw model not found excetion if 
	 * 	given id does not exists
	 * @param  integer $id      
	 * @param  array  $columns 
	 * @return mixed          
	 */
	public function requiredById($id, $columns = ['*'])
	{
		$model = $this->model->find($id, $columns);

		if(!$model) {
			throw new ModelNotFoundException("Model not found exception ", 404);
		}

		return $model;
	}

	/**
	 * find the model by slug
	 * @param  string $slug    
	 * @param  array  $columns 
	 * @return mixed          
	 */
	public function findBySlug($slug, $columns = ['*'])
	{
		return $this->model->where('slug', '=', $slug)->first($columns);
	}	

	/**
	 * find a model by slug and throw exception if the slug is not valid
	 * @param  string $slug    
	 * @param  array  $columns 
	 * @return mixed          
	 */
	public function requiredBySlug($slug, $columns = ['*'], $slugAttr= 'slug')
	{
		$model = $this->model->where($slugAttr, '=', $slug)->first($columns);

		if(!$model){
			throw new ModelNotFoundException("Model not found exception ", 404);
		}

		return $model;
	}

	public function findWithTrashed($id, $columns = ['*'])
    {
        return $this->model->withTrashed()->find($id, $columns);
    }

	/**
	 * update model by id
	 * @param  array  $data 
	 * @param  integer $id   
	 * @return mixed       
	 */
	public function update(array $data, $id)
	{
		$model = $this->requiredById($id);

		$model->update($data);

		return $model;
	}

	/**
	 * delete a model by its id
	 * @param  integer $id 
	 * @return mixed     
	 */
	public function delete($id)
	{
		$model = $this->requiredById($id);

		return $model->delete($id);
	}


	/**
	 * creates a new instance of model
	 * @param  array  $attributes [description]
	 * @return mixed             [description]
	 */
	public function getNew(array $attributes = [])
	{
		return $this->model->newInstance($attributes);
	}

	/**
	 * this method creates a model 
	 * @param  array  $data array of input data
	 * @return mixed       [description]
	 */
	public function create(array $data)
	{
		return $this->model->create($data);
	}

	/**
	 * this method finds model by id and columns
	 * @param  integer $id      
	 * @param  array  $columns 
	 * @return mixed          
	 */
	public function find($id, $columns = ['*'])
	{
		return $this->model->find($id, $columns);
	}

	/**
	 * this method finds model by given attributes and its value
	 * @param   $attribute 
	 * @param   $value     
	 * @param  array  $columns   
	 * @return mixed            
	 */
	public function findBy($attribute, $value, $columns = ['*'])
	{
		return $this->model->where($attribute, '=', $value)->first($columns);
	}

	/**
	 * this method finds model by given attributes and its value
	 * @param   $attribute 
	 * @param   $value     
	 * @param  array  $columns   
	 * @return mixed            
	 */
	public function findOrFailBy($attribute, $value, $columns = ['*'])
	{
		$model = $this->findBy($attribute, $value, $columns);

		if(!$model){
			throw new ModelNotFoundException("Model not found exception ", 404);
		}

		return $model;
	}


	/**
	 * this method updates the model by slug
	 * @param  string $slug 
	 * @param  array  $data 
	 * @return mixed       [description]
	 */
	public function updateBySlug($slug, array $data)
	{
		return $this->findBy('slug', $slug)->update($data);
	}

	public function getModel()
	{
		return $this->model;
	}

	public function getList($request, $id)
	{
		$ids = explode(',', $id);
        $models = $this->findWithTrashed($ids);

        if(count($ids) == 1){
            return [
                'id' => $models->first()->id,
                'text' => $models->first()->name,
            ];
        }

        return $models->transform(function($item){
            return [
                'id' => $item->id,
                'text' => $item->name,
            ];
        });
	}

	public function formatForLists($models, $for_template = false)
	{
		$items['total'] = $models->total();

		if($for_template){
			$items['items'] = $models->transform(function($item){
			    return [
			        'id' => $item->id,
			        'text' => $item->name,
			        'image' => getSmallThumbnail($item->image)
			    ];
			});
		}else{
			$items['items'] = $models->transform(function($item){
			    return [
			        'id' => $item->id,
			        'text' => $item->name
			    ];
			});
		}

		return $items;
	}

	/**
	 * this method uploads the photo and saves on the uploads/users/{$user->id}/ directory
	 * @param  mixed  $file     uploaded file
	 * @param  string  $path     
	 * @param    $oldFile  
	 * @param  integer $fit      size of image to be made
	 * @param  integer $smallFit 
	 * @return mixed            
	 */
	public function uploadPhoto($file, $path, $oldFile = null, $fit = 140, $fitWidth = 140, $smallFit = 64)
	{
		$data = [];
		$data['file_type'] = null;
		$uploadPath = public_path($path);
		$extension = $file->getClientOriginalExtension();
		$data['file_size'] = filesize($file) / 1000;  //kb
		$filename = time().Str::random(20). "." .$extension;
		$data['mime_type'] = $extension;
		$data['originalFileName'] = $file->getClientOriginalName();
	
		if(false == is_dir($uploadPath))
		{
			mkdir($uploadPath, 0777, true);
		}

		// resize photo into different ratio : don't need this code if we don't have to resize; and have to resize before moving
		// 
		
		if(getimagesize($file)){
			$data['file_type'] = 'image';
			$thumbnail = $fit;
			$profile= $smallFit;
			$this->image->make($file->getRealPath())->fit($fitWidth, $thumbnail,function ($constraint) {
					$constraint->aspectRatio();
				    $constraint->upsize();
				})->save("{$uploadPath}/thumbnail-{$filename}");
			$this->image->make($file->getRealPath())->fit($profile)->save("{$uploadPath}/thumbnail-small-{$filename}");
		}

		$file->move($uploadPath, $filename);
		$data['photo_path'] = "{$path}/{$filename}";

		if(file_exists($oldFile) && $oldFile){
			if(file_exists(getThumbnail($oldFile))){
				unlink(getThumbnail($oldFile));
			}
			if(file_exists(getSmallThumbnail($oldFile)))
			{
				unlink(getSmallThumbnail($oldFile));
			}
			unlink($oldFile);
		}

		return $data;
    }
    
	public function uploadFile($file, $path, $oldFile = null)
	{
		$data = [];
		$data['file_type'] = null;
		$uploadPath = public_path($path);
		$extension = $file->getClientOriginalExtension();
		$data['file_size'] = filesize($file) / 1000;  //kb
		$filename = time().Str::random(20). "." .$extension;
		$data['mime_type'] = $extension;
		$data['originalFileName'] = $file->getClientOriginalName();
	
		if(false == is_dir($uploadPath))
		{
			mkdir($uploadPath, 0777, true);
		}
		
		$file->move($uploadPath, $filename);
		$data['photo_path'] = "{$path}/{$filename}";

		if(file_exists($oldFile) && $oldFile){
			unlink($oldFile);
		}

		return $data;
	}

    /**
    * @param mixed $homestay
    * @return Repository
    */

    public function user($user_slug = null)
    {
    	$user = auth()->user();

    	if($user) return $user;

    	if($user_slug){
    		return \App\Models\User::where('slug', $user_slug)->first();
    	}
    } 
}