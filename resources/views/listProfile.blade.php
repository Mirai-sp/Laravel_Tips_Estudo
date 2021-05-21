<?php //injetar a blade layout nesta pagina, comentario php nesta linha ?> 
@extends('layout')

@section('content')
<h1> Listagem de pefils</h1>
<table>
    <thead>
        <tr>
            <td><b>Código</b></td>
            <td><b>Descrição</b></td>
            <td><b>Inserido em</b></td>
            <td><b>Atualizado em</b></td>            
            <td><b>Ação</b></td>
        </tr>
    </thead>
    <tbody>
    @forelse ($profiles as $profile)
    
        <tr>
            <td>{{$profile->id}}</td>
            <td>{{$profile->descricao}}</td>        
            <td>{{date('d/m/Y H:i:s', strtotime($profile->created_at))}}</td> <?php //comentario PHP, caso usar o model para select poderia ter sido feito da seguinte forma: $user->created_at->format('d/m/Y H:n:s') ?>
            <td>{{date('d/m/Y H:i:s', strtotime($profile->updated_at))}}</td>            
            <td><a href="{{route('viewProfile', ['profile'=>$profile])}}">Editar</a> <a href="{{route('deleteProfile', [$profile->id])}}">Deletar</a>
        </tr>
        @empty
        <tr>
            <td colspan="5"><b>Nenhum registro encontrado</b></td> 
        </tr>
    @endforelse
    </tbody>
</table>
<a href="{{route('addProfile')}}">Cadastrar pefil</a>
<a href="{{route('/')}}">Início</a>@stop