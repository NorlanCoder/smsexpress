@if(!Auth::user())
    <script> window.location.href="{{route('loginpage')}}"; </script>
@endif
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

    <style>
        .tooltip-add, .tooltip-excel, .tooltip-msg {
            position: relative;
            /* display: inline-block; */
            /* border-bottom: 1px dotted black; */
        }

        .tooltip-add .tooltiptext-add, .tooltip-excel .tooltiptext-excel, .tooltip-msg .tooltiptext-msg {
            visibility: hidden;
            width: 250px;
            background-color: #555;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 0;
            margin-left: -60px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip-add .tooltiptext-add::after, .tooltip-excel .tooltiptext-excel::after, .tooltip-msg .tooltiptext-msg::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #555 transparent transparent transparent;
        }

        .tooltip-add:hover .tooltiptext-add, .tooltip-excel:hover .tooltiptext-excel, .tooltip-msg:hover .tooltiptext-msg {
            visibility: visible;
            opacity: 1;
        }
    </style>

</head>
<body class="h-screen overflow-y-hidden">

    <nav class="w-full fixed flex flex-row items-center justify-between bg-white z-10 shadow-sm border-b border-gray px-6 py-3 h-20">
        <div><a href="{{route('home')}}"><img class="w-10" src="{{asset('image/logo.jpg')}}" alt=""></a></div>
        <div class="hidden md:block">
            <span class="flex cursor-pointer bg-teal-600 w-12 h-12 rounded-3xl text-white items-center justify-center border-2 border-teal-700">
                @auth
                    {{strtoupper(Auth::user()->email[0])}}{{strtoupper(Auth::user()->email[1])}}
                @endauth
            </span>
        </div>
        <div class="block md:hidden" id="menu">
            <i class="fa-solid fa-bars text-3xl text-teal-700 cursor-pointer"></i>
        </div>
    </nav>
    <section class="flex absolute w-screen top-20 h-[calc(100%-5rem)]">

        {{-- SubNav --}}
        <div class="hidden md:flex flex-col justify-between border-r border-gray-200 w-72 px-4 py-4 h-full">
            <div class="flex flex-col gap-y-4 w-[100%]" id="sidenav">
                <a href="{{route('customerhome')}}" class="px-4 py-4 text-gray-600 bg-slate-50 hover:bg-slate-100 w-[100%] flex gap-x-4 font-semibold items-center rounded-md"><i class="fa-brands fa-font-awesome "></i> Envoyer un SMS</a>
                <a href="{{route('customersouscription')}}" class="px-4 py-4 text-gray-600 bg-slate-50 hover:bg-slate-100 flex items-center gap-x-4 font-semibold w-[100%] rounded-md"><i class="fa-solid fa-money-bill-trend-up"></i> Historiques de paiements</a>
                <a href="{{route('customertransaction')}}" class="px-4 py-4 text-gray-600 bg-slate-50 hover:bg-slate-100 flex items-center gap-x-4 font-semibold w-[100%] rounded-md"><i class="fa-solid fa-paper-plane"></i> Historiques des envois</a>
                <a href="{{route('customercontacts')}}" class="px-4 py-4 text-gray-600 bg-slate-50 hover:bg-slate-100 flex items-center gap-x-4 font-semibold w-[100%] rounded-md"><i class="fa-solid fa-address-book"></i> Ajouter Contact</a>
                <a href="{{route('customeroffre')}}" class="px-4 py-4 text-gray-600 bg-slate-50 hover:bg-slate-100 flex items-center gap-x-4 font-semibold w-[100%] rounded-md"><i class="fa-solid fa-envelope-circle-check"></i> Abonnement</a>
                <a href="{{route('customerprofile')}}" class="px-4 py-4 text-gray-600 bg-slate-50 hover:bg-slate-100 flex items-center gap-x-4 font-semibold w-[100%] rounded-md"><i class="fa-solid fa-user-tie"></i> Profil</a>
            </div>
            <div class="w-[100%] flex flex-col gap-y-4 items-center justify-center ">
                <a href="" class="px-4 py-4 text-white bg-gray-400 w-[100%] flex items-center gap-x-4 rounded-md hover:bg-gray-400"><i class="fa-solid fa-circle-info"></i> contact@smsexpress.pro</a>
                <a href="{{route('logout')}}" class="px-4 py-4 text-white bg-gray-600 w-[100%] flex items-center gap-x-4 rounded-md hover:bg-gray-500"><i class="fa-solid fa-power-off text-red-400"></i> Déconnexion</a>
            </div>
        </div>

        @yield('dashboard_main')

    </section>

    {{-- Mobile nav --}}
    <div id="mobilenav" class="md:hidden transition-all duration-500 ease-in-out flex flex-col justify-between border-r border-gray-200 w-2/3 bg-white px-4 py-4 h-full z-50 fixed -left-2/3">
        <div class="flex flex-col gap-y-4 w-[100%]" id="sidenav">
            <div><a href="{{route('home')}}"><img class="w-10" src="{{asset('image/logo.jpg')}}" alt=""></a></div>
            <a href="{{route('customerhome')}}" class="px-4 py-4 text-gray-600 bg-slate-50 hover:bg-slate-100 w-[100%] flex gap-x-4 font-semibold items-center rounded-md"><i class="fa-brands fa-font-awesome "></i> Envoyer un SMS</a>
            <a href="{{route('customersouscription')}}" class="px-4 py-4 text-gray-600 bg-slate-50 hover:bg-slate-100 flex items-center gap-x-4 font-semibold w-[100%] rounded-md"><i class="fa-solid fa-money-bill-trend-up"></i> Historiques de paiements</a>
            <a href="{{route('customertransaction')}}" class="px-4 py-4 text-gray-600 bg-slate-50 hover:bg-slate-100 flex items-center gap-x-4 font-semibold w-[100%] rounded-md"><i class="fa-solid fa-paper-plane"></i> Historiques des envois</a>
            <a href="{{route('customercontacts')}}" class="px-4 py-4 text-gray-600 bg-slate-50 hover:bg-slate-100 flex items-center gap-x-4 font-semibold w-[100%] rounded-md"><i class="fa-solid fa-address-book"></i> Ajouter Contact</a>
            <a href="{{route('customeroffre')}}" class="px-4 py-4 text-gray-600 bg-slate-50 hover:bg-slate-100 flex items-center gap-x-4 font-semibold w-[100%] rounded-md"><i class="fa-solid fa-envelope-circle-check"></i> Abonnement</a>
            <a href="{{route('customerprofile')}}" class="px-4 py-4 text-gray-600 bg-slate-50 hover:bg-slate-100 flex items-center gap-x-4 font-semibold w-[100%] rounded-md"><i class="fa-solid fa-user-tie"></i> Profil</a>
        </div>
        <div class="w-[100%] flex flex-col gap-y-4 items-center justify-center ">
            <a href="" class="px-4 py-4 text-white bg-gray-400 w-[100%] flex items-center gap-x-4 rounded-md hover:bg-gray-400"><i class="fa-solid fa-circle-info"></i> contact@smsexpress.pro</a>
            <a href="{{route('logout')}}" class="px-4 py-4 text-white bg-gray-600 w-[100%] flex items-center gap-x-4 rounded-md hover:bg-gray-500"><i class="fa-solid fa-power-off text-red-400"></i> Déconnexion</a>
        </div>
    </div>

    @yield('script')
    <script src="https://cdn.kkiapay.me/k.js"></script>
    <script>
        let sidenav_link = document.querySelectorAll('#sidenav a');
        let menu = document.querySelector('#menu');
        let navmobile = document.querySelector('#mobilenav');

        menu.addEventListener('click',()=>{
            if(navmobile.classList.contains('-left-2/3')) {
                navmobile.classList.remove('-left-2/3')
                navmobile.classList.add("left-0")
            } else {
                navmobile.classList.add('-left-2/3')
                navmobile.classList.remove("left-0")
            }
        })

        const path = window.location.pathname;

        switch (path) {
            case "/customer/dashboard":
                sidenav_link[0].classList.add('bg-teal-600');
                sidenav_link[0].classList.add('text-white');
                sidenav_link[0].classList.remove('bg-slate-50');
                sidenav_link[0].classList.remove('hover:bg-slate-100');
                sidenav_link[0].classList.remove('text-gray-600');
                break;

            case "/customer/historique/souscription":
                sidenav_link[1].classList.add('bg-teal-600');
                sidenav_link[1].classList.add('text-white');
                sidenav_link[1].classList.remove('bg-slate-50');
                sidenav_link[1].classList.remove('hover:bg-slate-100');
                sidenav_link[1].classList.remove('text-gray-600');
                break;

            case "/customer/historique/transaction":
                sidenav_link[2].classList.add('bg-teal-600');
                sidenav_link[2].classList.add('text-white');
                sidenav_link[2].classList.remove('bg-slate-50');
                sidenav_link[2].classList.remove('hover:bg-slate-100');
                sidenav_link[2].classList.remove('text-gray-600');
                break;

            case "/customer/offres":
                sidenav_link[4].classList.add('bg-teal-600');
                sidenav_link[4].classList.add('text-white');
                sidenav_link[4].classList.remove('bg-slate-50');
                sidenav_link[4].classList.remove('hover:bg-slate-100');
                sidenav_link[4].classList.remove('text-gray-600');
                break;

            case "/customer/contacts":
                sidenav_link[3].classList.add('bg-teal-600');
                sidenav_link[3].classList.add('text-white');
                sidenav_link[3].classList.remove('bg-slate-50');
                sidenav_link[3].classList.remove('hover:bg-slate-100');
                sidenav_link[3].classList.remove('text-gray-600');
                break;

            case "/customer/profile":
                sidenav_link[5].classList.add('bg-teal-600');
                sidenav_link[5].classList.add('text-white');
                sidenav_link[5].classList.remove('bg-slate-50');
                sidenav_link[5].classList.remove('hover:bg-slate-100');
                sidenav_link[5].classList.remove('text-gray-600');
                break;

            default:
                break;
        }

    </script>

</body>
</html>
