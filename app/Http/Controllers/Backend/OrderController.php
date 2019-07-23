<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.v1.order.index');
    }
    public function dataTable(Request $request)
    {
        $columns = [
            0 => "code",
            1 => "customer",
            2 => "total",
            3 => "created_by",
            4 => "created_at",
            5 => "action"
        ];

        $totalData = Order::count();
        $limit     = intval($request->input('length'));
        $start     = intval($request->input('start'));
        $order     = $columns[$request->input('order.0.column')];//default order by column 0
        $dir       = $request->input('order.0.dir');

        if(empty($request->input('search.value'))){
            $post = Order::offset($start)
                ->take($limit)
                ->orderBy($order, $dir)
                ->get();
            $totalFiltered = Order::count();
        }else{
            $search = $request->input('search.value');
            $post = Order::where('customer', 'like', "%{$search}%")
                ->offset($start)
                ->limit($limit)
                ->orderBy($order,$dir)
                ->get();
            $totalFiltered = Order::where('customer','like',"%{$search}%")->count();
        }
        $action = '<a href="{url}" class="btn btn-sm btn-success btn-edit"><i class="fa fa-eye"></i> Xem</a>';
        $data = array();
        if($post){
            foreach($post as $r){
                $nestedData['code']       = $r->code;
                $nestedData['customer']   = $r->customer_name;
                $nestedData['total']      = $r->total;
                $nestedData['status_value'] = $r->status_value;
                $nestedData['created_at'] = date_format($r->created_at, 'd/m/Y');
                $nestedData['action']     = str_replace('{url}', route('admin.order.edit',$r->id), $action);
                $nestedData["DT_RowId"]   = $r->id;
                $data[]                   = $nestedData;
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
    public function sync()
    {
        $client = new Client([
            'headers' => [
                'Retailer'      => 'phukiengiadung',
                'Authorization' => 'Bearer ' . Session::get('access_token')
            ]
        ]);
        $response = $client->get('https://public.kiotapi.com/orders',[
            RequestOptions::JSON => [
                'pageSize' => 1000
            ]
        ]);
        $data = $response->getBody();
        $orders = json_decode($data)->data;

        foreach ($orders as $order) {
            $od = Order::where('k_id', $order->id)->first();
            if (!$od) {
                $new = new Order();
                $new->code =$order->code;
                $new->k_id = $order->id;
                $new->purchase_date = property_exists($order, 'purchaseDate') ? $order->purchaseDate: NULL;
                if (property_exists($order, 'customerId')) {
                    $new->customer_id =$order->customerId;
                    $new->customer_code =$order->customerCode;
                    $new->customer_name = $order->customerName;
                }
                $new->total = $order->total;
                $new->total_payment = $order->totalPayment;
                $new->status = $order->status;
                $new->status_value = $order->statusValue ?? '';
                $new->modified_date = property_exists($order,'modifiedDate')? $order->modifiedDate : NULL;
                $new->created_date = $order->createdDate;
                $new->save();

                foreach ($order->orderDetails as $detail) {
                    $newD = new OrderDetail();
                    $newD->order_id = $new->k_id;
                    $newD->product_id = $detail->productId;
                    $newD->product_code = $detail->productCode;
                    $newD->product_name = $detail->productName;
                    $newD->quantity = $detail->quantity;
                    $newD->price = $detail->price;
                    $newD->discount = $detail->discount;
                    $newD->discount_ratio = $detail->discountRatio;
                    $newD->note =  property_exists($detail,'note') ? $detail->note : NULL;
                    $newD->save();
                }
            } else {
                $od->purchase_date = property_exists($order, 'purchaseDate') ? $order->purchaseDate: NULL;
                if (property_exists($order, 'customerCode')) {
                    $od->customer_code =$order->customerCode;
                    $od->customer_name = $order->customerName;
                }
                $od->total = $order->total;
                $od->total_payment = $order->totalPayment;
                $od->status = $order->status;
                $od->status_value = $order->statusValue ?? '';
                $od->modified_date = property_exists($order,'modifiedDate')? $order->modifiedDate : NULL;
                $od->created_date = $order->createdDate;
                $od->save();

                foreach($od->orderDetail as $detail) {
                    // $detail->delete();
                    foreach ($order->orderDetails as $item) {
                        if ($detail->product_id == $item->productId
                        && $detail->quantity == $item->quantity
                        && $detail->price == ($item->price * $item->quantity)) {
                            $detail->quantity = $item->quantity;
                            $detail->discount = $item->discount;
                            $detail->discount_ratio = $item->discountRatio;
                            $detail->note =  property_exists($item,'note') ? $item->note : NULL;
                            $detail->save();
                        }
                    }
                };
                // //delete all order detail
                // $od->orderDetail->each(function($detail, $key) {
                //     $detail->delete();
                // });
                // foreach ($order->orderDetails as $detail) {
                //     $newD = new OrderDetail();
                //     $newD->order_id = $od->k_id;
                //     $newD->product_id = $detail->productId;
                //     $newD->product_code = $detail->productCode;
                //     $newD->product_name = $detail->productName;
                //     $newD->price = $detail->price;
                //     $newD->quantity = $detail->quantity;
                //     $newD->discount = $detail->discount;
                //     $newD->discount_ratio = $detail->discountRatio;
                //     $newD->note =  property_exists($detail,'note') ? $detail->note : NULL;
                //     $newD->save();
                // }
            }
        }
        echo json_encode(1);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.v1.order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
        $order = Order::with('orderDetail')->find($id);



        return view('backend.v1.order.detail',['order'=>$order]);
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
        $order = Order::find($id);
        $order->status = $request->status;
        $order->save();
        /**
         * call api change status or update order here
         */
        // $data = [
        //     'name' => $customer->name
        // ];
        // $client = new Client([
        //     'headers' => [
        //         'Retailer'      => 'phukiengiadung',
        //         'Authorization' => 'Bearer ' . Session::get('access_token')
        //     ]
        // ]);
        // $request = $client->post('https://public.kiotapi.com/customers', [
        //     RequestOptions::JSON => $data
        // ]);
        //dd(json_decode($request->getBody()));
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
        //
    }
}
