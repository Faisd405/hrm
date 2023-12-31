<x-app-layout>
    <div class="py-6">
        <div class="mx-auto max-w-7xl space-y-6 sm:px-6 lg:px-8">
            <div class="bg-white p-4 shadow sm:rounded-lg sm:p-8">
                <div>
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg py-4 px-4">
                        <section>
                            <header>
                                <h2 class="border-b-2 border-b-slate-600 pb-2 text-lg font-medium text-gray-900 ">
                                    Form User
                                </h2>
                            </header>

                            <div>
                                <form class="mt-6 space-y-6" action="{{ route('users.store') }}" method="POST">
                                    @csrf
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <x-label for="name">Name</x-label>
                                            <x-input id="name" type="text" name="name"
                                                class="mt-1 block w-full" required autoFocus placeholder="Name" />
                                            <x-input-error for="name" class="mt-2" />
                                        </div>
                                        <div>
                                            <x-label for="lastname">Last Name</x-label>
                                            <x-input id="lastname" type="text" name="lastname"
                                                class="mt-1 block w-full" autoFocus placeholder="Last Name" />
                                            <x-input-error for="lastname" class="mt-2" />
                                        </div>
                                        <div>
                                            <x-label for="email">Email</x-label>
                                            <x-input id="email" type="email" name="email"
                                                class="mt-1 block w-full" required autoFocus placeholder="Email" />
                                            <x-input-error for="email" class="mt-2" />
                                        </div>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <x-label for="password">Password</x-label>
                                            <x-input id="password" type="password" name="password"
                                                class="mt-1 block w-full" autoFocus placeholder="Password" />
                                            <x-input-error for="password" class="mt-2" />
                                        </div>
                                        <div>
                                            <x-label for="password_confirmation">
                                                Password Confirmation
                                            </x-label>
                                            <x-input id="password_confirmation" type="password"
                                                name="password_confirmation" class="mt-1 block w-full" autoFocus
                                                placeholder="Password Confirmation" />
                                            <x-input-error for="password_confirmation" class="mt-2" />
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
