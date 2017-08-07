<?php

namespace App\Http\Controllers\Seller;

use App\Seller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class SellerTransactionController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Seller $seller)
    {
        $transactions = $seller->products()
            ->whereHas('transactions') // all those products have transactions
            ->with('transactions') // eager load those transactions
            ->get() //get them
            ->pluck('transactions') //pluck only transactions from that json
            ->collapse() //collapse all the other collection
            ;

        return $this->showAll($transactions);
    }
}
