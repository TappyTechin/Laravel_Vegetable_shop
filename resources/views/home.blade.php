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
</style>
<div>
    <h1>Welcome to Vegetable Market</h1>
    <p>Our vegetable products are fresh as fuck.</p>
    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Product Mass</th>
                <th>Product Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if (count($products) !== 0)
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->p_name }}</td>
                        <td>{{ $product->p_mass }}g</td>
                        <td>MYR {{ $product->p_price }}</td>
                        <td><a href="{{ route('product.show', $product->id) }}">Buy Item</a></td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4">No products available</td>
                </tr>
            @endif
        </tbody>
    </table>
    <a href="/viewcheckout">View Previous Checkout</a>
    <a href="/cartlist">View Cartlist</a>
    <a href="/login">Logout</a>
</div>
