<style>
    table {
        border-collapse: collapse;
    }
    table, th, td {
        border: 3px solid black;
    }
    h1 {
        color: green;
    }

    input, button {
        padding: 10px;
        border: 1px solid #ccc;
    }
    
    button[type="submit"] {
      background-color: #4CAF50;
      color: #fff;
    }
</style>
<div>
<h1>Cart List</h1>
<p>Where you can see what you brought</p>
<table>
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Product Mass</th>
            <th>Total Price</th>
            <th>Cart Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($carts as $cart)
            <tr>
                <td>{{$cart->p_name}}</td>
                <td>{{$cart->p_mass}}</td>
                <td>{{$cart->p_mass  * $cart->p_price/100}}</td>
                <td>{{ $cart->c_status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
<form action="{{route('checkout')}}" method="POST">
    @csrf
    @method("PUT")
    <button type="submit">Checkout Item</button>
</form>
</div>
