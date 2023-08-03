<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Subscribe extends Model
    {
        use HasFactory, SoftDeletes;

        protected $table = 'subscribes';

        protected $fillable = [
            'id',
            'title',
            'subtitle',
            'approval_rodo',
            'approval_title',
            'approval_subtitle'
        ];
    }
