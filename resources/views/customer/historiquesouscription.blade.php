@extends('customer.layout')
@section('title','Historique Souscription')
@section('dashboard_main')
    <div class="relative overflow-y-auto px-6 py-4 md:w-[calc(100%-18rem)]">

        <h1 class="mt-4 pl-4 text-gray-700 text-2xl font-bold">Votre historique de paiements</h1>

        <div class="w-full flex flex-wrap my-10">

            @foreach ($abonnements as $ab)
                <div class="cursor-pointer w-full lg:w-1/3 h-auto px-3 mb-10">
                    <div class="flex flex-col justify-center rounded-md bg-slate-50 w-full h-full transition duration-0 shadow-md hover:shadow-lg hover:duration-300 py-4 px-6">
                        <h1 class="font-bold text-xl text-teal-500 mb-2">Pack {{$ab->pack}} </h1>
                        <h1 class="font-bold text-lg text-gray-700">Montant: <span class="text-black font-normal">{{$ab->prix}} Fcfa</span></h1>
                        <h1 class="font-bold text-lg text-gray-700">SMS: <span class="text-black font-normal">{{$ab->sms}} sms</span></h1>
                        <h1 class="font-bold text-lg text-gray-700">Date: <span class="text-black font-normal">{{$ab->created_at}}</span></h1>
                        <h1 class="font-bold text-lg text-gray-700">Statut: <span class="text-black font-normal">Succès <i class="fa-solid text-green-600 fa-check ml-2"></i></span></h1>
                        <h1 class="font-bold text-lg text-gray-700 text-right"><i class="fa-solid text-red-600 fa-trash"></i></h1>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
