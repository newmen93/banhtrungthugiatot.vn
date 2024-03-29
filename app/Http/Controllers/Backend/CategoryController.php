<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Freshbitsweb\Laratables\Laratables;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::whereParentId(0)->get();
        return view('backend.v1.category.index',[
            'categories' => $categories
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
        $response = $client->get('https://public.kiotapi.com/categories', [
            RequestOptions::JSON => [
                'pageSize' => 1000
            ]
        ]);
        $data = $response->getBody();
        $categories = json_decode($data)->data;

        foreach ($categories as $category) {
            $cate = Category::where('k_id', $category->categoryId)->first();
            if(!$cate){
                $new = new Category();
                $new->name =$category->categoryName;
                $new->k_id = $category->categoryId;
                if(isset($category->parentId)){
                    $new->parent_id = $category->parentId;
                }
                $new->save();
            }
        }
        echo json_encode(1);
    }
    public function dataTable(Request $request)
    {
        $columns = [
            0 => "name",
            1 => "parent",
            2 => "priority",
            3 => "action"
        ];

        $totalData = Category::count();
        $limit     = intval($request->input('length'));
        $start     = intval($request->input('start'));
        $order     = $columns[$request->input('order.0.column')];//default order by column 0
        $dir       = $request->input('order.0.dir');

        if(empty($request->input('search.value'))){
            $post = Category::offset($start)
                ->take($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Category::count();
        }else{
            $search = $request->input('search.value');
            $post = Category::where('name', 'like', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            $totalFiltered = Category::where('name','like',"%{$search}%")->count();
        }
        $action = '<a href="#" data-id="{id}" class="btn btn-sm btn-primary btn-edit"><i class="fa fa-edit"></i> Sửa</a> <a href="#" data-id="{id}" class="btn btn-sm btn-danger btn-delete"><i class="fa fa-trash"></i> Xóa</a>';
        $data = array();
        if($post){
            foreach($post as $r){
                $nestedData['name']        = $r->name;
                $nestedData['parent']      = $r->parent ? $r->parent->name : "------------";
                $nestedData['priority']    = $r->priority;
                $nestedData['action']      = str_replace('{id}', $r->id, $action);
                $nestedData["DT_RowId"]    = $r->id;
                $nestedData["DT_RowClass"] = "Kiot".$r->id;
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
        $categories = Category::whereParentId(0)->get();
        return view('backend.v1.category.create', [
            'categories' => $categories
        ]);
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
         * call kiot api new category
         */
        // $data = [
        //     'categoryName' => $request->name
        // ];
        // if($request->parent) {
        //     array_push($data,['parentId'=>$request->parent]);
        // }
        // $client = new Client([
        //     'headers' => [
        //         'Retailer'      => 'phukiengiadung',
        //         'Authorization' => 'Bearer ' . Session::get('access_token')
        //     ]
        // ]);
        // $response = $client->post('https://public.kiotapi.com/categories', [
        //     RequestOptions::JSON => $data
        // ]);
        // $data = json_decode($response->getBody());
        $category            = new Category();
        $category->name      = $request->name;
        // $category->k_id      = $data->data->categoryId;
        $category->parent_id = $request->parent;
        $category->priority  = $request->priority;
        $category->save();

        $categories = Category::whereParentId(0)->get();
        return response()->json(['status'=>200, 'categories' => $categories]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('backend.v1.category.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::whereParentId(0)->get();
        $category = Category::find($id);
        return response()->json(['status' => 200,'categories'=>$categories,'category'=>$category]);
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
        $category = Category::find($id);
        /**
         * todo call api update category
         */
        // $data = [
        //     'categoryName' => $request->name,
        //     'parentId'     => $request->parent
        // ];
        // $client = new Client([
        //     'headers' => [
        //         'Retailer'      => 'phukiengiadung',
        //         'Authorization' => 'Bearer ' . Session::get('access_token')
        //     ]
        // ]);
        // $response = $client->put('https://public.kiotapi.com/categories/' . $category->k_id, [
        //     RequestOptions::JSON => $data
        // ]);

        $category->name = $request->name;
        $category->parent_id =$request->parent;
        $category->priority = $request->priority;
        $category->save();

        $categories = Category::whereParentId(0)->get();
        return response()->json(['status'=>200, 'categories' => $categories]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        if($category->products->count() > 0) {
            return response()->json(['status'=> 403,'msg'=>'Dữ liệu đang được sử dụng']);
        }
        if($category->children->count() > 0){
            return response()->json(['status'=> 403,'msg'=>'Dữ liệu đang được sử dụng']);
        }
        /**
         * todo: call api kio delte category
         */
        // if (!$category->k_id) {
        //     $client = new Client([
        //         'headers' => [
        //             'Retailer'      => 'phukiengiadung',
        //             'Authorization' => 'Bearer ' . Session::get('access_token')
        //         ]
        //     ]);
        //     $request = $client->delete('https://public.kiotapi.com/categories/' . $category->k_id);
        // }
        $category->delete();
        return response()->json(['status'=> 200,'msg'=>'Xóa thành công']);
    }
}
