@if(count($errors)>0)
    <ul>
        @foreach($errors->all() as $error)
            <li>
                {{$error}}
            </li>
        @endforeach
    </ul>
@endif
<h1>create park post</h1>

<form action="/park" method="post">
    <input type="text" name="plat" placeholder="platna"> <br>
    <input type="text" name="foto" placeholder="fotona"> <br>
    <input type="submit" value="post">
    <input type="hidden" value="{{ csrf_token() }}" name="_token">
</form>