@if(App\Models\member::where("status", 1)->count() > 0)
<div class="row">
    @foreach(App\Models\member::where("status", 1)->orderby("priority", "ASC")->get() as $memberData)
    <div class="col-sm-12">
        <div class="montri-area">
            <div class="montri-item">
                <p class="montri-title">{{$memberData->designation}}</p>
                <div class="montri-img">
                    <a href="{{ route('sidebar.details',$memberData->slug) }}">
                        <img src="{{asset($memberData->image)}}" alt="{{$memberData->name}}" />
                    </a>
                </div>
                <p class="montri-name">{{$memberData->name}}</p>
                <a class="details-button" title="বিস্তারিত" href="{{ route('sidebar.details',$memberData->slug) }}">
                    বিস্তারিত
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif
<div class="row">
    <div class="col-sm-12 col-lg-12">
        <div class="notice-important">

            @if(App\Models\sidelinktitle::where("status", 1)->count() > 0)
            @foreach(App\Models\sidelinktitle::orderby("priority", "ASC")->where("status", 1)->get() as $imdata)
            <div class="important-notice-item">
                <h4>{{$imdata->name}}</h4>


                @if(App\Models\sideimage::where("status", 1)->where("sltid", $imdata->id)->count() > 0)

                @php
                $sidebarImage = App\Models\sideimage::where("status", 1)->where("sltid", $imdata->id)->first();
                @endphp

                @if($sidebarImage->link == null)
                <div class="important-notice-item">
                    <img alt="Image" src="{{asset($sidebarImage->image)}}" />
                </div>
                @else

                <div class="important-notice-item">
                    <a href="{{$sidebarImage->link}}">
                        <img alt="Image" src="{{asset($sidebarImage->image)}}" />
                    </a>
                </div>

                @endif

                @else
                <ul>
                    @foreach($imdata->sidelink as $lidata)

                    <li>
                        <a href="{{$lidata->targetlink}}" target="@if($lidata->linkstatus == 1) _blank  @endif">
                            {{$lidata->name}}
                        </a>
                    </li>
                    @endforeach
                </ul>
                @endif

            </div>
            @endforeach
            @endif



            @if(isset($setting->emimage) && $setting->emimage !=null)
            <div class="important-notice-item">
                <h4>জরুরী হটলাইন</h4>
                <img src="{{isset($setting->emimage) ? $setting->emimage : ''}}" alt="জরুরী হটলাইন" />
            </div>
            @endif


            @if(isset($setting->likepage) && $setting->likepage != null)
            <div class="important-notice-item">
                <h4>Like Our Facebook Page</h4>
                {{isset($setting->likepage) ? $setting->likepage : ''}}
            </div>
            @endif
        </div>
    </div>
</div>