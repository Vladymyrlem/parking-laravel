<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Video extends Model
    {
        use HasFactory, SoftDeletes;

        protected $table = 'video_info'; // Replace 'information' with the correct table name
        public $fillable = [
            'id',
            'description',
            'video'
        ];
    }
