@extends('layout')

@section('content')
    <a href="{{route('listUser')}}">Cadastro de usuário</a>
    <a href="{{route('listProfile')}}">Cadastro de perfil</a>
    <a href="{{route('post.index')}}">Posts</a>
@stop