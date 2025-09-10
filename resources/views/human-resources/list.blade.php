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
            'label' => 'Visualizar usuários de RH',
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
            @if (!$rhUsers->isEmpty())
                <p class="text-2xl mt-5 mb-6">Lista de vagas</p>
                <div class="overflow-x-auto rounded-lg shadow-md border border-gray-200">
                    <table class="w-full text-sm text-gray-700 table-auto">
                        <thead class="bg-gray-100 text-gray-800 uppercase text-xs">
                            <tr>
                                <th class="px-4 py-3 text-left">Nome</th>
                                <th class="px-4 py-3 text-center">Email</th>
                                <th class="px-4 py-3 text-center">Verificado</th>
                                <th class="px-4 py-3 text-center">Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($rhUsers as $rhUser)
                                <tr class="hover:bg-gray-50 transition-colors">
                                    <td class="px-4 py-3 font-medium text-gray-900">{{ $rhUser->user->name }}</td>
                                    <td class="px-4 py-3 text-center">{{ $rhUser->user->email }}</td>
                                    <td class="px-4 py-3 text-center">
                                        @if ($rhUser->user->email_verified_at === null)
                                            <span
                                                class="px-2 py-1 text-xs font-semibold text-red-800 bg-red-100 rounded-full">
                                                Não verificado
                                            </span>
                                        @else
                                            <span
                                                class="px-2 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">
                                                Verificado
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-center" id="status-{{ $rhUser->user->id }}"
                                        onclick="handleStatus('{{ $rhUser->user->id }}')">
                                        @if ($rhUser->user->status === 'ativo')
                                            <x-icon name="o-lock-open"
                                                class="w-9 h-7 bg-green-100 text-green-800 p-1 rounded-full cursor-pointer" />
                                        @else
                                            <x-icon name="o-lock-closed"
                                                class="w-9 h-7 bg-red-100 text-red-800 p-1 rounded-full cursor-pointer" />
                                        @endif
                                    </td>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mx-2 my-7">{{ $rhUsers->links('pagination::tailwind') }}</p>
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

    </div>
@endsection

<script>
    async function handleStatus(userId) {
        try {
            const response = await fetch(`/company/human-resources/${userId}/handle-status`, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                }
            });

            if (!response.ok) throw new Error("Erro na requisição");

            const data = await response.json();

            const td = document.getElementById(`status-${userId}`);

            td.innerHTML = data.status === "ativo" ?
                `<x-icon name="o-lock-open" class="w-9 h-7 bg-green-100 text-green-800 p-1 rounded-full cursor-pointer" />` :
                `<x-icon name="o-lock-closed" class="w-9 h-7 bg-red-100 text-red-800 p-1 rounded-full cursor-pointer" />`;

        } catch (error) {
            console.error(error);
            alert("Não foi possível atualizar o status.");
        }
    }
</script>
