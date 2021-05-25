
<h2>Users <b>Details</b></h2>
<button type="button" class="btn "><a href="<?= base_url() ?>Dashboard/adduser">Add admin</a> </button>
            <table class="table table-striped table-sm">
              <thead>
              <tr>
                <th scope="col">id_user</th>
                <th scope="col">firstname</th>
                <th scope="col">lastname</th>
                <th scope="col">dateofbirth</th>
                <th scope="col">email</th>
                <th scope="col">password</th>
                <th scope="col">address</th>
                <th scope="col">phone</th>
                <th scope="col">admin</th>
                <th scope="col">action</th>
            </tr>
              </thead>
              <tbody>

            <?php foreach ($users as $users_item) : ?>
                <tr>
                    <td><?php echo $users_item['id_user']; ?></td>
                    <td><?php echo $users_item['firstname']; ?></td>
                    <td><?php echo $users_item['lastname']; ?></td>
                    <td><?php echo $users_item['dateofbirth']; ?></td>
                    <td><?php echo $users_item['email']; ?></td>
                    <td><?php echo $users_item['password']; ?></td>
                    <td><?php echo $users_item['address']; ?></td>
                    <td><?php echo $users_item['phone']; ?></td>
                    <td><?php echo $users_item['admin']; ?></td>
                    <td>
                        <div style="display: flex;">
                            <a title="Edit" href="<?= base_url() . "Dashboard/edituser/" . $users_item['id_user'] ?>" class="btn btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg></a>
                            <a title="Delete" href="<?= base_url() . "Dashboard/deletuser/" . $users_item['id_user'] ?>" class="btn btn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                </svg></a>
                        </div>
                    </td>

                </tr>
            <?php endforeach; ?>
        </tbody>
            </table>
          </div>