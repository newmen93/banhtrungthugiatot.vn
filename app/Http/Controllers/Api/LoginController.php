<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {

        //$client = new Client();
        // $request = $client->get('http://google.com');
        // $response = $request->getBody();
        // dd($response);

        // $headers = ['Content-Type' => 'application/json']

        $data['scopes'] = 'PublicApi.Access';
        $data['grant_type'] = 'client_credentials';
        $data['client_id'] = '67e09117-91dc-4cca-b441-ccd4dacb198d';
        $data['client_secret'] = 'F9FA5CAC96CA3CB6281A454F65236C4613D5478D';


        $client = new Client();
        //$client->setDefaultOption('headers', array('X-Foo' => 'Bar'));
        $request = $client->post('https://id.kiotviet.vn/connect/token', ['form_params' => $data]);
        $data = $request->getBody()->read(1024);
        dd(json_decode($data)->access_token);
        $code = $response->getStatusCode();
        dd($code);

        dd($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function test()
    {
        //dd(session('access_token'));
        dd(Session::get('access_token'));
        $headers = [
            'Retailer' => 'phukiengiadung',
            'Authorization' => 'Bearer ' . Session::get('access_token')
        ];
        $data = [
            'orderBy' => 'name'
        ];
        //dd($headers);
        $client = new Client();
        //$client->setDefaultOption('headers', $headers);
        $request = $client->get('https://public.kiotapi.com/categories',[
            'headers' => $headers,
            'form_params' => $data
        ]);
        $data = $request->getBody();
        dd(json_decode($data));
        $code = $response->getStatusCode();
        dd($code);

        dd($response);
        dd('dm no test thi dc');
    }
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
        //
    }
}
