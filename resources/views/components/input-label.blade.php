@props(['value'])

<<<<<<< HEAD
<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700 dark:text-gray-300']) }}>
=======
<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
>>>>>>> 3d5a637899332cd546737a2e9ec1b9425f784baf
    {{ $value ?? $slot }}
</label>
