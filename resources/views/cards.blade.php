
@foreach($items as $elem)
    <div class="card col-2 m-2 p-2" style="width: 18rem;">
        @if($elem->photo != NULL)
            <img src="{{$elem->photo}}" class="card-img-top">
        @endif
        <p class="card-text">{{$elem->text}}</p>
        <p class="card-text">Лайки: {{$elem->like}}</p>
        <p class="card-text">Репосты: {{$elem->reposts}}</p>
        <p class="card-text">Комментарии: {{$elem->comments}}</p>
        <a href="{{$elem->link}}" class="btn btn-primary">Пост</a>
    </div>
@endforeach
