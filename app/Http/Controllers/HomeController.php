<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\UserStore;

class HomeController extends Controller
{
    public function homePage()
    {
        return view("home");
    }

    public function store(Request $request)
    {
        if($request->hasFile('file')){
            $image = $request->file('file');
            $filename = $image->getClientOriginalName();
           $image->storeAs('public/upload/tmp/' .$filename);

           $store = new UserStore();
           $store->name = $request->name;
           $store->amount = $request->amount;
           $store->description = $request->description;
           $store->file = $filename;
           $store->save();
   
           return response()->json(['success'=>true, 'message'=>'Data Store successfully']);
        }
  }


      /**
     * Display the specified resource.
     */
    public function show()
    {
        $products = UserStore::all();

    return View('productPage',compact('products'));
    }

        /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $data = UserStore::find($id);

        return View('edit',compact('data'));
    }

        /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $filename = '';
           if($request->hasFile('file')){
            $image = $request->file('file');
            $filename = $image->getClientOriginalName();
            $image->storeAs('/public/upload/tmp/'.$filename);
           }

           $data = UserStore::find($id);
           $data->name = $request->name;
           $data->amount = $request->amount;
           $data->description = $request->description;
           $data->file = $filename;
           $data->update();
           return response()->json(['success'=>true, 'message'=>'Data Update Successfully']);

    }

    public function ProductPreview(Request $request, $id)
    {
        $data = UserStore::find($id);

        return View('product-preview',compact('data'));
    }
}
