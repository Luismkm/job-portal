@props(['job'])

<div {{-- x-data="{ modalIsOpen: false, employees: [] }" --}}>
   {{--  <button x-on:click="modalIsOpen = true" type="button">
        <span
            class="px-2 py-1 text-sm font-semibold text-yellow-800 bg-yellow-100 rounded-md">{{ $job->employees_count }}</span>
    </button> --}}
    <div x-cloak x-show="modalIsOpen" x-transition.opacity.duration.200ms x-trap.inert.noscroll="modalIsOpen"
        x-on:keydown.esc.window="modalIsOpen = false" x-on:click.self="modalIsOpen = false"
        class="fixed inset-0 z-30 flex items-end justify-center bg-black/20 p-4 pb-8 backdrop-blur-md sm:items-center lg:p-8"
        role="dialog" aria-modal="true" aria-labelledby="defaultModalTitle">
        <!-- Modal Dialog -->
        <div x-show="modalIsOpen"
            x-transition:enter="transition ease-out duration-200 delay-100 motion-reduce:transition-opacity"
            x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100"
            class="flex w-3/4 flex-col gap-4 overflow-hidden rounded-sm border border-neutral-300 bg-white">
            <!-- Dialog Header -->
            <div class="flex items-center justify-between border-b border-neutral-300 bg-neutral-50/60 p-4">
                <h3 id="defaultModalTitle" class="font-semibold tracking-wide text-neutral-900">
                    {{ $job->title }}</h3>
                <button x-on:click="modalIsOpen = false" aria-label="close modal">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" aria-hidden="true" stroke="currentColor"
                        fill="none" stroke-width="1.4" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <!-- Dialog Body -->
            <div x-data="{ allChecked: false }" class="px-4 py-8 flex flex-1 overflow-y-auto max-h-[400px] my-5">
                <table class="w-full max-h-72 text-sm text-gray-700 table-auto overflow-y-auto">
                    <thead class="bg-gray-100 text-gray-800 uppercase text-xs">
                        <tr>
                            <th class="px-4 py-3">
                                <label class="flex items-center gap-2 font-semibold">
                                    <input type="checkbox" x-model="allChecked"
                                        @change="document.querySelectorAll('.child-checkbox').forEach(cb => cb.checked = allChecked)">
                                </label>
                            </th>
                            <th class="px-4 py-3 text-left">Nome</th>
                            <th class="px-4 py-3 text-center">Data</th>
                            <th class="px-4 py-3 text-center">PDF</th>
                            <th></th>
                            <th class="px-4 py-3 text-center">Download</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 uppercase">
                        {{ $slot }}
                    </tbody>
                </table>
            </div>
            <!-- Dialog Footer -->
            <div
                class="flex flex-col-reverse justify-between gap-2 border-t border-neutral-300 bg-neutral-50/60 p-4 dark:border-neutral-700 dark:bg-neutral-950/20 sm:flex-row sm:items-center md:justify-end">
                <button type="button" @click="baixarSelecionados"
                    class="whitespace-nowrap rounded-sm px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-600 transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:text-neutral-300 dark:focus-visible:outline-white">
                    <x-icon name="o-clipboard-document-check" />
                    Baixar selecionados
                </button>
                <button x-on:click="modalIsOpen = false" type="button"
                    class="whitespace-nowrap rounded-sm bg-black border border-black dark:border-white px-4 py-2 text-center text-sm font-medium tracking-wide text-neutral-100 transition hover:opacity-75 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black active:opacity-100 active:outline-offset-0 dark:bg-white dark:text-black dark:focus-visible:outline-white">
                    <x-icon name="o-inbox-arrow-down" />
                    Baixar todos
                </button>
            </div>
        </div>
    </div>
</div>
