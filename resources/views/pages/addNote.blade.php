@extends('../index')
@section('title','Add Note')
@section('content')
    <div class="relative w-full h-[100vh] md:flex md:justify-center md:items-center md:flex-col bg-cyan-600">
        <p class="mb-5 text-[1.5rem] font-medium text-[#ebebeb]">Add Note</p>
        <div class="bg-slate-200 p-5 rounded w-[700px] relative">
            @if ($errors->any())
            <div class="bg-red-400 p-3 rounded font-normal text-[.8rem]">
                <ul>
                    @foreach ($errors->all() as $err )
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ url('add') }}" method="post" class="mt-3">
                @csrf
                <div class="md:flex md:flex-col relative mb-2">
                    <input type="text" value="{{ old('title') }}" name="title" id="title" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none focus:outline-none focus:ring-1 focus:border-blue-600 peer" placeholder=" " />
                    <label for="title" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-3 z-10 origin-[0]  px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-4 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Title</label>
                </div>
                <div class="md:flex md:flex-col relative mb-2">
                    <textarea type="text" value="{{ old('note') }}" name="note" id="note" class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 appearance-none focus:outline-none focus:ring-1 focus:border-blue-600 peer" placeholder=" "></textarea>
                    <label for="note" class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-3 z-10 origin-[0]  px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-4 peer-focus:scale-75 peer-focus:-translate-y-4 left-1">Note</label>
                </div>

                <div class="w-full h-full md:flex justify-center mt-4">
                    <button type="submit" class="text-white w-full bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Add Note</button>
                </div>
                <div class="pr-2 mt-3">
                    <a href="{{ url('/notes') }}" class="float-right inline-flex items-center font-medium text-blue-600 text-[.8rem] hover:underline">Back
                    <svg aria-hidden="true" class="w-5 h-5 ml-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection
