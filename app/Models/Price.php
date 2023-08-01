<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Price extends Model
    {
        use HasFactory;

        public $table = 'prices';

        public $fillable = [
            'id',
            'count_days',
            'standart_price',
            'promotional_price',
            'start_promotional_date',
            'end_promotional_date'

        ];

        /**
         * The attributes that should be casted to native types.
         *
         * @var array
         */
        protected $casts = [
            'id' => 'integer',
        ];

        /**
         * Validation rules
         *
         * @var array
         */
        public static $rules = [
            'id' => 'required',
            'count_days' => 'required',
            'standart_price' => 'required'
        ];

    }
