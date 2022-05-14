<x-dashboard-layout>

    {{-- dashboard header --}}
    <x-slot name="header">
        <h2 class="flex justify-between font-semibold text-xl leading-tight">
            <div>
                {{ __('Add New Carehome') }}
            </div>

            {{-- controls for user to manage their profiles --}}
            <x-useraccount.accountoptions />

        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('carehomes.store') }}">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="name" class="block font-medium text-sm text-gray-700">{{ __('Name') }}</label>
                            <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('name', '') }}" />
                            @error('name')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="residents" class="block font-medium text-sm text-gray-700">{{ __('Total Residents') }}</label>
                            <input type="number" name="residents" id="residents" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('residents', '') }}" />
                            @error('residents')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="stages" class="block font-medium text-sm text-gray-700">{{ __('Current stage') }}</label>
                            <select name="stages[]" id="stages" class="block rounded-md shadow-sm mt-1 block w-full" >
                                @foreach($stages as $id => $s)
                                    <option value="{{ $id }}"{{ in_array($id, old('stages', [])) ? ' selected' : '' }}>{{ $s }}</option>
                                @endforeach
                            </select>
                            @error('stages')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="week" class="block font-medium text-sm text-gray-700">{{ __('Week') }}</label>
                            <select name="week[]" id="week" class="block rounded-md shadow-sm mt-1 block w-full">
                                @for($id = 1;  $id <= 4; $id++)
                                    <option value="{{ $id }}"{{ in_array($id, old('week', [])) ? ' selected' : '' }}>{{ __('Week ')}} {{ $id }}</option>
                                @endfor
                            </select>
                            @error('week')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between px-4 py-3 bg-gray-50 text-right sm:px-6">
                            <button class="inline-flex items-center px-4 py-2 bg-green-500 border border-transparent rounded-md font-semibold text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                {{ __('Create') }}
                            </button>
                            <div class="inline-flex items-center">
                                <a href="{{ route('carehomes.index') }}" class="bg-red-500 hover:bg-red-900 text-white font-bold py-2 px-4 rounded">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-dashboard-layout>
