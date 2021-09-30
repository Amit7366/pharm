@extends('auth.dashboards.admins.app')
@section('content')
<div class="widget">
                        <a class="heading">Add Medicine</a>
                        <a class="upload-btn float-end"><span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-arrow-up" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M7.646 5.146a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2z"/>
                              <path d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
                            </svg></span> Import </a>

                            <form class="row g-3 needs-validation mt-1" action="{{route('medicineInsert')}}" method="post" novalidate>
                                @csrf
                              <div class="col-md-4">
                                <label for="validationCustom03" class="form-label">Brand Name</label>
                                <input type="text" class="form-control" name="brand_name" id="validationCustom03" required>
                                <div class="invalid-feedback">
                                  Please input drug brand name.
                                </div>

                              </div>

                                     <div class="col-md-4">
                                     <label for="validationCustom03" class="form-label">Retails Price</label>
                                     <input type="text" class="form-control" name="retail_price" id="validationCustom03" required >
                                        <div class="invalid-feedback">
                                  Please input drug Retails Price.
                                </div>
                                   </div>
                                 <div class="col-md-4">
                                     <label for="validationCustom03" class="form-label">Strength</label>
                                     <input type="text" class="form-control" name="strength" id="validationCustom03" required >
                                     <div class="invalid-feedback">
                                  Please input drug Strength.
                                </div>

                                   </div>
                                     <div class="col-md-2">
                                     <label for="validationCustom03" class="form-label">Pack Size</label>
                                     <input type="text" class="form-control" name="pack_size" id="validationCustom03" required >
                                         <div class="invalid-feedback">
                                  Please input drug Pack Size.
                                </div>
                                 </div>
                                <div class="col-md-2">
                                    <label for="validationCustom03" class="form-label">Doses Description</label>
                                    <input type="text" class="form-control" name="doses" id="validationCustom03" required >
                                    <div class="invalid-feedback">
                                        Please input doses.
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="validationCustom04" class="form-label">Generic Name</label>
                                    <select class="js-example-basic-single" name="generic" id="validationCustom04" required>
                                        <option selected disabled value="">Select Generic Name</option>
                                        @forelse($generic as $generic)
                                        <option value="{{$generic->id}}">{{$generic->gname}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                                    <div class="col-md-4">
                                        <label for="validationCustom03" class="form-label">Name Of Manufacturer</label>
                                     <select class="js-example-basic-single" name="manufacturer" id="validationCustom03" required>
                                         <option selected disabled value="">Select Manufacturer Name</option>
                                         @forelse($menufac as $menufac)
                                             <option value="{{$menufac->id}}">{{$menufac->manu_name}}</option>
                                         @empty
                                         @endforelse
                                     </select>
                                   </div>

                              <div class="col-12">
                                <button class="btn btn-primary" type="submit">Submit</button>
                              </div>
                            </form>
                </div>
@endsection
