@extends('../index')
@section('title', $user->nickname)
@section('content')
    <div class="w-full relative h-screen bg-cyan-600" id="bg-blur">
        <nav class="md:flex md:justify-between items-center bg-slate-200 w-full py-3 px-8">
            <div class="flex">
                <svg fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"></path>
                  </svg>
                <span class="font-medium">Keep Notes</span>
            </div>
            <div class="flex">
                <a href="{{ url('add') }}"class="text-white flex gap-1 bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 mr-2 mb-2  focus:outline-none "><svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"></path></svg>Add Note</a>
                <a href="{{ url('logout') }}"class="text-white flex gap-1 bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2 mr-2 mb-2  focus:outline-none ">Logout<svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"></path></svg></a>
            </div>
        </nav>
        <div class="w-full px-8 py-4">
            <p class="text-white font-medium text-[1.3rem]">Hi, {{ $user->nickname }}</p>
            <p class="text-white font-normal text-[.9rem]">You have {{ $totalNotes }} note/s</p>
        </div>
        @if (Session::has('success'))
            <div id="message" class="bg-emerald-400	 text-center  p-3 rounded font-semibold text-[1rem]">
                {{ Session::get('success') }}
            </div>
        @endif
        @if (!$totalNotes)
            <p class="text-center text-slate-300 font-medium text-[1.2rem]">No notes to be shown</p>
        @endif
        <div class="p-6 flex relative flex-wrap gap-3">
            @foreach ($datas as $data)
                <div class="pt-6 min-w-[210px] max-w-[350px] h-[220px] relative break-words px-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div class="relative h-[140px] w-full  overflow-y-auto   ">
                        <p class="mb-2 text-[1.2rem] font-normal tracking-tight text-white ">{{ @$data->title }}</p>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ @$data->notes }}</p>
                    </div>

                    <div class="md:flex w-full mt-5  h-[20px] relative z-10 justify-between gap-x-5 items-center mb-3">
                        <p class="absolute bottom-0 font-normal text-[.8rem] text-gray-700 dark:text-gray-400">
                            {{ $data->updated_at->format('M j, Y') }}</p>
                        <div class="absolute bottom-0 right-0">
                            <a href="{{ route('editNote', ['noteid' => $data->id]) }}" class="font-normal text-[.8rem] text-gray-700 dark:text-gray-400 hover:dark:text-gray-200">Edit</a>
                            <span class="text-gray-500">|</span>
                            <button data-id="{{ $data->id }}" class="font-normal text-[.8rem] text-gray-700 dark:text-gray-400 hover:dark:text-gray-200" onclick="openModal(this.getAttribute('data-id'))">Delete</button>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="fixed  z-10 inset-0 overflow-y-auto  hidden" id="modal">
                <div class="flex backdrop-filter backdrop-blur-sm items-center justify-center min-h-screen px-4 ">
                  <div class="bg-[#1a1b1b] rounded-lg p-5 mx-auto">
                    <div class="mb-6">
                      <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                      <h2 class="text-lg text-white font-medium">Are you sure you want to delete this note?</h2>
                    </div>
                    <div class="flex justify-end">
                      <button class="text-white bg-emerald-600 hover:bg-emerald-800 focus:ring-4 focus:outline-none focus:emerald-red-300 dark:focus:ring-emerald-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2" onclick="closeModal()">Cancel</button>
                      <a id="deleteLink"  class="text-white gap-2 bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2"><svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m6 4.125l2.25 2.25m0 0l2.25 2.25M12 13.875l2.25-2.25M12 13.875l-2.25 2.25M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"></path>
                      </svg>Delete</a>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>

@endsection
