@extends('customer.layout')
@section('title','Mes Contacts')
@section('dashboard_main')
    <div class="relative overflow-y-auto px-6 py-4 md:w-[calc(100%-18rem)]">

        <h1 class="mt-4 pl-4 text-gray-700 text-2xl font-bold">Vos contacts</h1>

        <div class="w-full my-10">
            <div class="my-4">
                @error('msg')
                    <div class="text-red-400 text-center">{{ $message }}</div>
                @enderror
                @error('file-excel')
                    <div class="text-red-400 text-center">{{ $message }}</div>
                @enderror
                @error('success')
                    <div class="text-green-400 text-center">{{ $message }}</div>
                @enderror
            </div>
            <div class="flex justify-end mb-2 gap-x-2">
                <a href="#" id="add-contact" class="px-3 py-3 text-gray-600 bg-slate-50 border-2 border-teal-400 hover:bg-slate-100 w-auto flex gap-x-4 font-semibold items-center rounded-md tooltip-add"><i class="fa-brands fa-plus text-teal-400"></i> <span class="tooltiptext-add">Ajouter un contact</span></a>
                <a href="#" id="add-contact-excel" class="px-3 py-3 bg-teal-400 border-2 border-teal-400 hover:bg-teal-500 w-auto flex gap-x-4 font-semibold items-center rounded-md @if (!$pro) cursor-not-allowed @endif tooltip-excel"><i class="fa-solid fa-file-excel text-white"></i> @if($pro)<span class="tooltiptext-excel">Ajouter plusieurs contact simultanément via excel</span>@else <span class="tooltiptext-excel">Ajouter plusieurs contact simultanément via excel (Abonnement Pro)</span> @endif</a>
                <a href="#" id="group-contact" class="px-2 py-2 bg-slate-400 border-2 border-slate-400 hover:bg-slate-500 w-auto flex gap-x-4 font-semibold items-center rounded-md @if (!$pro) cursor-not-allowed @endif text-white tooltip-msg"><i class="fa-solid fa-paper-plane text-white"></i> Message groupé @if($pro) <span class="tooltiptext-msg">Envoyé un même message simultanément</span> @else <span class="tooltiptext-msg">Envoyé un même message simultanément <i>(Abonnement Pro)</i></span> @endif</a>
            </div>
            <table class="table-fixed w-full">
                <thead>
                    <tr>
                        <th class="bg-teal-50 rounded-md text-left p-4 border">#</th>
                        <th class="bg-teal-50 rounded-md text-left p-4 border">Nom</th>
                        <th class="bg-teal-50 rounded-md text-left p-4 border">Numéro</th>
                        <th class="bg-teal-50 rounded-md p-4 border text-center"><i class="fa-solid fa-paper-plane"></i></th>
                        {{-- <th class="bg-teal-50 rounded-md p-4 border text-center"><i class="fa-solid fa-edit"></i></th> --}}
                        <th class="bg-teal-50 rounded-md p-4 border text-center"><i class="fa-solid fa-trash"></i></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $i=>$contact)
                        <tr class=" bg-slate-300/10">
                            <td class="p-4 text-teal-400 font-extrabold border"> {{$i+1}} </td>
                            <td class="p-4 border">{{$contact->nom}}</td>
                            <td class="p-4 border">{{$contact->numero}}</td>
                            <td class="p-4 text-center border send-icon-button"><a href=""><i class="fa-solid fa-paper-plane text-teal-400"></i></a></td>
                            {{-- <td class="p-4 border text-center"><a href=""><i class="fa-solid fa-edit text-yellow-600"></i></a></td> --}}
                            <td class="p-4 border text-center"><a href="{{route('customerdeletecontact',$contact->id)}}"><i class="fa-solid fa-trash text-red-600"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
              </table>
        </div>



    </div>

    <div id="modal1" class="w-full h-full fixed bg-black/20 hidden flex-col justify-center items-center">
        <div class="w-11/12 md:w-5/12 rounded-lg bg-white shadow-lg">
            <div class="px-4 mb-3 pl-10 pt-4 flex justify-between items-center">
                <h2 class="font-bold text-xl text-teal-700">Ajouter un contact</h2>
                <i id="close-me" class="fa-solid fa-close text-red-600 text-xl inline-block cursor-pointer"></i>
            </div>
            <form action="{{route('customeraddcontact')}}" class=" p-10 pt-5" method="POST">
                @csrf
                <div class="mb-2">
                    <label for="nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom</label>
                    <input type="text" name="nom" id="nom" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-teal-600 focus:border-teal-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Nom" required="">
                </div>
                <div class="mb-4">
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Télephone</label>
                    <input type="text" name="phone" id="phone" placeholder="Téléphone" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-teal-600 focus:border-teal-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                </div>
                <button type="submit" class="w-full text-white bg-teal-600 hover:bg-teal-700 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">Ajouter</button>
            </form>
        </div>
    </div>

        <div id="modal-send-msg" class="w-full h-full fixed bg-black/20 hidden flex-col justify-center items-center">
            <div class="w-11/12 md:w-5/12 rounded-lg bg-white shadow-lg">
                <div class="px-4 mb-3 pl-10 pt-4 flex justify-between items-center">
                    <h2 class="font-bold text-xl text-teal-700">Envoyer message</h2>
                    <i id="close-me" class="fa-solid fa-close text-red-600 text-xl inline-block cursor-pointer"></i>
                </div>
                <form action="{{route('customermessagesend')}}" class="p-10 pt-5" method="POST">
                    @csrf
                    <div class="mb-2">
                        <label for="expediteur" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom de l'expéditeur</label>
                        <input type="text" name="expediteur" id="expediteur" class="p-3 border-2 border-slate-900 w-full" placeholder="Nom de l'expéditeur" required>
                    </div>
                    <div class="mb-2">
                        <label for="destinataire" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Numero du destinataire</label>
                        <input type="tel" name="destinataire" id="destinataire" class="p-3 border-2 border-slate-900 w-full" placeholder="+Indicatif Numéro du destinataire" required>
                    </div>
                    <div class="mb-4">
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Message</label>
                        <textarea name="message" id="message" class="p-3 border-2 border-slate-900 w-full" placeholder="Votre Message" rows="5" required></textarea>
                    </div>
                    <div class="flex flex-col gap-y-2 w-full mt-2 @if($pro) hidden @endif">
                        <p class="font-semibold">Caractères restant: <span class="text-red-400" id="reste">100</span> - SMS Total: <span class="text-green-600" id="total">1</span></p>
                    </div>
                    <div class="flex flex-col items-end gap-y-2 w-full mt-2 mb-4">
                        <button type="submit" class="py-2 px-4 bg-teal-500 text-white font-bold rounded-md hover:bg-teal-500">Envoyer</button>
                    </div>
                </form>
            </div>
        </div>


    @if ($pro)
    <div id="select-sender" class="w-full h-full fixed bg-black/20 hidden flex-col justify-center items-center">
        <div class="w-11/12 md:w-3/12 rounded-lg bg-white shadow-lg block" id="contact-check">
            <div class="px-4 mb-3 pl-10 pt-4 flex justify-between items-center">
                <h2 class="font-bold text-xl text-teal-700">Sélectionner les contacts</h2>
                <i id="close-me" class="fa-solid fa-close text-red-600 text-xl inline-block cursor-pointer"></i>
            </div>
            <form action="#" class="p-10 pt-5" method="POST">
                @csrf
                @foreach ($contacts as $i=>$contact)
                    <div class="mb-2 flex items-center">
                        <input type="checkbox" name="destinataire" value="{{$contact->numero}}" id="expediteur" class="before:content[''] peer relative h-5 w-5 cursor-pointer appearance-none rounded-md border border-gray-500 transition-all before:absolute before:top-2/4 before:left-2/4 before:block before:h-12 before:w-12 before:-translate-y-2/4 before:-translate-x-2/4 before:rounded-full before:bg-blue-gray-500 before:opacity-0 before:transition-opacity checked:border-teal-400 checked:bg-teal-400 checked:before:bg-teal-400 hover:before:opacity-10 mr-3"  required="">
                        <label class="block text-lg font-medium text-gray-900 dark:text-white">{{$contact->nom}}</label>
                    </div>
                @endforeach
                <div class="flex flex-col mt-10 gap-y-2 w-full ">
                    <button type="button" id="contact-check-list" class="py-2 px-4 bg-teal-500 text-white font-bold rounded-md hover:bg-teal-500">Valider</button>
                </div>
            </form>
        </div>
        <div class="w-11/12 md:w-5/12 rounded-lg hidden bg-white shadow-lg" id="group-msg">
            <div class="px-4 mb-3 pl-10 pt-4 flex justify-between items-center">
                <h2 class="font-bold text-xl text-teal-700">Envoyer message</h2>
                <i id="close-me" class="fa-solid fa-close text-red-600 text-xl inline-block cursor-pointer"></i>
            </div>
            <form action="{{route('customermessagesend')}}" class="p-10 pt-5" method="POST">
                @csrf
                <div class="mb-2">
                    <label for="expediteur" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nom de l'expéditeur</label>
                    <input type="text" name="expediteur" id="expediteur" class="p-3 border-2 border-slate-900 w-full" placeholder="Nom de l'expéditeur" required>
                </div>
                <div class="mb-2">
                    <label for="destinataire" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Numero du destinataire</label>
                    <input type="text" name="destinataire" id="destinataire" class="p-3 border-2 border-slate-900 w-full" placeholder="+Indicatif Numéro du destinataire" required>
                </div>
                <div class="mb-4">
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Message</label>
                    <textarea name="message" id="message" class="p-3 border-2 border-slate-900 w-full" placeholder="Votre Message" rows="5" required></textarea>
                </div>
                <div class="flex flex-col gap-y-2 w-full mt-2 @if($pro) hidden @endif">
                    <p class="font-semibold">Caractères restant: <span class="text-red-400" id="reste">100</span> - SMS Total: <span class="text-green-600" id="total">1</span></p>
                </div>
                <div class="flex flex-col items-end gap-y-2 w-full mt-2 mb-4">
                    <button type="submit" class="py-2 px-4 bg-teal-500 text-white font-bold rounded-md hover:bg-teal-500">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
    @endif

    <div id="modalexcel" class="w-full h-full fixed bg-black/20 hidden flex-col justify-center items-center">
        <div class="w-11/12 md:w-3/12 rounded-lg bg-white shadow-lg">
            <div class="px-4 mb-3 pl-10 pt-5 flex justify-center items-center">
                <h2 class="font-bold text-xl text-teal-700">Choisir un fichier</h2>
            </div>
            <form action="{{route('customeraddcontactexcel')}}" enctype="multipart/form-data" class=" p-10 pt-5" method="POST">
                @csrf
                <div class="mb-2">
                    <input type="file" name="file-excel" id="file-excel" class="block w-full text-sm text-slate-500
                    file:mr-4 file:py-2 file:px-4 file:rounded-md
                    file:border-0 file:text-sm file:font-semibold
                    file:bg-teal-700 file:text-white
                    hover:file:bg-teal-500" aria-describedby="file_input_help" required="">
                    <p class="mt-1 pl-2 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">Fichier excel (XLS, XLSX)</p>
                </div>
                <button type="submit" class="w-full text-white bg-teal-600 mt-5 hover:bg-teal-700 focus:ring-4 focus:outline-none focus:ring-teal-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-teal-600 dark:hover:bg-teal-700 dark:focus:ring-teal-800">Envoyer</button>
                <button type="button" id="close-me" class="w-full text-white bg-slate-600 hover:bg-slate-700 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800 mt-2">Annuler</button>
            </form>
        </div>
    </div>

