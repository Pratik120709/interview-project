<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\UserStore;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function addBlogPage()
    {
        return view("blog.add-blog");
    }

    public function store(Request $request)
    {
        // check validation
        $validator = Validator::make($request->all(), [

            'description' => 'required',
            'title' => 'required',
            'file' => 'required',
        ],[
            'title.required'=> 'Blog title is required',
            'description.required'=> 'Please add blog description',
            'file.required'=> 'Image is required',
        ]);
    
        // If validation fails, return errors
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        if($request->hasFile('file')){
            $image = $request->file('file');
            $filename = $image->getClientOriginalName();
           $image->storeAs('public/upload/tmp/' .$filename);

           $store = new UserStore();
           $store->title = $request->title;
           $store->description = $request->description;
           $store->file = $filename;
           $store->save();
        
           return response()->json(['success'=>true, 'message'=>'Data Store successfully']);
        }
        return response()->json(['error'=>$validator->errors()]);
    }
  


      /**
     * Display the specified resource.
     */
    public function show()
    {
        // $getUserData=Auth::user();
        $products = UserStore::paginate(3);
        // $products['userData'] = User::find($getUserData->id);

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
                // check validation
                $validator = Validator::make($request->all(), [

                    'description' => 'required',
                    'title' => 'required',
                    'file' => 'required',
                ],[
                    'title.required'=> 'Blog title is required',
                    'description.required'=> 'Please add blog description',
                    'file.required'=> 'Image is required',
                ]);
               if(!$request->file)
               {
                $data = UserStore::find($id);
                $filename = $data['file'];
               }
           if($request->hasFile('file')){
            $image = $request->file('file');
            $filename = $image->getClientOriginalName();
            $image->storeAs('/public/upload/tmp/'.$filename);
           }

           $data = UserStore::find($id);
           $data->title = $request->title;
           $data->description = $request->description;
           $data->file = $filename;
           $data->update();
           return response()->json(['success'=>true, 'message'=>'Data Update Successfully']);
        
    
        return response()->json(['success'=>true, 'message'=>'Data not updated']);
    }

    public function ProductPreview(Request $request, $id)
    {
        $data = UserStore::find($id);

        return View('product-preview',compact('data'));
    }

    public function deleteBlog($id)
    {
        $blogData = UserStore::find($id);

        $blogData->delete();
        return redirect()->route('show');
       
    }

    public function userRollList()
    {   
        $data = User::whereNotIn('id', [1])->paginate(10);
        return View('blog.user-roll',compact('data'));
       
    }
    /**
     * Summary of userRollList
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function addUserRoll(Request $request, $id)
    {  
        $store = User::find($id);
        $store->roll_title = $request->roll_title;
        $store->delete_roll = isset($request->delete_roll) && $request->delete_roll == 'on' ? 'Active' : 'Inactive';
        $store->edit_roll = isset($request->edit_roll) && $request->edit_roll == 'on' ? 'Active' : 'Inactive';
        $store->save();
        return redirect()->route('user.roll.list');
    }


    /**
     * edit user
     */
    public function editUser($id)
    {
        $data = User::find($id);

        return View('blog.edit-user',compact('data'));
    }


    /**
     * Update user
     */
    public function updateUser(Request $request, $id)
    {

                // check validation
                $request->validate([

                    'firstname' => 'required',
                    'username' => 'required',
                
                ]);

           $data = User::find($id);
           $data->firstname = $request->firstname;
           $data->username = $request->username;
           $data->roll_title = $request->roll_title;
           $data->delete_roll = isset($request->delete_roll) && $request->delete_roll == 'on' ? 'Active' : 'Inactive';
           $data->edit_roll = isset($request->edit_roll) && $request->edit_roll == 'on' ? 'Active' : 'Inactive';
           $data->update();
           return response()->json(['success'=>true, 'message'=>'User Update Successfully']);
        
    
        return response()->json(['success'=>true, 'message'=>'Data not updated']);
    }

    public function deleteUser($id)
    {
        $userData = User::find($id);

        $userData->delete();
        return redirect()->route('user.roll.list');
       
    }


    /**
     * Search blog
     */
    public function searchBlog(Request $request)
    {
        $searchData = $request->input('title');
        $products = UserStore::where('title', 'LIKE', "%{$searchData}%")
                                ->orWhere('description', 'LIKE', "%{$searchData}%")
                            ->paginate(20);
        return View('productPage',compact('products'));
    }
}
