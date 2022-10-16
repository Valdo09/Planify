@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <h1 class="mb-3">Liste des tâches</h1>

            <div class="d-flex justify-content-end my-5">
                <a href="{{route('export-tasks')}}" class="btn btn-success me-3"><i class="bi bi-file-earmark-excel-fill me-3   "></i>Exporter au format Excel</a>
                <a href="{{route('tasks.create')}}" class="btn btn-primary me-3"> <i class="bi bi-plus-lg me-3 "></i> Ajouter une nouvelle tâche</a>
            </div>

            <table class="table">
                <tr>
                    <th>N°</th>
                    <th>Tâches</th>
                    <th>Libelle</th>
                    <th>Actions</th>
                </tr>

                <tbody>
                @foreach($tasks as $task)

                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="">{{$task->title}}</td>
                        <td class="">{{$task->description}}</td>
                        <td>
                            <div class="d-flex">
                                <form action="{{route('change.status', $task->id)}}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}
                                    @if ($task->status=="En cours")
                                        <button type="submit" class="btn btn-success me-3">
                                            <i class="bi bi-check-circle-fill"></i>
                                        </button>
                                    @else
                                        <button type="submit" class="btn btn-danger me-3">
                                            <i class="bi bi-x-circle-fill"></i>
                                        </button>

                                    @endif

                                </form>
                                <a href="{{route('tasks.edit',$task->id)}}" class="btn btn-primary me-3"><i class="bi bi-pencil-fill"></i></a>
                                <button class="btn btn-danger" onclick="document.getElementById('model-open-{{$task->id}}').style.display='block'"><i class="bi bi-trash-fill"></i></button>
                                <form action="{{route('tasks.destroy',$task->id)}}" method="POST"   >
                                    @csrf
                                    @method("DELETE")
                                    <div class="modal" id="model-open-{{$task->id}}">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">

                                                <div class="modal-body">
                                                    <p>Etes-vous sûr de vouloir supprimer cette tâche?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-success">Confirmer</button>
                                                    <button type="button" class="btn btn-danger"  onclick="document.getElementById('model-open-{{$task->id}}').style.display='none'" data-bs-dismiss="modal">Annuler</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                        </form>
                            </div>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>


            {{ $tasks->links('layouts.pagination') }}

                </div>

</div>
@endsection
