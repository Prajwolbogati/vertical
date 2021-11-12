@extends("layouts.app")
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@section('wrapper')
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Services</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Add New</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <!--end breadcrumb-->
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-pills mb-3" role="tablist">
                                @foreach ($template as $key=>$temp)
                                @if($key == 0)
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="pill" href="#primary-pills-home" role="tab"
                                        aria-selected="true">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i
                                                    class='fadeIn animated bx bx-chevron-down-circle font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">{{ $temp->tempname }}</div>
                                        </div>
                                    </a>
                                </li>
                                @endif
                                @endforeach
                                @foreach ($template as $key=>$temp)
                                @if($key > 0 && $key < 5)
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-profile" role="tab"
                                        aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon"><i
                                                    class='fadeIn animated bx bx-chevron-down-circle font-18 me-1'></i>
                                            </div>
                                            <div class="tab-title">{{ $temp->tempname }}</div>
                                        </div>
                                    </a>
                                </li>
                                @endif
                                @endforeach
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                @foreach ($template as $key=>$temp)
                                @if($key == 0)
                                <div class="tab-pane fade show active" id="primary-pills-home" role="tabpanel">
                                    <div class="col-xl-9 mx-auto">
                                        @if (Session::has('message'))
                                            <script>
                                                swal({
                                                    title: "Template updated successfully!",
                                                    icon: "success",
                                                    timer: 1000,
                                                    showConfirmButton: true
                                                });
                                            </script>
                                        @endif
                                        <div class="card border-top border-0 border-4 border-info">
                                            <div class="card-body">
                                                <div class="border p-4 rounded">
                                                    <form class="row g-3" method="post"
                                                    action="{{ url('addtemplate') }}">
                                                    {{ csrf_field() }}
                                                    <div class="card-title d-flex align-items-center">
                                                        <input type="text" class="mb-0 text-info now" name="tempname" value="{{ $temp->tempname }}">
                                                    </div>
                                                    <hr />
                                                    <div class="row mb-3">
                                                        <div class="col-sm-12">
                                                    <textarea class="form-control" id="summernotes" name="template" rows="8" >
                                                        <pre>{{ $temp->template }}</pre>
                                                    </textarea>
                                                    @error('stype_id')
                                                    <div class="alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                                    <div class="row">
                                                        <label class="col-sm-3 col-form-label"></label>
                                                        <div class="col-sm-9">
                                                            <button type="submit"
                                                                class="btn btn-info px-5">Submit</button>
                                                        </div>
                                                    </div>  
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                                @foreach ($template as $key=>$temp)
                                @if($key > 0 && $key < 5)
                                <div class="tab-pane fade" id="primary-pills-profile" role="tabpanel">
                                    <div class="col-xl-9 mx-auto">
                                        @if (Session::has('message'))
                                            <script>
                                                swal({
                                                    title: "Template updated successfully!,
                                                    icon: "success",
                                                    timer: 1000,
                                                    showConfirmButton: true
                                                });
                                            </script>
                                        @endif
                                        <div class="card border-top border-0 border-4 border-info">
                                            <div class="card-body">
                                                <div class="border p-4 rounded">
                                                    <form class="row g-3" method="post"
                                                    action="{{ url('addtemplate') }}">
                                                    {{ csrf_field() }}
                                                    <div class="card-title d-flex align-items-center">
                                                        <input type="text" class="mb-0 text-info now" name="tempname" value="{{ $temp->tempname }}">
                                                    </div>
                                                    <hr />
                                                    <div class="row mb-3">
                                                        <div class="col-sm-12">
                                                    <textarea class="form-control" id="summernote" name="template" rows="8">
                                                       <pre> {{ $temp->template }}</pre>
                                                    </textarea>
                                                    @error('stype_id')
                                                    <div class="alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                                    <div class="row">
                                                        <label class="col-sm-3 col-form-label"></label>
                                                        <div class="col-sm-9">
                                                            <button type="submit"
                                                                class="btn btn-info px-5">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
    $('#summernote').summernote({
      placeholder: '',
      tabsize: 2,
      height: 100,
      toolbar: [
// [groupName, [list of button]]
['style', ['bold', 'italic', 'underline', 'clear']],
['font', ['strikethrough', 'superscript', 'subscript']],
['fontsize', ['fontsize']],
['color', ['color']],
['para', ['ul', 'ol', 'paragraph']],
['height', ['height']]
]
    });
  </script>
  <script>
    $('#summernotes').summernote({
      placeholder: '',
      tabsize: 2,
      height: 100,
      toolbar: [
// [groupName, [list of button]]
['style', ['bold', 'italic', 'underline', 'clear']],
['font', ['strikethrough', 'superscript', 'subscript']],
['fontsize', ['fontsize']],
['color', ['color']],
['para', ['ul', 'ol', 'paragraph']],
['height', ['height']]
]
    });
  </script>
@endsection