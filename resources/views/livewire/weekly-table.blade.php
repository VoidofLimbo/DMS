<x-bodyparts.master-table>

    <x-slot name="tableoptions">
        <div class="block px-6 rounded-lg shadow-lg bg-white mb-3">
            <div class="flex flex-row justify-center md:justify-between flex-wrap mb-3 p-2 gap-4">
                <div class="flex flex-col items-center">
                    <select wire:model="perpage" name="perpage" id="perpage" class="form-control my-2">
                        @for ($id = 5; $id <= 25; $id += 5)
                            <option value="{{ $id }}">
                                {{ $id }}{{ __(' Carehomes') }}
                            </option>
                        @endfor
                    </select>
                </div>

                <div class="flex flex-col items-center">
                    <select wire:model="month" name="months" id="filterMonths" class="form-control my-2">

                        @for ($id = 1; $id <= 12; $id++)
                            @php
                                $monthCounter->month = $id;
                            @endphp

                            <option value="{{ $id }}">
                                {{ $monthCounter->monthName }}
                            </option>
                        @endfor
                    </select>
                </div>

                @php
                    $monthCounter->month = $today->month;
                @endphp

                <div class="flex flex-col items-center">
                    <select wire:model="byWeek" name="weeks" id="filterWeeks" class="form-control my-2">

                        <option value=" {{ $currentWeek->startOfWeek() }}"> {{ __('Current Week') }} </option>

                        @php
                            $monthCounter->day = 1;
                        @endphp

                        @for ($id = 1; $id <= $monthCounter->daysInMonth; $id += 7)
                            <option value="{{ $monthCounter->startOfWeek() }} ">
                                {{ $monthCounter->startOfWeek()->isoFormat('Do MMM') }}
                            </option>
                            {{ $monthCounter->addDays(7) }}
                        @endfor

                    </select>
                </div>
                <div class="flex space-x-2">
                    <div class="my-2">
                        <a class="inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg  focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out mr-1.5"
                            data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                            aria-controls="offcanvasExample">
                            {{ __('Filters') }}
                        </a>

                        <div class="mx-auto offcanvas offcanvas-end fixed bottom-0 flex flex-col max-w-full bg-white invisible bg-clip-padding shadow-sm outline-none transition duration-300 ease-in-out text-gray-700 top-0 right-0 border-none w-1/4"
                            tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                            <div class="offcanvas-header flex items-center justify-between p-4">
                                <h5 class="offcanvas-title mb-0 leading-normal font-semibold"
                                    id="offcanvasExampleLabel">{{ __('Filters') }}</h5>
                                <button type="button"
                                    class="btn-close box-content w-4 h-4 p-2 -my-5 -mr-2 text-black border-none rounded-none opacity-50 focus:shadow-none focus:outline-none focus:opacity-100 hover:text-black hover:opacity-75 hover:no-underline"
                                    data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body flex-grow p-4 overflow-y-auto">
                                <div>
                                    Some text as placeholder. In real life you can have the elements you have chosen.
                                    Like, text, images, lists, etc.
                                </div>
                                <div class="dropdown relative mt-4">
                                    <button
                                        class="dropdown-toggle inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg active:text-white transition duration-150 ease-in-out flex items-center whitespace-nowrap dropdown-toggle"
                                        type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">
                                        Dropdown button
                                        <svg aria-hidden="true" focusable="false" data-prefix="fas"
                                            data-icon="caret-down" class="w-2 ml-2" role="img"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512">
                                            <path fill="currentColor"
                                                d="M31.3 192h257.3c17.8 0 26.7 21.5 14.1 34.1L174.1 354.8c-7.8 7.8-20.5 7.8-28.3 0L17.2 226.1C4.6 213.5 13.5 192 31.3 192z">
                                            </path>
                                        </svg>
                                    </button>
                                    <ul class="dropdown-menu min-w-max absolute hidden bg-white text-base z-50 float-left py-2 list-none text-left rounded-lg shadow-lg mt-1 hidden m-0 bg-clip-padding border-none"
                                        aria-labelledby="dropdownMenuButton">
                                        <li><a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100"
                                                href="#">Action</a></li>
                                        <li><a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100"
                                                href="#">Another action</a></li>
                                        <li><a class="dropdown-item text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-gray-700 hover:bg-gray-100"
                                                href="#">Something else here</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="flex flex-col items-center">
                    <label for="filterStatus"> {{ __('Status ') }} </label>
                    <select wire:model="byStatus" name="status" id="filterStatus" class="form-control">
                        <option value=""> {{ __('All') }} </option>
                        @foreach ($status as $id => $name)
                            <option value="{{ $id }}">
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="flex md:grow flex-col items-center">
                    <label for="searchFilter"> {{ __('Search ')}} </label>
                    <input type="text" wire:model.debounce.350ms="search" name="searchText" id="searchFilter" class="form-control w-full">
                </div>
                <div class="flex flex-col items-center">
                    <label for="filterOrder"> {{ __('Order By ')}} </label>
                    <select wire:model="orderBy" name="resultOrder" id="filterOrder" class="form-control">
                        <option value="id">{{ __('Carehome Id')}}</option>
                        <option value="name">{{ __('Carehome Name')}}</option>
                        <option value="status_id"> {{ __('Carehome Status')}}</option>
                    </select>
                </div>
                <div class="flex flex-col items-center">
                    <label for="filterSort"> {{ __('Sort By ')}} </label>
                    <select wire:model="sortBy" name="resultSort" id="filterSort" class="form-control">
                        <option value="asc">{{ __('Ascending')}}</option>
                        <option value="desc"> {{ __('Descending')}}</option>
                    </select>
                </div> --}}
            </div>
        </div>
    </x-slot>

    <x-slot name="tableheaders">
        <th scope="col" class="px-6 py-3">
            {{ __('Name') }}
        </th>
        <th scope="col" class="px-6 py-3">
            {{ __('Current Stage') }}
        </th>
        <th scope="col" class="px-6 py-3">
            {{ __('Delivery By') }}
        </th>
        <th scope="col" class="px-6 py-3">
            {{ __('Notes') }}
        </th>
        <th scope="col" class="px-6 py-3">

        </th>
    </x-slot>

    <x-slot name="tablecontents">
        @foreach ($carehomes as $carehome)
            <tr class="whitespace-nowrap text-sm text-gray-900">
                <td class="px-6 py-4">
                    {{ $carehome->name }}
                </td>

                <td class="px-6 py-4">
                    {{ $carehome->carehomestages->stage_name }}
                </td>

                <td class="px-6 py-4">
                    @php
                        $deliveryOn = new Carbon\Carbon($carehome->delivery_date);
                    @endphp
                    {{ $deliveryOn->isoformat('dddd Do MMM') }}
                </td>

                <td class="px-6 py-4 break-all truncate max-w-sm">
                    {{ $carehome->stageslogs->Notes }}
                </td>
                <td class="px-6 py-4">
                    <a href="{{ route('carehomes.show', $carehome->id) }}"
                        class="text-green-600 font-black hover:text-blue-900 mb-2 mr-2">{{ __('View') }}</a>
                    <a href="{{ route('carehomes.edit', $carehome->id) }}"
                        class="text-indigo-600 font-black hover:text-indigo-900 mb-2 mr-2">{{ __('Edit') }}</a>
                </td>
            </tr>
        @endforeach
    </x-slot>

    <x-slot name="paginate">
        <div class="mt-10 w-full {{ $carehomes->hasPages() ? 'bg-white' : 'bg-slate' }} px-5 py-2 rounded">
            {{ $carehomes->onEachSide(1)->links() }}
        </div>
    </x-slot>



</x-bodyparts.master-table>
