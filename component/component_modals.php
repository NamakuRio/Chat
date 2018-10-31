
<!-- Modal Tambah Kontak -->
<div id="modal-tambah-kontak" class="modal" aria-hidden="true" style="background-color: #2c2e2f80">
	<div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
        	<div class="wrap-loading-modals">
        		<div class="loading-modals">
        			<div></div>
        			<div></div>
        			<div></div>
        			<div></div>
        			<div></div>
        			<div></div>
        			<div></div>
        			<div></div>
        			<div></div>
        			<div></div>
        			<div></div>
        			<div></div>
        		</div>
        	</div>
            <div class="modal-header">
                <h4 class="modal-title" id="CenterModalLabel">Tambah Kontak</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="tutupmodal('modal-tambah-kontak');">×</button>
            </div>
            <div class="modal-body">
            	<div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="username_add" class="control-label" style="font-weight: 800;margin-bottom: .5rem;color: #797979">Masukkan Username</label>
                            <input type="text" class="form-control" id="username_add" placeholder="Username">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" onclick="tutupmodal('modal-tambah-kontak');">Tutup</button>
                <button type="button" class="btn btn-primary waves-effect waves-light" onclick="tambahkontak();">Tambah</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


<!-- Modal Settings -->
<div id="modal-pengaturan" class="modal" aria-hidden="true" style="background-color: #2c2e2f80">
	<div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
        	<div class="wrap-loading-modals">
        		<div class="loading-modals">
        			<div></div>
        			<div></div>
        			<div></div>
        			<div></div>
        			<div></div>
        			<div></div>
        			<div></div>
        			<div></div>
        			<div></div>
        			<div></div>
        			<div></div>
        			<div></div>
        		</div>
        	</div>
            <div class="modal-header">
                <h4 class="modal-title" id="CenterModalLabel"><span style="cursor: pointer;"><i class="ti-angle-left"></i></span> Pengaturan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" onclick="tutupmodal('modal-pengaturan');">×</button>
            </div>
            <div class="modal-body">
            	<div class="row">
                    <div class="col-md-12" id="content-menu-settings">
                    	<ul>
                    		
                    	</ul>
                       	<!-- <button type="button" class="menu-settings" onclick="modalSettings('dk')">Daftar Kontak</button>
                       	<button type="button" class="menu-settings" onclick="modalSettings('i')">Invite</button> -->

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" onclick="tutupmodal('modal-pengaturan');">Tutup</button>
                <button type="button" class="btn btn-primary waves-effect waves-light" onclick="tambahkontak();">Tambah</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>