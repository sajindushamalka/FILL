@extends('layouts.frontend')
@section('content')

<div style="width:60%; background-color: #A9A9A9; margin: 0 auto; border-radius:20px">
<br>
    
    <div style="width:80%; margin: 0 auto">
    @foreach ($posts as $post)
        <div class="card text-center">
        <div class="card-header">
            Name - {{$post->user_name}}
        </div>
      
        <div class="card-body">
            <h5 class="card-title">{{$post->question}}</h5>
            <div class="row" style="width:90%;  margin: 0 auto"> 
             <a href="#" class="btn btn-primary col" >Add Answer</a>
             <a class="col"></a>
             <a href="{{route('posts.one', $post->id)}}" class="btn btn-primary col">View Answer</a>
            </div>
        </div>
        
        <div class="card-footer text-muted">
           {{date('y-m-d', strtotime($post->created_at))}}
        </div>
        </div>
        <br>
        @endforeach
    </div>
<br>
</div>

@endsection