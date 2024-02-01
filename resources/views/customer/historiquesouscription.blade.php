@extends('customer.layout')
@section('title','Historique Souscription')
@section('dashboard_main')
    <div class="relative overflow-y-auto px-6 py-4 md:w-[calc(100%-18rem)]">

        <h1 class="mt-4 pl-4 text-gray-700 text-2xl font-bold">Votre historique de paiements</h1>

        @php
            $count = count($abonnements);
        @endphp

        @if ($count)
            <div class="flex justify-end mt-4 gap-x-2">
                <a href="#" id="deletesouscription" class="px-2 py-2 bg-red-500 border-2 border-red-600 hover:bg-red-600 w-auto flex gap-x-4 font-semibold items-center rounded-md text-white"><i class="fa-solid fa-trash text-white"></i> Tout supprimé</a>
            </div>
        @endif

        <div class="w-full flex flex-wrap my-10">

            @foreach ($abonnements as $ab)
                <div class="cursor-pointer w-full lg:w-1/3 h-auto px-3 mb-10">
                    <div class="flex flex-col justify-center rounded-md bg-slate-50 w-full h-full transition duration-0 shadow-md hover:shadow-lg hover:duration-300 py-4 px-6">
                        <h1 class="font-bold text-xl text-teal-500 mb-2">Pack {{$ab->pack}} </h1>
                        <h1 class="font-bold text-lg text-gray-700">Montant: <span class="text-black font-normal">{{$ab->prix}} Fcfa</span></h1>
                        <h1 class="font-bold text-lg text-gray-700">SMS:
                            <span class="text-black font-normal">
                                @foreach ($packs as $pack)
                                    @if ($pack->code == $ab->pack_code )
                                        {{$pack->sms}} sms
                                    @endif
                                @endforeach
                            </span>
                        </h1>
                        <h1 class="font-bold text-lg text-gray-700">Date: <span class="text-black font-normal">{{$ab->created_at}}</span></h1>
                        <h1 class="font-bold text-lg text-gray-700">Statut: <span class="text-black font-normal">Succès <i class="fa-solid text-green-600 fa-check ml-2"></i></span></h1>
                        {{-- <h1 class="font-bold text-lg text-gray-700 text-right"><a href="{{route('customerdeleteonesouscription',$ab->code)}}" id="solodelete"><i class="fa-solid text-red-600 fa-trash"></i></a></h1> --}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div id="modaldelete" class="w-full h-full fixed bg-black/20 hidden flex-col justify-center items-center">
        <div class="w-11/12 md:w-5/12 rounded-lg bg-white shadow-lg">
            <div class="px-4 mb-3 pl-10 pt-8 flex justify-center">
                <h4 class="font-semibold text-xl text-center text-teal-700">Voulez-vous vraiment tout supprimé ? Cette action est inversible</h4>
            </div>
            <div class="flex justify-center gap-x-3 my-8">
                <a href="#" id="annuler" class="px-2 py-2 bg-slate-500 border-2 border-slate-600 hover:bg-slate-600 w-auto flex gap-x-4 font-semibold items-center rounded-md text-white">Annuler</a>
                <a href="{{route('customerconfirmdeletsouscription')}}" id="confirmer" class="px-2 py-2 bg-teal-500 border-2 border-teal-600 hover:bg-teal-600 w-auto flex gap-x-4 font-semibold items-center rounded-md text-white">Confirmé</a>

            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        const deleteSouscription = document.querySelector('#deletesouscription'),
            modal = document.querySelector('#modaldelete');

        deleteSouscription.addEventListener('click', (e) => {
            e.preventDefault()
            if(modal.classList.contains('hidden')) {
                modal.classList.remove('hidden')
                modal.classList.add('flex')
            }
        })

        modal.querySelector('#annuler').addEventListener('click', () => {
            if(modal.classList.contains('flex')) {
                modal.classList.remove('flex')
                modal.classList.add('hidden')
            }
        })

    </script>
@endsection
