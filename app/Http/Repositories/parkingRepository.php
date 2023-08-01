<?php

namespace App\Repositories;

use App\Models\Parking;
use App\Repositories\BaseRepository;

/**
 * Class ParkingRepository
 * @package App\Repositories
 * @version July 20, 2023, 8:26 pm UTC
*/

class ParkingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'dispatch_date'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Parking::class;
    }
}
