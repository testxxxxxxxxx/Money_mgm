<?php

namespace App\Http\Controllers;
use App\Models\Receipt;
use App\Models\Statistics;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    protected $maxFields,$sumPrice,$name,$product,$user_id,$month;

    protected array $products=[

        [
            "name"=>NULL,
            "product"=>NULL,
            "month"=>NULL,
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
        $this->name=$request->input('name');
        $this->month=$request->input('month_0');

        for($i=0;$i<(int)$this->maxFields+1;$i++)
        {
            $this->products[$i]["name"]=$this->name;
            $this->products[$i]["product"]=$request->input('product'.$i);
            $this->products[$i]["month"]=$this->month;
            $this->products[$i]["price"]=$request->input('price'.$i);

        }

        $i=0;
        $this->sumPrice=0;

        foreach($this->products as $p)
        {
            $this->sumPrice+=(int)$this->products[$i]["price"];

            $i++;

        }

        $this->user_id=Auth::id();

        if($request->has('confirm'))
        {
            $this->month=$request->input('month_0');

            $receipts=Receipt::create([

                    "name"=>$this->name,
                    "products"=>"",
                    "month"=>$this->month,
                    "price"=>$this->sumPrice,
                    "user_id"=>$this->user_id

            ]);

        }

        $res=0;
        $i=$this->maxFields+1;
        $value=0;

        return view('AddReceipt',compact('res','i','value'));

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

        $value=$request->input('value');
        $name_0=$request->input('name');
        $month_0=$request->input('month');

        return view('AddReceipt',compact('res','i','value','name_0','month_0'));

    }

}
