<x-dashboard-layout>
    {{-- dashboard header --}}
    <x-slot name="header">
        <h2 class="flex justify-between font-semibold text-xl leading-tight">
            <div>
                {{ __('Carehome List') }}
            </div>

            {{-- controls for user to manage their profiles --}}
            <x-useraccount.accountoptions />

        </h2>
    </x-slot>
    {{-- {{dd($carehomes)}} --}}
    {{-- content --}}
    <div>
        <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="block mb-8">
                <a href="{{ route('carehomes.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">{{ __('Add Carehome') }}</a>
            </div>
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 w-full">
                                <thead>
                                <tr>
                                    <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('ID') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Name') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Status') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Status updated at') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ ('Total Residents') }}
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Week') }}
                                    </th>
                                    <th scope="col" width="200" class="px-6 py-3 bg-gray-50">

                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($carehomes as $carehome)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $carehome->id }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $carehome->name }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{-- {{ $carehome->status_id }} --}}
                                            {{$carehome->carehomestages->stage_name}}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{$carehome->updated_at}}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $carehome->total_patients }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            {{ $carehome->week }}
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            <a href="{{ route('carehomes.show', $carehome->id) }}" class="text-blue-600 hover:text-blue-900 mb-2 mr-2">{{ __('View') }}</a>
                                            {{-- @if(Auth::user()->can('manipulate', App\Models\Carehome::where('id',$carehome->id)->get())) --}}
                                            <a href="{{ route('carehomes.edit', $carehome->id) }}" class="text-indigo-600 hover:text-indigo-900 mb-2 mr-2">{{ __('Edit') }}</a>
                                            <form class="inline-block" action="{{ route('carehomes.destroy', $carehome->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="text-red-600 hover:text-red-900 mb-2 mr-2" value="Delete">
                                            </form>
                                            {{-- @endcan --}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-10 w-full bg-white px-5 py-2 rounded">
                            {{ $carehomes->onEachSide(1)->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



</x-dashboard-layout>
