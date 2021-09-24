<template>
    <div>
        <div style="width:60%; margin:0 auto;" class="mt-4 ">
            <form action="">
             <div>
                 <label for="name">Product Name:</label>
                 <input class="form-control" type="text"  id="name" placeholder="Product Name">
            </div> <br>  
            <div>
                 <label for="details">Product Details:</label>
                 <input class="form-control" type="text"  id="details" placeholder="Product details">
            </div> <br>
            <div>
                 <label for="price">Product price:</label>
                 <input class="form-control" type="text"  id="price" placeholder="Product price">
            </div> 
            <div>
                 <label for="quantity">Product quantity:</label>
                 <input class="form-control" type="text"  id="quantity" placeholder="Product quantity">
            </div> <br>

            <div style="float:right">
                <input class="btn btn-info" type="submit"  value="Add Product">
            </div><br>
            
        </form>
        </div>
        
    </div>
</template>
<script>
export default {
    
}
</script>
