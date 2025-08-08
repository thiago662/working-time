@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('edit') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('work-day.update', $workDay->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <input type="hidden" name="id" value="{{ $workDay->id }}">
                            <label for="date" class="form-label">Date</label>
                            <input type="date" class="form-control" id="date" value="{{ $workDay->date }}">
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
