<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    /**
     * Class Parking
     * @package App\Models
     * @version July 20, 2023, 8:26 pm UTC
     *
     * @property integer $id
     * @property string $dispatch_date
     */
    class Parking extends Model
    {
        use SoftDeletes;

        use HasFactory;

        public $table = 'parking';


        protected $dates = ['deleted_at'];


        public $fillable = [
            'id',
            'start_date',
            'arrival',
            'departure',
            'number_days',
            'price',
            'number_peoples',
            'client_name',
            'client_surname',
            'phone_number',
            'email',
            'car_number',
            'car_mark',
            'car_model',
        ];

        /**
         * The attributes that should be casted to native types.
         *
         * @var array
         */
        protected $casts = [
            'id' => 'integer',
            'start_date' => 'date'
        ];

        /**
         * Validation rules
         *
         * @var array
         */
        public static $rules = [
            'id' => 'required',
            'dispatch_date' => 'required'
        ];


    }
