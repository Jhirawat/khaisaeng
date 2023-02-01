<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $product = Product::all();
        return view('home', compact('product'));
        // return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $request->validate([
        //     'name' => 'required',
        //     'description' => 'required',
        //     'price' => 'required',
        //     'image' => 'required',
        // ]);

        // $product = Product::create($request->all());

        // return $product;

        try {

            DB::beginTransaction();
            $table = new Product();
            $table->name =  $request->name;
            // $table->image =  $request->image;
            $table->price =  $request->price;
            $table->description =  $request->description;

            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $extention = $image->getClientOriginalExtension();
                $fileName  = time() . '.' . $extention;

                $location = 'images/' . $fileName;

                $img = Image::make($image);
                $img->resize(500, 500, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $img->save($location);

                $table->image =  $fileName;
            }
            // dd($request->all());
            $table->save();

            DB::commit();
            // Alert::success('บันทึกสำเร็จ');
            return redirect()->route('create')->with('success', 'เพิ่มสำเสร็จ');
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json([
                'successful' => False,
                'msg' => $th->getMessage()
            ]);
            return redirect()->back()->with('error', 'ไม่สำเร็จ');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = Product::find($id);
        return response()->json($data);
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
        $id = $request->id;

        $product = Product::find($id);
        //dd($product);
        $product->name = $request->name;
        $product->image = $request->image;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
    }

    public function search($name)
    {
        $products = Product::where([
            ['name', 'like', '%' . $name . '%']
        ])->get();

        return $products;
    }
}
