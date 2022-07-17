
  <!-- delete -->

  <div class="modal" id="SeeMore{{ $task->id }}">

    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header pb-0 border-0 justify-content-end">
                <div class="btn btn-sm btn-icon btn-active-color-primary">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                transform="rotate(-45 6 17.3137)" fill="black">
                                    </rect>
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                fill="black">
                            </rect>
                            </svg>
                        </span>
                    </div>
                </div>

            </div>

            <div class="modal-body">
                <input type="hidden" name="id" id="id" value="">
                <textarea name="desc" class="form-control form-control-solid" id="desc" cols="20" rows="20">{{ $task->desc }}</textarea>
            </div>
    </div>
</div>

{{-- End modal delete  --}}
