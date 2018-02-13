@extends('index')

@section('lottery')
    <lottery inline-template>
        <form name="bet_form" class="row" method="POST" action="/">
            <div class="col-md-12 mb-5">
                <h1 class="text-center">Выбор ставки</h1>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            {{ csrf_field() }}
            <div class="col-md-6 col-sm-12">
                <div class="panel text-center">
                    <h3>Letter, odd num or even num?</h3>
                    <button v-if="!select.show" @click="showField('select', $event)" class="button">Got It!</button>
                    <select v-if="select.show" v-model="select.value" name="select">
                        <option value="">-</option>
                        <option value="letter">letter</option>
                        <option value="odd_num">odd num</option>
                        <option value="even_num">even num</option>
                    </select>
                    <button class="button button--inline" v-if="select.show" @click="showField('select', $event)">Отмена</button>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="panel text-center">
                    <h3>Concrete letter</h3>
                    <button v-if="!letter.show" @click="showField('letter', $event)" class="button">Got It!</button>
                    <input v-model="letter.value" v-if="letter.show" type="text" name="letter">
                    <button class="button button--inline" v-if="letter.show" @click="showField('letter', $event)">Отмена</button>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="panel text-center">
                    <h3>Concrete even num</h3>
                    <button v-if="!even_num.show" @click="showField('even_num', $event)" class="button">Got It!</button>
                    <input v-model="even_num.value" v-if="even_num.show" type="text" name="even_num">
                    <button class="button button--inline" v-if="even_num.show" @click="showField('even_num', $event)">Отмена</button>
                </div>
            </div>
            <div class="col-md-6 col-sm-12">
                <div class="panel text-center">
                    <h3>Concrete odd num</h3>
                    <button v-if="!odd_num.show" @click="showField('odd_num', $event)" class="button">Got It!</button>
                    <input v-model="odd_num.value" v-if="odd_num.show" type="text" name="odd_num">
                    <button class="button button--inline" v-if="odd_num.show" @click="showField('odd_num', $event)">Отмена</button>
                </div>
            </div>
            <div class="col-md-12 text-right">
                <button class="button button--inline">Got it!</button>
            </div>
            <div class="col-md-12">
                <h2>Итог: @{{ sum }} Bitcoin</h2>
            </div>
        </form>
    </lottery>
@endsection