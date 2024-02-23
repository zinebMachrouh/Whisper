<x-app-layout>
    <form action="{{route('profile.update')}}" method="POST">
    @csrf
    @method('patch')
    <label for="">user name</label>
    <input type="text" value="{{$user->name}}" name="name">
    </form>
</x-app-layout>