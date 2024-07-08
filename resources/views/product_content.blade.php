@include('layout')

<div class="py-8">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('home') }}" class="mb-[2rem] w-[10rem] px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9.75 14.25 12m0 0 2.25 2.25M14.25 12l2.25-2.25M14.25 12 12 14.25m-2.58 4.92-6.374-6.375a1.125 1.125 0 0 1 0-1.59L9.42 4.83c.21-.211.497-.33.795-.33H19.5a2.25 2.25 0 0 1 2.25 2.25v10.5a2.25 2.25 0 0 1-2.25 2.25h-9.284c-.298 0-.585-.119-.795-.33Z" />
            </svg>
            <p class="pl-3 text-lg font-medium leading-none"> BACK
            </p>
        </a>
        <div class="flex flex-col md:flex-row -mx-4">
            <div class="md:flex-1 px-4">
                <div class="h-[460px] rounded-lg bg-gray-300 dark:bg-gray-700 mb-4">
                    <img class="w-full h-full object-cover" src="{{asset('storage/'.$post->image)}}" alt="Product Image">
                </div>
                <!-- <div class="flex -mx-2 mb-4">
                    <div class="w-1/2 px-2">
                        <button class="w-full bg-gray-900 dark:bg-gray-600 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800 dark:hover:bg-gray-700">Add to Cart</button>
                    </div>
                    <div class="w-1/2 px-2">
                        <button class="w-full bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-white py-2 px-4 rounded-full font-bold hover:bg-gray-300 dark:hover:bg-gray-600">Add to Wishlist</button>
                    </div>
                </div> -->
            </div>
            <div class="md:flex-1 px-4">
                <h2 class="text-2xl font-bold text-blue-500 dark:text-white mb-2">{{ $post->title }}</h2>
                <h2 class="text-xl font-bold text-black dark:text-white mb-2">By <span class=" text-lg font-semibold text-blue-600">{{ $post->user->name }}</span></h2>

                <p class="text-gray-600 dark:text-gray-300 text-sm mb-4">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sed
                    ante justo. Integer euismod libero id mauris malesuada tincidunt.
                </p>
                <div class="flex mb-4">
                    <div class="mr-4">
                        <span class="font-bold text-blue-500">Price:</span>
                        <span class="text-black">${{ $post->price }}</span>
                    </div>
                    <div class="mr-4">
                        <span class="font-bold text-blue-500">Location: </span>
                        <span class="text-black">{{ $post->location }}</span>
                    </div>
                    <div>
                        <span class="font-bold text-blue-500">Category: </span>
                        <span class="text-black">{{ $post->category }}</span>
                    </div>
                </div>
                <div class="mb-4">
                    <span class="font-bold text-blue-500">Product state:</span>
                    <div class="flex items-center mt-2">
                        <span class="text-black font-semibold">{{ $post->ad_state }}</span>
                    </div>
                </div>
                <div class="mb-4">
                    <span class="font-bold text-blue-500">Ad created at:</span>
                    <div class="flex items-center mt-2">
                        <p>{{ $post->created_at->format('d M Y') }}</p>
                    </div>
                </div>
                <div>
                    <span class="font-bold text-blue-500">Product Description:</span>
                    <p class="text-black text-sm mt-2">
                        {{ $post->description }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>