(function() {
    'use strict';
    // this function is strict...
}());

var Card = {
    template: `<div class="col"><div class="card" style="width: 20rem; height: 465px;">
        <img class="card-img-top" v-bind:src="image" alt="Card image cap">
        <div class="card-body">
         <h4 class="card-title">{{title}}</h4>
         <h6 class="card-subtitle mb-2 text-muted">{{author}}</h6>
         <p class="card-text">{{description}}</p>
         <a href="#" class="card-link">Card link</a>
         <a href="#" class="card-link">Another link</a>
     </div>
 </div></div>`,
 props: ['title', 'author', 'description', 'image']
};


var app1 = new Vue({
  el: '#app1',
  data:{
    age: 34,
    counter: 0,
    countertwo: 0,
    quantity: 0,
    price: 38.99,
    total: 0,
    car:'ferrari 360',
    attachCol: false,
    totalResults: '',
    paid: false,
    sportsData: '',
    finalPrice: 0
  },
  components: {
      'card': Card
  },
  //
  watch: {
    // must much a property
    // function specifies code to execute when the counter changes
    quantity: function(value){
      console.log(value);
      if (value < 1) {
        this.total = (this.price * value).toFixed(2);
        return;
      }else {
        this.total = (this.price * value).toFixed(2);
      }
    },
    totalResults: function(value){
      console.log(value);
    }
  },
  mounted: function(){
    console.log('mounted data that runs on load');
  },
  created: function(){
    this.getRequest();

    var $vm = this;
    $.ajax({
      type:'get',
      url: 'https://newsapi.org/v2/top-headlines?sources=four-four-two&apiKey=711a1f568a484fe0936c753e9a6b75bf',
      success: function(data){
        console.log(data);
        $vm.sportsData = data.articles;
        $vm.totalResults = data.articles[0].title;
        // console.log($vm.totalResults);
      },
      error: function(){
        alert('error');
      }
    });

    function logName() {
        console.log('jason');
    }

    logName();


  },
  computed:{
    output: function(){
      console.log("output executed");
      console.log("--**--");
      return this.counter >= 4?'More than 4 or equal':this.counter;
    }
  },
  methods:{
    pay: function(){
      if (this.quantity > 0) {
        this.paid = true;
        this.finalPrice = this.total;
      }else {
        this.paid = false;
      }
    },
    getRequest: function(){
      var $vm = this;
      $.ajax({
        type:'get',
        url: 'https://newsapi.org/v2/top-headlines?sources=axios&apiKey=711a1f568a484fe0936c753e9a6b75bf',
        success: function(data){
          console.log(data);
          $vm.totalResults = data.totalResults;
          console.log($vm.totalResults);
        },
        error: function(){
          alert('error');
        }
      })
    },
    getSportsRequest: function(){
      var $vm = this;
      $.ajax({
        type:'get',
        url: 'https://newsapi.org/v2/top-headlines?sources=bbc-sport&apiKey=711a1f568a484fe0936c753e9a6b75bf',
        success: function(data){
          console.log(data);
          $vm.totalResults = data.articles[0].title;
          // console.log($vm.totalResults);
        },
        error: function(){
          alert('error');
        }
      })
    },
    add: function(){
      return this.age+=1;
    },
    quant: function(val){
      console.log(val);
      if (val === 'add') {
        this.quantity += 1;
      }else if(val === 'minus' && this.quantity >=1){
        this.quantity -= 1;
      }else {
        console.log('nothing else left to do as quantity is at 0');
        return;
      }
    }
  }
})

var app2 = new Vue({
    el: '#app2',
    data:{
        message: 'I\'m connected',
        message2: 'change me'
    },
    computed: {
        object: function(){
            console.log(this.message2.toUpperCase());
            return this.message2;
        }
    },
    methods: {
        showMessage: function(){
            document.getElementById('testpara').innerText = `${this.message2} + ${app1.car}` ;
            return;
        },
        updateFields: function(){
            this.message2 = '';
        }
    }
})

$(document).ready(function() {



});
