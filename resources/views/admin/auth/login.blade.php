@extends('admin.layout.auth')

@section('content')
<div>
    <form style="margin-bottom: 0px !important;" action="{{ route('admin.login') }}" class="login-form" method="POST">
    {{ csrf_field() }}            
    <div class="form-group">
        <label class="sr-only" for="form-username">Username</label>
        <input type="text" name="username" placeholder="Username..." class="form-username form-control" id="form-username">
    </div>
    <div class="form-group">
        <label class="sr-only" for="form-password">Password</label>
        <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
    </div>
    <button type="submit" class="btn">Sign in!</button>
    </form>
</div>
@endsection
