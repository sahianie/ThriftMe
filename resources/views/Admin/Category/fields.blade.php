
<div class="form-group mb-3 ">
<b>
   {!! Form::label('categoryName', 'Category Name',['class' => 'form-label',]) !!}
</b>
&nbsp;
<b> <small>** Clothes , Shoes ,Bags **</small></b>
    {!! Form::text('category_name', !empty($data->category_name) ? $data->category_name : null, [
        'class' => 'form-control',
        'id' => 'categoryName',
    ])
    !!}
    <span class="text-danger">
        @error('category_name')
            {{ $message }}
        @enderror
    </span>
</div>

<div class="form-group mb-3 ">
<b>
   {!! Form::label('categoryType', 'Category Type',['class' => 'form-label',]) !!}
</b>
&nbsp;
<b> <small>** Clothes , Shoes ,Bags **</small></b>
    {!! Form::text('category_type', !empty($data->category_type) ? $data->category_type : null, [
        'class' => 'form-control',
        'id' => 'categoryType',
    ])
    !!}
    <span class="text-danger">
        @error('category_type')
            {{ $message }}
        @enderror
    </span>
</div>
</br>
<div class="mb-3 text-center">
    <button class="btn  submitCategory  login-btn" type="submit"> <b> {{ (!empty( $data) ? 'Update Category' : 'Add Category' )}} </b></button>
</div>


