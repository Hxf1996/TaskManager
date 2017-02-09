var Vue = require('vue');
var VueResource = require('vue-resource');
var StepList = require('./components/stepList.vue');
Vue.use(VueResource);

Vue.http.headers.common['X-CSRF-TOKEN'] = $('#token').attr('content');
var resource = Vue.resource(top.location+'/steps{/id}');
Vue.transition('fade',{
    leaveClass: 'fadeOut'
});
var v = new Vue({
    el: '#app',
    data:{
        steps: [],
        baseURL: top.location+'/steps',
    },
    ready: function(){
        this.fetchSteps();
    },
    components: { StepList },
    methods:{
        fetchSteps: function(){
            resource.query().then((response)=>{
                //success
                this.$set('steps', response.body);
            },(response)=>{
                //error
                response.status;
            });
        },
        addStep: function(newStep){
            resource.save('', {name: newStep}).then((response)=>{
                this.fetchSteps();
            },(response)=>{
                response.status;
            });
        },
        toggleCompletion: function (step) {
            resource.update({id: step.id}, {opposite: !step.completed}).then((response)=>{
                this.fetchSteps();
            },(response)=>{
                response.status;
            });
        },
        removeStep: function (step) {
            resource.delete({id: step.id}).then((response)=>{
                //success
                this.fetchSteps();
            },(response)=>{
                //error
                response.status;
            });
        },
        editStep: function (step) {
            this.removeStep(step);
            this.newStep = step.name;
            this.$els.newStep.focus();
        },
        completeAll: function (){
            this.$http.post(this.baseURL+'/complete').then((response)=>{
                this.fetchSteps();
            },(response)=>{
                response.status;
            });
        },
        clearAll: function (){
            this.$http.delete(this.baseURL+'/clear').then((response)=>{
                this.fetchSteps();
            },(response)=>{
                response.status;
            });
        }
    }
});