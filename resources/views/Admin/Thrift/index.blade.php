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
                                            <div class="categoryBtn">
                                                <a class="btn btn-lg" href="{{ route('create.thrift') }}"><b>ADD THRIFT POST</b></a>
                                            </div>
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
                                        <table class="table table-bordered" id="category_table">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Category</th>
                                                    <th>Type</th>
                                                    <th>Size</th>
                                                    <th>Condition</th>
                                                    <th>Price</th>
                                                    <th>Image</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($thrift as $item)
                                                    <tr>
                                                        <td>{{ $item->title }}</td>
                                                        <td>{{ optional($item->category)->category_name ?? 'No Category' }}</td>

                                                        <td>{{ $item->type }}</td>
                                                        <td>{{ $item->size }}</td>
                                                        <td>{{ $item->condition }}</td>
                                                        <td>{{ $item->price }}</td>
                                                        <td>
                                                            @if($item->image)
                                                                <img src="{{ asset('storage/' . $item->image) }}" alt="Thrift Image" width="70" height="70" style="object-fit: cover;">
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('edit.thrift', $item->id) }}" class="btn btn-sm btn-primary">
                                                                <i class="fas fa-edit"></i>
                                                            </a>

                                                            <form action="{{ route('delete.thrift', $item->id) }}" method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </td>
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
