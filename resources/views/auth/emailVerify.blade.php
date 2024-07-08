    @vite('resources/css/app.css')

<main class="login-form">
    <div class="card-header text-center font-bold text-[2rem] py-[1rem] mb-[2rem] border-2 shadow-sm">Reset Password</div>
        <div class="card-body">
    
            @if (Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('message') }}
                </div>
            @endif

            <form action="{{ route('forget.password.post') }}" method="POST" class="max-w-md mx-auto">
                @csrf
                <div class="relative z-0 w-full mb-5 group">
                    <input type="email" name="email" id="email" class="block py-2.5 px-0 w-full text-md text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" "/>
                    <label for="email" class="peer-focus:font-medium absolute text-md text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email address</label>
                    @if ($errors->has('email'))
                        <span class="text-danger text-red-600">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md w-full md:w-full px-5 py-2.5 text-center">Send Password Reset Link</button>
            </form>
    </div>
</main>