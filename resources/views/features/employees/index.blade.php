<x-app-layout>
    <div x-data="alpineData">
        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-4 px-2">
                    <div class="flex justify-between mb-4">
                        <div></div>
                        <button
                            class="px-4 py-2 font-bold leading-5 text-white transition-colors duration-150 bg-blue-500 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue">
                            <a href="{{ route('employees.create') }}">Create Employee</a>
                        </button>
                    </div>

                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 ">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Phone
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr class="bg-white border-b  ">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                            {{ $loop->iteration }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $employee->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $employee->email }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $employee->phone }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <button
                                                class="px-2 py-1 text-xs font-medium leading-5 text-white transition-colors duration-150 bg-blue-500 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue">
                                                <a href="{{ route('employees.edit', $employee->id) }}">Edit</a>
                                            </button>
                                            <button
                                                class="px-2 py-1 text-xs font-medium leading-5 text-white transition-colors duration-150 bg-blue-500 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue">
                                                <a href={{ '/employees/' . $employee->id . '/annual_leave' }}>
                                                    History Annual Leave
                                                </a>
                                            </button>
                                            <button data-modal-target="FormAnnualLeave"
                                                data-modal-toggle="FormAnnualLeave"
                                                @click="openModal({{ $employee->id }})"
                                                class="px-2 py-1 text-xs font-medium leading-5 text-white transition-colors duration-150 bg-yellow-500 border border-transparent rounded-lg active:bg-yellow-600 hover:bg-yellow-600 focus:outline-none focus:shadow-outline-yellow"
                                                type="button">
                                                Annual Leave
                                            </button>
                                            <button data-modal-target="deleteModal" data-modal-toggle="deleteModal"
                                                @click="openModal({{ $employee->id }})"
                                                class="px-2 py-1 text-xs font-medium leading-5 text-white transition-colors duration-150 bg-red-500 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-600 focus:outline-none focus:shadow-outline-red"
                                                type="button">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="my-4">
                            {{ $employees->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div id="FormAnnualLeave" tabindex="-1" aria-hidden="true"
                class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-2xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Form Annual Leave
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="deleteModal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <div class="p-6 space-y-6">
                            <div class="w-full">
                                <x-label for="reason">Start Date</x-label>
                                <div class="relative max-w-sm">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>
                                    <input type="date" x-model="annualLeaveData.start_date"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                                        placeholder="Select date">
                                </div>
                            </div>
                            <div class="w-full">
                                <x-label for="reason">End Date</x-label>
                                <div class="relative max-w-sm">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                        </svg>
                                    </div>
                                    <input type="date" x-model="annualLeaveData.end_date"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5"
                                        placeholder="Select date">
                                </div>
                            </div>
                            <div class="w-full">
                                <x-label for="reason">Reason</x-label>
                                <textarea id="reason" type="text"
                                    x-model="annualLeaveData.reason"class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"
                                    required autoFocus placeholder="Reason"></textarea>
                                <x-input-error for="reason" class="mt-2" />
                            </div>
                            <div class="flex items-center justify-end gap-4">
                                <x-button @click="storeAnnualLeave()">
                                    {{ __('Save') }}
                                </x-button>
                            </div>
                        </div>
                        <!-- Modal footer -->
                        <div
                            class="flex items-center justify-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                            <button data-modal-hide="deleteModal" type="button"
                                class="px-4 py-2 text-md font-medium leading-5 text-white transition-colors duration-150 bg-gray-500 border border-transparent rounded-lg active:bg-gray-600 hover:bg-gray-600 focus:outline-none focus:shadow-outline-gray">
                                Cancel
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            @if (isset($employee))
                <div id="deleteModal" tabindex="-1" aria-hidden="true"
                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-2xl max-h-full">
                        <!-- Modal content -->
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <!-- Modal header -->
                            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Delete account
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-hide="deleteModal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <!-- Modal body -->
                            <div class="p-6 space-y-6">
                                Delete your account? All of your data will be permanently removed. This action cannot be
                                undone.
                            </div>
                            <!-- Modal footer -->
                            <div
                                class="flex items-center justify-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                <button type="submit" @click="deleteData()"
                                    class="px-4 py-2 text-md font-medium leading-5 text-white transition-colors duration-150 bg-red-500 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-600 focus:outline-none focus:shadow-outline-red">
                                    Delete
                                </button>

                                <button data-modal-hide="deleteModal" type="button"
                                    class="px-4 py-2 text-md font-medium leading-5 text-white transition-colors duration-150 bg-gray-500 border border-transparent rounded-lg active:bg-gray-600 hover:bg-gray-600 focus:outline-none focus:shadow-outline-gray">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('alpineData', () => ({
                selectedId: null,
                annualLeaveData: {
                    start_date: '',
                    end_date: '',
                    reason: ''
                },

                openModal(id) {
                    this.selectedId = id
                    console.log(this.selectedId)
                },
                closeModal() {
                    this.selectedId = null
                },
                deleteData() {
                    console.log(this.selectedId)
                    // delete with api
                    axios.delete(`/employees/${this.selectedId}`)
                        .then(() => {
                            this.closeModal()
                            window.location.reload()
                        })
                        .catch((error) => {
                            console.log(error)
                        })
                },
                storeAnnualLeave() {
                    console.log(this.selectedId)
                    console.log(this.annualLeaveData)
                    axios.post(`/employees/` + this.selectedId + `/annual_leave`, this.annualLeaveData)
                        .then(() => {
                            this.closeModal()
                            window.location.reload()
                        })
                        .catch((error) => {
                            console.log(error)
                        })
                }
            }))
        })
    </script>
</x-app-layout>
