<div class="modal fade" id="excel" tabindex="-1" role="dialog" aria-labelledby="plusLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="plusLabel">Tarikh</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('excel') }}" method="GET">
                    <div class="row">
                        <div class="col">
                            <input type="date" name="checkdate" id="checkdate" class="form-control">
                            <br>
                            <button type="submit" class="btn btn-primary btn-block"> Cari</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>