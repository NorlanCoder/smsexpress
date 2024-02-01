@extends('customer.layout')
@section('title','Profile')
@section('dashboard_main')
    <div class="relative overflow-y-auto px-6 py-4 w-full md:w-[calc(100%-18rem)]">

        <h1 class="mt-4 pl-4 text-gray-700 text-2xl font-bold">Votre profile</h1>

        <div class="w-full flex mt-10 flex-row justify-center">
            <div class="w-60 h-60 bg-teal-700 flex items-center justify-center rounded-full">
                <h1 class="text-7xl text-white uppercase">
                    @auth
                        {{strtoupper(Auth::user()->email[0])}}{{strtoupper(Auth::user()->email[1])}}
                    @endauth
                </h1>
            </div>
        </div>

        <div class="w-full flex flex-col items-center my-10">
            <div class="flex flex-col w-full lg:w-1/2 md:w-2/3 mb-5">
                <h2 class="text-teal-600 font-bold mb-2">Adresse E-mail</h2>
                <div class="bg-slate-100 rounded-md p-4 flex justify-between items-center ">
                    <span>@auth {{Auth::user()->email}} @endauth</span>
                    <i class="fa-solid text-green-600 fa-check-double"></i>
                </div>
            </div>
            <div class="flex flex-col w-full lg:w-1/2 md:w-2/3 mb-5">
                <h2 class="text-teal-600 font-bold mb-2">Dernière connexion (UTC)</h2>
                <div class="bg-slate-100 rounded-md p-4 flex justify-between items-center ">
                    <span class="font-bold"><script>const dd= new Date(); document.write(dd)</script></span>
                </div>
            </div>
            <div class="flex flex-col items-end w-full lg:w-1/2 md:w-2/3 mb-5">
                <a href="" class="text-white bg-red-500 w-max p-2 rounded-md font-bold text-sm">Supprimer mon compte</a>
            </div>
        </div>

    </div>
@endsection

