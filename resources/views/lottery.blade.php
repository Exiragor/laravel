@extends('index')

@section('lottery')
    <lottery inline-template>
        <form name="bet_form" class="row" method="POST" action="/">
            <div class="col-md-12 mb-5">
                <h1 class="text-center">{{ __('text.block_title') }}</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (isset($success) && $success)
                    <div class="alert alert-success">
                        <h4>{{ __('text.success_bet') }}</h4>
                    </div>
                @endif
            </div>
            {{ csrf_field() }}
            <div class="col-md-6 col-sm-12">
                <div class="panel text-center">
                    <h3>{{ __('text.first_bet_name') }}</h3>
                    <button v-if="!select.show" @click="showField('select', $event)" class="button">{{ __('text.place_a_bet') }}</button>
                    <select v-if="select.show" v-model="select.value" name="select">
                        <option value="">-</option>
                        <option value="letter">{{ __('text.letter') }}</option>
                        <option value="odd_num">{{ __('text.odd_num') }}</option>
                        <option value="even_num">{{ __('text.even_num') }}</option>
                    </select>
                    <button class="button button--inline" v-if="select.show" @click="showField('select', $event)">{{ __('text.cancel_a_bet') }}</button>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="panel text-center">
                    <h3>{{ __('text.second_bet_name') }}</h3>
                    <button v-if="!letter.show" @click="showField('letter', $event)" class="button">{{ __('text.place_a_bet') }}</button>
                    <select v-if="letter.show" v-model="letter.value" name="letter">
                        <option value="">-</option>
                        <option value="a">a</option>
                        <option value="b">b</option>
                        <option value="c">c</option>
                        <option value="d">d</option>
                        <option value="e">e</option>
                        <option value="f">f</option>
                    </select>
                    <button class="button button--inline" v-if="letter.show" @click="showField('letter', $event)">{{ __('text.cancel_a_bet') }}</button>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="panel text-center">
                    <h3>{{ __('text.third_bet_name') }}</h3>
                    <button v-if="!even_num.show" @click="showField('even_num', $event)" class="button">{{ __('text.place_a_bet') }}</button>
                    <select v-if="even_num.show" v-model="even_num.value" name="even_num">
                        <option value="">-</option>
                        <option value="0">0</option>
                        <option value="2">2</option>
                        <option value="4">4</option>
                        <option value="6">6</option>
                        <option value="8">8</option>
                    </select>
                    <button class="button button--inline" v-if="even_num.show" @click="showField('even_num', $event)">{{ __('text.cancel_a_bet') }}</button>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="panel text-center">
                    <h3>{{ __('text.fourth_bet_name') }}</h3>
                    <button v-if="!odd_num.show" @click="showField('odd_num', $event)" class="button">{{ __('text.place_a_bet') }}</button>
                    <select v-if="odd_num.show" v-model="odd_num.value" name="odd_num">
                        <option value="">-</option>
                        <option value="1">1</option>
                        <option value="3">3</option>
                        <option value="5">5</option>
                        <option value="7">7</option>
                        <option value="9">9</option>
                    </select>
                    <button class="button button--inline" v-if="odd_num.show" @click="showField('odd_num', $event)">{{ __('text.cancel_a_bet') }}</button>
                </div>
            </div>
            <div class="col-md-12">
                <h2>{{ __('text.sum') }} @{{ sum }} {{ __('text.currency') }}</h2>
            </div>
            <div class="col-md-12 text-right">
                <button class="button button--inline">{{ __('text.all_ready') }}</button>
            </div>
        </form>
    </lottery>

    <div class="row">
        <div class="col-md-12">
            <h1>{{ __('text.bets_history') }}</h1>
        </div>
        <history_table :items="{{ $bets }}"
                       :letter="'{{ __('Конкретная буква') }}'"
                       :even_num="'{{ __('Конкретное четное число') }}'"
                       :odd_num="'{{ __('Конкретное нечетное число') }}'"
                       :select="'{{ __('Выбор') }}'"
                        inline-template>
            <table>
                <thead>
                <th>{{ __('Номер') }}</th>
                <th>{{ __('Тип ставки') }}</th>
                <th>{{ __('Ставка') }}</th>
                </thead>
                <tr v-for="bet in bets" :class="{ winner: bet.winner}">
                    <td>@{{ bet.id }}</td>
                    <td>@{{ names[bet.bet_type] }}</td>
                    <td>@{{bet.value}}</td>
                </tr>
            </table>
        </history_table>
        </table>
    </div>
@endsection