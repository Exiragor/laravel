@extends('main.index')

@section('main.content')

<lottery inline-template>
    <div id="lottery" class="row">
        {{ csrf_field() }}
        <div class="col-md-6">

            <div class="panel text-center">

                <h3>{{ __('text.first_bet_name') }}</h3>

                <div class="btn-group" role="group_common" aria-label="{{ __('text.first_bet_name') }}">
                    <button v-for="type in common_types" type="button" class="btn btn-secondary"
                            @click="selectType(type)" :class="{ 'btn-selected': type.selected}">
                        @{{ type.name }}
                    </button>
                </div>

                <button class="btn ml-2" @click="clearType('common')">
                     {{ __('Отменить') }}
                </button>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel text-center">

                <h3>{{ __('text.second_bet_name') }}</h3>

                <div class="btn-group" role="group_letter" aria-label="{{ __('text.first_bet_name') }}">
                    <button v-for="type in letter_types" type="button" class="btn btn-secondary"
                            @click="selectType(type)" :class="{ 'btn-selected': type.selected}">
                        @{{ type.symbol }}
                    </button>
                </div>

                <button class="btn ml-2" @click="clearType('letter')">
                    {{ __('Отменить') }}
                </button>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel text-center">

                <h3>{{ __('text.third_bet_name') }}</h3>

                <div class="btn-group" role="group" aria-label="{{ __('text.first_bet_name') }}">
                    <button v-for="type in even_number_types" type="button" class="btn btn-secondary"
                            @click="selectType(type)" :class="{ 'btn-selected': type.selected}">
                        @{{ type.symbol }}
                    </button>
                </div>

                <button class="btn ml-2" @click="clearType('even_number')">
                    {{ __('Отменить') }}
                </button>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel text-center">

                <h3>{{ __('text.fourth_bet_name') }}</h3>

                <div class="btn-group" role="group" aria-label="{{ __('text.first_bet_name') }}">
                    <button v-for="type in odd_number_types" type="button" class="btn btn-secondary"
                            @click="selectType(type)" :class="{ 'btn-selected': type.selected}">
                        @{{ type.symbol }}
                    </button>
                </div>

                <button class="btn ml-2" @click="clearType('odd_number')">
                    {{ __('Отменить') }}
                </button>
            </div>
        </div>

        <div class="col-md-12 text-center">
            <button class="btn" @click="createBets()">
                {{ __('Сделать ставку') }}
            </button>
        </div>
        </div>
    </div>
</lottery>

@endsection