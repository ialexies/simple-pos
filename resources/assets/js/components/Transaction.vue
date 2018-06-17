<template>
  <div>
    
      <h2>Transactions</h2>
  
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          
          <li class="page-item" @click="fetchTransaction(pagination.first_page_url)" >
            <a class="page-link font-weight-bold" href="#" @click="fetchTransaction()">First</a>
          </li>

          <li class="page-item" v-bind:class="[{disabled: !pagination.prev_page_url}]" >
            <a class="page-link text-dark font-weight-light" href="#" @click="fetchTransaction(pagination.prev_page_url)">prev</a>
          </li>

          <li class="page-item"  >
              <a class="page-link text-dark font-weight-light" v-bind:class="[{'d-none': pagination.current_page > 3}]" href="#" @click="fetchTransaction(pagination.custom_page_url+'?page=1')">
                1
              </a>
              <a class="page-link text-dark font-weight-light" v-bind:class="[{'d-none': pagination.current_page <= 3}]" href="#" @click="fetchTransaction(pagination.custom_page_url+'?page='+(pagination.current_page-2))">
                {{pagination.current_page-2}}
              </a>
          </li>

          <li class="page-item"  >
              <a class="page-link text-dark font-weight-light" v-bind:class="[{'d-none': pagination.current_page > 2}]" href="#" @click="fetchTransaction(pagination.custom_page_url+'?page=2')">
                2
              </a>
              
              <a class="page-link  text-dark font-weight-light" v-bind:class="[{'d-none': pagination.current_page <= 2}]" href="#"  @click="fetchTransaction(pagination.custom_page_url+'?page='+(pagination.current_page-1))" >
                {{pagination.current_page-1}}
              </a>
          </li>

        
          <li  class="page-item disabled" >
              <a  class="page-link text-light bg-info" href="#">
                 {{pagination.current_page}} of {{pagination.last_page}}
              </a>
          </li>

          <li class="page-item"   >
              <a class="page-link  text-dark font-weight-light" v-bind:class="[{'d-none': pagination.current_page >= pagination.last_page-1}]" href="#"  @click="fetchTransaction(pagination.custom_page_url+'?page='+(pagination.current_page+1))" >
                {{pagination.current_page+1}}
              </a>
              <a class="page-link  text-dark font-weight-light" v-bind:class="[{'d-none': pagination.current_page < pagination.last_page-1}]" href="#"  @click="fetchTransaction(pagination.custom_page_url+'?page='+(pagination.last_page-1))" >
                {{pagination.last_page-1}}
              </a>
          </li>

          <li class="page-item"  >
              <a class="page-link  text-dark font-weight-light " v-bind:class="[{'d-none':  pagination.current_page >=  pagination.last_page-1}]" href="#"  @click="fetchTransaction(pagination.custom_page_url+'?page='+(pagination.current_page+2))" >
                {{pagination.current_page+2}}
              </a>
              <a class="page-link  text-dark font-weight-light" v-bind:class="[{'d-none': pagination.current_page < pagination.last_page-1}]" href="#"  @click="fetchTransaction(pagination.custom_page_url+'?page='+(pagination.last_page))" >
                {{pagination.last_page}}
              </a>
          </li>

          <li class="page-item" v-bind:class="[{disabled: !pagination.next_page_url}]" >
            <a class="page-link text-dark font-weight-light" href="#" @click="fetchTransaction(pagination.next_page_url)">next</a>
          </li>

          <li class="page-item"  >
            <a class="page-link font-weight-bold" href="#" @click="fetchTransaction(pagination.last_page_url)">Last</a>
          </li>
          
        </ul>
      </nav>

      <div class="card card-body mb-2" v-for="transaction in transactions" v-bind:key="transaction.id">
        <p>{{transaction.user}}</p>
        <p>{{transaction.items}}</p>
      </div>

      <nav aria-label="Page navigation example">
        <ul class="pagination">
          
          <li class="page-item" @click="fetchTransaction(pagination.first_page_url)" >
            <a class="page-link font-weight-bold" href="#" @click="fetchTransaction()">First</a>
          </li>

          <li class="page-item" v-bind:class="[{disabled: !pagination.prev_page_url}]" >
            <a class="page-link text-dark font-weight-light" href="#" @click="fetchTransaction(pagination.prev_page_url)">prev</a>
          </li>

          <li class="page-item"  >
              <a class="page-link text-dark font-weight-light" v-bind:class="[{'d-none': pagination.current_page > 3}]" href="#" @click="fetchTransaction(pagination.custom_page_url+'?page=1')">
                1
              </a>
              <a class="page-link text-dark font-weight-light" v-bind:class="[{'d-none': pagination.current_page <= 3}]" href="#" @click="fetchTransaction(pagination.custom_page_url+'?page='+(pagination.current_page-2))">
                {{pagination.current_page-2}}
              </a>
          </li>

          <li class="page-item"  >
              <a class="page-link text-dark font-weight-light" v-bind:class="[{'d-none': pagination.current_page > 2}]" href="#" @click="fetchTransaction(pagination.custom_page_url+'?page=2')">
                2
              </a>
              
              <a class="page-link  text-dark font-weight-light" v-bind:class="[{'d-none': pagination.current_page <= 2}]" href="#"  @click="fetchTransaction(pagination.custom_page_url+'?page='+(pagination.current_page-1))" >
                {{pagination.current_page-1}}
              </a>
          </li>

        
          <li  class="page-item disabled" >
              <a  class="page-link text-light bg-info" href="#">
                 {{pagination.current_page}} of {{pagination.last_page}}
              </a>
          </li>

          <li class="page-item"   >
              <a class="page-link  text-dark font-weight-light" v-bind:class="[{'d-none': pagination.current_page >= pagination.last_page-1}]" href="#"  @click="fetchTransaction(pagination.custom_page_url+'?page='+(pagination.current_page+1))" >
                {{pagination.current_page+1}}
              </a>
              <a class="page-link  text-dark font-weight-light" v-bind:class="[{'d-none': pagination.current_page < pagination.last_page-1}]" href="#"  @click="fetchTransaction(pagination.custom_page_url+'?page='+(pagination.last_page-1))" >
                {{pagination.last_page-1}}
              </a>
          </li>

          <li class="page-item"  >
              <a class="page-link  text-dark font-weight-light " v-bind:class="[{'d-none':  pagination.current_page >=  pagination.last_page-1}]" href="#"  @click="fetchTransaction(pagination.custom_page_url+'?page='+(pagination.current_page+2))" >
                {{pagination.current_page+2}}
              </a>
              <a class="page-link  text-dark font-weight-light" v-bind:class="[{'d-none': pagination.current_page < pagination.last_page-1}]" href="#"  @click="fetchTransaction(pagination.custom_page_url+'?page='+(pagination.last_page))" >
                {{pagination.last_page}}
              </a>
          </li>

          <li class="page-item" v-bind:class="[{disabled: !pagination.next_page_url}]" >
            <a class="page-link text-dark font-weight-light" href="#" @click="fetchTransaction(pagination.next_page_url)">next</a>
          </li>

          <li class="page-item"  >
            <a class="page-link font-weight-bold" href="#" @click="fetchTransaction(pagination.last_page_url)">Last</a>
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
          first_page_url : links.first,
          next_page_url : links.next,
          prev_page_url : links.prev,
          last_page_url : links.last,
          custom_page_url : meta.path
        }
          this.pagination=pagination;
      }

    },

  }
</script>
