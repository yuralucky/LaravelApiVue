<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany as HasManyAlias;

class Comment extends Model
{

    protected $fillable = ['body', 'comment_id'];

    public $timestamps = false;

    /**
     * @return HasManyAlias
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * @return HasManyAlias
     */
    public function childrenComments()
    {
        return $this->hasMany(Comment::class)->with('comments');
    }

    /**
     * @return HasManyAlias
     */
    public function getChildren()
    {
        return $this->hasMany(Comment::class, 'comment_id');
    }

    /**
     * @return HasManyAlias
     */
    public function children()
    {
        return $this->getChildren()->with('children');
    }
}
