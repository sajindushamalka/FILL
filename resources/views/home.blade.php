@extends('layouts.app')

@section('content')

<div  class="d-flex h-100 text-center text-bg-dark" style="width:90%; margin: 0 auto; border-radius:10px;">
<div class="row"><br>
    <div class="col"><br><br>
    <h5>100+ Million</h5>
    <p style="##FFFDD0">monthly visitors to Stack Overflow & Stack Exchange</p><br><br>
    </div>
    <div class="col"><br><br>
    <h5>45.1+ billion</h5>
    <p style="##FFFDD0">Times a developer got help since 2008</p><br><br>
    </div>
    <div class="col"><br><br>
    <h5>191% ROI</h5>
    <p style="##FFFDD0">from companies using Stack Overflow for Teams</p><br><br>
    </div>
    <div class="col"><br><br>
    <h5>5,000+</h5>
    <p style="##FFFDD0">Fill for Teams instances active every day</p><br><br>
    </div>
</div>
<br>
<br>
</div>
<br>
<hr style="height: 3px; width: 30%; margin: 0 auto; border-radius:20px; color:black">
<br>
    <h3 style="text-align:center">Post Your Question Here</h3>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Post your question') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                  <form method="post" action="{{route('posts.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Question</label>
                        <textarea class="form-control" name="question" id="exampleFormControlTextarea1" rows="3" required></textarea>
                        <br>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Image</label>
                            <input class="form-control" name="image" type="file">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-dark">Publish</button>
                    </div><br>
                        <a href="{{route('posts.my.all')}}" style="color:black">My Questions</a>
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>


<br>
<hr style="height: 3px; width: 30%; margin: 0 auto; border-radius:20px; color:black">
<br>
    <h3 style="text-align:center">Questions</h3>
    
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div> 
    @foreach ($posts as $post)
        <div class="card ">
        <div class="card-header">
            <h6>User Name : {{$post->user_name}} <span style="padding-left:420px"> {{date('y-m-d', strtotime($post->created_at))}} </span></h6>
            
        </div>
      
        <div class="card-body">
            <h3 class="card-title">{{$post->question}}</h3>
            @php
                $iteration = 0;
            @endphp
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
            <div> 
             <a style="width:9%" href="{{route('posts.one', $post->id)}}" class="btn btn-dark">View</a>
            </div>
            <br>
            <form method="post" action="{{route('answer.store', $post->id)}}">
                @csrf
                    <p style="text-align:left">Add Answer </p> 
                    <textarea  class="form-control" rows="3" name="answer" cols="85"> </textarea>
                    <br>
                    <button type="submit" class="btn btn-dark">Add</button>
                </form>
        </div>
        
        <div class="card-footer text-muted">
           
        </div>
        </div>
        <br>
        @endforeach
    </div>
    </div>
    </div>
    </div>
<br>

@endsection
