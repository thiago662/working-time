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

                    @if (is_null($workDay))
                        {{ __('Dia de trabalho não encontrado') }}
                    @else
                        <form action="{{ route('checkpoint.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="hidden" name="work_day_id" value="{{ $workDay->id }}">
                                <label for="checked_at" class="form-label">{{ __('Data') }}</label>
                                <input type="date" class="form-control" id="date" name="date" value="{{ $workDay->date }}" readonly>
                                <input class="form-check-input" type="checkbox" id="meuCheckbox" onchange="
                                    var data = new Date(this.form.elements['date'].value);
                                    if (this.form.elements['meuCheckbox'].checked) {data.setDate(data.getDate() + 1)} else {data.setDate(data.getDate() - 1)}
                                    console.log(data.toISOString().substring(0, 10));
                                    this.form.elements['date'].value = data.toISOString().substring(0, 10);
                                ">
                                <label class="form-check-label" id="meuCheckbox" for="meuCheckbox">
                                    {{ __('ponto noturno') }}
                                </label>
                                <br>
                                <label for="time" class="form-label">{{ __('Hora') }}</label>
                                <input type="time" class="form-control" id="time" name="time">
                            </div>
                            <input type="submit" class="btn btn-primary" value="{{ __('Salvar') }}">
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
