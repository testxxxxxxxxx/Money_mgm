<?php

namespace App\Http\Controllers;
use App\Models\Receipt;
use App\Models\Statistics;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    protected $maxFields,$sumPrice,$name,$product,$user_id;

    protected array $products=[

        [
            "name"=>NULL,
            "product"=>NULL,
            "price"=>NULL,
            "user_id"=>NULL

        ]

    ];

    public function ShowResults()
    {
        $receipt=Receipt::find(1);

        return $receipt;

    }
    public function AddReceiptForms()
    {
        $res=0;

        return view('AddReceipt',compact('res'));

    }
    public function AddReceipt(Request $request)
    {
        $this->maxFields=$request->input('i');

        for($i=0;$i<$this->maxFields;$i++)
        {
            $this->products[$this->maxFields]["name"]=$this->name;
            $this->products[$this->maxFields]["product"]=$request->input('product'+$this->maxFields);
            $this->products[$this->maxFields]["price"]=$request->input('price')+$this->maxFields;

        }

        $i=0;

        foreach($this->products as $p)
        {
            $this->sumPrice+=$this->products[$i]["price"];

            $i++;

        }

        $this->user_id=Auth::id();

        if($request->has('confirm'))
        {
            $receipts=Receipt::create([

                    "name"=>$this->name,
                    "products"=>$this->product,
                    "price"=>$this->sumPrice,
                    "user_id"=>$this->user_id

            ]);

        }

        $res=1;
        $i=$this->maxFields+1;

        //return view('AddReceipt',compact('res','i'));

        return var_dump($this->products);
    }
    public function saveReceipt()
    {
        $this->user_id=Auth::id();

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
                    "price"=>$this->sumPrice,
                    "user_id"=>$this->user_id

            ]);

        }

    }
    public function getReceiptForm(Request $request)
    {
        $res=1;
        $i=0;

        $this->name=$request->input('name');
        $value=$request->input('value');

        return view('AddReceipt',compact('res','i','value'));

    }

}
