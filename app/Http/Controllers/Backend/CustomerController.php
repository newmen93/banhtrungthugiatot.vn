<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $columns = [
            0 => "code",
            1 => "username",
            2 => "name",
            3 => "email",
            4 => "phone",
            5 => "address",
            6 => "action"
        ];
        return view('backend.v1.customer.index');
    }
    public function sync()
    {
        /**
         * todo: Should we truncate Customer table before syncing?
         */
        $client = new Client([
            'headers' => [
                'Retailer'      => 'phukiengiadung',
                'Authorization' => 'Bearer ' . Session::get('access_token')
            ]
        ]);
        $response = $client->get('https://public.kiotapi.com/customers', [
            RequestOptions::JSON => [
                'pageSize' => 1000
            ]
        ]);
        $data = $response->getBody();
        $customers = json_decode($data)->data;

        foreach ($customers as $customer) {
            $cus = Customer::where('k_id', $customer->id)->first();
            if(!$cus){
                $new = new Customer();
                $new->name =$customer->name;
                $new->code =$customer->code;
                $new->k_id = $customer->id;
                $new->location_name = $customer->locationName ?? "";
                $new->debt = $customer->debt;
                $new->save();
            }
        }
        echo json_encode(1);
    }
    public function dataTable(Request $request)
    {

        $columns = [
            0 => "code",
            1 => "username",
            2 => "name",
            3 => "email",
            4 => "phone",
            5 => "address",
            6 => "action"
        ];

        $totalData = Customer::count();
        $limit     = intval($request->input('length'));
        $start     = intval($request->input('start'));
        $order     = $columns[$request->input('order.0.column')];
        $dir       = $request->input('order.0.dir');

        if(empty($request->input('search.value'))){
            $post = Customer::offset($start)
                ->take($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Customer::count();
        }else{
            $search = $request->input('search.value');
            $post = Customer::where('name', 'like', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            $totalFiltered = Customer::where('name','like',"%{$search}%")->count();
        }

        $action = '<a data-id="{id}" href="#" class="btn btn-sm btn-primary btn-edit"><i class="fa fa-edit"></i> Sửa</a> <a href="#" data-id="{id}" class="btn btn-sm btn-danger btn-delete"><i class="fa fa-trash"></i> Xóa</a>';
        $data = array();
        if($post){
            foreach($post as $r){
                $nestedData['code']     = $r->code;
                $nestedData['username'] = $r->username;
                $nestedData['name']     = $r->name;
                $nestedData['email']    = $r->email;
                $nestedData['phone']    = $r->contact_number;
                $nestedData['address']  = $r->address;
                $nestedData['action']   = str_replace("{id}", $r->id, $action);
                $data[]                 = $nestedData;
            }
        }
        $json_data = array(
            "raw"             => intval($request->input('raw')),
            "recordsTotal"    => intval($totalData),
            "recordsFiltered" => intval($totalFiltered),
            "data"            => $data
        );

        echo json_encode($json_data); die;
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
        /**
         * call api kv to new customer
         */
        $data = [
            "branchId"=> 38930,
            "name" => $request->name,
            //"contactNumber"=> $request->phone,
            "address" => $request->address,
            //"email"=> $request->email,
            "comment" => $request->note
        ];
        $client = new Client([
            'headers' => [
                'Retailer'      => 'phukiengiadung',
                'Authorization' => 'Bearer ' . Session::get('access_token')
            ]
        ]);
        $response = $client->post('https://public.kiotapi.com/customers', [
            RequestOptions::JSON => $data
        ]);
        $data = json_decode($response->getBody());
        /**
         * [$customer description]
         * todo: need to validate
         */
        $customer = new Customer();
        $customer->name = $request->name;
        $customer->k_id = $data->data->id;
        $customer->email = $request->email;
        $customer->contact_number = $request->phone;
        $customer->gender = $request->gender;
        $customer->address = $request->address;
        $customer->comment = $request->note;
        $customer->save();

        return response()->json(['status'=> 200]);
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
        $customer = Customer::find($id);
        return response()->json(['status'=> 200, 'data' => $customer]);
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
        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->contact_number = $request->phone;
        $customer->gender = $request->gender;
        $customer->address = $request->address;
        $customer->comment = $request->note;
        $customer->save();
        /**
         * todo call kiot api to update customer
         */
        $data = [
            "branchId"=> 38930,
            "name" => $request->name,
            //"contactNumber"=> $request->phone,
            "address" => $request->address,
            //"email"=> $request->email,
            "comment" => $request->note
        ];

        $client = new Client([
            'headers' => [
                'Retailer'      => 'phukiengiadung',
                'Authorization' => 'Bearer ' . Session::get('access_token')
            ]
        ]);
        $response = $client->put('https://public.kiotapi.com/customers/' .  $customer->k_id, [
            RequestOptions::JSON => $data
        ]);
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
        $customer = Customer::find($id);
        /**
         * todo call apikiot to delete customer
         */
        $data = [
            'id' => $customer->k_id
        ];
        $client = new Client([
            'headers' => [
                'Retailer'      => 'phukiengiadung',
                'Authorization' => 'Bearer ' . Session::get('access_token')
            ]
        ]);
        $request = $client->delete('https://public.kiotapi.com/customers/' . $customer->k_id);
        $customer->delete();
        return response()->json(['status'=> 200]);

    }
}
