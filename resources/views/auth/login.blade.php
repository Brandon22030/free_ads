@vite('resources/css/app.css')

<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<div class="px-[2rem] text-white font-bold py-[1rem] mb-[2rem] shadow-lg bg-gray-800 flex items-center justify-between">
    <a class="navbar-brand" href="{{ url('/') }}">
        {{ config('app.name', 'GAMINIFY') }}

    </a>
    <h2 class="text-center text-[2rem]">Welcome Back !!!</h2>

    @guest
    <a class="text-end block py-2 px-3 md:p-0 text-white rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 " href="{{ route('register') }}">{{ __('Register') }}</a>
    @endguest
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <!-- <div>Something went wrong</div> -->
    <ul>
        @foreach ($errors->all() as $error)
        <div class="bg-red-500 text-white font-semibold tracking-wide flex items-center w-max max-w-sm p-4 rounded-md shadow-md shadow-red-200" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-[18px] shrink-0 fill-white inline mr-3" viewBox="0 0 32 32">
                <path d="M16 1a15 15 0 1 0 15 15A15 15 0 0 0 16 1zm6.36 20L21 22.36l-5-4.95-4.95 4.95L9.64 21l4.95-5-4.95-4.95 1.41-1.41L16 14.59l5-4.95 1.41 1.41-5 4.95z" data-original="#ea2d3f" />
            </svg>

            <li class=" block sm:inline text-sm mr-3">OMG!!! {{ $error }} Fix that!!!</li>
            <svg xmlns="http://www.w3.org/2000/svg" class="w-3 cursor-pointer shrink-0 fill-white ml-auto" viewBox="0 0 320.591 320.591">
                <path d="M30.391 318.583a30.37 30.37 0 0 1-21.56-7.288c-11.774-11.844-11.774-30.973 0-42.817L266.643 10.665c12.246-11.459 31.462-10.822 42.921 1.424 10.362 11.074 10.966 28.095 1.414 39.875L51.647 311.295a30.366 30.366 0 0 1-21.256 7.288z" data-original="#000000" />
                <path d="M287.9 318.583a30.37 30.37 0 0 1-21.257-8.806L8.83 51.963C-2.078 39.225-.595 20.055 12.143 9.146c11.369-9.736 28.136-9.736 39.504 0l259.331 257.813c12.243 11.462 12.876 30.679 1.414 42.922-.456.487-.927.958-1.414 1.414a30.368 30.368 0 0 1-23.078 7.288z" data-original="#000000" />
            </svg>
        </div>
        @endforeach
    </ul>
</div>
@endif


@if(session()->has('message'))
<div class="alert alert-success text-green-600">
    {{ session()->get('message') }}
</div>
@endif
<form action="{{ route('login') }}" method="POST" class="max-w-md mx-auto">
    @csrf
    <div class="relative z-0 w-full mb-5 group">
        <input type="email" name="email" id="email" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
        <label for="email" class="peer-focus:font-medium absolute text-md text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email address</label>
    </div>
    <!-- <div class="relative z-0 w-full mb-5 group">
        <input type="password" name="password" id="password" class="mb-2 block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
        <label for="password" class=" peer-focus:font-medium absolute text-md text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
    </div> -->

    <!-- component -->


    <div class="relative z-0 w-full mb-5 group flex justify-between items-center" x-data="{ show: true }" x-clock>
        <input :type="(show) ? 'password' : 'text'" name="password" placeholder="" class="mb-2 block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer text-lg text-gray-900 focus:outline-none" />
        <label for="password" class=" peer-focus:font-medium absolute text-md text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>

        <a class="block" @click="show = !show">
            <div x-show="show"><i class="fas fa-eye text-lg"></i></div>
            <div x-show="!show"><i class="fas fa-eye-slash text-lg"></i></div>
        </a>
    </div>

    <input type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md w-full md:w-full px-5 py-2.5 text-center" value="Login">
</form>