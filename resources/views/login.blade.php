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
    <form action="{{route('login_user')}}" method="POST">
        @csrf
    <label>Username:</label>
    <input type="text" name="name"><br>
    <label>Password:</label>
    <input type="password" name="password"><br>
    <button type="submit">Login</button>
</form>
<label>If you don't have an account.</label><a href="/register">Register Here</a>
</div>
