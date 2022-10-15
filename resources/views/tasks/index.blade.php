@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="ui table">
                        <thead>
                            <tr>
                                <th class="three wide">Tâches</th>
                                <th class="ten wide">&nbsp;</th>
                                <th class="three wide">
                                    <button type="button" class="ui icon button">
                                       
                                            <a href="{{route('tasks.create')}}">  <i class="add icon">  </i></a>
                                      
                                    </button>
                                   
                                </th>
                                
                               
                            </tr>
                        </thead>
                    
                        <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    @if ($task->status=="En cours")
                                    <td class="">{{$task->title}}</td>
                                    <td class="">{{$task->description}}</td>
                                    @else
                                    <td class="disabled task-done">{{$task->title}}</td>
                                    <td class="disabled task-done">{{$task->description}}</td>

                                    @endif
                                    
                                    <td class=" aligned">
                                        <form action="{{route('change.status', $task->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('PATCH') }}
                                        @if ($task->status=="En cours")
                                            <button type="submit" class="ui positive icon button">
                                                <i class="check icon"></i>
                                            </button>
                                        @else
                                            <button type="submit" class="ui negative icon button">
                                                <i class="minus icon"></i>
                                            </button>

                                        @endif

                                        </form>
                                        <button type="button" class="ui icon button">
                                            <a href="{{route('tasks.edit',$task->id)}}">
                                                <i class="edit icon"></i>
                                            
                                            </a>
                                        </button>
                                   
                                        <button type="button" class="ui icon button" onclick="document.getElementById('model-open-{{$task->id}}').style.display='block'">
                                            <i class="trash icon"></i>
                                        </button>
                                                <form action="{{route('tasks.destroy',$task->id)}}" method="POST">
                                                    @csrf
                                                    @method("DELETE")
                                                    <div class="modal" id="model-open-{{$task->id}}">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                        
                                                        <div class="modal-body">
                                                            <p>Etes-vous sûr de vouloir supprimer cette tâche?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Oui</button>
                                                            <button type="button" class="btn btn-secondary"  onclick="document.getElementById('model-open-{{$task->id}}').style.display='none'" data-bs-dismiss="modal">Annuler</button>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </td>
                                                    
                                            
                                                <td><span></span></td>
                                                <td class="d-flex">
                                            </form>
                                </tr>
                            @endforeach
                        </tbody>
                    
                    </table>
                    
                    {{ $tasks->links('layouts.pagination') }}
                </div>
            
</div>
@endsection
