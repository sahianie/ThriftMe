@extends('Admin.Master.master')
@section('content')
<div class="container cardContainer">
    <div class="card categoryCard">
        <div class="card-header mt-3">
            <div class="card-body">
                <form action="{{ route('store.thrift') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <!-- Category -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category">Select Category</label>
                                <select class="form-control" id="category" name="category_id" required>
                                    <option value="">Select category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                            {{ $category->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">@error('category_id') {{ $message }} @enderror</span>
                            </div>
                        </div>

                        <!-- Title -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" placeholder="Brand Name" class="form-control" id="title" value="{{ old('title') }}" required>
                                <span class="text-danger">@error('title') {{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Size -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="size">Select Size</label>
                                <select class="form-control" id="size" name="size">
                                    <option value="">Select size</option>
                                    <option value="small" {{ old('size') == 'small' ? 'selected' : '' }}>Small</option>
                                    <option value="medium" {{ old('size') == 'medium' ? 'selected' : '' }}>Medium</option>
                                    <option value="large" {{ old('size') == 'large' ? 'selected' : '' }}>Large</option>
                                </select>
                                <span class="text-danger">@error('size') {{ $message }} @enderror</span>
                            </div>
                        </div>

                        <!-- Material -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="material">Material</label>
                                <input type="text" name="material" placeholder="Stuff" class="form-control" id="material" value="{{ old('material') }}" required>
                                <span class="text-danger">@error('material') {{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Condition -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="condition">Condition</label>
                                <select class="form-control" id="condition" name="condition">
                                    <option value="">Select Condition</option>
                                    <option value="new" {{ old('condition') == 'new' ? 'selected' : '' }}>New</option>
                                    <option value="like new" {{ old('condition') == 'like new' ? 'selected' : '' }}>Like New</option>
                                    <option value="good condition" {{ old('condition') == 'good condition' ? 'selected' : '' }}>Good Condition</option>
                                </select>
                                <span class="text-danger">@error('condition') {{ $message }} @enderror</span>
                            </div>
                        </div>

                        <!-- Type -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select class="form-control" id="type" name="type">
                                    <option value="">Select Type</option>
                                    <option value="men" {{ old('type') == 'men' ? 'selected' : '' }}>Men</option>
                                    <option value="women" {{ old('type') == 'women' ? 'selected' : '' }}>Women</option>
                                    <option value="kid" {{ old('type') == 'kid' ? 'selected' : '' }}>Kid</option>
                                </select>
                                <span class="text-danger">@error('type') {{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Price -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" name="price" placeholder="Price" class="form-control" id="price" value="{{ old('price') }}" required min="100">
                                <span class="text-danger">@error('price') {{ $message }} @enderror</span>
                            </div>
                        </div>

                        <!-- Image -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control" id="image">
                                <span class="text-danger">@error('image') {{ $message }} @enderror</span>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="mb-3 text-center">
                        <button class="btn submitCategory login-btn" type="submit"><b>{{ (!empty($data) ? 'Update Thrift' : 'Add Thrift') }}</b></button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
