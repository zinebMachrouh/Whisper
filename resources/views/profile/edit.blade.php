<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}

        </h2>
    </x-slot>


<!--link of invitation :-->
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-xl">
                <p>Cliquez sur le lien suivant pour accéder à votre profil :</p>
                <p><a href="{{ $url }}">Accéder à mon profil</a></p>

                <p>ou scannez le code QR ci-dessous :</p>
                <div class="flex flex-col items-center space-y-4">
                    @if($qrCode)
                        <img src="data:image/png;base64,{{ $qrCode }}" alt="Code QR" class="w-48 h-48">
                    @else
                        <p>Aucun code QR disponible pour le moment.</p>
                    @endif
                    <p>Code QR valable pour 1 heure</p>
                </div>
            </div>
        </div>
    </div>
</div>



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
