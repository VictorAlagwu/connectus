<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 3/5/18
 * Time: 9:47 PM
 */

namespace App\Filters;


use Illuminate\Http\Request;

abstract class Filters
{

    protected $request;
    protected $builder;
    protected $filters = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply($builder)
    {
        $this->builder = $builder;

        foreach ($this->getFilters() as $filter => $value){
            if (method_exists($this, $filter)) {
                $this->$filter($value);
            }
        }
        return $this->builder;
    }
    protected function getFilters()
    {
        return $this->request->only($this->filters);
    }
}