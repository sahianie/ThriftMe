<div class="row">
    <!-- Category -->
    <div class="col-md-6">
        <div class="form-group">
            <label for="category">Select Category</label>
            <select class="form-control" id="category" name="category_id" required>
                <option value="">Select category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" 
                        {{ old('category_id', $data->category_id ?? '') == $category->id ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
            <span class="text-danger">
                @error('category_id') {{ $message }} @enderror
            </span>
        </div>
    </div>

    <!-- Title -->
    <div class="col-md-6">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" id="title" 
                value="{{ old('title', $data->title ?? '') }}" required>
            <span class="text-danger">
                @error('title') {{ $message }} @enderror
            </span>
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
                <option value="small" {{ old('size', $data->size ?? '') == 'small' ? 'selected' : '' }}>Small</option>
                <option value="medium" {{ old('size', $data->size ?? '') == 'medium' ? 'selected' : '' }}>Medium</option>
                <option value="large" {{ old('size', $data->size ?? '') == 'large' ? 'selected' : '' }}>Large</option>
            </select>
            <span class="text-danger">
                @error('size') {{ $message }} @enderror
            </span>
        </div>
    </div>

    <!-- Material -->
    <div class="col-md-6">
        <div class="form-group">
            <label for="material">Material</label>
            <input type="text" name="material" class="form-control" id="material" 
                value="{{ old('material', $data->material ?? '') }}" required>
            <span class="text-danger">
                @error('material') {{ $message }} @enderror
            </span>
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
                <option value="new" {{ old('condition', $data->condition ?? '') == 'new' ? 'selected' : '' }}>New</option>
                <option value="like new" {{ old('condition', $data->condition ?? '') == 'like new' ? 'selected' : '' }}>Like New</option>
                <option value="good condition" {{ old('condition', $data->condition ?? '') == 'good condition' ? 'selected' : '' }}>Good Condition</option>
            </select>
            <span class="text-danger">
                @error('condition') {{ $message }} @enderror
            </span>
        </div>
    </div>

    <!-- Type -->
    <div class="col-md-6">
        <div class="form-group">
            <label for="type">Type</label>
            <select class="form-control" id="type" name="type">
                <option value="">Select Type</option>
                <option value="men" {{ old('type', $data->type ?? '') == 'men' ? 'selected' : '' }}>Men</option>
                <option value="women" {{ old('type', $data->type ?? '') == 'women' ? 'selected' : '' }}>Women</option>
                <option value="kid" {{ old('type', $data->type ?? '') == 'kid' ? 'selected' : '' }}>Kid</option>
            </select>
            <span class="text-danger">
                @error('type') {{ $message }} @enderror
            </span>
        </div>
    </div>
</div>

<div class="row">
    <!-- Rent -->
    <div class="col-md-6">
        <div class="form-group">
            <label for="rent_per_day">Rent</label>
            <input type="number" name="rent_per_day" class="form-control" id="rent_per_day" required min="100"
                value="{{ old('rent_per_day', $data->rent_per_day ?? '') }}">
            <span class="text-danger">
                @error('rent_per_day') {{ $message }} @enderror
            </span>
        </div>
    </div>

    <!-- Image Upload -->
    <div class="col-md-6">
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control" id="image">

            <span class="text-danger">
                @error('image') {{ $message }} @enderror
            </span>

            <!-- Show existing image if available -->
            @if (!empty($data->image))
                <div class="mt-2">
                    <img id="previewImage" style="height:70px;width:70px;border-radius:100%" 
                        src="{{ asset('storage/' . $data->image) }}">
                </div>
            @endif
        </div>
    </div>
</div>

<br>
<!-- Submit Button -->
<div class="mb-3 text-center">
    <button class="btn submitCategory login-btn" type="submit">
        <b> {{ !empty($data) ? 'Update Rental' : 'Add Rental' }} </b>
    </button>
</div>

<!-- Optional JS to show preview of new uploaded image -->
<script>
    document.getElementById('image').addEventListener('change', function(event){
        const [file] = this.files;
        if(file){
            document.getElementById('previewImage').src = URL.createObjectURL(file);
        }
    });
</script>
