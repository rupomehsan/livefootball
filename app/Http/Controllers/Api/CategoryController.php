<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{

    public function store(Request $request)
    {
//        dd($request->all());
        try {
            $validate = Validator::make(request()->all(), [
                "name" => 'required',
            ]);

//            dd($validate->errors()->messages());

            if ($validate->fails()) {
                $errors = $validate->errors()->messages();
                return validateError($errors);
            }
            $item = new Category();
            $item->name = $request->name;
            $item->image = $request->image;
            if ($item->save()) {
                return response([
                    'status' => 'success',
                    'message' => "Category Successfully Create",
                ], 200);
            }
        } catch (Exception$e) {
            return response([
                'status' => 'server_error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function getAll(){
        $getAllCat = Category::withCount(['quotes'])->get();

        if($getAllCat){
            return response([
                'status' => 'success',
                'data' => $getAllCat,
            ], 200);
        }
    }

    public function show($id){
        $getBlog = Category::where('id',$id)->get();
        return response([
            "status" => "success",
            "data" => $getBlog
        ]);
//        return view('admin.blog.edit',compact('getBlog'));

    }

    public function update(Request $request ,$id){
//        dd($request->all());
        try {
            $validate = Validator::make(request()->all(), [
                "name" => 'required',
            ]);
            if ($validate->fails()) {
                $errors = $validate->errors()->messages();
                return validateError($errors);
            }
            $item = Category::where('id',$id)->first();
            $item->name = $request->name ?? $item->name;
            $item->image = $request->image ??  $item->image;
            if ($item->save()) {
                return response([
                    'status' => 'success',
                    'message' => "Category Successfully Update",
                ], 200);
            }
        } catch (Exception$e) {
            return response([
                'status' => 'server_error',
                'message' => $e->getMessage(),
            ], 500);
        }

    }

    public function manageApproval(Request $request)
    {

            $target         = Category::where('id', $request->id)->first();
            $target->status = $request->status;
            if ($target->update()) {
                return response([
                    'status' => 'success',
                    'message' => "Successfully Update",
                ], 200);
            }



    }

    public function statusControl(Request $request)
    {
//        dd(request()->all());
        try {
                if ($request->status === 'enable') {
                    $target = $request->id;
                    if ($target) {
                        foreach ($target as $data) {
                            $target2 = Category::where('id', $data)->first();
                            $target2->status = 'active';
                            $target2->update();
                        }
                        return response(['success' => true], 200);
                    }
                } else if ($request->status === 'disable') {
                    $target = $request->id;
                    if ($target) {
                        foreach ($target as $data) {
                            $target2 = Category::where('id', $data)->first();
                            $target2->status = 'inactive';
                            $target2->update();
                        }
                        return response(['success' => true], 200);

                    }

                } else if ($request->status === 'delete') {
                    $target = $request->id;
                    if ($target) {
                        foreach ($target as $data) {
                            $target2 = Category::where('id', $data)->delete();
                        }
                        return response(['success' => true], 200);

                    }

                } else {
                    return response([
                        'status' => 'error',
                        'message' => 'Status Did Not Match',
                    ], 500);

                }



        } catch (\Exception$e) {
            return response([
                'status'  => 'server_error',
                'message' => $e->getMessage(),
            ], 500);
        }

    }


    public function fileUploader(Request $request)
    {
//        dd($request->all());
        $validate = Validator::make(request()->only('file'), [
            'file' => 'required|max:10240',
        ]);
        if ($validate->fails()) {
            return response([
                'status' => 'validation_error',
                'data'   => $validate->errors(),
            ], 422);
        }
        try {
            if (request()->has('file')) {
                $folder    = $request->folder ?? 'all';
                $image     = $request->file('file');
                $imageName = $folder . "/" . time() . '.' . $image->getClientOriginalName();
                if (config('app.env') === 'production') {
                    $image->move('uploads/' . $folder, $imageName);
                } else {
                    $image->move(public_path('/uploads/' . $folder), $imageName);
                }
                $protocol = request()->secure() ? 'https://' : 'http://';

                return response([
                    'status'  => 'success',
                    'message' => 'File uploaded successfully',
                    'data'    => $protocol . $_SERVER['HTTP_HOST'] . '/uploads/' . $imageName,
                ], 200);
            }
        } catch (\Exception$e) {
            return response([
                'status'  => 'server_error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function searchBlog(Request $request){

//        dd($request->searchdata);

        $searchData = Category::where('status', 'active');
        //begin filtering
        $searchText = $request->searchdata;
//        dd($searchText);
        if (!empty($searchText)) {
            $searchData->where(function ($query) use ($searchText) {
                $query->where('name', 'LIKE', '%' . $searchText . '%');
            });
        }
        //end filtering
        $searchData = $searchData->get();
        return response([
            'status' => 'success',
            'data' => $searchData,
        ], 200);
    }


    public function destroy($id){
        $deleteBlog = Category::where('id',$id)->delete();
        if($deleteBlog){
            return response([
                'status' => 'success',
                'message' => "Category Successfully Delete",
            ], 200);
        }
    }
}
