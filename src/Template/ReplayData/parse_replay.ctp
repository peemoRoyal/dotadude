<!-- <div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>Le Replay-Uploader</h1>

            <?php
            function renderInputs($view) {
                echo $view->Form->input('parse-replay', ['type' => 'hidden']);
                echo $view->CkTools->formButtons();
            }
            ?>

            <fieldset>
            <legend>Upload below</legend>
                <?php
                echo $this->Form->create(null, [
                    'type' => 'text',
                    'url' => 'ReplayData/parse-replay'
                ]);
                renderInputs($this);
                echo $this->Form->end();
                ?>
            </fieldset>

        </div>
    </div>
</div> -->

