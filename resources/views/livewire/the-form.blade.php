<div>
    <form id="the-form" wire:submit.prevent="submit">
    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12 space-y-8">
            <h1 class="text-base font-semibold text-gray-900 py-8">The Form</h1>
            
            <div>
                <!-- output error bag -->
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @if($formStep == 1)
            <!--show form step one -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="firstName" class="block text-sm font-medium leading-6 text-gray-900">First name</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm sm:max-w-md">
                                <input type="text" name="firstName" id="firstName" wire:model="firstName" autocomplete="first name" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Foo">
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="lastName" class="block text-sm font-medium leading-6 text-gray-900">Last name</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm sm:max-w-md">
                                <input type="text" name="lastName" id="lastName" wire:model="lastName" autocomplete="last name" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Bar">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-3 gap-4 mt-4">
                    <div>
                        <label for="address" class="block text-sm font-medium leading-6 text-gray-900">Address</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm sm:max-w-md">
                                <input type="text" name="address" id="address" wire:model="address" autocomplete="Address" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="1234 Nevermore Ave.">
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="city" class="block text-sm font-medium leading-6 text-gray-900">City</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm sm:max-w-md">
                                <input type="text" name="city" id="city" wire:model="city" autocomplete="City" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6" placeholder="Smallville">
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <label for="country" class="block text-sm font-medium leading-6 text-gray-900">Country</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm sm:max-w-md">
                                <select name="country" id="country" wire:model="country" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                    <option value="Please select a country">Please select a country</option>
                                    @foreach($countries as $country)
                                        <option value="{{ $country }}">{{ $country }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4 mt-4">
                    <div>
                        <label for="yearOfBirth" class="block text-sm font-medium leading-6 text-gray-900">Year, Month and Day of Birth</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm sm:max-w-md">
                                <select name="yearOfBirth" id="yearOfBirth" wire:model.change="yearOfBirth" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                    @foreach($years as $year)
                                        <option value="{{ $year }}">{{ $year }}</option>
                                    @endforeach
                                </select>
                                @if(is_int($yearOfBirth))
                                    <select name="monthOfBirth" id="monthOfBirth" wire:model.change="monthOfBirth" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                        @foreach($months as $month)
                                            <option value="{{ $month }}">{{ $month }}</option>
                                        @endforeach
                                    </select> 
                                @endif
                                @if(is_int($monthOfBirth) && count($days) > 0)
                                    <select name="dayOfBirth" id="dayOfBirth" wire:model="dayOfBirth" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                        @foreach($days as $day)
                                            <option value="{{ $day }}">{{ $day }}</option>
                                        @endforeach
                                    </select>
                                @endif           
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <button wire:click="showPage2" type="button" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Next</button>
                </div>
            @endif
            @if($formStep == 2)
                <div class="grid grid-cols-1 gap-4">
                    <div>
                        <label for="married" class="block text-sm font-medium leading-6 text-gray-900">Married</label>
                        <div class="mt-2">
                            <div class="flex rounded-md shadow-sm sm:max-w-md">
                                <select name="married" id="married" wire:model.change="married" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                    <option value="Please select">Please select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                @if($married == 'Yes')
                    <div class="grid grid-cols-3 gap-4 mt-4">
                        <div>
                            <label class="block text-sm font-medium leading-6 text-gray-900">Year, Month and Day of Marriage</label>
                            <div class="mt-2">
                                <div class="flex rounded-md shadow-sm sm:max-w-md">
                                    
                                    <select name="yearOfMarriage" id="yearOfMarriage" wire:model.change="yearOfMarriage" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                        @foreach($years as $year)
                                            <option value="{{ $year }}">{{ $year }}</option>
                                        @endforeach
                                    </select>
                                    @if(is_int($yearOfMarriage))
                                        <select name="monthOfMarriage" id="monthOfMarriage" wire:model.change="monthOfMarriage" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                            @foreach($months as $month)
                                                <option value="{{ $month }}">{{ $month }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                    @if(is_int($monthOfMarriage))
                                        <select name="dayOfMarriage" id="dayOfMarriage" wire:model="dayOfMarriage" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                            @foreach($days as $day)
                                                <option value="{{ $day }}">{{ $day }}</option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-4 mt-4">
                        <div>
                            <label for="dateOfMarriage" class="block text-sm font-medium leading-6 text-gray-900">Country of Marriage</label>
                            <div class="mt-2">
                                <select name="countryOfMarriage" id="countryOfMarriage" wire:model="countryOfMarriage" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                    <option value="Please select a country">Please select a country</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country }}">{{ $country }}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                @endif
                @if($married == 'No')
                    <div class="grid grid-cols-3 gap-4 mt-4">
                        <div>
                            <label for="widowed" class="block text-sm font-medium leading-6 text-gray-900">Widowed</label>
                            <div class="mt-2">
                                <select name="widowed" id="widowed" wire:model="widowed" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                    <option value="Please select one">Please select one</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-3 gap-4 mt-4">
                        <div>
                            <label for="marriedInPast" class="block text-sm font-medium leading-6 text-gray-900">Married in the Past</label>
                            <div class="mt-2">
                                <select name="marriedInPast" id="marriedInPast" wire:model="marriedInPast" class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6">
                                    <option value="Please select one">Please select one</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                @endif
                <!--show form step two -->
                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                    <button wire:click="showPage1" type="button" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Back</button>
                    <button wire:click="showPageConfirm" type="button" class="rounded-md bg-white px-2.5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">Submit</button>
                </div>
            @endif
            @if($formStep == 3)
                <!--show form step three which is the confirmation screen-->
                <ul>
                    <li>
                        <span class="font-bold">First Name:</span><br/>
                        {{ $firstName }}
                    </li>
                    <li>
                        <span class="font-bold">Last Name:</span><br/>
                        {{ $lastName }}
                    </li>
                    <li>
                        <span class="font-bold">Address:</span><br/>
                        {{ $address }}
                    </li>
                    <li>
                        <span class="font-bold">City:</span><br/>
                        {{ $city }}
                    </li>
                    <li>
                        <span class="font-bold">Country:</span><br/>
                        {{ $country }}
                    </li>
                    <li>
                        <span class="font-bold">Date of Birth:</span><br/>
                        {{ $monthOfBirth }}/{{ $dayOfBirth }}/{{ $yearOfBirth }} (mm/dd/yyyy)
                    </li>
                    <li>
                        <span class="font-bold">Married:</span><br/>
                        {{ $married }}
                    </li>
                    @if($married == 'Yes')
                        <li>
                            <span class="font-bold">Date of Marriage:</span><br/>
                            {{ $monthOfMarriage }}/{{ $dayOfMarriage }}/{{ $yearOfMarriage }} (mm/dd/yyyy)
                        </li>
                        <li>
                            <span class="font-bold">Country of Marriage:</span><br/>
                            {{ $countryOfMarriage }}
                        </li>
                    @else
                        <li>
                            <span class="font-bold">Widowed:</span><br/>
                            {{ $widowed }}
                        </li>
                        <li>
                            <span class="font-bold">Married in the Past:</span><br/>
                            {{ $marriedInPast }}
                        </li>
                    @endif
                </ul>
            @endif
        </div>
    </div>
    </form>
</div>
