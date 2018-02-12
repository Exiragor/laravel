@extends('index')

@section('lottery')
    <lottery inline-template>
        <div class="row">
            <div class="col-md-12 mb-5">
                <h1 class="text-center">@{{ name }}</h1>
            </div>
            <div v-for="item in items" class="col-md-6 col-sm-12">
                <div class="panel">

                </div>
            </div>
        </div>
    </lottery>
@endsection