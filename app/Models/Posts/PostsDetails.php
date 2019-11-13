<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 2019. 11. 13.
 * Time: 12:33
 */
namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Model;


class PostsDetails extends Model
{
    //

    protected $table;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table ='post_details';
    }

    protected $fillable = [
        'id',
        'post_id',
        'post_body'
    ];

}