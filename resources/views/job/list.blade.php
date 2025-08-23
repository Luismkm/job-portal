@php
    $breadcrumbs = [
        [
            'link' => route('company.dashboard'),
            'icon' => 's-home',
        ],
        [
            'label' => 'Vagas',
        ],
        [
            'label' => 'Visualizar',
        ],
    ];
    $users = [
        'id' => '#default',
        'name' => 's-home',
    ];

@endphp

@extends('layouts.app')

@section('sidebar')
    @include('company.layouts.sidebar')
@endsection

@section('content')
    <div class="m-4 rounded-lg w-[calc(100vw-320px)] h-screen max-h-[1000px] p-3 bg-gray-300">
        <x-breadcrumbs :items="$breadcrumbs" separator="o-slash" />
        <hr class="mt-3">
        <div>
            @if (session('success'))
                <p class="bg-green-300">Mensagem: {{ session('success') }}</p>
            @endif
            <p class="text-2xl mt-5 mb-6">Lista de vagas</p>

            <div class="overflow-x-auto rounded-lg shadow-md border border-gray-200">
                <table class="w-full text-sm text-gray-700 table-auto">
                    <thead class="bg-gray-100 text-gray-800 uppercase text-xs">
                        <tr>
                            <th class="px-4 py-3 text-left">Título</th>
                            <th class="px-4 py-3 text-center">Salário</th>
                            <th class="px-4 py-3 text-center">Período</th>
                            <th class="px-4 py-3 text-center">Categoria</th>
                            <th class="px-4 py-3 text-center">Criada em</th>
                            <th class="px-4 py-3 text-center">Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($jobs as $job)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-4 py-3 font-medium text-gray-900">{{ $job->title }}</td>
                                <td class="px-4 py-3 text-center">R$
                                    {{ \App\Enums\SalaryEnum::tryFrom($job->salary)?->description() }}</td>
                                <td class="px-4 py-3 text-center">
                                    {{ \App\Enums\PeriodEnum::tryFrom($job->period)?->description() }}</td>
                                <td class="px-4 py-3 text-center">
                                    {{ \App\Enums\CategoryEnum::tryFrom($job->category)?->description() }}</td>
                                <td class="px-4 py-3 text-center">{{ $job->created_at->format('d/m/Y') }}</td>
                                <td class="px-4 py-3 text-center">
                                    @if ($job->status === 'ativo')
                                        <span
                                            class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">
                                            Ativo
                                        </span>
                                    @else
                                        <span class="px-2 py-1 text-xs font-semibold text-red-800 bg-red-100 rounded-full">
                                            Inativo
                                        </span>
                                    @endif
                                </td>
                                <td><a href="{{ route('job.edit', ['id' => $job->id]) }}"><svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m12.75 15 3-3m0 0-3-3m3 3h-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    </a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mx-2 my-7">{{ $jobs->links('pagination::tailwind') }}</p>
                </div>


            </div>

        </div>
    @endsection
