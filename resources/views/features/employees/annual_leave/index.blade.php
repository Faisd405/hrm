<x-app-layout>
    <div x-data="alpineData">
        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-4 px-2">
                    <h4 class="text-lg font-semibold text-gray-600 mb-4">
                        Annual Leave {{ $employee->name }}
                    </h4>
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 ">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50  ">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        No
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Start Date
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        End Date
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Total
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Reason
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($annualLeaves as $annualLeave)
                                    <tr class="bg-white border-b  ">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap ">
                                            {{ $loop->iteration }}
                                        </th>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $annualLeave->start_date }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $annualLeave->end_date }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $annualLeave->total_days }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $annualLeave->reason }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <button
                                                class="px-2 py-1 text-xs font-medium leading-5 text-white transition-colors duration-150 bg-blue-500 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue">
                                                Edit
                                            </button>
                                            <button data-modal-target="deleteModal" data-modal-toggle="deleteModal"
                                                @click="openModal({{ $annualLeave->id }})"
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
                            {{ $annualLeaves->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (isset($annualLeave))
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

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('alpineData', () => ({
                selectedId: null,
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
                    axios.delete(`/annual_leave/${this.selectedId}`)
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
