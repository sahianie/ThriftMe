@extends('Admin.Master.master')
@section('content')
    <div class="container cardContainer">
        <div class="card categoryCard">
            <div class="card-header mt-3">
                <div class="navbar-brand-box" style="text-align: center">
                    <a href="index.html">
                        <span><img src="{{ asset('assets/admin/img/seeker.png') }}" alt="" width="80px" height="40%"></span>
                    </a>
                </div>
                <div class="card-body">
                   
                    <form action="{{ route('update.thrift', $data->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('Admin.Thrift.fields')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
