@extends('layout')

@section('content')

<script>
function goBack() {
  window.history.back()
}
</script>
@if (Route::currentRouteName() == 'post.create')
<form action="{{ route('post.store')}}" method="post">
@csrf
@elseif (Route::currentRouteName() == 'post.edit')
<form action="{{route('post.update', ['postid' => $post[0]->id])}}" method="post">
@csrf
@method('PUT')
@else
<form action="#" method="post">
@csrf
@endif
  
  
    <label for="titulo">Título:</label><br>
    <input type="text" id="titulo" name="titulo" @if (isset($post)) value="{{$post[0]->titulo}}" @endif><br>
    <label for="user_id">Autor:</label><br>
    <select name="user_id" id="profile_id">
    @foreach ($users as $user)
    <option value="{{$user->id}}" @if (isset($post) && $post[0]->user_id == $user->id)selected="selected" @endif>{{$user->name}} </option>
    @endforeach
    </select>
    <label for="content">Post:</label><br>
    <textarea id="content" name="content" cols="30" rows="10">@if (isset($post)){{$post[0]->post}} @endif</textarea><br>
    @if (isset($post))
    <input type="hidden" id="id" name="id" value="{{$post[0]->id}}">@endif
    <div>
        @if (Route::currentRouteName() == 'post.create' || Route::currentRouteName() == 'post.edit') 
        <button name="submit" value="submit" type="submit">Confirmar</button>@endif
        <button onclick="goBack()" type="button">@if (Route::currentRouteName() == 'post.create' || Route::currentRouteName() == 'post.edit')Cancelar @else Voltar @endif </button>
    <div>
</form>@stop
