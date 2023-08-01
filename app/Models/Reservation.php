<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Reservation extends Model
    {
        use HasFactory;

        protected $table = 'reservation_date';

        public $fillable = [
            'id',
            'new_date'
        ];

        // Accessor to convert the custom date format to the database format when retrieving from the database
        public function getCustomDateAttribute($value)
        {
            return date('d/m/Y', strtotime($value));
        }

        //Mutator to convert the custom date format to the database format before storing in the database
        public function setCustomDateAttribute($value)
        {
            $this->attributes['custom_date'] = date('Y-m-d', strtotime($value));
        }
    }
