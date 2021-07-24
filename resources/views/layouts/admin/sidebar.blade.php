<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('gambar/icon.png')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Session::get('nama')}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form> -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="{{route('dashboard')}}">
                    <i class="fa fa-home"></i> <span>Dashboard</span>
                    <span class="pull-right-container">
                        <!-- <small class="label pull-right bg-green">new</small> -->
                    </span>
                </a>
            </li>
            <li class="treeview menu-open">
                <a href="#">
                    <i class="fa fa-database"></i> <span>Master Data</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('anggota')}}"><i class="fa fa-circle-o"></i> Anggota</a></li>
                    <li><a href="{{route('admin')}}"><i class="fa fa-circle-o"></i> Admin</a></li>
                    <li><a href="{{route('buku')}}"><i class="fa fa-circle-o"></i> Buku</a></li>
                </ul>
            </li>
            <li class="treeview menu-open">
                <a href="#">
                    <i class="fa fa-pencil"></i> <span>Data Pinjam</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('peminjaman')}}"><i class="fa fa-circle-o"></i> Peminjaman</a></li>
                    <li><a href="{{route('pengembalian')}}"><i class="fa fa-circle-o"></i> Pengembalian</a></li>
                    <li><a href="{{route('denda')}}"><i class="fa fa-circle-o"></i> Denda</a></li>

                </ul>
            </li>
            <li>
                <a href="{{route('laporan')}}">
                    <i class="fa fa-file"></i> <span>Laporan</span>
                </a>
            </li>
            <li>
                <a href="{{url('keluar')}}">
                    <i class="glyphicon glyphicon-log-out"></i> <span>Keluar</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>