@extends('partials.layout')

@section('content')
<div class="content">
  <img id="img-principal" src="{{ asset('/img/turismo.jpg') }}" alt="principal" class="img-responsive img-rounded">
</div>

<script>
    if (localStorage.getItem("login")) {
        window.location.href = "/administrador";
    }
</script>

@endsection