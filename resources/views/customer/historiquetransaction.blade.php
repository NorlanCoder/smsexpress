@extends('customer.layout')
@section('title','Historique Transaction')
@section('dashboard_main')
    <div class="relative overflow-y-auto px-6 py-4 md:w-[calc(100%-18rem)]">

        <h1 class="mt-4 pl-4 text-gray-700 text-2xl font-bold">Votre historique d'envois</h1>

        <div class="w-full my-10">

            @php
                $count = count($envois);
            @endphp

            @if ($count)
                <div class="flex justify-end mb-2 gap-x-2">
                    <a href="#" id="deleteenvois" class="px-2 py-2 bg-red-500 border-2 border-red-600 hover:bg-red-600 w-auto flex gap-x-4 font-semibold items-center rounded-md text-white"><i class="fa-solid fa-trash text-white"></i> Tout supprimé</a>
                </div>
            @endif

            <table class="table-fixed w-full text-sm text-left rtl:text-right">
                <thead>
                    <tr>
                        <th class="bg-teal-50 rounded-md text-left p-4 border">Expéditeur</th>
                        <th class="bg-teal-50 rounded-md text-left p-4 border">Destinataire</th>
                        <th class="bg-teal-50 rounded-md text-left p-4 border">Message</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($envois as $envoi)
                        <tr class="">
                            <td class="p-3 border uppercase text-teal-500 font-bold">{{$envoi->expediteur}}</td>
                            <td class="p-3 border  h-auto">{{$envoi->destinataire}}</td>
                            <td class="p-3 border flex flex-wrap overflow-auto h-auto"><p class="whitespace-nowrap">{{$envoi->message}}</p><br></td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>

    </div>

    <div id="modaldelete" class="w-full h-full fixed bg-black/20 hidden flex-col justify-center items-center">
        <div class="w-11/12 md:w-5/12 rounded-lg bg-white shadow-lg">
            <div class="px-4 mb-3 pl-10 pt-8 flex justify-center">
                <h4 class="font-semibold text-xl text-center text-teal-700">Voulez-vous vraiment tout supprimé ? Cette action est irréversible</h4>
            </div>
            <div class="flex justify-center gap-x-3 my-8">
                <a href="#" id="annuler" class="px-2 py-2 bg-slate-500 border-2 border-slate-600 hover:bg-slate-600 w-auto flex gap-x-4 font-semibold items-center rounded-md text-white">Annuler</a>
                <a href="{{route('customerconfirmdeletenvois')}}" id="confirmer" class="px-2 py-2 bg-teal-500 border-2 border-teal-600 hover:bg-teal-600 w-auto flex gap-x-4 font-semibold items-center rounded-md text-white">Confirmé</a>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        const deleteEnvois = document.querySelector('#deleteenvois'),
            modal = document.querySelector('#modaldelete');

        deleteEnvois.addEventListener('click', (e) => {
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
