@extends('include.master')
@section('content')


    <section class="mt-32">
        <div class="items-center max-w-screen-md mx-auto ">
            <h3 class="text-5xl text-center font-hurricane">Gallery</h3>
        </div>
    </section>
    <section class="w-96 mx-auto ">
    <form action="/up_password" method="post">
        @csrf
            <div class="w-full">
                <div class="bg-white rounded-md shadow-md ">
                    <div class="flex flex-col px-8 py-4 ">
                        <h5 class="text-3xl text-center font-serif my-5">Perbaharui Password</h5>
                        <h5>Password Lama</h5>
                        <input type="password" name="current_password" class="py-1 rounded-md">
                        <h5>Password Baru</h5>
                        <input type="password" name="new_password" class="py-1 rounded-md">
                        <h5>Konfirmasi Password</h5>
                        <input type="password" name="new_password_confirmation" class="py-1 rounded-md">
                        <button type="submit" class="py-2 mt-4 text-white rounded-md bg-green-500">Perbaharui</button>
                    </div>
                </div>
            </div>
</form>
    </section>
    @endsection
