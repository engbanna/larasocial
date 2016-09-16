<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\image_postRepository;
use App\Entities\ImagePost;
use App\Validators\ImagePostValidator;

/**
 * Class ImagePostRepositoryEloquent
 * @package namespace App\Repositories;
 */
class ImagePostRepositoryEloquent extends BaseRepository implements ImagePostRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ImagePost::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function save(){
        /*$person = new Post($request->except('photo'));
        $person -> user_id = \Auth::id();

        $file = $request->file('photo');
        $destinationPath = 'uploads/';
        $extension = $file->getClientOriginalExtension();
        $fileName = \Auth::user()->id . '_' . time() . '.' . $extension;
        $file->move($destinationPath, $fileName);
        $person -> image = '/'.$destinationPath.$fileName;

        $person->save();

        return redirect()->action('PersonController@show', ['id' => $person->id]);*/

    }
}
