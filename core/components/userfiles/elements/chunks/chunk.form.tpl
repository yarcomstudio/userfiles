<div class="userfiles-form-wrapper">
    <form class="well create userfiles-form userfiles-dropzone" id="[[+propkey]]" method="post" action=""
          data-max-filesize="1" data-max-files="2" data-clickable=".userfiles-form-clickable-[[+propkey]]" >

        <div class="dz-message needsclick">
            [[%userfiles_msg_needsclick]]<br>
            <span class="note needsclick">[[%userfiles_msg_note_needsclick]]</span>
        </div>


        <div class="userfiles-form-files">
            [[+files]]
        </div>

    </form>

    <a class="userfiles-form-clickable userfiles-form-clickable-[[+propkey]]">[[%userfiles_msg_select_files]]</a>

</div>