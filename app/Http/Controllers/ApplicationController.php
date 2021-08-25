<?php

namespace App\Http\Controllers;
use App\Models\Receipt;
use App\Models\Statistics;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    protected $maxFields,$sumPrice,$name,$product,$user_id,$month,$id;

    protected array $products=[

        [
            "name"=>NULL,
            "product"=>NULL,
            "month"=>NULL,
            "price"=>NULL,
            "user_id"=>NULL

        ]

    ];
    /*protected array $categoriesTable=[

        [
            "name"=>NULL,
            "price"=>NULL,

        ]

    ];*/

    public function ShowResults(Request $request)
    {
        $width="200px";

        $categoriesTable=[

            [
                "name"=>NULL,
                "price"=>NULL,
    
            ]
    
        ];

        $this->month=$request->input('choose');

        $receipt=Receipt::get();

        if($request->has('confirm'))
        {
                $categories=Category::get();

                $i=0;

                foreach($categories as $c)
                {

                    $this->name=$c->name;

                    $receipt=Receipt::where(["name"=>$this->name,"month"=>$this->month,"user_id"=>Auth::id()])->get();    

                    $this->sumPrice=0;

                    foreach($receipt as $r)
                    {
                        $this->sumPrice+=$r->price;

                    }

                    $sum=$this->sumPrice;

                    $categoriesTable[$i]["name"]=$this->name;
                    $categoriesTable[$i]["price"]=$this->sumPrice;

                    $i++;

                }

                return view('index',compact('receipt','categoriesTable','width'));
        
        }

        return view('index',compact('receipt','categoriesTable','width'));

    }
    public function AddReceiptForms()
    {
        $res=0;
        $categories=Category::get();

        return view('AddReceipt',compact('res','categories'));

    }
    public function AddReceipt(Request $request)
    {
        $this->maxFields=$request->input('i');
        $this->name=$request->input('name');
        $this->month=$request->input('month_0');
        $categories=Category::get();

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

        return view('AddReceipt',compact('res','i','value','categories'));

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
        $categories=Category::get();

        return view('AddReceipt',compact('res','i','value','name_0','month_0','categories'));

    }
    public function showReceipt(Request $request)
    {
        $res=0;
        $receipt=Receipt::get();

        return view('updateReceipt',compact('receipt','res'));

    }
    public function getUpdateReceiptForm(Request $request)
    {
        $res=1;
        $receipt=Receipt::get();
        $id=$request->input('id_r');

        return view('updateReceipt',compact('receipt','res','id'));

    }
    public function UpdateReceipt(Request $request)
    {
        $this->id=$request->input('id');
        $this->sumPrice=$request->input('price');

        if($request->has('sub'))
        {

            $receipt=Receipt::where('id',$this->id)->update(["price"=>$this->sumPrice]);

            return redirect()->route('showReceipt');

        }
        else return redirect()->route('showReceipt');

    }
    public function DeleteReceipt(Request $request)
    {
        $this->id=$request->input('id_r');

        $receipt=Receipt::where('id',$this->id)->delete();

        return redirect()->route('showReceipt');

    }

}
