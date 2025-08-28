<div class="form-group mb-3">
    <b>{!! Form::label('categoryName', 'Category Name', ['class' => 'form-label']) !!}</b>
    &nbsp;

    {!! Form::select(
        'category_name',
        [
            'Clothes' => 'Clothes',
            'Shoes' => 'Shoes',
            'Bags' => 'Bags',
        ],
        !empty($data->category_name) ? $data->category_name : null,
        [
            'class' => 'form-control',
            'id' => 'categoryName',
            'placeholder' => 'Select Category Name',
        ],
    ) !!}

    <span class="text-danger">
        @error('category_name')
            {{ $message }}
        @enderror
    </span>
</div>

<div class="form-group mb-3">
    <b>{!! Form::label('categoryType', 'Category Type', ['class' => 'form-label']) !!}</b>
    &nbsp;

    {!! Form::select(
        'category_type',
        [
            'Rental' => 'Rental',
            'Thrifted' => 'Thrifted',
        ],
        !empty($data->category_type) ? $data->category_type : null,
        [
            'class' => 'form-control',
            'id' => 'categoryType',
            'placeholder' => 'Select Category Type',
        ],
    ) !!}

    <span class="text-danger">
        @error('category_type')
            {{ $message }}
        @enderror
    </span>
</div>

<br>
<div class="mb-3 text-center">
    <button class="btn submitCategory login-btn" type="submit">
        <b>{{ !empty($data) ? 'Update Category' : 'Add Category' }}</b>
    </button>
</div>
