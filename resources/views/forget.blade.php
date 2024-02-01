<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="shortcut icon" href="{{asset('image/logo.jpg')}}" type="image/x-icon">
    <title>SMS EXPRESS | Mot de passe oublié</title>
    <link rel="stylesheet" href="{{asset('build/assets/app-64a05f50.css')}}">
	<script src=" {{asset('build/assets/app-0d91dc04.js')}} "></script>
    {{-- @vite('resources/css/app.css') --}}
</head>
<body>
    <header class="relative z-50 py-10">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <nav class="relative z-50 flex justify-between">
          <div class="flex items-center md:gap-x-12">
            <a aria-label="Home" href="{{route('home')}}">
              <img src="{{asset('image/logo.jpg')}}" class="w-10" alt="">
            </a>
            <div class="hidden md:flex md:gap-x-6">
              <a class="inline-block rounded-lg px-2 py-1 text-md text-slate-700 hover:bg-slate-100 hover:text-slate-900" href="{{route('home')}}#nos-chiffres">Nos chiffres</a>
              <a class="inline-block rounded-lg px-2 py-1 text-md text-slate-700 hover:bg-slate-100 hover:text-slate-900" href="{{route('home')}}#pricing">Tarif</a>
              <a class="inline-block rounded-lg px-2 py-1 text-md text-slate-700 hover:bg-slate-100 hover:text-slate-900" href="{{route('home')}}#contact">Contact</a>
            </div>
          </div>
          <div class="flex items-center gap-x-5 md:gap-x-8">
            <div class="hidden md:block">
              <a class="inline-block rounded-lg px-2 py-1 text-md text-slate-700 hover:bg-slate-100 hover:text-slate-900" href="{{route('home')}}#faq">FAQ</a>
            </div>
            <a class="group inline-flex items-center justify-center rounded py-2 px-4 text-md font-semibold focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 bg-teal-500 text-white hover:text-slate-100 hover:bg-teal-600 active:bg-teal-800 active:text-teal-100 focus-visible:outline-teal-600" href="{{route('loginpage')}}">
              <span>Mon compte</span>
            </a>
            <div class="-mr-1 md:hidden">
              <div data-headlessui-state="" id="home-menu">
                <button class="relative z-10 flex h-8 w-8 items-center justify-center ui-not-focus-visible:outline-none" aria-label="Toggle Navigation" type="button" aria-expanded="false" data-headlessui-state="" id="headlessui-popover-button-:r0:"><svg aria-hidden="true" class="h-3.5 w-3.5 overflow-visible stroke-slate-700" fill="none" stroke-width="2" stroke-linecap="round"><path d="M0 1H14M0 7H14M0 13H14" class="origin-center transition"></path><path d="M2 2L12 12M12 2L2 12" class="origin-center transition scale-90 opacity-0"></path></svg>
                </button>
              </div>
              <div style="position: fixed; top: 1px; left: 1px; width: 1px; height: 0px; padding: 0px; margin: -1px; overflow: hidden; clip: rect(0px, 0px, 0px, 0px); white-space: nowrap; border-width: 0px; display: none;"></div>
            </div>
          </div>
        </nav>
      </div>
	</header>

    {{-- Mobile Navigation --}}

    <div class="absolute -top-80 z-40 bg-white transition-all duration-500 ease-in-out w-full" id="home-mobilenav">
        <div class="flex relative z-40 flex-col md:hidden gap-y-2 p-4 shadow-lg border">
            <a class="inline-block rounded-lg p-4 text-md text-slate-700 hover:bg-slate-100 font-bold hover:text-slate-900" href="{{route('home')}}#nos-chiffres">Nos chiffres</a>
            <a class="inline-block rounded-lg p-4 text-md text-slate-700 hover:bg-slate-100 font-bold hover:text-slate-900" href="{{route('home')}}#pricing">Tarif</a>
            <a class="inline-block rounded-lg p-4 text-md text-slate-700 hover:bg-slate-100 font-bold hover:text-slate-900" href="{{route('home')}}#contact">Contact</a>
            <a class="inline-block rounded-lg p-4 text-md text-slate-700 hover:bg-slate-100 font-bold hover:text-slate-900" href="{{route('home')}}#faq">FAQ</a>
        </div>
    </div>

    <main class="h-[calc(100vh-130px)] flex flex-col items-center justify-center relative">

        <div class="px-6 h-full flex w-full md:w-2/5 mb-10 flex-col justify-center">
            <h1 class="text-teal-600 font-bold mb-5 text-3xl">Mot de passe oublié</h1>
            <form class="space-y-4 md:space-y-6" action="#">
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">E-mail</label>
                    <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-teal-600 focus:border-teal-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Entrer votre e-mail" required="">
                </div>
                <button type="submit" class="w-full text-white bg-teal-600 hover:bg-teal-700 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">Envoyer</button>

            </form>
        </div>
    </main>

    <script>
        let menu = document.querySelector('#home-menu');
        let navmobile = document.querySelector('#home-mobilenav');

        menu.addEventListener('click',()=>{
            if(navmobile.classList.contains('-top-80')) {
                navmobile.classList.remove('-top-80')
                navmobile.setAttribute('tabindex',-1)
                navmobile.focus();
                navmobile.classList.add("top-28")
            } else {
                navmobile.classList.add('-top-80')
                navmobile.classList.remove("top-28")
            }
        })

        // navmobile.addEventListener('blur', (e) => {
        //     console.log(e.target.getAttribute('id'))
        //         navmobile.classList.add('-top-64')
        //         navmobile.classList.remove("top-28")
        //     // }

        // });

    </script>
</body>
</html>
