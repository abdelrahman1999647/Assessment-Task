@extends('layouts.master')
@section('css')
    <link href="{{ URL::asset('assets/plugins/teeth/style.css') }}" rel="stylesheet">
    <link href="{{URL::asset('assets/plugins/gallery/gallery.css')}}" rel="stylesheet">
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Albums</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-xl-3 mg-t-20 mg-xl-t-0">
            <a class="modal-effect btn btn-primary-gradient btn-block" data-effect="effect-newspaper" style="color: white; font-weight:bold" data-toggle="modal" href="#modaldemo8">New Album</a>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <div class="row row-sm">
        @foreach($albums as $album)
            <div class="col-sm-4">
                <div class="card-body">
                    <div class="border p-5 card thumb">
                        <a href="{{ url('album-profile') }}/{{ $album->id }}" target="_blank" class="image-popup" title="{{$album->album_name}}">
                            <img src="{{ url('public/Image/albums/'.$album->picture) }}" style="height: 290px; width: 450px;" class="thumb-img" alt="work-thumbnail">
                        </a>
                        <h4 class="text-center tx-14 mt-3 mb-0">{{$album->album_name}}</h4>
                        <div class="ga-border row row-sm">
                            <a class="modal-effect btn btn-success btn-block" style="color: white; font-weight:bold; width: 120px" data-effect="effect-newspaper"  data-toggle="modal" href="#modaldemo9{{ $album->id }}">Edit</a>
                            <a class="modal-effect btn btn-danger btn-block" style="color: white; font-weight:bold; width: 120px" data-effect="effect-newspaper"  data-toggle="modal" href="#modaldemo10{{ $album->id }}">Delete</a>
                        </div>
                    </div>
                </div>
                <div class="modal" id="modaldemo9{{ $album->id }}">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content modal-content-demo">
                            <div class="modal-header">
                                <h6 class="modal-title">Add Album</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('update-album', $album->id) }}" method="post"
                                      enctype="multipart/form-data" autocomplete="off">
                                    {{ csrf_field() }}
                                    {{-- 1 --}}
                                    <input type="hidden" name="id" id="id"
                                           value="{{ $album->id }}">
                                    <div class="row">
                                        <div class="col">
                                            <label for="patient_id" class="control-label">Name</label>
                                            <input type="text" class="form-control" id="album_name" name="album_name">
                                        </div>
                                    </div><br>
                                    <div class="row">
                                        <div class="col">
                                            <label for="" class="control-label">Picture</label>
                                            <input type="file" class="form-control" required name="picture">
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn ripple btn-primary" type="submit">حفظ البيانات</button>
                                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إغلاق</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal" id="modaldemo10{{ $album->id }}">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content modal-content-demo">
                            <div class="modal-header">
                                <h6 class="modal-title">Add Album</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('albums.destroy', $album->id) }}" method="post"
                                      enctype="multipart/form-data" autocomplete="off">
                                    {{ method_field('delete') }}
                                    {{ csrf_field() }}
                                    {{-- 1 --}}
                                    <p>هل انت متاكد من عملية الحذف ؟</p><br>
                                    <p>سيتم حف جميع الصور داخل الالبوم</p><br>

                                    <input type="hidden" name="id" id="id"
                                           value="{{ $album->id }}">
                            </div>
                            <div class="modal-footer">
                                <button class="btn ripple btn-primary" type="submit">حفظ البيانات</button>
                                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إغلاق</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        @endforeach
    </div>
    </div>

    </div>

    </div>

    <div class="modal" id="modaldemo8">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Add Album</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('albums.store') }}" method="post"
                          enctype="multipart/form-data" autocomplete="off">
                        {{ csrf_field() }}
                        {{-- 1 --}}

                        <div class="row">
                            <div class="col">
                                <label for="patient_id" class="control-label">Name</label>
                                <input type="text" class="form-control" id="album_name" name="album_name">
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <label for="" class="control-label">Picture</label>
                                <input type="file" class="form-control" required name="picture">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn ripple btn-primary" type="submit">حفظ البيانات</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">إغلاق</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
    <!-- Internal Gallery js -->
    <script src="{{URL::asset('assets/plugins/gallery/lightgallery-all.min.js')}}"></script>
    <script src="{{URL::asset('assets/plugins/gallery/jquery.mousewheel.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/gallery.js')}}"></script>
@endsection
