<?php 
                  include('db_conn.php');

                  $ref_table = "users";
                  $fetchdata = $database->getReference($ref_table)->getValue();

                  if($fetchdata > 0){
                    $i=0;
                    foreach($fetchdata as $key => $row){
                      ?>
                        <tr>
                          <td><?php echo $row['email'] ?></td>
                          <td><?php echo $row['username'] ?></td>
                          <td><?php echo $row['password'] ?></td>
                          <td>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit_admin<?php echo $key; ?>">Edit</button>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete_admin<?php echo $key; ?>">Delete</button>
                          </td>
                        </tr>

                        <!--Modal Edit-->
                        <div class="modal fade" id="edit_admin<?php echo $key; ?>" tabindex="-1" aria-labelledby="edit_admin" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title text-dark">Edit Account of <?php echo $row['username'] ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form action="functions.php" method="POST">
                                <div class="modal-body">
                                    <input type="hidden" name="pk" value="<?php echo $key ?>">
                                    <label class="text-dark" for="">Email</label>
                                    <input class="form-control" type="text" name="email" value="<?php echo $row['email'] ?>" required>
                                    <label class="text-dark" for="">Username</label>
                                    <input class="form-control" type="text" name="a_username" value="<?php echo $row['a_username'] ?>" required>
                                    <label class="text-dark" for="">Password</label>
                                    <input class="form-control" type="text" name="a_password" value="<?php echo $row['a_password'] ?>" required>
                                    <label class="text-dark" for="">Retype Password</label>
                                    <input class="form-control" type="text" name="a_repassword" value="<?php echo $row['a_repassword'] ?>" required>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary" name="edit_admin">Edit</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>


                        <!--Modal Delete Admin-->
                        <div class="modal fade" id="delete_admin<?php echo $key; ?>" tabindex="-1" aria-labelledby="delete_admin" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title text-dark">Delete Account</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <form action="functions.php" method="POST">
                                
                                <div class="text-center mt-4">
                                <h4 class="text-dark">Are you sure to delete this account?</h4>
                                <p class="text-dark">Deleting Account of: <?php echo $row['username'] ?></p>
                                </div>
                              
                                <input type="hidden" name="del_pk" value="<?php echo $key; ?>">
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-danger" name="del_admin">Delete</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                        <?php
                    }
                  }else{
                    ?>
                    <!-- <tr>
                      <td>No Record Retrieve</td>
                    </tr> -->
                    <?php
                  }
                ?>