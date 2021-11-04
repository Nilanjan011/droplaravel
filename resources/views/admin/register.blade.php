<center>
    <form action=" {{route('admin.store')}} " method="post">
        @csrf
        <input type="text" name="name" placeholder="name"><br><br>
        <input type="text" name="email" placeholder="email"><br><br>
        <input type="text" name="password" placeholder="password"><br><br>
        <input type="submit" value="Submit">
    </form>
</center>