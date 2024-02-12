<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a href="/" class="waves-effect">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-buffer"></i>
                        <span>Master Data</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Jenis Simpanan</a></li>
                        <li><a href="#">Data Petugas</a></li>
                        <li><a href="#">Data Anggota</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-cash"></i>
                        <span>Transaksi</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Pemasukan</a></li>
                        <li><a href="#">Pengeluaran</a></li>
                    </ul>
                </li>

                <li class="menu-title">Simpan Pinjam</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-cash-multiple"></i>
                        <span>Simpanan</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        @foreach ($jenis_simpanan as $item)
                            <li><a href="#">{{ $item->nama }}</a></li>
                        @endforeach
                    </ul>
                </li>

                <li>
                    <a href="#" class="waves-effect">
                        <i class="mdi mdi-cash-plus"></i>
                        <span>Pinjaman</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="waves-effect">
                        <i class="mdi mdi-chart-line"></i>
                        <span>Grafik</span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-file-outline"></i>
                        <span>Laporan</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#">Data Anggota</a></li>
                        <li><a href="#">Neraca Saldo</a></li>
                        <li><a href="#">SHU</a></li>
                    </ul>
                </li>

                <li class="menu-title">Persediaan</li>

                <li>
                    <a href="#" class="waves-effect">
                        <i class="mdi mdi-archive-outline"></i>
                        <span>Menu 1</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="waves-effect">
                        <i class="mdi mdi-archive-outline"></i>
                        <span>Menu 2</span>
                    </a>
                </li>

                <li class="menu-title">Perdagangan</li>

                <li>
                    <a href="#" class="waves-effect">
                        <i class="mdi mdi-archive-outline"></i>
                        <span>Menu 1</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="waves-effect">
                        <i class="mdi mdi-archive-outline"></i>
                        <span>Menu 2</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>