<?php

namespace App\Repositories;

use App\Models\Prices;
use App\Repositories\BaseRepository;

/**
 * Class PricesRepository
 * @package App\Repositories
 * @version July 23, 2023, 7:18 pm UTC
*/

class PricesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'count_days',
        'standart_price',
        'promotional_price',
        'start_promotional_date',
        'end_promotional_date'
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
        return Prices::class;
    }
}
