<?php

namespace App\Http\Controllers;
use App\Models\Receipt;
use App\Models\Statistics;

use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    protected $maxFields,$sumPrice,$name,$product;

    protected array $products=[

        [
            "id"=>NULL,
            "product"=>NULL,
            "price"=>NULL

        ]

    ];

    public function ShowResults()
    {
        $receipt=Receipt::find(1);

        return $receipt;

    }
    public function AddReceipt(Request $request)
    {
        $this->maxFields=$request->input('number');

        for($i=0;$i<$this->maxFields;$i++)
        {
            $this->products[$i]["name"]=$request->input('name'+$i);
            $this->products[$i]["product"]=$request->input('product'+$i);
            $this->products[$i]["price"]=$request->input('price'+$i);

        }

        $i=0;

        foreach($this->products as $p)
        {
            $this->sumPrice+=$this->products[$i]["price"];

            $i++;

        }

        if($request->has('confirm'))
        {
            $receipts=Receipt::create([

                    "name"=>$this->name,
                    "products"=>$this->product,
                    "price"=>$this->sumPrice

            ]);

        }

        return view('index');

    }

}
