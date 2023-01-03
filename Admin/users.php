<?php include('./includes/header.php');?>

<?php require('../config.php'); ?>


<!--user الخاص باستدعاء بيانات جدول ال  function   استدعاء ال  -->
<?php $db = crud::selectDataUser(); ?>


          
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
                        <div class="row" style="justify-content:space-between">
                            <div>
                                <h3 class="title-5 m-b-35">data table user</h3>
                            </div>
                           
                            <div class="table-data__tool">
                                    <div class="table-data__tool-right">
                                            <a href="./addUser.php"><button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                            <i class="zmdi zmdi-plus"></i>add user</button>
                                            </a>
                                    </div>
                            </div>
                        </div>
                  
                <div class="col-lg-12">
                    <div class="table-responsive table--no-card m-b-30">
                        <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                        <tr style="text-align:center">
                                                <th>id</th>
                                                <th>name</th>
                                                <th>phone number</th>
                                                <th>email</th>
                                                <th>password</th>
                                                <th>role</th>
                                                <th>make admin</th>
                                                <th>edit</th>
                                                <th>delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <!-- foreach  طباعة البيانات داخل جدول من خلال  -->
                                            <?php foreach($db as $value):?> 
                                            <?php if($value['IsDeleted']==1){continue;};?> 

    
                                            <tr style="text-align:center">
                                            <td><?php echo $value['id']?></td>
                                            <td><?php echo $value['FullName']?></td>
                                            <td><?php echo $value['PhoneNumber']?></td>
                                            <td><span class="block-email"><?php echo $value['Email']?></span></td>
                                            <td><?php echo $value['Password']?></td>
                                            <td><?php echo $value['Role']?></td>
                                            <td>
                                                    <div class="table-data-feature" style="justify-content:center">
                                                      
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <a href="./changetoAdmin.php?id=<?php echo $value['id'];?>"><i class="zmdi zmdi-account"></i></a>
                                                        </button>
               
                                                    </div>
                                            </td>
                                            <td>
                                                    <div class="table-data-feature" style="justify-content:center">
                                                      
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <a href="./editUser.php?id=<?php echo $value['id']; ?>"><i class="zmdi zmdi-edit"></i></a>
                                                        </button>
               
                                                    </div>
                                            </td>
                                            <td>
                                                    <div class="table-data-feature" style="justify-content:center">
                                                      
                                                        <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <a href="http://localhost/BrightEyes_Project1/Admin/deleteUser.php?id=<?php echo $value['id']; ?>" onclick="return confirm ('are you shure')" ><i class="zmdi zmdi-delete"></i></a>
                                                        </button>
               
                                                    </div>
                                            </td>


                                               
                                            <?php  endforeach;?>
                                    
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
<?php include('./includes/footer.php');?>