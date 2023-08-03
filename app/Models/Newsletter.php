<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Newsletter extends Model
    {
        use HasFactory;

        protected $table = 'newsletter';

        protected $fillable = [
            'id',
            'title',
            'subtitle',
            'approval_rodo',
            'approval_title',
            'approval_subtitle'
        ];
    }
