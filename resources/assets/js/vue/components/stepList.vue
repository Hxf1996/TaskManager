<template>
	<div class="col-md-4 col-md-offset-1">

        <div class="panel panel-default" v-if="show">
            <div class="panel-heading">
                <h2 v-if="remaings.length && type == 'remaings' ">
                    待完成({{ remaings.length }})
                    <span class="btn btn-sm btn-info" v-on:click="completeAll">完成所有</span>
                </h2>

                <h2 v-if="completions.length && type == 'completed' ">
                    已完成({{ completions.length }})
                    <span class="btn btn-sm btn-danger" v-on:click="clearAll">删除所有</span>
                </h2>

            </div>
            <div class="panel-body">
                <ul class="list-group">
	                <li class="list-group-item animated" v-for="step in steps | typeSwitch" transition="fade">
					    <span @dblclick="editStep(step)">{{ step.name }}</span>
					    <i class="fa fa-check pull-right" v-on:click="toggleCompletion(step)"></i>
					    <i class="fa fa-close pull-right" v-on:click="removeStep(step)"></i>
					</li>
                </ul>
            </div>
        </div>
        
        <div class="panel panel-default" v-if="type == 'remaings' ">
            <div class="panel-heading">
                <form @submit.prevent='addStep' class="form-inline">
                    <input type="text" v-model="newStep" v-el:new-step class="form-control">
                    <button v-if="newStep" type="submit" class="btn btn-primary">添加步骤</button>
                </form>
            </div>
        </div>

    </div>
</template>

<script>
	export default {
		props:['steps', 'type'],
		data: function(){
			return {
				newStep: ''
			};
		},
		methods: {
			toggleCompletion: function(step){
				this.$dispatch('toggle', step);
			},
			removeStep: function(step){
				this.$dispatch('remove', step);
			},
			addStep: function(){
				this.$dispatch('add', this.newStep);
                this.newStep = '';
			},
			completeAll: function(){
				this.$dispatch('complete');
			},
			clearAll: function(){
				this.$dispatch('clear');
			},
			editStep: function (step) {
	            this.removeStep(step);
	            this.newStep = step.name;
	            this.$els.newStep.focus();
	        }
		},
	    computed:{
	        completions:function(){
	            return this.steps.filter(function(step){
	                return step.completed;
	            });
	        },
	        remaings:function(){
	            return this.steps.filter(function(step){
	                return !step.completed;
	            });
	        },
	        show: function(){
	        	var case1 = this.remaings.length && this.type =="remaings";
	        	var case2 = this.completions.length && this.type =="completed";
	        	if( case1 || case2 ){
	        		return true;
	        	}
	        }
	    },
	    filters:{
	        inProcess: function (steps) {
	            return steps.filter(function (step) {
	                return !step.completed;
	            });
	        },
	        completed: function(steps) {
	        	return steps.filter(function (step) {
	                return step.completed;
	            });
	        },
	        typeSwitch: function(steps){
	        	var vm = this;
	        	if(vm.type == "remaings"){
	        		return vm.$options.filters.inProcess(steps);
	        	}
	        	return vm.$options.filters.completed(steps);
	        }
	    }
	}
</script>

<style>

</style>