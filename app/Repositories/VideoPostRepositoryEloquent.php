<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\video_postRepository;
use App\Entities\VideoPost;
use App\Validators\VideoPostValidator;

/**
 * Class VideoPostRepositoryEloquent
 * @package namespace App\Repositories;
 */
class VideoPostRepositoryEloquent extends BaseRepository implements VideoPostRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return VideoPost::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
