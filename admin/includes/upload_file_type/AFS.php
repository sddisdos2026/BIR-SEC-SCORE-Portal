<?php
    if ($role == 'Approver') {
?>

<div class="table-responsive p-0">
<table id="myTable5" class="table table-striped" style="width:100%">
    <colgroup>
		<col width="20%">
        <col width="20%">
		<col width="30%">
		<col width="20%">
        <col width="10%">
	</colgroup>
        <thead>
            <tr>
                <th>Uploaded by</th>
                <th>Email</th>
                <th>File name</th>
                <th>Date Uploaded</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

    <?php 
        $upload = afs('upload');

        if (mysqli_num_rows($upload) > 0) {
            foreach($upload as $uploadItem){

    ?> 

            <input type="hidden" name="id" value="<?= $uploadItem['id']; ?>">
            <input type="hidden" name="filename" value="<?= $uploadItem['filename']; ?>">

            <tr>
                <td class="Name">
                    <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <p class="text-sm text-secondary mb-0"><?= $uploadItem['name'];  ?></p>
                        </div>
                    </div>
                </td>
                <td class="email">
                    <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <p class="text-sm text-secondary mb-0"><?= $uploadItem['email']; ?></p>
                        </div>
                    </div>
                </td>
                <td class="filename">
                    <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <p class="text-sm text-secondary mb-0"><?= $uploadItem['filename']; ?></p>
                        </div>
                    </div>
                </td>
                <td class="date_uploaded">
                    <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <p class="text-sm text-secondary mb-0"><?= $uploadItem['upload_date']; ?></p>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <p class="text-sm text-secondary mb-0">
                            <a href="<?= $uploadItem['file_path']; ?>" target="_blank" title="Open"><i class="fa fa-file" aria-hidden="true"></i></a>
                            <a href="file_upload_download.php?filename=<?= $uploadItem['filename']; ?>" title="Download"><i class="fa fa-paperclip" aria-hidden="true"></i></a>
                            <a href="" data-bs-toggle="modal" data-bs-target="#approve<?= $uploadItem['id']; ?>" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                          </p>
                        </div>
                    </div>
                    
                </td>
            </tr>
    
    <?php include('modal.php'); ?>

    <?php
        }
    }
    ?>
    </tbody>
</table>
</div>

<?php
    }
?>

<?php
    if ($role == 'Approver (Head)') {
?>

<div class="table-responsive p-0">
<table id="myTable5" class="table table-striped" style="width:100%">
    <colgroup>
		<col width="20%">
        <col width="20%">
		<col width="30%">
		<col width="20%">
        <col width="10%">
	</colgroup>
    <thead>
        <tr>
            <th>Uploaded by</th>
            <th>Email</th>
            <th>File name</th>
            <th>Date Uploaded</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

    <?php 
        $upload = afs_head('upload');

        if (mysqli_num_rows($upload) > 0) {
            foreach($upload as $uploadItem){

    ?>

            <input type="hidden" name="id" value="<?= $uploadItem['id']; ?>">
            <input type="hidden" name="filename" value="<?= $uploadItem['filename']; ?>">

            <tr>
                <td class="Name">
                    <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <p class="text-sm text-secondary mb-0"><?= $uploadItem['name'];  ?></p>
                        </div>
                    </div>
                </td>
                <td class="email">
                    <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <p class="text-sm text-secondary mb-0"><?= $uploadItem['email']; ?></p>
                        </div>
                    </div>
                </td>
                <td class="filename">
                    <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <p class="text-sm text-secondary mb-0"><?= $uploadItem['filename']; ?></p>
                        </div>
                    </div>
                </td>
                <td class="date_uploaded">
                    <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <p class="text-sm text-secondary mb-0"><?= $uploadItem['upload_date']; ?></p>
                        </div>
                    </div>
                </td>
                <td>
                    <div class="d-flex px-2 py-1">
                        <div class="d-flex flex-column justify-content-center">
                          <p class="text-sm text-secondary mb-0">
                            <a href="<?= $uploadItem['file_path']; ?>" target="_blank" title="Open"><i class="fa fa-file" aria-hidden="true"></i></a>
                            <a href="file_upload_download.php?filename=<?= $uploadItem['filename']; ?>" title="Download"><i class="fa fa-paperclip" aria-hidden="true"></i></a>
                            <a href="" data-bs-toggle="modal" data-bs-target="#approve<?= $uploadItem['id']; ?>" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                          </p>
                        </div>
                    </div>
                    
                </td>
            </tr>

    <?php include('modal.php'); ?>

    <?php
        }
    }
    ?>
    </tbody>
</table>
</div>

<?php
    }
?>