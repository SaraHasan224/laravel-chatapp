<!-- Large modal -->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dynamic-title">@yield('modal-title')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="modal-loader" style="text-align: center; margin-left: 40%; margin-right: 40%;  margin-top: 10%; margin-bottom: 10%;">
                    <div class="loader-wrapper d-flex justify-content-center align-items-center">
                        <div class="loader">
                            <div class="ball-clip-rotate">
                                <div></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content will be load here -->
                <div id="dynamic-content"></div>
            </div>
            <div class="modal-footer" id="dynamic-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>