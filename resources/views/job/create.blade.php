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
            'label' => 'Criar',
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
    <div class="m-4 rounded-lg w-[calc(100vw-320px)] p-3 bg-gray-300 text-black">
        <x-breadcrumbs :items="$breadcrumbs" separator="o-slash" />
        <hr class="mt-3">
        <div>
            @if (session('success'))
                <p class="bg-green-300">Mensagem: {{ session('success') }}</p>
            @endif
            <p class="text-2xl mt-5">Criar uma vaga</p>
            <form action="{{ route('job.store') }}" method="POST">
                @csrf
                <input type="hidden" name="company_id" value="{{ auth()->user()->company->id }}">

                <label class="text-xs font-semibold" for="title">Título da vaga</label>
                <input
                    class="block my-2 w-full border border-gray-300 focus:border-primary focus:ring-0 focus:outline-none rounded-lg"
                    name="title" placeholder="Título da vaga" />
                @error('title')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror

                <label class="text-xs font-semibold" for="description">Descrição</label>
                <textarea
                    class="block my-2 w-full border border-gray-300 focus:border-primary focus:ring-0 focus:outline-none rounded-lg"
                    name="description" value="" placeholder="Descreva sobre a vaga" rows="5"></textarea>
                @error('description')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror

                <div x-data="{ frases: [], novaFrase: '' }" class="space-y-4">

                    <label class="text-xs font-semibold mt-3 block" for="responsibility">Adicionar responsabilidade</label>
                    <x-input
                        class="w-full border bg-white border-gray-300 focus:border-primary focus:ring-0 focus:outline-none !rounded-lg"
                        placeholder="Digite a responsabilidade" icon="o-pencil" x-model="novaFrase">
                        <x-slot:append class="ml-5">
                            <x-button label="Add" icon="o-plus" class="join-item btn-primary !ml-3"
                                @click="if(novaFrase.trim() !== '') { frases.push(novaFrase); novaFrase = ''; }" />
                        </x-slot:append>
                    </x-input>

                    <!-- Lista das responsabilidades -->
                    <div class="space-y-2">
                        <template x-for="(frase, index) in frases" :key="index">
                            <div
                                class="flex justify-between items-center border border-dashed border-gray-600/50 p-2 rounded-lg shadow-sm">
                                <span class="text-sm font-medium" x-text="frase"></span>
                                <x-button icon="o-trash" class="btn-error btn-sm" @click="frases.splice(index, 1)" />
                            </div>
                        </template>

                        <!-- Mensagem quando a lista estiver vazia -->
                        <div x-show="frases.length === 0" class="text-sm text-gray-500 italic">
                            Nenhuma responsabilidade adicionada ainda.
                        </div>
                    </div>
                    <template x-for="(frase, i) in frases" :key="i">
                        <input type="hidden" name="key_responsibilities[]" :value="frase">
                    </template>

                </div>



                <div x-data="{ skills: [], newSkill: '' }" class="space-y-4">

                    <label class="text-xs font-semibold mt-3 block" for="skills">Adicionar Skills</label>
                    <x-input
                        class="w-full border bg-white border-gray-300 focus:border-primary focus:ring-0 focus:outline-none !rounded-lg"
                        placeholder="Digite um Skill" icon="o-pencil" x-model="newSkill" >
                        <x-slot:append class="ml-5">
                            <x-button label="Add" icon="o-plus" class="join-item btn-primary !ml-3"
                                @click="if(newSkill.trim() !== '') { skills.push(newSkill); newSkill = ''; }" />
                        </x-slot:append>
                    </x-input>




                    <!-- Lista das skills -->
                    <div class="space-y-2">
                        <template x-for="(frase, index) in skills" :key="index">
                            <div
                                class="flex justify-between items-center bg-gray-300 border border-dashed border-gray-600/50 p-2 rounded-lg shadow-sm">
                                <span class="text-sm font-medium" x-text="frase"></span>
                                <x-button icon="o-trash" class="btn-error btn-sm" @click="skills.splice(index, 1)" />
                            </div>
                        </template>

                        <!-- Mensagem quando a lista estiver vazia -->
                        <div x-show="skills.length === 0" class="text-sm text-gray-500 italic">
                            Nenhuma skill adicionada ainda.
                        </div>
                    </div>
                    <template x-for="(skill, i) in skills" :key="i">
                        <input type="hidden" name="skills[]" :value="skill">
                    </template>

                </div>




                <div class="flex justify-evenly mt-12">

                    <div>
                        <label class="text-xs font-semibold" for="category">Categoria</label>
                        <select class="w-[200px] block my-2 rounded-lg" name="category" id="category">
                            <option selected value="Selecionar">Selecionar</option>
                            @foreach (\App\Enums\CategoryEnum::cases() as $category)
                                <option value="{{ $category->value }}">{{ $category->description() }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label class="text-xs font-semibold" for="experience">Experiência</label>
                        <select class="w-[200px] block my-2 rounded-lg" name="experience" id="experience">
                            <option selected value="Selecionar">Selecionar</option>
                            @foreach (\App\Enums\ExperienceEnum::cases() as $experience)
                                <option value="{{ $experience->value }}">{{ $experience->description() }}</option>
                            @endforeach
                        </select>
                        @error('experience')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label class="text-xs font-semibold" for="degree">Formação</label>
                        <select class="w-[200px] block my-2 rounded-lg" name="degree" id="degree">
                            <option selected value="Selecionar">Selecionar</option>
                            @foreach (\App\Enums\DegreeEnum::cases() as $degree)
                                <option value="{{ $degree->value }}">{{ $degree->description() }}</option>
                            @endforeach
                        </select>
                        @error('degree')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label class="text-xs font-semibold" for="period">Período</label>
                        <select class="w-[200px] block my-2 rounded-lg" name="period" id="period">
                            <option selected value="Selecionar">Selecionar</option>
                            @foreach (\App\Enums\PeriodEnum::cases() as $period)
                                <option value="{{ $period->value }}">{{ $period->description() }}</option>
                            @endforeach
                        </select>
                        @error('period')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label class="text-xs font-semibold" for="salary">Salário</label>
                        <select class="w-[200px] block my-2 rounded-lg" name="salary" id="salary">
                            <option selected value="Selecionar">Selecionar</option>
                            @foreach (\App\Enums\SalaryEnum::cases() as $salary)
                                <option value="{{ $salary->value }}">{{ $salary->description() }}</option>
                            @endforeach
                        </select>
                        @error('salary')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex gap-[30px]" x-data="stateCitySelector()">
                    <div>
                        <!-- Select de Estado -->
                        <label class="text-xs font-semibold">Estado</label>
                        <select class="w-[200px] block my-2 rounded-lg" x-model="selectedState" @change="fetchCities">
                            <option value="">Selecionar</option>
                            @foreach ($allStates as $state)
                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="w-[200px]">
                        <!-- Select de Cidade -->
                        <label class="text-xs font-semibold">Cidade</label>
                        <div class="relative">
                            <select class="block my-2 rounded-lg w-full" id='city' name="city"
                                x-model="selectedCity">
                                <option value="">Selecionar</option>
                                <template x-for="city in cities" :key="city.id">
                                    <option :value="city.id" x-text="city.name"></option>
                                </template>
                            </select>

                            <!-- Spinner no canto direito -->
                            <div x-show="loading" class="absolute inset-y-0 right-7 flex items-center">
                                <svg class="animate-spin h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10"
                                        stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        @error('city')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <button class="bg-primary w-20 h-12 p-2 rounded-lg mt-8" type="submit">Salvar</button>
            </form>

        </div>

    </div>
@endsection

{{-- <script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('userSelectData', () => ({
            selectedUsers: [],
            init() {
                const choice = new Choices(this.$refs.userSelect, {
                    removeItemButton: true
                });
                this.$refs.userSelect.addEventListener('change', e => {
                    this.selectedUsers = Array.from(e.target.selectedOptions).map(o => o
                        .value);
                });
            }
        }));
    });
</script> --}}

<script>
    function stateCitySelector() {
        return {
            selectedState: '',
            selectedCity: '',
            cities: [],
            loading: false,

            fetchCities() {
                if (!this.selectedState) {
                    this.cities = [];
                    return;
                }
                this.loading = true;
                fetch(`/cities/${this.selectedState}`)
                    .then(res => res.json())
                    .then(data => {
                        this.cities = data;
                        this.selectedCity = '';
                    })
                    .finally(() => {
                        this.loading = false;
                    });
            }
        }
    }
</script>
