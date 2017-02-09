<template>
	<form class="navbar-form navbar-left">
	    <div class="form-group">
	        <div class="input-group">
	            <input type="text" class="form-control" v-model="searchString" @focus="fetchTasks" @blur="leave" placeholder="search"></input>
	            <div class="input-group-addon">
	                <i class="fa fa-search"></i>
	            </div>
	        </div>
	    </div>

	    <ul class="list-group search-list" v-if="show">
	    	<li class="list-group-item" v-for="task in tasks | searchFor searchString">
	    		<a href="/tasks/{{ task.id }}"><p>
	    			{{ task.title }}
	    		</p></a>
	    	</li>
	    </ul>
	</form>
</template>

<script>
	export default {
		data: function(){
			return {
				searchString: '',
				tasks: [],
				show: true
			}
		},
		methods: {
			fetchTasks: function(){
				this.$http.get('/tasks/searchapi').then((response)=>{
					this.$set('tasks',response.body);
					this.show=true;
				},(response)=>{

				});
			},
			leave: function(){
				var _self = this;
				setTimeout(function(){
					_self.show=false;
				},1000);
			}
		},
		filters: {
			searchFor: function(tasks, searchString){
				searchString = searchString.trim().toLowerCase();
				return tasks.filter(function(task){
					if( task.title.indexOf(searchString) != -1 ){
						return task;
					}
				});
			}
		}
	}
</script>

<style>
	.navbar-form .search-list{
		max-height: 300px;
		overflow: auto;
	}
	.navbar-default .navbar-collapse, .navbar-default .navbar-form{
		height: 0px;
	}
</style>