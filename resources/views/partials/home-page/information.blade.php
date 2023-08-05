<section class="information" id="information">
    <div class="container">
        @foreach($information as $info)
            <div class="row">
                <div class="col-md-6 col-12">{!! $info->description !!}</div>
                <div class="col-md-6 col-12 media-column">
                    @if(!empty($info->media))
                        {!! $info->media !!}
                    @endif
                </div>
            </div>
        @endforeach
    </div>
</section>
