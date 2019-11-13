<?php
/**
 * Created by PhpStorm.
 * User: Mark
 * Date: 2019. 11. 13.
 * Time: 12:33
 */
namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Model;
use App\Models\Posts\Traits\Relationship\PostRelationship;


class Posts extends Model
{
    //
    use PostRelationship;

    protected $table;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table ='posts';
    }

    protected $fillable = [
        'id',
        'title',
        'active'
    ];

}