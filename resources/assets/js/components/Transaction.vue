<template>
  <div>
    
      <h2>Transactions</h2>
  
      <div class="card card-body mb-2" v-for="transaction in transactions" v-bind:key="transaction.id">
        <p>{{transaction.user}}</p>
        <p>{{transaction.items}}</p>
      </div>
      <nav aria-label="Page navigation example">
        
        <ul class="pagination">
          
          <li class="page-item" v-bind:class="[{disabled: !pagination.prev_page_url}]" >
            <a class="page-link" href="#" @click="fetchTransaction(pagination.prev_page_url)">Previous</a>
          </li>
          <li  class="page-item disabled" >
              <a  class="page-link text-dark" href="#">
                page {{pagination.current_page}} of {{pagination.last_page}}
              </a>
          </li>
          <div v-for="index in pagination.last_page" :key="index">
            <li class="page-item"  >
              <a class="page-link" href="#" @click="fetchTransaction(pagination.custom_page_url+'?page='+index)">{{index}}</a>
            </li>
          </div>
          <li class="page-item" v-bind:class="[{disabled: !pagination.next_page_url}]" >
            <a class="page-link" href="#" @click="fetchTransaction(pagination.next_page_url)">Next</a>
          </li>
        </ul>
      </nav>
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
      
      fetchTransaction(page_url){
   
        let vm=this;
        page_url = page_url || 'api/transaction';
        fetch(page_url)
        .then(res=>res.json())
        .then(res=> {
          this.transactions=res.data; 
          console.log(res);
          vm.makePagination(res.meta, res.links);
          
        })
        .catch(err => console.log(err));
      },

      makePagination(meta,links){
        let pagination={
          current_page : meta.current_page,
          last_page : meta.last_page,
          next_page_url : links.next,
          prev_page_url : links.prev,
          custom_page_url : meta.path
        }
          this.pagination=pagination;
      }

    },

  }
</script>
