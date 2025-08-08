@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('work-day.index') }}" method="get">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <label for="inputPassword6" class="col-form-label">{{ __('Data') }}</label>
                            </div>
                            <div class="col">
                                <input type="month" class="form-control" id="date" name="date" value="{{ $date->format('Y-m') }}">
                            </div>
                            <div class="col-auto">
                                <input type="submit" class="btn btn-primary" value="{{ __('Filtrar') }}">
                            </div>
                        </div>
                    </form>

                    <a type="button" class="btn btn-success" aria-current="page" href="{{ route('work-day.create') }}">{{ __('Novo') }}</a>

                    @if($workDays->isEmpty())
                        <p class="text-center">
                            {{ __('Nenhum ponto registrado nesse mes') }}
                        </p>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('Data') }}</th>
                                    <th scope="col">{{ __('Pontos') }}</th>
                                    <th scope="col">{{ __('Visualizar') }}</th>
                                    <th scope="col">{{ __('Excluir') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($workDays as $workDay)
                                    <tr>
                                        <td>{{ $workDay->date }}</td>
                                        <td>{{ $workDay->checkpoints_count }}</td>
                                        <td><a type="button" class="btn btn-primary" aria-current="page" href="{{ route('work-day.show', ['id' => $workDay->id]) }}">{{ __('Visualizar') }}</a></td>
                                        <td><form action="{{ route('work-day.destroy', $workDay->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-danger" value="{{ __('Excluir') }}">
                                        </form></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
