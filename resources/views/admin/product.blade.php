<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}">
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
@include('layouts.admin.adminHeader', array('title'=>'Home'))
    <h2>@if(isset($product->name)){{$product->name}} @else "Add product" @endif</h2>
    <form action="/admin/product" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <ul class="styledForm">
            <input type="hidden" name="id" value="@if(isset($product->id)){{$product->id}} @else 0 @endif" >
            <li><label>Image<span class="required">*</span></label> <input
                        type="file" name="image"</li>
            <li><label>Name<span class="required">*</span></label> <input
                        type="text" name="name" class="field-long" @if(isset($product->name))value="{{$product->name}}"@endif/></li>
            <li><label>Price (in €)<span class="required">*</span></label> <input
                        type="number" step="any" name="price" class="field-long" @if(isset($product->price))value="{{$product->price}}"@endif/></li>
            <li><label>Alcohol (in %vol)<span class="required">*</span></label> <input
                        type="number" step="any" name="alcohol" class="field-long"
                        style="padding-right: 55px;" @if(isset($product->alcohol_contents))value="{{$product->alcohol_contents}}"@endif/></li>
            <li><label>Contents (in ml)<span class="required">*</span></label> <input
                        type="number" step="any" name="contents" class="field-long"@if(isset($product->contents_ml))value="{{$product->contents_ml}}"@endif /></li>
            <li><label>Category<span class="required">*</span></label> <select                                                                                          {{--todo add subcategory--}}
                        name="category" class="field-select"@if(isset($product->parent_category))value="{{$product->parent_category}}"@endif>

                @foreach($categories as $category)
                        <option value="{{$category->id}}" @if(isset($product->parent_category) && $category->id == $product->parent_category) selected @endif>{{$category->name}}</option>
                @endforeach
                </select></li>
            <li><label>Description</label> <textarea name="description" id="Description"
                                                     class="field-long field-textarea"> @if(isset($product->description)){{$product->description}}@endif</textarea></li>
            <li><input type="submit" name="save" value="Save" /></li>
        </ul>
    </form>
<br>
<br>
<br>
<br>
@include('layouts.footer')
</body>
</html>

