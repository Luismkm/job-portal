<div class="h-20 w-full absolute z-10 bg-black/15">
    <div class="flex max-w-[1440px] mx-auto justify-between items-center h-full px-[72px]">
        <div>
            <a href="#"><img src="{{ asset('/img/logo.png') }}" alt=""></a>
        </div>
        <ul class="flex gap-5 text-white">
            <a href="#"><li class="font-semibold hover:font-semibold">Home</li></a>
            <a href="#"><li class="font-medium hover:font-semibold">Jobs</li></a>
            <a href="#"><li class="font-medium hover:font-semibold">About Us</li></a>
            <a href="#"><li class="font-medium hover:font-semibold">Contact Us</li></a>
        </ul>
        <div class="flex text-white gap-4">
            <a href="{{ route('login') }}" class="w-16 h-10 rounded-lg flex justify-center items-center hover:font-semibold hover:transition-colors">Login</a>
            <a class="w-24 h-10 bg-primary rounded-lg flex justify-center items-center hover:font-semibold hover:transition-colors">Register</a>
        </div>
    </div>
</div>
