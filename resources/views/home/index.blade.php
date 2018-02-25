@extends('main.index')

@section('main.content')

<lottery inline-template>
    <div id="lottery" class="row">
        <div class="col-md-6 col-sm-12">

            <div class="panel text-center">

                <h3>{{ __('text.first_bet_name') }}</h3>

                <div class="btn-group" role="group" aria-label="{{ __('text.first_bet_name') }}">
                    <button v-for="type in letter_number_types" type="button" class="btn btn-secondary">@{{ (type.symbol) ? type.symbol : type.value }}</button>
                </div>

            </div>

            <div class="panel text-center">

                <h3>{{ __('text.second_bet_name') }}</h3>

                <div class="btn-group" role="group" aria-label="{{ __('text.first_bet_name') }}">
                    <button v-for="type in any_letter_types" type="button" class="btn btn-secondary">@{{ (type.symbol) ? type.symbol : type.value }}</button>
                </div>

            </div>

            <div class="panel text-center">

                <h3>{{ __('text.third_bet_name') }}</h3>

                <div class="btn-group" role="group" aria-label="{{ __('text.first_bet_name') }}">
                    <button v-for="type in even_number_types" type="button" class="btn btn-secondary">@{{ (type.symbol) ? type.symbol : type.value }}</button>
                </div>

            </div>

            <div class="panel text-center">

                <h3>{{ __('text.fourth_bet_name') }}</h3>

                <div class="btn-group" role="group" aria-label="{{ __('text.first_bet_name') }}">
                    <button v-for="type in odd_number_types" type="button" class="btn btn-secondary">@{{ (type.symbol) ? type.symbol : type.value }}</button>
                </div>

            </div>
        </div>
    </div>
</lottery>

@endsection