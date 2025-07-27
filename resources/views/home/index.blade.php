@extends('layouts.app')

@section('content')
    <div>
        <div class="bg-cover h-screen" style="background-image: url('{{ asset('img/hero.png') }}');">
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
                    <span class="flex w-40 h-[60px] gap-3 items-center">
                        <img src="{{ asset('/img/jobs.svg') }}" alt="Icon of briefcase">
                        <div class="">
                            <span class="block text-white font-bold text-xl">25,850</span>
                            <span class="text-white">Jobs</span>
                        </div>
                    </span>
                    <span class="flex w-40 h-[60px] gap-3 items-center">
                        <img src="{{ asset('/img/candidates.svg') }}" alt="Icon of candidates">
                        <div>
                            <span class="block text-white font-bold text-xl">10,250</span>
                            <span class="text-white">Candidates</span>
                        </div>
                    </span>
                    <span class="flex w-40 h-[60px] gap-3 items-center">
                        <img src="{{ asset('/img/companies.svg') }}" alt="Icon of companies">
                        <div>
                            <span class="block text-white font-bold text-xl">18,400</span>
                            <span class="text-white">Companies</span>
                        </div>
                    </span>
                </div>
            </div>
        </div>
        <div class="w-full h-32 bg-black flex justify-between items-center px-[72px]">
            <img class="h-12" src="{{ asset('/img/spotify.svg') }}" alt="Icon of Spotify">
            <img class="h-12" src="{{ asset('/img/slack.svg') }}" alt="Icon of Slack">
            <img class="h-12" src="{{ asset('/img/adobe.svg') }}" alt="Icon of Adobe">
            <img class="h-12" src="{{ asset('/img/asana.svg') }}" alt="Icon of Asana">
            <img class="h-12" src="{{ asset('/img/linear.svg') }}" alt="Icon of Linear">
        </div>
    </div>
@endsection
