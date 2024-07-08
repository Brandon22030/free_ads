@include('layout')

<div>

    <form class="mx-[5rem] my-[2rem]" action="" type="get">

        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                </svg>
            </div>
            <input type="search" name="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos..." />
            <input type="submit" class="absolute text-white end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2" name="button" value="Search">
        </div>

    </form>
</div>
<div>



    <section class="grid place-items-center">
        <div class="container grid grid-cols-1 gap-8 my-auto lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
            <div class="left-0 aboslute">
                <select name="category" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Category</option>
                    <option value="Shoes">Shoes</option>
                    <option value="Toes">Toes</option>
                </select>

                <select name="location" id="Location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected>Location</option>
                    <option value="Benin">Benin</option>
                    <option value="Nigeria">Nigeria</option>
                </select>
                <div>

                    <input type="checkbox" id="box1" name="check1" value="Dr. Hallie Rau Jr.">
                    <label for="box1"> New</label><br>
                    <input type="checkbox" id="box2" name="check2" value="Alisonton">
                    <label for="box2">Good</label><br>
                    <input type="checkbox" id="box3" name="check3" value="New Misael">
                    <label for="box3">Use</label>

                </div>
                <label for="min">min:</label>
                <form action="{{ route('creat') }}" method="post" enctype="multipart/form-data">

                    <input id="min" type="text" name=min>
                    <label for="max">max:</label>
                    <input id="max" type="text" name=max>
                </form>

            </div>

            @if(count($prod)>0)

            @foreach($prod as $valu)

            <div class="relative flex w-full max-w-xs flex-col overflow-hidden rounded-lg border border-gray-100 bg-white shadow-md">
                <a class="relative mx-3 mt-3 flex h-60 overflow-hidden rounded-xl" href="#">
                    <img class="object-cover" src="{{asset('storage/'.$valu->image)}}" alt="product image" />
                    <!-- <span class="absolute top-0 left-0 m-2 rounded-full bg-black px-2 text-center text-sm font-medium text-white">39% OFF</span> -->
                </a>
                <div class="mt-4 px-5 pb-5">
                    <div class="mt-2 mb-5 flex items-center justify-between">
                        <a href="#">
                            <h5 class="text-xl tracking-tight text-slate-900">{{ $valu->title }}</h5>
                        </a>
                        <span class="mr-2 ml-3 rounded bg-yellow-200 px-2.5 py-0.5 text-xl font-semibold">{{ $valu->category }}</span>

                    </div>
                    <div class="mt-2 mb-5 flex items-center justify-between">
                        <p>
                            <span class="text-3xl font-bold text-blue-700">${{ $valu->price }}</span>
                            <!-- <span class="text-sm text-slate-900 line-through">$699</span> -->
                        </p>
                        <div class="flex items-center">
                            <span class="mr-2 ml-3 rounded bg-yellow-200 px-2.5 py-0.5 text-xm font-semibold">{{ $valu->user->name }}</span>

                        </div>
                    </div>
                    <a href="{{ route('product_content') }}" class="flex items-center justify-center rounded-md bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-blue-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-2 h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                        DESCRIPTION</a>
                </div>
            </div>
            @endforeach

        </div>
    </section>



    @else
    <p>Aucun resultat</p>
    @endif