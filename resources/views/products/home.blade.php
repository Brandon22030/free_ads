
<!doctype html>

<html lang="en">
@vite('resources/css/app.css')

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Style -->
  <link rel="stylesheet" href="css/style.css">

  <title>GESTION DES POSTS</title>
</head>

<body>
  <h2 class="text-center font-bold text-[2rem] py-[1rem] mb-[2rem] w-screen text-white bg-gray-800 shadow-lg">Ads Managing</h2>



  <div class="content">

    <div class="container">
      <div class="flex items-center justify-between">
        <a href="{{ route('home') }}" class="ml-[2rem] px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9.75 14.25 12m0 0 2.25 2.25M14.25 12l2.25-2.25M14.25 12 12 14.25m-2.58 4.92-6.374-6.375a1.125 1.125 0 0 1 0-1.59L9.42 4.83c.21-.211.497-.33.795-.33H19.5a2.25 2.25 0 0 1 2.25 2.25v10.5a2.25 2.25 0 0 1-2.25 2.25h-9.284c-.298 0-.585-.119-.795-.33Z" />
          </svg>
          <p class="pl-3 text-lg font-medium leading-none"> BACK
          </p>
        </a>
        <a href="{{route ('create-form-post') }}"><button class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none" >NEW ADS</button></a>

      </div>


      <!-- component -->
      <div class="mt-[2rem] -my-2 py-2  mx-auto sm:px-6 lg:-mx-8  lg:px-8">

        <div class="ml-6 min-w-full  shadow bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
          <table class="min-w-full">
            <thead class="items-center">
              <tr>
                <th class="px-6 py-3 text-center border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">TITLE</th>
                <th class="px-6 py-3 text-center border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">IMAGE</th>
                <th class="px-6 py-3 text-center border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">CATEGORY</th>
                <th class="px-6 py-3 text-center border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">DESCRIPTION</th>
                <th class="px-6 py-3 text-center border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">PRICE</th>
                <th class="px-6 py-3 text-center border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">LOCATION</th>
                <th class="px-6 py-3 text-center border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">STATE</th>
                <th class="px-6 py-3 text-center border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">ACTION</th>
                <th class="px-6 py-3 text-center border-b-2 border-gray-300"></th>
              </tr>
            </thead>
            <tbody class="bg-white items-center">
              @foreach ($posts as $post )

              <tr class="items-center">
                <td class="text-center px-6 py-3 whitespace-no-wrap border-b border-gray-500">
                  <div class="flex items-center">
                    <div>
                      <div class="text-md text-blue-900" <a href="{{route ('show', $post->id) }}">{{ $post->title }}</a></div>
                    </div>
                  </div>
                </td>
                <td class=" px-6 py-3 whitespace-no-wrap border-b border-gray-500">
                  <img  src={{asset('storage/'.$post->image)}} alt="image">
                </td>
                <td class="text-center px-6 py-3 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-md">{{ $post->category }}</td>
                <td class="text-center px-6 py-3 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-md">{{ ($post->description) }}</td>
                <td class="text-center px-6 py-3 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-md">
                  <span class="relative inline-block px-3 py-1 text-blue-900 leading-tight">
                    <span aria-hidden class=" inset-0 opacity-50 rounded-full"></span>
                    <span class="relative text-md">{{ $post->price }}</span>
                  </span>
                </td>
                <td class="text-center px-6 py-3 whitespace-no-wrap border-b border-gray-500 text-blue-900 text-md">{{ $post->location }}</td>
                <td class="text-center px-6 py-3 whitespace-no-wrap border-b border-gray-500 text-blue-900 text-md">{{ $post->ad_state }}</td>
                <td class="flex px-6 my-[2rem] text-md ">
                  <a href="{{ route('show', $post->id) }}" class="mr-6 px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">EDIT</a>
                  <a href="{{ route('delete-post', $post->id) }}" class="px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none">DELETE</a>
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
      </div>


    </div>

  </div>




</body>

</html>