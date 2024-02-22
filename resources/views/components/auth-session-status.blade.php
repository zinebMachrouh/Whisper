@props(['status'])

@if ($status)
<<<<<<< HEAD
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600 dark:text-green-400']) }}>
=======
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-green-600']) }}>
>>>>>>> 3d5a637899332cd546737a2e9ec1b9425f784baf
        {{ $status }}
    </div>
@endif
