<div id="sidepanel">
				<div id="profile">
					<div class="wrap">
						<img id="profile-img" src="assets/images/user.jpg" class="online" alt="" />
						<p>Rio Prastiawan</p>
						<i class="fa fa-chevron-down expand-button" aria-hidden="true"></i>
						<div id="status-options">
							<ul>
								<li id="status-online" class="active"><span class="status-circle"></span> <p>Online</p></li>
								<li id="status-away"><span class="status-circle"></span> <p>Away</p></li>
								<li id="status-busy"><span class="status-circle"></span> <p>Busy</p></li>
								<li id="status-offline"><span class="status-circle"></span> <p>Offline</p></li>
							</ul>
						</div>
						<style type="text/css">
							.menu_setting{
								cursor: pointer;
								transition: .5s;
							}
							.menu_setting:hover{
								color:#fff;
							}
						</style>
						<div id="expanded">
							<a href="profile" title="Profile" style="color: #ffffffb3;">
								<label class="menu_setting" for="twitter"><i class="fa fa-user fa-fw" aria-hidden="true"></i> Profil</label>
							</a>
							<a href="pengaturan" title="Pengaturan" style="color: #ffffffb3;">
								<label class="menu_setting" for="twitter"><i class="fa fa-gear fa-fw" aria-hidden="true"></i> Pengaturan</label>
							</a>
							<a href="logout" title="Keluar" style="color: #ffffffb3;">
								<label class="menu_setting" for="twitter"><i class="fa fa-sign-out fa-fw" aria-hidden="true"></i> Keluar</label>
							</a>
						</div>
					</div>
				</div>
				<div id="search">
					<label for=""><i class="fa fa-search" aria-hidden="true"></i></label>
					<input type="text" placeholder="Search contacts..." />
				</div>
				<div id="contacts">
					<ul>
						<li class="contact active">
							<div class="wrap">
								<span class="contact-status"></span>
								<img src="assets/images/user.jpg" alt="" />
								<div class="meta">
									<p class="name">Rio Prastiawan</p>
									<p class="preview"><span>Anda:</span> Hai.</p>
								</div>
							</div>
						</li>
					</ul>
				</div>
				<div id="bottom-bar">
					<button id="addcontact"><i class="fa fa-user-plus fa-fw" aria-hidden="true"></i> <span>Tambah Kontak</span></button>
					<button id="settings"><i class="fa fa-cog fa-fw" aria-hidden="true"></i> <span>Pengaturan</span></button>
				</div>
			</div>