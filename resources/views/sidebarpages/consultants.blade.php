<x-app-layout>
    <div class="bg-black flex items-center justify-center min-h-screen">
        <div class="grid grid-cols-1 gap-4 p-4 w-full max-w-screen-lg">
            <div class="bg-[#1A1C24] p-6 flex justify-center">
                <h2 class="text-white font-bold text-xl text-center">List of Consultants</h2>
            </div>

            <div class="flex justify-center mb-4">
                <form method="GET" action="{{ route('consultants.index') }}" class="flex">
                    <input type="text" name="query" value="{{ $query ?? '' }}" placeholder="Search Consultants:"
                        class="px-2 py-1 border rounded-l-md focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:border-transparent">
                    <button type="submit"
                        class="px-2 py-1 bg-[#0086F4] text-white rounded-r-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-yellow-500" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 15l4.85 4.85M10 18a8 8 0 100-16 8 8 0 000 16z" />
                        </svg>
                    </button>
                </form>
            </div>

            <div class="flex justify-end mb-4">
                <button type="button" onclick="document.getElementById('addModal').classList.remove('hidden')"
                    class="px-2 py-1 bg-[#0086F4] text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-600 focus:ring-offset-2">
                    Add Consultant
                </button>
            </div>

            <!-- Modal for adding a new consultant -->
            <div id="addModal"
                class="fixed z-10 inset-0 overflow-y-auto hidden bg-gray-500 bg-opacity-75 transition-opacity">
                <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                    </div>

                    <!-- This element is to trick the browser into centering the modal contents. -->
                    <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                    <!-- Modal panel -->
                    <div
                        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div
                                    class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-indigo-100 sm:mx-0 sm:h-10 sm:w-10">
                                    <!-- Heroicon name: outline/exclamation -->
                                    <svg class="h-6 w-6 text-indigo-600" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.1-1.928 1.2-2.755l-7.177-12.568a1.2 1.2 0 00-2.045 0L4.84 14.245c-.9.827-.34 2.755 1.2 2.755z" />
                                    </svg>
                                </div>
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                        Add New Consultant
                                    </h3>
                                    <div class="mt-2">
                                        <form id="addConsultantForm" method="POST"
                                            action="{{ route('consultants.store') }}">
                                            @csrf
                                            <div class="mb-4">
                                                <label for="name"
                                                    class="block text-sm font-medium text-gray-700">Name</label>
                                                <input type="text" name="name" id="name" autocomplete="name"
                                                    class="mt-1 p-2 border focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="mb-4">
                                                <label for="company"
                                                    class="block text-sm font-medium text-gray-700">Company</label>
                                                <input type="text" name="company" id="company"
                                                    autocomplete="company"
                                                    class="mt-1 p-2 border focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                            <div class="mb-4">
                                                <label for="role"
                                                    class="block text-sm font-medium text-gray-700">Role</label>
                                                <input type="text" name="role" id="role" autocomplete="role"
                                                    class="mt-1 p-2 border focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button type="button"
                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm"
                                onclick="document.getElementById('addConsultantForm').submit();">
                                Add
                            </button>
                            <button type="button"
                                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                                onclick="document.getElementById('addModal').classList.add('hidden')">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>

</x-app-layout>
