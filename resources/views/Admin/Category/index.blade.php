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
                                                <a class="btn btn-lg" href="{{ route('create.category') }}"><b>ADD
                                                        CATEGORY</b></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if(session('error'))
                                    <div class="alert alert-danger mt-2">
                                        {{ session('error') }}
                                    </div>
                                @endif

                                <div class="card mt-3">
                                    <div class="card-body">
                                        <table class="table table-bordered" id="category_table">
                                            <thead>
                                                <tr>
                                                    <th>Category &nbsp; Name</th>
                                                    <th>Category &nbsp; Type</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($categories as $category)
                                                    <tr>
                                                        <td>{{ $category->category_name }}</td>
                                                        <td>{{ $category->category_type }}</td>
                                                        <td>
                                                            <a href="{{ route('edit.category', $category->id) }}"
                                                                class="btn btn-primary">Edit</a>
                                                            <form action="{{ route('delete.category', $category->id) }}"
                                                                method="POST" style="display:inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger"
                                                                    onclick="return confirm('Are you sure?')">Delete</button>
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
