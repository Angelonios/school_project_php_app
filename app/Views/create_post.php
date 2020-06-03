<div class="container">
    <div class="row">
        <div class="col-12 col-sm-12 mt-5 pt-3 pb-3 bg-white from-wrapper code_form">
            <div class="container">
                <h3>Code Post</h3>
                <hr>
                <form action="<?php echo base_url(); ?>/timeline/code_post" method="post">
                    <div class="row">
                        <div class="col-12 col-sm-12 p-1">
                            <h4>Code</h4><?php echo (isset($validation) && $validation->hasError('code')) ? '<div class="text-center"><label class="alert-danger alert p-0">'.$validation->getError('code').'</label></div>' : ''; ?>
                            <div class="form-group" data-toggle="tooltip" data-placement="right"
                                 title="Format your code to get better rating!">
                                <textarea class="form-control" id="editor" name="code"><?= set_value('code') ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 p-1">
                            <h4>Description</h4><?php echo (isset($validation) && $validation->hasError('description')) ? '<div class="text-center"><label class="alert-danger alert p-0">'.$validation->getError('description').'</label></div>' : ''; ?>
                            <div>
                                <textarea class="form-control" id="description" name="description" rows="3" required
                                          placeholder="Describe briefly code above.&#10;For example describe a task and how the code fulfills it."><?= set_value('description') ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-auto p-1">
                            <select class="form-group selectpicker w-100" data-live-search="true" id="category" name="category" required>
                                <option value="">Pick a category</option>
                                <?php
                                    foreach ($categories as $category){
                                        echo '<option value="'.$category['name'].'">'.$category['name'].'</option>';
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="col-auto p-1">
                            <select class="form-group selectpicker w-100" data-live-search="true" id="language" name="language" required>
                                <option value="">Pick a language</option>
                                <?php
                                    foreach ($languages as $language){
                                        echo '<option value="'.$language['codemirror_mode'].'">'.$language['name'].'</option>';
                                    }
                                ?>
                            </select>

                        </div>
                        <div class="col-4 col-sm-12 p-1">
                            <button type="submit" class="btn btn-dark w-100">Post</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    const editor = CodeMirror.fromTextArea(document.getElementById("editor"), {
        mode: "xml",
        theme: "dracula",
        lineNumbers: true
    });

    $( "#language" ).change(function() {
        editor.setOption("mode", $("#language").val());
    });
</script>