@extends('customer.layout')
@section('title','Espace Client')
@section('dashboard_main')
    {{-- MainPage Dash --}}
    <div class="relative overflow-y-auto px-6 py-4 md:w-[calc(100%-18rem)]">

        {{-- Message Information  --}}
        <div class="p-4 rounded-md bg-slate-100 w-full font-semibold flex justify-between items-center">
            <span class="inline-block text-center w-full text-green-600">Souscrivez à un abonnement pro pour ne plus avoir de restriction de caractère pour l'envoi de vos messages.</span>
            {{-- <span class="flex justify-center items-center bg-slate-200 text-red-600 cursor-pointer rounded-full w-10 h-10">x</span> --}}
        </div>

        {{-- Card SMS --}}
        <div class="w-full flex justify-center my-10">
            <div class="cursor-pointer w-full lg:w-1/2 md:w-2/3 h-56 rounded-md bg-gray-500 shadow-lg flex flex-col gap-y-4 justify-center items-center py-4 px-6">
                <h2 class="text-center text-white text-xl">SMS DISPONIBLE</h2>
                <p class=" text-5xl text-white">10 SMS</p>
                <p class="uppercase">
                    <a href="" class="px-4 py-4 inline-block bg-teal-500 text-white rounded-md">Acheter du crédit SMS</a>
                </p>
            </div>
        </div>

        {{-- Formulaire SMS --}}
        <div class="w-full flex flex-col justify-center items-center gap-y-4 my-10">
            <form action="" class="w-full lg:w-1/2 md:w-2/3">
                @csrf
                <div class="flex flex-col gap-y-2 w-full mt-2">
                    <label for="expediteur">Nom de l'expéditeur</label>
                    <input type="text" id="expediteur" name="expediteur" class="p-3 border-2 border-slate-900" placeholder="EX: ONG BAYA">
                </div>
                <div class="flex flex-col gap-y-2 w-full mt-2">
                    <label for="destinataire">Destinataire</label>
                    <input type="tel" id="destinataire" name="destinataire" class="p-3 border-2 border-slate-900" placeholder="EX: +33 7 11 22 33 44">
                </div>
                <div class="flex flex-col gap-y-2 w-full mt-2">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" class="p-3 border-2 border-slate-900" placeholder="Votre Message" rows="5"></textarea>
                </div>
                <div class="flex flex-col gap-y-2 w-full mt-2">
                    <p class="font-semibold">Caractères restant: <span class="text-red-400">100</span> - SMS Total: <span class="text-green-600">1</span></p>
                </div>
                <div class="flex flex-col items-end gap-y-2 w-full mt-2 mb-4">
                    <button type="submit" class="py-2 px-4 bg-teal-500 text-white font-bold rounded-md hover:bg-teal-500">Envoyer</button>
                </div>
            </form>
        </div>

        {{-- Call To Action --}}
        <div class="w-full flex justify-end fixed bottom-4 right-10 ">
            <a href="" class="py-2 px-4 text-white bg-green-600 block rounded-xl hover:bg-gray-500">Abonnement Pro</a>
        </div>

    </div>
@endsection
