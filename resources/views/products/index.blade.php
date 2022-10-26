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

?>

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

