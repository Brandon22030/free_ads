@vite('resources/css/app.css')

@auth

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>



<body>
    <!-- 
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <p>Dashboard</p>
        </div>
    </nav> -->
    @if(session()->has('message'))
    <div class="alert alert-success text-green-600">
        {{ session()->get('message') }}
    </div>
    @endif
    <main>

        <!-- component -->
        <div class="right-0 mt-2 mx-6">
            <div class="bg-white rounded overflow-hidden shadow-lg">
                <div class="text-center p-6 bg-gray-800 border-b">
                    <svg aria-hidden="true" role="img" class="h-24 w-24 text-white rounded-full mx-auto" width="32" height="32" preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 256">
                        <path fill="currentColor" d="M172 120a44 44 0 1 1-44-44a44 44 0 0 1 44 44Zm60 8A104 104 0 1 1 128 24a104.2 104.2 0 0 1 104 104Zm-16 0a88 88 0 1 0-153.8 58.4a81.3 81.3 0 0 1 24.5-23a59.7 59.7 0 0 0 82.6 0a81.3 81.3 0 0 1 24.5 23A87.6 87.6 0 0 0 216 128Z"></path>
                    </svg>
                    <p class="pt-2 text-lg font-semibold text-gray-50">{{ $user->name }}</p>
                    <p class="text-sm text-gray-100">{{ $user->email }}</p>

                </div>

                <div class="border-b">

                    <!-- EDIT LINK -->
                    <a class="px-4 py-2 hover:bg-green-100 flex items-center cursor-pointer" href="{{ route('auth.edit_user', $user->id) }}">
                        <div class="text-green-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>

                        </div>
                        <div class="pl-3">
                            <p class="text-md font-medium text-gray-800 leading-none">
                                Edit my profile
                            </p>
                        </div>
                    </a>

                    <!-- DELETE LINK -->
                    <a class="px-4 py-2 hover:bg-red-100 flex items-center cursor-pointer" id="open">
                        <div class="text-red-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>

                        </div>
                        <div class="pl-3">
                            <p class="text-md font-medium text-gray-800 leading-none">Delete my profile</p>
                        </div>
                    </a>
                    <div id="overlay" class="hidden w-screen h-screen animated fadeIn faster  fixed  left-0 top-0 flex justify-center items-center inset-0 z-50 outline-none focus:outline-none bg-no-repeat bg-center bg-cover" id="modal-id">
                        <div class="absolute bg-black opacity-80 inset-0 z-0"></div>
                        <div id="dialog" class="w-full hidden max-w-lg p-5 relative mx-auto my-auto rounded-xl shadow-lg  bg-white ">
                            <!--content-->
                            <div class="">
                                <!--body-->
                                <div class="text-center p-5 flex-auto justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 -m-1 flex items-center text-red-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 flex items-center text-red-500 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    <h2 class="text-xl font-bold py-4 ">Are you sure?</h3>
                                        <p class="text-sm text-gray-500 px-8">Do you really want to delete your account?
                                            This process cannot be undone</p>
                                </div>
                                <!--footer-->
                                <div class="p-3  mt-2 text-center space-x-4 md:block">
                                    <button id="close" class="mb-2 md:mb-0 bg-white px-5 py-2 text-sm shadow-sm font-medium tracking-wider border text-gray-600 rounded-full hover:shadow-lg hover:bg-gray-100">
                                        Cancel
                                    </button>
                                    <button class="mb-2 md:mb-0 bg-red-500 border border-red-500 px-5 py-2 text-sm shadow-sm font-medium tracking-wider text-white rounded-full hover:shadow-lg hover:bg-red-600"><a href="{{ route('auth.delete_user', $user->id) }}"">Delete</a></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Javascript code -->
                    <script>
                        var openButton = document.getElementById('open');
                        var dialog = document.getElementById('dialog');
                        var closeButton = document.getElementById('close');
                        var overlay = document.getElementById('overlay');

                        // show the overlay and the dialog
                        openButton.addEventListener('click', function() {
                            dialog.classList.remove('hidden');
                            overlay.classList.remove('hidden');
                        });

                        // hide the overlay and the dialog
                        closeButton.addEventListener('click', function() {
                            dialog.classList.add('hidden');
                            overlay.classList.add('hidden');
                        });
                    </script>

                    <!-- BACK LINK -->
                    <a href="{{ route('home') }}" class="w-full px-4 py-2 pb-4 hover:bg-gray-100 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9.75 14.25 12m0 0 2.25 2.25M14.25 12l2.25-2.25M14.25 12 12 14.25m-2.58 4.92-6.374-6.375a1.125 1.125 0 0 1 0-1.59L9.42 4.83c.21-.211.497-.33.795-.33H19.5a2.25 2.25 0 0 1 2.25 2.25v10.5a2.25 2.25 0 0 1-2.25 2.25h-9.284c-.298 0-.585-.119-.795-.33Z" />
                        </svg>

                        <p class="pl-3 text-sm font-medium text-gray-800 leading-none"> BACK
                        </p>
                    </a>

                </div>

            </div>
        </div>



</body>

</html>
@else

<script>
    window.location = '/'
</script>

@endauth