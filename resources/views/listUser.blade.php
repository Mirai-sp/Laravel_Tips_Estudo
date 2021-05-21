<?php //injetar a blade layout nesta pagina, comentario php nesta linha ?> 
@extends('layout')

@section('content')
<h1> Listagem de usuário</h1>
<table>
    <thead>
        <tr>
            <td><b>Usuário</b></td>
            <td><b>Email</b></td>
            <td><b>Inserido em</b></td>
            <td><b>Atualizado em</b></td>
            <td><b>Perfil</b></td>
            <td><b>Ação</b></td>
        </tr>
    </thead>
    <tbody>
    @forelse ($users as $user)    
        <tr>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>        
            <td>{{date('d/m/Y H:i:s', strtotime($user->created_at))}}</td> <?php //comentario PHP, caso usar o model para select poderia ter sido feito da seguinte forma: $user->created_at->format('d/m/Y H:n:s') ?>
            <td>{{date('d/m/Y H:i:s', strtotime($user->updated_at))}}</td>
            <td>{{$user->profile}}</td>
            <td><a href="{{route('viewUser', [$user->id])}}">Editar</a> <a href="{{route('deleteUser', [$user->id])}}">Deletar</a>
        </tr>
        @empty
        <tr>
            <td colspan="5"><b>Nenhum registro encontrado</b></td> 
        </tr>    
    @endforelse
    </tbody>
</table>
<a href="{{route('addUser')}}">Cadastrar usuário</a>
<a href="{{route('/')}}">Início</a>@stop