<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}

        </h2>
    </x-slot>

<!-- Invitation link : QR Code -->
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="flex justify-between items-center">
                <div class="flex flex-col">
                    <div class="flex mt-4 items-center">
                        <p id="ProfileURL" class="text-blue-600 mr-4 text-xs">{{$url}}</p>
                        {{-- <svg onclick="CopyProfileLink()" class="cursor-pointer" width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M6 11C6 8.17157 6 6.75736 6.87868 5.87868C7.75736 5 9.17157 5 12 5H15C17.8284 5 19.2426 5 20.1213 5.87868C21 6.75736 21 8.17157 21 11V16C21 18.8284 21 20.2426 20.1213 21.1213C19.2426 22 17.8284 22 15 22H12C9.17157 22 7.75736 22 6.87868 21.1213C6 20.2426 6 18.8284 6 16V11Z" stroke="#1C274C" stroke-width="1.5" />
                            <path opacity="0.5" d="M6 19C4.34315 19 3 17.6569 3 16V10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H15C16.6569 2 18 3.34315 18 5" stroke="#1C274C" stroke-width="1.5" />
                        </svg> --}}
                        <svg  onclick="CopyProfileLink()" class="w-6 h-6"
                        xmlns="http://www.w3.org/2000/svg" width="24"  height="24"   viewBox="0 0 24 24"  stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M10 14a3.5 3.5 0 0 0 5 0l4 -4a3.5 3.5 0 0 0 -5 -5l-.5 .5" />  <path d="M14 10a3.5 3.5 0 0 0 -5 0l-4 4a3.5 3.5 0 0 0 5 5l.5 -.5" />  <line x1="16" y1="21" x2="16" y2="19" />  <line x1="19" y1="16" x2="21" y2="16" />  <line x1="3" y1="8" x2="5" y2="8" />  <line x1="8" y1="3" x2="8" y2="5" /></svg>
                        <p id="CopiedMessage" class="hidden text-xs text-gray-400 p-1"> Copied </p>
                    </div>
                </div>
                <div class="flex items-center">
                    {{ $qrCode}}
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function CopyProfileLink() {
        var profileLink = document.getElementById("ProfileURL");
        navigator.clipboard.writeText(profileLink.innerText);
        var copiedMessage = document.getElementById("CopiedMessage");
        copiedMessage.classList.remove("hidden");
        setTimeout(function() {
            copiedMessage.classList.add("hidden");
        }, 3000); // Le message "Copied !!" disparaîtra après 3 secondes (3000 ms)
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

<script>
    function copyLink() {
        var profileLink = document.getElementById("profileLink");
        profileLink.select();
        document.execCommand("copy");
        alert("Le lien a été copié !");
    }
</script>
