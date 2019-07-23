@if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade in" width="50px">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ $message }}
    </div>
@endif


@if ($message = Session::get('error'))
    <div class="alert alert-danger alert-dismissible fade in" width="50px">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ $message }}
    </div>
@endif


@if ($message = Session::get('warning'))
    <div class="alert alert-warning alert-dismissible fade in" width="50px">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ $message }}
    </div>
@endif


@if ($message = Session::get('info'))
    <div class="alert alert-info alert-dismissible fade in" width="50px">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ $message }}
    </div>
@endif


@if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade in" width="50px">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </div>
@endif