@extends('layout')

@section('content')

<script>
function goBack() {
  window.history.back()
}
</script>

<form action="{{route('storeUser')}}" method="post">
  @csrf
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name" @if (isset($user)) value="{{$user->name}}" @endif><br>
  <label for="email">email:</label><br>
  <input type="text" id="email" name="email" @if (isset($user)) value="{{$user->email}}" @endif><br>
  <label for="password">senha:</label><br>
  <input type="password" id="password" name="password"><br>
  <label for="profile_id">perfil:</label><br>
  <select name="profile_id" id="profile_id">
    @foreach ($profiles as $profile)
    <option value="{{$profile->id}}" @if (isset($user) && $profile->id == $user->profile_id)selected="selected" @endif>{{$profile->descricao}} </option>
    @endforeach
  </select><br>
  @if (isset($user))
  <input type="hidden" id="id" name="id" value="{{$user->id}}">@endif
  <div>
    <button name="submit" value="submit" type="submit">Confirmar</button>
    <button onclick="goBack()" type="button">Cancelar</button>
  <div>
</form>

@if($errors->any())
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>

        @foreach($errors->all() as $error)
            {{ $error }}<br/>
        @endforeach
    </div>
@endif

@stop