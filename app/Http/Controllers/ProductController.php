<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    protected $request;
    private $repository;

    public function __construct(Request $request, Product $product)
    {
        //dd($request->prm1);
        $this->$request = $request;
        $this->repository = $product;
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
        $data = $request->only('name', 'description', 'price');

        if($request->hasFile('foto') && $request->file('foto')->isValid()){
            $image_path = ($request->file('foto')->store('products'));
            $data['image'] = $image_path;
        }

        $this->repository->create($data);

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
        $products =  $this->repository->find($id);
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
        $product =  $this->repository->find($id);
        if(!$product){
            return redirect()->back();
        }

        return view("admin.pages.products.edit", [
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProductRequest $request, $id)
    {
        $product =  $this->repository->find($id);
        if(!$product){
            return redirect()->back();
        }

        $data = $request->only('name', 'description', 'price');

        if($request->hasFile('foto') && $request->file('foto')->isValid()){

            if($product->image && Storage::exists($product->image)){
                Storage::delete($product->image);
            }

            $image_path = ($request->file('foto')->store('products'));
            $data['image'] = $image_path;
        }

        $product->update($data);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product =  $this->repository->find($id);
        if(!$product){
            return redirect()->back();
        }

        if($product->image && Storage::exists($product->image)){
            Storage::delete($product->image);
        }

        $product->delete();
        return redirect()->route('products.index');
    }

    public function search (Request $request){

        $filters = $request->except('_token');

        $products = $this->repository->search($request->filter);

        return view('admin.pages.products.index',[
            'products' => $products,
            'filters' => $filters
        ]);

    }
}
