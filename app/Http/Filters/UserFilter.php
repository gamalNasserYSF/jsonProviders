<?php namespace App\Http\Filters;

class UserFilter extends QueryFilter
{
    public function statusCode(string $status)
    {
        switch ($status) {
            case "authorised":
                $value = [1, 100];
                break;

            case "decline":
                $value = [2, 200];
                break;

            case "refunded":
                $value = [3, 300];
                break;
        }

       $obj1 =  $this->builder->whereIn('status', $value);
       $obj2 =  $this->builder->whereIn('statusCode', $value);

       $this->builder = collect([$obj1, $obj2])->collapse();

    }

    public function balanceMax(int $balanceMax)
    {
        $this->builder = $this->builder->where('balance', '<=', $balanceMax)
                                        ->where('parentAmount', '<=', $balanceMax);
    }

    public function balanceMin(int $balanceMin)
    {
        $this->builder = $this->builder->where('balance', '>=', $balanceMin)
                                    ->where('parentAmount', '>=', $balanceMin);
    }

    public function currency(string $currency)
    {
        $obj1 = $this->builder->where('currency', $currency);
        $obj2 = $this->builder->where('Currency', $currency);

        $this->builder = collect([$obj1, $obj2])->collapse();
    }
}