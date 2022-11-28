@props(['fields', 'class'])

<div class="grid grid-cols-{!! $class['col'] !!} sm:grid-cols-{!! $class['col'] !!} sm:gap-3">
    @foreach ($fields as $field)
        <div>
            <label 
                for="{!! $field['name-attribute'] !!}" 
                class="block mb-2 text-base font-bold text-gray-700 dark:text-gray-200">
                {{ __($field['name']) }}<span class="text-red-500"> {{ !empty($field['required']) ? '*' : ''}}</span>
            </label>
            <input
                type="{!! $field['type'] !!}" 
                id="{{ $field['name-attribute'] }}" 
                name="{{ $field['name-attribute'] }}" 
                class="
                    w-full p-2.5 text-sm 
                    text-gray-700 
                    dark:text-gray-200 
                    border border-gray-300/20 dark:border-gray-700 
                    rounded-xl 
                    focus:outline-none focus:ring focus:ring-gray-500/20 focus:border-gray-400/20 
                    placeholder:text-gray-500 dark:placeholder:text-gray-200 
                    backdrop-blur-sm bg-gray-300/20 dark:bg-gray-800/20 
                    transition ease-in-out 
                    {{($errors->has($field['name-attribute']) ? ' border-red-400/20 dark:border-red-400/60 placeholder-red-700 focus:ring-red-500 focus:border-red-500 text-red-500' : null)}}"
                value="{{ old($field['name-attribute']) }}"
                placeholder="{!! $field['placeholder'] !!}" 
                {{ $field['required'] }} 
                {{ $field['autofocus'] }}
            >

            @error($field['name-attribute'])
                <small class="text-red-500">{{$message}}</small>
            @enderror
        </div>
    @endforeach
</div>