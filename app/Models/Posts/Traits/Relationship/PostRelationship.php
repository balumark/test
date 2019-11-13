<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 2019. 11. 13.
 * Time: 13:26
 */
namespace App\Models\Posts\Traits\Relationship;

use App\Models\System\Session;
use App\Models\Posts\PostsDetails;

trait PostRelationship
{
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    public function detail(){
        return $this->hasOne(PostsDetails::class, 'post_id', 'id');
    }
}