<div class="popup-content popup-offer-detail" style="display: none;">
    <h3>Rezervare</h3>
    <div class="separator-line-div-small"></div>
    <p class="text-center info-text date">Detalii servicii programate</p>
    <form action="" method="post" class="form-popup form-offer-calendar">
        <h4>1. Data și ora</h4>
        <div class="div-padded">
            <div class="row">
                <div class="col-100 paddr10">
                    <p class="list-info date"></p>
                    <p class="list-info time"></p>
                </div>
            </div>
        </div>
        <h4>2. Detalii echipa</h4>
        <div class="div-padded">
            <p class="list-info team-leader"></p>
            <p class="list-info contact-phone"></p>
        </div>
        <h4>3. Detalii serviciu</h4>
        <div class="div-padded">
            <p class="list-info area"></p>
            <p class="list-info duration"></p>
        </div>

        <h4>4. Ce servicii doriti?</h4>
        <div class="div-padded">
            <ul class="chk-list list-info servicii">
            </ul>
        </div>
        <div class="div-padded">
            <h3 class="text-center f35" style="margin-top: 40px;">Cost serviciu: <span class="final estimated-price">0</span> lei</h3>
        </div>
    </form>
    @if($job->payed == 0)
        <a href="javascript:void(0);" class="green-button submit-form" id="payOffer">Plateste</a>
    @endif
    <a href="javascript:void(0);" class="close-popup"></a>
</div>