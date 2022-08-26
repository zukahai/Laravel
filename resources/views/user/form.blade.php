<form action="" method="post">
    @csrf
    <input type="text" name="haha" value="{{old('haha')}}">
    <button type="submit" name="" class="btn btn-warning">Submit</button>
</form>
