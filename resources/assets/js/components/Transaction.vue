<template>
	<div>
		<h2>
			Transactions
			<div class="card card-body mb-2" v-for="transaction in transactions" v-bind:key="transaction.id">
				<h3>{{transaction.user}}</h3>
				<p>{{transaction.items}}</p>
			</div>
		</h2>
	</div>
</template>

<script>

  export default {
    data(){
      return{
        transactions:[],
        transaction:{
          user: '',
          items: '',
          status: ''
        },
        transaction_id:'',
        pagination:{},
        edit:false
      }

    },
    created(){

      this.fetchTransaction();
    },
    methods: {
      fetchTransaction(){
        fetch('api/transaction')
        .then(res=>res.json())
        .then(res=> {
          this.transactions=res.data; 
        });
      }
    }
  }
</script>
