
<?php 
       include '../dashboard/setTittle.php';
       $head->setName('Post');
       include '../dashboard/head.php';
       require '../dashboard/slidebar.php';
       require '../dashboard/topbar.php';
       $footer = '../dashboard/footer.php';  #<?php require $footer;      
?>
     
            <!-- Begin Page Content -->
    <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"> New post</h1>
         <div class="card-body"">
           <div class="row">
             <div class="col-xl-3 col-md-6 mb-4">
                <form>
                  <div class="form-group">
                      <label for="tittle">Tittle</label>
                      <input type="text" name="tittle" class="form-control form-control-user" id="tittle" placeholder='"Hello world!"'>
                   </div>
                   <div class="form-group">
                      <label for="exampleFormControlTesxtarea1">Example textarea</label>
                       <textarea class="form-control form-control-user" id="exampleFormControlTextarea1" rows="3"></textarea>  
                        <button type="submit" class="btn btn-success btn-icon-split">
                          <span class="icon text-white-50">
                          <i class="fas fa-check"></i>
                          </span>
                          <span class="text">Split Button Success</span>
                        </button>
                     </div>
                </form>
            </div>
             <div class="col-xl-3 col-md-6 mb-4">
               <form action="">
                 <div class="form-group">
                 <label for="exampleFormControlInput1">Tittle</label>

                 <input type="text" name="new_category" class="form-control form-control-user" id="new_category" placeholder='"Category"'>
                 </div>
               </form>
             </div>
           </div>

         </div>
      </div> 
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      
 <?php require $footer;?>

 