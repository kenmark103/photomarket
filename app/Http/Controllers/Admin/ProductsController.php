<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Categories;
use App\Models\ProductImage;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use Illuminate\Support\Collection;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Products::all();

         return view('admin.classes.products.list', [
             'products' =>$products
         ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories=categories::all();
        return view('admin.classes.products.create',['categories'=>$categories]);
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
        $data = $request->except('_token', '_method');
        $data['slug'] = str_slug($request->input('name'));

        if ($request->hasFile('cover') && $request->file('cover') instanceof UploadedFile) {
            $data['cover'] = $request->file('cover')->store('galleries', ['disk' => 'public']);
        }
        $this->createProduct($data);

        return redirect()->route('admin.products.index');

      }
      public function createProduct(array $params) : Products
      {
        try {
            $product = new Products($params);
            $product->save();

            if (isset($params['image']) && is_array($params['image'])) {
                $this->saveImages($params, $product);
            }

            return $product;
        } catch (QueryException $e) {
            throw new ProductInvalidArgumentException($e->getMessage());
        }
      }

      private function saveImages(array $params, Products $product): void
      {
        collect($params['image'])->each(function (UploadedFile $file) use ($product) {
            $filename = $file->store('galleries', ['disk' => 'public']);
            $image = new ProductImage(['src' => $filename]);
            $product->images()->save($image);
        });
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
        $images=ProductImage::all()->where('products_id',$id);
        $product=Products::find($id);
        //dd($images);

        return view('admin.classes.products.show',[
        'product'=>$product,
        'images'=>$images
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
        //
        $product=Products::find($id);
        return view('admin.classes.products.edit',[
          'product'=>$product,
          'images' => $product->images()->get(['src']),
        ]);
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
        //
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
        $product=Products::find($id);
        $product->delete();
        request()->session()->flash('message', 'Delete successful');
        return redirect()->route('admin.products.index');
    }
    public function removeImage(Request $request)
   {
       $this->productRepo->deleteFile($request->only('product', 'image'), 'uploads');
       request()->session()->flash('message', 'Image delete successful');
       return redirect()->back();
   }

}
