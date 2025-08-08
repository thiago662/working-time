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

                    <form action="{{ route('home.store') }}" method="POST">
                        @csrf
                        <div>
                            @if ($workDay)
                                <input type="hidden" name="work_day_id" value="{{ $workDay->id }}">
                            @endif
                        </div>
                        <input type="submit" class="btn btn-primary" value="{{ __('Registrar ponto') }}">
                    </form>

                    @if ($workDay)

                        <p>{{ __('Data: ') }}{{ $workDay->date }}</p>
                        <p>{{ __('Pontos do dia') }}</p>
                        @foreach ($workDay->checkpoints as $index => $checkpoint)
                            <p>
                                @if ($index % 2 == 0)
                                    <span class="badge text-bg-success">{{ __('Entrada') }}</span>
                                @else
                                    <span class="badge text-bg-danger">{{ __('Saida') }}</span>
                                @endif
                                {{ $checkpoint->checked_at }}
                            </p>
                        @endforeach
                    @else
                        <p class="text-center">
                            {{ __('Nenhum registro de ponto hoje') }}
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
