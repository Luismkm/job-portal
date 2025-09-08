<div class="flex flex-col justify-between fixed items-center h-screen shadow-md shadow-black bg-gray-300 text-black">
    <div>
        <x-menu class="border border-base-content/10  !w-64">
            <div class="flex gap-2 p-3 mb-4">
                <p>Bem vindo, </p>
                <p class="font-bold">{{ auth()->user()->name }}</p>
            </div>
            <x-menu-item title="Gerenciar Vagas" icon="o-cog-6-tooth" :href="route('company.dashboard')" />

            <x-menu-separator />

            <x-menu-sub title="Gerenciar HR" icon="o-user-group">
                <x-menu-item title="Cadastrar" icon="o-user-plus" :href="route('human-resources.create')" />
                <x-menu-item title="Visualizar" icon="o-archive-box" :href="route('human-resources.list')" />
            </x-menu-sub>

            <x-menu-separator />

            <x-menu-sub title="Gerenciar Vagas" icon="o-briefcase">
                <x-menu-item title="Cadastrar" icon="o-document-plus" :href="route('job.create')" />
                <x-menu-item title="Visualizar" icon="o-archive-box" :href="route('job.list')" />
            </x-menu-sub>

            <x-menu-separator />

            <x-menu-item title="Perfil" icon="o-user" />
        </x-menu>

    </div>
    <div>
        <x-menu class="border border-base-content/10 !w-64">
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-button type="submit" icon="o-user" label="Logout" class="btn-primary btn-dash" />
            </form>
        </x-menu>
    </div>
</div>
