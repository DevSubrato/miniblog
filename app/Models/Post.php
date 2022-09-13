<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table ='posts';
    protected $guarded = ['created_at','updated_at'];

        protected $dates = [
            'published_at',
        ];
    
        public function user()
        {
            return $this->belongsTo('App\Models\User');
        }
    
        public function category()
        {
            return $this->belongsTo('App\Models\Category');
        }
    
        public function tags()
        {
            return $this->belongsToMany('App\Models\Tag');
        }
        public function comments()
        {
            return $this->hasMany(Comment::class)->whereNull('comment_id');
        }

        public function scopeApproved($query)
        {
           $query->where('is_approved',1);
        }
        public function scopePublished($query)
        {
           $query->where('status',1);
        }



}
