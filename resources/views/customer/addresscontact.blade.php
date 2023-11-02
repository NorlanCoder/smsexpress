@extends('customer.layout')
@section('title','Mes Contacts')
@section('dashboard_main')
    <div class="relative overflow-y-auto px-6 py-4 md:w-[calc(100%-18rem)]">

        <h1 class="mt-4 pl-4 text-gray-700 text-2xl font-bold">Vos contacts</h1>

        <div class="w-full my-10">
            <div class="flex justify-end mb-2 gap-x-2">
                <a href="{{route('customerhome')}}" class="px-3 py-3 text-gray-600 bg-slate-50 border-2 border-teal-400 hover:bg-slate-100 w-auto flex gap-x-4 font-semibold items-center rounded-md"><i class="fa-brands fa-plus text-teal-400"></i></a>
                <a href="{{route('customerhome')}}" class="px-3 py-3 bg-teal-400 border-2 border-teal-400 hover:bg-teal-500 w-auto flex gap-x-4 font-semibold items-center rounded-md"><i class="fa-solid fa-file-excel text-white"></i></a>
                <a href="{{route('customerhome')}}" class="px-2 py-2 bg-slate-400 border-2 border-slate-400 hover:bg-slate-500 w-auto flex gap-x-4 font-semibold items-center rounded-md text-white"><i class="fa-solid fa-paper-plane text-white"></i> Message groupé</a>
            </div>
            <table class="table-fixed w-full">
                <thead>
                    <tr>
                        <th class="bg-teal-50 rounded-md text-left p-4 border">#</th>
                        <th class="bg-teal-50 rounded-md text-left p-4 border">Nom</th>
                        <th class="bg-teal-50 rounded-md text-left p-4 border">Numéro</th>
                        <th class="bg-teal-50 rounded-md p-4 border text-center"><i class="fa-solid fa-paper-plane"></i></th>
                        <th class="bg-teal-50 rounded-md p-4 border text-center"><i class="fa-solid fa-trash"></i></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
              </table>
        </div>

    </div>
@endsection
