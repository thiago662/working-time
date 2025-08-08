@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('create') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ $workDay }}
                    <br>
                    {{ $workDay->date }}

                    <form action="{{ route('checkpoint.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="hidden" name="work_day_id" value="{{ $workDay->id }}">
                            <label for="checked_at" class="form-label">Date</label>
                            {{-- <input type="datetime-local" class="form-control" id="checked_at" name="checked_at" value="{{ $workDay->date . 'T00:00' }}"> --}}
                            <input type="date" class="form-control" id="date" name="date" value="{{ $workDay->date }}" readonly>
                            {{-- <button type="button" onclick="this.form.elements['date'].disabled = !this.form.elements['date'].disabled;">
                                Habilitar/Desabilitar
                            </button> --}}
                            {{-- <input class="form-check-input" type="checkbox" id="meuCheckbox" onchange="this.form.elements['date'].disabled = !this.form.elements['date'].disabled; this.form.elements['date'].disabled == true ?  (this.form.elements['date'].value = {{ $workDay->date }}) : (this.form.elements['date'].value = this.form.elements['date'].value)"> --}}
                            {{-- <input class="form-check-input" type="checkbox" id="meuCheckbox" onchange="this.form.elements['date'].disabled ? console.log(new Date(this.form.elements['date'].value).getDate()) : (new Date(this.form.elements['date'].value).getDate() + 1);"> --}}
                            <input class="form-check-input" type="checkbox" id="meuCheckbox" onchange="
                                var data = new Date(this.form.elements['date'].value);
                                if (this.form.elements['meuCheckbox'].checked) {data.setDate(data.getDate() + 1)} else {data.setDate(data.getDate() - 1)}
                                console.log(data.toISOString().substring(0, 10));
                                this.form.elements['date'].value = data.toISOString().substring(0, 10);
                            ">
                            <label class="form-check-label" id="meuCheckbox" for="meuCheckbox">
                                {{ __('ponto noturno') }}
                            </label>
                            <input type="time" class="form-control" id="time" name="time">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </form>

                    {{ __('Criar lista de cadastro, edição e exclusão de ponto') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
