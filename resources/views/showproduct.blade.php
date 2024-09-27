<style>
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
    <h1>Product Details</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form method="POST" action="{{ route('add_to_cart', ['id' => $product->id]) }}">
        @csrf
        <label>Product Name</label>
        <input type="text" readonly name="p_name" value="{{ $product->p_name }}"><br>
        <label>Mass</label>
        <input type="number" name="p_mass" onchange="calculate()" value="{{ $product->p_mass }}"><br>
        <label for="p_price">Price</label>
        <input type="text" name="p_price" value="{{ $product->p_price }}"><br>
        <label>Total Price</label>
        <p id="total_price"></p><br>
        <input type="hidden" name="p_id" value="{{ $product->id }}">
        <button type="submit" name="submit">Add to Cart</button>
        <a href="{{ route('home') }}">Back to Home</a>
    </form>
</div>
<script>
    function calculate(){
        var mass = document.querySelector("input[name='p_mass']").value;
        var price = document.querySelector("input[name='p_price']").value;
        var total = (price / 100) * mass;
        document.querySelector("#total_price").innerHTML = total;
    }
</script>
