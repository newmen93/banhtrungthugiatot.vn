<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('backend.v1.contact.index', ['contacts' => $contacts]);
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
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::find($id);
        return view('backend.v1.contact.edit', ['contact' => $contact]);
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
        //
    }
}
