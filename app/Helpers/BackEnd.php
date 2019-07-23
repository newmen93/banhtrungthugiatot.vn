<?php

if (!function_exists('getSetting')) {
    function getSetting($file) {
    	$data = @file_get_contents(base_path('storage/' . $file));
    	$fileName = explode('.',$file)[0];

    	if (!$data) {
    	    $data = new stdClass();
    	    switch ($fileName) {
    	    	case 'client':
    	    		$data->client_id = '';
    	    		$data->client_secret = '';
    	    		break;
    	    	case 'facebook':
    	    		$data->google = '';
    	    		$data->app_id = '';
    	    		break;
        		case 'client':
    	    		$data->user_id = '';
    	    		$data->app_id = '';
    	    		break;
        		case 'zalo':
    	    		$data->app_id = '';
    	    		break;
    	    	default:
    	    		# code...
    	    		break;
    	    }

    	} else {
    	    $data = json_decode($data);
    	}
    	return $data;
    }
}
if(!function_exists('dataTable')) {
    function dataTable($columns, $model) {
        $totalData = $model::count();
        $limit     = intval($request->input('length'));
        $start     = intval($request->input('start'));
        $order     = $columns[$request->input('order.0.column')];//default order by column 0
        $dir       = $request->input('order.0.dir');

        if(empty($request->input('search.value'))){
            $post = $model::offset($start)
                ->take($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = $model::count();
        }else{
            $search = $request->input('search.value');
            $post = $model::where('name', 'like', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            $totalFiltered = $model::where('name','like',"%{$search}%")->count();
        }

        $action = '<a href="#" class="btn btn-sm btn-primary btn-edit"><i class="fa fa-edit"></i> Sửa</a> <a href="#" class="btn btn-sm btn-danger btn-delete"><i class="fa fa-trash"></i> Xóa</a>';
        $data = array();
        if($post){
            foreach($post as $r){
                $nestedData['code']        = $r->code;
                $nestedData['username']        = $r->username;
                $nestedData['name']    = $r->name;
                $nestedData['email']       = $r->email;
                $nestedData['phone']       = $r->phone;
                $nestedData['address']       = $r->address;
                $nestedData['action']      = $action;
                $data[]                    = $nestedData;
            }
        }
        $json_data = array(
            "raw"             => intval($request->input('raw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );
        return json_encode($json_data);
    }
}
