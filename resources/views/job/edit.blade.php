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
            'label' => 'Editar',
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
            <p class="text-2xl mt-5">Editar uma vaga</p>

            <form action="{{ route('job.update') }}" method="POST">
                @csrf
                <input type="hidden" name="job_id" value="{{ $job->id }}">

                <label class="text-xs font-semibold" for="title">Criada por</label>
                <input
                    class="block my-2 w-full border text-gray-500 bg-gray-200 border-gray-300 focus:border-primary rounded-lg cursor-not-allowed"
                    name="title" disabled placeholder="Título da vaga" value="{{ $job->user->name }}" />

                <label class="text-xs font-semibold" for="title">Título da vaga</label>
                <input
                    class="block my-2 w-full border border-gray-300 focus:border-primary focus:ring-0 focus:outline-none rounded-lg"
                    name="title" placeholder="Título da vaga" value="{{ $job->title }}" />
                @error('title')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror

                <label class="text-xs font-semibold" for="description">Descrição</label>
                <textarea
                    class="block my-2 w-full border border-gray-300 focus:border-primary focus:ring-0 focus:outline-none rounded-lg"
                    name="description" value="" placeholder="Descreva sobre a vaga" rows="5">{{ $job->description }}</textarea>
                @error('description')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror

                <div x-data='{"frases": @json($job->key_responsibilities), "novaFrase": ""}' class="space-y-4">
                    <label class="text-xs font-semibold mt-3 block">Adicionar
                        responsabilidade</label>
                    <x-input
                        class="w-full border bg-white border-gray-300 focus:border-primary focus:ring-0 focus:outline-none !rounded-lg"
                        placeholder="Digite a responsabilidade" icon="o-pencil" x-model="novaFrase">
                        <x-slot:append class="ml-5">
                            <x-button label="Add" icon="o-plus" class="join-item btn-primary !ml-3"
                                @click="if(novaFrase.trim() !== '') { frases.push(novaFrase); novaFrase = ''; }" />
                        </x-slot:append>
                    </x-input>


                    <div class="space-y-2">
                        <template x-for="(frase, index) in frases" :key="index">
                            <div
                                class="flex justify-between items-center border border-dashed border-gray-600/50 p-2 rounded-lg shadow-sm">
                                <span class="text-sm font-medium" x-text="frase"></span>
                                <x-button icon="o-trash" class="btn-error btn-sm" @click="frases.splice(index, 1)" />
                            </div>
                        </template>

                        <div x-show="frases.length === 0" class="text-sm text-gray-500 italic">
                            Nenhuma responsabilidade adicionada ainda.
                        </div>
                    </div>
                    <template x-for="(frase, i) in frases" :key="i">
                        <input type="hidden" name="key_responsibilities[]" :value="frase">
                    </template>
                </div>

                <div x-data='{"skills": @json($job->professional_skills), "novoSkill": ""}' class="space-y-4">
                    <label class="text-xs font-semibold mt-3 block">Adicionar Skills</label>
                    <x-input
                        class="w-full border bg-white border-gray-300 focus:border-primary focus:ring-0 focus:outline-none !rounded-lg"
                        placeholder="Digite um skill" icon="o-pencil" x-model="novoSkill">
                        <x-slot:append class="ml-5">
                            <x-button label="Add" icon="o-plus" class="join-item btn-primary !ml-3"
                                @click="if(novoSkill.trim() !== '') { skills.push(novoSkill); novoSkill = ''; }" />
                        </x-slot:append>
                    </x-input>


                    <div class="space-y-2">
                        <template x-for="(frase, index) in skills" :key="index">
                            <div
                                class="flex justify-between items-center border border-dashed border-gray-600/50 p-2 rounded-lg shadow-sm">
                                <span class="text-sm font-medium" x-text="frase"></span>
                                <x-button icon="o-trash" class="btn-error btn-sm" @click="skills.splice(index, 1)" />
                            </div>
                        </template>

                        <div x-show="frases.length === 0" class="text-sm text-gray-500 italic">
                            Nenhum skill adicionada aindo.
                        </div>
                    </div>
                    <template x-for="(skill, i) in skills" :key="i">
                        <input type="hidden" name="skills[]" :value="skill">
                    </template>
                </div>

                <div class="flex justify-between mt-12">

                    <div>
                        <label class="text-xs font-semibold" for="category">Categoria</label>
                        <select class="w-[200px] block my-2 rounded-lg" name="category" id="category">
                            @foreach (\App\Enums\CategoryEnum::cases() as $category)
                                <option value="{{ $category->value }}"
                                    {{ $job->category == $category->value ? 'selected' : '' }}>
                                    {{ $category->description() }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label class="text-xs font-semibold" for="experience">Experiência</label>
                        <select class="w-[200px] block my-2 rounded-lg" name="experience" id="experience">
                            @foreach (\App\Enums\ExperienceEnum::cases() as $experience)
                                <option value="{{ $experience->value }}"
                                    {{ $job->experience == $experience->value ? 'selected' : '' }}>
                                    {{ $experience->description() }}</option>
                            @endforeach
                        </select>
                        @error('experience')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label class="text-xs font-semibold" for="degree">Formação</label>
                        <select class="w-[200px] block my-2 rounded-lg" name="degree" id="degree">
                            @foreach (\App\Enums\DegreeEnum::cases() as $degree)
                                <option value="{{ $degree->value }}"
                                    {{ $job->degree == $degree->value ? 'selected' : '' }}>{{ $degree->description() }}
                                </option>
                            @endforeach
                        </select>
                        @error('degree')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label class="text-xs font-semibold" for="period">Período</label>
                        <select class="w-[200px] block my-2 rounded-lg" name="period" id="period">
                            @foreach (\App\Enums\PeriodEnum::cases() as $period)
                                <option value="{{ $period->value }}"
                                    {{ $period->value == $job->period ? 'selected' : '' }}>{{ $period->description() }}
                                </option>
                            @endforeach
                        </select>
                        @error('period')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label class="text-xs font-semibold" for="salary">Salário</label>
                        <select class="w-[200px] block my-2 rounded-lg" name="salary" id="salary">
                            @foreach (\App\Enums\SalaryEnum::cases() as $salary)
                                <option value="{{ $salary->value }}"
                                    {{ $job->salary == $salary->value ? 'selected' : '' }}>{{ $salary->description() }}
                                </option>
                            @endforeach
                        </select>
                        @error('salary')
                            <div class="text-red-500">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="flex gap-[44px]" x-data="stateCitySelector({{ $stateJob->id ?? 'null' }})">
                    <div>
                        <label class="text-xs font-semibold">Estado</label>
                        <select class="w-[200px] block my-2 rounded-lg" x-model="selectedState" @change="fetchCities">
                            @foreach ($allStates as $state)
                                <option value="{{ $state->id }}" {{ $state->id == $stateJob->id ? 'selected' : '' }}>
                                    {{ $state->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="w-[200px]">
                        <label class="text-xs font-semibold">Cidade</label>
                        <div class="relative">
                            <select class="block my-2 rounded-lg w-full" id="city" name="city"
                                x-model="selectedCity">

                                @foreach ($allCitiesByJobState as $city)
                                    <option value="{{ $city->id }}"
                                        {{ $job->city_id == $city->id ? 'selected' : '' }} x-show="cities.length === 0">
                                        {{ $city->name }}
                                    </option>
                                @endforeach

                                <template x-for="city in cities" :key="city.id">
                                    <option :value="city.id" x-text="city.name"></option>
                                </template>
                            </select>
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

<script>
    function stateCitySelector(initialStateId) {
        return {
            selectedState: initialStateId || '',
            selectedCity: '',
            cities: [],
            loading: false,

            fetchCities() {
                this.cities = [];
                this.selectedCity = '';

                if (!this.selectedState) {
                    return;
                }

                this.loading = true;
                fetch(`/cities/${this.selectedState}`)
                    .then(res => res.json())
                    .then(data => {
                        this.cities = data;
                        if (this.cities.length > 0) {
                            this.selectedCity = this.cities[0].id;
                        }
                    })
                    .finally(() => {
                        this.loading = false;
                    });
            }
        }
    }
</script>
