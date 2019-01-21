    @if(count($errors)>0)
        <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                <ul class="list-group">
            <li class="list-group-item">{{$error}}</li>
                </ul>
                @endforeach

        </div>
    @endif

