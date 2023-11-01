@extends('user_template.layouts.layouts')

@section('content')
<div class="container my-5">
    <div class="row">
        @if(Session::has('msg'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('msg') }}
            {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button> --}}
        </div>
    @endif
        <div class="col-lg-4">
            <div class="box_main">
                <ul class="list-group">
                  <li class="list-group-item"><a href="{{ route('UserProfile') }}">Dashbord</a></li>
                  <li class="list-group-item"><a href="{{ route('pending.order') }}">Pending Orders</a></li>
                  <li class="list-group-item"><a href="{{ route('histroy') }}">History</a></li>
                  <li class="list-group-item"><a href="">Logout</a></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="box_main">
                @yield('profile_content')
            </div>
        </div>
    </div>
</div>
@endsection