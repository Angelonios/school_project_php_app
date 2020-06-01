<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12 mt-5 pt-3 pb-3 bg-white from-wrapper code_form">
            <div class="container">
                <h3>Code Post</h3>
                <hr>
                <form action="<?php echo base_url(); ?>/timeline/code_post" method="post">
                    <div class="row">
                        <div class="col-12 col-sm-12 p-1">
                            <h4>Code</h4>
                            <div class="form-group" data-toggle="tooltip" data-placement="right"
                                 title="Format your code to get better rating!">
                                <textarea class="form-control" id="editor" name="editor" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 p-1">
                            <h4>Description</h4>
                            <div>
                                <textarea class="form-control" id="description" name="description" rows="3" required
                                          placeholder="Describe briefly code above.&#10;For example describe a task and how the code fulfills it."></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6 col-sm-6 p-1">
                            <select class="form-group selectpicker w-100" data-live-search="true" id="description" name="description" required>
                                <option value="">Pick a category</option>
                                <?php
                                $category = "Advent of Code 200";
                                $keyword = "AoC200";
                                for($i = 0; $i < 5; $i++)
                                {
                                    echo '<option value="'.$keyword.$i.'">'.$category.$i.'</option>';
                                }
                                ?>
                            </select>

                        </div>
                        <div class="col-6 col-sm-6 p-1">
                            <button type="submit" class="btn btn-dark w-100">Post</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    editor = CodeMirror.fromTextArea(document.getElementById("editor"), {
        mode: "xml",
        mode: "javascript",
        mode: "clike",
        theme: "dracula",
        lineNumbers: true
    });
</script>