<?php

include "header.php";
include "database.php";

$notes_id = $_GET["note_id"];
$notes = $db->query("SELECT * FROM reminders WHERE id = $notes_id")->fetch_assoc();

?>

<div class="container d-flex flex-column align-items-center ">
    <div class="row mt-3 w-50 ">
        <form method="post" action="edit_note_process.php">
            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <input type="text" name="title" value="<?php echo $notes["title"]; ?>" class="form-control" >
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" name="text" value="" rows="3"><?php echo $notes["text"]; ?></textarea>
                    </div>
                </div>

                <div class="row  card-footer  text-center align-items-center ">
                    <div class="col-3">
                        <input type="time" value="<?php echo $notes["time"]; ?>" name="time" class="form-control ">

                    </div>
                    <div class="col-3">
                        <input type="date" value="<?php echo $notes["date"]; ?>" name="date" class="form-control ">
                    </div>
                    <div class="col-3">
                        <input type="color" name="color" class=" form-control-color"
                               value="<?php echo $notes["color"]; ?>"
                               title="رنگ خود را انتخاب کنین">
                    </div>

                    <input type="hidden" value="<?php echo $notes["id"]; ?>" name="id">

                    <div class="col-3">
                        <button type="submit" class="btn btn-outline-dark">ذخیره</button>
                    </div>

                </div>
            </div>
        </form>

    </div>

    <hr class="text-danger">
    <div class="container-fluid d-flex flex-column align-items-start ">



    </div>
</div>
</div>

<?php

include "footer.php"

?>



