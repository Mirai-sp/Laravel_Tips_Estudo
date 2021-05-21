@extends('layout')

@section('content')

<script>
function goBack() {
  window.history.back()
}
</script>

@if (!isset($profile))
<form action="{{route('storeProfile')}}" method="post">
@else
<form action="{{route('editProfile', ['profile'=>$profile])}}" method="post">
@endif
  @csrf
  <label for="descricao">Descrição:</label><br>
  <input type="text" id="descricao" name="descricao" @if (isset($profile)) value="{{$profile->descricao}}" @endif><br>
  @if (isset($profile))
  <input type="hidden" id="id" name="id" value="{{$profile->id}}">@endif
  <div>
    <button name="submit" value="submit" type="submit">Confirmar</button>
    <button onclick="goBack()" type="button">Cancelar</button>
  <div>
</form>@stop