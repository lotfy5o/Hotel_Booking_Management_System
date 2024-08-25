@php
$modelName = Spatie\Permission\Models\Role::class;
@endphp

<x-filteration :modelName="$modelName">

    <div class="row">

        <div class="col-md-8">
            <label class="label-filter">{{ __('keywords.word') }}</label>
            <input type="text" name="word" class="form-control"
                placeholder="{{ __('keywords.please_enter') }} {{ __('keywords.word') }}"
                value="{{ request()->input('word') }}">
        </div>

        <div class="col-md-4">
            <label class="form-label-filteration">{{ __('keywords.date') }}</label>
            <div class="input-group" id="datepicker6" data-date-format="yyyy-mm-dd" data-date-autoclose="true"
                data-provide="datepicker" data-date-container='#datepicker6'>
                <input type="date" class="form-control" name="start" placeholder="{{ __('keywords.date_from') }}"
                    value="{{ request()->input('start') }}" />
                <input type="date" class="form-control" name="end" placeholder="{{ __('keywords.date_to') }}"
                    value="{{ request()->input('end') }}" />
            </div>
        </div>

    </div>

</x-filteration>
