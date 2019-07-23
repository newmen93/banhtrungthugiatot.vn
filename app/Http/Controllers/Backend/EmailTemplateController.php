<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmailTemplate;

class EmailTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.v1.email-template.index');
    }
    public function dataTable(Request $request)
    {
        $columns = [
            0 => "name",
            1 => "created_at",
            2 => "action"
        ];
        $totalData = EmailTemplate::count();
        $limit     = intval($request->input('length'));
        $start     = intval($request->input('start'));
        $order     = $columns[$request->input('order.0.column')];//default order by column 0
        $dir       = $request->input('order.0.dir');

        if(empty($request->input('search.value'))){
            $post = EmailTemplate::offset($start)
                ->take($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = EmailTemplate::count();
        }else{
            $search = $request->input('search.value');
            $post = EmailTemplate::where('name', 'like', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            $totalFiltered = EmailTemplate::where('name','like',"%{$search}%")->count();
        }
        $x = [
            "title"   => "hello",
            "data-id" => "123"
        ];
        $action = '<a href="#" class="btn btn-sm btn-primary btn-edit"><i class="fa fa-edit"></i> Sửa</a> <a href="#" class="btn btn-sm btn-danger btn-delete"><i class="fa fa-trash"></i> Xóa</a>';
        $data = array();
        if($post){
            foreach($post as $r){
                $nestedData['name']          = $r->name;
                $nestedData['created_at']    = $r->created_at;
                $nestedData['action']        = $action;
                $nestedData["DT_RowId"]      = $r->id;
                $data[]                      = $nestedData;
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
        return view('backend.v1.email-template.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
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
        $email = EmailTemplate::find($id);
        $email->delete();
        return back()->with('message','Xóa thành công templte');
    }
}
