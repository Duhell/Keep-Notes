@extends('../index')
@section('title','Register')
@section('content')
    <div class="relative w-full h-[100vh] md:flex md:justify-center md:items-center md:flex-col">
        <img src="{{ asset('images/bg.jpg') }}" class="absolute -z-30 w-full h-full">
        <p class="mb-5 text-[1.5rem] font-medium text-[#ebebeb]">Keep Notes</p>
        <div class="bg-slate-200 p-5 rounded w-[300px] relative">
            <p class="text-center text-[1.3rem] font-semibold">Sign up</p>
            @if ($errors->any())
            <div class="bg-red-400 p-3 rounded font-normal text-[.8rem]">
                <ul>
                    @foreach ($errors->all() as $err )
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (Session::has('success'))
            <div class="bg-emerald-400	 text-center  p-3 rounded font-normal text-[.8rem]">
                {{ Session::get('success') }}
            </div>
            @endif
            <form action="{{ url('register') }}" method="post" class="mt-3">
                @csrf
                <div class="md:flex md:flex-col relative mb-2">
                    <input type="text" value="{{ old('nickname') }}" name="nickname" id="nickname" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none focus:outline-none focus:ring-1 focus:border-blue-600 peer" placeholder=" " />
                    <label for="nickname" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-3 z-10 origin-[0]  px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-4 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Nickname</label>
                </div>
                <div class="md:flex md:flex-col relative mb-2">
                    <input type="email" value="{{ old('email') }}" name="email" id="email" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none focus:outline-none focus:ring-1 focus:border-blue-600 peer" placeholder=" " />
                    <label for="email" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-3 z-10 origin-[0]  px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-4 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Email</label>
                </div>
                <div class="md:flex md:flex-col relative">
                    <div class="md:flex md:flex-col relative">
                        <input type="password" value="{{ old('password') }}" name="password" id="password" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none focus:outline-none focus:ring-1 focus:border-blue-600 peer" placeholder=" " />
                        <label for="password" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-3 z-10 origin-[0]  px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-4 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Password</label>
                    </div>
                </div>
                <div class="md:flex md:flex-col relative">
                    <div class="md:flex md:flex-col relative">
                        <input type="password" name="repassword" id="repassword" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none focus:outline-none focus:ring-1 focus:border-blue-600 peer" placeholder=" " />
                        <label for="repassword" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-3 z-10 origin-[0]  px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-4 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Confirm Password</label>
                    </div>
                </div>
                <div class="w-full h-full md:flex justify-center mt-4">
                    <button type="submit" class="text-white w-full bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Register</button>
                </div>
                <div>
                    <a href="{{ url('/') }}" class="inline-flex items-center font-medium text-blue-600 text-[.8rem] hover:underline">Login
                    <svg aria-hidden="true" class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
