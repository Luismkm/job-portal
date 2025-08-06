<div class="w-64 h-screen flex bg-white shadow-md">
    <div class="flex flex-col w-full justify-between p-3">
        <div class="w-full">
            <div class="flex gap-2">
                <p>Bem vindo, </p><span> {{ auth()->user()->name }}</span>
            </div>
            <hr class="w-full">
            <ul>
                <li class="bg-gray-50 px-2 py-1"><a href="#"><i class="fas fa-users me-3"></i>Colaborators</a></li>
                <li><a href="#"><i class="fas fa-users me-3"></i>Colaborators</a></li>
                <li><a href="#"><i class="fas fa-users me-3"></i>Colaborators</a></li>
                <li><a href="#"><i class="fas fa-users me-3"></i>Colaborators</a></li>
            </ul>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="p-3 bg-black/15 rounded-lg hover:font-bold"
                href="{{ route('logout') }}">Logout</a>
        </form>
    </div>
</div>
