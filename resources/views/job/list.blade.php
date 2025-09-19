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
                                        <div x-data="jobModalHandler()">
                                            <button x-on:click="openModalCandidates('{{ $job->id }}')"
                                                class="px-2 py-1 text-sm font-semibold text-yellow-800 bg-yellow-100 rounded-md">
                                                {{ $job->employees_count }}
                                            </button>

                                            <x-cv-modal x-show="modalIsOpen" x-cloak :job="$job">
                                                <template x-for="emp in employees" :key="emp.id">
                                                    <tr class="hover:bg-gray-50 transition-colors">
                                                        <td class="px-4 py-3"><label for="checkboxSuccess"
                                                                class="flex items-center gap-2 text-sm font-medium text-neutral-600 dark:text-neutral-300 has-checked:text-neutral-900 dark:has-checked:text-white has-disabled:opacity-75 has-disabled:cursor-not-allowed">
                                                                <span class="relative flex items-center">
                                                                    <input :value="emp.user_id" x-model="selected" type="checkbox"
                                                                        class="child-checkbox before:content[''] peer relative size-4 appearance-none overflow-hidden rounded-sm border border-neutral-300 bg-neutral-50 before:absolute before:inset-0 checked:border-green-500 checked:before:bg-green-500 focus:outline-2 focus:outline-offset-2 focus:outline-neutral-800 checked:focus:outline-green-500 active:outline-offset-0 disabled:cursor-not-allowed dark:border-neutral-700 dark:bg-neutral-900 dark:checked:border-green-500 dark:checked:before:bg-green-500 dark:focus:outline-neutral-300 dark:checked:focus:outline-green-500" />
                                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                                        aria-hidden="true" stroke="currentColor" fill="none" stroke-width="4"
                                                                        class="pointer-events-none invisible absolute left-1/2 top-1/2 size-3 -translate-x-1/2 -translate-y-1/2 text-white peer-checked:visible dark:text-white">
                                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                                            d="M4.5 12.75l6 6 9-13.5" />
                                                                    </svg>
                                                                </span>
                                                            </label>
                                                        </td>
                                                        <td class="px-4 py-3 text-left font-medium text-gray-900" x-text="emp.name"></td>
                                                        <td class="px-4 py-3  text-center" x-text="emp.created_at"></td>
                                                        <td class="px-4 py-3  text-center">
                                                            <a :href="'{{ url("/job/{$job->id}/employee") }}/' + emp.id + '/cv/view'" target="_blank">
                                                                <x-icon name="o-document-magnifying-glass" title="Visualizar" />
                                                            </a>
                                                        </td>
                                                        <td class="px-4 py-3 text-center"><x-icon name="o-eye" title="Visualizado" x-show="emp.was_viewed" /></td>
                                                        <td class="px-4 py-3  text-center">
                                                            <a href="#"><x-icon name="o-archive-box-arrow-down" /></a>
                                                            <x-icon title="Download já realizado" name="o-check" class="text-green-500" x-show="emp.was_viewed" />
                                                        </td>
                                                    </tr>
                                </template>
                                </x-modalcv>
                </div>

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

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('jobModalHandler', () => ({
            modalIsOpen: false,
            employees: [],
            selected: [],

            async openModalCandidates(jobId) {
                try {
                    const res = await fetch(`/jobs/${jobId}/candidates`);
                    if (!res.ok) throw new Error('Erro ao buscar candidatos');

                    const data = await res.json();
                    this.employees = data.employees;
                    this.modalIsOpen = true;
                } catch (e) {
                    alert(e.message);
                }
            },

            async baixarSelecionados() {

                if (this.selected.length === 0) {
                    alert('Selecione alguém');
                    return;
                }

                const res = await fetch(
                    "{{ route('candidates.downloadSelected', $job->id) }}", {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            user_ids: this.selected
                        })
                    });

                if (!res.ok) {
                    alert('Erro');
                    return;
                }

                const data = await res.json();
                if (data.url) window.open(data.url, '_blank');
            }
        }))
    })
</script>