@endsection

@section('script')
    <script>

        const input = document.querySelector('#modal-send-msg form textarea');
        const charCount = document.querySelector('#modal-send-msg #reste');
        const total = document.querySelector('#modal-send-msg #total');
        var msg = 1;

        input.addEventListener('input', function () {

            const texteSaisi = input.value;
            const nombreCaracteres = texteSaisi.length;
            if(msg>1) {
                if(((msg*100) - nombreCaracteres)==0) {
                    msg += 1;
                    total.textContent = msg;
                    charCount.textContent = 100;
                } else {

                    if(Math.floor(nombreCaracteres/100) != msg-1) {
                        msg = Math.floor(nombreCaracteres/100)+1;
                        total.textContent = msg;

                        if(msg>1) charCount.textContent = (100 - nombreCaracteres%100);
                        else charCount.textContent = (100 - nombreCaracteres);

                    } else {
                        if(msg>1) charCount.textContent = (100 - nombreCaracteres%100);
                        else charCount.textContent = (100 - nombreCaracteres);
                    }
                }
            } else {
                if((100 - nombreCaracteres)==0) {
                    msg += 1;
                    total.textContent = msg;
                    charCount.textContent = 100;
                } else {
                    if(msg>1) charCount.textContent = (100 - nombreCaracteres%100);
                    else charCount.textContent = (100 - nombreCaracteres);
                }
            }


        })

    </script>

    <script>

        const input1 = document.querySelector('#group-msg form textarea');
        const charCount1 = document.querySelector('#group-msg #reste');
        const total1 = document.querySelector('#group-msg #total');
        var msg = 1;



        input1.addEventListener('input', function () {

            const texteSaisi = input1.value;
            const nombreCaracteres = texteSaisi.length;
            if(msg>1) {
                if(((msg*100) - nombreCaracteres)==0) {
                    msg += 1;
                    total1.textContent = msg;
                    charCount1.textContent = 100;
                } else {

                    if(Math.floor(nombreCaracteres/100) != msg-1) {
                        msg = Math.floor(nombreCaracteres/100)+1;
                        total1.textContent = msg;

                        if(msg>1) charCount1.textContent = (100 - nombreCaracteres%100);
                        else charCount1.textContent = (100 - nombreCaracteres);

                    } else {
                        if(msg>1) charCount1.textContent = (100 - nombreCaracteres%100);
                        else charCount1.textContent = (100 - nombreCaracteres);
                    }
                }
            } else {
                if((100 - nombreCaracteres)==0) {
                    msg += 1;
                    total1.textContent = msg;
                    charCount1.textContent = 100;
                } else {
                    if(msg>1) charCount1.textContent = (100 - nombreCaracteres%100);
                    else charCount1.textContent = (100 - nombreCaracteres);
                }
            }


        })

    </script>

    <script>
        const addContact = document.querySelector('#add-contact'),
            modal1 = document.querySelector('#modal1');

        addContact.addEventListener('click', (e) => {
            e.preventDefault()
            if(modal1.classList.contains('hidden')) {
                modal1.classList.remove('hidden')
                modal1.classList.add('flex')
            }
        })

        modal1.querySelector('#close-me').addEventListener('click', () => {
            if(modal1.classList.contains('flex')) {
                modal1.classList.remove('flex')
                modal1.classList.add('hidden')
            }
        })

        // File
        const addContactExcel = document.querySelector('#add-contact-excel'),
            modalExcel = document.querySelector('#modalexcel');

        addContactExcel.addEventListener('click', (e) => {
            e.preventDefault()
            if(!addContactExcel.classList.contains('cursor-not-allowed')) {
                if(modalExcel.classList.contains('hidden')) {
                    modalExcel.classList.remove('hidden')
                    modalExcel.classList.add('flex')
                }
            }
        })

        modalExcel.querySelector('#close-me').addEventListener('click', () => {
            if(modalExcel.classList.contains('flex')) {
                modalExcel.classList.remove('flex')
                modalExcel.classList.add('hidden')
            }
        })

        // Send message modal
        const sendMessage = document.querySelectorAll('.send-icon-button'),
            modalMsg = document.querySelector('#modal-send-msg');

        for (let i = 0; i < sendMessage.length; i++) {
            sendMessage[i].addEventListener('click', (e) => {
                e.preventDefault()
                const nume = e.target.parentElement.parentElement.previousElementSibling.textContent;
                modalMsg.querySelector("input[type='tel']").value = nume
                if(modalMsg.classList.contains('hidden')) {
                    modalMsg.classList.remove('hidden')
                    modalMsg.classList.add('flex')
                }
            })
        }

        modalMsg.querySelector('#close-me').addEventListener('click', () => {
            if(modalMsg.classList.contains('flex')) {
                modalMsg.classList.remove('flex')
                modalMsg.classList.add('hidden')
            }
        })

        const groupsendMessage = document.querySelector('#group-contact'),
            groupmodalMsg = document.querySelector('#select-sender'),
            buttonCheck = document.querySelector('#contact-check-list'),
            listCheckbox = document.querySelector('#contact-check'),
            groupmsgform = document.querySelector('#group-msg')
            contactcheckform = document.querySelector('#contact-check')

        var checklistsend = '';


        groupsendMessage.addEventListener('click', (e) => {
            e.preventDefault()
            if(groupmodalMsg.classList.contains('hidden')) {
                groupmodalMsg.classList.remove('hidden')
                groupmodalMsg.classList.add('flex')
            }
        })

        buttonCheck.addEventListener('click', (e) => {
            e.preventDefault()
            const temp_list = listCheckbox.querySelectorAll('input')

            for (let i = 0; i < temp_list.length; i++) {
                if(temp_list[i].checked) {
                    if(checklistsend=='') {
                        checklistsend+=temp_list[i].value;
                    } else {
                        checklistsend+=','+temp_list[i].value;
                    }
                }
            }

            if(groupmsgform.classList.contains('hidden')) {
                groupmsgform.classList.remove('hidden')
                groupmsgform.classList.add('block')

                contactcheckform.classList.remove('block')
                contactcheckform.classList.add('hidden')
            }

            const tmp_input = groupmsgform.querySelector('input[name="destinataire"]')
            tmp_input.value = checklistsend

            // console.log(checklistsend);

        })

        groupmodalMsg.querySelector('#close-me').addEventListener('click', () => {
            if(groupmodalMsg.classList.contains('flex')) {
                groupmodalMsg.classList.remove('flex')
                groupmodalMsg.classList.add('hidden')
            }
        })

        groupmsgform.querySelector('#close-me').addEventListener('click', () => {
            if(groupmodalMsg.classList.contains('flex')) {
                groupmodalMsg.classList.remove('flex')
                groupmodalMsg.classList.add('hidden')
            }
        })

    </script>
@endsection
