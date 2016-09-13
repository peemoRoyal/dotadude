<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>Le replayuploader</h1>

            <?php
            $this->TinyMce->includeAssets();
            function renderInputs($view) {
                echo $view->Form->input('data', ['type' => 'file']);
                echo $view->CkTools->formButtons();
            }
            ?>

            <fieldset>
            <legend>Upload below</legend>
                <?php
                echo $this->Form->create('ReplayData', [
                    'type' => 'file',
                ]);
                renderInputs($this);
                echo $this->Form->end();
                ?>
            </fieldset>

        </div>
    </div>
</div>
