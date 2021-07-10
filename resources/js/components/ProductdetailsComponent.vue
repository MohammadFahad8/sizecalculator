<template>
    <div>
        
<table class="table table-bordered  " style="width:100% !important;">
    <thead>
<tr>
    <th>Name</th>
    <th>Description</th>
    <th>Bottom</th>
    <th>Predicted Size</th>
    
</tr>
    </thead>
       <tbody>
       <tr v-if="isLoading"  > 
           <td><div class="text-center"><div class="spinner-grow spinner-grow-sm" role="status">
    <span class="sr-only">Loading...</span>
  </div>
  </div> </td>
           <td><div class="d-flex justify-content-center text-center">
  <div class="spinner-grow spinner-grow-sm" role="status">
    <span class="sr-only">Loading...</span>
  </div>
</div></td> 
<td> <div class="text-center"><div class="spinner-grow spinner-grow-sm" role="status">
    <span class="sr-only">Loading...</span>
  </div></div></td>
<td><div class="text-center"> <div class="spinner-grow spinner-grow-sm" role="status">
    <span class="sr-only">Loading...</span>
  </div></div></td>
</tr>  
  <tr v-for="(row,index) in product" :key="row.id"  >

    <td>{{ row.title }}</td>
    <td v-html="row.body_html">{{ row.body_html  }}</td>
    <td>{{ row.bottom }}</td>
    <td>{{ row.predicted_size }}</td>
    <td> <a href="javascript:void(0)">Add Attribute</a> </td>
  </tr>
 

    </tbody>
      
</table>                    
        </div>
</template>
<script>


export default {
  props:['product_id'],
    data() {
        return{
        
        checkval:23123,
        isLoading:false,
        product:[],
        }
        
    },
    methods:{

       getProductDetails:function($id){
           this.isLoading = true;
           axios.get('product-details/'+$id)
           .then((res)=>{
             
               
               this.isLoading = false;
                this.product  = res.data
                
                
                // console.log(this.product.product.image.src)
                 

           })
       },
          decodeHtml: function (html) {
                var txt = document.createElement("textarea");
                txt.innerHTML = html;
                return txt.value;
            }
    },
    mounted(){
          this.getProductDetails(this.product_id)
    },
    watch:{}
}
</script>
