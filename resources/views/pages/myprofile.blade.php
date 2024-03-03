@extends('include.master')
@push('cssjsexternal')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
@endpush
@section('content')

    <section class="mt-32">
        <div class="items-center max-w-screen-md mx-auto ">
            <h3 class="text-5xl text-center font-hurricane">Gallery</h3>
        </div>
    </section>
    <section>
        @csrf
        <div>
        </div>
        <div class="flex flex-col items-center max-w-screen-md px-2 mx-auto mt-4">
            <div>
                <img src="" alt="" class="w-24 h-24 rounded-full" id="image">
            </div>
            <h3 class="text-xl font-semibold" id="nama">
            </h3>
            <div class="flex gap-3">
            <a href="/ubahprofile">
            <p class="px-3 py-1 bg-blue-500 rounded-md text-white">Edit Profil</p>
</a>
<a href="/album">
            <p class="px-3 py-1 bg-green-400 rounded-md text-white">Album</p>
</a>
        </div>
    </section>
    <section class="mt-10">
        <div class="max-w-screen-md mx-auto">
            <div class="flex flex-wrap items-center flex-container" id="dataprofile">
                
            </div>
        </div>
    </section>

@endsection
@push('footerjsexternal')
    <script src="/javascript/mypin.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
@endpush

