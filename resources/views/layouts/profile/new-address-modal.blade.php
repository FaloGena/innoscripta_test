<!-- Login Modal -->
<div class="modal fade" id="newAddressModal" tabindex="-1" role="dialog" aria-labelledby="newAddressModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newAddressModalLabel">Add new address</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/profile" method="POST" class="newAddress-form">
                {{csrf_field()}}
                <div class="modal-body row">
                    <div class="col-lg-12">
                        <label for="inputName" class="sr-only">Name of address (only for you)</label>
                        <input type="text" name="name" id="inputName" class="form-control"
                               placeholder="Name of address (only for you) *" required autofocus>
                    </div>
                    <div class="col-lg-6">
                        <label for="inputStreet" class="sr-only">Street</label>
                        <input type="text" name="street" id="inputPassword" class="form-control"
                               placeholder="Street *" required>

                        <label for="inputFloor" class="sr-only">Floor</label>
                        <input type="number" name="floor" id="inputFloor" class="form-control" placeholder="Floor *">
                    </div>
                    <div class="col-lg-6">
                        <label for="inputHouse" class="sr-only">House</label>
                        <input type="text" name="house" id="inputHouse" class="form-control" placeholder="House *"
                               required>

                        <label for="inputApartment" class="sr-only">Apartment</label>
                        <input type="number" name="apartment" id="inputApartment" class="form-control" placeholder="Apartment *">
                    </div>
                    <div class="col-lg-12">
                        <label for="inputComment" class="sr-only">Comment</label>
                        <input type="text" name="comment" id="inputComment" class="form-control"
                               placeholder="Comment">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-lg btn-primary btn-block" type="submit">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>
