<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Services extends Model
    {
        use HasFactory;

        protected $table = 'services';

        protected $fillable = [
            'id',
            'service_title',
            'image',
            'service_content'
        ];

        protected $appends = ['image_url'];

        public function getImageUrlAttribute()
        {
            return asset('storage/' . $this->image);
        }
    }
