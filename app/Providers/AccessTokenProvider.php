<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Session;
use GuzzleHttp\Client;
class AccessTokenProvider extends ServiceProvider
{
    private $payload = [];
    private $client;
    private $endPoint = 'https://id.kiotviet.vn/connect/token';

    public function __construct()
    {
        $this->client                   = new Client();
        $this->payload['scopes']        = 'PublicApi.Access';
        $this->payload['grant_type']    = 'client_credentials';
    }
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        if (!Session::get('access_token')) {
            if ($this->getClient()) {
                $this->payload['client_id']     = $this->getClient()->client_id;
                $this->payload['client_secret'] = $this->getClient()->client_secret;
                $this->initialToken();
            }
        }
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
    private function getClient()
    {
        $data = @file_get_contents(base_path('storage/' . 'client.json'));
        return $data ?  json_decode($data) : null;
    }
    private function initialToken()
    {
        $request = $this->client->post($this->endPoint, ['form_params' => $this->payload]);
        $data = $request->getBody()->read(1024);
        Session::put('access_token', json_decode($data)->access_token, 86400);
        setcookie("access_token", json_decode($data)->access_token, 86400, "/");
    }
}
