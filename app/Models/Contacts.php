<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Contacts extends Model
    {
        use HasFactory;

        public $table = 'contacts';
        public $fillable = [
            'id', 'contacts_title', 'email', 'address', 'phone_number_1', 'phone_number_2',
            'latitude', 'longitude', 'map_link'
        ];
    }
