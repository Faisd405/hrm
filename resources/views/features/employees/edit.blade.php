<x-app-layout>
    <div class="py-6">
        <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
            <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8">
                <div>
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-4 px-4">
                        <section>
                            <header>
                                <h2 class="border-b-2 border-b-slate-600 pb-2 text-lg font-medium text-gray-900 ">
                                    Form Employee
                                </h2>
                            </header>

                            <div>
                                <form class="mt-6 space-y-6" action="{{ route('employees.update', ['employee' => $employee['id']]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <x-label for="name">Name</x-label>
                                            <x-input id="name" type="text" name="name" value="{{ $employee['name'] }}"
                                                class="mt-1 block w-full" required autoFocus placeholder="Name" />
                                            <x-input-error for="name" class="mt-2" />
                                        </div>
                                        <div>
                                            <x-label for="lastname">Last Name</x-label>
                                            <x-input id="lastname" type="text" name="lastname" value="{{ $employee['lastname'] }}"
                                                class="mt-1 block w-full" autoFocus placeholder="Last Name" />
                                            <x-input-error for="lastname" class="mt-2" />
                                        </div>
                                        <div>
                                            <x-label for="email">Email</x-label>
                                            <x-input id="email" type="email" name="email" value="{{ $employee['email'] }}"
                                                class="mt-1 block w-full" required autoFocus placeholder="Email" />
                                            <x-input-error for="email" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <x-label for="phone">Phone</x-label>
                                            <x-input id="phone" type="text" name="phone" value="{{ $employee['phone'] }}"
                                                class="mt-1 block w-full" required autoFocus placeholder="phone" />
                                            <x-input-error for="phone" class="mt-2" />
                                        </div>
                                        <div>
                                            <x-label for="address">Address</x-label>
                                            <x-input id="address" name="address" value="{{ $employee['address'] }}"
                                                class="mt-1 block w-full" required autoFocus placeholder="address" />
                                            <x-input-error for="address" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <x-label for="gender">Gender</x-label>
                                            <div class="flex gap-2">
                                                <div>
                                                    <input type="radio" id="man" name="gender" value="1" {{ $employee['gender'] == '1' ? 'checked' : '' }}>
                                                    <label for="man">Man</label><br>
                                                </div>
                                                <div>
                                                    <input type="radio" id="woman" name="gender" value="0" {{ $employee['gender'] == '0' ? 'checked' : '' }}>
                                                    <label for="woman">Woman</label><br>
                                                </div>
                                            </div>
                                            <x-input-error for="phone" class="mt-2" />
                                        </div>
                                    </div>

                                    <div class="flex items-center justify-end gap-4">
                                        <x-button>
                                            {{ __('Save') }}
                                        </x-button>
                                    </div>
                                </form>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
