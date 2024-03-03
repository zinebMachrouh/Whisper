<x-app-layout>
    <div class="bg-white rounded-lg shadow-xl pb-8">
        <div class="px-4 py-2 mx-2 flex flex-row justify-start">
            <a href="{{route('chatify')}}" class=" text-2xl font-medium rounded-full text-blue-400 hover:bg-gray-800 hover:text-blue-300 float-right">
                <svg class="m-2 h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                    <g>
                        <path d="M20 11H7.414l4.293-4.293c.39-.39.39-1.023 0-1.414s-1.023-.39-1.414 0l-6 6c-.39.39-.39 1.023 0 1.414l6 6c.195.195.45.293.707.293s.512-.098.707-.293c.39-.39.39-1.023 0-1.414L7.414 13H20c.553 0 1-.447 1-1s-.447-1-1-1z">
                        </path>
                    </g>
                </svg>
            </a>
        </div>

        <div x-data="{ openSettings: false }" class="absolute right-12 mt-4 rounded">
            <button @click="openSettings = !openSettings" class="border border-gray-400 p-2 rounded text-gray-300 hover:text-gray-300 bg-gray-100 bg-opacity-10 hover:bg-opacity-20" title="Settings">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                </svg>
            </button>
            <div x-show="openSettings" @click.away="openSettings = false" class="bg-white absolute right-0 w-40 py-2 mt-1 border border-gray-200 shadow-2xl" style="display: none;">
                <div class="py-2 border-b">
                    <p class="text-gray-400 text-xs px-6 uppercase mb-1">Settings</p>
                    <button class="w-full flex items-center px-6 py-1.5 space-x-2 hover:bg-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"></path>
                        </svg>
                        <span class="text-sm text-gray-700">Share Profile</span>
                    </button>
                    <button class="w-full flex items-center py-1.5 px-6 space-x-2 hover:bg-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"></path>
                        </svg>
                        <span class="text-sm text-gray-700">Block friend</span>
                    </button>
                    <button class="w-full flex items-center py-1.5 px-6 space-x-2 hover:bg-gray-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span class="text-sm text-gray-700">More Info</span>
                    </button>
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
            <img src="{{asset('' . $friend->image)}}" class="w-40 border-4 border-white rounded-full">
            <div class="flex items-center space-x-2 mt-2">
                <p class="text-2xl">{{$friend->name}}</p>
                <span class="bg-blue-500 rounded-full p-1" title="Verified">
                    <svg xmlns="http://www.w3.org/2000/svg" class="text-gray-100 h-2.5 w-2.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M5 13l4 4L19 7"></path>
                    </svg>
                </span>
            </div>
            <p class="text-gray-700">{{$friend->username}}</p>
            <p class="text-sm text-gray-500">{{$friend->identifiant_unique}}</p>
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
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="flex justify-between items-center">
                    <div class="flex flex-col">
                        <div class="flex mt-4 items-center">
                            <p id="ProfileURL" class="text-blue-600 mr-4 text-xs">{{$url}}</p>
                            <svg onclick="CopyProfileLink()" class="w-6 h-6 cursor-pointer text-gray-500 hover:text-blue-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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

                        <div class="mt-4">
                            <img src="data:image/png;base64,{{ base64_encode(QrCode::format('png')->size(200)->generate($url)) }}" alt="QR Code" class="mx-auto">
                        </div>
                    </div>

                    <div class="mt-6 ml-auto">
                        <button onclick="openQRScannerModal()" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 focus:outline-none focus:bg-blue-700">Scanner le code QR</button>
                    </div>
                </div>
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


    <div class="my-4 flex flex-col 2xl:flex-row space-y-4 2xl:space-y-0 2xl:space-x-4">
        <div class="flex-1 bg-white rounded-lg shadow-xl p-8">
            <h4 class="text-xl text-gray-900 font-bold">Personal Info</h4>
            <ul class="mt-2 text-gray-700">
                <li class="flex border-y py-2">
                    <span class="font-bold w-24">Full name:</span>
                    <span class="text-gray-700">{{$friend->name}}</span>
                </li>
                <li class="flex border-b py-2">
                    <span class="font-bold w-24">Birthday:</span>
                    <span class="text-gray-700">{{$friend->age}}</span>
                </li>
                <li class="flex border-b py-2">
                    <span class="font-bold w-24">Joined:</span>
                    <span class="text-gray-700">{{$friend->created_at}}</span>
                </li>
                <li class="flex border-b py-2">
                    <span class="font-bold w-24">Email:</span>
                    <span class="text-gray-700">{{$friend->email}}</span>
                </li>
            </ul>
        </div>
    </div>
    <div class="flex flex-col w-full 2xl:w-2/3">
        <div class="flex-1 bg-white rounded-lg shadow-xl p-8">
            <h4 class="text-xl text-gray-900 font-bold">About</h4>
            <p class="mt-2 text-gray-700">{{$friend->aboutMe}}</p>
        </div>
    </div>


</x-app-layout>
