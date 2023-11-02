@extends('customer.layout')
@section('title','Historique Transaction')
@section('dashboard_main')
    <div class="relative overflow-y-auto px-6 py-4 md:w-[calc(100%-18rem)]">

        <h1 class="mt-4 pl-4 text-gray-700 text-2xl font-bold">Votre historique d'envois</h1>

        <div class="w-full my-10">
            <table class="table-fixed w-full">
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
                            <td class="p-3 border">{{$envoi->destinataire}}</td>
                            <td class="p-3 border">{{$envoi->message}}</td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>

    </div>
@endsection
