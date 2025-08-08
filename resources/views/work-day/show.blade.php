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

                    <form action="{{ route('work-day.destroy', $workDay->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a type="button" class="btn btn-primary" aria-current="page" href="{{ route('checkpoint.create', ['work_day_id' => $workDay->id]) }}">{{ __('Registrar ponto') }}</a>
                        <input type="submit" class="btn btn-danger" value="{{ __('Excluir') }}">
                        <p>{{ __('Data: ') }}{{ $workDay->date }}</p>
                    </form>

                    <p>{{ __('Pontos do dia') }}</p>
                    @foreach ($workDay->checkpoints as $index => $checkpoint)
                        <p>
                            <form action="{{ route('checkpoint.destroy', $checkpoint->id) }}" method="POST">
                                @if ($index % 2 == 0)
                                    <span class="badge text-bg-success">{{ __('Entrada') }}</span>
                                @else
                                    <span class="badge text-bg-danger">{{ __('Saida') }}</span>
                                @endif
                                {{ $checkpoint->checked_at }}
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger btn-sm" value="{{ __('Excluir') }}">
                            </form>
                        </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
