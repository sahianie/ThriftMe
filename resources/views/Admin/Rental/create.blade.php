@extends('Admin.Master.master')
@section('content')
    <div class="container cardContainer">
        <div class="card  categoryCard">
            <div class="card-header mt-3">

                <div class="card-body">
                    <form action="{{ route('store.rental') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">

                                    <label for="category">Select Category</label>

                                    <select class="form-control" id="category" name="category_id" required>

                                        <option value="">Select category</option>

                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach

                                    </select>

                                    <span class="text-danger">

                                        @error('category_id')
                                            {{ $message }}
                                        @enderror

                                    </span>

                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" placeholder="Brand Name" class="form-control"
                                        id="title" required>
                                    <span class="text-danger">
                                        @error('title')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="size">Select Size</label>
                                    <select class="form-control" id="size" name="size">
                                        <option value="">Select size</option>
                                        <option value="small">Small</option>
                                        <option value="medium">Medium</option>
                                        <option value="large">Large</option>
                                    </select>
                                    <span class="text-danger">
                                        @error('size')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="material">Material</label>
                                    <input type="text" name="material" placeholder="Stuff" class="form-control"
                                        id="material" required>
                                    <span class="text-danger">
                                        @error('material')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="condition">Condition</label>
                                    <select class="form-control" id="condition" name="condition">
                                        <option value="">Select Condition</option>
                                        <option value="new">New</option>
                                        <option value="like new">Like New</option>
                                        <option value="good condition">Good Condition</option>
                                    </select>
                                    <span class="text-danger">
                                        @error('condition')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="type">Type</label>
                                    <select class="form-control" id="type" name="type">
                                        <option value="">Select Type</option>
                                        <option value="men">men</option>
                                        <option value="women">women</option>
                                        <option value="kid">kid</option>
                                    </select>
                                    <span class="text-danger">
                                        @error('type')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="rent_per_day">Rent</label>
                                    <input type="number" name="rent_per_day" placeholder="Rent per day"
                                        class="form-control" id="rent_per_day" required min="100">
                                    <span class="text-danger">
                                        @error('rent_per_day')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <input type="file" name="image" class="form-control" id="image">
                                    <span class="text-danger">
                                        @error('image')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="mb-3 text-center">
                            <button class="btn  submitCategory  login-btn" type="submit"> <b>
                                    {{ !empty($data) ? 'Update Rental' : 'Add Rental' }} </b></button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
