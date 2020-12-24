
    <!-- Start Footer Top Area -->
    <footer class="footer-top-area">
        <div class="container footer-inner">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="footer-widget">
                        <h3>Find Us</h3>

                        <ul class="address">
                           @if(!empty($address) &&  $address->address_datas != '')
                                @php
                                $address_datas = json_decode($address->address_datas); 
                                @endphp
                                    @foreach($address_datas as $key =>  $datas) 
                                            @php
                                            $da = explode('|##|', $datas) 
                                            @endphp
                                             <li class="location">
                                                <i class="{{ $da[0] }}"></i> {{ $da[1] }} 
                                            </li>
                                    @endforeach
                            @else 
                            <li>Data not found!</li>
                             @endif 
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <div class="footer-widget">
                        <h3>Useful links</h3>

                        <ul class="link">
                          @foreach($pages as $page)
                                @if($page->type == 'footer')
                                <li>
                                    <a href="{{ route('page', $page->slug) }}">
                                        {{ $page->title }}
                                    </a>
                                </li> 
                                @else
                                    not found!
                                @endif
                            @endforeach 
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <div class="footer-widget">
                        <h3>Follow Us</h3>

                        <ul class="link">
                          @if(!empty($address) && $address->social_datas != "") 
                                            @php
                                             $socials = json_decode($address->social_datas); 
                                            @endphp
                                                @foreach($socials as $key =>  $datas)
                                                    @foreach($datas as $key => $data) 
                                                              <li><a href="{{ $data }}">{{ $key }}</a></li>
                                                    @endforeach
                                                @endforeach
                                        @else
                            <li>Data not found!</li>
                             @endif  
                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </footer>
    <!-- End Footer Top Area -->