<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SMS EXPRESS</title>
    {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}
    @vite('resources/css/app.css')
</head>
<body>
    <header class="py-10">
      <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <nav class="relative z-50 flex justify-between">
          <div class="flex items-center md:gap-x-12">
            <a aria-label="Home" href="#">
              <svg aria-hidden="true" viewBox="0 0 109 40" class="h-10 w-auto"><path fill-rule="evenodd" clip-rule="evenodd" d="M0 20c0 11.046 8.954 20 20 20s20-8.954 20-20S31.046 0 20 0 0 8.954 0 20Zm20 16c-7.264 0-13.321-5.163-14.704-12.02C4.97 22.358 6.343 21 8 21h24c1.657 0 3.031 1.357 2.704 2.98C33.32 30.838 27.264 36 20 36Z" fill="#2563EB"></path><path d="M55.528 26.57V15.842H52V13.97h9.108v1.872h-3.636V26.57h-1.944Z" fill="#0F172A"></path><path d="M83.084 26.57v-12.6h5.346c.744 0 1.416.18 2.016.54a3.773 3.773 0 0 1 1.44 1.44c.36.612.54 1.302.54 2.07 0 .78-.18 1.482-.54 2.106a4 4 0 0 1-1.44 1.494c-.6.36-1.272.54-2.016.54h-2.646v4.41h-2.7Zm2.664-6.84h2.376c.288 0 .546-.072.774-.216.228-.156.408-.36.54-.612a1.71 1.71 0 0 0 .216-.864c0-.324-.072-.606-.216-.846a1.394 1.394 0 0 0-.54-.576 1.419 1.419 0 0 0-.774-.216h-2.376v3.33ZM106.227 26.57V13.25h2.556v13.32h-2.556Z" fill="#2563EB"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M95.906 26.102c.636.432 1.35.648 2.142.648.444 0 .864-.066 1.26-.198a4.25 4.25 0 0 0 1.062-.558 3.78 3.78 0 0 0 .702-.668v1.244h2.574v-9.522h-2.538v1.248a3.562 3.562 0 0 0-.648-.672 3.13 3.13 0 0 0-1.026-.558 3.615 3.615 0 0 0-1.278-.216c-.828 0-1.566.216-2.214.648-.648.42-1.164 1.002-1.548 1.746-.372.732-.558 1.578-.558 2.538 0 .96.186 1.812.558 2.556.372.744.876 1.332 1.512 1.764Zm4.104-1.908c-.36.228-.78.342-1.26.342-.468 0-.882-.114-1.242-.342a2.387 2.387 0 0 1-.828-.954c-.204-.42-.306-.906-.306-1.458 0-.54.102-1.014.306-1.422.204-.408.48-.726.828-.954.36-.24.774-.36 1.242-.36.48 0 .9.12 1.26.36.36.228.636.546.828.954.204.408.306.882.306 1.422 0 .552-.102 1.038-.306 1.458a2.218 2.218 0 0 1-.828.954Z" fill="#2563EB"></path><path fill-rule="evenodd" clip-rule="evenodd" d="m76.322 23.197 2.595 3.373h2.268l-3.662-4.787 3.338-4.663h-2.196l-2.162 3.334-2.554-3.334h-2.34l3.652 4.71-3.634 4.74h2.196l2.5-3.373ZM62.738 26.102a3.78 3.78 0 0 0 2.142.648c.456 0 .888-.072 1.296-.216.42-.144.798-.336 1.134-.576a3.418 3.418 0 0 0 .864-.835v1.447h1.872v-9.45h-1.872v1.45a3.118 3.118 0 0 0-.72-.82 3.2 3.2 0 0 0-1.062-.612 4.033 4.033 0 0 0-1.35-.216c-.828 0-1.578.21-2.25.63-.66.42-1.188 1.002-1.584 1.746-.384.732-.576 1.572-.576 2.52 0 .936.192 1.776.576 2.52.384.744.894 1.332 1.53 1.764Zm4.122-1.476c-.432.276-.93.414-1.494.414a2.682 2.682 0 0 1-1.476-.414 2.987 2.987 0 0 1-1.008-1.134c-.24-.492-.36-1.05-.36-1.674 0-.612.12-1.158.36-1.638.252-.48.588-.858 1.008-1.134a2.682 2.682 0 0 1 1.476-.414c.564 0 1.062.138 1.494.414.432.276.768.654 1.008 1.134.252.48.378 1.026.378 1.638 0 .624-.126 1.182-.378 1.674-.24.48-.576.858-1.008 1.134Z" fill="#0F172A"></path></svg>
            </a>
            <div class="hidden md:flex md:gap-x-6">
              <a class="inline-block rounded-lg px-2 py-1 text-md text-slate-700 hover:bg-slate-100 hover:text-slate-900" href="#features">Nos chiffres</a>
              <a class="inline-block rounded-lg px-2 py-1 text-md text-slate-700 hover:bg-slate-100 hover:text-slate-900" href="#testimonials">Pricing</a>
              <a class="inline-block rounded-lg px-2 py-1 text-md text-slate-700 hover:bg-slate-100 hover:text-slate-900" href="#pricing">Contact</a>
            </div>
          </div>
          <div class="flex items-center gap-x-5 md:gap-x-8">
            <div class="hidden md:block">
              <a class="inline-block rounded-lg px-2 py-1 text-md text-slate-700 hover:bg-slate-100 hover:text-slate-900" href="/login">FAQ</a>
            </div>
            <a class="group inline-flex items-center justify-center rounded py-2 px-4 text-md font-semibold focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 bg-teal-500 text-white hover:text-slate-100 hover:bg-teal-600 active:bg-teal-800 active:text-teal-100 focus-visible:outline-teal-600" href="/register">
              <span>Mon compte</span>
            </a>
            <div class="-mr-1 md:hidden">
              <div data-headlessui-state="">
                <button class="relative z-10 flex h-8 w-8 items-center justify-center ui-not-focus-visible:outline-none" aria-label="Toggle Navigation" type="button" aria-expanded="false" data-headlessui-state="" id="headlessui-popover-button-:r0:"><svg aria-hidden="true" class="h-3.5 w-3.5 overflow-visible stroke-slate-700" fill="none" stroke-width="2" stroke-linecap="round"><path d="M0 1H14M0 7H14M0 13H14" class="origin-center transition"></path><path d="M2 2L12 12M12 2L2 12" class="origin-center transition scale-90 opacity-0"></path></svg>
                </button>
              </div>
              <div style="position: fixed; top: 1px; left: 1px; width: 1px; height: 0px; padding: 0px; margin: -1px; overflow: hidden; clip: rect(0px, 0px, 0px, 0px); white-space: nowrap; border-width: 0px; display: none;"></div>
            </div>
          </div>
        </nav>
      </div>
	</header>
    <main>
		<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 pb-16 pt-20 text-center lg:pt-32">
			<h1 class="mx-auto max-w-4xl font-display text-5xl font-bold tracking-tight text-slate-900 sm:text-7xl">Engagez votre<!-- --> 
			<span class="relative whitespace-nowrap text-teal-400">
				<svg aria-hidden="true" viewBox="0 0 418 42" class="absolute left-0 top-2/3 h-[0.58em] w-full fill-teal-600/50" preserveAspectRatio="none"><path d="M203.371.916c-26.013-2.078-76.686 1.963-124.73 9.946L67.3 12.749C35.421 18.062 18.2 21.766 6.004 25.934 1.244 27.561.828 27.778.874 28.61c.07 1.214.828 1.121 9.595-1.176 9.072-2.377 17.15-3.92 39.246-7.496C123.565 7.986 157.869 4.492 195.942 5.046c7.461.108 19.25 1.696 19.17 2.582-.107 1.183-7.874 4.31-25.75 10.366-21.992 7.45-35.43 12.534-36.701 13.884-2.173 2.308-.202 4.407 4.442 4.734 2.654.187 3.263.157 15.593-.78 35.401-2.686 57.944-3.488 88.365-3.143 46.327.526 75.721 2.23 130.788 7.584 19.787 1.924 20.814 1.98 24.557 1.332l.066-.011c1.201-.203 1.53-1.825.399-2.335-2.911-1.31-4.893-1.604-22.048-3.261-57.509-5.556-87.871-7.36-132.059-7.842-23.239-.254-33.617-.116-50.627.674-11.629.54-42.371 2.494-46.696 2.967-2.359.259 8.133-3.625 26.504-9.81 23.239-7.825 27.934-10.149 28.304-14.005.417-4.348-3.529-6-16.878-7.066Z"></path></svg>
				<span class="relative">audiance</span>
			</span> <!-- -->avec sms express.
			</h1>
			<p class="mx-auto mt-6 max-w-2xl text-xl tracking-tight text-slate-700">Simplifiez votre manière de communiquer et d'interagir avec vos clients grâce à notre solution SMS hautement fiable et facile à utiliser.</p>
			<div class="mt-10 flex justify-center gap-x-6">
			<a class="group inline-flex items-center justify-center rounded py-2 px-4 text-md font-semibold focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 bg-slate-900 text-white hover:bg-slate-700 hover:text-slate-100 active:bg-slate-800 active:text-slate-300 focus-visible:outline-slate-900" href="/register">C'est parti</a>
			</div>
			<div class="mt-36 lg:mt-24">
			<p class="font-display text-base text-slate-900">Ces entreprises nous ont fais confiance</p>
			<ul role="list" class="mt-8 flex items-center justify-center gap-x-8 sm:flex-col sm:gap-x-0 sm:gap-y-10 xl:flex-row xl:gap-x-12 xl:gap-y-0">
				<li>
					<ul role="list" class="flex flex-col items-center gap-y-8 sm:flex-row sm:gap-x-12 sm:gap-y-0">
						<li class="flex"><img alt="Transistor" loading="lazy" decoding="async" data-nimg="1" style="color:transparent" src="https://salient.tailwindui.com/_next/static/media/transistor.7274e6c3.svg" width="158" height="48"></li>
						<li class="flex"><img alt="Tuple" loading="lazy" decoding="async" data-nimg="1" style="color:transparent" src="https://salient.tailwindui.com/_next/static/media/tuple.74eb0ae0.svg" width="105" height="48"></li>
						<li class="flex"><img alt="StaticKit" loading="lazy" decoding="async" data-nimg="1" style="color:transparent" src="https://salient.tailwindui.com/_next/static/media/statickit.d7937794.svg" width="127" height="48"></li>
					</ul>
				</li>
				<li>
					{{-- <ul role="list" class="flex flex-col items-center gap-y-8 sm:flex-row sm:gap-x-12 sm:gap-y-0">
						<li class="flex"><img alt="Mirage" loading="lazy" decoding="async" data-nimg="1" style="color:transparent" src="https://salient.tailwindui.com/_next/static/media/mirage.18d2ec4e.svg" width="138" height="48"></li>
						<li class="flex"><img alt="Laravel" loading="lazy" decoding="async" data-nimg="1" style="color:transparent" src="https://salient.tailwindui.com/_next/static/media/laravel.7deed17e.svg" width="136" height="48"></li>
						<li class="flex"><img alt="Statamic" loading="lazy" decoding="async" data-nimg="1" style="color:transparent" src="https://salient.tailwindui.com/_next/static/media/statamic.6da5ebfb.svg" width="147" height="48"></li>
					</ul> --}}
				</li>
			</ul>
			</div>
		</div>

		{{-- Stat D'utilisation --}}
		<div class="bg-slate-100/30 py-24 sm:py-32">
			<div class="mx-auto max-w-7xl px-6 lg:px-8">
			<div class="mx-auto max-w-2xl lg:max-w-none">
				<div class="text-center">
				<h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Nos chiffres clés</h2>
				<p class="mt-4 text-lg leading-8 text-gray-600">Que vous cherchiez à améliorer votre engagement client, à accroître vos performances marketing, ou simplement à mieux comprendre l'utilisation de notre service, nos statistiques détaillées vous fourniront les clés pour réussir.</p>
				</div>
				<dl class="mt-16 grid grid-cols-1 gap-0.5 overflow-hidden rounded-2xl text-center sm:grid-cols-2 lg:grid-cols-4">
					<div class="flex flex-col bg-slate-200 p-8">
						<dt class="text-sm font-semibold leading-6 text-gray-600">SMS ENVOYÉ / JOUR</dt>
						<dd class="order-first text-3xl font-semibold tracking-tight text-gray-900">1000+</dd>
					</div>
					<div class="flex flex-col bg-slate-200 p-8">
						<dt class="text-sm font-semibold leading-6 text-gray-600">Utilisateur Particulier</dt>
						<dd class="order-first text-3xl font-semibold tracking-tight text-gray-900">100+</dd>
					</div>
					<div class="flex flex-col bg-slate-200 p-8">
						<dt class="text-sm font-semibold leading-6 text-gray-600">Entreprise</dt>
						<dd class="order-first text-3xl font-semibold tracking-tight text-gray-900">9+</dd>
					</div>
					<div class="flex flex-col bg-slate-200 p-8">
						<dt class="text-sm font-semibold leading-6 text-gray-600">Pays disponible</dt>
						<dd class="order-first text-3xl font-semibold tracking-tight text-gray-900">200</dd>
					</div>
				</dl>
			</div>
			</div>
		</div>

		{{-- Pricing --}}
		<section id="pricing" aria-label="Pricing" class="bg-slate-800 py-32 sm:py-32 sm:px-14">
			<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-2">
				<div class="md:text-center">
					<h2 class="font-display text-3xl tracking-tight text-white sm:text-4xl">
						<span class="relative whitespace-nowrap">
							<svg aria-hidden="true" viewBox="0 0 281 40" class="absolute left-0 top-1/2 h-[1em] w-full fill-teal-600/50" preserveAspectRatio="none"><path fill-rule="evenodd" clip-rule="evenodd" d="M240.172 22.994c-8.007 1.246-15.477 2.23-31.26 4.114-18.506 2.21-26.323 2.977-34.487 3.386-2.971.149-3.727.324-6.566 1.523-15.124 6.388-43.775 9.404-69.425 7.31-26.207-2.14-50.986-7.103-78-15.624C10.912 20.7.988 16.143.734 14.657c-.066-.381.043-.344 1.324.456 10.423 6.506 49.649 16.322 77.8 19.468 23.708 2.65 38.249 2.95 55.821 1.156 9.407-.962 24.451-3.773 25.101-4.692.074-.104.053-.155-.058-.135-1.062.195-13.863-.271-18.848-.687-16.681-1.389-28.722-4.345-38.142-9.364-15.294-8.15-7.298-19.232 14.802-20.514 16.095-.934 32.793 1.517 47.423 6.96 13.524 5.033 17.942 12.326 11.463 18.922l-.859.874.697-.006c2.681-.026 15.304-1.302 29.208-2.953 25.845-3.07 35.659-4.519 54.027-7.978 9.863-1.858 11.021-2.048 13.055-2.145a61.901 61.901 0 0 0 4.506-.417c1.891-.259 2.151-.267 1.543-.047-.402.145-2.33.913-4.285 1.707-4.635 1.882-5.202 2.07-8.736 2.903-3.414.805-19.773 3.797-26.404 4.829Zm40.321-9.93c.1-.066.231-.085.29-.041.059.043-.024.096-.183.119-.177.024-.219-.007-.107-.079ZM172.299 26.22c9.364-6.058 5.161-12.039-12.304-17.51-11.656-3.653-23.145-5.47-35.243-5.576-22.552-.198-33.577 7.462-21.321 14.814 12.012 7.205 32.994 10.557 61.531 9.831 4.563-.116 5.372-.288 7.337-1.559Z"></path></svg>
							<span class="relative">Une tarification simple,</span>
						</span> pour tous.
					</h2>
					<p class="mt-4 text-lg text-slate-400">Quelque soit la taille de votre entreprise,choisissez une offre qui vous convient</p>
				</div>
				<div class="-mx-4 mt-16 grid max-w-2xl grid-cols-1 gap-y-10 sm:mx-auto lg:-mx-8 lg:max-w-none lg:grid-cols-5 xl:mx-0 xl:gap-x-8">
				
					
					<section class="flex border border-white h-max flex-col rounded-3xl px-6 sm:px-8 py-8 md:mx-0 mx-8">
						<h3 class="mt-1 font-display text-lg text-white">10 SMS</h3>
						<p class="mt-2 text-base text-slate-400">Pack 1</p>
						<a class="group inline-flex ring-1 items-center justify-center rounded-full py-2 px-4 text-sm focus:outline-none ring-slate-700 text-white hover:ring-slate-500 active:ring-slate-700 active:text-slate-400 focus-visible:outline-white mt-8" href="/register">Souscrire</a>
						<p class="order-first font-display text-3xl font-light tracking-tight text-teal-400">4500 FCFA</p>
					</section>
					<section class="flex border border-white h-max flex-col rounded-3xl px-6 sm:px-8 py-8 md:mx-0 mx-8">
						<h3 class="mt-1 font-display text-lg text-white">30 SMS</h3>
						<p class="mt-2 text-base text-slate-400">Pack 2</p>
						<a class="group inline-flex ring-1 items-center justify-center rounded-full py-2 px-4 text-sm focus:outline-none ring-slate-700 text-white hover:ring-slate-500 active:ring-slate-700 active:text-slate-400 focus-visible:outline-white mt-8" href="/register">Souscrire</a>
						<p class="order-first font-display text-3xl font-light tracking-tight text-teal-400">9000 FCFA</p>
					</section>
					<section class="flex border border-white h-max flex-col rounded-3xl px-6 sm:px-8 py-8 md:mx-0 mx-8">
						<h3 class="mt-1 font-display text-lg text-white">100 SMS</h3>
						<p class="mt-2 text-base text-slate-400">Pack 3</p>
						<a class="group inline-flex ring-1 items-center justify-center rounded-full py-2 px-4 text-sm focus:outline-none ring-slate-700 text-white hover:ring-slate-500 active:ring-slate-700 active:text-slate-400 focus-visible:outline-white mt-8" href="/register">Souscrire</a>
						<p class="order-first font-display text-3xl font-light tracking-tight text-teal-400">23.000 FCFA</p>
					</section>
					<section class="flex border border-white h-max flex-col rounded-3xl px-6 sm:px-8 py-8 md:mx-0 mx-8">
						<h3 class="mt-1 font-display text-lg text-white">250 SMS</h3>
						<p class="mt-2 text-base text-slate-400">Pack 4</p>
						<a class="group inline-flex ring-1 items-center justify-center rounded-full py-2 px-4 text-sm focus:outline-none ring-slate-700 text-white hover:ring-slate-500 active:ring-slate-700 active:text-slate-400 focus-visible:outline-white mt-8" href="/register">Souscrire</a>
						<p class="order-first font-display text-3xl font-light tracking-tight text-teal-400">46.000 FCFA</p>
					</section>
					<section class="flex border-4 border-teal-400 h-max flex-col rounded-3xl px-6 sm:px-8 py-8 md:mx-0 mx-8">
						<h3 class="mt-1 font-display text-lg text-white">SMS Illimité</h3>
						<p class="mt-2 text-base text-slate-400">Entreprise</p>
						<a class="group inline-flex ring-1 items-center justify-center rounded-full py-2 px-4 text-sm focus:outline-none ring-slate-700 text-white hover:ring-slate-500 active:ring-slate-700 active:text-slate-400 focus-visible:outline-white mt-8" href="/register">Souscrire</a>
						<p class="order-first font-display text-3xl lg:text-lg font-bold tracking-tight text-teal-400">100.000 FCFA <span class="text-sm text-white">/mois</span> </p>
					</section>
					{{-- <section class="flex flex-col rounded-3xl px-6 sm:px-8 lg:py-8">
						<h3 class="mt-5 font-display text-lg text-white">Enterprise</h3>
						<p class="mt-2 text-base text-slate-400">For even the biggest enterprise companies.</p>
						<p class="order-first font-display text-5xl font-light tracking-tight text-white">$39</p>
						<ul role="list" class="order-last mt-10 flex flex-col gap-y-3 text-sm text-slate-200">
							<li class="flex">
								<svg aria-hidden="true" class="h-6 w-6 flex-none fill-current stroke-current text-slate-400"><path d="M9.307 12.248a.75.75 0 1 0-1.114 1.004l1.114-1.004ZM11 15.25l-.557.502a.75.75 0 0 0 1.15-.043L11 15.25Zm4.844-5.041a.75.75 0 0 0-1.188-.918l1.188.918Zm-7.651 3.043 2.25 2.5 1.114-1.004-2.25-2.5-1.114 1.004Zm3.4 2.457 4.25-5.5-1.187-.918-4.25 5.5 1.188.918Z" stroke-width="0"></path><circle cx="12" cy="12" r="8.25" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle></svg>
								<span class="ml-4">Send unlimited quotes and invoices</span>
							</li>
							<li class="flex">
								<svg aria-hidden="true" class="h-6 w-6 flex-none fill-current stroke-current text-slate-400"><path d="M9.307 12.248a.75.75 0 1 0-1.114 1.004l1.114-1.004ZM11 15.25l-.557.502a.75.75 0 0 0 1.15-.043L11 15.25Zm4.844-5.041a.75.75 0 0 0-1.188-.918l1.188.918Zm-7.651 3.043 2.25 2.5 1.114-1.004-2.25-2.5-1.114 1.004Zm3.4 2.457 4.25-5.5-1.187-.918-4.25 5.5 1.188.918Z" stroke-width="0"></path><circle cx="12" cy="12" r="8.25" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle></svg>
								<span class="ml-4">Connect up to 15 bank accounts</span>
							</li>
							<li class="flex">
								<svg aria-hidden="true" class="h-6 w-6 flex-none fill-current stroke-current text-slate-400"><path d="M9.307 12.248a.75.75 0 1 0-1.114 1.004l1.114-1.004ZM11 15.25l-.557.502a.75.75 0 0 0 1.15-.043L11 15.25Zm4.844-5.041a.75.75 0 0 0-1.188-.918l1.188.918Zm-7.651 3.043 2.25 2.5 1.114-1.004-2.25-2.5-1.114 1.004Zm3.4 2.457 4.25-5.5-1.187-.918-4.25 5.5 1.188.918Z" stroke-width="0"></path><circle cx="12" cy="12" r="8.25" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle></svg>
								<span class="ml-4">Track up to 200 expenses per month</span>
							</li>
							<li class="flex">
								<svg aria-hidden="true" class="h-6 w-6 flex-none fill-current stroke-current text-slate-400"><path d="M9.307 12.248a.75.75 0 1 0-1.114 1.004l1.114-1.004ZM11 15.25l-.557.502a.75.75 0 0 0 1.15-.043L11 15.25Zm4.844-5.041a.75.75 0 0 0-1.188-.918l1.188.918Zm-7.651 3.043 2.25 2.5 1.114-1.004-2.25-2.5-1.114 1.004Zm3.4 2.457 4.25-5.5-1.187-.918-4.25 5.5 1.188.918Z" stroke-width="0"></path><circle cx="12" cy="12" r="8.25" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle></svg>
								<span class="ml-4">Automated payroll support</span>
							</li>
							<li class="flex">
								<svg aria-hidden="true" class="h-6 w-6 flex-none fill-current stroke-current text-slate-400"><path d="M9.307 12.248a.75.75 0 1 0-1.114 1.004l1.114-1.004ZM11 15.25l-.557.502a.75.75 0 0 0 1.15-.043L11 15.25Zm4.844-5.041a.75.75 0 0 0-1.188-.918l1.188.918Zm-7.651 3.043 2.25 2.5 1.114-1.004-2.25-2.5-1.114 1.004Zm3.4 2.457 4.25-5.5-1.187-.918-4.25 5.5 1.188.918Z" stroke-width="0"></path><circle cx="12" cy="12" r="8.25" fill="none" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></circle></svg>
								<span class="ml-4">Export up to 25 reports, including TPS</span>
							</li>
						</ul>
						<a class="group inline-flex ring-1 items-center justify-center rounded-full py-2 px-4 text-sm focus:outline-none ring-slate-700 text-white hover:ring-slate-500 active:ring-slate-700 active:text-slate-400 focus-visible:outline-white mt-8" aria-label="Get started with the Enterprise plan for $39" href="/register">Get started</a>
					</section> --}}
				</div>
			</div>
		</section>

		{{-- Contact --}}
		<section id="get-started-today" class="relative overflow-hidden bg-slate-100 py-32">
			<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative">
				<div class="mx-auto max-w-3xl text-center">
					<h2 class="font-display text-3xl tracking-tight font-bold text-gray-900 sm:text-4xl">Contactez-nous</h2>
					<p class="mt-4 text-lg tracking-tight text-black">Nous sommes ravis de vous entendre ! Si vous avez des questions, des commentaires ou que vous souhaitez simplement discuter, n'hésitez pas à nous contacter en utilisant le formulaire ci-dessous. Nous ferons de notre mieux pour vous répondre dans les plus brefs délais.</p>
					<a class="group inline-flex items-center justify-center rounded py-2 px-4 text-md font-semibold focus:outline-none focus-visible:outline-2 focus-visible:outline-offset-2 bg-slate-900 text-white hover:bg-slate-800 active:bg-blue-200 active:text-slate-600 focus-visible:outline-white mt-10" href="/register">Get 6 months free</a>
				</div>
			</div>
		</section>

		{{-- FAQ --}}
		<section id="faq" aria-labelledby="faq-title" class="relative overflow-hidden bg-slate-50 py-20 sm:py-32">
			<img alt="" loading="lazy" decoding="async" data-nimg="1" class="absolute left-1/2 top-0 max-w-none -translate-y-1/4 translate-x-[-30%]" style="color: transparent;" src="{{asset('image/background-faqs.55d2e36a.jpg')}}" width="1558" height="946">
			<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative">
				<div class="mx-auto max-w-2xl lg:mx-0">
					<h2 id="faq-title" class="font-display text-3xl tracking-tight font-bold text-slate-900 sm:text-4xl">Foire aux questions</h2>
					<p class="mt-4 text-lg tracking-tight text-slate-700">Si vous ne trouvez pas ce que vous cherchez, envoyez un courriel à notre équipe d'assistance.</p>
				</div>
				<ul role="list" class="mx-auto mt-16 grid max-w-2xl grid-cols-1 gap-8 lg:max-w-none lg:grid-cols-3">
					<li>
						<ul role="list" class="flex flex-col gap-y-8">
							<li>
								<h3 class="font-display font-semibold text-lg leading-7 text-slate-900">Does TaxPal handle VAT?</h3>
								<p class="mt-4 text-sm text-slate-700">Well no, but if you move your company offshore you can probably ignore it.</p>
							</li>
							<li>
								<h3 class="font-display font-semibold text-lg leading-7 text-slate-900">Can I pay for my subscription via purchase order?</h3>
								<p class="mt-4 text-sm text-slate-700">Absolutely, we are happy to take your money in all forms.</p>
							</li>
							<li>
								<h3 class="font-display font-semibold text-lg leading-7 text-slate-900">How do I apply for a job at TaxPal?</h3>
								<p class="mt-4 text-sm text-slate-700">We only hire our customers, so subscribe for a minimum of 6 months and then let’s talk.</p>
							</li>
						</ul>
					</li>
					<li>
						<ul role="list" class="flex flex-col gap-y-8">
							<li>
								<h3 class="font-display font-semibold text-lg leading-7 text-slate-900">What was that testimonial about tax fraud all about?</h3>
								<p class="mt-4 text-sm text-slate-700">TaxPal is just a software application, ultimately your books are your responsibility.</p>
							</li>
							<li>
								<h3 class="font-display font-semibold text-lg leading-7 text-slate-900">TaxPal sounds horrible but why do I still feel compelled to purchase?</h3>
								<p class="mt-4 text-sm text-slate-700">This is the power of excellent visual design. You just can’t resist it, no matter how poorly it actually functions.</p>
							</li>
							<li>
								<h3 class="font-display font-semibold text-lg leading-7 text-slate-900">I found other companies called TaxPal, are you sure you can use this name?</h3>
								<p class="mt-4 text-sm text-slate-700">Honestly not sure at all. We haven’t actually incorporated or anything, we just thought it sounded cool and made this website.</p>
							</li>
						</ul>
					</li>
					<li>
						<ul role="list" class="flex flex-col gap-y-8">
							<li>
								<h3 class="font-display font-semibold text-lg leading-7 text-slate-900">How do you generate reports?</h3>
								<p class="mt-4 text-sm text-slate-700">You just tell us what data you need a report for, and we get our kids to create beautiful charts for you using only the finest crayons.</p>
							</li>
							<li>
								<h3 class="font-display font-semibold text-lg leading-7 text-slate-900">Can we expect more inventory features?</h3>
								<p class="mt-4 text-sm text-slate-700">In life it’s really better to never expect anything at all.</p>
							</li>
							<li>
								<h3 class="font-display font-semibold text-lg leading-7 text-slate-900">I lost my password, how do I get into my account?</h3>
								<p class="mt-4 text-sm text-slate-700">Send us an email and we will send you a copy of our latest password spreadsheet so you can find your information.</p>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</section>

		{{-- Footer --}}
		<footer class="bg-slate-50">
			<div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
				<div class="py-16">
					<p class="text-center text-2xl font-semibold"><a href="" class="text-teal-400">SMSExpress</a></p>
					<nav class="mt-10 text-sm" aria-label="quick links">
						<div class="-my-1 flex justify-center gap-x-6">
							<a class="inline-block rounded-lg px-2 py-1 text-sm text-slate-700 hover:bg-slate-100 hover:text-slate-900" href="#features">Nos chiffres</a>
							<a class="inline-block rounded-lg px-2 py-1 text-sm text-slate-700 hover:bg-slate-100 hover:text-slate-900" href="#testimonials">Pricing</a>
							<a class="inline-block rounded-lg px-2 py-1 text-sm text-slate-700 hover:bg-slate-100 hover:text-slate-900" href="#testimonials">FAQ</a>
							<a class="inline-block rounded-lg px-2 py-1 text-sm text-slate-700 hover:bg-slate-100 hover:text-slate-900" href="#pricing">Contact</a>
						</div>
					</nav>
				</div>
				<div class="flex flex-col items-center border-t border-slate-400/10 py-10 sm:flex-row-reverse sm:justify-between">
					<div class="flex gap-x-6">
						<a class="group" aria-label="TaxPal on Twitter" href="https://twitter.com">
							<svg aria-hidden="true" class="h-6 w-6 fill-slate-500 group-hover:fill-slate-700"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0 0 22 5.92a8.19 8.19 0 0 1-2.357.646 4.118 4.118 0 0 0 1.804-2.27 8.224 8.224 0 0 1-2.605.996 4.107 4.107 0 0 0-6.993 3.743 11.65 11.65 0 0 1-8.457-4.287 4.106 4.106 0 0 0 1.27 5.477A4.073 4.073 0 0 1 2.8 9.713v.052a4.105 4.105 0 0 0 3.292 4.022 4.093 4.093 0 0 1-1.853.07 4.108 4.108 0 0 0 3.834 2.85A8.233 8.233 0 0 1 2 18.407a11.615 11.615 0 0 0 6.29 1.84"></path></svg>
						</a>
					</div>
					<p class="mt-6 text-sm text-slate-500 sm:mt-0">Copyright &copy; 2023 SMSExpress. Tout droit réservé.</p>
				</div>
			</div>
		</footer>

    </main>
</body>
</html>