@extends('layouts.app')

@section('content')
<div id="app" class="container">
    <ul class="list-group">
        <li class="list-group-item" v-for="step in steps">
            @{{ step.name }}
            <i class="fa fa-check pull-right" @click="complete(step)"></i>
        </li>
    </ul>

    <form @submit.prevent='addStep' class="form-inline">
        <input type="text" v-model="newStep" class="form-control">
        <button type="submit" class="btn btn-primary">添加步骤</button>
    </form>

    @{{ $data | json }}
</div>
@endsection

@section('customjs')
    <script src="{{ asset('js/vue.js') }}"></script>
    <script>
        new Vue({
            el: '#app',
            data:{
                steps: [
                    {
                        name: 'fix bug',
                        complete: false
                    },
                    {
                        name: 'meeting',
                        complete: false
                    },
                ],
                newStep:''
            },
            methods:{
                addStep: function(){
                    this.steps.push({name: this.newStep, complete: false});
                    this.newStep = '';
                },
                complete: function (step) {
                    step.complete = true;
                }
            }
        });
    </script>
@endsection