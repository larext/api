<?php

namespace LarExt\API\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|array
     */
    public function index(Request $request)
    {
        $start = $request->get('page', 1);
        $limit = $request->get('limit', 10);
        $products = Products::where('qty', '>', 0)->paginate($limit)->items();

        return [
            'success'=>true,
            'records'=>$products
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'price'=> 'required|integer',
            'qty' => 'required|integer'
        ]);
        $share = new Products([
            'name' => $request->get('name'),
            'price'=> $request->get('price'),
            'qty'=> $request->get('qty')
        ]);
        $share->save();
        return redirect('/products')->with('success', 'Stock has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|array
     */
    public function show($id)
    {
        $product = Products::find($id);

        return ['success'=>true, 'data'=>$product];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Products::find($id);

        return view('products.edit', compact('product'));
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
        $request->validate([
            'name'=>'required',
            'price'=> 'required|integer',
            'qty' => 'required|integer'
        ]);

        $product = Products::find($id);
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->qty = $request->get('qty');
        $product->save();

        return redirect('/products')->with('success', 'Stock has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $share = Products::find($id);
        $share->delete();

        return redirect('/products')->with('success', 'Stock has been deleted Successfully');
    }
}
