@extends('admin.layouts.app')
@section('title')
    Update social and Address information
@endsection 
@section('content')
<div class="content">
    <form action="{{ route('socialinfo.update') }}" method="post" enctype="multipart/form-data" class="form-horizontal"> 
    @csrf
        <div class="row">
            <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                        Social infos
                        </div>
                        <div class="card-body card-block"> 
                            <input type="hidden" name="id" value="{{ $social_info ? $social_info->id : '' }}"/>
                             <div class="form-group pb-3">
                                <div class="d-flex justify-content-between pb-2">
                                    <label for="image" class=" form-control-label">Social</label>
                                    <button type="button" class="btn btn-sm btn-info add-new-social"><i class="fa fa-plus"></i></button>
                                </div>
                                <div class="social">
                                    <div class="list-group">
                                        @if(!empty($social_info) && $social_info->social_datas != "") 
                                            @php
                                             $socials = json_decode($social_info->social_datas); 
                                            @endphp
                                                @foreach($socials as $key =>  $datas)
                                                    @foreach($datas as $key => $data) 
                                                        <div class="list-group-item d-flex align-items-center">
                                                            <div class="px-1">
                                                                <input value="{{ $key }}" type="text" name="icon[]" placeholder="Social icon name" class="form-control">
                                                            </div>
                                                            <div class="px-1">
                                                                <input value="{{ $data }}" type="text" name="link[]"  placeholder="Social Link"  class="form-control">
                                                            </div>
                                                            <div class="feature__trash bg-danger text-white p-2"><i class="fa fa-trash"></i></div>
                                                        </div>
                                                    @endforeach
                                                @endforeach
                                        @else
                                        <div class="list-group-item d-flex align-items-center">
                                            <div class="px-1">
                                                <input type="text" name="icon[]" placeholder="Social icon name" class="form-control">
                                            </div>
                                            <div class="px-1">
                                                <input type="text" name="link[]"  placeholder="Social Link"  class="form-control">
                                            </div>
                                            <div class="feature__trash bg-danger text-white p-2"><i class="fa fa-trash"></i></div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>  
                        </div> 
                    </div> 
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        Address info
                    </div>
                    <div class="card-body card-block">   
                        <div class="form-group pb-3">
                            <div class="d-flex justify-content-between pb-2">
                            <label for="image" class=" form-control-label"> Address info </label>
                            <button type="button" class="btn btn-sm btn-success add-new-address"><i class="fa fa-plus"></i></button>
                            </div>
                            <div class="address">
                                <div class="list-group">
                                        @if(!empty($social_info) &&  $social_info->address_datas != '')
 @php
                                              $address_datas = json_decode($social_info->address_datas); 
                                            @endphp
                                                @foreach($address_datas as $key =>  $datas) 
                                                     @php
                                                      $da = explode('|##|', $datas) 
                                                     @endphp
                                                    <div class="list-group-item d-flex align-items-center">
                                                        <div class="pr-2" style="flex: 1">
                                                                <div class="py-1">
                                                                    <input value="{{ $da[0]  }}" type="text" name="address_icon[]" placeholder="Enter icon name" class="form-control">
                                                                </div> 
                                                                <div class="py-1">
                                                                    <textarea  name="address_details[]" id="" cols="30" rows="2" class="form-control" placeholder="Enter details">{{ $da[1] }}</textarea>
                                                                </div> 
                                                        </div>
                                                            <div class="feature__trash bg-danger text-white p-2"><i class="fa fa-trash"></i></div>
                                                        </div> 
                                                @endforeach
                                        @else
                                    <div class="list-group-item d-flex align-items-center">
                                       <div class="pr-2" style="flex: 1">
                                            <div class="py-1">
                                                <input type="text" name="address_icon[]" placeholder="Enter icon name" class="form-control">
                                            </div> 
                                            <div class="py-1">
                                                <textarea name="address_details[]" id="" cols="30" rows="2" class="form-control" placeholder="Enter short details"></textarea>
                                            </div> 
                                       </div>
                                        <div class="feature__trash bg-danger text-white p-2"><i class="fa fa-trash"></i></div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>   
                    </div> 
                </div>  
            </div>
        </div>
             <div class="card">
            <div class="card-body d-flex justify-content-center">
              <button type="submit" class="btn btn-info">Update</button>
            </div>
        </div>
    </form>
</div>
@endsection
