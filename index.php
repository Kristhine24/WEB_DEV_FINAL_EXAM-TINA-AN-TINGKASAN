<?php session_start(); ?>
<?php
include "animal_header.php";
?>
    <div class="content">
    <div class="container-fluid">
      <div class="row-fluid" style="background-color: white; min-height: 600px; padding:10px;">
          <div class="span12">
            <div id="page-stylist" style="margin-top: 2px">
                        <div class="container-fluiAdmin Dashboard">
                            <div class="row">
                                <div class="col-lg-12">
                                  <br>
                                  <div style="display:flex;justify-content:center">
                                        <img style="padding-top:0.3rem;padding-bottom:0.3rem" width="75rem" height="auto" src="./img/logo.png" alt=""> 
                                        <h1 style="margin-left:1rem; margin-top:1.2rem"class="page-header">Animals</h1>
                                  </div>
                                    <hr>
                                      <br>

                        <?php 
                            
                            if(isset($_SESSION['message'])){
                                ?>
                                <div class="alert alert-info text-center" style="margin-top:10px;">
                                    <?php echo $_SESSION['message']; ?>
                                </div>
                                <?php

                                unset($_SESSION['message']);
                            }
                        ?>
                        <div class="table-responsive" >
                            <table class="table table-hover" id="myTable">
                                <thead>
                                    <th>ID.</th>
                                    <th>Animal Name</th>
                                    <th>Type</th>
                                    <th>Color</th>
                                    <th>Number of Legs</th>
                                    <th>Remarks</th>
                                </thead>
                                <tbody>
                                <?php
                                    //include our connection
                                    include_once('database.php');

                                    $database = new Connection();
                                    $db = $database->open();
                                    try{	
                                        $sql = 'SELECT * FROM animals';
                                        // $sql = 'SELECT * FROM animals';
                                        $no = 0;
                                        foreach ($db->query($sql) as $row) {
                                            $no++;
                                ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['type_id']; ?></td>
                                                <td><?php echo $row['color']; ?></td>
                                                <td><?php echo $row['number_of_legs']; ?></td>
                                                <td><?php echo $row['remarks']; ?></td>
                                                <td align="right">
                                                    <a class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#edit_animal<?php echo $row['id']; ?>">Edit</a>
                                                    <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete_animal<?php echo $row['id']; ?>">Delete</a>
                                                </td>
                                              <?php include('view_delete.php'); ?>
                                                <?php include('view_edit.php'); ?>
                                            </tr>
                                <?php 
                                        }
                                    }
                                    catch(PDOException $e){
                                        echo "There is some problem in connection: " . $e->getMessage();
                                    }

                                    //close connection
                                    $database->close();

                                ?>
                                </tbody>
                            </table>

                            <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add_animal">Add Animal</a>
                            <a a href="type.php" class="btn btn-primary">Types</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

   <?php include('view_animal.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<?php
include "animal_footer.php";
?>