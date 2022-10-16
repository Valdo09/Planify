@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row mt-4 justify-content-center">
        <div class="col-md-6 align-items-center">
            <div class="card">
                <div class="card-header text-center bg-success text-white">{{__("Ajouter une tâche")}}</div>
                <div class="card-body">
                    <form action="{{route('tasks.store')}}" method="POST">
                        @csrf
                        <div class=" mb-3">
                            <label for="title" class="form-label">{{ __('Titre') }}</label>

                            <div class="">
                                <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="name" autofocus>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="description " class="form-label">Description</label>

                            <div class="">
                                <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="endDate" class="form-label">{{__('Date de fin')}}</label>
                            <div class="">
                                <input type="date" name="endDate" id="endDate" class="form-control" min="{{date('Y-m-d')}}">
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="d-flex justify-content-center" >
                                <button type="submit" class="btn btn-success px-5">
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
