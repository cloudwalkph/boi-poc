<div class="modal fade" id="offerIdModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <form action="/payments/paypal" method="post">
            {{ csrf_field() }}
            <div class="modal-content">
                <div class="modal-body" style="padding: 0">
                    <img src="/assets/images/offer_id.jpeg" alt="Offer" class="img-responsive">

                    <div class="offer-content">
                        <h5>Avail Alien Certificate of Registration ID <br>
                            <span class="text-primary" style="font-size: 16px">Purchase the new and improved ACR ID</span>
                        </h5>

                        <p>
                            All foreign nationals who are visa holders of Temporary Visitor's Visa or Tourist Visa who
                            have stayed for more than fifty-nine (59) days in the Philippines are required to get the ACR ID.
                        </p>

                        <p>
                            You can add the ACR ID to your online payment to avoid long lines in our authorized offices.
                            This official government ID is now equipped with a RFID which has a unique serial number
                            generated for each registered foreigners. All the information you provide in your online account
                            will be stored in the card which are encrypted and can only be exclusively accessed through
                            our system operated by an authorized personel.
                        </p>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-black btn-block">SKIP</button>
                    </div>
                    <div class="col-md-6">
                        <a href="/schedule-confirmation" class="btn btn-primary btn-block">YES, PURCHASE ACR ID</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>