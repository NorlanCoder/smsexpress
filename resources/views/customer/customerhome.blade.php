<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="shortcut icon" href="{{asset('image/logo.jpg')}}" type="image/x-icon">
    <title>SMS EXPRESS - @yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <link rel="stylesheet" href="{{asset('build/assets/app-ff53ee22.css')}}"> --}}
    @vite('resources/css/app.css')
</head>
<body class="h-screen overflow-y-hidden">

    <nav class="w-full fixed flex flex-row items-center justify-between bg-white z-10 shadow-sm border-b border-gray px-6 py-3 h-20">
        <div><a href="{{route('home')}}"><img class="w-10" src="{{asset('image/logo.jpg')}}" alt=""></a></div>
        <div>
            <span class="flex cursor-pointer bg-teal-600 w-12 h-12 rounded-3xl text-white items-center justify-center border-2 border-teal-700">FA</span>
        </div>
    </nav>
    <section class="flex absolute w-screen top-20 h-[calc(100%-5rem)]">

        {{-- SubNav --}}
        <div class="hidden md:flex flex-col justify-between border-r border-gray-200 w-72 px-4 py-4 h-full">
            <div class="flex flex-col gap-y-4 w-[100%]">
                <a href="" class="px-4 py-4 text-white bg-teal-600 w-[100%] flex gap-x-4 items-center rounded-md"><i class="fa-brands fa-font-awesome "></i> Espace Client</a>
                <a href="" class="px-4 py-4 text-gray-600 bg-slate-50 hover:bg-slate-100 flex items-center gap-x-4 font-semibold w-[100%] rounded-md"><i class="fa-solid fa-money-bill-trend-up"></i> Historiques Souscriptions</a>
                <a href="" class="px-4 py-4 text-gray-600 bg-slate-50 hover:bg-slate-100 flex items-center gap-x-4 font-semibold w-[100%] rounded-md"><i class="fa-solid fa-box-archive"></i> Historiques Transactions</a>
                <a href="" class="px-4 py-4 text-gray-600 bg-slate-50 hover:bg-slate-100 flex items-center gap-x-4 font-semibold w-[100%] rounded-md"><i class="fa-solid fa-list-check"></i> Nos Offres</a>
                <a href="" class="px-4 py-4 text-gray-600 bg-slate-50 hover:bg-slate-100 flex items-center gap-x-4 font-semibold w-[100%] rounded-md"><i class="fa-solid fa-user-tie"></i> Profile</a>
            </div>
            <div class="w-[100%] flex flex-col gap-y-4 items-center justify-center ">
                <a href="" class="px-4 py-4 text-white bg-gray-300 w-[100%] flex items-center gap-x-4 rounded-md hover:bg-gray-400"><i class="fa-solid fa-circle-info"></i> Service Client</a>
                <a href="" class="px-4 py-4 text-white bg-gray-600 w-[100%] flex items-center gap-x-4 rounded-md hover:bg-gray-500"><i class="fa-solid fa-power-off text-red-400"></i> Déconnexion</a>
            </div>
        </div>

        {{-- MainPage Dash --}}
        <div class="relative overflow-y-auto px-6 py-4 w-[calc(100%-18rem)]">

            {{-- Message Information  --}}
            <div class="p-4 rounded-md bg-slate-100 w-full font-semibold flex justify-between items-center">
                <span class=" text-green-600">Souscrivez à un abonnement pro pour ne plus avoir de restriction de caractère pour l'envoi de vos messages.</span>
                <span class="flex justify-center items-center bg-slate-200 text-red-600 cursor-pointer rounded-full w-10 h-10">x</span>
            </div>

            {{-- Card SMS --}}
            <div class="w-full flex justify-center my-10">
                <div class="cursor-pointer w-full md:w-1/2 h-64 rounded-md bg-gray-600 shadow-lg flex flex-col gap-y-4 justify-center items-center py-4 px-6">
                    <h2 class="text-center text-white text-2xl">SMS DISPONIBLE</h2>
                    <p class=" text-7xl text-white">10 SMS</p>
                    <p class=" text-3xl text-teal-400 uppercase"></p>
                </div>
            </div>

            {{-- Formulaire SMS --}}
            <div class="w-full flex flex-col justify-center items-center gap-y-4 my-10">
                <form action="" class="w-full md:w-1/2">
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
                    <div class="flex flex-col items-end gap-y-2 w-full mt-2">
                        <button type="submit" class="py-2 px-4 bg-teal-400 hover:bg-teal-500">Envoyer</button>
                    </div>
                </form>
            </div>

            {{-- Call To Action --}}
            <div class="w-full flex justify-end fixed bottom-4 right-10 ">
                <a href="" class="py-2 px-4 text-white bg-green-600 block rounded-xl hover:bg-gray-500">Devenir Pro</a>
            </div>

        </div>

    </section>

</body>
</html>
