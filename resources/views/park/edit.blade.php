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

<form action="/park/{{$park->id}}" method="post">
    <input type="text" name="plat" placeholder="judul" value="{{$park->plat}}"> <br>
    <textarea name="foto" cols="30" rows="10" placeholder="subject">{{$park->foto}}</textarea>
    <input type="submit" value="edit">
    <input type="hidden" value="{{ csrf_token() }}" name="_token">
    <input type="hidden" value="put" name="_method">
</form>