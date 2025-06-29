<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'video_url',
        'chapter_id',
        'subject_id',
        'level_id',
    ];

    public function chapter() { return $this->belongsTo(Chapter::class); }
    public function subject() { return $this->belongsTo(Subject::class); }
    public function level() { return $this->belongsTo(Level::class); }
}

