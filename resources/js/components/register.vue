<template>
    <div>
        <div class="row">
            <div class="col-2">

            </div>
            <div class="col-8">
                <h2 class="text-center font-weight-bold text-primary">Register <span class="font-weight-bold text-danger">Form</span> </h2>
                <hr>
                <form class="form-group" action="">
                    <div class="form-group">
                        <label  for="name">Name</label>
                        <input type="text" id="name" value="" class="form-control" placeholder="Enter Name">
                    </div>
                    <div class="form-group">
                        <label  for="email">Email</label>
                        <input type="email" id="email" value="" class="form-control" placeholder="Enter Email">
                    </div>
                    <div class="form-group">
                        <label  for="password">Password</label>
                        <input type="password" id="password" value="" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label  for="password">Retype Password</label>
                        <input type="password" id="password" value="" class="form-control" placeholder="Retype password">
                    </div>

                    <input style="float:right; margin-bottom:10px" class="btn btn-success" type="submit" name="" value="Register">
                    
                </form>
            </div>
            <div class="col-2">

            </div>
        </div>
        
    </div>
</template>
<script>
export default {
    
}
</script>