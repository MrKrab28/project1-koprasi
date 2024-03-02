<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="{{ route('user-dashboard') }}" class="waves-effect">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-cash-multiple"></i>
                        <span>Simpanan</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @foreach ($jenis_simpanan as $item)
                            <li><a href="{{ route('user-simpanan') }}?jenis={{ $item->id }}">{{ $item->nama }}</a>
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li>
                    <a href="{{ route('user-pinjaman') }}" class="waves-effect">
                        <i class="mdi mdi-cash"></i>
                        <span>Pinjaman</span>
                    </a>
                </li>


            </ul>
        </div>
    </div>
</div>
