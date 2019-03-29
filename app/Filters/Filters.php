<?php
/**
 * Created by PhpStorm.
 * User: asif_
 * Date: 3/29/2019
 * Time: 12:02 AM
 */

namespace App\Filters;


use Illuminate\Http\Request;

abstract class Filters
{
    protected $request, $builder;

    protected $filters = [];

    /**
     * ThreadFilters constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply($builder)
    {
        $this->builder = $builder;

        foreach ($this->getFilters() as $filter => $value){
            if (method_exists($this, $filter)){
                $this->$filter($value);
            }

        }
        return $this->builder;

    }

    /**
     * @return mixed
     */
    public function getFilters()
    {
        return $this->request->only($this->filters); //there has been used intersect instead of only. Intersect doesn't work.
    }
}