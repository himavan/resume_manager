</div>
    <footer class="mdl-mini-footer">
  <div class="mdl-mini-footer__left-section">
    <div class="mdl-logo">Resume Manager</div>
    <ul class="mdl-mini-footer__link-list">
      <li><a href="https://github.com/himavan">Himavan &copy; 2018 </a></li>
      <li><a href="#">Use only for educational purpose</a></li>
    </ul>
  </div>
</footer>
      </main>
    </div>
		<script>
    MaterialTextfield.prototype.checkValidity = function () {
    var CLASS_VALIDITY_INIT = "validity-init";        
    if (this.input_ && this.input_.validity && this.input_.validity.valid) {
        this.element_.classList.remove(this.CssClasses_.IS_INVALID);
    } else {

        if (this.input_ && this.input_.value.length > 0) {
            this.element_.classList.add(this.CssClasses_.IS_INVALID);
        }
        else if(this.input_ && this.input_.value.length === 0)
        {
            if(this.input_.classList.contains(CLASS_VALIDITY_INIT))
            {
                this.element_.classList.add(this.CssClasses_.IS_INVALID);
            }
        }


    }

    if(this.input_.length && !this.input_.classList.contains(CLASS_VALIDITY_INIT))
    {
        this.input_.classList.add(CLASS_VALIDITY_INIT);
    }
};
    </script>
</body>
</html>