<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {
        //dd($request->prm1);
        $this->$request = $request;

        //$this->middleware("auth")->only(['create','storage']);
        //$this->middleware("auth")->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        //$products = Product::all();
        $products = Product::paginate(20);

        return view('admin.pages.products.index',[
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request\StoreUpdateProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductRequest $request)
    {
        //validação
        /*$request->validate([
            'name' => 'required|min:3|max:100',
            'descricao' => 'nullable|min:5|max:1000',
            'foto' => 'required|image'
        ]);*/

        //dd("OK");
        /*dd($request->name);
        dd($request->all());
        dd($request->input('name'));
        dd($request->except('_token'));*/
        /*if($request->file('foto')->isValid()){
            dd($request->file('foto')->store('products'));
        }*/
        $data = $request->only('name', 'description', 'price');

        Product::create($data);

        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$products = Product::where('id', $id)->first();
        $products = Product::find($id);
        if(!$products){
            return redirect()->back();
        }
        return view('admin.pages.products.show',[
            'product' => $products
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("admin.pages.products.edit", compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        dd('editando produto:', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
