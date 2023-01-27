<!-- Sidebar -->
<div class="sidebar" id="sidebar">
	<div class="sidebar-inner slimscroll">
		<div id="sidebar-menu" class="sidebar-menu">
			
			<ul>
				<li class="menu-title"> 
					<span>Main</span>
				</li>
				<li class="{{ Request::routeIs('dashboard') ? 'active' : '' }}"> 
					<a href="{{route('dashboard')}}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
				</li>
				
				@can('view-category')
				<li class="{{ Request::routeIs('categories') ? 'active' : '' }}"> 
					<a href="{{route('categories')}}"><i class="fe fe-layout"></i> <span>Kategori</span></a>
				</li>
				@endcan
				
				@can('view-products')
				<li class="submenu">
					<a href="#"><i class="fe fe-document"></i> <span> Produk</span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						@can('view-products')<li><a class="{{ Request::routeIs(('products')) ? 'active' : '' }}" href="{{route('products')}}">Produk</a></li>@endcan
						@can('view-outstock-products')<li><a class="{{ Request::routeIs('outstock') ? 'active' : '' }}" href="{{route('outstock')}}">Stok habis</a></li>@endcan
						@can('view-expired-products')<li><a class="{{ Request::routeIs('expired') ? 'active' : '' }}" href="{{route('expired')}}">Kedaluarsa</a></li>@endcan
					</ul>
				</li>
				@endcan
				
				@can('view-sales')
				
				<li class="{{ Request::routeIs('purchases') ? 'active' : '' }}">
				<a  href="{{route('purchases')}}"><i class="fe fe-star-o"></i> <span> Pembelian</span></a>
				</li>
				<li><a class="{{ Request::routeIs('sales') ? 'active' : '' }}" href="{{route('sales')}}"><i class="fe fe-activity"></i> <span>Penjualan</span></a></li>
				@endcan
				@can('view-supplier')
				<li class="{{ Request::routeIs('suppliers') ? 'active' : '' }}">
					<a href="{{route('suppliers')}}"><i class="fe fe-user"></i> <span> Supplier</span></a>
                </li>
                @endcan

				@can('view-reports')
				<li class="{{ Request::routeIs('reports') ? 'active' : '' }}">
					<a href="{{route('reports')}}"><i class="fe fe-document"></i> <span> laporan</span></a>
				</li>
				@endcan
				@can('view-acounting')
				<li class="submenu">
					<a href="#"><i class="fe fe-book"></i> <span> Acounting</span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						@can('view-jurnalumum')
						<li><a class="{{ Request::routeIs('jurnal-umum') ? 'active' : '' }}" href="{{route('jurnal-umum')}}">Jurnal Umum</a></li>
						@endcan
						@can('view-bukubesar')
						<li><a class="{{ Request::routeIs('buku-besar') ? 'active' : '' }}" href="{{route('buku-besar')}}">Posting Buku Besar</a></li>
						@endcan
						@can('view-laba-rugi')
						<li><a class="{{ Request::routeIs('laba-rugi') ? 'active' : '' }}" href="{{route('laba-rugi')}}">Laporan Laba Rugi</a></li>
						@endcan
						@can('view-neraca')
						<li><a class="{{ Request::routeIs('permissions') ? 'active' : '' }}" href="{{route('permissions')}}">Neraca</a></li>
						@endcan
					</ul>
				</li>					
				@endcan
				@can('view-access-control')
				<li class="submenu">
					<a href="#"><i class="fe fe-lock"></i> <span> Hak Akses</span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						@can('view-permission')
						<li><a class="{{ Request::routeIs('permissions') ? 'active' : '' }}" href="{{route('permissions')}}">Izin Akses</a></li>
						@endcan
						@can('view-role')
						<li><a class="{{ Request::routeIs('roles') ? 'active' : '' }}" href="{{route('roles')}}">Role</a></li>
						@endcan
					</ul>
				</li>					
				@endcan

				@can('view-users')
				<li class="{{ Request::routeIs('users') ? 'active' : '' }}"> 
					<a href="{{route('users')}}"><i class="fe fe-users"></i> <span>User</span></a>
				</li>
				@endcan
				
				<li class="{{ Request::routeIs('profile') ? 'active' : '' }}"> 
					<a href="{{route('profile')}}"><i class="fe fe-user-plus"></i> <span>Profil</span></a>
				</li>
				@can('view-settings')
				<li class="{{ Request::routeIs('settings') ? 'active' : '' }}"> 
					<a href="{{route('settings')}}">
						<i class="fa fa-gears"></i>
						 <span> Setting</span>
					</a>
				</li>
				@endcan
			</ul>
		</div>
	</div>
</div>
<!-- /Sidebar -->