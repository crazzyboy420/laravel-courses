<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    function platform(){
        return $this->belongsTo(platform::class);
    }
    function level(){
        return $this->belongsTo(Level::class);
    }
    function submittedBy(){
        return $this->belongsTo(User::class,'submitted_by','id');
    }

    function topics(){
        return $this->belongsToMany(Topic::class,'course_topics','course_id','topic_id');
    }

    function authors(){
        return $this->belongsToMany(Author::class,'course_authors','course_id','author_id');
    }

    function series(){
        return $this->belongsToMany(Series::class,'course_series','course_id','series_id');
    }


    function getDuration($val){
        if ($val==0){
            return '1-5 hours';
        }elseif ($val==1){
            return '5-10 hours';
        }else{
            return '10+ hours';
        }
    }


}

