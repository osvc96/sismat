@if (Auth::check())
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="https://placehold.it/160x160/00a65a/ffffff/&text={{ mb_substr(Auth::user()->name, 0, 1) }}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{ Auth::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">{{ trans('backpack::base.administration') }}</li>
          <!-- ================================================ -->
          <!-- ==== Recommended place for admin menu items ==== -->
          <!-- ================================================ -->
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
            
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/elfinder') }}"><i class="fa fa-files-o"></i> <span>File manager</span></a></li>
          

          <!-- Productores -->
          <li class="treeview">
            <a href="#"><i class="glyphicon glyphicon-user"></i> <span>Productores</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="{{ url(config('backpack.base.route_prefix').'/productorFinca') }}"><i class="glyphicon glyphicon-grain"></i> <span>Agregar manualmente</span></a></li>
              <li><a href="{{ url(config('backpack.base.route_prefix').'/scan') }}"><i class="glyphicon glyphicon-qrcode"></i> <span>Agregar desde QR</span></a></li>
            </ul>
          </li>


          <!-- Ingreso de animales -->
          <li class="treeview">
            <a href="#"><i class="glyphicon glyphicon-copy"></i> <span>Ingreso de animales</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="{{ url(config('backpack.base.route_prefix').'/ingresoFinca') }}"><i class="glyphicon glyphicon-grain"></i> <span>Ingreso de bovinos de finca</span></a></li>
              <li><a href="{{ url(config('backpack.base.route_prefix').'/ingresoSubasta') }}"><i class="fa fa-group"></i> <span>Ingreso bovinos  de subasta</span></a></li>
              <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/ingresoPorcino') }}"><i class="glyphicon glyphicon-piggy-bank"></i> <span>Ingreso Porcinos</span></a></li>
            </ul>
          </li>

          <!-- Matanza de animales -->
          <li class="treeview">
            <a href="#"><i class="glyphicon glyphicon-screenshot"></i> <span>Sacrificio</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="{{ url(config('backpack.base.route_prefix').'/matanzaBovino') }}"><i class="glyphicon glyphicon-grain"></i> <span>Agregar canal bovino</span></a></li>
              <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/matanzaPorcino') }}"><i class="glyphicon glyphicon-piggy-bank"></i> <span>Agregar canal porcino</span></a></li>
            </ul> 
          </li>

          <!-- Asociar ingreso de bovinos -->
          <li class="treeview">
            <a href="#"><i class="glyphicon glyphicon-paste"></i> <span>Asociar ingreso de bovino</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/bovinoSubasta') }}"><i class=" glyphicon glyphicon-leaf"></i> <span>Asociar canal a ingreso de subasta</span></a></li>

              <li><a href="{{ url(config('backpack.base.route_prefix', 'admin') . '/bovinoFinca') }}"><i class="fa fa-group"></i> <span>Asociar canal a ingreso de finca</span></a></li>
            </ul>
          </li>
            
            <!-- Decomisos -->
          <li class="treeview">
            <a href="#"><i class="glyphicon glyphicon-remove"></i> <span>Decomisos</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="{{ url(config('backpack.base.route_prefix').'/decomisoPorcino') }}"><i class="glyphicon glyphicon-piggy-bank"></i> <span>Decomiso Porcino</span></a></li>
              <li><a href="{{ url(config('backpack.base.route_prefix').'/decomisoBovino') }}"><i class=" glyphicon glyphicon-leaf"></i> <span>Decomiso Bovino</span></a></li>
            </ul>
          </li>

           <!-- Transporte -->
          <li class="treeview">
            <a href="#"><i class="glyphicon glyphicon-screenshot"></i> <span>Transporte</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="{{ url(config('backpack.base.route_prefix').'/transportista') }}"><i class="glyphicon glyphicon-grain"></i> <span>Transportistas</span></a></li>
              <li><a href="{{ url(config('backpack.base.route_prefix').'/establecimientoDestino') }}"><i class="fa fa-group"></i> <span>Establecimientos Destino</span></a></li>
              <li><a href="{{ url(config('backpack.base.route_prefix').'/transporteBovino') }}"><i class="fa fa-group"></i> <span>Transporte de Bovinos</span></a></li>
              <li><a href="{{ url(config('backpack.base.route_prefix').'/transportePorcino') }}"><i class="fa fa-group"></i> <span>Transporte de Porcinos</span></a></li>
            </ul>
          </li>

          <!-- ======================================= -->
          <li class="header">{{ trans('backpack::base.user') }}</li>
          <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/logout') }}"><i class="fa fa-sign-out"></i> <span>{{ trans('backpack::base.logout') }}</span></a></li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
@endif
