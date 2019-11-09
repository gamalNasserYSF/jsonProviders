<?php
namespace App\Models;

use App\Http\Filters\QueryFilter;
use File;
use Illuminate\Support\Collection;

class User extends \Illuminate\Database\Eloquent\Model
{

    const AuthorisedStatus  = [1, 100];
    const DeclineStatus     = [2, 200];
    const RefundedStatus    = [3, 300];

    protected $builder;

    /**
     * read data from all providers
     * @return static
     */
    public function getAll()
    {
        $jsonData = [];

        foreach (glob(storage_path()."/providers/*") as $filename){
            $file = file_get_contents($filename);

            $jsonData[] =  json_decode($file, true)['users'];
        }

        return collect($jsonData)->collapse();
    }

    /**
     * @param $provider
     * @return Collection
     */
    public function getOneProvider($provider)
    {
        $filename = storage_path()."/providers/".$provider.".json";

        $file = file_get_contents($filename);

        $jsonData[] = json_decode($file, true)['users'];

        return collect($jsonData[0]);
    }

    /**
     * @param Collection $builder
     * @param QueryFilter $filter
     */
    public function filter(QueryFilter $filter)
    {
        $builder = $this->getAll();

        if ( isset($filter->request->provider )){
            $builder = $this->getOneProvider($filter->request->provider);
        }

        $this->builder = $filter->apply($builder);

        return $this;
    }

    /**
     * get json data
     * @return mixed
     */
    public function get()
    {
        return $this->builder;
    }
}