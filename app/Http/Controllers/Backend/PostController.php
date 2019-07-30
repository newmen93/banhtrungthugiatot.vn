<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.v1.post.index');
    }
    public function dataTable(Request $request)
    {
        $columns = [
            0 => "title",
            1 => "title",
            2 => "title",
            3 => "action",
        ];

        $totalData = Post::count();
        $limit = intval($request->input('length'));
        $start = intval($request->input('start'));
        $order = $columns[$request->input('order.0.column')]; //default order by column 0
        $dir = $request->input('order.0.dir');

        if (empty($request->input('search.value'))) {
            $post = Post::offset($start)
                ->take($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Post::count();
        } else {
            $search = $request->input('search.value');
            $post = Post::where('name', 'like', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Post::where('name', 'like', "%{$search}%")->count();
        }
        $action = '<a href="#" data-id="{id}" class="btn btn-sm btn-primary btn-edit"><i class="fa fa-edit"></i> Sửa</a> <a href="#" data-id="{id}" class="btn btn-sm btn-danger btn-delete"><i class="fa fa-trash"></i> Xóa</a>';
        $data = array();
        if ($post) {
            foreach ($post as $r) {
                $nestedData['title'] = $r->title;
                $nestedData['title'] = $r->title;
                $nestedData['title'] = $r->title;
                $nestedData['action'] = str_replace('{id}', $r->id, $action);
                $nestedData["DT_RowId"] = $r->id;
                $nestedData["DT_RowClass"] = "Kiot" . $r->id;
                $data[] = $nestedData;
            }
        }
        $json_data = array(
            "raw" => intval($request->input('raw')),
            "recordsTotal" => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data" => $data,
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
            'categories' => $categories,
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
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->feature_image = $request->input('feature_image');
        $post->save();
        return response()->json(['status' => 200, 'post' => $post]);
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
        return response()->json(['status' => 200, 'categories' => $categories, 'category' => $category]);
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
        $category->name = $request->name;
        $category->parent_id = $request->parent;
        $category->priority = $request->priority;
        $category->save();

        $categories = Category::whereParentId(0)->get();
        return response()->json(['status' => 200, 'categories' => $categories]);
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

        if ($category->products->count() > 0) {
            return response()->json(['status' => 403, 'msg' => 'Dữ liệu đang được sử dụng']);
        }
        if ($category->children->count() > 0) {
            return response()->json(['status' => 403, 'msg' => 'Dữ liệu đang được sử dụng']);
        }
        $category->delete();
        return response()->json(['status' => 200, 'msg' => 'Xóa thành công']);
    }
}
