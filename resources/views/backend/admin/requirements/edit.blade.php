<div class="modal fade" id="Edit{{ $requirement->id }}" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">

        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header" id="kt_modal_create_api_key_header">
                <!--begin::Modal title-->
                <h2>{{ __('admin.edit_requirement') }}</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">

                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Form-->

            <form action="{{ route('requirment.changStatus' , $requirement->id) }}" method="POST" class="form fv-plugins-bootstrap5 fv-plugins-framework" >
                @method('PUT')
                @csrf
                <!--begin::Modal body-->
                <div class="modal-body py-10 px-lg-17">
                    <!--begin::Scroll-->
                    <div class="scroll-y me-n7 pe-7" id="kt_modal_create_api_key_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_create_api_key_header" data-kt-scroll-wrappers="#kt_modal_create_api_key_scroll" data-kt-scroll-offset="300px">
                        <!--begin::Notice-->


                        <div class="mb-5 fv-row">

                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="required">
                                    {{ __('admin.name') }}
                                </span>
                            </label>
                            <input type="text"  name="name" value="{{ old('name' , $requirement->name) }}" class="form-control form-control-solid" placeholder="Enter name" >

                        </div>


                        <!--begin::Input group-->
                        <div class="d-flex flex-column mb-10 fv-row">

                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                <span class="required">
                                    {{ __('admin.status') }}
                                </span>
                            </label>

                            <select name="status" id="status" class="form-control">
                                <option value="{{ $requirement->status }}">{{ $requirement->status }}</option>
                                <option value=""> -- choose -- </option>
                                <option value="waiting">waiting</option>
                                <option value="rejected">rejected</option>
                                <option value="approve">approve</option>

                            </select>
                            @error('status') <span class="text-danger">{{ $message }}</span>  @enderror
                        </div>



                    </div>
                    <!--end::Scroll-->
                </div>
                <!--end::Modal body-->
                <!--begin::Modal footer-->
                <div class="modal-footer flex-center">

                    <button type="submit" id="kt_modal_create_api_key_submit" class="btn btn-primary">
                        <span class="indicator-label">Submit</span>
                        <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <!--end::Button-->
                </div>
                <!--end::Modal footer-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
