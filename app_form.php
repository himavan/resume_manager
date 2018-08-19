<form method="post" action="app_form.php">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width:500px">
            <label class="mdl-textfield__label" for="gender">Application Status:</label>
            <label style="margin-left: 110px;" class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-1">
                <input type="radio" id="option-1" class="mdl-radio__button" name="as" value="All" <?php if($as=='') echo "checked"; ?>>
                <span class="mdl-radio__label">All</span>
            </label>
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-2">
                <input type="radio" id="option-2" class="mdl-radio__button" name="as" value="Accepted" <?php if($as=='Accepted') echo "checked"; ?> >
                <span class="mdl-radio__label">Accepted</span>
            </label>
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-3">
                <input type="radio" id="option-3" class="mdl-radio__button" name="as" value="Rejected" <?php if($as=='Rejected') echo "checked"; ?> >
                <span class="mdl-radio__label">Rejected</span>
            </label>
            <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="option-4">
                <input type="radio" id="option-4" class="mdl-radio__button" name="as" value="Pending" <?php if($as=='Pending') echo "checked"; ?> >
                <span class="mdl-radio__label">Pending</span>
            </label>
            <button class="mdl-button mdl-button--colored mdl-button--raised" type="submit" name="app_form" style="font-size:10px;margin-left:20px;">Filter</button>
        </div>
</form>