                
<div class="modal fade" id="edit_task_rate_{{$i}}" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="black" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <!--begin:Form-->
                <form action="{{route('task.rate', $task->id)}}" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework">

                    @csrf

                    <div class="modal-body">
                        @foreach($task->users as $task_user)
                            <h3>{{$task_user->name}}</h3>
                            <div class="row">
                                <input type="hidden" name="rate_task[user_id][]" value="{{$task_user->pivot->user_id}}">
                                <div class="form-group">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="required">
                                        {{ __('admin.desc') }}
                                        </span>
                                    </label>
                                    <textarea name="rate_task[desc][]" class="form-control form-control-solid"  placeholder="Enter Rate desc" rows="3">{{$task_user->pivot->desc}}</textarea>

                                </div>

                                <div class="form-group">
                                    <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                        <span class="required">
                                            {{ __('admin.rate') }}
                                        </span>
                                    </label>
                                    <input type="number" class="form-control form-control-solid" name="rate_task[rate][]" value="{{$task_user->pivot->rate}}" max="10.0"  step=".1">
                                    <span class="form-text text-muted">Rate should be from 0.0 to 10.0</span>

                                </div>


                            </div>
                        @endforeach

                    </div>
                    <div class="modal-footer border-top-0 d-flex justify-content-center">
                    <button type="submit" class="btn btn-success">{{ __('admin.submit') }}</button>
                    </div>
                </form>
                <!--end:Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
