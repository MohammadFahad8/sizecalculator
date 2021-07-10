<template>
<div>
<table class="table table-bordered  " style="width:100% !important;">
    <thead>
<tr>
    <th>Chest</th>
    <th>Stomach</th>
    <th>Bottom</th>
    <th>Predicted Size</th>
    
</tr>
    </thead>
       <tbody>
           <div v-if="isLoading" class="d-flex justify-content-center">
  <div class="spinner-border" role="status">
    <span class="sr-only">Loading...</span>
  </div>
</div>
  <tr v-for="(row,index) in bodysizes" :key="row.id">

    <td>{{ row.chest }}</td>
    <td>{{ row.stomach }}</td>
    <td>{{ row.bottom }}</td>
    <td>{{ row.predicted_size }}</td>
  </tr>
 

    </tbody>
      
</table>
</div>
    
</template>
<script>
    

   

    export default{
       
    
    data(){
        return{
        bodysizes:[],
        isLoading:false,
        }
    },
    methods:{
        onChangePage(bodysizes) {
            // update page of items
            this.bodysizes = bodysizes;
        },

        getBodySize:function(id)
        {
            this.isLoading = true;
            axios.get('bodysizes/'+id).then((res)=>{
              this.isLoading=false;
                this.bodysizes = res.data;
                

            })
        }
    },
    mounted(){
        
        this.getBodySize(localStorage.getItem('bodyid'));
    }
    ,
    watch:{}
}
</script>
