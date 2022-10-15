@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row mt-4 justify-content-center">
        <div class="col-md-6 align-items-center">
            <div class="card">
                <div class="card-header text-center">{{__("Ajout d'une tâche")}}</div>
                <div class="card-body">
                    <form action="{{route('tasks.store')}}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Titre') }}</label>

                            <div class="col-md-8">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="name" autofocus>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="description " class="col-md-4 col-form-label text-md-end">Description</label>

                            <div class="col-md-8">
                                <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="endDate" class="col-md-4 col-form-label text-md-end">{{__('Date de fin')}}</label>
                            <div class="col-md-8">
                                <input type="date" name="endDate" id="endDate" class="form-control" min="{{date('Y-m-d')}}">
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4 text-end">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Ajouter') }}
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