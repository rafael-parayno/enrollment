<?php
include('header.php');
include('navigation.php');
// $studentsList = $personal->getData();

$strandlist = $strand->getData();

if (isset($_POST['submitEditStrand'])) {
    $id = $_POST['strandId'];
    $name = $_POST['strandNameEdit'];
    $code =  $_POST['strandcodeEdit'];

    $strand->editStrand($id, $name, $code);

    echo "<script>window.location='/academia/system/pages/strands.php';</script>";
}

?>
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Strand</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Strand</li>
        </ol>

        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>Strand
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3">
                    <button class="btn btn-md btn-success" data-toggle="modal" data-target="#addModalStrand">Add Strand</button>

                </div>
                <div class="table-responsive">

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Strand Name</th>
                                <th>Strand Code</th>

                                <th>Action</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Strand Name</th>
                                <th>Strand Code</th>

                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>

                            <?php array_map(function ($strand) { ?>
                                <tr>
                                    <td><?= $strand['strand_id'] ?></td>
                                    <td><?= $strand['strand_name'] ?></td>
                                    <td><?= $strand['strandcode'] ?></td>

                                    <td>

                                        <a class="btn btn-block btn-info" data-toggle="modal" data-target="#editModalStrand" data-name="<?php echo $strand['strand_name']; ?>" data-code="<?php echo $strand['strandcode']; ?>" data-strandid="<?php echo $strand['strand_id']; ?>" href="">edit</a>

                                    </td>
                                </tr>
                            <?php }, $strandlist) ?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="addModalStrand" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Strand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="strandFunction.php" method="POST">
                        <div class="form-group">
                            <label for="strandName">Strand Name</label>
                            <input id="strandName" type="text" name="strandName" />
                        </div>
                        <div class="form-group">
                            <label for="strandcode">Strand Code</label>
                            <input id="strandcode" type="text" name="strandcode" />
                        </div>
                </div>
                <div class="modal-footer">

                    <button type="Submit" name="submitaddStrand" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <div id="editModalStrand" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Strand</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="strandNameEdit">Strand Name</label>
                            <input id="strandNameEdit" type="text" name="strandNameEdit" />
                        </div>
                        <div class="form-group">
                            <label for="strandcodeEdit">Strand Code</label>
                            <input id="strandcodeEdit" type="text" name="strandcodeEdit" />
                        </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="strandId" />
                    <button type="Submit" name="submitEditStrand" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</main>



<?php
include('footer.php');
?>