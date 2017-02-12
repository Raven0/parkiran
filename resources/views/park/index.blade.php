<h1>ALL PARK</h1><br>
<a href="park/create">CREATE</a>
{{ Session::get('pesan') }}
<br>
@foreach($parks as $park)
    <a href="/park/{{$park->slug}}">
        <p> {{ $park->plat}} </p>
    </a>
    <p> {{ $park->foto}} </p>
    {{ date('F d, Y', strtotime($park->created_at))}}
    <br><br>
    <a href="/park/{{$park->id}}/edit"> EDIT</a>
    <form action="/park/{{$park->id}}" method="post">
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
        <input type="hidden" value="delete" name="_method">
        <input type="submit" value="delete">
    </form>
    <hr>
@endforeach


{!! $parks->links() !!}