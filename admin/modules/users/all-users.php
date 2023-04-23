<div class="row">
            <div class="col-lg-12">
                <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                    <div>
                        <h4 class="mb-3">User List</h4>
                        <p class="mb-0">A dashboard provides you an overview of user list with access to the most important data,<br>
                         functions and controls. </p>
                    </div>
                    <a href="?page=add" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add User</a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="table-responsive rounded mb-3">
                <table class="data-table table mb-0 tbl-server-info">
                    <thead class="bg-white text-uppercase">
                        <tr class="ligth ligth-data">
                            <th>
                                <div class="checkbox d-inline-block">
                                    <input type="checkbox" class="checkbox-input" id="checkbox1">
                                    <label for="checkbox1" class="mb-0"></label>
                                </div>
                            </th>
                            <th>Id</th>
						    <th>Username</th>
						    <th>Email</th>
						    <th>Password</th>
						    <th>Option</th>
                        </tr>
                    </thead>

				  <?php
				          while($row = $result->fetch_assoc())//получаем все строки в цикле по одной
					{
					?> 
					<tbody class="ligth-body">	
                        <tr>
                            <td>
                                <div class="checkbox d-inline-block">
                                    <input type="checkbox" class="checkbox-input" id="checkbox2">
                                    <label for="checkbox2" class="mb-0"></label>
                                </div>
                            </td>
                            <td><?php echo $row['id'];?></td>
				            <td><?php echo $row['username']; ?></td>
						    <td><?php echo $row['email']; ?></td>
						    <td><?php echo $row['password']; ?></td>
						    
                            <td>
                                <div class="d-flex align-items-center list-action">
                                    <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View"
                                        href="#"><i class="ri-eye-line mr-0"></i></a>
                                        <!-- ссылки в кнопках устанавливаем GET параметр -->
                                    <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                        href="/page=edit&id=<?php echo $row['id']; ?>" ><i class="ri-pencil-line mr-0"></i></a>
                                    <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"
                                        href="/admin/modules/users/delete.php?id=<?php echo $row['id']; ?>"><i class="ri-delete-bin-line mr-0"></i></a>
                                </div>
                            </td>
                        </tr>
                        
                    </tbody>
                    <?php	
		                   }
	                ?>
                </table>
                </div>
            </div>
        </div>
        <!-- Page end  -->