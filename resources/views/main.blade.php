@extends('index')

@section('main')
    <bets_options inline-template>
        <div class="row">
            <div v-for="type in types" class="col-md-12">
                <p>{{__('Название: ')}}@{{ type.name }}</p>
                <p>{{__('Значение: ')}}@{{ type.value }}</p>
            </div>
        </div>
    </bets_options>
@endsection