@extends('layouts.app')
@section('content')

<div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
<div class="card">
  <div class="card-header">
   {{$posts->user_name}}'s Post
  </div>
  <div class="card-body">
    <h5 class="card-title">Question : {{$posts->question}}</h5>
    <br>
    @if(!empty($posts->image))
    <img src="{{ asset('images/'.$posts->image)}}" style="display:grid; justify-item: center; " alt="image">  
    @endif
    <br>
    <h5><br>Answers</h5>
    @foreach($answers as $answer)

    <h6>{{$answer->user_name}} :- {{$answer->answer}}</h6>

    @endforeach
    <form method="post" action="{{route('answer.store', $posts->id)}}">
    @csrf<br>
        <h5 style="text-align:left">Add Answer </h5> 
        <textarea  class="form-control" rows="3" name="answer" cols="85"> </textarea>
        <br>
        <button class="btn btn-dark" type="submit">Add</button>
    </form>
  </div>
</div>
</div>
</div>
</div>
</div>

@endsection