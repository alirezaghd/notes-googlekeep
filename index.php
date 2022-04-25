<?php

include "header.php";
include "database.php";

$notes = $db->query("SELECT * FROM reminders")
?>

<div class="container">
    <div class="row justify-content-center mt-3 ">
        <div class="col-lg-6 col-md-12 col-sm-12 col-12">
            <form method="post" action="add_note_process.php">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3 ">

                            <input type="text" name="title" class="form-control " data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" placeholder="عنوان">

                        </div>

                        <div class="mb-3 collapse" id="collapseWidthExample">
                            <textarea class="form-control" name="text" placeholder="توضیحات ..." rows="3"></textarea>
                        </div>
                    </div>

                    <div class="row  card-footer  text-center align-items-center collapse " id="collapseWidthExample">
                        <div class="col-3">
                            <input type="time" value="" name="time" class="form-control ">

                        </div>
                        <div class="col-3">
                            <input type="date" value="" name="date" class="form-control ">
                        </div>
                        <div class="col-3">
                            <input type="color" name="color" class=" form-control-color"
                                   value="#063d7c"
                                   title="رنگ خود را انتخاب کنین">
                        </div>
                        <div class="col-3">
                            <button type="submit" class="btn btn-outline-dark">ذخیره</button>
                        </div>

                    </div>
                </div>
            </form>

        </div>

    </div>

    <div class="container-fluid  ">

        <div class="row mt-5" >
            <?php foreach ($notes as $note): ?>
                <div class=" col-lg-3 col-md-6 col-sm-12 col-12 position-relative">
                    <div class="card text-white mb-3 text-start" style="background:<?php echo $note["color"] ?>; ">
                        <div class="card-header stroke "> <h4 class="d-block"><?php echo $note["title"] ?> </h4>

                        </div>
                        <div class="card-body ">
                            <h5 class="card-text mb-3 stroke " id="text_note"><?php echo $note["text"] ?></h5>
                            <p class="card-text mb-2 stroke fs-6"> <i class="far fa-alarm-clock"></i> <?php echo $note["time"] ?> </p>
                            <p class="card-text  stroke fs-6"><i class="far fa-calendar-alt"></i>  <?php echo $note["date"] ?> </p>
                        </div>
                        <div class="card-footer d-flex justify-content-around">
                            <a class="btn-sm btn-outline-light " href="edit_note.php?note_id=<?php echo $note["id"] ?>"> <i class="far fa-edit stroke"></i></a>
                            <a class="btn-sm btn-outline-light " href="delete_note_process.php?note_id=<?php echo $note["id"] ?>"> <i class="far fa-trash stroke"></i></a>
                            <div class="form-check">
                                <input class="form-check-input " type="checkbox"  id="done"  onclick="doit(this)">
                                <label class="form-check-label stroke" for="done">
                                    انجام شده
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</div>

<script>
    var done_text = document.getElementById("done")
    var text_note = document.getElementById("text_note");

    function doit(){
        if(this.done_text.checked == true){
            text_note.className = "card-text mb-3 text_note text-decoration-line-through"

        }
        else {
            text_note.className = "card-text mb-3 "

        }
    }
</script>
<?php

include "footer.php"

?>



