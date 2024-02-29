<x-app-layout>
    <div class="p-relative h-screen" style="background-color: #15202b;">
        <div class="flex justify-start">

        </h2>
    </x-slot>
<!--URL and QRcode:-->
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

                        <ul class="list-none">
                        <li>
            
                        </li>
                        </ul>
                    </section>


                    
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
<!-- Js Copy Profile and scann Qr code -->
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
//	function lecture d'une image Qr code :
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
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


