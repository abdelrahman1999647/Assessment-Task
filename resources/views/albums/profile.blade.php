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
                <h4 class="content-title mb-0 my-auto">Pictures</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"></span>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-xl-3 mg-t-20 mg-xl-t-0">
            <a class="modal-effect btn btn-primary-gradient btn-block" data-effect="effect-newspaper" style="color: white; font-weight:bold" data-toggle="modal" href="#modaldemo8">Add Photo to {{$album->album_name}}</a>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <div class="row row-sm">
            @foreach ($album->pictures as $pic)
                <div class="col-sm-4">
                    <div class="border p-5 card thumb">
                        <a href="{{ url('public/Image/pictures/'.$pic->picture) }}" target="_blank" class="image-popup" title="{{$pic->picture_name}}">
                            <img src="{{ url('public/Image/pictures/'.$pic->picture) }}" style="height: 290px; width: 450px;" class="thumb-img" alt="work-thumbnail">
                        </a>
                        <h4 class="text-center tx-14 mt-3 mb-0">{{$pic->picture_name}}</h4>
                        <div class="ga-border"></div>
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
                    <h6 class="modal-title">Add Photo to {{$album->album_name}}</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('pictures.store') }}" method="post"
                          enctype="multipart/form-data" autocomplete="off">
                        {{ csrf_field() }}
                        {{-- 1 --}}
                        <input type="hidden" class="form-control" id="album_id" name="album_id"
                               value="{{ $album->id }}">
                        <div class="row">
                            <div class="col">
                                <label for="" class="control-label">Name</label>
                                <input type="text" class="form-control" id="picture_name" name="picture_name">
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
