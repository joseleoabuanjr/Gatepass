<div class="d-flex flex-column justify-content-center align-items-center" style="height: 100vh;">
    <form class="border rounded-3" method="post" action="function/toRequest.php?id=<?php echo ("$id"); ?>" enctype="multipart/form-data" style="width: 400px; padding:20px">
        <h1 style="margin-bottom: 20px;">Appointment Request</h1>
        <div class="form-floating"  style="margin-bottom: 10px;">
			<input type="date" name="date" id="date1" class="form-control">
			<label>Date of Appointment:</label>
		<div class="msg" id="msguser"></div>
		</div>
        <div class="form-floating">
            <select class="form-select" name="purpose" id="purpose-s">
                <option selected disabled>Select purpose</option>
                <option value="Request of Transcript of Records (TOR)">Request of Transcript of Records (TOR)</option>
                <option value="Claiming of Graduation Picture">Claiming of Graduation Picture</option>
                <option value="Request of Form 137">Request of Form 137</option>
                <option value="Request of Good Moral Certificate">Request of Good Moral Certificate</option>
                <option value="Request for Dry Seal">Request for Dry Seal</option>
                <option value="Payment">Payment</option>
                <option value="Inquiries">Inquiries</option>
                <option value="Other">Other</option>
            </select>
            <label for="floatingSelect">Purpose of Visit:</label>
        </div>
        <div class="cont-p--hidden" id="txt-1" style="margin-top: 10px;">
        <div class="form-floating">
            <textarea class="form-control" name="reason" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Other</label>
        </div>
        </div>
        <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="reg1" style=" width:100%; margin-top: 20px;">Submit Request</button>
        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
            </div>
        </div>
        </div>
    </form>
    
</div>