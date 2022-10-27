@extends('layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Laravel 8 CRUD Example from scratch</h2>
        </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Description</th>
        <th>Stock</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->description }}</td>
        <td>{{ $product->stock }}</td>
        <td>
            
            <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
            <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
            <form action="{{ route('products.destroy',$product->id) }}" method="POST" onClick="return (confirm('Are you sure to deleted?'))">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

<?php //LA MEJOR FORMA CON BLADE ?>
<table border="1">

  <tr>
    <th>Num</th>
    <th>Name</th>
    <th>Description</th>
    <th>stock</th>
  </tr>

  @foreach ($products as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->description }}</td>
        <td>{{ $product->stock }}</td>
    </tr>
  @endforeach
  
</table>
@endsection

<?php
/*

//LA MEJOR FORMA CON PHP PURO
?>
<table border="1">

  <tr>
    <th>Num</th>
    <th>Name</th>
    <th>Description</th>
    <th>stock</th>
  </tr>

    <?php
        foreach ($products as $key => $product) {
    ?>
        <tr>
            <td><?php echo $product->id; ?></td>
            <td><?php echo $product->name; ?></td>
            <td><?php echo $product->description; ?></td>
            <td><?php echo $product->stock; ?></td>
        </tr>
    <?php
        }
    ?>
  
</table>

<?php //LA PEOR FORMA CON PHP PURO ?>
<?php

    echo '<table border="1">';
    echo '<tr>';

    echo '<td>Num</td>';
    echo '<td>Name</td>';
    echo '<td>Description</td>';
    echo '<td>Stock</td>';

    echo '</tr>';

foreach ($products as $key => $product) {
    
    echo '<tr>';
    echo '<td>'.($key+1).'</td>';
    echo '<td>'.$product->name.'</td>';
    echo '<td>'.$product->description.'</td>';
    echo '<td>'.$product->stock.'</td>';
    echo '</tr>';
}
    echo '</table>';

*/

?>





