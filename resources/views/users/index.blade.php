@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    USUARIOS
                    @can('users.create')
                        <a href="{{route('users.create')}}" class="btn btn-sm btn-primary float-right">Crear Usuario</a>
                    @endcan
                </div>

                <div class="card-body">
                    @if (session('info'))
                        <div class="alert alert-success" role="alert">
                            {{ session('info') }}
                        </div>
                    @endif

                   <table class="table table-striped">
                       <thead>
                           <tr>
                                <td width="10px">Id</td>
                                <td width="100%">Nombre</td>
                                <td colspan="2" width="60px"></td>
                            </tr>
                       </thead>
                       <tbody>
                           @foreach ($users as $user)
                           <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>
                                    @can('users.edit')
                                    <a href="{{route('users.edit',$user->id)}}" class="btn btn-sm btn-success">Edit</a>
                                    @endcan
                                </td>
                                <td>
                                    @can('users.destroy')
                                    {!!Form::open(['route'=>['users.destroy',$user->id],'method'=>'DELETE'])!!}
                                        <button class="btn btn-sm btn-outline-danger">X</button>
                                    {!!Form::close()!!}
                                    @endcan
                                </td>
                           </tr>
                           @endforeach
                       </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
