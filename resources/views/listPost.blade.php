@extends('layout')

@section('content')
<h1> Listagem de posts</h1>
<table>
    <thead>
        <tr>
            <td><b>Código</b></td>
            <td><b>Título</b></td>
            <td><b>Caminho amigável</b></td>
            <td><b>Usuário</b></td>
            <td><b>Adicionado em</b></td>            
            <td><b>Atualizado em</b></td>            
            <td><b>Ação</b></td>
        </tr>
    </thead>
    <tbody>
    @forelse ($posts as $post)    
        <tr>
            <td>{{$post->id}}</td>
            <td><a href="{{Route('post.show', [$post->id])}}">{{$post->titulo}}</a></td>        
            <td>{{$post->slug}}</td>        
            <td>{{$post->usuario}}</td>        
            <td>{{date('d/m/Y H:i:s', strtotime($post->created_at))}}</td> <?php //comentario PHP, caso usar o model para select poderia ter sido feito da seguinte forma: $user->created_at->format('d/m/Y H:n:s') ?>
            <td>{{date('d/m/Y H:i:s', strtotime($post->updated_at))}}</td>            
            <td>                                    
                <form action="{{route('post.destroy', [$post->id])}}" method="POST">
                    <a href="{{route('post.edit', ['postid'=>$post->id])}}">Editar</a>
                    @csrf
                    @method('DELETE')   
                    <button class="tim">Deletar</button>
                </form>
           </td>
        </tr>
        @empty
        <tr>
            <td colspan="7"><b>Nenhum registro encontrado</b></td> 
        </tr>    
    @endforelse
    </tbody>
</table>
<a href="{{route('post.create')}}">Cadastrar post</a>
<a href="{{route('/')}}">Início</a>@stop