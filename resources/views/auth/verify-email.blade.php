@vite('resources/css/app.css')

<div class="max-w-lg mx-auto mt-[5rem] md:md-0 col-span-12 sm:col-span-6 lg:col-span-4 border p-4 rounded-lg shadow-lg">

    <p class="font-display text-2xl font-bold leading-tight mb-[1rem]">
        Please verify your email through the email we've sent you.
    </p>

    <div class="items-center mb-3">

            
    @if (Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('message') }}
                </div>
            @endif

        <p class="font-mono text-lg font-normal opacity-75 text-black mb-[1rem]">Didn't get the email?</p>
        <form class="inline-flex items-center px-3 py-1 rounded-full text-lg font-bold leading-5 text-white font-display mr-2 capitalize bg-blue-500" action="{{ route('verification.send') }}" method="POST">

            @csrf

            <button>Send again</button>

        </form>
    </div>




</div>