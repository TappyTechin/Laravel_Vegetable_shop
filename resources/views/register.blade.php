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
    <form action="{{route("register_user")}}" method="POST">
        @csrf
    <label>Username:</label>
    <input type="text" name="name">
    @error('name')
        {{$message}}
    @enderror
    <br>
    <label>Password:</label>
    <input type="password" name="password">
    @error('password')
    {{$message}}
    @enderror
    <br>
    <label>Confirm Password:</label>
    <input type="password" name="password_confirmation"><br>
    <button type="submit">Register</button>
    @error('message')
        <script>
            alert("{{$message}}");
        </script>
    @enderror
</form>
<label>If you have an account.</label><a href="/login">Login Here</a>
</div>