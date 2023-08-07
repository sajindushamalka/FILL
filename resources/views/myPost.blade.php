@extends('layouts.app')
@section('content')
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 style="text-align:center">My Posts</h3><br>
    @foreach ($posts as $post)
        <div class="card">
        <div class="card-header">
          <a style="padding-left:680px" href="{{route('posts.my.delete',$post->id)}}"><img src="{{asset('delete.jpg')}}" width="3%"></a>
        </div>
      
        <div class="card-body">
            <h5 class="card-title">Question : {{$post->question}}</h5>
            @if(!empty($post->image))
            <img src="{{ asset('images/'.$post->image)}}" style="display:grid; justify-items: center; " alt="Image">
            @endif  
            @php
                $iteration = 0;
            @endphp
            <br>
            <h5>Answers </h5>
            @foreach($answers as $answer)
                @if($answer->post_id == $post->id)
                    <h6>{{$answer->user_name}} :- {{$answer->answer}}</h6>
                    @php
                        $iteration++;
                    @endphp
                    @if ($iteration >= 3)
                        @break
                    @endif
                @endif
            @endforeach
            <br>
            <form method="post" action="{{route('answer.store', $post->id)}}">
                @csrf
                    <p style="text-align:left">Add Answer </p> 
                    <textarea class="form-control" rows="3" name="answer" cols="85"> </textarea>
                    <br>
                    <button class="btn btn-dark" type="submit">Add</button>
                </form>
       <br>
        
        <div class="card-footer text-muted">
          Date :-  {{date('y-m-d', strtotime($post->created_at))}}
        </div>
        </div>
        @endforeach
</div>
</div>
</div>

@endsection