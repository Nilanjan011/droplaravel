<center>
    <form action=" {{route('admin.login')}} " method="post">
        @csrf
        <input type="text" name="email" placeholder="email"><br><br>
        <input type="text" name="password" placeholder="password"><br><br>
        <input type="submit" value="Submit">
    </form>
    <p>havbe not account?  <a href="{{route('admin.create')}}">Register</a> </p>
</center>