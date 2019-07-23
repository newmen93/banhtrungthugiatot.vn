@extends('backend.v1.layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#settings" data-toggle="tab">Kiotviet API</a></li>
                <li class=""><a href="#facebook" data-toggle="tab">Facebook</a></li>
                <li class=""><a href="#google" data-toggle="tab">Google</a></li>
                <li class=""><a href="#zalo" data-toggle="tab">Zalo</a></li>
            </ul>
            <div class="tab-content">
                <div class="active tab-pane" id="settings">
                    <form class="form-horizontal" action="{{route('admin.system.advanced.update')}}" method="post">
                        <div class="form-group">
                            <label for="client_id" class="col-sm-2 control-label">Client ID</label>
                            <input type="hidden" name="type" value="kiotviet">
                            @csrf
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="client_id" placeholder="Client ID" value="{{ $client->client_id }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="client_secret" class="col-sm-2 control-label">Client Secret</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="client_secret" placeholder="Client Secret" value="{{ $client->client_secret }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-danger">Lưu</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div  class="tab-pane"  id="facebook">
                    <form class="form-horizontal" action="{{route('admin.system.advanced.update')}}" method="post">
                        <div class="form-group">
                            <label for="user_id" class="col-sm-2 control-label">User ID</label>
                            <input type="hidden" name="type" value="facebook">
                            @csrf
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="user_id" placeholder="User ID" value="{{ $facebook->user_id }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="app_id" class="col-sm-2 control-label">App ID</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="app_id" placeholder="App ID" value="{{ $facebook->app_id }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="app_secret" class="col-sm-2 control-label">App Secret</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="app_secret" placeholder="App Secret" value="{{ $facebook->app_secret }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="page_id" class="col-sm-2 control-label">Page ID</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="page_id" placeholder="Fan Page ID" value="{{ $facebook->page_id }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-danger">Lưu</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div  class="tab-pane"  id="google">
                    <form class="form-horizontal" action="{{route('admin.system.advanced.update')}}" method="post">
                        <div class="form-group">
                            <label for="user_id" class="col-sm-2 control-label">User ID</label>
                            <input type="hidden" name="type" value="google">
                            @csrf
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="user_id" placeholder="User ID" value="{{ $google->user_id }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="app_id" class="col-sm-2 control-label">App ID</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="app_id" placeholder="App ID" value="{{ $google->app_id }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="app_secret" class="col-sm-2 control-label">App Secret</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="app_secret" placeholder="App Secret" value="{{ $google->app_secret }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-danger">Lưu</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div  class="tab-pane"  id="zalo">
                    <form class="form-horizontal" action="{{route('admin.system.advanced.update')}}" method="post">
                       
                        <div class="form-group">
                            <label for="app_id" class="col-sm-2 control-label">App ID</label>
                            @csrf
                            <input type="hidden" name="type" value="zalo">
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="app_id" placeholder="App ID" value="{{ $zalo->app_id }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="app_secret" class="col-sm-2 control-label">App Secret</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="app_secret" placeholder="App Secret" value="{{ $zalo->app_secret }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-danger">Lưu</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@stop
