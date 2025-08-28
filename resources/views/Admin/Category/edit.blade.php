@extends('Admin.Master.master')
@section('content')
    <div class="container cardContainer">
        <div class="card  categoryCard">
            <div class="card-header mt-3">
                <div class="card-body">
                    <form action="{{ route('update.category',$data->id) }}" enctype="multipart/form-data" method="post">
                        @csrf
                        @include('Admin.Category.fields')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
