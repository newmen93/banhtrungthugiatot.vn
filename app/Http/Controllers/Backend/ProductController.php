<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ImageColor;
use App\Models\Size;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
use View;
use Illuminate\Support\Facades\URL;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('backend.v1.product.index', [
            'categories' => $categories,
        ]);
    }
    public function sync()
    {
        $client = new Client([
            'headers' => [
                'Retailer'      => 'phukiengiadung',
                'Authorization' => 'Bearer ' . Session::get('access_token')
            ]
        ]);
        $response = $client->get('https://public.kiotapi.com/products', [
            RequestOptions::JSON => [
                'pageSize' => 1000,
                'includeInventory'=>true
            ]
        ]);
        $data = $response->getBody();
        $products = json_decode($data)->data;
        foreach($products as $product) {
            $pro = Product::where('k_id', $product->id)->first();
            if(!$pro){
                $new = new Product();
                $new->k_id =$product->id;
                $new->code =$product->code;
                $new->name =$product->name;
                $new->full_name =$product->fullName;
                $new->category_id = $product->categoryId;
                $new->price_books =$product->basePrice;
                if (property_exists($product,'unit')) {
                    $new->unit =$product->unit;
                }
                if (property_exists($product,'inventories')) {
                    $new->total_quantity = $product->inventories[0]->onHand ?? 0;
                    $new->cost = $product->inventories[0]->cost ?? 0;
                }
                if (property_exists($product,'description')) {
                    $new->description =$product->description;
                }
                $new->save();
                if(property_exists($product,'images')){
                    foreach($product->images as $image) {
                        $img = new ImageColor();
                        $img->product_id = $product->id;
                        $img->image_path = $image;
                        $img->save();
                    }
                }
            } else {
                $pro->name =$product->name;
                $pro->full_name =$product->fullName;
                $pro->category_id = $product->categoryId;
                $pro->price_books =$product->basePrice;
                if (property_exists($product,'inventories')) {
                    $pro->total_quantity = $product->inventories[0]->onHand ?? 0;
                    $pro->cost = $product->inventories[0]->cost ?? 0; // gia von
                }
                if (property_exists($product,'unit')) {
                    $pro->unit =$product->unit;
                }
                $pro->save();
                // TODO: Don't need update image
            }
        }
        echo json_encode(1);die;
    }
    public function dataTable(Request $request)
    {
        $columns = [
            0 => "code",
            1 => "name",
            2 => "category",
            3 => "price",
            4 => "price",
            5 => "price",
            6 => "action"
        ];

        $totalData = Product::count();
        $limit     = intval($request->input('length'));
        $start     = intval($request->input('start'));
        $order     = $columns[$request->input('order.0.column')];//default order by column 0
        $dir       = $request->input('order.0.dir');

        if(empty($request->input('search.value'))){
            $post = Product::offset($start)
                ->take($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Product::count();
        }else{
            $search = $request->input('search.value');
            $post = Product::where('name', 'like', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            $totalFiltered = Product::where('name','like',"%{$search}%")->count();
        }
        $action = '<a href="'.url('admin/product/edit/{id}').'" data-id="{id}" class="btn btn-sm btn-primary btn-edit"><i class="fa fa-edit"></i> Sửa</a> <a href="#" data-id="{id}" class="btn btn-sm btn-danger btn-delete"><i class="fa fa-trash"></i> Xóa</a>';
        $data = array();
        if($post){
            foreach($post as $r){
                $nestedData['code']        = $r->code;
                $nestedData['name']        = $r->name;
                $nestedData['category']    = $r->category ? $r->category->name : 'Lỗi';
                $nestedData['price_base']       = $r->cost;
                $nestedData['price_si']       = $r->si_price;
                $nestedData['price_le']       = $r->price_books;
                $nestedData['action']      = str_replace('{id}', $r->id, $action);
                $data[]                    = $nestedData;
            }
        }
        $json_data = array(
            "raw"             => intval($request->input('raw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );

        echo json_encode($json_data);die;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.v1.product._add',['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         * save database
         */
        $input = $request->all();
        $prdReq = $input['product'] ?? [];
        $sizeReq = $input['sizes'] ?? [];
        $colorReq = $input['colors'] ?? [];


        $product = new Product();
        //$product->k_id = $data->data->id;
        $product->name = $prdReq['product_name'];
        $product->description = $prdReq['description'];
        $product->category_id = $prdReq['product_category'];
        $product->hashtag = $prdReq['hash_tag'];
        $product->unit = $prdReq['basic_unit'];

        $product->is_hot = $prdReq['is_hot'] ?? 0;
        $product->is_discount = $prdReq['is_discount'] ?? 0;
        $product->is_new = $prdReq['is_new'] ?? 0;
        $product->quantity_si = $prdReq['si_quantity'] ?? 0;
        $product->total_quantity = $prdReq['total_quantity'] ?? 0;
        $product->cost = $prdReq['cost'] ?? 0;

        $product->price_books = $sizeReq[0]['price_le'];
        $product->si_price = $sizeReq[0]['price_si'];
        $product->discount_price = $sizeReq[0]['price_disscount'];
        $product->save();

        //tao do dua sau hieu dc cho nay hoi thang nay ne
        foreach ($colorReq as $key => $item) {
            $imgColor = new ImageColor();
            $imgColor->color = $item['color_name'];
            $imgColor->product_id = $product->id;//product_k_id

            list($type, $item['image_src']) = explode(';', $item['image_src']);
            list(, $item['image_src'])      = explode(',', $item['image_src']);
            $data = base64_decode($item['image_src']);
            $png_url = "dhgr-" . time() . '-' . $key . ".png";
            $success = file_put_contents(public_path('images/' . $png_url), $data);
            $imgColor->image_path = URL::asset('images/' . $png_url);
            $imgColor->save();

            foreach ($sizeReq as $item) {
                if ($imgColor->color == $item['color']) {
                    $size = new Size();
                    $size->image_color_id = $imgColor->id;
                    $size->size = $item['size'];
                    $size->si_price = $item['price_si'];
                    $size->base_price = $item['price_le'];
                    $size->quantity = $item['remaining'];
                    $size->discount_price = $item['price_disscount'];
                    $size->save();
                }
            }
        }
        /**
         * call api kiot viet new Product
         */
        // $data = [
        //     'name' => $prdReq['product_name'],
        //     'categoryId'     => $prdReq['product_category'],
        //     'fullName'=> $prdReq['product_name'],
        //     'description'=> $prdReq['description'],
        //     'unit'=>$prdReq['basic_unit'],
        //     'inventories' => [
        //         [
        //             "branchId"=> 38930,
        //             "branchName"=>0,
        //             "onHand"=>$prdReq['total_quantity'],
        //             "cost"=>$prdReq['cost'],
        //             "reserved"=>0
        //         ]
        //     ]
        //     //TODO: list image hinh
        // ];
        // $client = new Client([
        //     'headers' => [
        //         'Retailer'      => 'phukiengiadung',
        //         'Authorization' => 'Bearer ' . Session::get('access_token')
        //     ]
        // ]);
        // $response = $client->post('https://public.kiotapi.com/products', [
        //     RequestOptions::JSON => $data
        // ]);
        // $data = json_decode($response->getBody());

        // $product->code = $data->code;
        // $product->k_id = $data->id;
        $product->save();
        $imagesColor = ImageColor::whereProductId($product->id);
        foreach($imagesColor->get() as $color) {
            $color->product_id = $product->k_id;
            $color->save();
        }
        echo json_encode(1); die;


        return response()->json(['status'=>200]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::whereId($id)->first();
        $categories = Category::all();
        return view('backend.v1.product._update', ['product' => $product,'categories' => $categories]);
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
        $input = $request->all();
        $prdReq = $input['product'] ?? [];
        $sizeReq = $input['sizes'] ?? [];
        $colorReq = $input['colors'] ?? [];
        $product = Product::find($id);

        $product->name = $prdReq['product_name'];
        $product->description = $prdReq['description'];
        $product->category_id = $prdReq['product_category'];
        $product->hashtag = $prdReq['hash_tag'];
        $product->unit = $prdReq['basic_unit'];

        $product->is_hot = $prdReq['is_hot'] ?? 0;
        $product->is_discount = $prdReq['is_discount'] ?? 0;
        $product->is_new = $prdReq['is_new'] ?? 0;
        $product->quantity_si = $prdReq['si_quantity'] ?? 0;

        $product->total_quantity = $prdReq['total_quantity'] ?? 0;
        $product->cost = $prdReq['cost'] ?? 0;

        $product->price_books = $sizeReq[0]['price_le'];
        $product->si_price = $sizeReq[0]['price_si'];
        $product->discount_price = $sizeReq[0]['price_disscount'];
        $product->save();
        ImageColor::whereProductId($product->k_id)
            ->each(function ($color, $key) {
                Size::whereImageColorId($color->id)->each(function ($size, $i) {
                    $size->delete();
                });
                $color->delete();
        });
        foreach ($colorReq as $key => $item) {
            $imgColor = new ImageColor();
            $imgColor->color = $item['color_name'];
            $imgColor->product_id = $product->k_id;

            if (strpos($item['image_src'], 'https://cdn-images.kiotviet.vn') === false
                && strpos($item['image_src'], 'https://dathangnhanhre.com') === false) {
                list($type, $item['image_src']) = explode(';', $item['image_src']);
                list(, $item['image_src']) = explode(',', $item['image_src']);

                $data = base64_decode($item['image_src']);
                $png_url = "dhgr-" . time() . '-' . $key . ".png";
                $success = file_put_contents(public_path('images/' . $png_url), $data);
                $imgColor->image_path = URL::asset('images/' . $png_url);

            } else {
                $imgColor->image_path = $item['image_src'];
            }

            $imgColor->save();

            foreach ($sizeReq as $item) {
                if ($imgColor->color == $item['color']) {
                    $size = new Size();
                    $size->image_color_id = $imgColor->id;
                    $size->size = $item['size'];
                    $size->si_price = $item['price_si'];
                    $size->base_price = $item['price_le'];
                    $size->quantity = $item['remaining'];
                    $size->discount_price = $item['price_disscount'];
                    $size->save();
                }
            }
        }
        /**
         * call api kiot viet new Product
         */
        // $data = [
        //     'name' => $prdReq['product_name'],
        //     'categoryId'     => $prdReq['product_category'],
        //     'fullName'=> $prdReq['product_name'],
        //     'description'=> $prdReq['description'],
        //     'unit'=>$prdReq['basic_unit'],
        //     'inventories' => [
        //         [
        //             "branchId"=> 38930,
        //             "branchName"=>0,
        //             "onHand"=>$prdReq['total_quantity'],
        //             "cost"=>$prdReq['cost'],
        //             "reserved"=>0
        //         ]
        //     ]
        //     //TODO: list image hinh
        // ];
        // $client = new Client([
        //     'headers' => [
        //         'Retailer'      => 'phukiengiadung',
        //         'Authorization' => 'Bearer ' . Session::get('access_token')
        //     ]
        // ]);
        // $response = $client->put('https://public.kiotapi.com/products/' . $product->k_id, [
        //     RequestOptions::JSON => $data
        // ]);
        //return back()->with('success', 'Lưu thành công!');
        return response()->json(['status'=>200]);
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
        $imageColors = $product->color;
        $imageColors->each(function ($color, $key) {
            $color->size->each(function ($size, $i) {
                $size->delete();
            });
            @unlink($color->image_path);
            $color->delete();
        });

        $kId = $product->k_id;
        $product->delete();
        /**
         * todo delte product call api kiotviet
         */
        // $client = new Client([
        //     'headers' => [
        //         'Retailer'      => 'phukiengiadung',
        //         'Authorization' => 'Bearer ' . Session::get('access_token')
        //     ]
        // ]);
        // $request = $client->delete('https://public.kiotapi.com/products/' . $kId);
        
        return response()->json(['status'=>200]);
    }
}
