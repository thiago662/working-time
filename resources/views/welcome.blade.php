@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h2>{{ __('Working Time') }}</h2>
                    <p>
                        {{ __('O Working Time é um sistema de controle de tempo de trabalho desenvolvido com Laravel, PostgreSQL e Docker. O objetivo principal é colocar em prática os estudos de programação sobre Laravel e seus recursos, como:') }}
                    </p>
                    <ul class="list-group">
                        <li class="list-group-item">{{ __('Blade para construção de interfaces gráficas') }}</li>
                        <li class="list-group-item">{{ __('Estrutura MVC, um padrão de arquitetura de desenvolvimento muito eficiente para pequenos projetos') }}</li>
                        <li class="list-group-item">{{ __('Laravel UI facilita a construção de interfaces gráficas com Bootstrap') }}</li>
                        <li class="list-group-item">{{ __('Laravel UI Auth ajuda a gerenciar a autenticação de usuários baseada em sessão') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
