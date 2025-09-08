@php
    $breadcrumbs = [
        [
            'link' => route('company.dashboard'),
            'icon' => 's-home',
        ],
        [
            'label' => 'Recursos Humanos ',
        ],
        [
            'label' => 'Criar usuário',
        ],
    ];
    $users = [
        'id' => '#default',
        'name' => 's-home',
    ];

@endphp

@extends('layouts.app')

@section('content')
    <div class="m-4 rounded-lg w-[calc(100vw-320px)] p-3 bg-gray-300 text-black">
        <x-breadcrumbs :items="$breadcrumbs" separator="o-slash" />
        <hr class="mt-3">
        <div>
            @if (session('success'))
                <p class="bg-green-300">Mensagem: {{ session('success') }}</p>
            @endif
            <p class="text-2xl mt-5">Criar um usuário</p>
            <form action="{{ route('human-resources.store') }}" method="POST">
                @csrf
                <input type="hidden" name="company_id" value="{{ auth()->user()->company->id }}">

                <label class="text-xs font-semibold" for="name">Nome</label>
                <input
                    class="block my-2 w-full border border-gray-300 focus:border-primary focus:ring-0 focus:outline-none rounded-lg"
                    name="name" placeholder="Nome" />
                @error('name')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror

                <label class="text-xs font-semibold" for="enail">Email</label>
                <input
                    class="block my-2 w-full border border-gray-300 focus:border-primary focus:ring-0 focus:outline-none rounded-lg"
                    name="email" placeholder="Email" />
                @error('email')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror

                <button class="bg-primary w-20 h-12 p-2 rounded-lg mt-8" type="submit">Salvar</button>
            </form>

        </div>

    </div>
@endsection
