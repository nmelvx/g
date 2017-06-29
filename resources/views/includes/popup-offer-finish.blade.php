
<h3>Serviciul din</h3>
<div class="separator-line-div-small"></div>
<p class="text-center info-text date" style="text-transform: capitalize">{{ Helper::formatDate($job->date) }}</p>
<form class="form-popup">
    <h4>1. Review-ul tau</h4>
    <div class="div-padded mb50">
        <div class="ratings">
            <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5" title="Awesome - 5 stars"></label>
            <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4" title="Pretty good - 4 stars"></label>
            <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3" title="Meh - 3 stars"></label>
            <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2" title="Kinda bad - 2 stars"></label>
            <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1" title="Sucks big time - 1 star"></label>
        </div>
    </div>
    <h4>3. Detalii serviciu</h4>
    <div class="div-padded">
        <p class="list-info area">{{ $job->area }} mp</p>
        <p class="list-info duration">{{ Helper::durationFormat($job->total_duration) }}</p>
    </div>

    <h4>4. Ce servicii doriti?</h4>
    <div class="div-padded">
        <ul class="chk-list list-info servicii">
            @foreach($job->services as $service)
            <li><label class="checkbox-custom"><input type="checkbox" disabled checked value="{{ $service->id }}'" name="serivces[]"><span></span>{{ $service->title }}</label></li>
            @endforeach
        </ul>
    </div>
    <div class="div-padded">
        <h3 class="text-center f35" style="margin-top: 40px;">Cost serviciu: <span class="final estimated-price">{{ $job->sum }}</span> lei</h3>
    </div>
    <div class="list-info images">
        @foreach($job->images as $k => $image)
            @if($k+1 == sizeof($job->images))
            <div class="gallery-image-full"><img src="{!! Helper::getImage('640x320', $image->path, 'images') !!}" class="img-responsive"></div>
            @else
            <div class="gallery-image @if($k%3 == 0) last @endif"><img src="{!! Helper::getImage('220x150', $image->path, 'images') !!}" class="img-responsive"></div>
            @endif
        @endforeach
    </div>
</form>
<a href="javascript:void(0);" class="close-popup"></a>
