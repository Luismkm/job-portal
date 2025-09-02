@extends('layouts.website.app')

@section('content')
    <div>
        <div class="bg-cover w-full h-full" style="background-image: url('{{ asset('img/hero.png') }}');">
            <div class="flex flex-col justify-center items-center h-screen px-10 py-9">
                <h1 class="font-bold text-7xl text-white">Find Your Dream Job Today!</h1>
                <h2 class="font-medium text-lg text-white mt-5">Connecting Talent with Opportunity: Your Gateway to Career
                    Success</h2>
                <form class="flex justify-center items-center pl-5 mt-10 h-20 bg-white rounded-lg" action="">
                    <input
                        class="outline-none border-none placeholder:font-medium focus:outline-none focus:ring-0 focus:ring-transparent"
                        placeholder="Job Title or Company" type="text" name="job-search" id="job-search">
                    <span class="h-10 border border-gray-50 border-y-[1px]"></span>
                    <select class="text-black/50 font-medium outline-none border-none focus:ring-0 focus:ring-transparent"
                        name="location" id="location">
                        <option value="0" selected>Select Location</option>
                        <option value="1">Ponta Grossa</option>

                    </select>
                    <span class="h-10 border border-gray-50 border-y-[1px]"></span>
                    <select class="outline-none text-black/50 font-medium border-none focus:ring-0 focus:ring-transparent"
                        name="category" id="category">
                        <option value="0" selected>Select Category</option>
                        <option value="1">Commerce</option>
                    </select>
                    <button
                        class="group flex flex-1 justify-center items-center ml-2 bg-primary w-[174px] h-full rounded-r-lg gap-2 border border-transparent hover:border-white  hover:transition-all duration-200 hover:opacity-95"
                        type="submit">
                        <i class="fa-solid text-white group-hover:text-gray-100 fa-magnifying-glass"></i> <span
                            class="text-lg text-white font-semibold group-hover:text-gray-100">Search Job</span>
                    </button>
                </form>
                <div class="flex w-[600px] justify-between mt-20">
                    <div class="flex w-40 h-[60px] gap-3 items-center">
                        <img src="{{ asset('/img/jobs.svg') }}" alt="Icon of briefcase">
                        <div class="">
                            <p class="block text-white font-bold text-xl">25,850</p>
                            <p class="text-white">Jobs</p>
                        </div>
                    </div>
                    <div class="flex w-40 h-[60px] gap-3 items-center">
                        <img src="{{ asset('/img/candidates.svg') }}" alt="Icon of candidates">
                        <div>
                            <p class="block text-white font-bold text-xl">10,250</p>
                            <p class="text-white">Candidates</p>
                        </div>
                    </div>
                    <div class="flex w-40 h-[60px] gap-3 items-center">
                        <img src="{{ asset('/img/companies.svg') }}" alt="Icon of companies">
                        <div>
                            <p class="block text-white font-bold text-xl">18,400</p>
                            <p class="text-white">Companies</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-full bg-black">
            <div class="max-w-[1440px] mx-auto h-32 flex justify-between items-center px-[72px]">
            <img class="h-12" src="{{ asset('/img/spotify.svg') }}" alt="Icon of Spotify">
            <img class="h-12" src="{{ asset('/img/slack.svg') }}" alt="Icon of Slack">
            <img class="h-12" src="{{ asset('/img/adobe.svg') }}" alt="Icon of Adobe">
            <img class="h-12" src="{{ asset('/img/asana.svg') }}" alt="Icon of Asana">
            <img class="h-12" src="{{ asset('/img/linear.svg') }}" alt="Icon of Linear">
        </div>
        </div>
        <main class="w-full text-black">
            <div class="max-w-[1440px] mx-auto px-16 py-[72px]">
                <p class="block font-bold text-5xl mb-10">Recent Jobs Available</p>
                <div class="flex justify-between">
                    <p class="inline-block text-lg">At eu lobortis pretium tincidunt amet lacus ut aenean aliquet...</p>
                    <a href="#" class="text-primary font-semibold text-2xl underline">View all</a>
                </div>
                <div class="px-10">
                    <div>
                        <div class="flex justify-between mt-24">
                            <p class="inline-block text-primary bg-primary/10 rounded-lg p-2">10 min ago</p>
                            <a href="#"><img class="h-6" src="{{ asset('/img/bookmark.svg') }}"
                                    alt="Icon of Linear"></a>
                        </div>
                        <div class="flex flex-col mt-6">
                            <div class="flex items-center">
                                <img class="h-12 mr-5" src="{{ asset('/img/logo1.jpg') }}" alt="Icon company">
                                <div class="flex flex-col">
                                    <a href="#">
                                        <p class="font-semibold text-[28px]">Forward Security Director</p>
                                    </a>
                                    <p>Bauch, Schuppe and Schulist Co</p>
                                </div>
                            </div>
                            <div class="flex justify-between mt-12">
                                <div class="flex gap-6 text-gray-600 font-semibold">
                                    <div class="flex items-center gap-2">
                                        <img src="{{ asset('/img/briefcase.svg') }}" alt="Icon of briefcase">
                                        <p>Hotels & Tourism</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <img src="{{ asset('/img/clock.svg') }}" alt="Icon of clock">
                                        <p>Full time</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <img src="{{ asset('/img/wallet.svg') }}" alt="Icon of wallet">
                                        <p>$40000-$42000</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <img src="{{ asset('/img/map-pin.svg') }}" alt="Icon of map pin">
                                        <p>New-York, USA</p>
                                    </div>
                                </div>
                                <button class="w-32 h-10 bg-primary rounded-lg text-white font-bold">Job Details</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-10">
                    <div>
                        <div class="flex justify-between mt-24">
                            <p class="inline-block text-primary bg-primary/10 rounded-lg p-2">10 min ago</p>
                            <a href="#"><img class="h-6" src="{{ asset('/img/bookmark.svg') }}"
                                    alt="Icon of Linear"></a>
                        </div>
                        <div class="flex flex-col mt-6">
                            <div class="flex items-center">
                                <img class="h-12 mr-5" src="{{ asset('/img/logo1.jpg') }}" alt="Icon company">
                                <div class="flex flex-col">
                                    <a href="#">
                                        <p class="font-semibold text-[28px]">Forward Security Director</p>
                                    </a>
                                    <p>Bauch, Schuppe and Schulist Co</p>
                                </div>
                            </div>
                            <div class="flex justify-between mt-12">
                                <div class="flex gap-6 text-gray-600 font-semibold">
                                    <div class="flex items-center gap-2">
                                        <img src="{{ asset('/img/briefcase.svg') }}" alt="Icon of briefcase">
                                        <p>Hotels & Tourism</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <img src="{{ asset('/img/clock.svg') }}" alt="Icon of clock">
                                        <p>Full time</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <img src="{{ asset('/img/wallet.svg') }}" alt="Icon of wallet">
                                        <p>$40000-$42000</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <img src="{{ asset('/img/map-pin.svg') }}" alt="Icon of map pin">
                                        <p>New-York, USA</p>
                                    </div>
                                </div>
                                <button class="w-32 h-10 bg-primary rounded-lg text-white font-bold">Job Details</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-10">
                    <div>
                        <div class="flex justify-between mt-24">
                            <p class="inline-block text-primary bg-primary/10 rounded-lg p-2">10 min ago</p>
                            <a href="#"><img class="h-6" src="{{ asset('/img/bookmark.svg') }}"
                                    alt="Icon of Linear"></a>
                        </div>
                        <div class="flex flex-col mt-6">
                            <div class="flex items-center">
                                <img class="h-12 mr-5" src="{{ asset('/img/logo1.jpg') }}" alt="Icon company">
                                <div class="flex flex-col">
                                    <a href="#">
                                        <p class="font-semibold text-[28px]">Forward Security Director</p>
                                    </a>
                                    <p>Bauch, Schuppe and Schulist Co</p>
                                </div>
                            </div>
                            <div class="flex justify-between mt-12">
                                <div class="flex gap-6 text-gray-600 font-semibold">
                                    <div class="flex items-center gap-2">
                                        <img src="{{ asset('/img/briefcase.svg') }}" alt="Icon of briefcase">
                                        <p>Hotels & Tourism</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <img src="{{ asset('/img/clock.svg') }}" alt="Icon of clock">
                                        <p>Full time</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <img src="{{ asset('/img/wallet.svg') }}" alt="Icon of wallet">
                                        <p>$40000-$42000</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <img src="{{ asset('/img/map-pin.svg') }}" alt="Icon of map pin">
                                        <p>New-York, USA</p>
                                    </div>
                                </div>
                                <button class="w-32 h-10 bg-primary rounded-lg text-white font-bold">Job Details</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-10">
                    <div>
                        <div class="flex justify-between mt-24">
                            <p class="inline-block text-primary bg-primary/10 rounded-lg p-2">10 min ago</p>
                            <a href="#"><img class="h-6" src="{{ asset('/img/bookmark.svg') }}"
                                    alt="Icon of Linear"></a>
                        </div>
                        <div class="flex flex-col mt-6">
                            <div class="flex items-center">
                                <img class="h-12 mr-5" src="{{ asset('/img/logo1.jpg') }}" alt="Icon company">
                                <div class="flex flex-col">
                                    <a href="#">
                                        <p class="font-semibold text-[28px]">Forward Security Director</p>
                                    </a>
                                    <p>Bauch, Schuppe and Schulist Co</p>
                                </div>
                            </div>
                            <div class="flex justify-between mt-12">
                                <div class="flex gap-6 text-gray-600 font-semibold">
                                    <div class="flex items-center gap-2">
                                        <img src="{{ asset('/img/briefcase.svg') }}" alt="Icon of briefcase">
                                        <p>Hotels & Tourism</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <img src="{{ asset('/img/clock.svg') }}" alt="Icon of clock">
                                        <p>Full time</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <img src="{{ asset('/img/wallet.svg') }}" alt="Icon of wallet">
                                        <p>$40000-$42000</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <img src="{{ asset('/img/map-pin.svg') }}" alt="Icon of map pin">
                                        <p>New-York, USA</p>
                                    </div>
                                </div>
                                <button class="w-32 h-10 bg-primary rounded-lg text-white font-bold">Job Details</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-10">
                    <div>
                        <div class="flex justify-between mt-24">
                            <p class="inline-block text-primary bg-primary/10 rounded-lg p-2">10 min ago</p>
                            <a href="#"><img class="h-6" src="{{ asset('/img/bookmark.svg') }}"
                                    alt="Icon of Linear"></a>
                        </div>
                        <div class="flex flex-col mt-6">
                            <div class="flex items-center">
                                <img class="h-12 mr-5" src="{{ asset('/img/logo1.jpg') }}" alt="Icon company">
                                <div class="flex flex-col">
                                    <a href="#">
                                        <p class="font-semibold text-[28px]">Forward Security Director</p>
                                    </a>
                                    <p>Bauch, Schuppe and Schulist Co</p>
                                </div>
                            </div>
                            <div class="flex justify-between mt-12">
                                <div class="flex gap-6 text-gray-600 font-semibold">
                                    <div class="flex items-center gap-2">
                                        <img src="{{ asset('/img/briefcase.svg') }}" alt="Icon of briefcase">
                                        <p>Hotels & Tourism</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <img src="{{ asset('/img/clock.svg') }}" alt="Icon of clock">
                                        <p>Full time</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <img src="{{ asset('/img/wallet.svg') }}" alt="Icon of wallet">
                                        <p>$40000-$42000</p>
                                    </div>
                                    <div class="flex items-center gap-2">
                                        <img src="{{ asset('/img/map-pin.svg') }}" alt="Icon of map pin">
                                        <p>New-York, USA</p>
                                    </div>
                                </div>
                                <button class="w-32 h-10 bg-primary rounded-lg text-white font-bold">Job Details</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Browse by Category --}}
            <div class="flex flex-col items-center bg-primary/10 pb-[120px]">
                <h3 class="font-bold text-5xl mt-14 mb-10">Browse by Category</h3>
                <p class="text-black mb-14 text-lg">At eu lobortis pretium tincidunt amet lacus ut aenean aliquet. Blandit
                    a massa elementum id scele</p>
                <div class="grid grid-cols-4 gap-6">
                    <div class="flex flex-col justify-evenly items-center w-[306px] h-[280px] bg-white rounded-lg">
                        <img class="w-10 h-10" src="{{ asset('/img/agriculture.svg') }}" alt="Icon of Agriculture">
                        <p class="font-bold text-2xl">Agriculture</p>
                        <p class="font-inter text-primary">1254 jobs</p>
                    </div>
                    <div class="flex flex-col justify-evenly items-center w-[306px] h-[280px] bg-white rounded-lg">
                        <img class="w-10 h-10" src="{{ asset('/img/metal.svg') }}" alt="Icon of Metal">
                        <p class="font-bold text-2xl">Metal Production</p>
                        <p class="font-inter text-primary">816 jobs</p>
                    </div>
                    <div class="flex flex-col justify-evenly items-center w-[306px] h-[280px] bg-white rounded-lg">
                        <img class="w-10 h-10" src="{{ asset('/img/commerce.svg') }}" alt="Icon of Commerce">
                        <p class="font-bold text-2xl">Commerce</p>
                        <p class="font-inter text-primary">2082 jobs</p>
                    </div>
                    <div class="flex flex-col justify-evenly items-center w-[306px] h-[280px] bg-white rounded-lg">
                        <img class="w-10 h-10" src="{{ asset('/img/construction.svg') }}" alt="Icon of Construction">
                        <p class="font-bold text-2xl">Construction</p>
                        <p class="font-inter text-primary">1520 jobs</p>
                    </div>
                    <div class="flex flex-col justify-evenly items-center w-[306px] h-[280px] bg-white rounded-lg">
                        <img class="w-10 h-10" src="{{ asset('/img/tourism.svg') }}" alt="Icon of Hotels & Tourism">
                        <p class="font-bold text-2xl">Hotels & Tourism</p>
                        <p class="font-inter text-primary">1022 jobs</p>
                    </div>
                    <div class="flex flex-col justify-evenly items-center w-[306px] h-[280px] bg-white rounded-lg">
                        <img class="w-10 h-10" src="{{ asset('/img/education.svg') }}" alt="Icon of Education">
                        <p class="font-bold text-2xl">Education</p>
                        <p class="font-inter text-primary">1496 jobs</p>
                    </div>
                    <div class="flex flex-col justify-evenly items-center w-[306px] h-[280px] bg-white rounded-lg">
                        <img class="w-10 h-10" src="{{ asset('/img/financial.svg') }}" alt="Icon of Financial Services">
                        <p class="font-bold text-2xl">Financial Services</p>
                        <p class="font-inter text-primary">1529 jobs</p>
                    </div>
                    <div class="flex flex-col justify-evenly items-center w-[306px] h-[280px] bg-white rounded-lg">
                        <img class="w-10 h-10" src="{{ asset('/img/transport.svg') }}" alt="Icon of Transport">
                        <p class="font-bold text-2xl">Transport</p>
                        <p class="font-inter text-primary">1244 jobs</p>
                    </div>
                </div>
            </div>

            {{-- Browse by Category --}}
            <div class="max-w-[1440px] mx-auto">
                <div class="flex justify-center items-center mt-[120px] mb-20">
                    <img class="w-[550px] h-[514px]" src="{{ asset('/img/decoration.jpg') }}"
                        alt="aleatory illustration">
                    <div class="ml-32">
                        <h3 class="font-bold text-5xl mb-10 leading-tight">Good Life Begins With<br> A Good Company</h3>
                        <p class="w-[600px] text-lg mb-14">Ultricies purus dolor viverra mi laoreet at cursus justo.
                            Ultrices
                            purus diam egestas amet
                            faucibus tempor blandit. Elit velit mauris aliquam est diam. Leo sagittis consectetur diam morbi
                            erat aenean. Vulputate praesent congue faucibus in euismod feugiat euismod volutpat</p>
                        <div class="flex items-center font-semibold text-primary gap-6">
                            <button
                                class="w-32 h-10 bg-primary text-white font-semibold rounded-lg hover:font-semibold hover:transition-colors">Search
                                Job</button>
                            <a class="underline" href="#">Learn more</a>
                        </div>
                    </div>
                </div>
                <div class="grid mx-auto grid-cols-3 place-items-center">
                    <div class="w-[306px] flex flex-col gap-6">
                        <span class="font-bold text-4xl text-primary">12k+</span>
                        <p class="font-semibold text-2xl">Clients worldwide</p>
                        <p>At eu lobortis pretium tincidunt amet lacus ut aenean aliquet. Blandit a massa elementum</p>
                    </div>
                    <div class="w-[306px] flex flex-col gap-6">
                        <span class="font-bold text-4xl text-primary">20k+</span>
                        <p class="font-semibold text-2xl">Active resume</p>
                        <p>At eu lobortis pretium tincidunt amet lacus ut aenean aliquet. Blandit a massa elementum</p>
                    </div>
                    <div class="w-[306px] flex flex-col gap-6">
                        <span class="font-bold text-4xl text-primary">18k+</span>
                        <p class="font-semibold text-2xl">Compnies</p>
                        <p>At eu lobortis pretium tincidunt amet lacus ut aenean aliquet. Blandit a massa elementum</p>
                    </div>
                </div>
            </div>

            {{-- Browse by Category --}}

            <div class="flex justify-center items-center w-[1296px] h-[420px] mx-auto bg-black rounded-2xl my-[120px]">
                <div class="text-white flex-1 pl-16">
                    <h3 class="font-bold text-5xl mb-10 leading-tight">Create A Better<br> Future For Yourself</h3>
                    <p class="text-lg mb-14">At eu lobortis pretium tincidunt amet lacus ut aenean aliquet.
                        Blandit a massa elementum id scelerisque rhoncus</p>
                    <button
                        class="w-32 h-10 bg-primary text-white font-semibold rounded-lg hover:font-semibold hover:transition-colors">Search
                        Job</button>
                </div>
                <img class="w-[760px] h-[420px] object-cover" src="{{ asset('/img/group.png') }}"
                    alt="Icon of Financial Services">

            </div>

            {{-- News and Blog --}}


            <div class="max-w-[1440px] px-[72px] py-[60px] mx-auto">
                <p class="block font-semibold text-5xl mb-10">News and Blog</p>
                <div class="flex justify-between">
                    <p class="inline-block text-lg">Metus faucibus sed turpis lectus feugiat tincidunt. Rhoncus sed
                        tristique in dolor</p>
                    <a href="#" class="text-primary font-semibold text-2xl underline">View all</a>
                </div>
                <div class="grid grid-cols-2 gap-6 mt-14">
                    <div class="relative">
                        <div class="relative">
                            <img class="w-full h-[400px] absolute top-0 left-0 z-0"
                                src="{{ asset('/img/decoration.jpg') }}">
                            <button
                                class="bg-primary px-5 py-2 relative top-[18px] left-[29px] text-white font-semibold rounded-lg hover:font-semibold hover:transition-colors z-10">
                                News
                            </button>
                        </div>

                        <div class="relative z-10 mt-[390px] px-4">
                            <div>
                                <p class="text-gray-500 font-semibold pb-8">30 March 2024</p>
                                <p class="font-semibold text-2xl pb-8">
                                    Revitalizing Workplace Morale: Innovative Tactics for Boosting Employee Engagement in
                                    2024
                                </p>
                            </div>
                            <div class="mt-2 flex items-center text-primary font-medium cursor-pointer">
                                <p>Read more</p>
                                <i class="fa-solid fa-arrow-right ml-2"></i>
                            </div>
                        </div>
                    </div>

                    <div class="relative">
                        <div class="relative">
                            <img class="w-full h-[400px] absolute top-0 left-0 z-0"
                                src="{{ asset('/img/decoration.jpg') }}">
                            <button
                                class="bg-primary px-5 py-2 relative top-[18px] left-[29px] text-white font-semibold rounded-lg hover:font-semibold hover:transition-colors z-10">
                                Blog
                            </button>
                        </div>

                        <div class="relative z-10 mt-[390px] px-4">
                            <div>
                                <p class="text-gray-500 font-semibold pb-8">30 March 2024</p>
                                <p class="font-semibold text-2xl pb-8">
                                    How to avoid the top six most common job interview mistakes
                                </p>
                            </div>
                            <div class="mt-2 flex items-center text-primary font-medium cursor-pointer">
                                <p>Read more</p>
                                <i class="fa-solid fa-arrow-right ml-2"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
@endsection
