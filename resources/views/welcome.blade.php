@extends('layouts.frontend')
@section('content')

<div>
  
<h1><span id="typing-text"></span></h1>
    <p class="lead">Explore our knowledge-sharing community, ask questions, and collaborate with learners and experts on our user-friendly web app, inspired by <b>FILL</b>. <br>Join now!!!</p>
    <p class="lead">
      <a href="{{route('login')}}" class="btn btn-lg btn-light fw-bold border-white bg-white">Login</a>
    </p>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const textElement = document.getElementById('typing-text');
    const text = 'Learn Share And Grow';
    let index = 0;

    function typeText() {
      if (index < text.length) {
        textElement.textContent += text[index];
        index++;
        setTimeout(typeText, 100); // Adjust typing speed (milliseconds)
      }
    }

    typeText();
  });

 
</script>

@endsection