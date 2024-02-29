<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}

        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="flex justify-between items-center">
                    <div class="flex flex-col">
                        <div class="flex mt-4 items-center">
                            <p id="ProfileURL" class="text-blue-600 mr-4 text-xs">{{$url}}</p>
                            <svg onclick="CopyProfileLink()" class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z"/>
                                <path d="M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5" />
                                <path d="M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5" />
                                <line x1="16" y1="21" x2="16" y2="19" />
                                <line x1="19" y1="16" x2="21" y2="16" />
                                <line x1="3" y1="8" x2="5" y2="8" />
                                <line x1="8" y1="3" x2="8" y2="5" />
                            </svg>
                            <p id="CopiedMessage" class="hidden text-xs text-gray-400 p-1">Copied</p>
                        </div>
                    </div>
                    <div class="flex items-center">
                        {{ $qrCode }}
                    </div>
                </div>

                <button onclick="openQRScannerModal()" class="mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:bg-blue-700">Scanner le code QR</button>
            </div>
        </div>
    </div>

  <!-- Modal pour scanner le code QR -->
<div id="qrScannerModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fixed inset-0 transition-opacity" aria-hidden="true">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                        <!-- Icone du scanner QR -->
                        <svg class="text-red-500 w-7 h-7"
                            xmlns="http://www.w3.org/2000/svg" width="24"  height="24"  viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <rect x="4" y="4" width="6" height="6" rx="1" />  <line x1="7" y1="17" x2="7" y2="17.01" />  <rect x="14" y="4" width="6" height="6" rx="1" />  <line x1="7" y1="7" x2="7" y2="7.01" />  <rect x="4" y="14" width="6" height="6" rx="1" />  <line x1="17" y1="7" x2="17" y2="7.01" />  <line x1="14" y1="14" x2="17" y2="14" />  <line x1="20" y1="14" x2="20" y2="14.01" />  <line x1="14" y1="14" x2="14" y2="17" />  <line x1="14" y1="20" x2="17" y2="20" />  <line x1="17" y1="17" x2="20" y2="17" />  <line x1="20" y1="17" x2="20" y2="20" /></svg>
                    </div>
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                        <h3 class="text-lg font-medium text-gray-900" id="modal-title">
                            Scanner le code QR
                        </h3>
                        <input type="file" accept="image/*" id="fileInput" class="mt-2">
                        <!-- Ajout de l'input pour afficher le résultat du QR code -->
                        <input type="text" id="qrCodeURL" class="mt-2 w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-500">
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <!-- Bouton pour fermer le modal -->
                <button onclick="closeQRScannerModal()" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                    Fermer
                </button>
            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/jsqr/dist/jsQR.min.js"></script>
    <script>
        function CopyProfileLink() {
            var profileLink = document.getElementById("ProfileURL");
            navigator.clipboard.writeText(profileLink.innerText);
            var copiedMessage = document.getElementById("CopiedMessage");
            copiedMessage.classList.remove("hidden");
            setTimeout(function() {
                copiedMessage.classList.add("hidden");
            }, 3000);
        }
        function openQRScannerModal() {
        var modal = document.getElementById("qrScannerModal");
        modal.classList.remove("hidden");
    }
        const fileInput = document.getElementById('fileInput');
        const resultDiv = document.getElementById('result');
        const qrCodeURLInput = document.getElementById('qrCodeURL'); // Ajout de la référence à l'input QR code URL

        fileInput.addEventListener('change', handleFile);
        function handleFile(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(event) {
                const image = new Image();
                image.onload = function() {
                    const canvas = document.createElement('canvas');
                    const ctx = canvas.getContext('2d');
                    canvas.width = image.width;
                    canvas.height = image.height;
                    ctx.drawImage(image, 0, 0);
                    const imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
                    const code = jsQR(imageData.data, imageData.width, imageData.height);
                    if (code) {
                        qrCodeURLInput.value = code.data; // Mettre à jour la valeur de l'input avec le résultat du code QR
                        resultDiv.textContent = "Code QR détecté : " + code.data;
                    } else {
                        qrCodeURLInput.value = ""; // Effacer la valeur de l'input si aucun code QR n'est détecté
                        resultDiv.textContent = "Aucun code QR trouvé dans l'image.";
                    }
                };
                image.src = event.target.result;
            };

            reader.readAsDataURL(file);
        }
        function closeQRScannerModal() {
        var modal = document.getElementById("qrScannerModal");
        modal.classList.add("hidden");
    }
    </script>




    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
                <div class="py-2">
                    <p class="text-gray-400 text-xs px-6 uppercase mb-1">Feedback</p>
                    <button class="w-full flex items-center py-1.5 px-6 space-x-2 hover:bg-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                        </svg>
                        <span class="text-sm text-gray-700">Report</span>
                    </button>
                </div>
            </div>
        </div>
        <div class="w-full h-[250px]">
            <img src="https://vojislavd.com/ta-template-demo/assets/img/profile-background.jpg" class="w-full h-full rounded-tl-lg rounded-tr-lg">
        </div>
        <div class="flex flex-col items-center -mt-20">
            <img src="{{asset('' . $user->image)}}" class="w-40 border-4 border-white rounded-full">
            <div class="flex items-center space-x-2 mt-2">
                <p class="text-2xl">{{$user->name}}</p>
                <span class="bg-blue-500 rounded-full p-1" title="Verified">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-100 h-2.5 w-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"></path>
                    </svg>
                </span>
            </div>
            <p class="text-gray-700">{{$user->username}}</p>
            <p class="text-sm text-gray-500">{{$user->identifiant_unique}}</p>
        </div>
        <div class="flex-1 flex flex-col items-center lg:items-end justify-end px-8 mt-2">
            <div class="flex items-center space-x-4 mt-2">
                <button class="flex items-center bg-blue-600 hover:bg-blue-700 text-gray-100 px-4 py-2 rounded text-sm space-x-2 transition duration-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z"></path>
                    </svg>
                    <span>Connect</span>
                </button>
                <button class="flex items-center bg-blue-600 hover:bg-blue-700 text-gray-100 px-4 py-2 rounded text-sm space-x-2 transition duration-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
                    </svg>
                    <span>Message</span>
                </button>
            </div>
        </div>
    </div>
</x-app-layout>


