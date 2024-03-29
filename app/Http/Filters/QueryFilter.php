<?php

namespace App\Http\Filters;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

abstract class QueryFilter
{
    /**
     * @var Request
     */
    public $request;


    /**
     * @var Collection
     */
    protected $builder;


    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }


    /**
     * @param Collection $builder
     */
    public function apply(Collection $builder)
    {
        $this->builder = $builder;

        foreach ($this->fields() as $field => $value) {
            $method = camel_case($field);

            if (method_exists($this, $method)) {

                call_user_func_array([$this, $method], (array)$value);
            }
        }

        return $this->builder;
    }


    /**
     * @return array
     */
    protected function fields(): array
    {
        return array_filter(
            array_map('trim', $this->request->all())
        );
    }
}