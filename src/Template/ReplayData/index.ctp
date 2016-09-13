<div class="container">
    <div class="row">
        <div class="col-lg-12"
        style=
        "width:370px;
        border:1px solid gray;
        border-radius:5px;
        padding:20px;
        padding-top:10px;
        margin-top:20px;
        "

        >
            <h1>Upload your replay</h1>
            <fieldset>
                <?php
                echo $this->Form->create(null, [
                    'type' => 'file',
                    'url' => 'ReplayData/index',
                ],[
                    'class' => 'form-group'
                ]);
                echo $this->Form->input('replay_file', [
                    'label' => 'Choose your .dem file:',
                    'type' => 'file',
                ]);
                echo $this->Form->button('Upload replay file',[
                    'class' => 'btn btn-primary btn-block'
                ]);

                echo $this->Form->end();
                ?>
            </fieldset>

        </div>
    </div>
</div>

