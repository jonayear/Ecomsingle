@extends('user_template.layouts.user_profile')
@section('profile_content')
 @if(Session::has('msg'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ Session::get('msg') }}
        {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">x</button> --}}
    </div>
@endif
Pending Order
@endsection
