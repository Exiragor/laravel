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
                        @{{ getFormatName(type.name) }}
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


        <div class="modal fade" id="bet-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h3>{{ __('Ставки') }}</h3>
                        <div v-for="bet in user_bets">
                            <p>{{ __('Название') }}: @{{ getFormatName(bet.type.name) }}</p>
                            <p>{{ __('Символ') }}: @{{ (bet.type.symbol != 'null') ? bet.type.symbol : '-' }}</p>
                        </div>
                        <h3>{{ __('Общая сумма:') }} @{{ sum }} BTC</h3>
                        <h3>{{ __('Адрес перевода:') }} @{{ (payments_address) ? payments_address[0] : '' }}</h3>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
</lottery>
@endsection