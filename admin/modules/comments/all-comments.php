 <div class="row">
           
            

            <div class="col-sm-12">
               <div class="card">
                  <div class="card-header d-flex justify-content-between">
                     <div class="header-title">
                        <h4 class="card-title"> Datatables</h4>
                     </div>
                  </div>
                  <div class="card-body">
                     <p>List Comments.</p>
                     <div class="table-responsive">
                        <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                            
                                
                                    <div class="row"><div class="col-sm-12"><table id="datatable" class="table data-tables table-striped dataTable" role="grid" aria-describedby="datatable_info">
                           <thead>
                              <tr class="ligth" role="row"><th class="sorting sorting_asc" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 60.663px;">id</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 79.237px;">Parent_id</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 123.912px;">sender_name</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 44.825px;">sender_email</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 213px;">Comment</th><th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 106.762px;">Date</th>
                                <th>Option</th>

                              </tr> 
                           </thead>
                           <tbody>
                              
                            <?php
                          while($row = $result->fetch_assoc())//получаем все строки в цикле по одной
                    {
                    ?>   
           
                           <tr class="odd">


                            <td class="sorting_1" ><?php echo $row['comment_id'];?></td>
                            <td><?php echo $row['parent_comment_id'];?></td>
                            <td><?php echo $row['comment_sender_name'];?></td>
                            <td><?php echo $row['comment_sender_email'];?></td>
                            <td><?php echo $row['comment'];?></td>
                            <td><?php echo $row['comment_at'];?></td>
                            <td>
                                <div class="d-flex align-items-center list-action">
                                    
                                    <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"
                                        href="/page=edit&id=<?php echo $row['comment_id']; ?>"><i class="ri-pencil-line mr-0"></i></a>
                                    <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"
                                        href="/admin/modules/comments/delete.php?id=<?php echo $row['comment_id']; ?>"><i class="ri-delete-bin-line mr-0"></i></a>
                                </div>
                            </td>
                                 
                              </tr>
                               <?php 
                           }
                    ?>   
                          </tbody>
                           <tfoot>
                              <tr><th rowspan="1" colspan="1">id</th><th rowspan="1" colspan="1">Parent_id</th><th rowspan="1" colspan="1">sender_name</th><th rowspan="1" colspan="1">sender_email</th><th rowspan="1" colspan="1">Comment</th><th rowspan="1" colspan="1">Date</th></tr>
                           </tfoot>
                        </table></div></div>
                     
                     </div>
                  </div>
               </div>
            </div>

        </div>