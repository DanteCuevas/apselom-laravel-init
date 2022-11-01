@extends('layout')

@section('content')
@php
    //dd($categories->toArray(), $categories_pluck->toArray());
@endphp
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
        </div>
    </div>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('products.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" style="height:150px" name="description" placeholder="Description"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Stock:</strong>
                <input type="text" name="stock" class="form-control" placeholder="Stock">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Code:</strong>
                <input type="text" name="code" class="form-control" placeholder="Code">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Categoria:</strong>
                <select class="form-control" name="category_id">
                    <option value="">Selecione una categoria</option>
                    @foreach ($categories as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Categoria:</strong>
                <select class="form-control" name="category_id">
                    <option value="">Selecione una categoria</option>
                    @foreach ($categories_pluck as $id => $categorie)
                        <option value="{{ $id }}">{{ $categorie }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Categoria By Ajax:</strong>
                <select class="form-control" name="category_json_id" id="category_json_id">
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>

<script type="text/javascript">
$( document ).ready(function() {
    console.log( "ready!" );

    $.get( "{{ route('categories.json') }}", function( response ) {
        console.log( 'categories: ', response );
        // Its good but not efficient
        /* $.each(response.data, function(key, value) {   
            console.log(value);
            $('#category_json_id')
                .append($("<option></option>")
                            .attr("value", key)
                            .text(value)); 
        }); */

        options = '';
        $.each(response.data, function(key, value) {   
            //options = options + '<option value="'+key+'">'+value+'</option>';
            options += '<option value="'+key+'">'+value+'</option>';
        });
        //console.log(options);
        $('#category_json_id').append(options);
    });
    console.log($('#category_json_id').val());
});
</script>

@endsection
