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

@section('content')
    <div class="m-4 rounded-lg w-[calc(100vw-320px)] h-screen max-h-[1000px] p-3 bg-gray-300 text-black">
        <x-breadcrumbs :items="$breadcrumbs" separator="o-slash" />
        <hr class="mt-3">
        <div>

            @if (!$jobs->isEmpty())
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
                                <th class="px-4 py-3 text-center">Applay</th>
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
                                            <span
                                                class="px-2 py-1 text-xs font-semibold text-red-800 bg-red-100 rounded-full">
                                                Inativo
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-center">
                                        <span
                                            class="px-2 py-1 text-sm font-semibold text-yellow-800 bg-yellow-100 rounded-md">{{ $job->employees_count }}</span>
                                    </td>
                                    <td><a href="{{ route('job.edit', ['id' => $job->id]) }}">
                                            <x-icon name="o-arrow-right-circle" class="w-6 h-6" />
                                        </a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mx-2 my-7">{{ $jobs->links('pagination::tailwind') }}</p>
                    </div>


                </div>
            @else
                <div class="flex flex-col items-center justify-center p-6 max-w-lg mx-auto">
                    <div class="flex items-center justify-center w-24 h-24 bg-orange-500 rounded-full shadow-lg">
                        <x-icon name="o-exclamation-triangle" class="w-12 h-12 text-white" />
                    </div>

                    <div class="mt-4 text-center">
                        <p class="text-gray-800 text-xl font-semibold">Nenhuma vaga cadastrada</p>
                        <p class="text-gray-600 mt-1">Clique abaixo para abrir sua primeira vaga!</p>
                    </div>

                    <a class="mt-6 bg-orange-500 hover:bg-orange-600 text-white font-medium px-6 py-3 rounded-xl shadow transition cursor-pointer"
                        href="{{ route('job.create') }}">

                        Abrir Vaga
                    </a>
                </div>
            @endif
        </div>
    @endsection
