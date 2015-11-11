<?php

// Retrieve variables from controller
$universities = $arrayOfData['universities'];

?>

<link rel="stylesheet" href="assets/css/lib/bootstrap.min.css"/>
<link rel="stylesheet" href="assets/css/lib/dataTables.bootstrap.min.css"/>
<link rel="stylesheet" href="assets/css/lib/jquery.dataTables.min.css"/>
<link rel="stylesheet" href="assets/css/lib/responsive.bootstrap.min.css"/>
<link rel="stylesheet" href="assets/css/lib/jquery-ui.min.css"/>
<link rel="stylesheet" href="assets/css/lib/jquery-ui.structure.min.css"/>
<link rel="stylesheet" href="assets/css/lib/jquery-ui.theme.min.css"/>
<link rel="stylesheet" href="assets/css/lib/chosen.min.css"/>
<link rel="stylesheet" href="assets/css/style.css"/>

<script src="assets/js/lib/jquery-1.11.3.min.js"></script>
<script src="assets/js/lib/jquery.dataTables.min.js"></script>
<script src="assets/js/lib/dataTables.bootstrap.min.js"></script>
<script src="assets/js/lib/dataTables.responsive.min.js"></script>
<script src="assets/js/lib/jquery-ui.min.js"></script>
<script src="assets/js/lib/jquery.redirect.min.js"></script>
<script src="assets/js/lib/chosen.jquery.min.js"></script>
<script src="assets/js/script/university.index.script.js"></script>

<!-- Simple List -->
<div class="universitys-table-container">
    <a id="new-university-btn" href="#" class="btn btn-primary">New University</a>

    <table id="university-table" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0">

        <thead>
            <tr>
                <th class="all">University name</th>
                <th class="all">Actions</th>
            </tr>
        </thead>

        <tfoot>
            <th class="hide-search">University name</th>
            <th class="hide-search">Actions</th>
        </tfoot>

        <tbody>
        <?php foreach($universities as $university): ?>
            <tr>
                <td><?php $university->name; ?></td>
                <td>
                    <i>Remove</i>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>

    </table>

</div>

<!-- Dialog boxes -->
<div id="university-view" class="report-dialog-box">
    <div>Default text for dialog.</div>
</div>
<div id="university-remove-confirm" class="report-dialog-box">
    <div>Are you sure?</div>
</div>