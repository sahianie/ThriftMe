@extends('Admin.Master.master')
@section('content')
<div class="container">
    <div class="row ">
        <div class="col-xl-12 col-md-12">
            <div class="card">

                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between mt-3">
                                <h4 class="mb-0 font-size-18"></h4>
                                <div class="row">
                                    <div class="col-md-12 ">
                                    </div>
                                </div>
                            </div>

                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                                   
                            </div>
                            @endif
                            <div class="card mt-3">
                                <div class="card-body">
                                    <table class="table table-bordered " id="category_table">
                                        <thead>
                                            <tr>
                                                <th>user_id </th>
                                                <th>thrift_id </th>
                                                <th>username </th>
                                                <th>address </th>
                                                <th>contact </th>
                                                <th>total_amount </th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($soldItems as $order)
                                            <tr>
                                                <td>{{ $order->user_id }}</td>
                                                <td>{{ $order->thrift_id }}</td>
                                                <td>{{ $order->username }}</td>
                                                <td>{{ $order->address }}</td>
                                                <td>{{ $order->contact }}</td>
                                                <td>{{ $order->total_amount }}</td>
                                            
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection