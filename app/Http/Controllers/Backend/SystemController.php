<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\System;
use Illuminate\Support\Str;

class SystemController extends Controller
{
    public function general(){
        $title = System::whereName('title')->first()->value ?? '';
        $desc = System::whereName('description')->first()->value ?? '';

        $data = @file_get_contents(base_path('storage/website.json'));
        $data = json_decode($data);

        return view('backend.v1.system.general', [
            'title' => $title,
            'description' => $desc,
            'fanpage' => $data->fanpage,
            'email' => $data->email,
            'phone'=> $data->phone,
            'address' => $data->address,
            'bank' => $data->bank
        ]);
    }
    public function postGeneral(Request $request){
        if ($request->info == 'info') {
            $data['fanpage']=$request->fanpage;
            $data['email']=$request->email;
            $data['phone']=$request->phone;
            $data['address']=$request->address;
            $data['bank']=$request->bank;
            $newJsonString = json_encode($data, JSON_UNESCAPED_UNICODE);
            file_put_contents(base_path('storage/website.json'), stripslashes($newJsonString));
            return back()->with('success', 'Lưu thành công!');
        }
        $system1 = System::whereName('title')->first() ?? new System();
        $system1->name = 'title';
        $system1->value = $request->input('title');
        $system1->save();

        $system2 = System::whereName('description')->first() ?? new System();
        $system2->name = 'description';
        $system2->value = $request->input('description');
        $system2->save();
        return back()->with('success', 'Lưu thành công!');
    }
    public function advanced(){
        return view('backend.v1.system.advanced', [
            'client'=> getSetting('client.json'),
            'facebook'=> getSetting('facebook.json'),
            'google'=> getSetting('google.json'),
            'zalo'=> getSetting('zalo.json'),
        ]);
    }
    public function postAdvanced(Request $request){

        switch ($request->input('type')) {
            case 'kiotviet':
                $file = 'client.json';
                $data['client_id'] = $request->input('client_id');
                $data['client_secret'] = $request->input('client_secret');
                break;
            case 'facebook':
                $file = 'facebook.json';
                $data['user_id'] = $request->input('user_id');
                $data['app_id'] = $request->input('app_id');
                $data['app_secret'] = $request->input('app_secret');
                $data['page_id'] = $request->input('page_id');
                break;
            case 'google':
                $file = 'google.json';
                $data['user_id'] = $request->input('user_id');
                $data['app_id'] = $request->input('app_id');
                $data['app_secret'] = $request->input('app_secret');
                break;
            case 'zalo':
                $file = 'zalo.json';
                $data['app_id'] = $request->input('app_id');
                $data['app_secret'] = $request->input('app_secret');
                break;
            default:
                $file = 'settings.json';
                $data['app_id'] = $request->input('app_id');
                $data['app_secret'] = $request->input('app_secret');
                break;
        }

        $newJsonString = json_encode($data, JSON_PRETTY_PRINT);

        file_put_contents(base_path('storage/' . $file), stripslashes($newJsonString));

        return back()->with('success', 'Lưu thành công!');
    }
}
