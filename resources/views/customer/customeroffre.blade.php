@extends('customer.layout')
@section('title','Nos offres')
@section('dashboard_main')
    <div class="relative overflow-y-auto h-full px-6 py-4 md:w-[calc(100%-18rem)]">

        <h1 class="mt-4 pl-4 text-gray-700 text-2xl font-bold">Nos offres</h1>

        <div class="w-full h-[100% - 32px] flex justify-center gap-6 flex-wrap my-10">

            @foreach ($packs as $pack)
                <section class="flex border @if($pack->nom=="Pro") border-teal-400 border-2 @else border-white @endif h-max flex-col bg-slate-800 rounded-3xl px-6 sm:px-8 py-8 md:mx-0 mx-8 w-80">
                    <h3 class="mt-1 font-display text-lg text-white">{{$pack->sms}} SMS</h3>
                    <p class="mt-2 text-base text-slate-400">Pack {{$pack->nom}} </p>
                    <a class="group inline-flex ring-1 items-center justify-center rounded-full py-3 px-4 focus:outline-none bg-blue-400 text-lg hover:scale-110 ring-slate-700 text-white hover:ring-slate-500 active:ring-slate-700 active:text-slate-400 focus-visible:outline-white mt-8" href="{{route('souscriptioncheck',$pack->id)}}">Recharger mon compte</a>
                    <p class="order-first font-display text-3xl font-light tracking-tight text-teal-400">{{$pack->prix}} FCFA</p>
                </section>
            @endforeach

        </div>
    </div>
@endsection
