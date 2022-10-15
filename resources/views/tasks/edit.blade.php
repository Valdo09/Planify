@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row mt-4 justify-content-center">
        <div class="col-md-6 align-items-center">
            <div class="card">
                <div class="card-header text-center">{{__("Modification de la tâche ")}} 
                <strong style="font-size: 18px">{{$task->title}}</strong>
                
                </div>
                <div class="card-body">
                    <form action="{{route('tasks.update',$task->id)}}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Titre') }}</label>

                            <div class="col-md-8">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$task->title}}" required autocomplete="name" autofocus>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="description " class="col-md-4 col-form-label text-md-end">Description</label>

                            <div class="col-md-8">
                                <textarea class="form-control" id="description" rows="3" name="description">{{$task->description}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="endDate" class="col-md-4 col-form-label text-md-end">{{__('Date de fin')}}</label>
                            <div class="col-md-8">
                                <input type="date" name="endDate" id="endDate" class="form-control" value="{{date('Y-m-d',strtotime($task->end_date))}}" min="{{date('Y-m-d')}}">
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4 text-end">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Modifier') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection