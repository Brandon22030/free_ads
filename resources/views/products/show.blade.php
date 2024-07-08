@vite('resources/css/app.css')

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">

  <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

  <!-- Style -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">

  <title>GESTION DES POSTS</title>
</head>

<body>




  <div class="content">
    <h2 class="text-center font-bold text-[2rem] py-[1rem] mb-[2rem] text-white bg-gray-800 shadow-lg">Modify Ad</h2>

    @if ($errors->any())
    <div class="alert alert-danger">
      <!-- <div>Something went wrong</div> -->
      <ul>
        @foreach ($errors->all() as $error)
        <li class=" text-red-600">OMG!!! {{ $error }} Fix that!!!</li>
        @endforeach
      </ul>
    </div>
    @endif

    <a href="{{ route('home_product') }}" class="mb-[2rem] w-[10rem] ml-[2rem] px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none flex items-center">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9.75 14.25 12m0 0 2.25 2.25M14.25 12l2.25-2.25M14.25 12 12 14.25m-2.58 4.92-6.374-6.375a1.125 1.125 0 0 1 0-1.59L9.42 4.83c.21-.211.497-.33.795-.33H19.5a2.25 2.25 0 0 1 2.25 2.25v10.5a2.25 2.25 0 0 1-2.25 2.25h-9.284c-.298 0-.585-.119-.795-.33Z" />
      </svg>
      <p class="pl-3 text-lg font-medium leading-none"> BACK
      </p>
    </a>
    <div class=" container">
      <form action="{{ route('update', $post->id ) }}" method="POST" class="max-w-md mx-auto" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="relative z-0 w-full mb-5 group">
          <label class="block text-gray-700 font-bold mb-2" for="title">
            Title
          </label>
          <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 border-gay-600" id="title" name="title" value="{{ $post->title }}">
        </div>

        <div class="relative z-0 w-full mb-5 group">
          <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
          <div class="flex flex-col flex-grow mb-3 mx-8 max-w-md">
            <div x-data="{ files: null }" id="FileUpload" class="block w-full py-2 px-3 relative bg-white appearance-none border-2 border-gray-300 border-solid rounded-md hover:shadow-outline-gray">
              <input type="file" value="{{ asset('storage/'.$post->image)}}" name="image" multiple class="cursor-pointer absolute inset-0 z-50 m-0 p-0 w-full h-full outline-none opacity-0" x-on:change="files = $event.target.files; console.log($event.target.files);" x-on:dragover="$el.classList.add('active')" x-on:dragleave="$el.classList.remove('active')" x-on:drop="$el.classList.remove('active')">
              <template x-if="files !== null">
                <div class="flex flex-col space-y-1">
                  <template x-for="(_,index) in Array.from({ length: files.length })">
                    <div class="flex flex-row items-center space-x-2">
                      <template x-if="files[index].type.includes('audio/')"><i class="far fa-file-audio fa-fw"></i></template>
                      <template x-if="files[index].type.includes('application/')"><i class="far fa-file-alt fa-fw"></i></template>
                      <template x-if="files[index].type.includes('image/')"><i class="far fa-file-image fa-fw"></i></template>
                      <template x-if="files[index].type.includes('video/')"><i class="far fa-file-video fa-fw"></i></template>
                      <span class="font-medium text-gray-900" x-text="files[index].name">Uploading</span>
                      <span class="text-xs self-end text-gray-500" x-text="filesize(files[index].size)">...</span>
                    </div>
                  </template>
                </div>
              </template>
              <template x-if="files === null">
                <div class="flex flex-col space-y-2 items-center justify-center cursor-pointer">
                  <i class="fas fa-cloud-upload-alt fa-3x text-currentColor"></i>
                  <p class="text-gray-700">Drag your files here or click in this area.</p>
                  <a href="javascript:void(0)" class="flex items-center mx-auto py-2 px-4 text-white text-center font-medium border border-transparent rounded-md outline-none bg-blue-700 hover:bg-blue-800">Select
                    a file</a>
                </div>
              </template>
            </div>
          </div>
        </div>

        <div class="relative z-0 w-full mb-5 group">
          <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
          <select name="category" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>{{ $post->category }}</option>
            <option value="Shoes">Shoes</option>
            <option value="Toes">Toes</option>
            <option value="Game Console">Game Console</option>
          </select>
        </div>

        <div class="relative z-0 w-full mb-5 group">
          <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
          <textarea rows="10" name="description" id="description" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">{{ $post->description }}</textarea>
        </div>
        <div class="relative z-0 w-full mb-5 group">
          <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Enter a Price:</label>
          <input type="number" name="price" value="{{ $post->price }}" id="price" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />

        </div>
        <div class="relative z-0 w-full mb-5 group">
          <label for="Location" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
          <select name="location" id="Location" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>{{ $post->location }}</option>
            <option value="Benin">Benin</option>
            <option value="Nigeria">Nigeria</option>
          </select>
        </div>
        <div class="relative z-0 w-full mb-5 group">
          <label for="state" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">State of product</label>
          <select name="ad_state" id="state" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>{{ $post->ad_state }}</option>
            <option value="New">New</option>
            <option value="Good">Good</option>
            <option value="Used">Used</option>
          </select>
        </div>
        <button type="submit" class="mt-[1rem] text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-md w-full md:w-full px-5 py-2.5 text-center">Submit</button>
      </form>

    </div>

  </div>

</body>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
<script src="https://cdn.filesizejs.com/filesize.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" rel="stylesheet" />


</html>